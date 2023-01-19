<?php
    require_once("../Modelo/selecciones.php");
    
    if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
        echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
        header("refresh:3; url=login.php"); //se redirige a la pagina de login
        exit;
    }

    $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos
    $arrayEquipos = array();
    for($i=0; $i<sizeof($grupos); $i++){
        $selecciones = new Selecciones($grupos[$i]);
        array_push($arrayEquipos, $selecciones->obtenerEquipos());
    }
    require_once("../Vista/faseGrupos.php");

    
    
?>