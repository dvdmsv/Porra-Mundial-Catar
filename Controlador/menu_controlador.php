<?php
    session_start();
    function limpiarSesiones(){
        foreach($_SESSION as $clave => $valor){
            if($clave != 'user'){
                unset($_SESSION[$clave]);
            }
        }
    }
    limpiarSesiones();
?>