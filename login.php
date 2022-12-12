<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <h1 id="h1Login">Iniciar sesión</h1>
    <!-- Formulario HTML -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="login">
        <img src="./user.png" alt="user" width="15%">
        <label>Usuario</label>
        <input type="text" name="user" id="">
        <img src="./passwd.png" alt="user" width="15%">
        <label>Conraseña</label>
        <input type="password" name="passwd" id="">
        <button type="submit" value="Enviar">Iniciar Sesion</button>
    </form>

    <!-- Se importa el archivo con las funciones -->
    <?php
        require_once('funciones.php');
    ?>

    <!-- Se inicia la sesion -->
    <?php
        session_start();
    ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { //Si el forumario es enviado
            if(empty($_POST['user'])){ //Se comprueba si está vacío el usuario, si lo está
                echo "<h1 id='mensInfo'>Error: nombre de usuario vacío</h1>"; //se notifica que el nombre de usuario está vacío
            }else{ //si no
                if(empty($_POST['passwd'])){ //Se comprueba si la contraseña está vacía, si lo está
                    echo "<h1 id='mensInfo'>Error: contraseña vacía</h1>"; //se notifica que el campo contraseña está vacio
                }else{ //sino
                    //Se asignan los campos de texto a variables
                    $user = $_POST['user'];
                    $password = $_POST['passwd'];
                    $conexionBD = conectarBD(); //Se conecta con la base de datos

                    if(autenticacionBD($conexionBD, $user, $password)){ //Se utiliza la función para autenticarse, si devuelve true
                        header("Location: menu.html"); //Se redirige a la pagina de productos
                    }else{ //si no
                        echo "<h1 id='mensInfo'>Usuario o contraseña incorrecto</h1>"; //se notifica el error
                    }
                }
            }
        }
    ?>
</body>
</html>