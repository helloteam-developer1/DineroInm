 {{--Boton para subir img--}}
 <div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold" style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">INE Frente</label>
    <div class="col-sm-2">
      @if ($ine_frente)
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#INEFrenteModalIMG">
            Vista previa
        </button>
        <div class="modal fade" id="INEFrenteModalIMG" tabindex="-1" aria-labelledby="INEFrenteModalIMG" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border: none;">
                  <h1 class="modal-title fs-5" id="INEFrenteModalIMG">INE FRENTE</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <img src="{{ $ine_frente->temporaryUrl() }}" width="100%" height="auto" alt="No se encontró el Ine frente"/>
            </div>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-Guardar" style="height: 50px; width: 150px; margin-right: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
          </div>
        </div>
      @endif
    </div>
    <div class="col-sm-4">
        <img src="{{Auth::user()->ine_frente}}" style="width: 10%; height:auto;">
        <a class="btn btn-gris" onclick="document.getElementById('getFileIneFrente').click()">Adjuntar archivo</a>
        <input type='file' id="getFileIneFrente" style="display:none" name="ine_frente" wire:model="ine_frente">
    </div>
    @if ($errors->has('ine_frente'))
      <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_frente') }}</span>
    @endif
  </div>
  <div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold" style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">INE Reverso</label>
    <div class="col-sm-2">
      
      @if ($ine_reverso)
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#INEReversoModalIMG">
          Vista previa
        </button>
        <div class="modal fade" id="INEReversoModalIMG" tabindex="-1" aria-labelledby="INEReversoModalIMG" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="INEReversoModalIMG">INE REVERSO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <img src="{{ $ine_reverso->temporaryUrl() }}" width="100%" height="auto" />
              </div>
              <div class="modal-footer" style="border: none;">
                  <button type="button" class="btn btn-Guardar" style="height: 50px; width: 150px; margin-right: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
      <div class="col-sm-4">
        <img src="{{Auth::user()->ine_reverso}}" style="width: 10%; height:auto;">
        <a class="btn btn-gris" onclick="document.getElementById('getFileIneReverso').click()">Adjuntar archivo</a>
        <input type='file' id="getFileIneReverso" style="display:none" name="ine_reverso" wire:model="ine_reverso">
      </div>
      @if ($errors->has('ine_reverso'))
        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_reverso') }}</span>
      @endif
  </div>
  <div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold" style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">Comprobante de domicilio</label>
    <div class="col-sm-2">
      @if ($comp_dom)
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ComproDomicilioIMG">
          Vista previa
        </button>
        <div class="modal fade" id="ComproDomicilioIMG" tabindex="-1" aria-labelledby="ComproDomicilioIMG" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="border: none;">
                <h1 class="modal-title fs-5" id="ComproDomicilioIMG">COMPROBANTE DE DOMICILIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <img src="{{ $comp_dom->temporaryUrl() }}" width="100%" height="auto" />
              </div>
              <div class="modal-footer" style="border: none;">
                  <button type="button" class="btn btn-Guardar" style="height: 50px; width: 150px; margin-right: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
      <div class="col-sm-4">
        <img src="{{Auth::user()->comp_dom}}" style="width: 10%; height:auto;">
        <a class="btn btn-gris" onclick="document.getElementById('getFileComp').click()">Adjuntar archivo</a>
        <input type='file' id="getFileComp" style="display:none" name="comp_dom" wire:model="comp_dom">
      </div>
      @if ($errors->has('comp_dom'))
      <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('comp_dom') }}</span>
      @endif
  </div>
  <div class="row mb-3 justify-content-center">
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold" style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">Foto con INE</label>
    <div class="col-sm-2">
      @if ($foto_cine)
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#FotoConINEIMG">
          Vista previa
        </button>
        <div class="modal fade " id="FotoConINEIMG" tabindex="-1" aria-labelledby="FotoConINEIMG" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"  style="border: none;">
                <h1 class="modal-title fs-5" id="FotoConINEIMG">FOTO CON INE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <img src="{{ $foto_cine->temporaryUrl() }}" width="100%" height="auto" />
              </div>
              <div class="modal-footer" style="border: none;">
                  <button type="button" class="btn btn-Guardar" style="height: 50px; width: 150px; margin-right: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
      <div class="col-sm-4">
        <img src="{{Auth::user()->foto_cine}}" style="width: 10%; height:auto;">
        <a class="btn btn-gris" onclick="document.getElementById('getFileCURP').click()">Adjuntar archivo</a>
        <input type='file' id="getFileCURP" style="display:none" name="foto_cine" wire:model="foto_cine">
      </div>
      @if ($errors->has('foto_cine'))
      <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('foto_cine') }}</span>
      @endif
      
  </div>