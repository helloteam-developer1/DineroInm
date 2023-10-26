<div style="margin-top:20px;margin-bottom:20px; centrado">
    <style>
    @media screen and (max-width: 767px) {
      .btn {
        /* Estilos adicionales para alargar el botón en pantallas móviles */
        width: 75%;
      }
    }
    .margin-bottom{
        margin-bottom: 1rem;
    }
    </style>
    @if (!empty($error))
        <center>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{$error}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </center>
    @endif
    @if (!empty($exito))
        <center>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$exito}} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </center>
    @endif 
    <div class="row">
        {{--Alerta Carga--}}
        <div wire:loading wire:target="guardar" class="alert alert-success alert-dismissible fade show" role="alert">
            <center>
            <p class="titulo-alert">Cargando...</p>
            <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
            </center>
        </div>
        {{--Nombre--}}
        <div class="row margin-bottom">
            <div class="col-4 col-md-5 offset-md-0"><label class="form-label" style="float: right;">Nombre Completo: </label>  
            </div>
            <div class="col-8 col-md-7">
                <input class="form-control email" type="text" placeholder="Nombre Completo" wire:model="nombre">
                @error('nombre')
                    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
                        <span style="color:brown; text-align:initial; float:left;">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
        {{--Telefono--}}
        <div class="row margin-bottom">
            <div class="col-4 col-md-5 offset-md-0"><label class="form-label " style="float: right;">Telefono: </label>  
            </div>
            <div class="col-8 col-md-7">
                <input type="tel" wire:model="telefono_contacto" class="form-control email" placeholder="Telefono de contacto" max="10">
                @error('telefono_contacto')
                    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
                        <span style="color:brown; text-align:initial; float:left;">{{ $message }}</span>
                    </div>
                @enderror
            </div>
        </div>
        {{--Email--}}
        <div class="row centrado margin-bottom" >
            <div class="col-4 col-md-5 offset-md-0">
                    <label for="inputPassword6" class="form-label " style="float: right;">Correo:</label>
                </div>
                <div class="col-8 col-md-7">
                    <input type="email" wire:model="email" placeholder="Tu correo eléctronico" class="form-control email" >
                    @if ($errors->has('email'))
                    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
                        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('email') }}</span>
                    </div>
                    @endif
                </div>
        </div>
        
        {{--Cambiar contraseña--}}
        <div class="row espacio centrado">
            <div class="col-4 col-md-5 offset-md-0">
                <label for="inputPassword6" class="col-form-label me-1" style="float: right;">Contraseña: </label>
            </div>
            <div class="col-8 col-md-7">
                <a class="btn btn-griss" href="{{route('cambio-password')}}" >Cambiar contraseña</a>
            </div>
        </div>


        <div class="row espacio centrado">
            <a class="btn btn-guarda btn-block" wire:click='guardar'>Guardar cambios</a>   
        </div>
       
        
            
    </div>
    
</div>
