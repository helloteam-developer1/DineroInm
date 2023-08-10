<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Clientes</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/Grupo 979.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/backoffice/style.css') }}">
</head>
<body>
    
    <x-backoffice.menu-backoffice />

    <!--inicio de titulo-->
    <h1 class="text-center my-5">Tabla de Pagos</h1>
    <!--fin de titulo-->

    <!-- inicio apartado de busqueda-->
    <div class="container-fluid mt-5">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class="col-12 col-sm-10 col-md-10 col-lg-4  offset-sm-2 offset-md-2 offset-lg-5">
                    <form action="{{route('busquedap')}}" method="GET">
                        <div class="input-group">
                            <div class="input-wrapper " style="width: 200px;">
                              <input type="search" name="termino" id="" class="ms-3 mt-2 " placeholder="Buscar">
                              <input type="text" name="num_credito" value="{{$num_credito}}" hidden>
                              <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" style="top: 60%; left:30px;" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                              </svg>
                            </div>
                            <button type="submit" class="btn boton-color px-2  ms-1 mt-2 rounded">Buscar</button>
                          </div>
                    </form>
                    @error('termino')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                    @error('num_credito')
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
                    <div class="col-lg-7  offset-lg-3">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered border-secondary">
                                
                                <tbody>
                                    <tr class="table-light">
                                        <td >Campos</td>
                                        <td class="pt-3">Número de cuenta</td>                                           
                                        <td class="pt-3">Número de pago</td>                                           
                                        <td class="pt-3">Fecha de pago</td>                                           
                                        <td class="pt-3">Monto de pago</td>                                           
                                        <td class="pt-3">Saldo insoluto</td>                                           
                                    </tr>
                                @if ($pagos->count())
                                <tr class="table-light">
                                    <td rowspan="2">Información</td>
                                        @foreach ($pagos as $p)
                                                <td class="pt-3 table-light">{{$p->num_credito}}</td>
                                                <td class="pt-3 table-light">{{$p->numero_pagos}}</td>
                                                <td class="table-light">{{$p->fecha_pago}}<img src="{{ asset('img/backoffices/CALENDARIO.png') }}" width="30" alt="" class="mx-2"></td>
                                                <td class="pt-3 table-light">${{number_format($p->monto_pago,2)}}</td>
                                                <td class="pt-3 table-light">${{number_format($p->saldo_insoluto,2)}}</td>     
                                            </tr>   
                                        @endforeach
                                </tbody>
                                        @else
                                    <tr>
                                        <th>Información</th>
                                        <th colspan="6">Sin Registros</th>
                                    </tr>
                                @endif
                                        
                            </table>
                               
                        </div>
                        <!--paginación-->
                            @if ($pagos->count())
                                <div class="container-fluid mt-5">
                                    <div class="row">
                                        <center>
                                            @if ($paginacion==1)
                                                
                                            @else
                                                {{$pagos->appends(['termino'=>$termino,'num_cliente'=>$num_cliente])}}
                                            @endif
                                            
                                        </center>
                                    </div>
                                </div>            
                            @endif
                        <!--paginación-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin tabla de elementos buscados-->
    
 

    <!--inicio de botones-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 offset-sm-1 offset-md-1 offset-lg-1">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-4 col-lg-4 offset-sm-4 offset-lg-2 offset-md-2">
                        <button type="button" class="btn px-5 my-3 "
                        style="background-color: #38a937; color:white; font-size: 20px;"><a href="/cartera-vencida" style="text-decoration: none; color:white;">Volver</a></button>
                    </div>
                    <div class="col-12 col-sm-8 col-md-4 col-lg-4 offset-sm-4 offset-lg-2 offset-md-2">
                        <button type="button" class="btn px-5 my-3 "
                            style="background-color: #f29100; color:white; font-size: 20px;">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--fin de botones-->

    @extends('backoffices.components.footer')


    <!-- scripts --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/backoffice/menuBurger.js') }}"></script>
  </body>
  </html>
