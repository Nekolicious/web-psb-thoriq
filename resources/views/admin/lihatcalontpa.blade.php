@extends('admin.master')

@section('title')
Ubah Informasi Calon Siswa
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Calon Siswa</h1>
    </div>
    <!-- Form -->
    <form action="" enctype="multipart/form-data" method="POST">
        <div class="card shadow mb-4">

            <!-- Informasi Siswa -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Informasi Siswa</h6>
            </div>
            <div class="card-body py-md-4 px-md-5">
                @csrf
                <div class="mb-3">
                    <label for="kcs_id" class="form-label">Kelompok Calon Siswa <span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="kcs_id" id="kcs_id" required>
                        @foreach($data['kcs'] as $key)
                        <option {{ $key->kcs_id == $data['calon'][0]->kcs_id ? 'selected':'' }} value="{{ $key->kcs_id }}">{{ $key->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input disabled type="text" name="nama" class="form-control" id="nama" value="{{ $data['calon'][0]->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="nism" class="form-label">NISM<span class="text-danger">*</span></label>
                    <input disabled type="text" name="nism" class="form-control" id="nism" value="{{ $data['tpa'][0]->nism }}" required>
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN<span class="text-danger">*</span></label>
                    <input disabled type="text" name="nisn" class="form-control" id="nisn" value="{{ $data['tpa'][0]->nisn }}" required>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
                    <input disabled type="text" name="nik" class="form-control" id="nik" value="{{ $data['tpa'][0]->nik }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div id="jk">
                                <div class="custom-control custom-radio">
                                    <input disabled {{ $data['calon'][0]->jeniskelamin == 'Laki-laki' ? 'checked':'' }} type="radio" id="jk1" name="jeniskelamin" value="Laki-laki" class="custom-control-input disabled" required>
                                    <label class="custom-control-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input disabled {{ $data['calon'][0]->jeniskelamin == 'Laki-laki' ? 'checked':'' }} type="radio" id="jk2" name="jeniskelamin" value="Perempuan" class="custom-control-input disabled" required>
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label><br>
                        <img class="img-thumbnail my-1" src="{{ asset('storage/uploads/'.$data['calon'][0]->foto->filename) }}" width="120px" alt="{{ $data['calon'][0]->foto->filename }}">
                        <div class="input disabled-group" id="foto">
                            <input disabled type="file" name="foto" class="form-control" id="inputGroupFile02" required>
                            <label class="input disabled-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <small class="text-secondary">Max. File 2MB (PNG, JPG, JPEG)</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input disabled type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="{{ $data['calon'][0]->tempatlahir }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input disabled type="date" name="tgllahir" class="form-control" id="tgllahir" value="{{ $data['calon'][0]->tgllahir }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="agama" id="agama" required>
                        <option selected value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                    <input disabled type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" value="{{ $data['calon'][0]->kewarganegaraan }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input disabled type="text" name="alamat" class="form-control" id="alamat" value="{{ $data['calon'][0]->alamat }}" required>
                </div>
                <div class="mb-3">
                    <label for="hobi" class="form-label">Hobi<span class="text-danger">*</span></label>
                    <input disabled type="text" name="hobi" class="form-control" id="hobi" value="{{ $data['tpa'][0]->hobi }}" required>
                </div>
                <div class="mb-3">
                    <label for="citacita" class="form-label">Cita-Cita<span class="text-danger">*</span></label>
                    <input disabled type="text" name="citacita" class="form-control" id="citacita" value="{{ $data['tpa'][0]->citacita }}" required>
                </div>
                <div class="mb-3">
                    <label for="anakke" class="form-label">Anak Ke-<span class="text-danger">*</span></label>
                    <input disabled type="text" name="anakke" class="form-control" id="anakke" value="{{ $data['tpa'][0]->anakke }}" required>
                </div>
                <div class="mb-3">
                    <label for="jmlsaudara" class="form-label">Jumlah Saudara<span class="text-danger">*</span></label>
                    <input disabled type="text" name="jmlsaudara" class="form-control" id="jmlsaudara" value="{{ $data['tpa'][0]->jmlsaudara }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Informasi Wali -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Informasi Orangtua</h6>
            </div>
            <div class="card-body py-md-4 px-md-5">
                <div class="mb-3">
                    <label for="namaayah" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                    <input disabled type="text" name="namaayah" class="form-control" id="namaayah" value="{{ $data['tpa'][0]->namaayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="nikayah" class="form-label">NIK Ayah<span class="text-danger">*</span></label>
                    <input disabled type="text" name="nikayah" class="form-control" id="nikayah" value="{{ $data['tpa'][0]->nikayah }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahirayah" class="form-label">Tempat Lahir Ayah<span class="text-danger">*</span></label>
                        <input disabled type="text" name="tempatlahirayah" class="form-control" id="tempatlahirayah" value="{{ $data['tpa'][0]->tempatlahirayah }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahirayah" class="form-label">Tanggal Lahir Ayah<span class="text-danger">*</span></label>
                        <input disabled type="date" name="tgllahirayah" class="form-control" id="tgllahirayah" value="{{ $data['tpa'][0]->tgllahirayah }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendidikanayah" class="form-label">Pendidikan Ayah<span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="pendidikanayah" id="pendidikanayah" required>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'Tidak Berpendidikan' ? 'selected':'' }} value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'SD' ? 'selected':'' }} value="SD">SD/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'SMP' ? 'selected':'' }} value="SMP">SMP/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'SMA' ? 'selected':'' }} value="SMA">SMA/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'D1' ? 'selected':'' }} value="D1">D1</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'D3' ? 'selected':'' }} value="D3">D3</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'S1' ? 'selected':'' }} value="S1">S1</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'S2' ? 'selected':'' }} value="S2">S2</option>
                        <option {{ $data['tpa'][0]->pendidikanayah == 'S3' ? 'selected':'' }} value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="pekerjaanayah" id="pekerjaanayah" required>
                        <option {{ $data['tpa'][0]->pekerjaanayah == 'Tidak Bekerja' ? 'selected':'' }} value="Tidak Bekerja">Tidak Bekerja</option>
                        <option {{ $data['tpa'][0]->pekerjaanayah == 'Ibu Rumah Tangga' ? 'selected':'' }} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option {{ $data['tpa'][0]->pekerjaanayah == 'PNS' ? 'selected':'' }} value="PNS">PNS</option>
                        <option {{ $data['tpa'][0]->pekerjaanayah == 'Wiraswasta' ? 'selected':'' }} value="Wiraswasta">Wiraswasta</option>
                        <option {{ $data['tpa'][0]->pekerjaanayah == 'Lainnya' ? 'selected':'' }} value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponayah" class="form-label">Telepon Ayah <span class="text-danger">*</span></label>
                    <input disabled type="text" name="teleponayah" class="form-control" id="teleponayah" value="{{ $data['tpa'][0]->teleponayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatayah" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
                    <input disabled type="text" name="alamatayah" class="form-control" id="alamatayah" value="{{ $data['tpa'][0]->alamatayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilanayah" class="form-label">Penghasilan Ayah (RP)<span class="text-danger">*</span></label>
                    <input disabled type="number" name="penghasilanayah" class="form-control" id="penghasilanayah" value="{{ $data['tpa'][0]->penghasilanayah }}" required>
                </div>
                <hr class="my-4">
                <div class="mb-3">
                    <label for="namaibu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                    <input disabled type="text" name="namaibu" class="form-control" id="namaibu" value="{{ $data['tpa'][0]->namaibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="nikibu" class="form-label">NIK Ibu<span class="text-danger">*</span></label>
                    <input disabled type="text" name="nikibu" class="form-control" id="nikibu" value="{{ $data['tpa'][0]->nikibu }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahiribu" class="form-label">Tempat Lahir Ibu<span class="text-danger">*</span></label>
                        <input disabled type="text" name="tempatlahiribu" class="form-control" id="tempatlahiribu" value="{{ $data['tpa'][0]->tempatlahiribu }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahiribu" class="form-label">Tanggal Lahir Ibu<span class="text-danger">*</span></label>
                        <input disabled type="date" name="tgllahiribu" class="form-control" id="tgllahiribu" value="{{ $data['tpa'][0]->tgllahiribu }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendidikanibu" class="form-label">Pendidikan Ibu<span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="pendidikanibu" id="pendidikanibu" required>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'Tidak Berpendidikan' ? 'selected':'' }} value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'SD' ? 'selected':'' }} value="SD">SD/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'SMP' ? 'selected':'' }} value="SMP">SMP/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'SMA' ? 'selected':'' }} value="SMA">SMA/Sederajat</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'D1' ? 'selected':'' }} value="D1">D1</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'D3' ? 'selected':'' }} value="D3">D3</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'S1' ? 'selected':'' }} value="S1">S1</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'S2' ? 'selected':'' }} value="S2">S2</option>
                        <option {{ $data['tpa'][0]->pendidikanibu == 'S3' ? 'selected':'' }} value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                    <select disabled class="form-control" name="pekerjaanibu" id="pekerjaanibu" required>
                        <option {{ $data['tpa'][0]->pekerjaanibu == 'Tidak Bekerja' ? 'selected':'' }} value="Tidak Bekerja">Tidak Bekerja</option>
                        <option {{ $data['tpa'][0]->pekerjaanibu == 'Ibu Rumah Tangga' ? 'selected':'' }} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option {{ $data['tpa'][0]->pekerjaanibu == 'PNS' ? 'selected':'' }} value="PNS">PNS</option>
                        <option {{ $data['tpa'][0]->pekerjaanibu == 'Wiraswasta' ? 'selected':'' }} value="Wiraswasta">Wiraswasta</option>
                        <option {{ $data['tpa'][0]->pekerjaanibu == 'Lainnya' ? 'selected':'' }} value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponibu" class="form-label">Telepon Orangtua Ibu <span class="text-danger">*</span></label>
                    <input disabled type="text" name="teleponibu" class="form-control" id="teleponibu" value="{{ $data['tpa'][0]->teleponibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatibu" class="form-label">Alamat Orangtua Ibu <span class="text-danger">*</span></label>
                    <input disabled type="text" name="alamatibu" class="form-control" id="alamatibu" value="{{ $data['tpa'][0]->alamatibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilanibu" class="form-label">Penghasilan Ibu (RP)<span class="text-danger">*</span></label>
                    <input disabled type="number" name="penghasilanibu" class="form-control" id="penghasilanibu" value="{{ $data['tpa'][0]->penghasilanibu }}" required>
                </div>
                <div class="text-center mx-3 mb-3">
                    <button onclick="history.back()" class="btn btn-lg btn-secondary px-5">Kembali</button>
                </div>
            </div>
            <hr>
        </div>
    </form>
</div>
@endsection

@section('script')


<script>
    $('#teleponibu', '#teleponayah').on('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    $('#teleponibu', ).on("cut copy paste", function(e) {
        e.preventDefault();
    });
</script>

<script src="{{ asset('js/bs-custom-file-input disabled disabled.js') }}"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>
@endsection