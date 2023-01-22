<?php
    /**
     * Modelo selecciones.php
     */
    require_once("../Modelo/selecciones.php");
    /**
     * Vista cuartos.php
     */
    require_once("../Vista/cuartos.php");
    
    for($i=0; $i<7; $i++){ //Se recorre el array de grupos
        if(!isset($_SESSION['cuartos'][$i][0])){ //Si la variable de sesion user no está seteada
            for($i=0; $i<7; $i++){ //se eliminan los elementos que haya en los arrays
                unset($_SESSION['cuartos'][$i][0]);
            }
            echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
            header("refresh:1; url=octavos.php"); //se redirige a la pagina de faseGrupos
            exit;
        }
    }


?>