<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Bayar</title>
</head>
<body>
    @include('template.nav')
   <div class="container mt-5">
    <h3 class="text-center">Upload Bukti Pembayaran</h3>
    <hr>
    <br>
    <form action="{{ route('prosesbayar',$detailtransaksi->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset($detailtransaksi->produk->foto) }}" alt="" class="card-img-top">
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $detailtransaksi->produk->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($detailtransaksi->produk->harga,0,'.','.') }}</p>
                        <p class="card-text">Qty:  {{ $detailtransaksi->qty }}</p>
                        <p class="card-text">Total Rp. {{ number_format($detailtransaksi->totalharga,0,'.','.') }}</p>
                        <hr>
                        <label for="" class="form-control">Bukti Bayar</label>
                        <input type="file" name="bukti" accept="img/*" required class="form-control mt-3">
                        <hr>
                        <h5 class="card-title">Keterangan :</h5>
                        <p class="card-text">Silahkan Upload Bukti Pembayaran Anda !</p>
                        <br>
                        <button type="submit" class="btn btn-warning">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>