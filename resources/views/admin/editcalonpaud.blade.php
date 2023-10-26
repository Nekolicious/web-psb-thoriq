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
    <form action="{{ route('dashboard.psb.data.updatepaud') }}" enctype="multipart/form-data" method="POST">
        <div class="card shadow mb-4">
            <!-- Informasi Siswa -->
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-success">Informasi Siswa</h6>
            </div>
            <div class="card-body py-md-4 px-md-5">
                @csrf
                <input type="hidden" name="calon_id" value="{{ $data['calon'][0]->calon_id }}">
                <div class="mb-3">
                    <label for="kcs_id" class="form-label">Kelompok Calon Siswa <span class="text-danger">*</span></label>
                    <input disabled type="text" class="form-control" id="kcs" value="{{ $data['calon'][0]->kcs->nama }}">
                    <input type="hidden" name="kcs_id" value="{{ $data['calon'][0]->kcs->kcs_id }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $data['calon'][0]->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="nomorinduk" class="form-label">Nomor Induk<span class="text-danger">*</span></label>
                    <input type="text" name="nomorinduk" class="form-control" id="nomorinduk" value="{{ $data['paud'][0]->nomorinduk }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <div id="jk">
                                <div class="custom-control custom-radio">
                                    <input {{ $data['calon'][0]->jeniskelamin == 'Laki-laki' ? 'checked':'' }} type="radio" id="jk1" name="jeniskelamin" value="Laki-laki" class="custom-control-input" required>
                                    <label class="custom-control-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input {{ $data['calon'][0]->jeniskelamin == 'Perempuan' ? 'checked':'' }} type="radio" id="jk2" name="jeniskelamin" value="Perempuan" class="custom-control-input" required>
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="foto" class="form-label">Foto <span class="text-danger">*</span></label><br>
                        <img class="img-thumbnail my-1" src="{{ asset('storage/uploads/'.$data['calon'][0]->foto->filename) }}" width="120px" alt="{{ $data['calon'][0]->foto->filename }}">
                        <div class="input-group" id="foto">
                            <input type="file" name="foto" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <small class="text-secondary">Max. File 2MB (PNG, JPG, JPEG)</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" value="{{ $data['calon'][0]->tempatlahir }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tgllahir" class="form-control" id="tgllahir" value="{{ $data['calon'][0]->tgllahir }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select class="form-control" name="agama" id="agama" required>
                        <option {{ $data['calon'][0]->agama == 'Islam' ? 'selected':'' }} value="Islam">Islam</option>
                        <option {{ $data['calon'][0]->agama == 'Kristen' ? 'selected':'' }} value="Kristen">Kristen</option>
                        <option {{ $data['calon'][0]->agama == 'Katolik' ? 'selected':'' }} value="Katolik">Katolik</option>
                        <option {{ $data['calon'][0]->agama == 'Hindu' ? 'selected':'' }} value="Hindu">Hindu</option>
                        <option {{ $data['calon'][0]->agama == 'Buddha' ? 'selected':'' }} value="buddha">Buddha</option>
                        <option {{ $data['calon'][0]->agama == 'Konghucu' ? 'selected':'' }} value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $data['calon'][0]->alamat }}" required>
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                    <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" value="{{ $data['calon'][0]->kewarganegaraan }}" required>
                </div>
                <div class="mb-3">
                    <label for="citacita" class="form-label">Cita-Cita<span class="text-danger">*</span></label>
                    <input type="text" name="citacita" class="form-control" id="citacita" value="{{ $data['paud'][0]->citacita }}" required>
                </div>
                <div class="mb-3">
                    <label for="hobi" class="form-label">Hobi<span class="text-danger">*</span></label>
                    <input type="text" name="hobi" class="form-control" id="hobi" value="{{ $data['paud'][0]->hobi }}" required>
                </div>
                <div class="mb-3">
                    <label for="jmlsaudara" class="form-label">Jumlah Saudara Kandung<span class="text-danger">*</span></label>
                    <input type="text" name="jmlsaudara" class="form-control" id="jmlsaudara" value="{{ $data['paud'][0]->jmlsaudara }}" required>
                </div>
                <div class="mb-3">
                    <label for="jaraksekolah" class="form-label">Jarak Tempuh Ke Sekolah (KM)<span class="text-danger">*</span></label>
                    <input type="number" name="jaraksekolah" class="form-control" id="jaraksekolah" value="{{ $data['paud'][0]->jaraksekolah }}" required>
                </div>
                <div class="mb-3">
                    <label for="kendaraan" class="form-label">Kendaraan Yang Digunakan<span class="text-danger">*</span></label>
                    <input type="text" name="kendaraan" class="form-control" id="kendaraan" value="{{ $data['paud'][0]->kendaraan }}" required>
                </div>
                <div class="mb-3">
                    <label for="beratbadan" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                    <input type="number" name="beratbadan" class="form-control" id="beratbadan" value="{{ $data['paud'][0]->beratbadan }}" required>
                </div>
                <div class="mb-3">
                    <label for="tinggibadan" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                    <input type="number" name="tinggibadan" class="form-control" id="tinggibadan" value="{{ $data['paud'][0]->tinggibadan }}" required>
                </div>
                <div class="mb-3">
                    <label for="lingkarkepala" class="form-label">Lingkar Kepala<span class="text-danger">*</span></label>
                    <input type="number" name="lingkarkepala" class="form-control" id="lingkarkepala" value="{{ $data['paud'][0]->lingkarkepala }}" required>
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
                    <input type="text" name="namaayah" class="form-control" id="namaayah" value="{{ $data['paud'][0]->namaayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="nikayah" class="form-label">NIK Ayah<span class="text-danger">*</span></label>
                    <input type="text" name="nikayah" class="form-control" id="nikayah" value="{{ $data['paud'][0]->nikayah }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahirayah" class="form-label">Tempat Lahir Ayah<span class="text-danger">*</span></label>
                        <input type="text" name="tempatlahirayah" class="form-control" id="tempatlahirayah" value="{{ $data['paud'][0]->tempatlahirayah }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahirayah" class="form-label">Tanggal Lahir Ayah<span class="text-danger">*</span></label>
                        <input type="date" name="tgllahirayah" class="form-control" id="tgllahirayah" value="{{ $data['paud'][0]->tgllahirayah }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendidikanayah" class="form-label">Pendidikan Ayah<span class="text-danger">*</span></label>
                    <select class="form-control" name="pendidikanayah" id="pendidikanayah" required>
                        <option {{ $data['paud'][0]->pendidikanayah == 'Tidak Berpendidikan' ? 'selected':'' }} value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'SD' ? 'selected':'' }} value="SD">SD/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'SMP' ? 'selected':'' }} value="SMP">SMP/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'SMA' ? 'selected':'' }} value="SMA">SMA/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'D1' ? 'selected':'' }} value="D1">D1</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'D3' ? 'selected':'' }} value="D3">D3</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'S1' ? 'selected':'' }} value="S1">S1</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'S2' ? 'selected':'' }} value="S2">S2</option>
                        <option {{ $data['paud'][0]->pendidikanayah == 'S3' ? 'selected':'' }} value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                    <select class="form-control" name="pekerjaanayah" id="pekerjaanayah" required>
                        <option {{ $data['paud'][0]->pekerjaanayah == 'Tidak Bekerja' ? 'selected':'' }} value="Tidak Bekerja">Tidak Bekerja</option>
                        <option {{ $data['paud'][0]->pekerjaanayah == 'Ibu Rumah Tangga' ? 'selected':'' }} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option {{ $data['paud'][0]->pekerjaanayah == 'PNS' ? 'selected':'' }} value="PNS">PNS</option>
                        <option {{ $data['paud'][0]->pekerjaanayah == 'Wiraswasta' ? 'selected':'' }} value="Wiraswasta">Wiraswasta</option>
                        <option {{ $data['paud'][0]->pekerjaanayah == 'Lainnya' ? 'selected':'' }} value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponayah" class="form-label">Telepon Ayah <span class="text-danger">*</span></label>
                    <input type="text" name="teleponayah" class="form-control" id="teleponayah" value="{{ $data['paud'][0]->teleponayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatayah" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
                    <input type="text" name="alamatayah" class="form-control" id="alamatayah" value="{{ $data['paud'][0]->alamatayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilanayah" class="form-label">Penghasilan Ayah (RP)<span class="text-danger">*</span></label>
                    <input type="number" name="penghasilanayah" class="form-control" id="penghasilanayah" value="{{ $data['paud'][0]->penghasilanayah }}" required>
                </div>
                <hr class="my-4">
                <div class="mb-3">
                    <label for="namaibu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                    <input type="text" name="namaibu" class="form-control" id="namaibu" value="{{ $data['paud'][0]->namaibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="nikibu" class="form-label">NIK Ibu<span class="text-danger">*</span></label>
                    <input type="text" name="nikibu" class="form-control" id="nikibu" value="{{ $data['paud'][0]->nikibu }}" required>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tempatlahiribu" class="form-label">Tempat Lahir Ibu<span class="text-danger">*</span></label>
                        <input type="text" name="tempatlahiribu" class="form-control" id="tempatlahiribu" value="{{ $data['paud'][0]->tempatlahiribu }}" required>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="tgllahiribu" class="form-label">Tanggal Lahir Ibu<span class="text-danger">*</span></label>
                        <input type="date" name="tgllahiribu" class="form-control" id="tgllahiribu" value="{{ $data['paud'][0]->tgllahiribu }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendidikanibu" class="form-label">Pendidikan Ibu<span class="text-danger">*</span></label>
                    <select class="form-control" name="pendidikanibu" id="pendidikanibu" required>
                        <option {{ $data['paud'][0]->pendidikanibu == 'Tidak Berpendidikan' ? 'selected':'' }} value="Tidak Berpendidikan">Tidak Berpendidikan</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'SD' ? 'selected':'' }} value="SD">SD/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'SMP' ? 'selected':'' }} value="SMP">SMP/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'SMA' ? 'selected':'' }} value="SMA">SMA/Sederajat</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'D1' ? 'selected':'' }} value="D1">D1</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'D3' ? 'selected':'' }} value="D3">D3</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'S1' ? 'selected':'' }} value="S1">S1</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'S2' ? 'selected':'' }} value="S2">S2</option>
                        <option {{ $data['paud'][0]->pendidikanibu == 'S3' ? 'selected':'' }} value="S3">S3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaanibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                    <select class="form-control" name="pekerjaanibu" id="pekerjaanibu" required>
                        <option {{ $data['paud'][0]->pekerjaanibu == 'Tidak Bekerja' ? 'selected':'' }} value="Tidak Bekerja">Tidak Bekerja</option>
                        <option {{ $data['paud'][0]->pekerjaanibu == 'Ibu Rumah Tangga' ? 'selected':'' }} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                        <option {{ $data['paud'][0]->pekerjaanibu == 'PNS' ? 'selected':'' }} value="PNS">PNS</option>
                        <option {{ $data['paud'][0]->pekerjaanibu == 'Wiraswasta' ? 'selected':'' }} value="Wiraswasta">Wiraswasta</option>
                        <option {{ $data['paud'][0]->pekerjaanibu == 'Lainnya' ? 'selected':'' }} value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teleponibu" class="form-label">Telepon Ibu <span class="text-danger">*</span></label>
                    <input type="text" name="teleponibu" class="form-control" id="teleponibu" value="{{ $data['paud'][0]->teleponibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamatibu" class="form-label">Alamat Ibu <span class="text-danger">*</span></label>
                    <input type="text" name="alamatibu" class="form-control" id="alamatibu" value="{{ $data['paud'][0]->alamatibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="penghasilanibu" class="form-label">Penghasilan Ibu (RP)<span class="text-danger">*</span></label>
                    <input type="number" name="penghasilanibu" class="form-control" id="penghasilanibu" value="{{ $data['paud'][0]->penghasilanibu }}" required>
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
            </div>
            <div class="text-center mx-3 mb-3">
                <button onclick="history.back()" class="btn btn-lg btn-secondary px-5 mx-1">Batal</button>
                <button type="submit" class="btn btn-lg btn-success px-5 mx-1">Ubah</button>
            </div>
        </div>
        <hr>
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

<script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>
@endsection