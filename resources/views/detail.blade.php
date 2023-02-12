<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Detail</title>
</head>
<body>
    @include('template.nav')
   <div class="container mt-5">
    <h3 class="text-center">Detail Produk</h3>
    <hr>
    <br>
    <form action="{{ route('postkeranjang',$produk->id) }}" method="POST" class="form-group">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset($produk->foto) }}" alt="" class="card-img-top">
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($produk->harga,0,'.','.') }}</p>
                        <hr>
                        <input type="number" name="qty" required placeholder="0" min="1" class="form-control">
                        <hr>
                        <h5 class="card-title">Keterangan :</h5>
                        <p class="card-text">{{ $produk->keterangan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kategori : {{ $produk->kategori->name }}</h5>
                    </div>
                    <button type="submit" class="btn btn-warning">Beli</button>
                </div>
            </div>
        </div>
    </form>
   </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>