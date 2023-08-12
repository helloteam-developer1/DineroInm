@extends('backoffices.layouts.basesinmenu')
@section('titulo', 'Tabla Amortizacion Editar')
@section('icono')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/CLIENTES.png') }}">
@endsection
@section('subtitulo', 'Tabla de Amortización')
@section('contenido')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6" style="border-radius: 13px; background: #e2e3e5;">
                <div class="table-responsive text-center">
                    <form action="{{route('updateAmortizacion',$tabla->id_amortizacion)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="num_credito" class="col-form-label">Número de Crédito:
                                {{ $tabla->num_credito }}</label>
                            <input type="text" class="form-control text-center" id="num_credito" name="num_credito" value="{{ $tabla->num_credito }}"
                                 readonly>
                            @error('num_credito')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="num_pagos" class="col-form-label">Numero de Pago:</label>
                            <input type="text" class="form-control text-center" id="num_pagos" name="numero_pagos" value="{{ number_format($tabla->numero_pagos )}}">
                            @error('num_pagos')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="prox_pago" class="col-form-label">Proximo pago:</label>
                            <center>
                                <input type="date" class="form-control text-center" id="prox_pago" name="prox_pago" value="{{ $tabla->prox_pago }}"
                                style="background-color: white; width: 130px; display: inline-block;">
                                <img style="display: inline-block; width:5%;" src="{{asset('img/backoffices/CALENDARIO.png')}}">
                            </center>
                            @error('prox_pago')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="interes_a" class="col-form-label">Interes anual (CAT informativo sin
                                IVA):</label>
                            <input type="text" class="form-control text-center" id="interes_a" name="interes_anual" value="{{ number_format($tabla->interes_anual )}}">
                            @error('interes_anual')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pago_capital" class="col-form-label">Pago a Capital:</label>
                            <input type="text" class="form-control text-center" id="pago_capital" name="pag_capital" value="{{ number_format($tabla->pag_capital )}}">
                            @error('pago_capital')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="interes_o" class="col-form-label">Interés ordinarios:</label>
                            <input type="text" class="form-control text-center" id="interes_o" name="interes_ordinarios"
                                value="{{ number_format($tabla->interes_ordinarios )}}">
                            @error('interes_o')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="iva_interes_io" class="col-form-label">IVA Interes Ordinario:</label>
                            <input type="text" class="form-control text-center" id="iva_interes_io" value="{{ number_format($tabla->iva_io) }}" name="iva_io">
                            @error('iva_io')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="comisiones" class="col-form-label">Comisiones:</label>
                            <input type="text" class="form-control text-center" id="comisiones" value="{{ number_format($tabla->comisiones) }}" name="comisiones">
                            @error('comisiones')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pago_t_mensual" class="col-form-label">Pago total Mensual:</label>
                            <input type="text" class="form-control text-center" id="pago_t_mensual" name="pago_total_men"
                                value="{{ number_format($tabla->pago_total_men )}}">
                            @error('pago_t_mensual')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="container-fluid mt-5">
                            <div class="row">
                                <div class="col-12 col-sm-10 col-md-10 col-lg-10 offset-sm-1 offset-md-1 offset-lg-1">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn px-5 my-3 "
                                            style="background-color: #38a937; color:white; font-size: 20px;" onclick="history.go(-1); return false;">Volver</button>
                                        </div>
                                        <div class="col-6" >
                                            <button type="submit" class="btn px-5 my-3 "
                                                style="background-color: #f29100; color:white; font-size: 20px;">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>
        </div>


    </div>
    <script>
        $("#num_pagos").on({
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
        $("#interes_a").on({
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
        $("#pago_capital").on({
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
        $("#interes_o").on({
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
        $("#iva_interes_io").on({
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
        $("#comisiones").on({
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
        $("#pago_t_mensual").on({
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
