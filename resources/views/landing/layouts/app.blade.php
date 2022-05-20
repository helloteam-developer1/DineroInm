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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @livewireStyles
    @livewireScripts
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0 shadow">
        <a href="index.html" class="navbar-brand p-0">
            <img src="{{ asset('img/logo.png')}}"  class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active text-dark">Inicio</a>
                <a href="about.html" class="nav-item nav-link text-dark">Acerca de Nosotros</a>
            </div>

            <a href="" class="btn btn-outline-secondary py-2 px-4 ms-3">Inicio de Sesión</a>
            <a href="" class="btn btn-primary py-2 px-4 ms-3">¡Solicitalo ya!</a>
        </div>
    </nav>
    <main>
        <div>
            @yield('content')

        </div>
    </main>

    <x-modal-footer titulo="terminos-condiciones" idm="terminosCondiciones"/>
    <x-modal-footer titulo="quienes-somos" idm="quienesSomos"/>
    <x-modal-footer titulo="acerca-nosotros" idm="acercaNosotros"/>
    <x-modal-footer titulo="politica-privacidad" idm="politicaPrivacidad"/>

    <footer>
        <div class="container pb-5">
            <div class="row">
                <div class="col-xs-12 col-md-4 mt-5">
                    <span style="color: #617E21;"><strong>Informaci&oacute;n legal</strong></span>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#terminosCondiciones" class="pointer"> Terminos y condiciones 20 </span>
                    </div>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#politicaPrivacidad" class="pointer"> Pol&iacute;tica y aviso de privacidad </span>
                    </div>
                    <div class="mt-5">
                        <img src="{{ asset('img/landing/index/Grupo 50.png') }}" width="50">
                        <img src="{{ asset('img/landing/index/Grupo 48.png') }}" width="50">
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mt-5">
                    <span style="color: #617E21;">
                        <strong>Acerca al cliente</strong>
                    </span>
                    <div class="text-white">
                        <a href="/preguntasfrec" style="color: white"><span class="pointer"> Preguntas Frecuentes</span></a>
                    </div>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#quienesSomos" class="pointer"> Qui&eacute;nes somos? </span>
                    </div>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#acercaNosotros" class="pointer"> Acerca de nosotros </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 mt-5">
                    <span class="text-dark"><strong>Para recibir m&aacutes; informaci&oacute;n, ingresa tu correo</strong></span>
                    <form>
                        <input type="text" class="form-control mb-3" placeholder="Correo">
                    </form>
                    <div>
                        <span class="text-dark"><strong>¿Te gusto la p&aacute;gina?</strong></span>
                        <img src="{{ asset('img/landing/index/Grupo 63.png') }}" alt="dislikeAndLike">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
