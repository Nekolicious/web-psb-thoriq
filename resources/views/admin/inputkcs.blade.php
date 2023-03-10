@extends('admin.master')

@section('title')
Input Kelompok Calon Siswa
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Kelompok Calon Siswa Baru</h1>
    </div>
    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('dashboard.psb.kcs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Proses <span class="text-danger">*</span></label>
                    <select class="form-control" name="ppsb_id" id="ppsb_id" required>
                        <option selected disabled>Pilih Proses PSB:</option>
                        @foreach($data as $key)
                        <option value="{{ $key->ppsb_id }}">{{ $key->kode }} - {{ $key->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kelompok <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas <span class="text-danger">*</span></label>
                    <input type="number" name="kapasitas" class="form-control" id="kapasitas" min="1" value="{{ old('kapasitas') }}" required>
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