fetch('datossims.php')
.then(res=>res.json())
.then(datasims=>{
    console.log(datasims);
})
