<?php
    session_start(); //Se inicia sesión

    if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
        echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
        header("refresh:3; url=login.php"); //se redirige a la pagina de login
        exit;
    }

    try{
        $predicciones; //Variable vacía que servirá como boolean para indicar a la vista si hay predicciones del usuario
        require_once("../Modelo/bdMundial.php");
        $sql = 'SELECT count(seleccion) as vecesElegido, seleccion from ganador WHERE username = ? GROUP BY seleccion ORDER BY count(seleccion) DESC'; //Se genera una consulta para mostrar las predicciones del usuario
        $consulta = bdMundial::conexionBD()->prepare($sql); //Se ejecuta la consulta preparada
        $consulta->bindParam(1, $_SESSION['user']); //Se establece el primer parámetro 
        $consulta->execute(); //Se ejecuta la consults
        if($consulta->rowCount() == 0){ //Si no obtiene resultados es que no hay predicciones
            $predicciones = false; //Se establece la variable $predicciones en false para indicar a la vista que no hay predicciones del usuario
            echo "<h1 id='mensInfo'>Sin predicciones</h1>"; //Se muestra un mensaje indicándolo
            echo "<div id='enlacePredicciones'><a href='./faseGrupos.php'>Hacer prediccion</a></div>"; //Se muestra un enlace para realizar la primera predicción
        }else{ //Si hay resultados se muestra una tabla con las predicciones del usuario en la VISTA
            $predicciones = true; //Se establece la variable $predicciones a true para indicar a la vista que hay predicciones
            if(isset($_POST['eliminarRegistro'])){ //Si se ha pulsado el boton de eliminar registro
                require_once('../Modelo/ganador.php');
                $eliminarGanador = new Ganador($_SESSION['user'], $_POST['eliminarRegistro']); //Se crea un objeto Ganador pasando por parámetros el nombre del usuario conectado y el equipo enviado para eliminar
                $eliminarGanador->eliminarGanador(); //Se ejecuta el método para eliminar un ganador de la clase Ganador
            }
        }
    }catch(PDOException $e){
        echo "Error: ", $e->getMessage(), (int)$e->getCode();
    }
?>