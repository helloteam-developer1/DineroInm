<div>
    <button class="mb-2 btn px-5 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
        style="background-color: #38a937; color:white; font-size: 20px;">Agregar Fila</button>
    <br><br>
    <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="num_credito" class="col-form-label">Número de Crédito:</label>
                        <input type="text" class="form-control" id="num_credito" value="{{ $num_credito }}"
                            disabled>
                        @error('num_credito')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="num_pagos" class="col-form-label">Número de Pago:</label>
                        <input type="text" class="form-control" id="num_pagos" wire:model="num_pagos">
                        @error('num_pagos')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="prox_pago" class="col-form-label">Próximo pago:</label>
                        <input type="date" class="form-control" id="prox_pago" wire:model="prox_pago"
                            style="width: 150px;">
                        @error('prox_pago')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="interes_a" class="col-form-label">Interes anual (CAT informativo sin IVA):</label>
                        <input type="text" class="form-control" id="interes_a" wire:model="interes_anual">
                        @error('interes_anual')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pago_capital" class="col-form-label">Pago a Capital:</label>
                        <input type="text" class="form-control" id="pago_capital" wire:model="pago_capital">
                        @error('pago_capital')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="interes_o" class="col-form-label">Interés ordinarios:</label>
                        <input type="text" class="form-control" id="interes_o" wire:model="interes_o">
                        @error('interes_o')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="iva_interes_o" class="col-form-label">IVA Interes Ordinario:</label>
                        <input type="text" class="form-control" id="iva_interes_o" wire:model="iva_io">
                        @error('iva_io')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="comisiones" class="col-form-label">Comisiones:</label>
                        <input type="text" class="form-control" id="comisiones" wire:model="comisiones">
                        @error('comisiones')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pago_t_mensual" class="col-form-label">Pago total Mensual:</label>
                        <input type="text" class="form-control" id="pago_t_mensual" wire:model="pago_t_mensual">
                        @error('pago_t_mensual')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="mb-4 mx-3">

                    <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>


                    <button type="button" class="btn btn-guardar"
                        wire:click="registroT({{ $num_credito }})">Guardar</button>

                </div>
            </div>
        </div>
    </div>
</div>
