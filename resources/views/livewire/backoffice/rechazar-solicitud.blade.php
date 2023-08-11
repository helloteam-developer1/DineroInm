<div>
    <button class="btn boton-color boton-rechazar-solic" data-bs-toggle="modal" data-bs-target="#RechazarSolicitud{{$user->id}}">Rechazar Solicitud</button>

    <div class="modal fade" wire:ignore.self id="RechazarSolicitud{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 offset-lg-11 offset-md-11 offset-sm-11 offset-11">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body" style="border: none;">
                    <h5 class="modal-title text-center" id="staticBackdropLabel"
                        style="font-size: 35px; color:#38a937;">¿Estas seguro de rechazar la solicitud?</h5>
                        @if (!empty($mensaje))
                            <p>{{$mensaje}}</p>
                        @endif
                        
                    <div class="container-fluid mt-5" wire:ignore.self>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div wire:loading wire:target="rechazar" class="alert " role="alert" style="background-color: #EAF9EA;">
                                        <i class="fa-regular fa-clock" style="color:#38a937; display:inline-block;"></i>
                                        <h4 style="color:#38a937; font-size:15px; display:inline-block;">Cargando...</h4>
                                       <h4 style="color:#F29100; font-size:15px; ">Esto dependera de tu conexión de internet.</h4>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-10 offset-md-3 offset-lg-1">
                                        <label for="" class="pb-2 label-izquierda">Motivo de rechazo:</label>
                                        <div class="form-floating mt-3">
                                            <textarea class="form-control footer-textarea" style="height: 185px;" placeholder="Comentario" maxlength="300" wire:model="texto" id="contador" onkeyup="contarletras();" wire:ignore.self></textarea>
                                            <label for="floatingTextarea">Escribe mensaje</label>
                                            <div
                                                class="col-3 col-sm-3 col-md-3 col-lg-3 offset-9 offset-sm-9 offset-md-9 offset-lg-9">
                                                <p class="text-secondary">{{$contador}}/300 Caracteres</p>
                                                <div  id="respuesta"></div>
                                            </div>
                                            @error('texto')
                                                <span style="color: red; font-size:17px;">{{$message}}</span>
                                            @enderror
                                            @error('error')
                                                <span style="color: red; font-size:17px;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none;">
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                                        <button type="button" class="btn px-4 py-2 my-2"
                                            style="background-color: #38a937; color:white; margin-right: 63%;"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn px-4 py-2 my-2"
                                            style="background-color: #f29100; color:white;" wire:click="rechazar({{$user->id}})">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    /*function contarletras(){

        
         var total = 300;

        setTimeout(function(){

            var valor = document.getElementById('contador');
            var respuesta = document.getElementById('respuesta');

            var cantidad = valor.value.length;

            document.getElementById('respuesta').innerHTML = cantidad;

        });
    }*/
    </script>
</div>
