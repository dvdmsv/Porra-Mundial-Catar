<?php
    //Se inicia sesión
    session_start();
        
    /**
     * limpiarSesiones función que limpia las sesiones menos el nombre del usuario para prevenir problemas con los arrays de equipos
     *
     * @return void
     */
    function limpiarSesiones(){
        foreach($_SESSION as $clave => $valor){ //Se recorre el array $_SESSION 
            if($clave != 'user'){ //Si la clave del array NO es user
                unset($_SESSION[$clave]); //Se elimina
            }
        }
    }
    limpiarSesiones();
?>