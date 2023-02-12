<div class="container mt-5">
    <h3 class="text-center mt-5">Produk</h3>
    <hr>
    <br>
    <div class="row">
       @foreach ($data as $item)
       <div class="col-2">
        <div class="card mt-5">
            <img src="{{ asset($item->foto) }}" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">Rp. {{ number_format($item->harga,0,'.','.') }}</p>
                <a href="{{ route('detail',$item->id) }}" class="btn btn-warning d-block">Detail</a>
            </div>
        </div>
    </div>
       @endforeach
    </div>
</div>