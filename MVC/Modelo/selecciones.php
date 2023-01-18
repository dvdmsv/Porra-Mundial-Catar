<?php
    class Selecciones{
        private $bd;
        private $nombres;
        private $grupo;

        public function __construct($grupo){
            require_once("../Modelo/bdMundial.php");
            $this->nombres = array();
            $this->grupo = $grupo;
            $this->bd = bdMundial::conexionBD();
        }

        public function obtenerEquipos(){
            $consulta = $this->bd->query("SELECT nombre, grupo FROM selecciones WHERE grupo = '{$this->grupo}'");
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->nombres[] = $filas['nombre'];
            }
            return $this->nombres;
        }
    }
?>