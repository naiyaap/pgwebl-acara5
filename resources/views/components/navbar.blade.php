<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{$title}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peta') }}"><i class="fa-slab fa-regular fa-map"></i> Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tabel') }}"><i class="fa-solid fa-table"></i> Tabel</a>
                    </li>
                    @guest
                        <li class="nav-item bg-primary rounded">
                        <a class="nav-link text-white" href="{{ route('login') }}"><i class="fa-solid fa-circle-user"></i> Login</a>
                    </li>
                    @endguest

                    @auth
                        <li class="nav-item bg-danger rounded">
                            <a class="nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
