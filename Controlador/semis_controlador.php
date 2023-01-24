<?php
    require_once("../Modelo/selecciones.php");
    require_once("../Vista/semis.php");

    for($i=0; $i<3; $i++){ //Se recorre el array de grupos
        if(!isset($_SESSION['semis'][$i][0])){ //Si la variable de sesion semis no está seteada
            for($i=0; $i<3; $i++){ //se eliminan los elementos que haya en los arrays
                unset($_SESSION['semis'][$i][0]);
            }
            echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
            header("refresh:1; url=cuartos.php"); //se redirige a la pagina de cuartos
            exit;
        }
    }

?>