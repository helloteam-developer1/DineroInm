

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Dinero Inmediato</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

        
    @media (max-width: 767px) {
  .icons {
    flex-wrap: wrap;
    justify-content: center;
  }

  .icons img {
    margin: 5px; /* Ajusta el valor según el espaciado deseado entre las imágenes */
  }
  @media (max-width: 767px) {
  .input-group.icons {
    margin-left: -30px;
  }
}

/* Estilos para pantallas más grandes (web) */
@media (min-width: 768px) {
  .input-group.icons {
    margin-left: -40px;
  }}
}

    </style>
</head>

<body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0 shadow">
        <a href="index.html" class="navbar-brand p-0">
            <img src="{{ asset('img/logo.png')}}" width="180"  class="d-inline-block align-text-top ml-10" style="margin-top: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse bg-white  p-3" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active text-dark itemNav">Inicio</a>
                <a href="about.html" class="nav-item nav-link text-dark itemNav">Acerca de Nosotros</a>
            </div>

            <a href="" class="btn btn-outline-secondary py-2 px-4 ms-3 itemNav">Inicio de Sesión</a>
            <a href="" class="btn btn-primary py-2 px-4 ms-3 itemNav solicita">¡Solicita tu pr&eacute;stamo ya!</a>
        </div>
    </nav> --}}

<div class="">
    <div class="antialiased bg-gray-100 dark-mode:bg-gray-900 ">
    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 shadow z-40">
        <div x-data="{ open: false }" class="flex flex-col mx-auto md:items-center md:justify-between md:flex-row px-5">
        <div class="flex flex-row items-center justify-between">
            <a href="{{ route('home') }}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                <img src="{{ asset('img/logo.png')}}" width="120" class="imgLogo my-3">
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-10 h-10">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row items-center">
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav" href="{{ route('home') }}">Inicio</a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline itemNav"  data-bs-toggle="modal" data-bs-target="#acercaNosotros" style="cursor:pointer">Acerca de Nosotros</a>
            <a class="px-4  mt-4 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                <button class="btn btn-outline-secondary itemNav btnLogin" onclick="location.href='{{route('login')}}'" >Inicio de Sesión</button>
            </a>
            {{-- <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">

                <button class="btn  itemNav solicita">¡Solicita tu pr&eacute;stamo ya!</button>
            </a> --}}

        </nav>
        </div>
    </div>
    </div>
</div>



    <main>
        <div class="mt-1">
            @yield('content')

        </div>
    </main>
    @include('landing.modales.email')
    @yield('modales')

    <x-modal-footer titulo="terminos-condiciones" idm="terminosCondiciones"/>
    <x-modal-footer titulo="quienes-somos" idm="quienesSomos"/>
    <x-modal-footer titulo="acerca-nosotros" idm="acercaNosotros"/>
    <x-modal-footer titulo="politica-privacidad" idm="politicaPrivacidad"/>

    <footer>
        <div class="container grid grid-cols-4 pt-5 pb-3 justify-items-center centerTextMovile">

            {{-- contacto  Mobile --}}

            <div class="grid grid-cols-1 col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 contactMobile block sm:block md:hidden lg:hidden xl:hidden">
                <div>
                    <span class="text-dark font-24"><strong>Cont&aacute;ctanos</strong></span>
                </div>
                <div>

                    <form id="sendContactEmail" data-info="mobile">
                        <div class="max-w-2xl mx-auto">
                            <div class="relative mb-6">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    </div>
                                    <input type="email" id="emailContact-mobile" class=" text-gray-900 text-sm   focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5    dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo" required>
                                </div>

                                <div class="flex">
                                    <textarea type="text" id="comentContact-mobile" class="  bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm   p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comentario" required></textarea>
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn w-100 p-2 text-white" style="background: #38A937;"> <strong>Enviar</strong> </button>
                                </div>

                            </div>
                        </form>
                    </div>

            </div>


            <div class="col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 grisd-footer">
                <span class="font-24" style="color: #617E21;"><strong>Informaci&oacute;n legal</strong></span>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#terminosCondiciones" class="pointer font-24"> Terminos y condiciones </span>
                    </div>
                    <div class="text-white">
                        <span data-bs-toggle="modal" data-bs-target="#politicaPrivacidad" class="pointer font-24"> Pol&iacute;tica y aviso de privacidad </span>
                    </div>

                    <div class="mt-5 " >
                        <span class="text-dark font-24 mb-4" ><strong>¿Te gust&oacute; la p&aacute;gina?</strong></span>
                        <div class="mt-3">

                            <center>
                                <img class="imgManosmobile " src="{{ asset('img/landing/index/Grupo 63.png') }}" width="50%" alt="dislikeAndLike">
                            </center>
                            <img class="imgManosdesk" src="{{ asset('img/landing/index/Grupo 63.png') }}" width="50%" alt="dislikeAndLike">
                        </div>
                    </div>
            </div>
            <div class="col-span-4 sm:col-span-4 md:col-span-1 lg:col-span-1 xl:col-span-1 my-2 grisd-footer">
                <span style="color: #617E21;">
                    <strong class="font-24">Acerca al cliente</strong>
                </span>
                <div class="text-white">
                    <a href="/preguntasfrec" style="color: white"><span class="pointer font-24"> Preguntas Frecuentes</span></a>
                </div>
                <div class="text-white">
                    <span data-bs-toggle="modal" data-bs-target="#quienesSomos" class="pointer font-24"> Qui&eacute;nes somos? </span>
                </div>
                <div class="text-white">
                    <span data-bs-toggle="modal" data-bs-target="#acercaNosotros" class="pointer font-24"> Acerca de nosotros </span>
                </div>

                <div class="mt-5 input-group icons w-full" style= display: flex; align-items: center; justify-content: center;">
                    <div style="display: flex; align-items: center;">
                        <img class="mr-5" src="{{ asset('img/landing/index/Grupo 50.png') }}" width="50">
                        <img src="{{ asset('img/landing/index/Grupo 48.png') }}" width="50">
                    </div>
                </div>

            </div>

            {{-- contacto Escritorio --}}
            <div class="col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 w-100 my-2 hidden sm:hidden md:block lg:block xl:block grisd-footer">
                <form id="sendContactEmail" data-info="desktop">
                        <span class="text-dark font-24 ml-10"><strong>Cont&aacute;ctanos</strong></span>
                        <input hidden id="csrf_token" type="text" value="{{ csrf_token() }}" name="_token">

                        <div class="max-w-2xl mx-auto">
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                </div>
                                <input type="email" id="emailContact-desktop" class=" inputContact font-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo" required>
                            </div>

                            <div class="flex">
                                <textarea rows="5" type="text" id="comentContact-desktop" class=" inputContact font-24 rounded-none rounded-r-lg bg-gray-50  text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" style="resize: none;" placeholder="Comentario" required></textarea>
                            </div>
                            <div class="text-right mt-3">
                                <button class="btn px-5 text-white btn-verde" style=" font-size: 28px"> <strong>Enviar</strong> </button>
                            </div>
                        </div>
                    </form>

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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/landing/sendEmail.js') }}"></script>
    <script src="{{ asset('js/landing/modal-register.js') }}"></script>
    @stack('js')
</body>

</html>
