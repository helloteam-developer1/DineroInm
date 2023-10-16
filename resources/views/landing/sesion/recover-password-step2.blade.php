<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Dinero Inmediato</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="{{ asset('css/landing/style.css') }}" rel="stylesheet">
    @stack('css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="./css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
            background: #38A937
        }
        .btn-verde:hover{
            color: #e0fc70;
        }
        .closeModal{
            font-size: 2rem;
        }
        .modal-title{
             font-size: 2.5rem;
        }
        .acept{
            background: #38A937;
            font-size: 28px
        }
        .modal-body{
            font-size: 22px;
        }
        .btn-ver{
            background-color: #38A937;
            color: white;
            text-align: center;
            align-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .titulo-modal{
            color:#38A937;
            font-size: 40px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body onload="loaded();">

    

{{--Modal Cambio con exito--}}



{{--Menú--}}
@include('components.landing.cuerpo._menu')

@if (session('status'))
<script>
function loaded() {
    $('#exampleModal').modal('show');
    }
</script>
@endif

  
  <!-- Modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content" style="margin: 40px;">
        
         <center><h1 class="titulo-modal" id="exampleModalLabel">Cambio con éxito</h1></center>
       
        <div class="modal-body" >
          <p>Se ha creado tu contraseña con éxito, ya puedes ingresar nuevamente a nuestra aplicación.</p>
          <center><a class="btn btn-ver" href="{{route('login')}}">Iniciar sesión</a></center>
        </div>
        
        
    
      </div>
    </div>
  </div>

  <div class="content cent">
        <div class="row cent">
                <p class="texto-solicita-verde" style="padding-bottom: 25px; padding-top:15px;">Recuperar contraseña</p>
                <div class="">
                    <input type="password" class="form-control Carot ExtraLight"  placeholder="Nueva contraseña">
                    <br /> 
                    <input type="password" class="form-control Carot ExtraLight" placeholder="Confirmar contraseña">

                    <a href="" class="btn btn-verde btn-md" style="margin-top: 30px; ">Aceptar</a>    
                </div>
            </div>
        </div>
        <br />
 </div>


 
 
  

  <!-- Modal -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
