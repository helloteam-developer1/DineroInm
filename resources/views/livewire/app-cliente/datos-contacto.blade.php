<div class="row mb-3">
    <form wire:submit.prevent="submit">
        <p style="font-size: 1.5rem; color:#da8b0c;">Dirección:</p>
        <p>Completa tu perfil.</p>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="* Calle" wire:model.defer="calle"  maxlength="30" required><br/>
                @error('calle')
                    <span style="color:brown">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="numeric" class="form-control" placeholder="* Número Exterior" wire:model.defer="numero" maxlength="5" required><br/>
                @error('numero')
                    <span style="color:brown">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm">
                <input type="numeric" class="form-control" placeholder="Número Interior" wire:model.defer="num_int" maxlength="5"><br/>
                @error('num_int')
                    <span style="color:brown">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="text" class="form-control"  placeholder="* Colonia" wire:model.defer="colonia" maxlength="72" required><br/>
                @error('colonia')
                    <span style="color:brown;">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm">
                <input type="numeric" class="form-control" placeholder="* Código Postal" wire:model.defer="cp" maxlength="5" required><br/>
                @error('cp')
                    <span style="color:brown;">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row empresa">
            <div class="col-sm empresa">
                <input type="text" class="form-control" placeholder="* Municipio/Alcaldía" wire:model.defer="municipio" maxlength="40" required><br/>
                @error('municipio')
                    <span style="color:brown;">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm">
                <input type="text" class="form-control" placeholder="* Estado" wire:model.defer="estado" maxlength="30"  required><br/>    
                @error('estado')
                    <span style="color:brown;">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div wire:loading wire:target="submit" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                    <p class="font-bold">Cargando...</p>
                    <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet.</p>
                </div>
            </div>
        </div>
        <input class="form-control" type="submit" value="Enviar" style="background-color: #4A9D22; color:white;">
    </form>
</div>