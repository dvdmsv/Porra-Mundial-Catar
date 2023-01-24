<?php
    require_once("../Modelo/selecciones.php");
    require_once("../Vista/octavos.php");

    $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos

    for($i=0; $i<sizeof($grupos); $i++){ //Se recorre el array de grupos
        if(!isset($_SESSION['grupo' . $grupos[$i]][0][0])){ //Si la variable de sesion del equipo en cada vuelta del bucle no está seteada 
            for($i=0; $i<sizeof($grupos); $i++){ //se eliminan los elementos que haya en los arrays
                unset($_SESSION['grupo' . $grupos[$i]]);
            }
            echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
            header("refresh:1; url=faseGrupos.php"); //se redirige a la pagina de faseGrupos
            exit;
        }
    }

?>