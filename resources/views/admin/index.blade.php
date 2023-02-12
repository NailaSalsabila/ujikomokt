<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Kelola User</title>
</head>
<body>
    @include('tem.nav')
    @if (Session::has('status'))
    <div class="alert alert-success"><span>{{ Session::get('status') }}</span></div>
    @endif
    <div class="container mt-5">
        <h3 class="text-center">Kelola User</h3>
        <hr>
        <br>
        <a href="{{ route('admin.tambahuser') }}" class="btn btn-warning">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('admin.edituser',$item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.deleteuser',$item->id) }}" onclick="return confirm('yakin ?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>