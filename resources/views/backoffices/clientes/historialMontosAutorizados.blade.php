@extends('backoffices.layouts.basesinmenu')
    @section('titulo','Historial de montos autorizados')
    @section('icono')
        <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/Grupo 979.png') }}">
    @endsection

    @section('subtitulo','Historial de Montos Autorizados')
    
    
    @section('contenido')
    
        <!-- inicio apartado de busqueda-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-10 col-sm-10 col-md-10 col-lg-8 offset-2 offset-sm-2 offset-md-2 offset-lg-4">
                        <form action="{{route('busqueda.hma')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-wrapper me-4 ms-3" style="width: 221px;">
                                    <input type="search" name="busqueda" id="" class="ms-1 mt-2" placeholder="Buscar" 
                                    @isset($busqueda)
                                        value="{{$busqueda}}"
                                    @endisset
                                     required>
                                    <input type="text" name="user" id="" value="{{$user}}" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" style="top: 60%;" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <button type="submit" class="btn boton-color px-2 ms-5 mt-2 rounded">Buscar</button>
                            </div>
                        </form>
                        @error('user')
                            <span style="color:red;">{{$message}}</span>
                        @enderror
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
                        <div class="col-12 col-sm-12 col-md-10 col-lg-4 offset-md-1 offset-lg-4">
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-bordered border-secondary">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">Número de pago</th>
                                            <th scope="col">Fecha de pago</th>
                                            <th scope="col">Monto Autorizado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @isset($credito)
                                        @if ($credito->count())
                                            @foreach ($credito as $c)
                                                <tr class="table-light table-bordered">
                                                    <td>{{$c->num_pagos}}</td>
                                                    <td>{{$c->fecha_termino}}</td>
                                                    <td>{{$c->monto_aut}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="table-light">
                                                <td colspan="3">Sin Registros</td>
                                            </tr>
                                        @endif
                                    @else
                                        <tr class="table-light">
                                            <td colspan="3">Sin Registros</td>
                                        </tr>
                                    @endisset
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
            <div class="row mt-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-4 col-lg-3 offset-sm-2 offset-md-4 offset-lg-5">
                            <nav aria-label="Page navigation example" class="ms-1">
                                @isset($credito)
                                    @if ($credito->count())
                                        {{$credito->links('backoffices.components.paginate')}}
                                    @endif
                                @endisset
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin de paginador-->
  
        <!--inicio de botones-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-5 offset-sm-2 offset-lg-1 offset-md-2">
                            @if (Request::is('/historialMontosAutorizados/busqueda'))
                                <button type="button" class="btn px-5 my-3 "
                                    style="background-color: #38a937; color:white; font-size: 20px;" onclick="window.location.href='{{route('dashboard.creditofinalizado')}}'">Volver</button>
                            @else
                                <button type="button" class="btn px-5 my-3 "
                                    style="background-color: #38a937; color:white; font-size: 20px;" onclick="window.location.href='javascript:history.go(-1)'">Volver</button>                                
                            @endif                            
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 offset-sm-2 offset-lg-3 offset-md-2">
                            <button type="button" class="btn px-5 my-3"
                                style="background-color: #f29100; color:white; font-size: 20px;">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin de botones-->
    @endsection