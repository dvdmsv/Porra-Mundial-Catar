<?php
    /**
     * Clase selecciones
     */
    class Selecciones{
        /**
         * bd almacena la conexión con la base de datos
         * nombres almacena los nombres de las selecciones en base a su grupo
         * grupo almacena la letra del grupo
         */
        private $bd;
        private $nombres;
        private $grupo;
        
        /**
         * __construct constructor de la clase
         * Establece un array con los nombres de las selecciones, la letra de su grupo y la conexión con la base de datos
         * @param grupo letra del grupo de las selecciones
         */
        public function __construct($grupo){
            require_once("../Modelo/bdMundial.php");
            $this->nombres = array();
            $this->grupo = $grupo;
            $this->bd = bdMundial::conexionBD();
        }

        /**
         * Función que obtiene los nombres de los equipos en base a la letra de su grupo
         * @return nombres de los equipos
         */
        public function obtenerEquipos(){
            $consulta = $this->bd->query("SELECT nombre, grupo FROM selecciones WHERE grupo = '{$this->grupo}'");
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->nombres[] = $filas['nombre'];
            }
            return $this->nombres;
        }
    }
?>