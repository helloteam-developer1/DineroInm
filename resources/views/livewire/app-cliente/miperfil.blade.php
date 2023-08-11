<style>
    @media screen and (max-width: 767px) {
  .btn {
    /* Estilos adicionales para alargar el botón en pantallas móviles */
    width: 75%;
  }
}
</style>

<div style="margin-top:20px;margin-bottom:20px; centrado">
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
    <div class=" row">
        <div wire:loading wire:target="guardar" class="alert alert-success alert-dismissible fade show" role="alert">
            <center>
            <p class="titulo-alert">Cargando...</p>
            <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
            </center>
        </div>
        <div class="row">
            <div class="col-4 col-md-5 offset-md-0"><label class="form-label" style="float: right; margin-right: 6%;">Nombre: </label>  
            </div>
            <div class="col-8 col-md-7">
                <label>{{Auth::user()->nombre;}}</label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4 col-md-5 offset-md-0"><label class="form-label " style="float: right; margin-right: 5%;">Telefono: </label>  
            </div>
            <div class="col-8 col-md-7">
                <label>{{Auth::user()->telefono_contacto;}}</label>
            </div>
        </div>
        <div class="row centrado" >
            <div class="col-4 col-md-5 offset-md-0">
                    <label for="inputPassword6" class="form-label " style="float: right; margin-right: 8%;">Correo:</label>
                </div>
                <div class="col-8 col-md-7">
                    <input type="email" wire:model.defer="email" placeholder="{{Auth::user()->email;}}" class="form-control email" >
                    @if ($errors->has('email'))
                    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
                        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('email') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        

        <div class="row espacio centrado">
            <div class="col-4 col-md-5 offset-md-0">
                <label for="inputPassword6" class="col-form-label me-1" style="float: right;">Contraseña: </label>
            </div>
            <div class="col-8 col-md-7">
                <a class="btn btn-griss" href="{{route('cambio-password')}}" >Cambiar contraseña</a>
            </div>
        </div>
        <div class="row espacio centrado">
            <a class="btn btn-guarda btn-block" wire:click='guardar'>Guardar cambios.</a>   
        </div>
       
        
            
    </div>
    
</div>
