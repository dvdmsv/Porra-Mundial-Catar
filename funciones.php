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

    //Funcion que se encarga de generar los cruces de octavos a partir de la fase de grupos
    function faseGrupos($grupo, $letra){  //Recibe el grupo y la letra
        $contador = 0;
        for($i=0; $i<4; $i++){
            if(!empty($_POST['rbG'. $letra . $i])){
                $contador++;
            }
        }
        if($contador>2){
            echo '<h1 id="mensInfo">Solo puedes elegir dos equipos</h1>';
        }else if($contador == 1){
            echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
        }else if($contador == 2){
            for($i=0; $i<4; $i++){
                if(!empty($_POST['rbG'. $letra . $i])){
                    $seleccion = $_POST['rbG'. $letra . $i];
                    $arrGrupo = [];
                    array_push($arrGrupo, htmlspecialchars($seleccion));
                    $_SESSION[$grupo][] = $arrGrupo;
                }
            }
        }
    }

    function cuartos($seleccion, $cruce){
        if(!empty($_POST[$cruce])){
            $arrCuart = [];
            array_push($arrCuart, htmlspecialchars($seleccion));
            $_SESSION['cuartos'][]= $arrCuart;
        }
    }

    function semis($seleccion, $cruce){
        if(!empty($_POST[$cruce])){
            $arrSemis = [];
            array_push($arrSemis, htmlspecialchars($seleccion));
            $_SESSION['semis'][]= $arrSemis;
        }
    }

    function finalTorneo($seleccion, $cruce){
        if(!empty($_POST[$cruce])){
            $arrFinal = [];
            array_push($arrFinal, htmlspecialchars($seleccion));
            $_SESSION['final'][]= $arrFinal;
        }
    }

    function extraerSeleccion($nombre){
        $seleccion = explode("#", $nombre);
        return $seleccion[0];
    }

    function guardarGanador($ganador){
        $conexionBD = conectarBD();
        $sql = 'INSERT INTO ganador(username, seleccion) VALUES (?, ?)';
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(1, $_SESSION['user']);
        $consulta->bindParam(2, $ganador);
        $consulta->execute();
        $registros = $consulta->rowCount();
        if($registros>0){
            echo "<h1 id='mensInfo'>Resultado guardado correctamente...</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:1; url=menu.html"); //se redirige a la pagina de login
            exit;
        }
    }

    function eliminarRegistro($seleccion){
        $conexionBD = conectarBD();
        $sql = 'DELETE FROM ganador WHERE seleccion = ?';
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(1, $seleccion);
        $consulta->execute();
        $registros = $consulta->rowCount();
        if($registros>0){
            echo "<h1 id='mensInfo'>Registro eliminado</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:1"); //se redirige a la pagina de login
        }
    }
?>