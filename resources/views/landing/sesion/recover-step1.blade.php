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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <style>
        .solicita:hover{
            background: #da8b0c !important;

            color: white;

        }
        .solicita{
            background: #f5a82d !important;
            color: white;
        }
        .btn-outline-secondary {
            color: #34AD54;
            border-color: #34AD54;
        }
        .btn-outline-secondary:hover {
            color: white;
            background:  #34AD54;
            border-color: #34AD54;
        }
        .error-message{
            color: red;

        }
        .texto-p{
        font-size: 20px;
        }
        .texto-solicita-verde{
                font-size: 40px;
                color: #52ba42;
                text-align: center;
        }
        input[type="text"]{
            width:60%; 
        }
        @media only screen and (max-width: 768px) {
            input[type="text"]{
                font-size: 15px;
                width: 80%;
            }
            .texto-p{
                font-size: 14px;
                text-align: left;
            }
            .texto-solicita-verde{
                font-size: 30px;
                color: #52ba42;
                text-align: center;
            }
            .error-message{
                font-size: 14px;
                color: red;
            }
        }
        @media only screen and (max-width: 460px){
            input[type="text"]{
                font-size: 12px;
                width: 100%;
            }
            .texto-p{
                font-size: 14px;
                text-align: left;
            }
            .texto-solicita-verde{
                font-size: 25px;
                color: #52ba42;
                text-align: center;
            }
            .error-message{
                font-size: 12px;
                color: red;
            }
            

        }
        
    </style>
</head>

<body >
    
{{--Menú--}}
@include('components.landing.cuerpo._menu')

{{--Mi perfil--}}
    <div class="justify-content-center container-fluid" style="margin-top: 40px; margin-bottom:40px;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{session('success')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{session('status')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{session('danger')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif
            @if (session('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{session('email')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif
            <form action="{{route('password.email')}}" method="POST">
            @csrf
            <p class="texto-solicita-verde" style="margin-bottom: 15px;">Recuperar contraseña</p>
            <p class="texto-p">Escribe tu dirección de correo electrónico con el que te registraste y te haremos llegar las instrucciones para recuperar tu contraseña</p>
            <br />
            <center>
                <input type="text" class="form-control Carot ExtraLight" name="campo" placeholder="correo electrónico o telefono"  required>
                @error('campo')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </center>
        
            <br />
            <center><button type="submit" class="btn" style="background: #38A937; color:white;">Recuperar Contraseña</button></center>
        </form>
            </div>
            <div class="col-2"></div>
        </div>
           
    </div>



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