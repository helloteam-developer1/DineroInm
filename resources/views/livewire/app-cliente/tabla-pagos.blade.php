
<div>
    <div class="container">
        <br />
        <h1 class="text-3xl font-bold text-datgencred text-center" style="color: #F27C00; font-size: 1.6rem;">
            Tabla de pagos
        </h1>
        <br>
        
        <div class="d-flex flex-column flex-lg-row justify-content-center">
            <div class="row g-1">
                <div class="col-auto " id="espacio">
                    <label for="inputPassword6" class="col-form-label fw-bold">De</label>
                </div>
                <div class="col-auto" id="espacio">
                    <input type="date" id="inputPassword6" class="form-control" style="width: 130px;"
                    aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_inicio">

                </div>

                <div class="col-auto " id="espacio">      
                    <img src="../img/CALENDARIO.svg" class="imagen-estilo" alt=""  style="width: 85%;">
                </div>
                <div class="col-auto px-0 py-0" id="espacioA">
                    <label for="inputPassword6" class="col-form-label fw-bold">a</label>
                </div>
                
                <div class="col-auto " id="espacio">
                    <input type="date" id="inputPassword6" class="form-control" style="width: 130px;"
                        aria-describedby="passwordHelpInline" wire:model.debounce.900ms="fecha_termino">
                </div>
                <div class="col-auto px-0 py-0" id="espacio">
                    <img src="../img/CALENDARIO.svg" class="imagen-estilo" alt="" style="width: 85%;">
                </div>

                
                <div class="col-12 col-md-auto" id="espacioB">
                    <div class="input-group">
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
            <table class="table table-striped" id="tablapagos">
                <thead>
                    <tr>
                        <th class="border text-center" scope="col">Pago número</th>
                        <th class="border text-center" scope="col">Fecha de pago</th>
                        <th class="border text-center" scope="col">Monto de pago</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Saldo insoluto</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col"># pagos restantes</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Resta por pagar</th>
                        <th class="border text-center d-none d-md-table-cell" scope="col">Número de crédito</th>
                    </tr>
                </thead>
                @if ($pagos == null)
                    <tbody>
                        <tr>
                            <td colspan="7" class="border text-center">Sin registros.</td>
                        </tr>
                    </tbody>
                @else
                    <tbody>
                        @if ($pagos->count())
                            @foreach ($pagos as $p)
                                <tr>
                                    <td class="border text-center">{{$p->numero_pagos}}</td>
                                    <td class="border text-center">{{$p->fecha_pago}}</td>
                                    <td class="border text-center">{{$p->monto_pago}}</td>
                                    <td class="border text-center d-none d-md-table-cell">{{$p->saldo_insoluto}}</td>
                                    <td class="border text-center d-none d-md-table-cell">{{$p->pago_rest}}</td>
                                    <td class="border text-center d-none d-md-table-cell">{{$p->resta_pagar}}</td>
                                    <td class="border text-center d-none d-md-table-cell">{{$p->num_credito}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="border text-center" colspan="7">Sin registros.</td>
                            </tr>
                        @endif
                    </tbody>
                @endif
            </table>
        </div>

        
    </div>
    <div class="container d-flex flex-row-reverse">
        <nav aria-label="Page navigation example">
            @if ($pagos != null)
                {{ $pagos->links('appCliente.paginate') }}
            @endif
        </nav>
    </div>
</div>
