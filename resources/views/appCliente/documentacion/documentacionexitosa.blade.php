<h1> La información es correcta y ha sido verificada.</h1>
<div class="row mb-3 justify-content-center mt-3">
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold"
        style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">INE Frente</label>
    <div class="col-sm-4 mb-5">
        <img src="{{ Auth::user()->ine_frente }}" style="width: 30%; height:auto;">
    </div>
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold"
        style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">INE Reverso</label>
    <div class="col-sm-4 mb-5">
        <img src="{{ Auth::user()->ine_reverso }}" style="width: 30%; height:auto;">
    </div>
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold"
        style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">Comprobande de Domicilio</label>
    <div class="col-sm-4 mb-5">
        <img src="{{ Auth::user()->comp_dom }}" style="width: 30%; height:auto;">
    </div>
    <label for="inputEmail3" class="col-sm-5 col-form-label fw-bold"
        style="font-family: Carot Sans; color: #3C3C3B; font-size: 20px;">Foto con INE</label>
    <div class="col-sm-4 mb-5">
        <img src="{{ Auth::user()->foto_cine }}" style="width: 30%; height:auto;">
    </div>
</div>
