@extends('admin.master')

@section('title')
Ubah Informasi Calon Siswa
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Informasi Calon Siswa</h1>
    </div>
    <!-- Form -->
    <form action="{{ route('dashboard.psb.data.update') }}" enctype="multipart/form-data" method="POST">
        <div class="card shadow mb-4">
            <!-- Informasi Siswa -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Siswa</h6>
            </div>
            @foreach($data as $key)
            <div class="card-body">
                @csrf
                <input type="hidden" name="calon_id" value="{{ $key->calon_id }}">
                <div class="mb-3">
                    <label for="kcs_id" class="form-label">Kelompok Calon Siswa <span class="text-danger">*</span></label>
                    <select class="form-control" name="kcs_id" id="kcs_id" required>
                        <option disabled>Pilih Kelompok Calon:</option>
                        @foreach($datakcs as $kcs)
                        @if($kcs->kcs_id == $key->kcs_id)
                        <option selected value="{{ $kcs->kcs_id }}">{{ $kcs->nama }}</option>
                        @else
                        <option value="{{ $kcs->kcs_id }}">{{ $kcs->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $key->nama }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div id="jk">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jk1" name="jeniskelamin" value="Laki-laki" class="custom-control-input" {{ $key->jeniskelamin == 'Laki-laki' ? 'checked':'' }} required>
                                    <label class="custom-control-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jk2" name="jeniskelamin" value="Perempuan" class="custom-control-input" {{ $key->jeniskelamin == 'Perempuan' ? 'checked':'' }} required>
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="inputGroupFile02" class="form-label">Foto <span class="text-danger">*</span></label>
                        <div class="input-group" id="foto">
                            <img class="mx-1" src="{{ url($key->foto->path) }}" height="100px" alt="">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <small class="text-secondary">Max. File 2MB (PNG, JPG, JPEG)</small>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="{{ $key->tempatlahir }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgllahir" class="form-control" id="tgllahir" value="{{ $key->tgllahir }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select class="form-control" name="agama" id="agama" required>
                        <option {{ $key->agama == 'Islam' ? 'selected':'' }} value="Islam">Islam</option>
                        <option {{ $key->agama == 'Kristen' ? 'selected':'' }} value="Kristen">Kristen</option>
                        <option {{ $key->agama == 'Katolik' ? 'selected':'' }} value="Katolik">Katolik</option>
                        <option {{ $key->agama == 'Hindu' ? 'selected':'' }} value="Hindu">Hindu</option>
                        <option {{ $key->agama == 'Buddha' ? 'selected':'' }} value="buddha">Buddha</option>
                        <option {{ $key->agama == 'Konghucu' ? 'selected':'' }} value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" value="{{ $key->kewarganegaraan }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $key->alamat }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Informasi Wali -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Orangtua/Wali</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="namaortu" class="form-label">Nama Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="namaortu" class="form-control" id="namaortu" value="{{ $key->namaortu }}" required>
                </div>
                <div class="mb-3">
                    <label for="pendidikanortu" class="form-label">Pendidikan Orangtua/Wali <span class="text-danger">*</span></label>
                    <select class="form-control" name="pendidikanortu" id="pendidikanortu" required>
                        <option {{ $key->pendidikanortu == 'Tidak Berpendidikan' ? 'selected':'' }} value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option {{ $key->pendidikanortu == 'SD' ? 'selected':'' }} value="SD">SD/Sederajat</option>
                        <option {{ $key->pendidikanortu == 'SMP' ? 'selected':'' }} value="SMP">SMP/Sederajat</option>
                        <option {{ $key->pendidikanortu == 'SMA' ? 'selected':'' }} value="SMA">SMA/Sederajat</option>
                        <option {{ $key->pendidikanortu == 'D1' ? 'selected':'' }} value="D1">D1</option>
                        <option {{ $key->pendidikanortu == 'D3' ? 'selected':'' }} value="D3">D3</option>
                        <option {{ $key->pendidikanortu == 'S1' ? 'selected':'' }} value="S1">S1</option>
                        <option {{ $key->pendidikanortu == 'S2' ? 'selected':'' }} value="S2">S2</option>
                        <option {{ $key->pendidikanortu == 'S3' ? 'selected':'' }} value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanortu" class="form-label">Pekerjaan Ortu/Wali <span class="text-danger">*</span></label>
                    <select class="form-control" name="pekerjaanortu" id="pekerjaanortu" required>
                        <option {{ $key->pendidikanortu == 'Tidak Bekerja' ? 'selected':'' }} value="Tidak Bekerja">Tidak Bekerja</option>
                        <option {{ $key->pendidikanortu == 'Ibu Rumah Tangga' ? 'selected':'' }} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option {{ $key->pendidikanortu == 'PNS' ? 'selected':'' }} value="PNS">PNS</option>
                        <option {{ $key->pendidikanortu == 'Wiraswasta' ? 'selected':'' }} value="Wiraswasta">Wiraswasta</option>
                        <option {{ $key->pendidikanortu == 'Lainnya' ? 'selected':'' }} value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponortu" class="form-label">Telepon Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="teleponortu" class="form-control" id="teleponortu" value="{{ $key->teleponortu }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatortu" class="form-label">Alamat Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="alamatortu" class="form-control" id="alamatortu" value="{{ $key->alamatortu }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
            <div class="text-right mx-3 mb-3">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>
        @endforeach
    </form>
</div>
@endsection

@section('script')
<script>
    $('#teleponortu').on('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    $('#teleponortu').on("cut copy paste", function(e) {
        e.preventDefault();
    });
</script>

<script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>
@endsection