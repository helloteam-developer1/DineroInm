<style>
    /* Estilo para la tabla */
.table {
font-size: 12px; /* Tamaño de fuente general de la tabla */
}

/* Estilo para el encabezado de la tabla */
.table thead th {
padding: 0.1rem 0.02rem; /* Espaciado interno del encabezado */
}

/* Estilo para las celdas de datos de la tabla */
.table tbody td {
padding: 0.1rem 0.02rem; /* Espaciado interno de las celdas */
}

.table td,
.table th {
    text-align: center;
vertical-align: middle;
}

input[type="date"] {
    text-align: center;
height: 90px; /* Altura deseada para la caja de entrada */
font-size: 13px; /* Tamaño de fuente deseado para la caja de entrada */
padding: 6px; /* Espacio interno deseado para la caja de entrada */
min-width: 110px; /* Ancho deseado para la caja de entrada */
max-width: 110px; /* Ancho deseado para la caja de entrada */
}
</style>

@extends('backoffices.layouts.base')
@section('titulo', 'Clientes')
@section('icono')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/Grupo 979.png') }}">
@endsection
@section('contenido')
    <!-- inicio apartado de busqueda-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-8 col-sm-10 col-md-10 col-lg-8 offset-2 offset-sm-1 offset-md-2 offset-lg-2">
                            <form method="GET" action="{{route('dashboard.busquedacf')}}" id="formulario">
                                @error('fecha_inicio')
                                    <span style="color:red;">{{$message}}</span>
                                    <br />
                                @enderror
                                @error('fecha_termino')
                                    <span style="color:red;">{{$message}}</span>
                                    <br />
                                @enderror
                                @error('busqueda')
                                    <span style="color:red;">{{$message}}</span>
                                    <br />
                                @enderror

                                <div class="filtro-busqueda">
                                    <p class="my-2 mx-2">De</p> <input type="date" class="mx-3" name="fecha_inicio" id="fecha_inicio"
                                    @isset($fecha_inicio)
                                        value="{{$fecha_inicio}}"
                                    @endisset> <img
                                        src="{{ asset('img/backoffices/CALENDARIO.png') }}"class="my-2 mx-2" width="30"
                                        height="30" alt="">
                                    <p class="mx-3 my-2">a</p> <input type="date" class="mx-3" name="fecha_termino" id="fecha_termino"
                                    @isset($fecha_termino)
                                        value="{{$fecha_termino}}"
                                    @endisset><img
                                        src="{{ asset('img/backoffices/CALENDARIO.png') }}" class="my-2 mx-2" width="30"
                                        height="30" alt="">
                                    <div class="input-wrapper">
                                        <input type="search" name="busqueda" id="" class="ms-1"
                                            placeholder="Buscar" @isset($busqueda)
                                                value="{{$busqueda}}"
                                            @endisset>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <button type="submit" class="btn boton-color px-2 ms-4 rounded">Buscar</button>
                                    @if (Request::is('busqueda/credito/finalizado'))
                                        <a href="{{route('dashboard.creditofinalizado')}}" class="btn boton-danger px-2 ms-4 rounded">Regresar</a>                                    
                                    @endif  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Fin del apartado de busqueda-->
    
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                        <div class="table-responsive text-center">
                            <!-- inicio tabla finalizar credito-->
                            <table class="table table-striped table-bordered border-secondary" >
                                <thead>
                                    <tr class="table-secondary">
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">Nombre</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">Núm de crédito</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">Crédito Activo</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio">Historial de pago</p>
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla">Historial de montos Auto</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($creditofinalizado->count())
                                        @foreach ($creditofinalizado as $c)
                                        <tr class="table-light">
                                            <td>{{$c->nombre}}</td>
                                            <td>{{$c->num_creditos_fin}}</td>
                                            <td>
                                                @if ($c->credito_actual==1)
                                                    Vigente
                                                @endif
                                                @if($c->credito_actual==0)
                                                    Inactivo
                                                @endif
                                            </td>
                                            <td><button class="btn boton-color px-4 mx-4" style="color:white;" onclick="window.location.href='{{route('historialPagos',$c->user_id)}}'">Ver</button></td>
                                            <td>
                                                <button class="btn boton-color px-4 mx-4" style="color:white; width:150px;" onclick="window.location.href='{{route('historialMontosAutorizados',$c->user_id)}}'">                                                    
                                                    Ver montos
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr class="table-light">
                                            <td colspan="5">Sin Registros</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- fin tabla finalizar credito-->
                        </div>
                        <div style="float: right;">
                            {{$creditofinalizado->appends(['busqueda'=>$busqueda,'fecha_inicio'=>$fecha_inicio,'fecha_termino'=>$fecha_termino])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection


