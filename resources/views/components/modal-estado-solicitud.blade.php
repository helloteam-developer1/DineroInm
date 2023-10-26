<style>
  @media (max-width: 767px) {
      .mobile-button {
          padding: 8px 125px;
          margin-bottom: 15px;
      }
  }
</style>

<div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      <button type="button" class="btn-close ms-auto mt-4 me-4" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-header">
            <!-- style="border: none;" -->
           
            <h1 class="modal-title col-12 text-center p-3 texto-carotSans--Medium" id="exampleModalLabel" style="color: #4A9D22; 
            font-size: 2.59rem;">Estatus de crédito</h1>
                       
        </div>

        <div class="modal-body ms-4 me-4">
          <p class="texto-carotSans--Medium" style="font-size: 1.6rem; color: #F5A733; text-align: justify;">
            {{$estado}}
          </p>
          @switch($opcion)
            @case(0)
              <p class="texto-carotSans--Regular" style="font-size: 1.3rem; color: #474747; text-align: justify;">
                Mantente al pendiente de la aplicación, te notificaremos por correo electrónico
                si tu crédito fue aprobado y qué línea de crédito te hemos otorgado.
              </p>    
            @break
            @case(1)
              <p class="texto-carotSans--Regular" style="font-size: 25px; color: #474747;text-align: justify;">{!!$mensaje!!}</p>
            @break
            @case(2)
              <p class="texto-carotSans--Regular" style="font-size: 25px; color: #474747;text-align: justify;">{!!$mensaje!!}.<br>Intenta nuevamente después de {{$dias}} días.</p>
            @break
            @case(3)
            <p class="texto-carotSans--Regular" style="font-size: 25px; color: #474747;text-align: justify;">“Felicidades, tu línea de crédito fue aprobada”, haz click en Obtener crédito para comenzar.</p>
            @break
            @case(4)
              <p class="texto-carotSans--Regular" style="font-size: 25px; color: #474747;text-align: justify;">
                Usted ha caído en impago. Por favor, póngase al corriente con su crédito lo
                antes posible para evitar intereses moratorios y cargos extras por falta de
                pago. Para saber cómo ponerse al corriente envíe un mensaje al área de
                cobranza en la sección “mensajes”.
              </p>
            @break
          @endswitch
          
        </div>

        <div class="modal-footer" style="border: none;">
          <div class="container-fluid h-100"> 
            <div class="row w-100 align-items-center">
              <div class="col text-center">
                @switch($opcion)
                  @case(0)
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color:  #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal">Aceptar</button>
                  @break
                  @case(1)
                    <button class="btn regular-button texto-carotSans--Medium mobile-button" style="background-color: #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color: #F5A733; color: #FFFFFF;" data-bs-dismiss="modal">Haz clic aquí para terminar de completar tu información</button>
                  @break
                  @case(2)
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color:  #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal">Aceptar</button>
                  @break
                  @case(3)
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color:  #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar</button>                   
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color:  #F5A733; color: #FFFFFF;" data-bs-target="#exampleModalToggle2"  data-bs-toggle="modal" data-bs-dismiss="modal">Obtener crédito</button>                   
                  @break
                  @case(4)
                    <button class="btn regular-button texto-carotSans--Medium" style="background-color:  #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal">Aceptar</button>                   
                  @break
                @endswitch			    
              </div>	
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if ($opcion == 3)
    <!--Modal 2 de el estatus credito aprobado-->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="border: none;">
              <h1 class="modal-title col-11 text-center" id="exampleModalLabel" style="color: #4A9D22; font-size: 40px;">Instrucciones</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ms-5 me-5"text-align: justify;>
            <p>Tu crédito fue aprobado. Para comenzar, ingresa tu tarjeta de nómina, es ahí
              donde depositaremos el dinero del préstamo. También, es ahí donde mes a mes
              pagarás tus mensualidades. Para conocer los detalles del crédito entra en la
              sección“Documentación e información”.
            </p>
          </div>
          <div class="modal-footer" style="border: none;">
            <div class="container-fluid h-100"> 
              <div class="row w-100 justify-content-between">
                <div class="col-3 text-center">
                <button class="btn regular-button texto-carotSans--Medium" type="button" style="background-color: #4A9D22; color: #FFFFFF;" data-bs-dismiss="modal">Cancelar</button>
                </div>	
                <div class="col-5 text-center">
                  <button class="btn regular-button texto-carotSans--Medium" type="button" style="background-color:  #F5A733; color: #FFFFFF; " data-bs-dismiss="modal">Documentación e información</button>
                </div>	
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif 
  
</div>