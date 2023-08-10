<div>
    <button class="mb-2 btn px-5 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
        style="background-color: #38a937; color:white; font-size: 20px;">
        Agregar Fila
    </button>
    <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo registro.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="num_credito" class="col-form-label">Número de Credito:</label>
                            <input type="text" class="form-control" id="num_credito" value="{{ $num_credito }}"
                               wire:model="n_credito" disabled>
                            @error('num_credito')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="numero_pagos" class="col-form-label">Número de Pago:</label>
                            <input type="text" class="form-control" id="numero_pagos" wire:model="numero_pagos">
                            @error('numero_pagos')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fecha_pago" class="col-form-label">Fecha de Pago:</label>
                            <input type="date" class="form-control" id="fecha_pago" wire:model="fecha_pago"
                                style="width: 150px;">
                            @error('fecha_pago')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="monto_pago" class="col-form-label">Monto Pagado:</label>
                            <input type="text" class="form-control" id="monto_pago" wire:model="monto_pago">
                            @error('monto_pago')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="saldo_insoluto" class="col-form-label">Saldo Insoluto:</label>
                            <input type="text" class="form-control" id="saldo_insoluto" wire:model="saldo_insoluto" readonly>
                            @error('saldo_insoluto')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3"><label for="">Pago restante</label><input class="form-control" type="text" value="{{$pago_rest}}"></div>
                        <div class="mb-3"><label for="">Resta pagar</label><input class="form-control" type="text" value="{{$resta_pagar}}"></div>
                        @error('pagos')
                            <span style="color:red;">{{$message}}</span>
                            <br />
                        @enderror
                        <div class="mb-4 mx-3" style="margin-top:20px;">
                          <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-guardar" wire:loading.attr="disabled" wire:click="registroP()">Guardar</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
