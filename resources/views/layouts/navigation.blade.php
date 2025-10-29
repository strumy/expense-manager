<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ url('/') }}">Expense Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            @if (Route::has('login'))
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ url('/transactions') }}">Transactions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>c
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                </form>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endif
                @endauth
            @endif
            </ul>
        </div>
    </div>
</nav>