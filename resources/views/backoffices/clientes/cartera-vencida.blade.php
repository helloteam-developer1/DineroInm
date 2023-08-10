@extends('backoffices.layouts.base')
@section('titulo','Clientes')
@section('icono')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/Grupo 979.png') }}">
@endsection
@section('subtitulo')
@section('contenido')
    <div class="container-fluid mt-5">
        <div class="container-fluid mt-5">
            <div class="row mb-4">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-8 col-sm-10 col-md-10 col-lg-8 offset-2 offset-sm-1 offset-md-2 offset-lg-2">
                        <!--Filtro de busqueda -->
                            <form action="{{route('carterab')}}" method="GET">
                                    @error('fecha_inicio')
                                        <span style="color:red;">{{$message}}</span>
                                        <br />
                                    @enderror
                                    @error('fecha_termino')
                                        <span style="color:red;">{{$message}}</span>
                                        <br />
                                    @enderror
                                    @error('termino')
                                        <span style="color:red;">{{$message}}</span>
                                        <br />
                                    @enderror
                                    
                                    <div class="filtro-busqueda">
                                        <p class="my-2 mx-2">De</p> <input type="date" class="mx-3" placeholder="" name="fecha_inicio" id="fecha_inicio" @isset($fecha_inicio)
                                            value="{{$fecha_inicio}}"
                                        @endisset> <img
                                        src="{{ asset('img/backoffices/CALENDARIO.png') }}"class="my-2 mx-2" width="30"
                                        height="30" alt="">
                                    <p class="mx-3 my-2">a</p> <input type="date" class="mx-3" placeholder="" name="fecha_termino" id="fecha_termino" @isset($fecha_termino)
                                        value="{{$fecha_termino}}"
                                    @endisset><img
                                    src="{{ asset('img/backoffices/CALENDARIO.png') }}" class="my-2 mx-2" width="30"
                                        height="30" alt="">
                                    <div class="input-wrapper">
                                        <input type="search" name="termino" id="" class="ms-1"
                                            placeholder="Buscar"  @isset($termino)
                                                value="{{$termino}}"
                                            @endisset>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <button type="submit" class="btn boton-color px-2 ms-4 rounded">Buscar</button>
                                    @if (Request::is('busqueda-cartera-vencida'))
                                        <a href="{{route('dashboard.carteraven')}}" class="btn boton-danger px-2 ms-4 rounded">Regresar</a>                                    
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                        <div class="table-responsive text-center">
                        <!--inicio tabla de cartera--->
                            <table class="table table-bordered border-secondary" >
                                <thead>
                                    <tr class="table-secondary">
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Número de cliente</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Núm de crédito</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Nombre</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Teléfono</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Correo Electronico</p>
                                        </th>
                                            <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Regularizar cliente</p>
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio">Tabla de pagos</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($consulta->count())
                                        @foreach ($consulta as $c)
                                        <tr class="table-light">
                                            <td>{{$c->num_cliente}}</td>
                                            <td>{{$c->num_credito}}</td>
                                            <td>{{$c->nombre}}</td>
                                            <td>{{$c->telefono}}</td>
                                            <td>{{$c->email}}</td>
                                            <td>
                                                @livewire('backoffice.regularizar',['num_credito'=>$c->num_credito], key($c->id))
                                            </td>
                                            <td>
                                                <button class="btn boton-color px-4 mx-4" onclick="window.location.href='{{route('tablaDePagos',$c->num_credito)}}'">
                                                    Ver
                                                </button></td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr class="table-light">
                                        <td colspan="7">Sin registros</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        <!--fin tabla de cartera--->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection