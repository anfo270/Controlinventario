function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {
            let ICC = document.getElementById(inputF).value;
            fetch('../datossims.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    data.map(item => {
                        if (item.ICC == ICC) {
                            document.getElementById('Marca').style.color='black';
                            document.getElementById('Marca').innerHTML = item.Marca;
                        } else {
                            document.getElementById('Marca').style.color='red';
                            document.getElementById('Marca').innerHTML = "No se encontro";
                        }
                    })
                })
        }
    });
}