<style>
    @media (min-width: 768px) {
        #vistaP {
            margin-top: 10px;
        }
    }
</style>
<h1 class="texto-carotSans--Medium titulo mover-derecha" style="color: #4A9D22; font-size: 2rem;">Crédito en Revisión</h1>


<div class="row mb-4 justify-content-start">
    <label for="inputEmail3" class="col-5 col-form-label fw-bold"
        style="margin-top: 20px; font-family: Carot Sans; color: #3C3C3B; font-size: 1.3rem; ">INE Frente</label>
    <div class="col-3">
        <img src="{{ Auth::user()->ine_frente }}" style="width: 80%; height:auto; margin-top: 16px;">
        <div class="modal fade" id="INEFrenteModalIMG" tabindex="-1" aria-labelledby="INEFrenteModalIMG"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <h1 class="modal-title fs-5" id="INEFrenteModalIMG">INE FRENTE</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Auth::user()->ine_frente }}" width="100%" height="auto" />
                    </div>
                    <div class="modal-footer "
                        style="display:flex; justify-content: center; align-items:center; border: none;">
                        <button type="button" class="btn btn-Guardar"
                            style="height: 50px; width: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-4 justify-content-start" id="vistaP">
        <button type="button" style=" margin-top: 10px;" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#INEFrenteModalIMG">
            Vista previa
        </button>
    </div>
</div>





<div class="row mb-4 justify-content-start">
    <label for="inputEmail3" class="col-5 col-form-label fw-bold"
        style="margin-top: 20px; font-family: Carot Sans; color: #3C3C3B; font-size: 1.3rem; ">INE Reverso</label>
    <div class="col-3">
        <img src="{{ Auth::user()->ine_reverso }}" style="width: 80%; height:auto; margin-top: 16px;">


        <div class="modal fade" id="INEReversoModalIMG" tabindex="-1" aria-labelledby="INEReversoModalIMG"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <h1 class="modal-title fs-5" id="INEReversoModalIMG">INE Reverso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Auth::user()->ine_reverso }}" style="width: 100%; height:auto;">
                    </div>
                    <div class="modal-footer"
                        style="display:flex; justify-content: center; align-items:center; border: none;">
                        <button type="button" class="btn btn-Guardar"
                            style="height: 50px; width: 150px; font-size: 25px" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 justify-content-start">
        <button type="button" style=" margin-top: 10px;" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#INEReversoModalIMG">
            Vista previa
        </button>
        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_frente') }}</span>
    </div>
</div>


<div class="row mb-4 justify-content-start">
    <label for="inputEmail3" class="col-5 col-form-label fw-bold"
        style="margin-top: 8px; font-family: Carot Sans; color: #3C3C3B; font-size: 1.3rem; ">Comprobante de
        Domicilio</label>
    <div class="col-3">
        <img src="{{ Auth::user()->comp_dom }}" style="width: 80%; height:auto; margin-top: 16px;">
        <div class="modal fade" id="ComproDomicilioIMG" tabindex="-1" aria-labelledby="ComproDomicilioIMG"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <h1 class="modal-title fs-5" id="ComproDomicilioIMG">Comprobante de Domicilio</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <img src="{{ Auth::user()->comp_dom }}" style="width: 100%; height:auto;">

                    </div>
                    <div class="modal-footer"
                        style="display:flex; justify-content: center; align-items:center; border: none;">
                        <button type="button" class="btn btn-Guardar"
                            style="height: 50px; width: 150px; font-size: 25px"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 justify-content-start" id="vistaP">
        <button type="button" style=" margin-top: 10px;" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#ComproDomicilioIMG">
            Vista previa
        </button>
        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_frente') }}</span>
    </div>
</div>


<div class="row mb-4 justify-content-start">
    <label for="inputEmail3" class="col-5 col-form-label fw-bold"
        style="margin-top: 20px; font-family: Carot Sans; color: #3C3C3B; font-size: 1.3rem; ">Foto con INE</label>
    <div class="col-3">
        <img src="{{ Auth::user()->foto_cine }}" style="width: 80%; height:auto; margin-top: 16px;">
        <div class="modal fade" id="FotoConINEIMG" tabindex="-1" aria-labelledby="FotoConINEIMG"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border: none;">
                        <h1 class="modal-title fs-5" id="FotoConINEIMG">Foto con INE</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Auth::user()->foto_cine }}" style="width: 100%; height:auto;">
                    </div>
                    <div class="modal-footer"
                        style="display:flex; justify-content: center; align-items:center; border: none;">
                        <button type="button" class="btn btn-Guardar"
                            style="height: 50px; width: 150px;  font-size: 25px"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 justify-content-start" id="vistaP">
        <button type="button" style=" margin-top: 10px;" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#FotoConINEIMG">
            Vista previa
        </button>
        <span style="color:brown; text-align:initial; float:left;">{{ $errors->first('ine_frente') }}</span>
    </div>
</div>
