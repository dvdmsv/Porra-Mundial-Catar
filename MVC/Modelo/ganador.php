<?php
    class Ganador{
        private $username;
        private $seleccion;
        private $bd;

        public function __construct($username, $seleccion){
            require("../Modelo/bdMundial.php");
            $this->username = $username;
            $this->seleccion = $seleccion;
            $this->bd = bdMundial::conexionBD();
        }

        public function introducirGanador(){
            $sql = 'INSERT INTO ganador(username, seleccion) VALUES (?, ?)'; //Se guarda en una variable la consulta 
            $consulta = bdMundial::conexionBD()->prepare($sql); //Se guarda la consulta preparada
            $consulta->bindParam(1, $this->username); //Como primer parametro se guarda el nombre del usuario que inició sesión
            $consulta->bindParam(2, $this->seleccion); //Como segundo parámetro se guarda el nombre del ganador elegido
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
    }

?>