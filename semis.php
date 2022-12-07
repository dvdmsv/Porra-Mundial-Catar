<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Semifinales</title>
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
                        $seleccion1 =  $_SESSION['semis'][0][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='semis1' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['semis'][1][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='semis1' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formSemis1' name='formSemis1'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
        echo '</form>';
        if(isset($_POST['formSemis1'])){
            finalTorneo($_POST['semis1'], 'semis1');
        }

        echo '<form id="formSemis" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['semis'][2][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='semis2' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['semis'][3][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='semis2' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formSemis2' name='formSemis2'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
        echo '</form>';
        if(isset($_POST['formSemis2'])){
            finalTorneo($_POST['semis2'], 'semis2');
        }
    ?>
    <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
    <form action="./final.php" method="post">
        <button type="submit" id="semis">Final</button>
    </form>
</body>
</html>