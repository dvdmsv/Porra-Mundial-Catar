<?php
    require_once("../Vista/final.php");
    require_once("../Modelo/ganador.php");

    for($i=0; $i<1; $i++){ //Se recorre el array de grupos
        if(!isset($_SESSION['final'][$i][0])){ //Si la variable de sesion user no está seteada
            for($i=0; $i<1; $i++){ //se eliminan los elementos que haya en los arrays
                unset($_SESSION['final'][$i][0]);
            }
            echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
            header("refresh:1; url=semis.php"); //se redirige a la pagina de cuartos
            exit;
        }
    }

    if(isset($_POST['ganador'])){ //Si se ha pulsado el boton para enviar un ganador
        if(isset($_POST['final'])){ //Y contiene una seleccion
            $_SESSION['final'] = $_POST['final'];
            $ganador = new Ganador($_SESSION['user'], $_POST['final']);
            $ganador->introducirGanador();
        }else{
            echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
        }
    }
?>