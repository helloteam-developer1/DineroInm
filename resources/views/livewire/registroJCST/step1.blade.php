<div class="container">
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }} justify-content-center" id="step-1" >
                    
        <div class="cab">
            <p class="texto">Tu tienes una línea de crédito pre aprobada con nosotros, está línea de crédito se debe verificar por expertos, 
                para ello te solicitaremos una serie de documentos que puedes ingresar en el momento de tu registro o más adelante.</p>
            <p class="titulo-naranja">Llena tu registro para continuar</p>
        </div>
        
    
        {{--Inicio de campos del Formulario --}}
            <div class="col justify-content-center con-form container-fluid">
                    <p class="titulo-rojo ">Datos obligatorios (*)</p>
                    <!--Input de CURP-->
                    <div class="row">
                        <div class="col-lg">
                            <input type="text" placeholder="* CURP" class="form-control input-c" wire:model.defer="curp" name="curp" maxlength="18" required>
                        </div>   
                        <!--Link para el CURP-->
                        <div class="col-auto flex-right">
                            <a class="vinculo" href="https://www.gob.mx/curp/" target="_blank">¿No conoces tu CURP?</a>
                        </div>
                    </div>  
                    @if ($errors->has('curp'))
                        <span style="color:brown;">{{ $errors->first('curp') }}</span>
                    @endif 
                    @if ($errors->has('CURP'))
                        <span style="color:brown;">{{ $errors->first('CURP') }}</span>
                    @endif 
                    <!--Input Fecha de nacimiento-->
                    <div class="row fecha">
                        <div class="col-12 flex-left mb-1">
                            * Fecha de nacimiento (YYYY-MM-DD)
                        </div>
                    </div> 
                    {{--Inptus Fecha--}}
                    <div class="row fecha-i">
                        <div class="col-4">
                            @include('livewire.registroJCST._year')
                        </div> 
                        <div class="col-4">
                            @include('livewire.registroJCST._mes')
                        </div>
                        <div class="col-4">
                            @include('livewire.registroJCST._dia')
                        </div>
                                                   
                        @error('bisiesto')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <!--Empresa donde trabajas -->    
                    <div class="row empresa" >
                        <div class="col-12">
                        <input type="text" placeholder="* Empresa donde trabajas" class="form-control" wire:model.defer="empresa_trabajo" name="empresa_trabajo" maxlength="40" required>
                        @if ($errors->has('empresa_trabajo'))
                            <span style="color:brown;">{{ $errors->first('empresa_trabajo') }}</span>
                        @endif 
                        </div>
                    </div>
                    
                    <!--Select Antiguedad-->
                    <div class="row empresa" >
                        <div class="col-12">
                            <select class="form-select" wire:model.defer="antiguedad" name="antiguedad" required>
                                <option>* Antigüedad de su trabajo actual</option>
                                <option value="de 0 a 3 meses ">De 0 a 3 meses </option>
                                <option value="de 3 a 6 meses">De 3 a 6 meses</option>
                                <option value="de 6 a 12 meses">De 6 a 12 meses</option>
                                <option value="1 año">1 año</option>
                                <option value="de 1 a 3 años">De 1 a 3 años</option>
                                <option value="de 3 a 5 años">De 3 a 5 años</option>
                                <option value="de 5 a 10 años">De 5 a 10 años</option>
                                <option value="mas de 10 años">Más de 10 años</option>
                            </select>
                            @if ($errors->has('antiguedad'))
                                <span style="color:brown;">{{ $errors->first('antiguedad') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row empresa" >
                        <div class="col-12">
                            <!--autocompletable que esta en _lista de view registro JCST-->
                            @include('livewire.registroJCST._lista')
                        </div>
                    </div>
                    
                    <div class="row"  >
                        <div class="col-12">            
                            <!--Banco de Cuentas-->
                            <select class="form-select" wire:model.defer="banco_nomina" name="banco_nomina" required>
                                <option>* Banco de cuenta de nomina</option>
                                
                                @foreach ($empresas as $e)
                                <option value="{{$e->name}}">{{ $e->name }}</option>    
                                @endforeach
                            </select>
                            @if ($errors->has('banco_nomina'))
                                <span style="color:brown;">{{ $errors->first('banco_nomina') }}</span>
                            @endif
                        </div>
                    </div>
                    {{--Botones del formulario 1--}}
                    <br />
                    <div class="row">
                        <div class="col-12">
                            <div wire:loading wire:target="firstStepSubmit" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                                <p class="font-bold">Cargando...</p>
                                <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-cont btn-md btn-block"  style="float: left; margin-bottom: 10px;" onclick="window.location.href='{{route('home')}}'">Regresar</a>
                        <a class="btn btn-reg btn-md btn-block"  wire:click="firstStepSubmit" style="float: right; margin-bottom:10px;">Continuar</a>
                    </div>
                
        
            </div>
        
    </div>
    </div>
