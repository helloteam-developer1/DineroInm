<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notificaciones</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img/backoffices/ICONO_NOTIFICACIONES.svg') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/backoffice/style.css') }}">

</head>
<body>

  <!-- inicio de navbar --->
  <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand navbar-light border shadow">
      <div class="container-fluid">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                  <div class=" col-4 col-sm-4 col-md-4 col-lg-2 offset-sm-4 offset-md-4 offset-lg-1 me-5" id="logoDI">
                      <img src="{{ asset('img/logo.png') }}"  width="120" class="my-2 ms-2" alt="logo">
                  </div>
                  <div class=" col-4 col-sm-10 col-md-8 col-lg-4 offset-2 offset-sm-1 offset-md-2 offset-lg-4 mt-4">
                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                          <ul class="navbar-nav navDestop">
                            <li class="nav-item">
                                <a class="nav-link" href="/clientes"><img
                                        src="{{ asset('img/backoffices/Grupo 979.png') }}" width="20"
                                        alt="CLIENTES"> Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/notificaciones" style="color: #38a937;"><img
                                        src="{{ asset('img/backoffices/Grupo 977.png') }}" width="20"
                                        alt="NOTIFICACION"> Notificaciones</a>
                            </li>
                              <li class="nav-item dropdown ms-4">
                                  <a class="nav-link" href="#" id="navbarDropdownMenuLink"
                                      role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <img src="{{ asset('img/backoffices/ICONO AJUSTES.svg') }}" width="20"
                                          alt="Ajustes">
                                      Ajustes
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                      <li><a class="dropdown-item" href="/perfil"><img style="margin-right: 10px"
                                                  src="{{ asset('img/backoffices/ICONO_PERFIL.svg') }}" width="20"
                                                  alt="perfil">Mi Perfil</a></li>
                                      <hr>
                                      <li><a class="dropdown-item" href="#"><img style="margin-right: 10px"
                                                  src="{{ asset('img/backoffices/ICONO_CONTACTO.svg') }}"
                                                  width="20" alt="contacto">Contacto</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                      <!-- inicio menu burger -->
                      <div class="container">
                          <div class="MeinBurger navMovil">
                              <div class="burger">
                                  <button>
                                      <span class="top-line"></span>
                                      <span class="middle-line"></span>
                                      <span class="botton-line"></span>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="Menu close">
                          <div class="enlaces">
                              <ul>
                                  <li><a href="/clientes" ><img src="{{ asset('img/backoffices/Grupo 979.png') }}" width="15" alt=""> Clientes</a></li>
                                  <li><a href="/notificaciones" style="color: #38a937;"><img src="{{ asset('img/backoffices/Grupo 977.png') }}" width="15" alt="">Notificaciones</a></li>
                                  <li>
                                      <a href="#"><img src="{{ asset('img/backoffices/ICONO AJUSTES.svg') }}" width="15" alt="">Ajustes</a>
                                      <ul>
                                          <li><a href="/perfil"><img src="{{ asset('img/backoffices/ICONO_PERFIL.svg') }}" width="15" alt="">Mi Perfil</a></li>
                                          <li><a href=""><img src="{{ asset('img/backoffices/ICONO_CONTACTO.svg') }}" width="15" alt="">Contacto</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- fin menu burger -->
              </div>
          </div>
      </div>
  </nav>
  <!--fin de navbar --->

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
                            <textarea class="form-control" style="height: 300px; resize: none;" placeholder="Comentario" maxlength="144"></textarea>
                            <label for="floatingTextarea" class="text-secondary">Ingresa la notificación a enviar</label>
                            <div class="col-8 col-sm-4 col-md-4 col-lg-3 offset-2 offset-sm-4 offset-md-8 offset-lg-9">
                                <p class="text-secondary">0/144 Caracteres</p>
                            </div>
                        </div>
                        <div class="col-12 col-ms-12 col-md-12 col-lg-12 row my-5">
                            <div class="col-md-4 col-lg-4 ">
                                <button class="btn btn-secondary boton-movil-gris py-2 px-4 mt-3">Borrar</button>
                            </div>
                            <div class="col-md-4 col-lg-4 ">
                                <button class="btn boton-color boton-movil-verde py-2 px-4 mt-3">Cancelar</button>
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
  <div class="modal fade" id="EnviarNotificacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                              <button type="button" class="btn px-4 my-2" style="background-color: #f29100; color:white;">Aceptar</button>
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

  @extends('backoffices.components.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{ asset('js/backoffice/menuBurger.js') }}"></script>
</body>
</html>
