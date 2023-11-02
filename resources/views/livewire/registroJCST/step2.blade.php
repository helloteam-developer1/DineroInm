<div class="container">
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2" style="margin-bottom: 20px; margin-top:10px;">
        
        {{--Inicio de campos del Formulario --}}
        <div class="col justify-content-center con-form container-fluid">
                
                
                <div class="row empresa">
                    <p class="titulo-naranja">Datos para Iniciar sesión</p>
                    <p class="titulo-campo">Datos obligatorios (*)</p>
                </div>
                <div class="row empresa">
                    <input autocomplete="off" type="tel" class="form-control" placeholder="* Teléfono de contacto" wire:model.defer="telefono_contacto" maxlength="10" required><br/>
                    @if ($errors->has('telefono_contacto'))
                        <span style="color:brown;">{{ $errors->first('telefono_contacto') }}</span>
                    @endif 
                </div>
                <div class="row empresa">
                    <input autocomplete="off" type="text" class="form-control" placeholder="* Correo electrónico" wire:model.defer="email" name="email" maxlength="50" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required><br/>
                    @if ($errors->has('email'))
                        <span style="color:brown;">{{ $errors->first('email') }}</span>
                    @endif 
                </div>
                <div class="row empresa">
                    
                    <input autocomplete="off" type="password" id="password" class="form-control empresa" placeholder="* Contraseña" wire:model.defer="password" name="password" maxlength="50" required>
                    
                    <input type="password" id="password2"class="form-control" placeholder="* Verificar contraseña" wire:model.defer="password_confirmation" name="password_confirmation" maxlength="50" required>
                    @if ($errors->has('password'))
                        <span style="color:brown;">{{ $errors->first('password') }}</span>
                    @endif 
                </div>
                    <button type="button" class="bg-green-800 hover:bg-green-700 text-white py-2 px-4 mb-3 border border-blue-700 rounded" onclick="mostrarContrasena()">Mostrar Contraseña</button>
            {{--Botones del formulario 2--}}
            <div class="row">
                <div class="col-12">
                    <div wire:loading wire:target="secondStepSubmit" class="bg-[#EAF9EA]  text-[#39A935] px-4 py-3" role="alert" style="margin-bottom: 20px">
                        <p class="font-bold">Cargando...</p>
                        <p class="text-sm text-[#F29100]">Esto dependera de la velocidad de tu internet.</p>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div>
                        <a class="btn btn-cont btn-md btn-block"  style="float: left ;margin-bottom: 10px" wire:click="back(1)">Regresar</a>
                        <a class="btn btn-reg btn-md btn-block"  wire:click="secondStepSubmit" style="float: right; margin-bottom: 10px">Continuar</a>
                    </div>
                </div>
                
    
        </div>
    
        
    
    </div>
    
</div><script>
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        var tipo2 = document.getElementById("password2");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
        if(tipo2.type == "password"){
            tipo2.type = "text";
        }else{
            tipo2.type = "password";
        }
    }
  </script>