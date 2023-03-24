@extends('user.formdaftar')

@section('title')
Form Daftar PAUD
@endsection

@section('content')
<!-- Form PAUD -->
<div id="paud">
    <div class="card shadow mb-4 bg-success text-white text-center">
        <div class="card-header">
            <h3>Pendaftaran PAUD</h3>
        </div>
    </div>
    <form action="{{ route('daftar_action') }}" enctype="multipart/form-data" method="POST">
        <div class="card shadow mb-4">
            <!-- Informasi Siswa -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Informasi Siswa</h6>
            </div>
            <div class="card-body py-md-4 px-md-5">
                @csrf
                @foreach($data as $key)
                <input type="hidden" name="kcs_id" value="{{ $key -> kcs_id }}">
                @endforeach
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div id="jk">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jk1" name="jeniskelamin" value="Laki-laki" class="custom-control-input" required>
                                    <label class="custom-control-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="jk2" name="jeniskelamin" value="Perempuan" class="custom-control-input" required>
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label>
                        <div class="input-group" id="foto">
                            <input type="file" name="foto" class="form-control" id="inputGroupFile02" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <small class="text-secondary">Max. File 2MB (PNG, JPG, JPEG)</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="{{ old('tempatlahir') }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgllahir" class="form-control" id="tgllahir" value="{{ old('tgllahir') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select class="form-control" name="agama" id="agama" required>
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
                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" value="{{ old('kewarganegaraan') }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Informasi Wali -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Informasi Orangtua/Wali</h6>
            </div>
            <div class="card-body py-md-4 px-md-5">
                <div class="mb-3">
                    <label for="namaortu" class="form-label">Nama Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="namaortu" class="form-control" id="namaortu" value="{{ old('namaortu') }}" required>
                </div>
                <div class="mb-3">
                    <label for="pendidikanortu" class="form-label">Pendidikan Orangtua/Wali <span class="text-danger">*</span></label>
                    <select class="form-control" name="pendidikanortu" id="pendidikanortu" required>
                        <option selected disabled>Pilih Pendidikan:</option>
                        <option value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option value="SD">SD/Sederajat</option>
                        <option value="SMP">SMP/Sederajat</option>
                        <option value="SMA">SMA/Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanortu" class="form-label">Pekerjaan Ortu/Wali <span class="text-danger">*</span></label>
                    <select class="form-control" name="pekerjaanortu" id="pekerjaanortu" required>
                        <option selected disabled>Pilih Pekerjaan:</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option value="PNS">PNS</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponortu" class="form-label">Telepon Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="teleponortu" class="form-control" id="teleponortu" value="{{ old('teleponortu') }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatortu" class="form-label">Alamat Orangtua/Wali <span class="text-danger">*</span></label>
                    <input type="text" name="alamatortu" class="form-control" id="alamatortu" value="{{ old('alamatortu') }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
            <div class="text-center mx-3 mb-3">
                <button type="submit" class="btn btn-lg btn-thoriq px-5">Daftar</button>
            </div>
        </div>
        <hr>
    </form>
</div>
<!-- Form PAUD End -->

<!-- Modal Form Disabled -->
<button type="button" style="display: none;" id="formClosed" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Closed
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran Ditutup</h5>
            </div>
            <div class="modal-body">
                Hubungi admin untuk informasi lebih lengkap.
            </div>
            <div class="modal-footer">
                <a href="{{ url('/') }}" type="button" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form Disabled End -->

@if( $data->count() < 1) <script>
    document.getElementById("formClosed").click();
    </script>
    @endif

    @endsection