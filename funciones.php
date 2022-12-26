<?php
    //Función que se encarga de realizar la conexión con la base de datos
    function conectarBD(): PDO{
        //Variables que contienen los datos de la conexión
        $host = 'localhost';
        $db = 'mundial';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try{
            $conexionBD = new PDO($dsn, $user, $pass, $options); //Se realiza la conexion
            return $conexionBD; //Se devuelve el objeto conexion
        }catch(PDOException $e){
            echo "Error: ", $e->getMessage(), (int)$e->getCode();
        }
    }

    //Funcion encargada de autenticar un usuario y contraseña en la base de datos
    function autenticacionBD($conexionBD, $username, $password): bool {
        //Consulta a la base de datos para la autenticacion
        $sql = 'SELECT username, password  FROM autenticacion WHERE username = ? AND password = ?';
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(1, $username);
        $passwordEncrypt = md5($password); //Se encripta la contraseña introducida
        $consulta->bindParam(2, $passwordEncrypt);
        $consulta->execute();
        $registros = $consulta->rowCount(); //Se obtiene el numero de filas que devuelve la consulta

        if($registros>0){ //Si devuelve mas de 0 filas es que el usuario existe en la base de datos
            $_SESSION['user'] = $_POST['user']; //Se asigna a la variable de sesion el nombre de usuario
            return true; //Se retorna true
        }
        return false; //Si no ha habido filas devueltas se devuelve false
    }

    //Funcion que registra a un usuario en el sistema
    function registro($username, $password){ //Recibe como parametros el nombre del usuario y una contraseña
        $conexionBD = conectarBD(); //Se conecta con la base de datos
        $sql1 = 'SELECT username FROM autenticacion WHERE username = ?'; //Se ejecuta una consulta buscando al usuario pasado por parametros
        $consulta1 = $conexionBD->prepare($sql1);
        $consulta1->bindParam(1, $username);
        $consulta1->execute();
        $registros = $consulta1->rowCount();
        if($registros>0){ //Si la consulta devuelve registros es que el usuario ya existe en la base de datos
            echo "<h1 id='mensInfo'>El nombre de usuario ya existe</h1>"; //Se notifica
        }else{ //Si no existe
            $sql2 = 'INSERT INTO autenticacion(username, password) VALUES (?, ?)'; //Se ejecuta una consulta insertando el usuario y su contraseña en la base de datos
            $consulta2 = $conexionBD->prepare($sql2);
            $consulta2->bindParam(1, $username);
            $passwordEncrypt = md5($password); //Se encripta la contraseña antes de introducirla
            $consulta2->bindParam(2, $passwordEncrypt);
            $consulta2->execute();
            $registros = $consulta2->rowCount();
            if($registros>0){ //Si la ejecucion devuelve registros el usuario se ha guardado correctamente
                echo "<h1 id='mensInfo'>Usuario registrado correctamente</h1>"; //Se notifica
                header("refresh:1; url=login.php"); //Se redirige a la pagina de login
            }
        }
    }

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
            $arrFinal = [];
            array_push($arrFinal, htmlspecialchars($seleccion)); //Se introduce el equipo en el array de la final
            $_SESSION['final'][]= $arrFinal; //Se almacena en la variable de sesion correspondiente a la final
        }
    }

    //Funcion que extrae el nombre de la seleccion 
    function extraerSeleccion($nombre){ //Recibe un nombre
        $seleccion = explode("#", $nombre); //Separa en arrays cuando encuentra una "#" como separador
        return $seleccion[0]; //Devuelve el valor del array correspondiente al nombre de la seleccion
    }

    //Funcion que guarda en la base de datos el ganador elegido por el usuario
    function guardarGanador($ganador){ //Recibe el nombre del ganador
        $conexionBD = conectarBD(); //Se obtiene la conexion con la base de datos
        $sql = 'INSERT INTO ganador(username, seleccion) VALUES (?, ?)'; //Se guarda en una variable la consulta 
        $consulta = $conexionBD->prepare($sql); //Se guarda la consulta preparada
        $consulta->bindParam(1, $_SESSION['user']); //Como primer parametro se guarda el nombre del usuario que inició sesión
        $consulta->bindParam(2, $ganador); //Como segundo parámetro se guarda el nombre del ganador elegido
        $consulta->execute(); //Se ejecuta la consulta
        $registros = $consulta->rowCount(); //Se obtiene el numero de registros afectados por la consulta SQL
        if($registros>0){ //Si es mas que 0 (se han visto afectados registros)
            echo "<h1 id='mensInfo'>Resultado guardado correctamente...</h1>"; //se muestra un mensaje de info
            header("refresh:1; url=menu.html"); //se redirige a la pagina de menu
            exit;
        }else{
            echo "<h1 id='mensInfo'>Resultado guardado correctamente...</h1>"; //Error al guardar
            header("refresh:1; url=menu.html"); //se redirige a la pagina de menu
            exit;
        }
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