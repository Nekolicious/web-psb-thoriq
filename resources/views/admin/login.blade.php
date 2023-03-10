<!DOCTYPE html>
<html class="h-100" lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="h-100 bg-thoriq">
    <div class="h-100 gradient-form header-thoriq">
        <div class="container-fluid h-100">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="card col-sm-12 col-md-8 text-center p-2">
                    <h1 class="display-6 m-4">Admin Login</h1>
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                    @endif
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col m-4 text-start">
                            <form action="{{ route('loginaction') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputUsername" class="form-label">Username</label>
                                    <input type="text" name="name" class="form-control" id="inputUsername" aria-describedby="usernameHelp" placeholder="Masukkan Username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Masukkan Password" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-thoriq">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="col m-4 text-center bg-white">
                            <img src="{{ asset('img/logoatthoriq.png') }}" width="200px" height="200px" alt="thoriquljannah">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>