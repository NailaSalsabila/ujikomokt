<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand" style="font-family: papyrus"><b>AdMin</b></a>
        <ul class="navbar-nav">
           @guest
           <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
             </li>
           @endguest
            @auth
                @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}" class="nav-link">User</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.produk') }}" class="nav-link">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kategori') }}" class="nav-link">Kategori</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.transaksi') }}" class="nav-link">Transaksi</a>
                </li>
                @endif
            @endauth
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>
</nav>