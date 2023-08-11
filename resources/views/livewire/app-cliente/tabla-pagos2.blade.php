<div>
    
    <div class="container">
        <br />
        <h1 class="text-3xl font-bold text-datgencred text-center" style="color: #F5A733;">
            Tabla de pagos
        </h1>
        <br>
        <div class="d-flex justify-content-center">
            <div class="row g-3">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label fw-bold">De</label>
                </div>
                <div class="col-auto">
                    <input type="date" id="inputPassword6" class="form-control"
                        aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_inicio">
                </div>
                <div class="col-auto">      
                    <img src="img/Grupo 166.png" alt="">
                </div>
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label fw-bold">a</label>
                </div>
                <div class="col-auto">
                    <input type="date" id="inputPassword6" class="form-control"
                        aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_termino">
                </div>
                <div class="col-auto">
                    <img src="img/Grupo 166.png" alt="">
                </div>
                <div class="col-auto">
                    <div class="input-group w-60">
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
                <div class="col-auto">
                    <button type="button" class="btn btn-success" style="background: #4A9D22;">Buscar</button>
                </div>
            </div>
        </div>
        <br />
        <table class="table table-striped" id="tablapagos">
            <thead>
                <tr>
                    <th class="border text-center" scope="col">Pago número</th>
                    <th class="border text-center" scope="col">Fecha de pago</th>
                    <th class="border text-center" scope="col">Monto de pago</th>
                    <th class="border text-center" scope="col">Saldo insoluto</th>
                    <th class="border text-center" scope="col"># pagos restantes</th>
                    <th class="border text-center" scope="col">Resta por pagar</th>
                    <th class="border text-center" scope="col">Número de crédito</th>
                    <!-- <td class="" style="border: none;">
                </td> -->
            </tr>
            </thead>
            
            @if ($pagos==null)
                <tbody>
                    <tr>
                        <th colspan="7" class="border text-center">Sin registros.</th>
                    </tr>
                </tbody>
            @else
                <tbody>
                    @if ($pagos->count())
                        @foreach ($pagos as $p)
                                <tr>
                                    <th class="border text-center">{{$p->numero_pagos}}</th>
                                    <th class="border text-center">{{$p->fecha_pago}}</th>
                                    <th class="border text-center">{{$p->monto_pago}}</th>
                                    <th class="border text-center">{{$p->saldo_insoluto}}</th>
                                    <th class="border text-center">{{$p->pago_rest}}</th>
                                    <th class="border text-center">{{$p->resta_pagar}}</th>
                                    <th class="border text-center">{{$p->num_credito}}</th>
                                </tr>
                        @endforeach
                    @else
                    <tr>
                        <th class="border text-center" colspan="7">Sin registros.</th>
                    </tr>
                    @endif
                    
                </tbody>
            @endif
        </table>

        <div class="row">

        </div>
    </div>

    <div class="container d-flex flex-row-reverse">
        <nav aria-label="Page navigation example">
            @if ($pagos!=null)
                    
{{--
                {{ $pagos->links('appCliente.paginate') }}       
    --}}
    
            @endif
        </nav>
    </div>
</div>
