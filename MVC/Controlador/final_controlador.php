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
            //guardarGanador($_POST['final']); //Se ejecuta la funcion para guardar el ganador seleccionado
            $_SESSION['final'] = $_POST['final'];
            $ganador = new Ganador($_SESSION['user'], $_SESSION['final'][0][0]);
            $ganador->introducirGanador();
        }else{
            echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
        }
    }
    

    //Funcion que guarda en la base de datos el ganador elegido por el usuario
    // function guardarGanador($ganador){ //Recibe el nombre del ganador
    //     $sql = 'INSERT INTO ganador(username, seleccion) VALUES (?, ?)'; //Se guarda en una variable la consulta 
    //     $consulta = bdMundial::conexionBD()->prepare($sql); //Se guarda la consulta preparada
    //     $consulta->bindParam(1, $_SESSION['user']); //Como primer parametro se guarda el nombre del usuario que inició sesión
    //     $consulta->bindParam(2, $ganador); //Como segundo parámetro se guarda el nombre del ganador elegido
    //     $consulta->execute(); //Se ejecuta la consulta
    //     $registros = $consulta->rowCount(); //Se obtiene el numero de registros afectados por la consulta SQL
    //     if($registros>0){ //Si es mas que 0 (se han visto afectados registros)
    //         echo "<h1 id='mensInfo'>Resultado guardado correctamente...</h1>"; //se muestra un mensaje de info
    //         header("refresh:1; url=menu.html"); //se redirige a la pagina de menu
    //         exit;
    //     }else{
    //         echo "<h1 id='mensInfo'>Resultado guardado correctamente...</h1>"; //Error al guardar
    //         header("refresh:1; url=menu.html"); //se redirige a la pagina de menu
    //         exit;
    //     }
    // }
?>