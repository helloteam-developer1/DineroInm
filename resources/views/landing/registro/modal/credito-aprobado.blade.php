<div id="modal2" class="modalmask" hidden>
    <div class="modalbox movedown" id="modalmove2">
        <div class="cerrar">
            <a title="Close" class="close" id="aprobado-cerrar">X</a>
        </div>
        <div class="head">
            <h2 class="titulo texto-carotSans--Medium">Cr&eacute;dito Aprobado</h2>
            <h3 class="subtitulo">Felicidades</h3>
        </div>
        <p class="texto-bold"> Tenemos pre aprobada una linea de cr&eacute;dito para ti. Si quieres hacer uso
            de ella, contin&uacute;a el proceso y te indicaremos qué hacer.</p>

        <h2 id="loading" style="font-weight: 800; color:#4A9D22; font-size:1.1rem;"  hidden>Cargando...</h2>
        <div class="botonera-modal">
            <button class="button-verde-modal" id="otromomento">En otro momento</button>
            <button class="button-naranja-modal" id="continuarc">Sí, quiero hacer uso de mi línea de crédito</button>
        </div>
    </div>
</div> -
<script>
const continuar = document.querySelector('#continuarc');
continuar.addEventListener('click', () => {
    const loading = document.querySelector('#loading');
    loading.removeAttribute('hidden');
    enviar();
});

function enviar(){
    
    var credito;
    var nomina;
    var prestamo = $('#prestamo').val();
    var tiempo = $('#tiempo').val();
    var nombre = $('#nombre').val();
    var trabajo = $('#trabajo').val();
    var ingreso = $('#ingresoMensual').val();
    
    if($('#op1').prop('checked')){
        nomina = "si";
        console.log(nomina);
    }
    if($('#op2').prop('checked')){
        nomina = "no";
        console.log(nomina);
    }
    if($('#op3').prop('checked')){
        credito = "si";
        console.log(credito);
    }
    if($('#op4').prop('checked')){
        credito = "no";
        console.log(credito);
    }

    $.ajax({
        type: 'POST',
        url: "{{route('registros-calculadora.store')}}",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{prestamo:prestamo,tiempo:tiempo,nombre:nombre,trabajo:trabajo,ingreso:ingreso,nomina:nomina,credito:credito},
        success: function(data){
            var id_user = data;
            console.log(id_user);
            location.href = '/registro-usuarios/'+id_user;
        },
        deferred: function(data){
            console.log('Error: '.data);
        }
    });
  
    
}
</script>