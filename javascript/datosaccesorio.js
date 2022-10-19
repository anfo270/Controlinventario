fetch('datosaccesorios.php')
.then(res=>res.json())
.then(datataccesorio=>{
    console.log(datataccesorio);
})
