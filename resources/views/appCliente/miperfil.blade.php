<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Documentación e información</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/assets/aplicacionCliente/ICONO_PERFIL_VERD.png') }}" width="5px">

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
    {{--<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}
    @livewireStyles
    <style>
        .solicita:hover{
            background: #da8b0c !important;

            color: white;

        }
        .solicita{
            background: #f5a82d !important;
            color: white;
        }
        .btn-verde:{
            background: #38A937;
        }
        .btn-verde:hover{
            color: #e0fc70;
        }
        .btn-guarda{
          background: #38A937;
          color: white;
          margin-top:20px;
          width: 20%;
        }
        .btn-guarda:hover{
          background: #38A937;
          color: #e0fc70;
          margin-top:20px;
        }
        .btn-griss{
            background-color: var(--gris);
            color: var(--blanco);
        }
        .t-verde{
          color: #4A9D22;
          font-size: 2.5rem;
        }
        .centrado{
          display: flex;
          justify-content: center;
        }
        .email{
          width: 50%;
        }
        @media (max-width:500px){
          .email{
            width: 100%;
          }
          .btn-guarda{
          background: #38A937;
          color: white;
          margin-top:20px;
          width: auto;
        }
        .btn-guarda:hover{
          background: #38A937;
          color: #e0fc70;
          margin-top:20px;

        }
        .btn-griss{
            background-color: var(--gris);
            color: var(--blanco);
            font-size: 14px;
        }
        .t-verde{
          color: #4A9D22;
          font-size: 40px;
        }
        .centrado{
          display: flex;
          justify-content: center;
        }

        }
        @media (max-width:800px){
          .email{
            width: 80%;
          }
        .btn-guarda{
          background: #38A937;
          color: white;
          margin-top:20px;
          width: 40%;
        }
        .btn-guarda:hover{
          background: #38A937;
          color: #e0fc70;
          margin-top:20px;

        }
        .btn-griss{
            background-color: var(--gris);
            color: var(--blanco);
            font-size: 14px;
        }
        .t-verde{
          color: #4A9D22;
          font-size: 1.8rem;
        }
        .centrado{
          display: flex;
          justify-content: center;
        }

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
      .alerta{
        background-color: #EAF9EA;
        border-radius: 10px;
      }
      .titulo-alert{
        color: #39A935;
        margin-top: 10px;
      }
      .subt-alert{
       color:#F29100 ;
      }
      .espacio{
        margin-top: 10px;
      }
      .margin{
        border: 2px solid black;
      }
    </style>
</head>
<body>
  <livewire:app-cliente.menu-cliente/>

<div class="container">
    <br>
    <h1 class="text-center texto-carotSans--Medium t-verde" >Mi  perfil</h1>
      <livewire:app-cliente.miperfil />
    </div>
    <br />
    <!-- <h1 class="text-3xl font-bold text-center" style="color: #F5A733;">

    </h1> -->
</div>

{{--Fotter--}}
@livewireScripts
@include('components.landing.cuerpo._fotterClienteBootstrap')
<script>
  function openmodal(){
    $('#exampleModal').modal('show');
  }
</script>
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
