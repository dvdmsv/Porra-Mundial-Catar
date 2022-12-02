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
            echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                $contadorCheck = 0;
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><input type="checkbox" id="pasaFaseA" type="submit" name="rbGA' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                    $contadorCheck++;
                }
                echo '<td><button type="submit" name="grupoA">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoA'])){
                faseGrupos('grupoA', 'A');
            }
            

            //Grupo B
            $sql = "SELECT * FROM selecciones WHERE grupo = 'B'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
                $contadorCheck = 0;
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        echo '<td><input type="checkbox" id="pasaFaseB" type="submit" name="rbGB' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                    $contadorCheck++;
                }
                echo '<td><button type="submit" name="grupoB">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoB'])){
                faseGrupos('grupoB', 'B');
            }

            //Grupo C
            $sql = "SELECT * FROM selecciones WHERE grupo = 'C'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseC" type="submit" name="rbGC' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoC">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoC'])){
                    faseGrupos('grupoC', 'C');
            }

            //Grupo D
            $sql = "SELECT * FROM selecciones WHERE grupo = 'D'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseD" type="submit" name="rbGD' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoD">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoD'])){
                faseGrupos('grupoD', 'D');
            }
        

            //Grupo E
            $sql = "SELECT * FROM selecciones WHERE grupo = 'E'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseE" type="submit" name="rbGE' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoE">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoE'])){
                faseGrupos('grupoE', 'E');
            }

            //Grupo F
            $sql = "SELECT * FROM selecciones WHERE grupo = 'F'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseF" type="submit" name="rbGF' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoF">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoF'])){
                faseGrupos('grupoF', 'F');
            }

            //Grupo G
            $sql = "SELECT * FROM selecciones WHERE grupo = 'G'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseG" type="submit" name="rbGG' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoG">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoG'])){
                faseGrupos('grupoG', 'G');
            }

            //Grupo H
            $sql = "SELECT * FROM selecciones WHERE grupo = 'H'";
            $resultado = $conexionBD->query($sql);
            echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
            echo "<table class='selecciones'>";
            $contadorCheck = 0;
            while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                echo "<tr>";
                    echo '<td>' . $registros['nombre'] . '</td>';
                    echo "<td>" . $registros['grupo'] . "</td>";
                    echo '<td><input type="checkbox" id="pasaFaseH" type="submit" name="rbGA' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                echo "</tr>";
                $contadorCheck++;
            }
            echo '<td><button type="submit" name="grupoH">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoH'])){
                faseGrupos('grupoH', 'H');
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