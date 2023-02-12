<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Login</title>
</head>
<body>
    @include('template.nav')
    <div class="container mt-5">
        <div class="card mx-auto col-5 p-4 shadow-lg">
        <h3 class="text-center">Login</h3>
        <hr>
        <br>
        <div class="card-body">
                <form action="{{ route('postlogin') }}" method="POST" class="form-group">
                    @csrf
                    <label for="">Username :</label>
                    <input type="email" name="email" required class="form-control">
                    <label for="">Password :</label>
                    <input type="password" name="password" required class="form-control">
                    @if (Session::has('status'))
                        <div class="text-danger"><span>{{ Session::get('status') }}</span></div>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-warning">Login</button>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>