<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Fase de grupos</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.php">Menu</a>
        <a href="./resultados.php">Predicciones</a>
        <a href="./ranking.php">Ranking</a>
    </nav>
    <?php
        session_start(); //Se inicia la sesion
        require_once('../Controlador/faseGrupos_controlador.php');
        require_once('../Controlador/pasoDeFase_controlador.php');
    ?>
    <?php
        echo "<div class='tablas'>";
        for($a=0; $a<sizeof($arrayEquipos); $a++){ //Bucle que recorre el array con las letras de los grupos y setea en cada vuelta las variables con la letra correspondiente
            echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                $contadorCheck = 0; //Contador que va enumerando los radioButton
                for($b=0; $b<sizeof($arrayEquipos[$a]); $b++){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $arrayEquipos[$a][$b] . '</td>';
                        echo '<td>' . $grupos[$a] . '</td>';
                        echo '<td><input type="checkbox" id="pasaFase" name="rbG' . $grupos[$a] . $contadorCheck . '" value="' . $arrayEquipos[$a][$b] . "#" . $grupos[$a] . '" /></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                    $contadorCheck++; //Se incrementa el contador al final de la ejecución
                }
                echo "<td><button type='submit' name='grupo{$grupos[$a]}'>Pasa de fase</button></td>"; //En cada vuelta se crea un botón para enviar los equipos de cada grupo a la siguiente fase
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupo' . $grupos[$a]])){ //Cuando el botón es pulsado
                faseGrupos('grupo' .  $grupos[$a],  $grupos[$a]); //Se ejecuta la función para pasar a la siguiente fase
            } 
        }
        echo "</div>";
    ?>

    <!-- Botón para pasar a la siguiente fase del tornero -->
    <form action="../Vista/octavos.php" method="post">
        <button type="submit" id="pasarFase">Octavos</button>
    </form>
</body>
</html>