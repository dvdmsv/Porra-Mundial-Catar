<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Final</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.php">Menu</a>
    </nav>

    <?php
        session_start(); //Se inicia sesion
        require_once('../Controlador/final_controlador.php');
        require_once('../Controlador/pasoDeFase_controlador.php');
    ?>

    <?php
        echo '<form id="formSemis" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['final'][0][0]; //Se obtiene un finalista a partir del array de sesion final
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='final' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['final'][1][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='final' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='ganador' name='ganador'>Ganador del mundial</button></td>";
                    echo "</tr>";
                echo "</table>";
        echo '</form>';
    ?>
</body>
</html>