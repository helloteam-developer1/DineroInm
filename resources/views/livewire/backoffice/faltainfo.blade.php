

<div>
    <button class="btn boton-color boton-falta-inf" data-bs-toggle="modal" data-bs-target="#FaltaInfo{{$user->id}}">
        Falta inf por com. o es inc.
    </button>
    <div class="modal fade" id="FaltaInfo{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 offset-lg-11 offset-md-11 offset-sm-11 offset-11">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body" style="border: none;" wire:ignore.self>
                    <h5 class="modal-title text-center" id="staticBackdropLabel"
                        style="font-size: 35px; color:#38a937;">Seleccione una Opción</h5>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div wire:loading wire:target="docincomp" class="alert " role="alert" style="background-color: #EAF9EA;">
                                <i class="fa-regular fa-clock" style="color: #38a937; display:inline-block;"></i>
                                <h4 style="color:#38a937; font-size:15px; display:inline-block;">Cargando...</h4>
                               <h4 style="color:#F29100; font-size:15px; ">Esto dependera de tu conexión de internet.</h4>
                            </div>
                            @error('opciones')
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation" style="color: #000000;"></i> {{$message}}
                                </div>
                            @enderror
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-10 offset-md-3 offset-lg-1">
                                        <div>
                                            <div class="form-check my-4">
                                                <input class="form-check-input" type="checkbox" name="opcion"
                                                    id="flexCheckDefault" wire:model="opcion1" value="1">
                                                <label class="form-check-label label-izquierda" for="flexCheckDefault">
                                                    Documento Inválido o información incorrecta, favor de volver a
                                                    subir.
                                                </label>
                                            </div>
                                            <div class="form-check my-4">
                                                <input class="form-check-input" type="checkbox"name="opcion"
                                                    id="flexCheckDefault2" wire:model="opcion2" value="1">
                                                <label class="form-check-label label-izquierda" for="flexCheckDefault2">
                                                    Documentación incompleta: falta documentación por subir.
                                                </label>
                                            </div>
                                            
                                            <div class="form-check my-4">
                                                <input class="form-check-input" type="checkbox" name="opcion"
                                                        id="flexCheckDefault3" wire:model="otro" value="1">
                                                <label class="form-check-label label-izquierda" for="flexCheckDefault3">
                                                        Otro.
                                                </label>
                                           </div>
                                            
                                            <div class="form-floating mt-3">
                                                <textarea class="form-control footer-textarea" style="height: 160px;" placeholder="Comentario" wire:model="mensaje"></textarea>
                                                <label for="floatingTextarea">Escribe mensaje</label>
                                                <div
                                                    class="col-3 col-sm-3 col-md-3 col-lg-3 offset-9 offset-sm-9 offset-md-9 offset-lg-9">
                                                    <p class="text-secondary">{{$contador}}/300 Caracteres</p>
                                                </div>
                                            </div>
                                            
                                            @error('mensaje')
                                                <div class="row">
                                                    <span style="color:red;">{{$message}}</span>
                                                </div>
                                            @enderror
                                            @if ($contador>=300)
                                            <div class="row">
                                                <span style="color:red;">El mensaje no puede ser mayor a 300 caracteres</span>
                                            </div>
                                            @endif
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
                                        <button type="button" class="btn px-4 my-2"
                                            style="background-color: #38a937; color:white; margin-right: 64%;"
                                            data-bs-dismiss="modal" wire:click="limpiar()">Cancelar</button>
                                        @if ($contador>=300)
                                            <button type="button" class="btn px-4 my-2"
                                            style="background-color: #f29100; color:white;">Enviar</button>
                                        @else
                                            <button type="button" class="btn px-4 my-2"
                                            style="background-color: #f29100; color:white;" wire:click="docincomp({{$user->id}})">Enviar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
