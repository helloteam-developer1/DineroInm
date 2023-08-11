<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Documentación e información</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/assets/aplicacionCliente/Grupo 976.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b34d6606d6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backoffice/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app-clientes-estilos/estilos-appclientes.css') }}">
    
    <link rel="stylesheet" href="style.css">
    
    @stack('css')
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    @livewireStyles
    <style>
        .solicita:hover {
            background: #da8b0c !important;

            color: white;

        }

        .solicita {
            background: #f5a82d !important;
            color: white;
        }

        .btn-verde: {
            background: #38A937
        }

        .btn-verde:hover {
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

        .texto-carotSans--Medium {
            font-family: 'CarotSans-Medium';
        }

        .texto-carotSans--Regular {
            font-family: 'CarotSans-Regular';
        }

        .texto-carotSans--ExtraLight {
            font-family: 'CarotSans-ExtraLight';
        }

        .texto-carotSans--Bold {
            font-family: 'CarotSans-Bold';
        }

        .texto-carotSans--Light {
            font-family: 'CarotSans-Light';
        }

        .alerta {
            background-color: #EAF9EA;
            border-radius: 10px;
        }

        .titulo-alert {
            color: #39A935;
            margin-top: 10px;
        }

        .subt-alert {
            color: #F29100;
        }

        .red {
            color: red;
        }

        .btn-Guardar {
            width: 90px;
            background-color: #38A937;
            border-radius: 5px;
            color: white;
        }

        .btn-Guardar:hover {
            color: white;
        }

        .acordiontext {
            position: relative;
            width: 100%;
            height: 50px;
            color: #3C3C3B;
            background-color: white;
            text-align: left;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid gainsboro;

        }

        .acordiontext {
            font-weight: bold;
        }
        .textAcordion{
                font-size: 1.4rem;
            }

        .acordiontext:focus {
            color: #f5a82d;
        }

        .acordionImg {
            width: 28px;
            height: 16px;
            position: absolute;
            left: 93%;
        }

        @media (max-width: 767px) {
            .col-sm-4 {
                width: 50%;
            }
            .col-sm-4 {
                width: 50%;
            }
            .textAcordion{
                font-size: 1rem;
            }
        }

        @media screen and (min-width: 768px) {
            .img-large {
                width: 70%;
                margin-right: 10px;
                height: auto;
            }
        }

        /* Estilos para pantallas pequeñas (menores a 768px) */
        @media screen and (max-width: 767px) {
            .img-small {
                width: 90%;
                
                height: auto;
            }
        }

        @media (max-width: 767.98px) {
            input[type="email"],
            input[type="text"],
            input[type="tel"]
            {
                text-align: start;
                height: 35px; /* Altura deseada para la caja de entrada */
                min-width: 180px; /* Ancho deseado para la caja de entrada */
                max-width: 180px; /* Ancho deseado para la caja de entrada */
            }
            #inputEmail33 {
            margin-top: 25px; /* Puedes ajustar este valor según tus preferencias */
            }
            #inputEmail32 {
            margin-top: 15px; /* Puedes ajustar este valor según tus preferencias */
            }
        }
        

    </style>
</head>
{{-- Si existe un estado abre la modal con dicho estado --}}
@if (session()->has('estado'))
    <body onload="correo()">
    @include('appCliente.mail.modalemail')
@else
    <body onload="openmodal()">
@endif
    

{{-- Componente Modal que muestra el estado del credito si existe una solicitud --}}
{{-- <x-appClienteComponentes.modal.modalEstatusCredito opcion="{{ $opcion }}" estado="{{ $estado }}"
    mensaje="{{ $mensaje }}" />   --}}
<x-modal-estado-solicitud></x-modal-estado-solicitud>
{{-- Menú Cliente --}}

<livewire:app-cliente.menu-cliente />
<div class="container">
    <br>
    <h1 class="text-center texto-carotSans--Medium titulo" style="color: #4A9D22; font-size: 2.597rem;">Documentación e información.</h1>
    <br />
</div>

<div class="container">
    <div class="accordion" id="accordionExample">
        {{-- Información general --}}
        <div class="accordion-item">

            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button acordiontext collapsed text-datgencred" id="butonacordeon1" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                    aria-controls="collapseOne">
                    Información general
                </button>
            </h2>


            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label  texto-carotSans--Light" style="color: #3C3C3B; font-size: 1.1rem;">
                                No.Cliente: {{ Auth::user()->num_cliente }}</label>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3"
                                class="col-sm-2 col-form-label fw-bold texto-carotSans--Regular" style="margin-bottom: 30px;" >Nombre</label>
                                
                            <div class="col-md-4 col-sm-4">
                                <input type="email" class="form-control texto-carotSans--ExtraLight" id="inputEmail3" value="{{ Auth::user()->nombre }}">
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Fecha de nacimiento</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight" id="inputEmail3"
                                    value="{{ Auth::user()->fecha_nacimiento }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold"style="margin-bottom: 30px;">CURP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight"
                                    style="text-transform: uppercase;" id="inputEmail3"
                                    value="{{ Auth::user()->curp }}">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Teléfono</label>
                            <div class="col-sm-4">
                                <input type="tel" class="form-control texto-carotSans--ExtraLight" id="inputEmail3"
                                    value="{{ Auth::user()->telefono_contacto }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold"style="margin-bottom: 30px;">Dirección</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail3" value="{{ Auth::user()->direccion }}">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Correo</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail3" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </form>
                    
                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            @switch($documentacion)
                                @case(1)
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                        <img src="img/assets/aplicacionCliente/Grupo 117.png" alt="" class="img-large img-small">
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                            <span>La información es correcta y ha sido verificada.</span>
                                        </div>
                                    </div>
                                @break

                                @case(2)
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                        <img src="img/assets/aplicacionCliente/Grupo 444.png" alt="" class="img-large img-small">
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                            <span style="border-color: red;">Favor de subir un documento válido, actual o vigente.</span>
                                        </div>
                                    </div>
                                @break

                                @case(3)                              

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                        <img src="img/assets/aplicacionCliente/Grupo 444.png" alt="" class="img-large img-small">
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                        <span style="border-color: red;">Favor de subir la documentación solicitada o editar el campo incorrecto.</span>
                                    </div>
                                </div>                        
                                @break

                                @default
                            @endswitch
                        </div>
                    
                    </div>
                    
                </div>
            </div>
        </div>
        
        {{-- Información Laboral --}}
        <div class="accordion-item">

            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button acordiontext collapsed text-datgencred" id="butonacordeon2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseOne">
                    Información Laboral
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold" ">Trabajo</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail3" value="{{ Auth::user()->trabajo }}">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Nombre de la
                                empresa</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail33" value="{{ Auth::user()->empresa_trabajo }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Rama de la
                                empresa</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail33" value="{{ Auth::user()->rama_empresa }}">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Ingreso mensual</label>
                            <div class="col-sm-4">
                                <input type="tel" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail3" value="{{ Auth::user()->ingreso }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Crédito
                                hipotecario</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control texto-carotSans--ExtraLight"
                                    id="inputEmail32" value="{{ Auth::user()->credito }}">
                            </div>
                            <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold">Tarjeta de Nómina</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control texto-carotSans--ExtraLight"
                                  id="inputEmail32" value="{{ Auth::user()->credito }}">
                            </div>
                        </div>
                        
                    </form>
                    
                    <div class="row mb-3 justify-content-center">
                        <div class="col">
                            @switch($documentacion)
                                @case(1)
                                    
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                            <img src="img/assets/aplicacionCliente/Grupo 117.png" alt="" class="img-large img-small">
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                            <span style="border-color: red;">La información es correcta y ha sido verificada.</span>
                                        </div>
                                    </div>  
                                @break

                                @case(2)
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                            <img src="img/assets/aplicacionCliente/Grupo 444.png" alt="" class="img-large img-small">
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                        <span style="border-color: red;">Favor de subir un documento válido, actual o vigente.</span>
                                        </div>
                                    </div>  
                                @break

                                @case(3)
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-1 col-md-2 col-2"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                                            <img src="img/assets/aplicacionCliente/Grupo 444.png" alt="" class="img-large img-small">
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                                        <span style="border-color: red;">Favor de subir un documento válido, actual o vigente.</span>
                                        </div>
                                    </div> 
                                @break

                                @default
                            @endswitch
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        


        {{-- Documentación --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button acordiontext collapsed text-datgencred" id="butonacordeon3" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                    aria-controls="collapseOne">
                    Documentación
                </button>
            </h2>

            @if ($estado==1)
                <div id="collapseThree" class="accordion-collapse show" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                @else
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
            @endif
            
            <div class="accordion-body-f">
                {{-- Formulario subir img --}}
                <br><br>
                <div class="container">
                    <livewire:app-cliente.documentacion /> 
                </div>
                
            </div>
        </div>
    
        {{-- Información personal de forma de pago --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button acordiontext collapsed text-datgencred" id="butonacordeon4" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                    aria-controls="collapseOne">
                    Información personal de forma de pago
                </button>
            </h2>
            @if ($estado == 3)
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                
            @else
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                
            @endif
            <div class="accordion-body">
                <!-- La ventana proviene del la ruta public/resouses/livewere/datos-bancarios.blade.php -->
                <livewire:app-cliente.datos-bancarios />     
            </div>
        </div>
        </div></div></div> 
    </div>  
</div> 

{{-- Footer --}}
@livewireScripts
@include('components.landing.cuerpo._fotterClienteBootstrap')

<script>
    function openmodal() {
        $('#exampleModal').modal('show');
    }
    function correo() {
        $('#exampleModal2').modal('show');
    }
    Livewire.on('registro',function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro con Exito',
            showConfirmButton: false,
            timer: 1600
        });
        setTimeout(() => {
            location.reload();
        }, 1600);
    });
    Livewire.on('img',function(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cambio con Exito!',
            showConfirmButton: false,
            timer: 1600
        });
        setTimeout(() => {
            location.reload();
        }, 1600);
    });
    Livewire.on('img_error', function(message){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message,
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/app-clientes-scripts/acordeon.js') }}"></script>

<!-- Template Javascript -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/landing/sendEmail.js') }}"></script>
<script src="{{ asset('js/landing/modal-register.js') }}"></script>
@stack('js')
</body>

</html>
