<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Semifinales</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.php">Menu</a>
    </nav>

    <?php
        session_start(); //Se inicia sesion
        require_once('../Controlador/semis_controlador.php');
        require_once('../Controlador/pasoDeFase_controlador.php');
    ?>

    <?php
        echo '<form id="formSemis" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['semis'][0][0]; //Se obtiene el equipo a partir del array de sesion de semifinales
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
        if(isset($_POST['formSemis1'])){ //Si se ha pulsado el boton de enviar equipo
            if(isset($_POST['semis1'])){ //Y el contenido del emparejamiento contiene una seleccion
                finalTorneo($_POST['semis1'], 'semis1'); //Se ejecuta la funcion para enviar al equipo a la final
            }else{
                echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
            }
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
            if(isset($_POST['semis2'])){
                finalTorneo($_POST['semis2'], 'semis2');
            }else{
                echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
            }
        }
    ?>
    
    <form action="./final.php" method="post">
        <button type="submit" id="pasarFase">Final</button>
    </form>
</body>
</html>