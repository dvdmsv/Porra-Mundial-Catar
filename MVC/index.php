<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/css.css">
    <title>Iniciar Sesion</title>
</head>
<body>
<?php
    
    
    if(!isset($_REQUEST['controlador'])){
        require_once("./Controlador/login_controlador.php");
    }else if($_REQUEST['controlador'] == "registro_controlador"){
        require_once("./Controlador/registro_controlador.php");
    }else if($_REQUEST['controlador'] == "menu"){
        require_once("./Vista/menu.html");
    }else if($_REQUEST['controlador'] == "fase_grupos"){
        require_once("./Controlador/faseGrupos_controlador.php");
<<<<<<< HEAD
=======
    }else if($_REQUEST['controlador'] == "pasarFaseGrupos"){
        require_once("./Controlador/faseGrupos_controlador.php");
>>>>>>> 2e5d2252772a368e7c5d71b58cbc6de100c8a424
    }
    
    
?>
</body>
</html>