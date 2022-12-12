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
    
        if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
            echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:3; url=login.php"); //se redirige a la pagina de login
            exit;
        }

        for($i=0; $i<1; $i++){ //Se recorre el array de grupos
            if(!isset($_SESSION['final'][$i][0])){ //Si la variable de sesion user no está seteada
                for($i=0; $i<1; $i++){ //se eliminan los elementos que haya en los arrays
                    unset($_SESSION['final'][$i][0]);
                }
                echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
                header("refresh:1; url=semis.php"); //se redirige a la pagina de cuartos
                exit;
            }
        }

        echo '<form id="formSemis" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table>";
                    echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                    echo "<tr>";
                        $seleccion1 =  $_SESSION['final'][0][0];
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
        if(isset($_POST['ganador'])){
            guardarGanador($_POST['final']);
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