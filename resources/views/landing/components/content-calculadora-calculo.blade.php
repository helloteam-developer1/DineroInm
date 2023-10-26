<div class="row-span-1 col-span-1 text-center calculadoraItemsDos hidden  mt-4">
    <h1 class="text-center texto-solicita-verde texto-solicita-negro ">Mensaje de Bienvenida</h1>
</div>

<div class="row-span-1 col-span-1 text-center calculadoraItemsDos hidden marginTop">
    <p class="texto-pequeno text-left font-28 mb-3">
        Necesitas un préstamo de emergencia, no te preocupes, nosotros
        te ayudamos. Para saber si eres candidato o no.
    </p>
    <h3 class="titulo text-left mb-5 font-28">Ingresa tus datos en la siguiente calculadora.</h3>
</div>

<div class="row-span-1 col-span-1 text-center calculadoraItemsDos hidden mb-4">
    <input class="form-control" type="text" placeholder="Nombre Completo" id="nombre">
</div>
<div class="row-span-1 col-span-1 text-center calculadoraItemsDos hidden mb-4">
    <input class="form-control" type="text" placeholder="Trabajo" id="trabajo">
</div>
<div class="row-span-1 col-span-1 text-center calculadoraItemsDos  hidden mb-4">
    <input id="ingresoMensual" class="form-control " type="number" placeholder="Cual es tu ingreso mensual?"  >
</div>
<div class="grid grid-cols-12 row-span-1 col-span-1 calculadoraItemsDos mt-3" id="divtarjetaNomina">
    <div class="col-span-6">
        <p>¿Tienes tarjeta de nómina?</p>
    </div>
    <div class="col-span-3 ">
        <input type="radio" id="op1" name="nomina" value="Si" class="border-green-600 text-green-600 focus:border-green-500 focus:ring-green-500" >
        <label for="op1">Si</label>
    </div>
    <div class="col-span-3 ">
        <input type="radio" id="op2" name="nomina" value="NO" class="border-green-60 text-green-600 focus:border-green-500 focus:ring-green-500" >
        <label for="op2">No</label>
    </div>

</div>

<div class="grid grid-cols-12 row-span-1 col-span-1 calculadoraItemsDos " id="divCredito">
    <div class=" col-span-6 ">
        <p>¿Cu&eacute;ntas con tarjeta de crédito?</p>
    </div>
    <div class="col-span-3">
        <input type="radio" id="op3" name="hipotecario" value="Si" class="hipotecario border-green-60 text-green-600 focus:border-green-500 focus:ring-green-500">
        <label for="op3">Si</label>
    </div>
    <div class="col-span-3">
        <input type="radio" name="hipotecario" value="No" id="op4" class="hipotecario border-green-60 text-green-600 focus:border-green-500 focus:ring-green-500">
        <label for="op4">No</label>
    </div>

</div>

    <br>
        <div class="text-center mt-4"> <a  onclick="calcular()" class="btn btn-calcular btn btn-verde px-5 calculadoraItemsDos hidden" style="font-size: 28px">Calcular </a> </div>
    <br>
