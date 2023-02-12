<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand" style="font-family: papyrus"> <b>MoKOno</b></a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
           @guest
           <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
             </li>
           @endguest
            @auth
                @if (auth()->user()->role == 'customer')
                <li class="nav-item">
                    <a href="{{ route('keranjang') }}" class="nav-link">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('summary') }}" class="nav-link">Summary</a>
                </li>
                @endif
            @endauth
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>
</nav>