<?php
    
    require_once("Modelo/selecciones.php");
    

    // if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
    //     echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
    //     header("refresh:3; url=login.php"); //se redirige a la pagina de login
    //     exit;
    // }

    $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos
    $arrayEquipos = array();
    for($i=0; $i<sizeof($grupos); $i++){
        $selecciones = new Selecciones($grupos[$i]);
        array_push($arrayEquipos, $selecciones->obtenerEquipos());
    }
   
    // for($a=0; $a<sizeof($arrayEquipos); $a++){
    //     for($b=0; $b<sizeof($arrayEquipos[$a]); $b++){
    //         // echo "<br>"; 
    //         // echo $arrayEquipos[$a][$b]; 
    //     }
    //     echo "<br>"; 
    // }
    
    require_once("Vista/faseGrupos.php");

<<<<<<< HEAD
    if(isset($_POST['grupo' . $grupos[$a]])){ //Cuando el botón es pulsado
        faseGrupos('grupo' . $grupos[$i], $grupos[$i]); //Se ejecuta la función
    } 
=======
    
>>>>>>> 2e5d2252772a368e7c5d71b58cbc6de100c8a424
    
?>