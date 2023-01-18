<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Cuartos</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
    </nav>
    <?php
         session_start(); //Se inicia sesion
         require_once('../Controlador/cuartos_controlador.php');
         require_once('../Controlador/pasoDeFase_controlador.php');
    ?>
    <?php

        //Tablas con los emparejamientos de cuartos
        echo "<div class='tablas'>";
            echo '<form id="formCuartos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['cuartos'][0][0]; //Se obtiene el equipo del array de sesion de los cuartos
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='cuartos1' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['cuartos'][1][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='cuartos1' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formCuartos1' name='formCuartos1'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formCuartos1'])){ //Si se ha pulsado el boton para seleccionar el equipo
                if(isset($_POST['cuartos1'])){ //Y el contenido del emparejamiento contiene una seleccion
                    semis($_POST['cuartos1'], 'cuartos1'); //Se ejecuta la funcion para enviar la seleccion a semifinales
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formCuartos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['cuartos'][2][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='cuartos2' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['cuartos'][3][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='cuartos2' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formCuartos2' name='formCuartos2'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formCuartos2'])){
                if(isset($_POST['cuartos2'])){
                    semis($_POST['cuartos2'], 'cuartos2');
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formCuartos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['cuartos'][4][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='cuartos3' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['cuartos'][5][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='cuartos3' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formCuartos3' name='formCuartos3'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formCuartos3'])){
                if(isset($_POST['cuartos3'])){
                    semis($_POST['cuartos3'], 'cuartos3');
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formCuartos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['cuartos'][6][0];
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='cuartos4' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = $_SESSION['cuartos'][7][0];
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='cuartos4' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formCuartos4' name='formCuartos4'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formCuartos4'])){
                if(isset($_POST['cuartos4'])){
                    semis($_POST['cuartos4'], 'cuartos4');
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }
        echo "<div>";
    ?>
    <form action="./semis.php" method="post">
        <button type="submit" id="pasarFase">Semifinales</button>
    </form>
</body>
</html>