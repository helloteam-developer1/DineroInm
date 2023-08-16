<style>
    /* Estilo para la tabla */
.table {
font-size: 10px; /* Tamaño de fuente general de la tabla */

}

/* Estilo para el encabezado de la tabla */
.table thead th {
padding: 0.0rem 0.0rem; /* Espaciado interno del encabezado */
text-align: center;
vertical-align: middle;
}

/* Estilo para las celdas de datos de la tabla */
.table tbody td {
padding: 0.0rem 0.0rem; /* Espaciado interno de las celdas */

}

.table th,
.table  td{
text-align: center;
vertical-align: middle;

}

</style>
@extends('backoffices.layouts.basesinmenu')
@section('titulo', 'Tabla de Pagos')
@section('icono')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/CLIENTES.png') }}">
@endsection
@section('subtitulo', 'Tabla de Pagos')
@section('contenido')

    <!-- inicio apartado de busqueda-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-5 offset-sm-2 offset-md-4 offset-lg-7">
                        <form action="{{route('busquedaTablaP')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-wrapper">
                                    <input type="search" name="termino" id="" class="ms-1 mt-2" placeholder="Buscar" @isset($termino)
                                        value="{{$termino}}"
                                    @endisset>
                                    <input type="text" name="num_credito" value="{{$num_credito}}" hidden>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" style="top: 60%;"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                </div>
                                <button type="submit" class="btn boton-color px-2  ms-5 mt-2 rounded">Buscar</button>
                            </div>
                            @error('termino')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                            @error('num_credito')
                                <span style="color:red;">{{$message}}</span>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin apartado de busqueda-->

    <!-- inicio tabla de elementos buscados-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                      @livewire('backoffice.reg-tablapagos', ['num_credito'=> $num_credito])
                        <div class="table-responsive text-center">
                            <table class="table table-bordered border-secondary table-striped" id="tabla-amortizacion">
                                <thead>
                                    <tr class="table-secondary">
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio pt-3">Número de crédito</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Número de pago</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño">Fecha de pago</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Monto Pagado</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño">Saldo Insoluto</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño">Editar</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño">Eliminar</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                   @if($tabla->count())
                                        @foreach ($tabla as $t)
                                            <tr class="table-light">
                                                <td>{{ $t->num_credito }}</td>
                                                <td>{{ number_format($t->numero_pagos) }}</td>
                                                <td>{{ $t->fecha_pago }}</td>
                                                <td>{{ number_format($t->monto_pago) }}</td>
                                                <td>{{ number_format($t->saldo_insoluto) }}</td>
                                                <td><img class="my-3" onclick="window.location.href='{{route('editarpago',$t->id_pago)}}'" src="{{ asset('img/backoffices/Grupo 783.png') }}" width="40" alt="" style="cursor: pointer;"></td>
                                                <td>@livewire('backoffice.eliminar-tablapagos',['re'=>$t->id_pago],key($t->id_pago))</td>
                                            </tr>
                                        @endforeach
                                   @else
                                        <tr class="table-light">
                                            <td colspan="7">Sin registros.</td>
                                        </tr>
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin tabla de elementos buscados-->
    
    <!--inicio de paginador-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-2 col-sm-8 col-md-2 col-lg-2 offset-sm-2 offset-md-6 offset-lg-8">
                        @if($paginate==1)
                            @if ($tabla->count() || $tabla != null)
                                {{ $tabla->links('backoffices.components.paginate') }}
                            @endif
                        @else
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin de paginador-->

    <!--inicio de buttons-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 offset-sm-1 offset-md-1 offset-lg-1">
                <div class="row">
                    @if (Request::is('busqueda/tablapagos'))
                        <div class="col-12 col-sm-8 col-md-4 col-lg-4 offset-sm-4 offset-lg-2 offset-md-2">
                            <button type="button" class="btn px-5 my-3 "
                                style="background-color: #28a937; color:white; font-size: 20px;" onClick="history.go(-1); return false;">Volver</button>
                        </div>
                    @else
                        <div class="col-12 col-sm-8 col-md-4 col-lg-4 offset-sm-4 offset-lg-2 offset-md-2">
                            <button type="button" class="btn px-5 my-3 "
                                style="background-color: #38a937; color:white; font-size: 20px;"
                                onclick="window.location.href='/clientes-vigentes'"> Volver</button>
                        </div>
                    @endif
                    <div class="col-12 col-sm-8 col-md-4 col-lg-4 offset-sm-4 offset-lg-2 offset-md-2">
                        <button type="button" class="btn px-5 my-3 "
                            style="background-color: #f29100; color:white; font-size: 20px;">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin de buttons-->
@endsection
