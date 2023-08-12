<div>
    
    @switch($opcion)
        @case(0)
        
        @break
        @case(1)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{$mensaje}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @break
        @case(2)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$mensaje}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @break
        @default
            
    @endswitch
    
    <div class="row empresa">
        <div wire:loading wire:target="cambiar" class="alert alert-success alert-dismissible fade show" role="alert">
            <center>
              <p class="titulo-alert">Cargando...</p>
              <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
            </center>
        </div>
        <input type="password" id="actual" class="form-control" placeholder="* Contraseña Actual" wire:model.defer="actual" name="actual" maxlength="50" required style="margin-bottom: 15px;">
        @if ($errors->has('actual'))
            <span style="color:brown;">{{ $errors->first('actual') .$actual}}</span>
        @endif 
    </div>
    <div class="row empresa">
        <input type="password" id="password" class="form-control" placeholder="* Nueva Contraseña" wire:model.defer="password" name="password" maxlength="50" required >
        
        <input type="password" id="password2"class="form-control" placeholder="* Confirmación de contraseña" wire:model.defer="password_confirmation" name="password_confirmation" maxlength="50" required style="margin-top:15px;">
        @if ($errors->has('password'))
            <span style="color:brown;">{{ $errors->first('password') }}</span>
        @endif 
        <div class="center">
            <button type="button" class="btn btn-cambio" wire:click="cambiar">Aceptar</button>       
        </div>
    </div>
    <!--<div class="row">
        <center>
            <button type="button" class="btn btn-gris" onclick="mostrarContrasena()" style="margin-top: 20px;margin-bottom:15px;">Mostrar Contraseña</button>
        </center>    
    </div>-->
    
  
    
        <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            var tipo2 = document.getElementById("password2");
            var tipo3 = document.getElementById("actual");
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
            if(tipo3.type == "password"){
                tipo3.type = "text";
            }else{
                tipo3.type = "password";
            }
        }
      </script>
</div>
