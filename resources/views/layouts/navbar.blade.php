<header data-bs-theme="dark">
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>{{ env('APP_NAME') }}</strong>
            </a>
            <div class="d-flex">
                @if(auth()->check())
                    <?php
                        $carts = auth()->user()->carts()->count();
                    ?>
                    <div>
                        <a type="button" class="btn btn-light position-relative btn-sm mx-3" href="{{ route('carts.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            @if($carts > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $carts }}
                                @endif
                            </span>
                        </a>
                    </div>

                    @if(auth()->user()->role == 'admin')
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm mx-1">Dashboard</a>
                    </div>
                    @endif

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->first_name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders') }}">Order History</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div>
                        <a href="/login" class="btn btn-light btn-sm">Login</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>