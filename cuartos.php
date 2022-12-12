<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Cuartos</title>
</head>
<body>
    <?php
        require_once('./funciones.php');
    ?>
    <?php
        session_start();
        
        if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
            echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:3; url=login.php"); //se redirige a la pagina de login
            exit;
        }

        for($i=0; $i<7; $i++){ //Se recorre el array de grupos
            if(!isset($_SESSION['cuartos'][$i][0])){ //Si la variable de sesion user no está seteada
                for($i=0; $i<7; $i++){ //se eliminan los elementos que haya en los arrays
                    unset($_SESSION['cuartos'][$i][0]);
                }
                echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
                header("refresh:1; url=octavos.php"); //se redirige a la pagina de faseGrupos
                exit;
            }
        }

        //Tablas con los emparejamientos de cuartos
        echo "<div class='tablas'>";
            echo '<form id="formCuartos" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['cuartos'][0][0];
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
            if(isset($_POST['formCuartos1'])){
                semis($_POST['cuartos1'], 'cuartos1');
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
                semis($_POST['cuartos2'], 'cuartos2');
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
                semis($_POST['cuartos3'], 'cuartos3');
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
                semis($_POST['cuartos4'], 'cuartos4');
            }
        echo "<div>";
    ?>
    <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
    <form action="./semis.php" method="post">
        <button type="submit" id="semis">Semifinales</button>
    </form>
</body>
</html>