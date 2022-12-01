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

    function faseGrupos($seleccion, $grupo){
        $arrGrupo = [];
        array_push($arrGrupo, htmlspecialchars($seleccion));
        $_SESSION[$grupo][] = $arrGrupo;
        // foreach($_SESSION[$grupo] as $clave => $valor){ //Se obtienen los valores del array
        //      foreach($valor as $clave2 => $valor2){
        //          echo "<p>" . $valor2 . "</p>";
        //      }  
        // }
        //echo "<p>" . $_SESSION[$grupo][0] . "</p>";
        echo "<p>" . $_SESSION[$grupo][6][0] . "</p>";
    }
?>