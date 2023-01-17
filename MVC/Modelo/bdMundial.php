<?php
    class bdMundial{
        private $conexion;
        private $host;
        private $db;
        private $user;
        private $pass;
        private $dsn;
        private $options;

        public function __construct(){
            $this->host = 'localhost';
            $this->db = 'mundial';
            $this->user = 'root';
            $this->pass = '';
            $this->dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
        }

        //Funcion que devuelve una conexion de la base de datos
        public function conexionBD(){
            $this->conexion = new PDO($this->dsn, $this->user, $this->pass, $this->options);
            if($this->conexion->errorCode()){
                echo "Error en la conexion";
            }else{
                //echo "No Error en la conexion";
                return $this->conexion;
            }
        }

        public function cerrarConexionBD(){
            $this->conexion = null;
        }
    }

?>