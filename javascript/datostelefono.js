function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {
            let IMEI = parseInt(document.getElementById(inputF).value);
            fetch('../datostelefonos.php')
                .then(res => res.json())
                .then(data => {
                    data.map(item => {
                        if (item.IMEI == IMEI) {
                            document.getElementById('Marca').innerHTML = IMEI;
                            document.getElementById('Modelo').innerHTML = item.Modelo;
                        } else {
                            document.getElementById('Marca').innerHTML = "";
                            document.getElementById('Modelo').innerHTML = "";
                        }
                    })
                })
        }
    });
}