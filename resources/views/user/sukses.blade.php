@extends('user.kelulusan')

@section('title')
Kelulusan TPA
@endsection

@section('content')
<div class="cover-container alert alert-success d-flex p-3 mx-auto flex-column rounded">
    <header class="mb-auto">
        <h3>Sukses!</h3>
    </header>

    <main class="px-3 text-center">
        <h2>Formulir telah terkirim.</h2>
        <p class="lead">Silahkan catat atau screenshot nomor pendaftaran berikut</p>
        <h1 class="fw-bold my-5">[ {{ $nodaftar }} ]</h1>
        <p class="lead">Nomor ini digunakan untuk pengecekan kelulusan nanti</p>
        <p class="lead">
            <a href="{{ url('/') }}" class="btn btn-lg btn-success">Selesai</a>
        </p>
    </main>
</div>
@endsection