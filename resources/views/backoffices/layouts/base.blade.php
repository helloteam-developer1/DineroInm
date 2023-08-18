<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title> 
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/Grupo 979.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/backoffice/style.css') }}">
    <script src="https://kit.fontawesome.com/7652a6e854.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    <style>
        body {
            overflow-x: hidden; /* Evita el desbordamiento horizontal */
            overflow-y: auto; /* Permite el desplazamiento vertical si es necesario */
        }
        .label-izquierda {
            text-align: left;
            display: block;
            width: 100%;
        }

        @media screen and (min-width: 768px) {
        .img-large {
                width: 100%;
                margin-right: 10px;
                height: auto;
            }
        }

        /* Estilos para pantallas pequeñas (menores a 768px) */
        @media screen and (max-width: 767px) {
            .img-small {
                width: 100%;
                
                height: auto;
            }

            
        }
    </style>
    @stack('css')
</head>

<body>
   

    <div class="col col-auto">
        <x-backoffice.menu-backoffice />
        <h1 class="text-center my-5">Clientes</h1>
        <x-backoffice.menu-clientes />
        @yield('contenido')

        @include('backoffices.components.footer')
    </div>

    
    @livewireScripts
    <!-- scripts --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        Livewire.on('alert', function() {
            Swal.fire({
                icon: 'success',
                title: 'Cambio con Exito',
                footer:'Espere...',
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                location.reload();
            }, 1600);
        });
        
    </script>
</body>

</html>