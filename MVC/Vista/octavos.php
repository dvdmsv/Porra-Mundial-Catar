<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/css.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
    </nav>
    <?php
        session_start(); //Se inicia sesion
        require_once('../Controlador/octavos_controlador.php');
        require_once('../Controlador/pasoDeFase_controlador.php');
    ?>
    <?php
        //Tablas con los emparejamientos de octavos
        echo "<div class='tablas'>";
            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoA'][0][0]); //Se extrae la selección la seleccion del nombre guardado en la variable de sesion
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos1' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoB'][1][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos1' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formOctavos1' name='formOctavos1'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos1'])){ //Si se ha pulsado el botón de el emparejamiento de octavos
                if(isset($_POST['octavos1'])){ //Si está seteada la variable
                   cuartos($_POST['octavos1'], 'octavos1');  //Se ejecuta la función
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }
            

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoA'][1][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos2' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoB'][0][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos2' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td><button type='submit' id='formOctavos2' name='formOctavos2'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos2'])){
                if(isset($_POST['octavos2'])){
                   cuartos($_POST['octavos2'], 'octavos2'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoC'][0][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos3' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoD'][1][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos3' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos3' name='formOctavos3'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos3'])){
                if(isset($_POST['octavos3'])){
                   cuartos($_POST['octavos3'], 'octavos3'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoC'][1][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos4' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoD'][0][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos4' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos4' name='formOctavos4'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos4'])){
                if(isset($_POST['octavos4'])){
                   cuartos($_POST['octavos4'], 'octavos4'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoE'][0][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos5' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoF'][1][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos5' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos5' name='formOctavos5'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos5'])){
                if(isset($_POST['octavos5'])){
                   cuartos($_POST['octavos5'], 'octavos5'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoE'][1][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos6' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoF'][0][0]);
                        echo "<td>" .  $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos6' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos6' name='formOctavos6'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos6'])){
                if(isset($_POST['octavos6'])){
                   cuartos($_POST['octavos6'], 'octavos6'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoG'][0][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos7' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoH'][1][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos7' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos7' name='formOctavos7'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos7'])){
                if(isset($_POST['octavos7'])){
                   cuartos($_POST['octavos7'], 'octavos7'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }

            echo '<form id="formOctavos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 = extraerSeleccion($_SESSION['grupoG'][1][0]);
                        echo "<td>" . $seleccion1 . "</td>";
                        echo "<td><input type='radio' name='octavos8' value={$seleccion1} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                        $seleccion2 = extraerSeleccion($_SESSION['grupoH'][0][0]);
                        echo "<td>" . $seleccion2 . "</td>";
                        echo "<td><input type='radio' name='octavos8' value={$seleccion2} ></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><button type='submit' id='formOctavos8' name='formOctavos8'>Pasa de fase</button></td>";
                    echo "</tr>";
                echo "</table>";
            echo '</form>';
            if(isset($_POST['formOctavos8'])){
                if(isset($_POST['octavos8'])){
                   cuartos($_POST['octavos8'], 'octavos8'); 
                }else{
                    echo '<h1 id="mensInfo">Te falta un equipo por elegir</h1>';
                }
            }
        echo "</div>";
    ?>
    <form action="./cuartos.php" method="post">
        <button type="submit" id="pasarFase">Cuartos</button>
    </form>
</body>
</html>