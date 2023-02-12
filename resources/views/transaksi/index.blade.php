<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Home</title>
</head>
<body>
    @include('tem.nav')
    @if (Session::has('status'))
    <div class="alert alert-success"><span>{{ Session::get('status') }}</span></div>
    @endif
    <div class="container mt-5">
        <h3 class="text-center">Kelola Transaksi</h3>
        <hr>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Total Harga</th>
                    <th>Bukti Foto</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->produk->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->totalharga,0,'.','.')}}</td>
                       <td><img src="{{ asset($item->transaksi->bukti) }}" height="100"></td>
                       <td>{{ $item->transaksi->kode }}</td>
                        <td>
                            <a href="{{ route('admin.verifikasi',$item->id) }}" onclick="return confirm('yakin ?')" class="btn btn-success">Verifikasi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>