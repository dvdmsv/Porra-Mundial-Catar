<?php
    require_once("../Modelo/usuario.php");
    require_once("../Vista/login.php");

     if ($_SERVER["REQUEST_METHOD"] == "POST") { //Si el forumario de la vista login.php es enviado
            if(empty($_POST['user'])){ //Se comprueba si está vacío el usuario, si lo está
                echo "<h1 id='mensInfo'>Error: nombre de usuario vacío</h1>"; //se notifica que el nombre de usuario está vacío
            }else{ //si no
                if(empty($_POST['passwd'])){ //Se comprueba si la contraseña está vacía, si lo está
                    echo "<h1 id='mensInfo'>Error: contraseña vacía</h1>"; //se notifica que el campo contraseña está vacio
                }else{ //sino
                    $user = new Usuario($_POST['user'], $_POST['passwd']); //Se crea un objeto Usuario pasando por parámetros el nombre de usuario y la contraseña enviados en el formulario
                    if($user->autenticacionBD()){ //Se utiliza la función para autenticarse de la clase Usuario, si devuelve true
                        header("Location: ../Vista/menu.php"); //Se redirige a la pagina de menu.php y habrá iniciado sesión en la aplicación
                        echo "<h1 id='mensInfo'>Usuario correcto</h1>";
                    }else{ //si no
                        echo "<h1 id='mensInfo'>Usuario o contraseña incorrecto</h1>"; //se notifica el error
                    }
                }
            }
        }

?>