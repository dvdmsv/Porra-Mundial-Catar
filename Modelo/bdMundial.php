<?php
    class bdMundial{
        //Funcion que devuelve una conexion de la base de datos
        public static function conexionBD(){
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            
            $conexion = new PDO("mysql:host=localhost;dbname=mundial", "root", "", $options);
            if($conexion->errorCode()){
                echo "Error en la conexion";
            }else{
                return $conexion;
            }
        }
    }
?>