<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Keranjang</title>
</head>
<body>
    @include('template.nav')
    @if (Session::has('status'))
    <div class="alert alert-success"><span>{{ Session::get('status') }}</span></div>
    @endif
   <div class="container mt-5">
    <h3 class="text-center">Keranjang</h3>
    <hr>
    <br>
   @foreach ($data as $item)
   <div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset($item->produk->foto) }}" style="width: 70%" alt="" class="card-img-top">
            </div>
            <div class="col-7">
                <h5 class="card-title">{{ $item->produk->name }}</h5>
                <p class="card-text">Rp. {{ number_format($item->produk->harga,0,'.','.') }}</p>
                <hr>
                <p class="card-text">Qty : {{ $item->qty }}</p>
                <hr>
                <p class="card-text">Total Rp. {{ $item->totalharga }}</p>
            </div>
            <div class="col-2">
                <br>
                <a href="{{ route('bayar',$item->id) }}" class="btn btn-warning mt-5">Bayar</a>
                <a href="{{ route('delete',$item->id) }}" onclick="return confirm('yakin?')" class="btn btn-danger mt-5">Hapus</a>
            </div>
        </div>
    </div>
</div>
   @endforeach
   </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>