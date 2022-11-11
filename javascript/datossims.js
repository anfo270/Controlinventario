function pulsar(inputF) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.key === "Enter") {
            let ICC = document.getElementById(inputF).value;
            fetch('../datossims.php')
                .then(res => res.json())
                .then(data => {
                        let item = data.filter(function(item){
                            return item.ICC== ICC;
                        });
                        console.log(item);
                        console.log(item.length);
                        if (item.length>0) {
                            document.getElementById('Telefonia').style.color="black";
                            document.getElementById('Telefonia').innerHTML = item[0].Marca;
                        } else {
                            document.getElementById('Telefonia').style.color="red";
                            document.getElementById('Telefonia').innerHTML = "No se encontró";
                        }
                    })
        }
    });
}