<div>
    <!--inicio de titulo-->
    <h1 class="text-center my-5">Notificaciones</h1>
    <!--fin de titulo-->
  
    <!--inicio contenedor de texto-->
      <div class="container-fluid mt-5">
          <div class="row ">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="row">
                      <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3 bg-light py-5 px-5 rounded-3">
                          <div class="form-floating mt-3 bg-light">
                              <textarea class="form-control" style="height: 300px; resize: none;" placeholder="Comentario" maxlength="144" wire:model="mensaje"></textarea>
                              <label for="floatingTextarea" class="text-secondary">Ingresa la notificación a enviar</label>
                              <div class="col-8 col-sm-4 col-md-4 col-lg-3 offset-2 offset-sm-4 offset-md-8 offset-lg-9">
                                  <p class="text-secondary">{{$caracteres}}/144 Caracteres</p>
                              </div>
                          </div>
                          <div class="col-12 col-ms-12 col-md-12 col-lg-12 row my-5">
                              <div class="col-md-4 col-lg-4 ">
                                  <button class="btn btn-secondary boton-movil-gris py-2 px-4 mt-3" wire:click="clear">Borrar</button>
                              </div>
                              <div class="col-md-4 col-lg-4 ">
                                  <button class="btn boton-color boton-movil-verde py-2 px-3 mt-3" onclick="window.location.href='{{route('dashboard.backoffice')}}'">Cancelar</button>
                              </div>
                              <div class=" col-md-4 col-lg-4">
                                  <button class="btn boton-color-naranja boton-movil-naranja py-2 px-4  mt-3" data-bs-toggle="modal" data-bs-target="#EnviarNotificacion">Enviar</button>
                              </div>
                          </div>
  
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!--inicio contenedor de texto-->
  
    <!--inicio de modal Enviar notificacion-->
    <div class="modal fade" id="EnviarNotificacion" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="border: none;">
              <div class="col-1 col-sm-1 col-md-1 col-lg-1 offset-lg-11 offset-md-11 offset-sm-11 offset-11">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          </div>
          <div class="modal-body" style="border: none;">
              <h5 class="modal-title text-center" id="staticBackdropLabel" style="font-size: 35px; color:#38a937;">Enviar notificación a todos los clientes</h5>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-10 offset-sm-2 offset-md-2 offset-lg-1">
                              <p class="text-secondary">¿Estás seguro de querer enviar la notificación a todos los clientes? Esta acción
                                  no se podrá deshacer.</p>
                                    @error('mensaje')
                                        <p style="color: red;">{{$message}}</p>
                                    @enderror
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
                                <button type="button" class="btn px-4 my-2" style="background-color: #38a937; color:white; margin-right: 350px;" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn px-4 my-2" style="background-color: #f29100; color:white;" wire:click="save()">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--fin de modal Enviar notificacion-->
</div>
