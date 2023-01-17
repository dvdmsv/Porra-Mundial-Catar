<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <?php
        require("../Modelo/bdMundial.php");
        require("../Modelo/usuario.php");

        // $bd = new bdMundial();
        // $resultados = $bd->consultaBD('SELECT username FROM autenticacion', "username");
        //echo $resultados;

        $user = new Usuario("prueba", "admin");
        $user->registroBD();
        //$user->autenticacionBD();
    ?>
</body>
</html>