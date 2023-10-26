@extends('admin.master')

@section('title')
Input Informasi Calon Siswa
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Calon Siswa Baru</h1>
    </div>
    <div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('dashboard.psb.data.input.paud') }}" class="btn btn-primary btn-lg btn-block">PAUD</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('dashboard.psb.data.input.tpa') }}" class="btn btn-primary btn-lg btn-block">TPA</a>
            </div>
        </div>
    </div>
    <!-- Form -->
    @yield('content')
</div>
@endsection

@section('script')
<script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>
@endsection