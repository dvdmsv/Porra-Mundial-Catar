<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Fase de grupos</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
        <a href="./resultados.php">Predicciones</a>
        <a href="ranking.php">Ranking</a>
    </nav>
    <!-- Se importa el archivo con las funciones -->
    <?php
        //require_once('Controlador/faseGrupos_controlador.php');
    ?>
    <?php
        session_start(); //Se inicia la sesion
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
                        echo '<td><input type="checkbox" id="pasaFase" name="rbG' . $arrayEquipos[$a][$b] . $contadorCheck . '" value="' . $arrayEquipos[$a][$b] . "#" . $grupos[$a] . '" /></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                    $contadorCheck++; //Se incrementa el contador al final de la ejecución
                }
                echo "<td><button type='submit' name='grupo{$grupos[$a]}'>Pasa de fase</button></td>";
            echo "</table>";
            echo '</form>';
<<<<<<< HEAD
           
=======
            if(isset($_POST['grupo' . $grupos[$a]])){ //Cuando el botón es pulsado
                faseGrupos('grupo' . $grupos[$i], $grupos[$i]); //Se ejecuta la función
            } 
>>>>>>> 2e5d2252772a368e7c5d71b58cbc6de100c8a424
        }
        echo "</div>";

    ?>
    
    <form action="./octavos.php" method="post">
        <button type="submit" id="pasarFase">Octavos</button>
    </form>
</body>
</html>