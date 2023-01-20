<?php
    session_start();

    if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
        echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
        header("refresh:3; url=login.php"); //se redirige a la pagina de login
        exit;
    }

    try{
        $predicciones;
        require_once("../Modelo/bdMundial.php");
        $sql = 'SELECT count(seleccion) as vecesElegido, seleccion from ganador WHERE username = ? GROUP BY seleccion ORDER BY count(seleccion) DESC'; //Se genera una consulta para mostrar las predicciones del usuario
        $consulta = bdMundial::conexionBD()->prepare($sql);
        $consulta->bindParam(1, $_SESSION['user']);
        $consulta->execute();
        if($consulta->rowCount() == 0){ //Si no obtiene resultados es que no hay predicciones
            $predicciones = false;
            echo "<h1 id='mensInfo'>Sin predicciones</h1>";
            echo "<div id='enlacePredicciones' ><a href='./faseGrupos.php'>Hacer prediccion</a></div>";
        }else{ //Si hay resultados se muestra una tabla con las predicciones del usuario en la VISTA
            $predicciones = true;
            if(isset($_POST['eliminarRegistro'])){ //Si se ha pulsado el boton de eliminar registro
                require_once('../Modelo/ganador.php');
                $eliminarGanador = new Ganador($_SESSION['user'], $_POST['eliminarRegistro']);
                $eliminarGanador->eliminarGanador();
            }
        }
    }catch(PDOException $e){
        echo "Error: ", $e->getMessage(), (int)$e->getCode();
    }
?>