<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Siswa Baru PAUD Thoriqul Jannah</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/4d73dab561.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body class="h-100">
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

    <!-- Header -->
    <div class="h-100 gradient-form header-thoriq text-white">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center text-center h-100">
                <div class="col-sm-12 col-md-6">
                    <span class="lead m-1">Yayasan Thoriqul Jannah</span>
                    <h1 class="m-1">PAUD Thoriqul Jannah</h1>
                    <a href="{{ route('daftar') }}" class="btn btn-thoriq btn-hovered position-relative py-3 px-5 rounded-pill m-1 fw-bold">
                        Daftar Online
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6 text-center">
                    <img src="{{ asset('img/logoatthoriq.png') }}" width="200px" height="200px" alt="thoriquljannah">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Info -->
    <div class="container-fluid bg-thoriq">
        <div class="row d-flex justify-content-center align-items-center text-center p-5">
            <div class="col-sm-12 col-md-6 my-2">
                <img class="img-fluid" src="{{ asset('img/sekolah2.jpg') }}" alt="info-thoriquljannah">
            </div>
            <div class="col-sm-12 col-md-6 my-2 text-white text-start">
                <h1 class="header-info px-2">Sekilas Tentang Kami</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, est at sapiente placeat
                    explicabo rem
                    odio. Temporibus odit soluta quod totam veritatis, laudantium nostrum ratione tempore placeat
                    aspernatur consectetur? Ut!</p>
            </div>
        </div>
    </div>
    <!-- Info -->

    <!-- Map -->
    <div class="container-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d495.1330760219371!2d107.82966029936904!3d-6.882864149338549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68daf411a45a01%3A0xec323817242b8503!2sPaud%20Thoriqul%20Jannah!5e0!3m2!1sen!2sid!4v1676513189201!5m2!1sen!2sid" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map End -->

    <!-- Click Here -->
    <div class="container-fluid click-bg text-white p-5">
        <div class="row d-flex justify-content-center align-items-center text-center p-5">
            <div class="col-sm-12 col-md-12">
                <h1 class="display-6 my-4">Daftar Online Sekarang</h1>
                <a href="{{ route('daftar') }}" class="btn btn-lg btn-light btn-hovered rounded-pill px-4 py-3">
                    <span>Klik Disini</span>
                    <i class="fa-regular fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Click Here End -->

    <!-- Footer -->
    <div class="container-fluid p-5 footer">
        <div class="row d-flex justify-content-center align-items-center text-center p-5">
            <div class="col-sm-12 col-md-12">
                <span class="h6">PAUD Thoriqul Jannah</span><br>
                <span>+62 811-2347-187</span><br>
                <span>Dusun Babakan RT.02 RW.08 Desa Pamulihan Kec. Pamulihan Sumedang</span><br>
                <a href="https://api.whatsapp.com/send/?phone=+628112347187&text=Assalamu+%27alaikum.&type=phone_number&app_absent=0" target="_blank" class="btn btn-dark rounded-circle"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/koberthoriquljannah/" target="_blank" class="btn btn-dark rounded-circle"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</body>

</html>