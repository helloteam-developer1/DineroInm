<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand navbar-light border shadow">
    <div class="container-fluid">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class=" col-4 col-sm-4 col-md-4 col-lg-2 offset-sm-4 offset-md-4 offset-lg-1 me-5" id="logoDI">
                    <img src="{{ asset('img/logo.png') }}" width="120" class="my-2" alt="logo"
                        onclick="window.location='{{ route('dashboard.backoffice') }}'" style="cursor: pointer;">
                </div>
                <div class=" col-4 col-sm-10 col-md-8 col-lg-4 offset-2 offset-sm-1 offset-md-2 offset-lg-4 mt-4">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav navDestop">
                            <li class="nav-item ms-4">
                                @if (Request::is('clientes'))
                                    <a class="nav-link" href="{{ route('dashboard.backoffice') }}"
                                        style="color:#38a937;">
                                        <img src="{{ asset('img/backoffices/CLIENTES.png') }}" width="20"
                                            alt="CLIENTES"> Clientes
                                    </a>
                                @else
                                    <a class="nav-link" href="{{ route('dashboard.backoffice') }}">
                                        <img src="{{ asset('img/backoffices/Grupo 979.png') }}" width="20"
                                            alt="CLIENTES"> Clientes
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item ms-4">
                                @if (Request::is('notificaciones'))
                                    <a class="nav-link {{ Request::is('notificaciones') ? 'disabled' : null }}"
                                        href="/notificaciones" style="color:#38a937;">
                                        <img src="{{ asset('img/backoffices/Grupo 977.png') }}" width="20"
                                            alt="NOTIFICACION">
                                        Notificaciones
                                    </a>
                                @else
                                    <a class="nav-link {{ Request::is('notificaciones') ? 'disabled' : null }}"
                                        href="/notificaciones">
                                        <img src="{{ asset('img/backoffices/ICONO_NOTIFICACIONES.svg') }}"
                                            width="20" alt="NOTIFICACION">
                                        Notificaciones
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item dropdown ms-4">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/backoffices/ICONO AJUSTES.svg') }}" width="20"
                                        alt="Ajustes">
                                    Ajustes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="/perfil"><img style="margin-right: 10px"
                                                src="{{ asset('img/backoffices/ICONO_PERFIL.svg') }}" width="20"
                                                alt="perfil">Mi Perfil</a>
                                    </li>
                                    <hr>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a class="dropdown-item" href="#"
                                                onclick="this.closest('form').submit()">
                                                <img class="me-2"
                                                    src="{{ asset('img/assets/aplicacionCliente/Grupo 948.png') }}"
                                                    width="20" alt="No se encontro icono cerrar sesión BackOffice">
                                                Cerrar Sesión
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- inicio menu burger -->
                    <div class="container">
                        <div class="MeinBurger navMovil">
                            <div class="burger">
                                <button>
                                    <span class="top-line"></span>
                                    <span class="middle-line"></span>
                                    <span class="botton-line"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="Menu close">
                        <div class="enlaces">
                            <ul>
                                <li><a href="/clientes" style="color: #38a937;"><img
                                            src="{{ asset('img/backoffices/CLIENTES.png') }}" width="15"
                                            alt=""> Clientes</a></li>
                                <li><a href="/notificaciones"><img
                                            src="{{ asset('img/backoffices/ICONO_NOTIFICACIONES.svg') }}"
                                            width="15" alt="">Notificaciones</a></li>
                                <li>
                                    <a href="#"><img src="{{ asset('img/backoffices/ICONO AJUSTES.svg') }}"
                                            width="15" alt="">Ajustes</a>
                                    <ul>
                                        <li><a href="/perfil"><img
                                                    src="{{ asset('img/backoffices/ICONO_PERFIL.svg') }}"
                                                    width="15" alt="">Mi Perfil</a></li>
                                        <li><a href=""><img
                                                    src="{{ asset('img/backoffices/ICONO_CONTACTO.svg') }}"
                                                    width="15" alt="">Contacto</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a class="dropdown-item" href="#"
                                            onclick="this.closest('form').submit()">
                                            <img class="me-2"
                                                src="{{ asset('img/assets/aplicacionCliente/Grupo 948.png') }}"
                                                alt="">
                                            Cerrar Sesión
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- fin menu burger -->
            </div>
        </div>
    </div>
</nav>
