<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>
    @yield('icono')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/backoffice/style.css') }}">
    <script src="https://kit.fontawesome.com/7652a6e854.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    <script src="http://code.jquery.com/jquery-git.js"></script>
</head>

<body>
    <style>
        .btn-cambio {
            color: white;
            background-color: #39A935;
            margin-top: 10px;
        }
        .div-confirmar{
            display: flex;
            justify-content: center;
        }
        .btn-confirmar{
            color: white;
            background-color: #39A935;
            margin-top: 10px;
            border-radius: 8px;
            border: none;
        }

        .btn-cambio:hover {
            color: #F29100;
            background-color: #39A935;
            margin-top: 10px;
        }
        .btn-cancelar{
            color: white;
            background: #39A935;
        }
        .btn-guardar{
            color:white;
            background: #F29100;
            float: right;
        }
        .titulo-alert {
            color: #39A935;
            margin-top: 10px;
        }

        .subt-alert {
            color: #F29100;
        }
    </style>
    <x-backoffice.menu-backoffice />

    <h1 class="text-center my-5">@yield('subtitulo')</h1>
    @yield('contenido')

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registro Actualizado con Exito',
            footer:'Espere...',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'No coincide el Numero de Credito',
            footer:'Espere...',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
    @endif


    @include('backoffices.components.footer')
    @livewireScripts
    <!-- scripts --->
    <script src="{{ asset('js/backoffice/menuBurger.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
    <script>
        Livewire.on('alert', function() {
            Swal.fire({
                icon: 'success',
                title: 'Cambio con Exito',
                footer: 'Espere...',
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                location.reload();
            }, 1600);
        });
        Livewire.on('registro', num_credito => {
            Swal.fire({
                icon: 'success',
                title: 'Registro con Exito',
                timer: 1800,
                footer: 'Espere...',
                showConfirmButton: false,
            }).then((result)=>{
                window.location.href=num_credito;
            });
        });
        Livewire.on('registroP', num_credito => {
            Swal.fire({
                icon: 'success',
                title: 'Registro creado con Exito',
                timer: 1800,
                footer: 'Espere...',
                showConfirmButton: false,
            }).then((result)=>{
                window.location.href=num_credito;
            });
        });
        Livewire.on('eliminar', num_credito => {
            Swal.fire({
                icon: 'success',
                title: 'Registro eliminado con Exito',
                timer: 1800,
                footer: 'Espere...',
                showConfirmButton: false,
            }).then((result)=>{
                window.location.href=num_credito    
            });
        });
        Livewire.on('eliminarP', num_credito => {
            Swal.fire({
                icon: 'success',
                title: 'Registro eliminado con Exito',
                timer: 1800,
                footer: 'Espere...',
                showConfirmButton: false,
            }).then((result)=>{
                window.location.href=num_credito    
            });
        });
        
        Livewire.on('error_p', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error 404 Tabla Pago Eliminar,por favor ponte en contacto con soporte tecnico.',
                footer:'Espere...',
                showConfirmButton: false,
                timer: 4000,
            });
            setTimeout(() => {
                location.reload();
            }, 4000);
        });
        Livewire.on('error_a', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error 404 Tabla Amortización Eliminar,por favor ponte en contacto con soporte técnico.',
                footer:'Espere...',
                showConfirmButton: false,
                timer: 4000,
            });
            setTimeout(() => {
                location.reload();
            }, 4000);
        });
    </script>
</body>

</html>
