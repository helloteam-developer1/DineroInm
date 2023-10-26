<div>
    <button class="btn boton-color boton-aceptar-solic" data-bs-toggle="modal" data-bs-target="#AceptarSolicitud{{$user->id}}" >Aceptar Solicitud</button>
    {{--Modal Aceptar Solicitud--}}
    <div class="modal fade" wire:ignore.self id="AceptarSolicitud{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        style="font-size: 35px; color:#38a937;">Aprobar crédito</h5>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <!--Modal de Carga-->
                                    <div wire:loading wire:target="aceptar"  class="alert " role="alert" style="background-color: #EAF9EA;">
                                        <i class="fa-regular fa-clock" style="color: #38a937; display:inline-block;"></i>
                                        <h4 style="color:#38a937; font-size:15px; display:inline-block;">Cargando...</h4>
                                       <h4 style="color:#F29100; font-size:15px; ">Esto dependera de tu conexión de internet.</h4>
                                    </div>
                                    {{--Errores alertas--}}
                                        @error('igual')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">Error!</strong> {{$message}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @enderror
                                        @error('cero')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">Error!</strong> {{$message}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        @error('cero_c')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">Error!</strong> {{$message}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        @error('letras')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">Error!</strong> {{$message}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        @error('letras_c')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-circle-exclamation"></i><strong style="margin-left: 5px;">Error!</strong> {{$message}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    {{--Fin Errores Alertas--}}
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
                                        <div>
                                            <label for="" class="pb-2 label-izquierda">Monto solicitado: <span style="color:#39A935; font-weight:800;">${{number_format($monto_sol)}}</span></label>
                                        </div>

                                        <div class="mt-4">
                                            <label for="" class="pb-2 label-izquierda">
                                                Monto de crédito aprobado: 
                                            </label>
                                            <input type="text" name="number" id="" class="form-control money" placeholder="$2500"
                                                wire:model.debounce.2s="monto" maxlength="8">
                                            @if ($monto=='0')
                                                <span style="color:red;">El monto no puede ser menor a 0</span>
                                            @endif
                                            @error('letras')
                                                <span style="color:red;">{{$message}}</span>
                                            @enderror
                                            @error('monto')
                                                <span style="color:red;">{{$message}}</span>
                                            @enderror
                                            @error('maximo')
                                                <span style="color:red;">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="mt-4">
                                            <label for="" class="pb-2 label-izquierda">Confirmado de crédito
                                                    aprobado: 
                                            </label>
                                            <input type="text" name="" id="" class="form-control money"
                                                    placeholder="$2500" wire:model.debounce.2s="confirmacion"  maxlength="8">
                                                @error('confirmacion')
                                                    <span style="color:red;">{{$message}}</span>
                                                @enderror
                                                @error('letras_c')
                                                    <span style="color:red;">{{$message}}</span>
                                                @enderror
                                                @error('maximo_c')
                                                    <span style="color:red;">{{$message}}</span>
                                                @enderror
                                                @if ($confirmacion=='0')
                                                    <span style="color:red;">El campo confirmación monto no puede ser menor a 0</span>
                                                @endif
                                        </div>    
                                    </div>
                                    <div wire:loading wire:target="aceptar">
                                        <p style="font-size: 1.2rem;">Cargando...</p>
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
                                            style="background-color: #38a937; color:white; margin-right: 350px;"
                                            data-bs-dismiss="modal" wire:click="clear">Cancelar</button>
                                        
                                                    <button type="button" class="btn px-4 my-2" style="background-color: #f29100; color:white;" 
                                                    @if ($errors->any())
                                                        
                                                        
                                                        disabled
                                                    @else
                                                        wire:click="aceptar({{$user->id}})" wire:loading.attr="disabled"
                                                    @endif
                                                    >Guardar</button>
                                        
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
