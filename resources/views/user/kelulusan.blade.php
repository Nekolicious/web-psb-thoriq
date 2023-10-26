<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Siswa Baru PAUD Thoriqul Jannah</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/4d73dab561.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
</head>

<body>
    <!-- Floating Button -->
    <div class="fixed-bottom text-end m-3">
        <a href="https://api.whatsapp.com/send/?phone=+628112347187&text=Assalamu+%27alaikum.&type=phone_number&app_absent=0" target="_blank" class="btn btn-light btn-lg rounded-circle" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
            <i class="fa-brands fa-whatsapp"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        </a>
    </div>
    <!-- Floating Button End -->

    <div class="container-flex gradient-form header-thoriq">
        <div class="container px-md-5 py-4">
            <div class="row">
                <div class="col-4">
                    <a href="{{ url('/') }}" class="btn btn-thoriq rounded-pill">Kembali</a>
                </div>
            </div>
            {{-- Success Alert --}}
            @if(session('success'))
            <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- Error Alert --}}
            @foreach($errors->all() as $err)
            <div class="m-3 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $err }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
            <!-- Page Heading -->
            <div class="text-center py-4 text-light">
                <h1>Kelulusan</h1>
                <h3>Yayasan Thoriqul Jannah</h3>
                <hr>
                <div class="row">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('kelulusanpaud') }}" class="btn btn-thoriq {{ Request::is('kelulusan/paud*') ? 'disabled':'' }}">
                            <h5 class="lead px-5">PAUD</h5>
                        </a>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('kelulusantpa') }}" class="btn btn-thoriq {{ Request::is('kelulusan/tpa*') ? 'disabled':'' }}">
                            <h5 class="lead px-5">TPA</h5>
                        </a>
                    </div>
                </div>
                <hr>
            </div>

            <!-- Form -->
            @yield('content')
            <!-- Form -->
        </div>


        <!-- Footer -->
        <div class="container-fluid p-5 footer">
            <div class="row d-flex justify-content-center align-items-center text-center p-5">
                <div class="col-sm-12 col-md-12">
                    <span class="h6">PAUD Thoriqul Jannah</span><br>
                    <span>+62 811-2347-187</span><br>
                    <span>Dusun Babakan RT.02 RW.08 Desa Pamulihan Kec. Pamulihan Sumedang</span><br>
                    <a href="https://api.whatsapp.com/send/?phone=+628112347187&text=Assalamu+%27alaikum.&type=phone_number&app_absent=0" target="_blank" class="btn btn-dark rounded-circle"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://www.instagram.com/koberthoriquljannah/" target="_blank" class="btn btn-dark rounded-circle"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        @yield('script')
</body>

</html>