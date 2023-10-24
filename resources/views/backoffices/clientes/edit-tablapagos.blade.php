@extends('backoffices.layouts.basesinmenu')
@section('titulo', 'Tabla de Pagos Editar')
@section('icono')
<link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/CLIENTES.png') }}">
@endsection
@section('subtitulo','Tabla de Pagos')
@section('contenido')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12" >
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 p-4" style="border-radius: 13px; background: #e2e3e5;">
                    <div class="table-responsive text-center">
                        <form action="{{route('tablaedit',$pagos->id_pago)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="num_credito" class="col-form-label">Número de Crédito:</label>
                                <input type="text" class="form-control" id="num_credito" value="{{ $pagos->num_credito }}" name="n_credito"
                                 style="background-color:white;" readonly>
                                @error('n_credito')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="numero_pagos" class="col-form-label">Numero de Pago:</label>
                                <input type="text" class="form-control" id="numero_pagos" value="{{number_format($pagos->numero_pagos)}}" name="numero_pagos">
                                @error('numero_pagos')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fecha_pago" class="col-form-label">Fecha Pago:</label>
                                <input type="date" class="form-control" id="fecha_pago" value="{{$pagos->fecha_pago}}"
                                    style="width: 150px; background-color:white;" name="fecha_pago">
                                @error('fecha_pago')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="monto_pago" class="col-form-label">Monto Pagado:</label>
                                <input type="text" class="form-control" id="monto_pago" value="{{number_format($pagos->monto_pago)}}" name="monto_pago">
                                @error('monto_pago')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="saldo_insoluto" class="col-form-label">Saldo Insoluto:</label>
                                <input type="text" class="form-control" id="saldo_insoluto" value="{{number_format($pagos->saldo_insoluto)}}" name="saldo_insoluto">
                                @error('saldo_insoluto')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <button type="button" class="btn btn-cancelar" onclick="history.go(-1); return false;" style="float: left;">Cancelar</button>
                                <button type="submit" class="btn btn-guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>
<script>
     $("#numero_pagos").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
     $("#monto_pago").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
     $("#saldo_insoluto").on({
            "focus": function(event) {
                $(event.target).select();
            },
            "keyup": function(event) {
                $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
</script>
@endsection