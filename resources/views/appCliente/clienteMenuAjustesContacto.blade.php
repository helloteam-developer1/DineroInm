<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Ajustes - Contacto</title>
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/ICONO_DOC E INF_ GRIS.svg">

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
    @stack('css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="./css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles
    @livewireScripts

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
<livewire:app-cliente.menu-cliente/>

<div class="container">
  <!-- fw-bold -->
  <h1 class="text-center py-3 p-medium" style="color: #4A9D22; font-size: 70px;">Contacto</h1>
  <p class="text-center py-3 p-lightt" style="color: #474747; font-size: 35px;">Si tienes alguna duda y quieres ponerte en contacto con nosotros escríbenos a</p>
  <p class="text-center p-medium" style="color: #2E2E2D; font-size: 45px;">credito@dineroinmediato.mx</p>
  
</div>

<br><br><br><br><br>

{{--Fotter--}}

    @include('components.landing.cuerpo._fotter')  

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
