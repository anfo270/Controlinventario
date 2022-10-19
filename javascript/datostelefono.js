fetch('datos.php')
.then(res=>res.json())
.then(data=>{
    //console.log(data);

const inputboxtext = document.querySelector('.IMEI');

selectElement.addEventListener('change', (event) => {
    const resultado = document.querySelector('.resultado');
    resultado.textContent = `Te gusta el sabor ${event.target.value}`;
});

})