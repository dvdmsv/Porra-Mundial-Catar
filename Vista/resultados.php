<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Predicciones</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.php">Menu</a>
        <a href="./faseGrupos.php">Hacer predicción</a>
        <a href="./ranking.php">Ranking</a>
    </nav>

    <?php
        require_once('../Controlador/resultados_controlador.php');
    ?>
    <?php
        if($predicciones){ //Si el controlador indica que hay predicciones
            echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Veces elegido ganador</th><th>Ganador</th></tr>";
                while($registros = $consulta->fetch()){
                    echo "<tr>";
                        echo '<td >' . $registros['vecesElegido'] . '</td>';
                        echo '<td>' . $registros['seleccion'] . '</td>';
                        echo "<td><button type='submit' name='eliminarRegistro' value='{$registros['seleccion']}'>Eliminar prediccion</button></td>";
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
        }
    ?>
</body>
</html>