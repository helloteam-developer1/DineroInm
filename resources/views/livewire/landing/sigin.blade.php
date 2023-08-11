<style>
    .btn-custom {
  background-color: #52ba42; 
    color: #fff;
}
</style>
<div>
    @if ($errors->any())
            <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="staticBackdropLabel">Inicio de sesión.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        @foreach ($errors->all() as $error)
                            <h4 class="text-danger mb-3">{{ $error }}</h4>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
            <script>
                $( document ).ready(function() {
                    $('#modal').modal('toggle')
                });
            </script>
    @endif

    <form action="{{route('login.store')}}" method="POST">
        @csrf
        <p class="texto-solicita-verde Medium Carot">Inicio de sesión</p>
        <input name="credencial" type="text" placeholder="Correo electrónico o teléfono" class="form-control Carot ExtraLight" >
        @error('credencial')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <br />
        <input name="password" type="password" placeholder="Contraseña" class="form-control Carot ExtraLight"  >
        @error('password')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <center><p class="text-green Carot Sans" style="padding-top:20px; padding-bottom:20px;">¿Olvidaste tu contraseña?. <a href="{{route('recover1')}}" class="vinculo" style=" text-decoration: underline; ">Haz clic aquí para recuperarla</a></p></center>
        <div>
            <button  class="btn btn-naranja btn-md " style="float: right; background:#da8b0c;" type="submit">Continuar</button>
            <a class="btn btn-md btn-block btn-custom" href="{{route('home')}}" style="float: left;">Regresar</a>

        </div>
    </form>
</div>
