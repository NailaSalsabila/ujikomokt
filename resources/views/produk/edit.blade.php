<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <title>Edit Produk</title>
</head>
<body>
    @include('tem.nav')
    <div class="container mt-5">
        <h3 class="text-center">Edit Produk</h3>
        <hr>
        <br>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.posteditproduk',$produk->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <label for="">Nama :</label>
                    <input type="text" name="name" required class="form-control" value="{{ $produk->name }}">
                    <label for="">Harga :</label>
                    <input type="number" name="harga" required class="form-control" value="{{ $produk->harga }}">
                    <label for="">Foto :</label>
                    <input type="file" name="foto" accept="img/*" required class="form-control">
                    <label for="">Keterangan :</label>
                    <input type="text" name="keterangan" accept="img/*" required class="form-control">
                    <label for="">Kategori :</label>
                    <select name="kategori_id" class="form-control">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>