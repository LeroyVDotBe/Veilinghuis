<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ route('index') }}" class="navbar-brand">
            <span class="brand-text font-weight-light">Veilinghuis</span>
        </a>
        <div class="collapse navbar-collapse order-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
            </ul>
        </div>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }}<i class="fas fa-sort-down pl-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
            @endauth
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>
