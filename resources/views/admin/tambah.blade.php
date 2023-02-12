<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Tambah User</title>
</head>
<body>
    @include('tem.nav')
    <div class="container mt-5">
        <h3 class="text-center">Tambah User</h3>
        <hr>
        <br>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.posttambahuser') }}" method="POST" class="form-group">
                    @csrf
                    <label for="">Nama :</label>
                    <input type="text" name="name" required class="form-control">
                    <label for="">Email :</label>
                    <input type="email" name="email" required class="form-control">
                    <label for="">Password :</label>
                    <input type="password" name="password" required class="form-control">
                    <br>
                    <button type="submit" class="btn btn-warning">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>