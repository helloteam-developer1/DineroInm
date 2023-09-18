<div>
    <style>

        .notify--orange {
            background-color: orange; /* Cambiar el color a naranja o el color deseado */
            color: white; /* Cambiar el color del texto si es necesario */
        }
    
        
        .with-margin-right {
          
          margin-left: 130px;
          
        }
    
        /* Estilos generales para todas las pantallas */
        
    
        /* Estilos para pantallas grandes (mayor o igual a 992px) */
        @media (min-width: 992px) {
            
            .row.d-flex.align-items-center {
                margin-top: 16px; /* Margen superior en pantallas grandes */
            }
            .col-lg {
                font-size: 1rem; /* Tamaño de letra en pantallas grandes */
            }
    
        }
    
    
        @media (max-width: 767px) {
            .collapse.navbar-collapse {
                background-color: #f6f6f6; /* Fondo gris */
                width: 100%; /* Ajustar el ancho al 60% del contenedor */
                right: 0; /* Alinear el menú a la derecha */
            }
    
            .dropdown-menu {
                min-width: 230px;
                max-width: 230px;
            }
    
            /* Estilos para dispositivos móviles con un ancho máximo de 767px */
            ul.navbar-nav {
                width: 205px;
                margin-left: 5px;
                margin-top: 15px;
            }
            .with-margin-right {
          
            margin-left: 30%;
            }
            #myImg {
                margin-right: 12px; /* Cambia el valor según tus necesidades */
            }
        }
    </style>
    
    <nav class="navbar navbar-expand-lg navbar-light navbar-collapse" style="background-color: white;">
        <div class="container-fluid">
            {{--Logo Dinero Inmediato--}}
            <a class="navbar-brand" href="{{route('dashboard')}}">
                <img src="{{ asset('img/assets/aplicacionCliente/Grupo 24.png') }}" width="100" class="ms-3 my-2 me-auto" />
            </a>
            {{--Boton DropDawn de notificaciones--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{--Listado de Notificaciones --}}
            <div  style=" margin-top: 10px;" class="collapse navbar-collapse justify-content-center with-margin-right" id="navbarSupportedContent" >
                <ul class="navbar-nav me-auto mb-1 mb-lg-0" >


                <li style="margin-top: 0px;">
                    <a class="{{ Request::is('miPrestamo') ? 'active' : null }}" aria-current="page" href="{{ route('miPrestamo') }}">
                    
                        <div class="row" style="font-size: 15px;">
                            <div class="col-auto margin-top: 23px; ">
                                <img  id="myImg" class="col align-items-center" style="margin-left: 7px; "  src="{{ asset('img/assets/aplicacionCliente/Grupo 946.png') }}" alt="">
                                &nbsp;&nbsp;&nbsp;&nbsp;Mi préstamo
                            </div>
                            <div class="col">
                          
                            </div>
                        </div>
                    </a>
                </li><br>

                    
                    <li class="nav-item dropdown" style="margin-top: -6px; ">
                        
                        <div class="btn dropdown-toggle {{ Request::is(Request::path()) ? 'oscuro' : null }}"
                                align-items-start type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false" role="button"aria-expanded="false" 
                                style="font-weight: 700; color: #02070A; font-size: 15px; ">
                            <img  class="col" src="{{ asset('img/assets/aplicacionCliente/Grupo 262.png') }}" alt="">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Notificaciones
                            @if ($not > 0)
                                @if ($not >= 99)
                                    <span class="notify notify--orange">+99</span>
                                @else
                                    <span class="notify notify--orange">{{ $not }}</span>
                                @endif
                            @endif
                        </div>
                                   
                        <ul class="dropdown-menu" style="align-items: center;  background-color: #f9f9f9;" aria-labelledby="navbarDropdown">

                             <li>
                                @if (!empty($notificacion))
                                    @foreach ($notificacion as $n)
                                        <li>
                                            <a href="{{ url('cliente-notificaciones', $n->id_notf) }}">
                                                <div style="padding: 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                    <h5 class="card-title">{{ $n->titulo_notf }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $n->sub_notf }}</h6>
                                                    <p class="card-text">{{ Str::limit($n->cuerpo, 30, '...') }}</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                              
                                        <a href="{{ route('cliente-notificaciones', 0) }}" class="btn btn-secondary btn-block" style="background-color: #39A935;">Ver todas las notificaciones.</a>
                               
                                @else
                               
                                <div style="background-color: #f9f9f9; border-radius: 4px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <p>No tienes notificación</p>
                                    <a href="{{ route('cliente-notificaciones', 0) }}" class="btn btn-secondary btn-block" style="background-color: #39A935;">Ver todas las notificaciones.</a>
                                </div>

                            
                                @endif
                            </li>
                        </ul>
                    </li>
                    <br>   

                    <li>
                        <a class="{{ Request::is('solicitar-credito') ? 'active' : null }} d-flex align-items-center" aria-current="page" href="{{ route('solicitar-credito') }}">
                            <div class="row " style="margin-top: 5px;">
                                <div class="col-auto">
                                    <img class="col align-items-center" style="margin-left: 7px;" src="{{ asset('img/assets/aplicacionCliente/Grupo 264.png') }}" alt="">
                                </div>
                                <div class="col" >
                                Solicitud de nuevo crédito
                                </div>
                            </div>
                        </a>
                    </li><br>

                    
                

    


                  
                    <li>
                        <a class="{{ Request::is('dashboard') ? 'active' : null }} d-flex align-items-center" aria-current="page" href="{{ route('dashboard') }}">
                            <div class="row" style="font-size: 15px; margin-top: 5px;" >
                                <div class="col-auto">
                                    <img class="col align-items-center" style="margin-left: 10px;  margin-top: -5px;" src="{{ asset('img/assets/aplicacionCliente/ICONO_DOC E INF_ GRIS.svg') }}" alt="">
                                </div> 
                                <div class="col ms-2 ms-sm-0">
                                Documentación e información

                                </div>
                            </div>
                        </a>
                    </li><br>

                    <li class="nav-item dropdown">
                        <div class="dropdown-toggle  " role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 500; color: #02070A;">
                            
                            <img class="col"  id="myImg" style="margin-left: 10px; margin-top: 3px; font-size: 15px;"src="{{ asset('img/assets/aplicacionCliente/Grupo 397.png') }}" alt="">
                            &nbsp;&nbsp;&nbsp;&nbsp;Ajustes
                        </div>
                        <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('miperfil') }}">
                                    <img class="me-2" src="{{ asset('img/assets/aplicacionCliente/Grupo 947.png') }}" alt="">
                                    Mi perfil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('contacto') }}">
                                    <img class="me-2" src="{{ asset('img/assets/aplicacionCliente/Grupo 950.png') }}" alt="">
                                    Contacto
                                </a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="this.closest('form').submit()">
                                        <img class="me-2" src="{{ asset('img/assets/aplicacionCliente/Grupo 948.png') }}" alt="">
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
