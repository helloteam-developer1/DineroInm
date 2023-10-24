@extends('landing.layouts.app')
@section('content')

    <style>
        .divEncima{
            position: absolute;
            bottom: 0;
            width: 100%;
            background: red
        }

        .divCalculadora{
            padding-left: 10%; /* 144px */
            padding-right: 10%; /* 144px */
        }

        @media screen and (max-width: 1024px) {
            #ImgIndex{
                display: none;
            }

            .divCalculadora{
                padding-left: 1.25rem; /* 20px */
                padding-right: 1.25rem; /* 20px */
            }
        }
    </style>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/landing/modals.css') }}">
    @endpush


    <section class="">
        <div class="grid grid-cols-2" style="background: #A5D541">
            <div
                class=" divcalculadoraItems drop-shadow-lg row-span-3 bg-white grid grid-rows-7 grid-cols-1 col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1 xl:col-span-1 ml-10 z-40 mr-0 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 divCalculadora ml-0 sm:ml-0 md:ml-0 lg:ml-10 xl:ml-10 pb-10">
                @include('landing.components.content-calculadora')
            </div>
            <div
            class="divcalculadoraItemsDos  drop-shadow-lg row-span-3 bg-white grid grid-rows-7 grid-cols-1 col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1 xl:col-span-1 ml-10 z-40 mr-0 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 divCalculadora ml-0 sm:ml-0 md:ml-0 lg:ml-10 xl:ml-10 pb-10" style="display: none">
              @include('landing.components.content-calculadora-calculo')
          </div>
            <div class="col-span-2 sm:col-span-2 md:col-span-2 lg:col-span-1 xl:col-span-1 mac:col-span-1 grid grid-cols-1">
                <div class="mr-10">
                    <img class=""  src="{{ asset('img/landing/index/Content-Figure.png') }}" width="100%" id="ImgIndex">
                </div>
                <div>
                    <div class="w-full grid pb-4 px-2 " style=" background: #EBE7E8">

                        <div class="col-span-3 text-center mt-3 mb-2 titulosMobile">
                            <p class="texto-solicita-negro">Solicita el préstamo en <br> <strong class="text-green">sencillos pasos</strong></p>
                        </div>
                        <div class="col-span-1 grid grid-cols-1 grid-rows-2 justify-items-center">
                           <div>
                                <img class="mb-3 images" src="{{ asset('img/landing/index/Grupo 56.png') }}" width="70px">
                           </div>
                            <div>
                                <span class="texto-pequeno-gris">Regístrate</span>
                           </div>
                        </div>
                        <div class="col-span-1 grid grid-cols-1 grid-rows-2 justify-items-center">
                           <div>
                                <img class="mb-3 images" src="{{ asset('img/landing/index/Grupo 55.png') }}" width="70px">
                           </div>
                            <div>
                                <span class="texto-pequeno-gris">Validaremos tu solicitud <br> de cr&eacute;dito</span>
                           </div>
                        </div>
                        <div class="col-span-1 grid grid-cols-1 grid-rows-2 justify-items-center">
                           <div>
                                <img class="mb-3 images" src="{{ asset('img/landing/index/Grupo 247.png') }}" width="70px">
                           </div>
                            <div>
                                <span class="texto-pequeno-gris">Tienes el dinero <br> muy rápido</span>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   @include('landing.components.porque-elegirnos')
   @section('modales')

    @include('landing.registro.modales.credito-rechazado')
    @include('landing.registro.modales.credito-aprobado')
    @include('landing.registro.modales.abandonar-linea')
   @endsection
   @push('js')

    <script>


        let prestamo = 1;
        let tiempo = 1;

        $(document).on('click', '#btnSig', function (e) {
            $('.erorrs').remove();
            var tiempoValor = parseInt($('#tiempo').val()); 
            var prestamoValor = parseInt($('#prestamo').val());

            if(tiempoValor === 0 && prestamoValor === 0){
                $('#btnSig').after(`<div class="text-center"><span class="text-danger erorrs">Tienes que seleccionar un tiempo y monto para continuar.</span></div>`);
            }else{
                if($('#prestamo').val()>=20 && $('#tiempo').val()>0){
                    prestamo = $('#prestamo').val();
                    tiempo = $('#tiempo').val();
                    //console.log(prestamo);
                    //console.log(tiempo);
                    $('.divcalculadoraItems').hide();
                    $('.divcalculadoraItemsDos').show() ;

                    $('.calculadoraItems').fadeOut(1000);

                    $('.calculadoraItemsDos').fadeIn(1500);
                }
            }
        });

      const calcular = () => {

          $('.erorrs').remove();
          //validacion nombre
        if( $('#nombre').val().length == 0 ){
            $('#nombre').after(`<div class="text-left"><small class="text-danger erorrs">El campo nombre es requerido</small></div>`);
            return;
        }else {
            var regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/;
            var valorInput = $('#nombre').val();
            if (!regex.test(valorInput)) {
                $('#nombre').after(`<div class="text-left"><small class="text-danger erorrs">Solo se permiten letra y espacios en el campo nombre</small></div>`);
                return;
            }
        }

          //validacion trabajo
        if( $('#trabajo').val().length == 0 ){
            $('#trabajo').after(`<div class="text-left"><small class="text-danger erorrs">El campo trabajo es requerido</small></div>`);
            return;
        }else{
            var regex2 = /^[a-zA-ZáéíóúñÑÁÉÍÓÚ\s]+$/;
            var valorInput2 = $('#trabajo').val();
            if (!regex2.test(valorInput2)) {
                $('#trabajo').after(`<div class="text-left"><small class="text-danger erorrs">Solo se permiten letras y espacios en el campo trabajo</small></div>`);
                return;
            }
        }
            

          //validacion nombre
        if( $('#ingresoMensual').val().length == 0 ){
            $('#ingresoMensual').after(`<div class="text-left"><small class="text-danger erorrs">El campo ingreso mensual es requerido</small></div>`);
            return;
        }

          //validacion tarjeta nomina
          if( !$('#op1').prop('checked') && !$('#op2').prop('checked') ){
            $('.erorrs').remove();
            $('#divtarjetaNomina').after(`<div class="text-left"><small class="text-danger erorrs">El campo Tienes tarjeta de nomina es requerido</small></div>`);
            return;
        }
          //validacion credto hipotecaro
          if( !$('#op3').prop('checked') && !$('#op4').prop('checked') ){
            $('.erorrs').remove();
            $('#divCredito').after(`<div class="text-left"><small class="text-danger erorrs">El campo Cuentas con crédito Hipotecario es requerido</small></div>`);
            return;
        }


        let ingesoMensual = $('#ingresoMensual').val();
        let tarjetaNomina = document.getElementById('op1').checked;

        const acreditaIngresoMnesual = getIngresoMensual(ingesoMensual, 2);

        if( tarjetaNomina && acreditaIngresoMnesual ){
            openModal('credito-aprobado');
            
        }
        else{
            openModal('credito-rechazado');
        }

      }

    const getIngresoMensual = (ingesoMensual, multiplicar) => {
        const ingeso_mensual_calculado = ( parseInt(prestamo) * parseInt(multiplicar));


        if( ingesoMensual >= ingeso_mensual_calculado ) {

            return true
        }

        return false;
    }
    </script>
   @endpush
@stop
