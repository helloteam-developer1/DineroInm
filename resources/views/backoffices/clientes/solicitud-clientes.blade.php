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
    text-align: end;
height: 90px; /* Altura deseada para la caja de entrada */
font-size: 13px; /* Tamaño de fuente deseado para la caja de entrada */
padding: 6px; /* Espacio interno deseado para la caja de entrada */
min-width: 110px; /* Ancho deseado para la caja de entrada */
max-width: 110px; /* Ancho deseado para la caja de entrada */
}
</style>

@extends('backoffices.layouts.base')
@section('titulo', 'Solicitud de Clientes')
@section('contenido')
    <div class="container-fluid mt-5">
        <!-- inicio apartado de busqueda-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-8 col-sm-10 col-md-12 col-lg-12 offset-2 offset-sm-1 offset-md-2 offset-lg-2">
                        <form method="" action="{{route('busqueda')}}" id="formulario">
                            
                            @csrf
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
                                <p class="my-2 mx-2">De</p> 
                                <input type="date" class="mx-4" placeholder="" name="fecha_inicio" id="fecha_inicio" 
                                @isset($fecha_inicio)
                                        value="{{$fecha_inicio}}"
                                    @endisset
                                > 
                                <img src="{{ asset('img/backoffices/CALENDARIO.png') }}"class="my-2 mx-2" width="30" height="30" alt="">

                                <p class="mx-4 my-2">a</p> 
                                <input type="date" class="mx-2" placeholder="" name="fecha_termino" id="fecha_termino" 
                                    @isset($fecha_termino)
                                        value="{{$fecha_termino}}"
                                    @endisset
                                >
                                <img src="{{ asset('img/backoffices/CALENDARIO.png') }}" class="my-2 mx-4" width="30" height="30" alt="">

                                <div class="input-wrapper">
                                    <input type="search" name="busqueda" id="" class="ms-2"
                                        placeholder="Buscar" 
                                        @isset($busqueda)
                                            value="{{$busqueda}}"
                                        @endisset >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="-2 0 20 20" 
                                        fill="currentColor">
                                        <path fill-rule="evenodd" 
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <button type="submit" class="btn boton-color px-2 ms-4 rounded ">Buscar</button>                                    
                                    @if (Request::is('busqueda'))
                                        <a href="{{route('dashboard.backoffice')}}" class="btn boton-danger px-2 ms-4 rounded">Regresar</a>                                    
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
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 ">
                        <div class="table-responsive text-center">
                            <!--inicio tabla de solicitudes--->
                            <table class="table table-striped table-bordered border-secondary" id="tabla-Solicitud">
                                <thead>
                                    <tr class="table-secondary">
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>Nombre
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>Ocupación Profesional
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>Ingreso Mensual
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>¿Cuenta con nomina?
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>¿Cuenta con un crédito hipotecario?
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-pequeño"></p>CURP
                                        </th>
                                        <th scope="col" class="">
                                            <p class="encabezado-tabla-medio"></p>Fecha de Nacimiento
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño"></p>Nombre de la empresa
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño"></p>Ramo de la empresa
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño"></p>Teléfono de contacto
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-medio"></p>Correo Electrónico
                                        </th>
                                        <th scope="col" class="px-5">
                                            <p class="encabezado-tabla-pequeño"></p>Documentación
                                        </th>
                                        <th scope="col" class="px-5" colspan="3">
                                            <p class="encabezado-tabla-pequeño"></p>Acciones
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($consulta!=null)
                                        @if ($consulta->count())
                                            @foreach ($consulta as $c)
                                                    <tr class="table-light">
                                                        <td>{{ $c->nombre }}</td>
                                                        <td>{{ $c->trabajo }}</td>
                                                        <td>{{ $c->ingreso }}</td>
                                                        <td>{{ $c->nomina }}</td>
                                                        <td>{{ $c->credito }}</td>
                                                        <td>{{ $c->curp }}</td>
                                                        <td>{{ $c->fecha_nacimiento }}</td>
                                                        <td>{{ $c->empresa_trabajo }}</td>
                                                        <td>{{ $c->rama_empresa }}</td>
                                                        <td>{{ $c->telefono_contacto }}</td>
                                                        <td>{{ $c->email }}</td>
                                                        <td>
                                                            @livewire('backoffice.documentos', ['user' => $c], key($c->id))
                                                        
                                                        </td>
                                                        <td>
                                                            @livewire('backoffice.acep-solicitud',['user'=> $c],key($c->id))
                                                        
                                                        </td>
                                                        <td>
                                                            @livewire('backoffice.rechazar-solicitud',['user'=> $c],key($c->id)) 
                                                        </td>
                                                        <td>
                                                            @livewire('backoffice.faltainfo',['user'=>$c],key($c->id))
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        @else
                                            <tr class="table-light">
                                                <th colspan="13">Sin Registros</th>
                                            </tr>
                                        @endif
                                    @else
                                        <tr class="table-light">
                                            <th colspan="13">Sin Registros</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!--fin tabla de solicitudes--->
                        </div>
                        <div style="float:right; margin-top:10px;">
                            @if($consulta!=null)
                                {{$consulta->appends(['busqueda'=>$busqueda,'fecha_inicio'=>$fecha_inicio,'fecha_termino'=>$fecha_termino])}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

