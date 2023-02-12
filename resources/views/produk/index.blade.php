<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Kelola Produk</title>
</head>
<body>
    @include('tem.nav')
    @if (Session::has('status'))
    <div class="alert alert-success"><span>{{ Session::get('status') }}</span></div>
    @endif
    <div class="container mt-5">
        <h3 class="text-center">Kelola Produk</h3>
        <hr>
        <br>
        <a href="{{ route('admin.tambahproduk') }}" class="btn btn-warning">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($item->foto) }}" height="100" alt=""></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->harga,0,'.','.') }}</td>
                        <td>{{ $item->kategori->name }}</td>
                        <td>
                            <a href="{{ route('admin.editproduk',$item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('admin.deleteproduk',$item->id) }}" onclick="return confirm('yakin ?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>