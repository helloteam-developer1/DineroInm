
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<livewire:app-cliente.menu-cliente/>


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
                <form action="{{route('notificacion.destroy',$n->id_notf)}}" class="formulario-eliminar" method="POST">
                  @csrf
                  @method('DELETE')
                    <button type="submit" style="border: none; float: right; background-color:white;">
                      <img src="/img/assets/aplicacionCliente/ELIMINAR.svg" style="cursor:pointer;" />
                    </button>
                </form>
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
    <script>
      $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: 'Eliminar notificación.',
          text: 'Esta acción es irreversible',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#da8b0c',
          cancelButtonColor: '#38A937',
          confirmButtonText: 'Eliminar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            
            this.submit();
            
          }
        });
        
      });
    </script>
</body>

</html>

