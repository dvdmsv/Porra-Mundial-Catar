<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Final</title>
</head>
<body>
    <?php
        require_once("./funciones.php");
    ?>
    <?php
        session_start();

        echo '<form id="formSemis" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['final'][0][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='semis2' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['final'][1][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='semis2' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formSemis2' name='formSemis2'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
        echo '</form>';
    ?>
    
</body>
</html>