
function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {
            let SKU = event.path[0].value;
            fetch('../datosaccesorios.php')
                .then(res => res.json())
                .then(data => {
                    data.map(item => {
                        if (item.SKU == SKU) {
                            document.getElementById('Marca').style.color='black';
                            document.getElementById('Marca').innerHTML = item.Marca;
                            document.getElementById('Descripcion').style.color='black';
                            document.getElementById('Descripcion').innerHTML = item.Descripcion;
                        } else {
                            document.getElementById('Marca').style.color='red';
                            document.getElementById('Marca').innerHTML = "No se encontro";
                            document.getElementById('Descripcion').style.color='red';
                            document.getElementById('Descripcion').innerHTML = "No se encontro";

                        }
                    })
                })
        }
    });
}