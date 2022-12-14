<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Registro</title>
</head>
<body>
    <nav class="menu">
        <a href="./login.php">Login</a>
    </nav>

    <h1 id="h1Login">Registro</h1>

    <!-- Formulario HTML -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="login">
        <img src="./user.png" alt="user" width="15%">
        <label>Usuario</label>
        <input type="text" name="user" id="">
        <img src="./passwd.png" alt="user" width="15%">
        <label>Conraseña</label>
        <input type="password" name="passwd" id="">
        <label>Repetir conraseña</label>
        <input type="password" name="passwd2" id="">
        <button type="submit" value="Enviar">Registrar</button>
    </form>

    <?php
        require_once('funciones.php');
    ?>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //Si el forumario es enviado
            if(empty($_POST['user'])){ //Se comprueba si está vacío el campo de usuario,
                echo "<h1 id='mensInfo'>Error: nombre de usuario vacío</h1>"; //si lo está, se notifica que el nombre de usuario está vacío
            }else if(empty($_POST['passwd']) || empty($_POST['passwd2'])){ //Se comprueba si están vacíos los campos de contraseña
                echo "<h1 id='mensInfo'>Error: Contraseña vacía</h1>"; //si lo están, se notifica que la contraseña está vacía
            }else{ //Si no
                if($_POST['passwd'] != $_POST['passwd2']){ //Se comprueba si las dos contraseñas no introducidas coinciden
                    echo "<h1 id='mensInfo'>Las contraseñas no son iguales</h1>"; //Si no coinciden se notifica
                }else{ //Si coinciden
                    registro($_POST['user'], $_POST['passwd']); //Se ejecuta la funcion para registrar al usuario
                }
            }
        } 
    ?>
</body>
</html>