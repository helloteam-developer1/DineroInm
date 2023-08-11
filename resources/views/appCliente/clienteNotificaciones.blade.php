
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Notificaciones</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/assets/aplicacionCliente/Grupo 977.png') }}">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b34d6606d6.js" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backoffice/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app-clientes-estilos/estilos-appclientes.css') }}">
    @stack('css')
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    @livewireStyles
    @livewireScripts

    <style>
      .oscuro{
        font-weight: 900;
      }
        .solicita:hover{
            background: #da8b0c !important;

            color: white;

        }
        .solicita{
            background: #f5a82d !important;
            color: white;
        }
        .btn-verde:{
            background: #38A937
        }
        .btn-verde:hover{
            color: #e0fc70;
        }
        /*Estlos de fuentes*/
        @font-face {
        font-family: 'CarotSans-Medium';
        src: url("./fonts/CarotSans-Medium.otf") format('woff');
      }
      @font-face {
        font-family: 'CarotSans-Regular';
        src: url("./fonts/CarotSans-Regular.otf") format('woff');
      }
      @font-face {
        font-family: 'CarotSans-ExtraLight';
        src: url("./fonts/CarotSans-ExtraLight.otf") format('woff');
      }
      @font-face {
        font-family: 'CarotSans-Bold';
        src: url("./fonts/CarotSans-Bold.otf") format('woff');
      }
      @font-face {
        font-family: 'CarotSans-Light';
        src: url("./fonts/CarotSans-Light.otf") format('woff');
      }
      .texto-carotSans--Medium{
        font-family: 'CarotSans-Medium';
      }
      .texto-carotSans--Regular{
        font-family: 'CarotSans-Regular';
      }
      .texto-carotSans--ExtraLight{
        font-family: 'CarotSans-ExtraLight';
      }
      .texto-carotSans--Bold{
        font-family: 'CarotSans-Bold';
      }
      .texto-carotSans--Light{
        font-family: 'CarotSans-Light';
      }
    </style>
</head>

<body >

{{--Menú Cliente--}}
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
  <div class="container-fluid">
      {{--Logo Dinero Inmediato--}}
      <a class="navbar-brand" href="{{route('dashboard')}}">
          <img src="{{ asset('img/assets/aplicacionCliente/Grupo 24.png') }}" width="150" class=""
              style="margin-left: 20px; margin-top: 20px; margin-bottom: 20px;" />
      </a>
      {{--Boton DropDawn de notificaciones--}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      {{--Listado de Notificaciones --}}
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                  <a class="" aria-current="page"
                      href="{{ route('miPrestamo') }}">
                      <img class="m-1" src="{{ asset('img/assets/aplicacionCliente/Grupo 946.png') }}"
                          alt="">
                      &nbsp;Mi préstamo
                  </a>
              </li>

              <li class="nav-item">
                  <div class="dropdown">
                      <button class="btn dropdown-toggle bx"
                          type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:#39A935; font-weight:800;">
                          <img class="m-1" src="{{ asset('img/assets/aplicacionCliente/Grupo 262.png') }}"
                              alt="">
                          &nbsp;&nbsp;&nbsp;Notificaciones
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          @if (!empty($notificacion))
                              @foreach ($notificacion as $n)
                                  <li>
                                      <a href="{{ url('cliente-notificaciones', $n->id_notf) }}">
                                          <div class="card" style="width: 18rem;">
                                              <div class="card-body">
                                                  <h5 class="card-title">{{ $n->titulo_notf }}</h5>
                                                  <h6 class="card-subtitle mb-2 text-muted">{{ $n->sub_notf }}
                                                  </h6>
                                                  <p class="card-text">
                                                      {{ Str::limit($n->cuerpo, 40, '...') }}
                                                  </p>
                                              </div>
                                          </div>
                                      </a>
                                  </li>
                              @endforeach
                              <li>
                                  <a href="{{ route('cliente-notificaciones', 0) }}"
                                      class="btn btn-secondary btn-block" style="background-color: #39A935;">Ver
                                      todas las notificaciones.</a>
                              </li>
                          @else
                              <li>
                                  <div class="card" style="width: 18rem;">
                                      <p>No tienes notificación</p>
                                      <hr />
                                      <a href="{{ route('cliente-notificaciones', 0) }}"
                                          class="btn btn-secondary btn-block" style="background-color: #39A935; border:none;">Ver todas las notificaciones.</a>
                                  </div>
                              </li>
                          @endif
                      </ul>
                  </div>

              </li>
              
              <li class="nav-item">
                  <a class="" aria-current="page"
                      href="{{ route('solicitar-credito') }}">
                      <img class="m-1" src="{{ asset('img/assets/aplicacionCliente/Grupo 264.png') }}"
                          alt="">
                      Solicitud de nuevo crédito
                  </a>
              </li>
              <li class="nav-item">
                  <a class=" " aria-current="page"
                      href="{{ route('dashboard') }}">
                      <img class="ms-3"
                          src="{{ asset('img/assets/aplicacionCliente/ICONO_DOC E INF_ GRIS.svg') }}"
                          alt="">
                      &nbsp;&nbsp;&nbsp;Documentación e información
                  </a>
              </li>
              <li class="nav-item dropdown">
                  <a class=" dropdown-toggle " href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <img class="ms-3" src="{{ asset('img/assets/aplicacionCliente/Grupo 397.png') }}"
                          alt="">
                      &nbsp;&nbsp;Ajustes
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li>
                          <a class="dropdown-item" href="{{ route('miperfil') }}">
                              <img class="me-2" src="{{ asset('img/assets/aplicacionCliente/Grupo 947.png') }}"
                                  alt="">
                              Mi perfil
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="{{ route('contacto') }}">
                              <img class="me-2" src="{{ asset('img/assets/aplicacionCliente/Grupo 950.png') }}"
                                  alt="">
                              Contacto
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <form action="/logout" method="POST">
                              @csrf
                              <a class="dropdown-item" href="#" onclick="this.closest('form').submit()">
                                  <img class="me-2"
                                      src="{{ asset('img/assets/aplicacionCliente/Grupo 948.png') }}"
                                      alt="">
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


<div class="container">
  <br>
  <h1 class="font-bold text-center" style="color: #4A9D22; font-size: 50px;">Notificaciones</h1>
  <br />
  <h1 class="font-bold text-center" style="color: #F5A733;">

  </h1>

</div>

<div class="container" style="background-color: 	#dedede;">
<div class="row">
    <div class="col-auto p-4">
      @if (count($notificaciones))
        @if ($id>0)
         <livewire:app-cliente.notificacion id="{{$id}}"/>
        @endif

        @foreach ($notificaciones as $n)
        @if ($id==$n->id_notf)
        {{--Si se selecciona una notificación se usa el componente para poder mostrarla hasta arriba--}}
        @else
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$n->titulo_notf}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$n->sub_notf}}</h6>
                <p class="card-text">{{$n->cuerpo}}</p>
                <img src="/img/assets/aplicacionCliente/ELIMINAR.svg" style="float:right; cursor:pointer;" onclick="openModal()"></img>
              </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: red;">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Esta apunto de eliminar definitivamente {{$n->titulo_notf}}?
                  </div>
                  <div class="modal-footer">
                    <form action="{{route('notificacion.destroy',$n->id_notf)}}" method="POST">
                    <center>
                      <button type="button" class="btn  btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </center>
                  </form>
                  </div>
                </div>
              </div>
            </div>
        @endif
        @endforeach
      @else
        <div class="card ">
          <div class="card-body">
            <h3 class="text-center">Sin Notificaciones.</h3>
          </div>
        </div>
        <br />
      @endif
    </div>
</div>

</div>


<br><br><br><br><br>

{{--Fotter--}}

@include('components.landing.cuerpo._fotterClienteBootstrap')



<!-- Modal Confirmación Eliminar-->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/landing/sendEmail.js') }}"></script>
    <script src="{{ asset('js/landing/modal-register.js') }}"></script>
    @stack('js')
</body>

</html>

