<?php
    //Funcion que se encarga de generar los cruces de octavos a partir de la fase de grupos
    function faseGrupos($grupo, $letra){  //Recibe el grupo y la letra
        $contador = 0; //Se inicia un contador en 0
        for($i=0; $i<4; $i++){ //Bucle que cuenta los equipos que se han enviado
            if(!empty($_POST['rbG'. $letra . $i])){ //Si la variable no está vacía es que se ha enviado un equipo
                $contador++; //Se incrementa el contador por cada equipo que se ha enviado
            }
        }
        if($contador>2){ //Si el contador es mayor que 2 (mas de dos equipos)
            echo '<h1 id="mensInfo">Solo puedes elegir dos equipos</h1>';
        }else if($contador == 1){ //Si el contador es igual a 1 (solo un equipo)
            echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
        }else if($contador == 2){ //Si el contador es igual a 2 (dos equipos)
            for($i=0; $i<4; $i++){ //Se ejecuta un bucle
                if(!empty($_POST['rbG'. $letra . $i])){ //Se comprueba si el equipo está en la variable
                    $seleccion = $_POST['rbG'. $letra . $i]; //Se asigna el nombre a una variable
                    $arrGrupo = []; //Se crea un array
                    array_push($arrGrupo, htmlspecialchars($seleccion)); //Se introduce el equipo en el array
                    $_SESSION[$grupo][] = $arrGrupo; //Se introduce el array en la sesión correspondiente a ese grupo
                }
            }
        }
    }

    //Funcion que se encarga de generar los cruces de cuartos
    function cuartos($seleccion, $cruce){ //Recibe una seleccion y el cruce correspondiente
        if(!empty($_POST[$cruce])){ //Si el cruce no está vacío
            $arrCuart = [];
            array_push($arrCuart, htmlspecialchars($seleccion)); //Se introduce el equipo en el array de cuartos
            $_SESSION['cuartos'][]= $arrCuart; //Se almacena en la variable de sesion correspondiente a los cuartos
        }
    }

    //Funcion que se encarga de generar los cruces de semifinales
    function semis($seleccion, $cruce){ //Recibe una seleccion y el cruce correspondiente
        if(!empty($_POST[$cruce])){ //Si el cruce no está vacío
            $arrSemis = [];
            array_push($arrSemis, htmlspecialchars($seleccion)); //Se introduce el equipo en el array de semifinales
            $_SESSION['semis'][]= $arrSemis; //Se almacena en la variable de sesion correspondiente a las semifinales
        }
    }

    //Funcion que se encarga de generar los cruces de la final
    function finalTorneo($seleccion, $cruce){ //Recibe una seleccion y el cruce correspondiente
        if(!empty($_POST[$cruce])){ //Si el cruce no está vacío
            $arrFinal = array();
            array_push($arrFinal, htmlspecialchars($seleccion)); //Se introduce el equipo en el array de la final
            $_SESSION['final'][] = $arrFinal; //Se almacena en la variable de sesion correspondiente a la final
        }
    }

    //Funcion que extrae el nombre de la seleccion 
    function extraerSeleccion($nombre){ //Recibe un nombre
        $seleccion = explode("#", $nombre); //Separa en arrays cuando encuentra una "#" como separador
        return $seleccion[0]; //Devuelve el valor del array correspondiente al nombre de la seleccion
    }

    //Funcion que elimina los registros de ganadores del usuario
    function eliminarRegistro($seleccion, $username){ //Se pasa por parámetros el nombre de la seleccion
        $conexionBD = conectarBD(); //Se conecta con la base de datos
        $sql = 'DELETE FROM ganador WHERE seleccion = ? AND username = ?'; //Se guarda la consulta
        $consulta = $conexionBD->prepare($sql); //Se prepara la consulta
        $consulta->bindParam(1, $seleccion); //el primer parametro se guarda la seleccion pasada por parametros
        $consulta->bindParam(2, $username);
        $consulta->execute(); //Se ejecuta la consulta 
        $registros = $consulta->rowCount(); //Se obtiene el numero de registros afectados por la consulta SQL
        if($registros>0){ //Si es mas que 0 (se han visto afectados registros)
            echo "<h1 id='mensInfo'>Registro eliminado</h1>"; //Se muestra un mensaje indicando la eliminacion
            header("refresh:1"); //Se refresca la pagina para mostrar los nuevos resultados
        }
    }
?>