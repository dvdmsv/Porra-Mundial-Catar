<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Menu</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.php">Menu</a>
        <a href="./faseGrupos.php">Hacer predicción</a>
        <a href="./resultados.php">Predicciones</a>
    </nav>
    
    <h1 id="h1Ranking">Selecciones más ganadoras según usuarios</h1>

    <?php
        require_once('../Controlador/ranking_controlador.php');
    ?>

    <?php
        if($registros>0){ //Si hay registros se crea una tabla con ellos
            echo "<table class='selecciones'>";
            echo "<tr><th>Ranking</th><th>Veces elegida ganadora</th><th>Ganador</th></tr>";
            $ranking = 1; //Variable que muestra el numero de ranking incrementando su valor
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros e introduciendo en una tabla
                echo "<tr>";
                echo '<td >' .  $ranking . 'º</td>';
                    echo '<td >' . $registros['vecesElegida'] . '</td>';
                    echo '<td>' . $registros['seleccion'] . '</td>';
                echo "</tr>";
                $ranking++; //Por cada vuelta se incrementa el valor del ranking
            }
            echo "</table>";
        }else{ //Si no los hay
            echo "<h1 id='mensInfo'>Aún no hay registros</h1>"; //Se muestra un mensaje indicandolo
        }
    ?>
</body>
</html>