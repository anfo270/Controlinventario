
function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        console.log(event)
        if (event.keyCode == 13) {
            let IMEI = parseInt(event.path[0].value);
            fetch('datostelefonos.php')
                .then(res => res.json())
                .then(data => {
                        data.map(item=>{
                            if(item.IMEI==IMEI){
                                document.getElementById('Marca').innerHTML=item.Marca;
                                document.getElementById('Modelo').innerHTML=item.Modelo;
                            }else{
                            document.getElementById('Marca').innerHTML="";
                            document.getElementById('Modelo').innerHTML="";
                            }
                        })
                })
        }
    });
}