<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <h1 id="h1Login">Iniciar sesión</h1>
    <!-- Formulario HTML -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="login">
        <img src="../img/user.png" alt="user" width="15%">
        <label>Usuario</label>
        <input type="text" name="user">
        <img src="../img/passwd.png" alt="user" width="15%">
        <label>Contraseña</label>
        <input type="password" name="passwd">
        <button type="submit" value="Enviar">Iniciar Sesion</button>
        <a href="../Vista/registro.php">Registrarse</a>
    </form>
    

    <!-- Se importa el archivo controlador -->
    <?php
        require_once('../Controlador/login_controlador.php');
    ?>
</body>
</html>