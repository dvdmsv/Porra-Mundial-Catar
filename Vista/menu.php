<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Menu</title>
</head>
<body>
    <?php
        require_once("../Controlador/menu_controlador.php");
    ?>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
    </nav>
    <!-- Menu que direcciona a las diferentes opciones de la web -->
    <div class="menuPrincipal">
        <a href="../Vista/faseGrupos.php">Hacer prediccion</a>
        <a href="./resultados.php">Ver predicciones</a>
        <a href="./ranking.php">Ranking de selecciones</a>
    </div>  
</body>
</html>