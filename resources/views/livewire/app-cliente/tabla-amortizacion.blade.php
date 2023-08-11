<style>
    @media (min-width: 768px) {
        #espacio {
            margin-right: 20px;
        }
        #espacioA {
            margin-right: 25px;
        }
        #espacioB {
            margin-left: 00px;
        }

    }
</style>
<div>
    <div class="container">
        <br />
        <h1 class="text-3xl font-bold text-datgencred text-center" style="color: #F27C00; font-size: 1.6rem;"">
            Tabla de amortización
        </h1>
        
        <br>

        <div class="d-flex flex-column flex-lg-row justify-content-center">
            <div class="row g-1">
                <div class="col-auto" id="espacio">
                    <label for="inputPassword6" class="col-form-label fw-bold">De</label>
                </div>
                <div class="col-auto" id="espacio">
                    <input type="date" id="inputPassword6" class="form-control" style="width: 130px;"
                    aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_inicio">
                </div>

                <div class="col-auto" id="espacio" >      
                    <img src="../img/CALENDARIO.svg" class="imagen-estilo" alt="" style="width: 85%;">
                </div>
                <div class="col-auto px-0 py-0" id="espacioA" >
                    <label for="inputPassword6" class="col-form-label fw-bold">a</label>
                </div>
                
                <div class="col-auto"  id="espacio" >
                    <input type="date" id="inputPassword6" class="form-control" style="width: 130px;"
                        aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_termino">
                </div>
                <div class="col-auto px-0 py-0" id="espacio" >
                    <img src="../img/CALENDARIO.svg" class="imagen-estilo" alt="" style="width: 85%;">
                </div>

                
                <div class="col-12 col-md-auto" id="espacioB" >
                    <div class="input-group" >
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                            aria-describedby="basic-addon1" wire:model="busqueda">
                    </div>
                </div>

                <div class="col-12 col-md-auto">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100" style="background: #4A9D22; height: 40px; padding: 20;">
                            Buscar
                        </button>
                    </div>
                </div>



            </div>
        </div>
        
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="border text-center" scope="col">Número de crédito</th>
                        <th class="border text-center" scope="col"># de pagos</th>
                        <th class="border text-center" scope="col">Próximo pago</th>
                        <th class="border text-center" scope="col">Interés Anual (CAT informativo sin IVA)</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Pago a Capital</th> 
                        <th class="border text-center d-none d-md-table-cell" scope="col">Intereses Ordinarios</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">IVA interes Ordinarios</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Comisiones</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Pago total mensual</th>                         
                    </tr>
                </thead>
                <tbody>
                    @if ($tabla!=null)
                        @if ($tabla->count())
                            @foreach ($tabla as $t)
                                @php
                                    $total_interes_ordinario += $t->interes_ordinarios;
                                    $total_iva_io+= $t->iva_io;
                                    $total_comisiones+= $t->comisiones;
                                    $total_pago_m+= $t->pago_total_men;                     
                                @endphp
                                <tr>
                                    <th class="border text-center" scope="col">{{$t->num_credito}}</th>
                                    <th class="border text-center" scope="col">{{$t->numero_pagos}}</th>
                                    <th class="border text-center" scope="col" style="white-space: nowrap;">{{$t->prox_pago}}</th>
                                    <th class="border text-center" scope="col">{{$t->interes_anual}}</th>
                                    <th class="border text-center d-none d-md-table-cell" scope="col">{{number_format($t->pag_capital)}}</th>
                                    <th class="border text-center d-none d-md-table-cell" scope="col">{{number_format($t->interes_ordinarios)}}</th>
                                    <th class="border text-center d-none d-md-table-cell" scope="col">{{$t->iva_io}}</th>
                                    <th class="border text-center d-none d-md-table-cell" scope="col">{{number_format($t->comisiones)}}</th>
                                    <th class="border text-center d-none d-md-table-cell" scope="col">{{number_format($t->pago_total_men)}}</th>
                                </tr>
                            @endforeach
                            <tr>
                                <th class="border text-center" scope="col" colspan="5">Total</th>
                                <th class="border text-center" scope="col">{{number_format($total_interes_ordinario)}}</th>
                                <th class="border text-center" scope="col">{{number_format($total_iva_io)}}</th>
                                <th class="border text-center" scope="col">{{number_format($total_comisiones)}}</th>
                                <th class="border text-center" scope="col">{{number_format($total_pago_m)}}</th>
                            </tr>
                        @else
                            <tr>
                                <th class="border text-center" colspan="9">Sin registros.</th>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <th class="border text-center" scope="col" colspan="9">Sin registros.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="container d-flex flex-row-reverse" style="margin-bottom: 5px;">
        <nav aria-label="Page navigation example">
            @if ($tabla!=null)
            {!! $tabla->links('appCliente.paginate') !!}
            @endif        
        </nav>
    </div>
</div>
