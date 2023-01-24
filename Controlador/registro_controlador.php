<?php
    require_once("../Modelo/usuario.php");
    require_once("../Vista/registro.php");

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { //Si el forumario es enviado
        if(empty($_POST['user'])){ //Se comprueba si está vacío el campo de usuario,
            echo "<h1 id='mensInfo'>Error: nombre de usuario vacío</h1>"; //si lo está, se notifica que el nombre de usuario está vacío
        }else if(empty($_POST['passwd']) || empty($_POST['passwd2'])){ //Se comprueba si están vacíos los campos de contraseña
            echo "<h1 id='mensInfo'>Error: Contraseña vacía</h1>"; //si lo están, se notifica que la contraseña está vacía
        }else{ //Si no
            if($_POST['passwd'] != $_POST['passwd2']){ //Se comprueba si las dos contraseñas no introducidas coinciden
                echo "<h1 id='mensInfo'>Las contraseñas no son iguales</h1>"; //Si no coinciden se notifica
            }else{ //Si coinciden
                $usuario = new Usuario($_POST['user'],  $_POST['passwd']);
                if($usuario->registroBD()){
                    echo "<h1 id='mensInfo'>Usuario registrado correctamente</h1>"; //Se notifica
                    header("refresh:1; url=../index.php"); //Se redirige a la pagina de login por seguridad para que el usuario se loguee con la nueva cuenta creada
                }
            }
        }
    } 
?>