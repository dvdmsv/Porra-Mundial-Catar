<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Registro</title>
</head>
<body>
    <nav class="menu">
        <a href="index.php">Login</a>
    </nav>

    <h1 id="h1Login">Registro</h1>

    <!-- Formulario HTML -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="login">
        <img src="../img/user.png" alt="user" width="15%">
        <label>Usuario</label>
        <input type="text" name="user" id="">
        <img src="../img/passwd.png" alt="user" width="15%">
        <label>Conraseña</label>
        <input type="password" name="passwd" id="">
        <label>Repetir conraseña</label>
        <input type="password" name="passwd2" id="">
        <button type="submit" name="controlador" value="registro_controlador">Registrar</button>
    </form>

    <?php
        require_once('Controlador/registro_controlador.php');
    ?>
</body>
</html>