fetch('datos.php')
.then(res=>res.json())
.then(data=>{
    console.log(data);
})