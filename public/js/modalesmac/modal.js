function modalrechazo(){
    const modal = document.querySelector('#modal1');
    modal.removeAttribute('hidden');
    modal.classList.add('show');
    const pointer = document.querySelector('.movedown');
    pointer.classList.add('pointer-auto');

}
function rechazocerrar(){
    const modal = document.querySelector('#modal1');
    modal.classList.remove('show');
    modal.setAttribute('hidden', true);
    modal.classList.add('pointer-auto');
}

const rechaz_boton = document.querySelector('#credito_rechazado');
rechaz_boton.addEventListener('click', () =>{
    rechazocerrar();
});
const close_rechazado = document.querySelector('#close-rechazado');
close_rechazado.addEventListener('click', () =>{
    rechazocerrar();
});

/* Credito Aprobado */
function modalaprobado(){
    const aprobado = document.querySelector('#modal2');
    aprobado.removeAttribute('hidden');
    aprobado.classList.add('show');
    const pointer2 = document.querySelector('#modalmove2');
    pointer2.classList.add('pointer-auto');
}

const otromomento = document.querySelector('#otromomento');
otromomento.addEventListener('click', () =>{
    //Le devuelvo el atributo hidden a la modal aprobado
    const aprobado = document.querySelector('#modal2');
    aprobado.setAttribute('hidden', true);

    //abro la modal otro momento
    const otro = document.querySelector('#modal3');
    otro.removeAttribute('hidden');
    otro.classList.add('show');
});

const cerrarmodalo = document.querySelector('#cerrarmodalo');
cerrarmodalo.addEventListener('click', ()=>{
    const otro1 = document.querySelector('#modal3');
    otro1.classList.remove('show');
    otro1.setAttribute('hidden', true);
});
const aprobadox = document.querySelector('#aprobado-cerrar');
aprobadox.addEventListener('click', ()=>{
   //Le devuelvo el atributo hidden a la modal aprobado
   const aprobado1 = document.querySelector('#modal2');
   aprobado1.setAttribute('hidden', true);

});
const xotro = document.querySelector('#close-otro');
xotro.addEventListener('click', ()=>{
    const otro2 = document.querySelector('#modal3');
    otro2.classList.remove('show');
    otro2.setAttribute('hidden', true);
});

const volver = document.querySelector('#volver');
volver.addEventListener('click',()=>{
    //cierro la ventana modal
    const otro2 = document.querySelector('#modal3');
    otro2.classList.remove('show');
    otro2.setAttribute('hidden', true);
    //abro la ventana credito aprobado
    modalaprobado();
});
