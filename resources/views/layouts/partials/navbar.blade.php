<nav class="navbar navbar-expand-md navbar-light text-white shadow-sm" id="headerSidebar">
    <div class="container-fluid">
        <a class="navbar-brand text-white" class="nav-link" id="sidebarCollapse">
            <i class="fas fa-align-left"></i>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            @auth
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('perfil.edit', auth()->user()->id) }}">Configurar
                                    Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('password.edit', auth()->user()->id) }}">Cambiar
                                    contraseña</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"></a>
                    </li>
                </ul>
            @endauth
            @guest
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/register">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
