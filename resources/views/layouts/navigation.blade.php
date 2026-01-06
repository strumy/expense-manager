<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/ExpManLogo2.png') }}" alt="Bootstrap" width="30" height="24">
        Expense Manager</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            @if (Route::has('login'))
                @auth
                @if (auth()->user()->is_admin)
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Admin Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/transactions') }}">Transactions</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">User Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/user/transactions') }}">Transactions</a></li>
                @endauth
        
                <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>c
                <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Signup</a></li>
                @endif
            @endauth
            @endif
            </ul>
        </div>
    </div>
</nav>