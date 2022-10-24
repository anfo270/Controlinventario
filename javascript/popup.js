const open =document.getElementById('eliminar');
const model =document.getElementById('modal-contenedor');
const aceptar =document.getElementById('aceptar');

document.getElementById('eliminar').addEventListener('click',  ()  => {
    document.getElementById('modal-contenedor').classList.add('show');    
});