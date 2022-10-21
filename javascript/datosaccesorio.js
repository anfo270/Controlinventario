
function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        console.log(event)
        if (event.keyCode == 13) {
            let SKU = event.path[0].value;
            fetch('datosaccesorios.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    data.map(item => {
                        if (item.SKU == SKU) {
                            document.getElementById('Marca').innerHTML = item.Marca;
                            document.getElementById8('Descripcion').innerHTML = item.Descripcion;
                        } else {
                            document.getElementById('Marca').innerHTML = "";
                            document.getElementById('Descripcion').innerHTML = "";

                        }
                    })
                })
        }
    });
}