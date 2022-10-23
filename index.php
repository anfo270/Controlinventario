
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/cssindes.css">
    <title>Iniciar sesi&oacute;n</title>
</head>
<body>
    <div class="contenedor">
        <form method="POST" action="Config/login.php">

            <label for="">Usuario:
                <input type="text" name="user" class="boxtext" required></label>


            <label for="">Contraseña:
                <input type="password" name="pass" class="boxtext" requiered> </label>

            <div class="botones">
                <button type="reset" class="btn cancelar">Cancelar</button>
                <button type="submit" class="btn ingresar">Ingresar</button>
            </div>

        </form>
    </div>
</body>
</html>
