<?php
    require_once("../Modelo/selecciones.php");
    
    if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
        echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
        header("refresh:3; url=login.php"); //se redirige a la pagina de login
        exit;
    }

    $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos
    $arrayEquipos = array(); //Array que contendrá los equipos 
    for($i=0; $i<sizeof($grupos); $i++){ //Bucle que dará tantas vueltas como grupos del arrat $grupos
        $selecciones = new Selecciones($grupos[$i]); //en cada vuelta se crea un objeto Selecciones que recibe el grupo[i] en cada momento
        array_push($arrayEquipos, $selecciones->obtenerEquipos()); //Se introduce en el array $arrayEquipos el resultado de obtener los equipos de ese grupo en cada vuelta
    }
    require_once("../Vista/faseGrupos.php");
?>