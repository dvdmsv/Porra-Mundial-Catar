<?php
    require_once("../Vista/final.php");
    require_once("../Modelo/ganador.php");

    for($i=0; $i<1; $i++){ //Se recorre el array de grupos
        if(!isset($_SESSION['final'][$i][0])){ //Si la variable de sesion final no está seteada
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
            $ganador = new Ganador($_SESSION['user'], $_POST['final']); //Se crea un objeto Ganador pasando como parámetros el usuario conectado y el ganador elegido
            $ganador->introducirGanador(); //Se utiliza el método para introducir el ganador en la base de datos de la clase Ganador
        }else{ //Si no se ha enviado una selección
            echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>'; //Se indica que falta un equipo por enviar
        }
    }
?>