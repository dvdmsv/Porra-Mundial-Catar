<?php
    session_start(); //Se inicia la sesión

    if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
        echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
        header("refresh:3; url=login.php"); //se redirige a la pagina de login
        exit;
    }

    try {
        require_once("../Modelo/bdMundial.php");
        $sql = 'SELECT count(seleccion) vecesElegida, seleccion FROM ganador GROUP BY seleccion ORDER BY vecesElegida DESC'; //Consulta a la base de datos que muestra el numero de veces que se repite una seleccion en la tabla ganador ordenado de mayor a menor. Para mostrar el numero de veces que se ha elegido una seleccion como campeona
        $resultado = bdMundial::conexionBD()->query($sql); //Se ejecuta la consulta
        $registros = $resultado->rowCount(); //Se obtienen los registros
    } catch(PDOException $e){
        echo "Error: ", $e->getMessage(), (int)$e->getCode();
    }
?>