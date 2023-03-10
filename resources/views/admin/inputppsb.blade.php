@extends('admin.master')

@section('title')
Input Penerimaan Siswa Baru
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Proses Penerimaan Siswa Baru</h1>
    </div>
    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('dashboard.psb.ppsb.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Proses <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Proses <span class="text-danger">*</span></label>
                    <input type="text" name="kode" style="text-transform: uppercase;" class="form-control kodeinput" id="kode" value="{{ old('kode') }}" required>
                    <small class="text-secondary">Hanya dapat menginput alfanumerik.</small>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ old('keterangan') }}">
                    
                </div>
                <div class="mb-3">
                    <small><span class="text-danger">*</span> Wajib diisi</small>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.kodeinput').on('keypress', function(event) {
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });

    $('.kodeinput').on("cut copy paste", function(e) {
        e.preventDefault();
    });
</script>
@endsection