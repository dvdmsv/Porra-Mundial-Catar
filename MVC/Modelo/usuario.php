<?php
    require_once("../Modelo/bdMundial.php");
    session_start();
    class Usuario{
        private $username;
        private $password;

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = md5($password);
        }

        //Funcion que autentica un usuario frente a la base de datos
        public function autenticacionBD(){
            $bd = new bdMundial(); //Se crea un objeto de la base de datos
            $conexionBD = $bd->conexionBD(); //Se obtiene su conexión
            $consulta = $conexionBD->prepare('SELECT username, password  FROM autenticacion WHERE username = ? AND password = ?'); //Se crea una consulta preparada
            $consulta->bindParam(1, $this->username); //Se establece el primer parámetro
            $consulta->bindParam(2, $this->password); //Se establece el segundo parámetro
            $consulta->execute(); //Se ejecuta la consulta
            $registros = $consulta->rowCount(); //Se obtienen el numero de registros
            if($registros>0){ //Si devuelve mas de 0 filas es que el usuario existe en la base de datos
                $fila = $consulta->fetch(); //Se obtiene la fila
                $_SESSION['user'] = $fila['username']; //Se asigna el valor de la fila "username" a la variable $_SESSION["user"]
                return true; //Se retorna true
            }
            return false; //Si no ha habido filas devueltas se devuelve false
        }

        //Funcion que registra un usuario en la base de datos
        public function registroBD(){
            if(!self::autenticacionBD()){ //Si el usuario NO existe en la base de datos
                $bd = new bdMundial();
                $conexionBD = $bd->conexionBD();
                $consulta = $conexionBD->prepare('INSERT INTO autenticacion(username, password) VALUES (?, ?)');
                $consulta->bindParam(1, $this->username);
                $consulta->bindParam(2, $this->password);
                $consulta->execute();
                $registros = $consulta->rowCount();
                if($registros>0){ //Si la ejecucion devuelve registros el usuario se ha guardado correctamente
                    echo "<h1 id='mensInfo'>Usuario registrado correctamente</h1>"; //Se notifica
                    header("refresh:1; url=login.php"); //Se redirige a la pagina de login
                }
            }else{ //Si existe
                echo "<h1 id='mensInfo'>El nombre de usuario ya existe</h1>";
            }
        }
    }
?>