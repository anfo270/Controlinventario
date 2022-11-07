function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.key === "Enter") {
            let IMEI = document.getElementById(inputF).value;
            fetch('../datostelefonos.php')
                .then(res => res.json())
                .then(data => {
                        let item = data.filter(function(item){
                        return item.IMEI== IMEI;
                        
                        });
                        console.log(item);
                        console.log(item.length);
                        if (item.length>0) {
                            document.getElementById('Marca').style.color="black";
                            document.getElementById('Modelo').style.color="black";
                            document.getElementById('Marca').innerHTML = item[0].IMEI;
                            document.getElementById('Modelo').innerHTML = item[0].Modelo;
                        } else {
                            document.getElementById('Marca').style.color="red";
                            document.getElementById('Modelo').style.color="red";
                            document.getElementById('Marca').innerHTML = "No se encontró";
                            document.getElementById('Modelo').innerHTML = "No se encontró";
                        }
                })
        }
    });
}