@extends('backoffices.layouts.basesinmenu')
@section('titulo','Cobros')
@section('subtitulo','Cobros')
@section('contenido')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                    <div class="table-responsive text-center">
                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                                 </svg>
                                <div>
                                    {{session('success')}}
                                </div>
                            </div>
                        @endif
                        @if (session('mensaje'))
                            @include('backoffices.cobro.alerta-error')
                        @endif
                        <!--inicio tabla de cobros--->
                        <table class="table table-striped table-bordered border-secondary" >
                            <thead>
                                <tr class="table-secondary">
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Número de Crédito</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Nombre Cliente</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Numero de pago</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-pequeño">Interes Anual</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Pago capital</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Interes Ordinario</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Pago total Mensual</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Realizar cobro</p>
                                    </th>
                                    <th scope="col" class="">
                                        <p class="encabezado-tabla-medio">Enviar a cartera vencida</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cobros->count())
                                    @foreach ($cobros as $c)
                                    <tr>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->num_credito}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->credito->usuario->nombre}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->numero_pagos}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-pequeño">{{$c->interes_anual}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->pag_capital}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->interes_ordinarios}}</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">{{$c->pago_total_men}}</p>
                                        </th>
                                        <th>
                                            <a class="btn boton-color px-2 ms-4 rounded" href="{{route('cobros.cobranza',$c->id_amortizacion)}}">Cobrar</a>
                                        </th>
                                        <th>
                                            @livewire('backoffice.carteravencida',['user'=>$c->credito->usuario->id,'num_credito'=>$c->num_credito], key($c->id))       
                                        </th>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr class="table-light">
                                        <td colspan="12">Sin Registros</td>
                                    </tr>
                                @endif
                            </tbody>
                        
                        </table>
                        <!--fin tabla de clientes--->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection