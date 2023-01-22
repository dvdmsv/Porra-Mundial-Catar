<?php
    
    /**
     * Clase Usuario que contiene a un usuario que se inicia en la web
     */
    class Usuario{
        /**
         * username contiene el nombre de usuario
         * password contiene la contraseña de usuario
         * bd contiene la conexión con la base de datos
         * 
         */
        private $username;
        private $password;
        private $bd;
        
        /**
         * __construct constructor de la clase
         *
         * @param  mixed $username nombre de usuario
         * @param  mixed $password contraseña de usuario
         * @return void
         */
        public function __construct($username, $password){
            require_once("../Modelo/bdMundial.php");
            $this->username = $username;
            $this->password = md5($password);
            $this->bd = bdMundial::conexionBD(); //Almacena la conexión con la base de datos
        }
    
        /**
         * autenticacionBD funcion que autentica a un usuario frente a la base de datos
         *
         * @return boolean si el usuario existe en la base de datos
         */
        public function autenticacionBD(){
            session_start(); //Se inicia la sesión
            $consulta = $this->bd->prepare('SELECT username, password  FROM autenticacion WHERE username = ? AND password = ?'); //Se ejecuta una consulta preparada
            $consulta->bindParam(1, $this->username); //Se establece el primer parámetro
            $consulta->bindParam(2, $this->password); //Se establece el segundo parámetro
            $consulta->execute(); //Se ejecuta la consulta
            $registros = $consulta->rowCount(); //Se obtienen el numero de registros
            if($registros>0){ //Si devuelve mas de 0 filas es que el usuario existe en la base de datos
                $fila = $consulta->fetch(); //Se obtiene la fila
                $_SESSION['user'] = $fila['username']; //Se asigna el valor de la fila "username" a la variable $_SESSION["user"]
                return true; //Se retorna true
            }else{
                return false; //Si no se han encontrado registros se retorna false;
            }
        }
     
        /**
         * registroBD funcion que registra un usuario en la base de datos
         *
         * 
         * @return void
         */
        public function registroBD(){
            if(!self::autenticacionBD()){ //Si el usuario NO existe en la base de datos
                $consulta = $this->bd->prepare('INSERT INTO autenticacion(username, password) VALUES (?, ?)');
                $consulta->bindParam(1, $this->username);
                $consulta->bindParam(2, $this->password);
                $consulta->execute();
                $registros = $consulta->rowCount();
                if($registros>0){ //Si la ejecucion devuelve registros el usuario se ha guardado correctamente
                    return true;
                }else{
                    return false;
                }
            }else{ //Si existe
                echo "<h1 id='mensInfo'>El nombre de usuario ya existe</h1>";
            }
        }
    }
?>