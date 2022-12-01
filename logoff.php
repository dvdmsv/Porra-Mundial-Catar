<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Sesión cerrada</title>
</head>
<body>
    <?php
        session_start(); //Se inicia la sesion    
        echo "<h1 id='mensInfo'>" . $_SESSION['user'] . " está cerrando sesion...</h1>"; //Se muestra un mensaje al usuario
        session_destroy(); //Se destruye la sesion
        header("refresh: 1; url=login.php"); //Se redirige a login.php
    ?>
</body>
</html>