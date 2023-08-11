<div class="container">
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3" style="margin-bottom: 20px; margin-top:10px;">

        {{--Inicio de campos del Formulario --}}
        <div class="col justify-content-center con-form container-fluid">
                <div class="row empresa">
                    <p class="titulo-naranja">Datos de contacto</p>
                    <p class="titulo-campo">Datos obligatorios(*)</p>
                    <input class="form-control" type="tel" placeholder="* Teléfono de contacto a 10 digitos" name="telefono_contacto" wire:model.defer="telefono_contacto" name="telefono_contacto" maxlength="10" required>
                    @if ($errors->has('telefono_contacto'))
                        <span style="color:brown;">{{ $errors->first('telefono_contacto') }}</span>
                    @endif
                </div>
                <div class="row empresa">
                    <p style="font-size: 1.5rem; color:#da8b0c;">Dirección:</p>
                    <div class="col">
                        <input type="text" class="form-control"  pattern="[a-zA-Z ]{2,254}" placeholder="* Calle" wire:model.defer="calle" name="calle" maxlength="30" required><br/>
                        @error('calle')
                            <span style="color:brown">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <input type="numeric" pattern="[01]{8}" class="form-control" placeholder="* Número Exterior" wire:model.defer="numero" name="email" maxlength="4" required><br/>
                        @error('numero')
                            <span style="color:brown">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <input type="numeric" pattern="[A-Za-z0-9_-]" class="form-control" placeholder="Número Interior" wire:model.defer="num_int" name="num_int" maxlength="4" required><br/>
                        @error('num_int')
                            <span style="color:brown">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <input type="text" class="form-control"  pattern="[a-zA-Z ]{2,254}" placeholder="* Colonia" wire:model.defer="colonia" name="colonia" maxlength="72" required><br/>
                        @error('colonia')
                            <span style="color:brown;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <input type="numeric" class="form-control" placeholder="* Código Postal" wire:model.defer="cp" name="cp" maxlength="5" required><br/>
                        @error('cp')
                            <span style="color:brown;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row empresa">
                    <div class="col-sm empresa">
                        <input type="text" class="form-control"  pattern="[a-zA-Z ]{2,254}" placeholder="* Municipio/Alcaldía" wire:model.defer="municipio" maxlength="40" required><br/>
                        @error('municipio')
                            <span style="color:brown;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control"  pattern="[a-zA-Z ]{2,254}" placeholder="* Estado" wire:model.defer="estado" name="estado" maxlength="30"  required><br/>    
                        @error('estado')
                            <span style="color:brown;">{{$message}}</span>
                        @enderror
                    </div>
                </div>


                {{--Alerta de formulario 3--}}
                <div class="row">
                    <div class="col-12">
                        <div wire:loading wire:target="threeStepSubmit" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                            <p class="font-bold">Cargando...</p>
                            <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet.</p>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div>
                        <a class="btn btn-cont btn-md btn-block"  style="float: left ;margin-bottom: 10px" wire:click="back(2)">Regresar</a>
                        <a class="btn btn-reg btn-md btn-block"  wire:click="threeStepSubmit" style="float: right; margin-bottom: 10px">Continuar</a>
                    </div>
                </div>
                    
    
        </div>
    
        
    
    </div>
    
</div>