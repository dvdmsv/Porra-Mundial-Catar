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
    
    <!-- Se importa el archivo con las funciones -->
    <?php
        require_once('funciones.php');
    ?>
    <?php
        session_start();

        if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
            echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:3; url=login.php"); //se redirige a la pagina de login
            exit;
        }

        $conexionBD = conectarBD();

        try {
            //Grupo A
            $sql = "SELECT nombre, grupo FROM selecciones WHERE grupo = 'A'";
            $resultado = $conexionBD->query($sql);
            echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="GET">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button id="pasaFase" type="submit" name="grupoA" value="' . $registros['nombre'] . "_" . $registros['grupo'] . '" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_GET['grupoA'])){
                $seleccion = $_GET['grupoA'];
                $grupo = 'grupoA';
                $arrGrupo = array();
                faseGrupos($seleccion, $grupo, $arrGrupo);
            }
            

            //Grupo B
            $sql = "SELECT * FROM selecciones WHERE grupo = 'B'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoB" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoB'])){
                $seleccion = $_POST['grupoB'];
                $grupo = 'grupoB';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo C
            $sql = "SELECT * FROM selecciones WHERE grupo = 'C'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoC" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoC'])){
                $seleccion = $_POST['grupoC'];
                $grupo = 'grupoC';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo D
            $sql = "SELECT * FROM selecciones WHERE grupo = 'D'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoD" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoD'])){
                $seleccion = $_POST['grupoD'];
                $grupo = 'grupoD';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo E
            $sql = "SELECT * FROM selecciones WHERE grupo = 'E'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoE" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoE'])){
                $seleccion = $_POST['grupoE'];
                $grupo = 'grupoE';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo F
            $sql = "SELECT * FROM selecciones WHERE grupo = 'F'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoF" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoF'])){
                $seleccion = $_POST['grupoF'];
                $grupo = 'grupoF';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo G
            $sql = "SELECT * FROM selecciones WHERE grupo = 'G'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoG" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoG'])){
                $seleccion = $_POST['grupoG'];
                $grupo = 'grupoG';
                faseGrupos($seleccion, $grupo);
            }

            //Grupo H
            $sql = "SELECT * FROM selecciones WHERE grupo = 'H'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><button type="submit" name="grupoH" value="' . $registros['nombre'] . "#" . $registros['grupo'].'" />Pasa de fase</button></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                }
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoH'])){
                $seleccion = $_POST['grupoH'];
                $grupo = 'grupoH';
                faseGrupos($seleccion, $grupo);
            }

        } catch (\PDOException $e) {
            echo "Error: ", $e->getMessage(), (int)$e->getCode();
        }
    ?>
    <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
    <form action="./octavos.php" method="post">
        <button type="submit" id="logoff">Octavos</button>
    </form>
</body>
</html>