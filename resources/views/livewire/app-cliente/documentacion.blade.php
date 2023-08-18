<div>
  <!--Mensajes para el usuario-->
  @if (session()->has('inefrente'))
  <div style="display:flex; justify-content:center; align-items:center; flex-direction:colum;">
    <div class="alert alert-success">
      {{session('inefrente')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
    
  @endif
  @if (session()->has('inereverso'))
    <div class="alert alert-success">
      {{session('inereverso')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
    </div>
  @endif
  @if (session()->has('comp_dom'))
    
  @endif
  @if (session()->has('fotocine'))
    <div class="alert alert-success">
      {{session('fotocine')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
    </div>
  @endif

  @error('img')
    <center>
      <div class="alert alert-danger">
          {{$message}}
      </div>
    </center>
  @enderror
  
  <div style="  justify-content:center; align-items:center; flex-direction:row;">
    
      {{-- alerta de carga ine frente --}}
      
        <div wire:loading wire:target="ine_frente" class="alerta alert" role="alert" style="width: 100%;">
          <center>
            <p class="titulo-alert">Espera estamos cargando Ine Frente...</p>
            <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
          </center>
          
        </div>
     
  
      {{-- alerta de carga reverso --}}
      <div wire:loading wire:target="ine_reverso" class="alerta alert" role="alert" style="width: 100%;">
          <center>
              <p class="titulo-alert">Espera estamos cargando Ine Reverso...</p>
              <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
          </center>
      </div>
      {{-- alerta de carga comprobante de docmicilio --}}
      <div wire:loading wire:target="comp_dom" class="alerta alert" role="alert" style="width: 100%;">
          <center>
              <p class="titulo-alert">Espera estamos cargando comprobante de domicilio...</p>
              <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
          </center>
      </div>
      {{-- alerta de carga foto con ine --}}
      <div wire:loading wire:target="foto_cine" class="alerta alert" role="alert" style="width: 100%;">
          <center>
              <p class="titulo-alert">Espera estamos cargando foto con ine...</p>
              <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
          </center>
      </div>
      <div wire:loading wire:target="subirIMG" class="alerta alert" role="alert" style="width: 100%;">
        <center>
            <p class="titulo-alert">Cargando...</p>
            <p class="subt-alert">El tiempo de espera dependerá de la velocidad de tu internet.</p>
        </center>
    </div>

  </div>
  <div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        @switch($documentacion)
          @case(1)
            @include('appCliente.documentacion.documentacionexitosa')
          @break
          @case(2)
            @include('appCliente.documentacion.formularioimg')
          @break
          @case(3)
            @include('appCliente.documentacion.formularioimg')
          @break
          @case(4)
            @include('appCliente.documentacion.formularioimg')
          @break
          @default
            @include('appCliente.documentacion.documentacionrevision')
        @endswitch
    </div>
  </div>
  
  
      <div class="row mb-2 justify-content-start">
        <div class="col">
          @switch($documentacion)
          @case(1)
              <img src="img/assets/aplicacionCliente/Grupo 117.png" alt=""  class="img-small img-fluid">
              <span>La información es correcta y ha sido verificada.</span>
            @break

            @case(3)
            <div class="row justify-content-end align-items-center">
                <div class="col-lg-1 col-2 ml-auto"> <!-- Columna para la imagen en pantallas grandes y medianas -->
                    <img src="img/assets/aplicacionCliente/Grupo 444.png" alt="" class="img-large img-small">
                </div>
                <div class="col-lg-11 col-10"> <!-- Columna para el texto en pantallas grandes y medianas -->
                <span style="border-color: red;">Favor de subir un documento válido, actual o vigente.</span>
                </div>
            </div> 
            @break
            @case(2)
              <img src="img/assets/aplicacionCliente/Grupo 444.png" alt=""  class="img-large img-small">
              <span style="border-color: red;">Favor de subir un documento válido, actual o vigente.</span>
            @break
            @default
            
          @endswitch
        <br>

        </div>
        <div class="col-lg-2 col-12 ">
          @if ($documentacion == 1)
              <a class="btn btn-Guardar btn-block w-100">Guardar</a>
          @endif
          @if ($documentacion == 3 || $documentacion == 4)
              <a class="btn btn-Guardar btn-block w-100" wire:click="subirIMG">Guardar</a>
          @endif
            @if ($documentacion==2)
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-Guardar" data-bs-toggle="modal" data-bs-target="#ModalDias">
                Guardar
              </button>
              <!-- Modal -->
              <div class="modal fade" id="ModalDias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Espera!</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Tienes que esperar 30 dias para poder subir de nuevo tu documentación.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
                    </div>
                  </div>
                </div>
              </div>
            @endif
        </div>
      </div>

</div>
