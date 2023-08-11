@extends('landing.layouts.app')
@section('content')
    <style>
        .font-22{
            font-size: 22px;
        }
        @media screen and (max-width: 1024px) {
            #ImgIndex{
                display: none;
            }
        }


    </style>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/landing/modals.css') }}">
    @endpush



    <section class="shadow-md">
        {{-- div principal --}}
        <div class="grid grid-cols-4 grid-rows-1 gap-0">
            {{-- div calculadora --}}
            <div class="col-span-4 grid grid-cols-4 grid-rows-1 gap-0" style="background: #A5D541">

                <div
                    class="bg-white col-span-4 ms:col-span-4 md:col-span-4 lg:col-span-2 row-span-2 grid grid-cols-1 gap-0 pt-20 pr-5 pl-5 lg:pr-20 lg:pl-20 ml-12 mr-12 sm:mr-12 md:mr-12 lg:mr-0">
                    <div>
                        <h1 class="text-center ">Mensaje de Bienvenida</h1>
                        <br>
                        <h3 class="texto-pequeno text-justify font-22">Necesitas un préstamo de emergencia, no te preocupes, nosotros
                            te ayudamos. Para saber si eres candidato o no.</h3>
                        <h3 class="titulo font-22">Ingresa tus datos en la siguiente calculadora.</h3>
                        <br>
                        <input class="form-control" type="text" placeholder="Nombre">
                        <br>
                        <select class="form-select" type="text" placeholder="Trabajo">
                            <option disabled selected>Trabajo</option>
                        </select>
                        <br>
                        <select class="form-select" type="text" placeholder="Cual es tu ingreso mensual?">
                            <option disabled selected>¿Cual es tu ingreso</option>
                        </select>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p>¿Tienes tarjeta de nomina?</p>
                                </div>
                                <div class="col col-lg-3">
                                    <input type="radio" id="op1" name="nomina" value="Si">
                                    <label for="op1">Si</label>
                                    <input type="radio" id="op2" name="nomina" value="NO">
                                    <label for="op2">No</label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col ">
                                    <p>Cuentas con crédito Hipotecario?</p>
                                </div>
                                <div class="col col-lg-3">
                                    <input type="radio" id="op3" name="hipotecario" value="Si">
                                    <label for="op3">Si</label>
                                    <input type="radio" name="hipotecario" value="No" id="op4">
                                    <label for="op4">No</label>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="text-center"> <a  onclick="calcular()" class="btn btn-calcular btn btn-verde px-5" style="font-size: 32px">Calcular </a> </div>
                        <br>
                    </div>

                </div>


                <div class=" col-span-2 mr-10" id="ImgIndex">
                    <img class="" src="{{ asset('img/landing/index/Content-Figure.png') }}" width="100%" >
                </div>
                <div style="background: #E9E7E7" class="col-span-4 pb-5">
                    @include('landing.components.solicita-prestamo')
                </div>
            </div>

        </div>
    </section>
    @include('landing.components.porque-elegirnos')

    @include('landing.registro.modales.credito-rechazado')
    @include('landing.registro.modales.credito-aprobado')
    @include('landing.registro.modales.abandonar-linea')



    @push('js')
        <script src="{{ asset('js/landing/modal-register.js') }}"></script>
        <script>
            function calcular(){


                if(document.getElementById('op3').checked && document.getElementById('op1').checked){
                    alert('Registro con exito');
                    openModal('credito-aprobado');
                }
                else{
                    openModal('credito-rechazado');
                }
            }
        </script>
    @endpush

@stop
