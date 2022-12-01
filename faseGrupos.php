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
                $contadorCheck = 1;
                while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                    echo "<tr>";
                        echo '<td>' . $registros['nombre'] . '</td>';
                        echo "<td>" . $registros['grupo'] . "</td>";
                        //echo '<td><input type="checkbox" id="pasaFaseA" type="submit" name="rbGA" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                        echo '<td><input type="checkbox" id="pasaFaseA" type="submit" name="rbGA' . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                    echo "</tr>";
                    $contadorCheck++;
                }
                echo '<td><button type="submit" name="grupoA">Pasa de fase</button></td>';
            echo "</table>";
            echo '</form>';
            if(isset($_POST['grupoA'])){
                $contador = 0;
                for($i=1; $i<=4; $i++){
                    if(!empty($_POST['rbGA' . $i])){
                        $contador++;
                    }
                }
                if($contador>2){
                    echo '<p>Solo puedes elegir dos equipos</p>';
                }else if($contador == 1){
                    echo '<p>Te falta un equipo por elegir</p>';
                }else if($contador == 2){
                    for($i=1; $i<=4; $i++){
                        if(!empty($_POST['rbGA' . $i])){
                            $seleccion = $_POST['rbGA' . $i];
                            $grupo = 'grupoA';
                            $arrGrupo = [];
                            array_push($arrGrupo, htmlspecialchars($seleccion));
                            $_SESSION[$grupo][] = $arrGrupo;
                            echo "<p>" . $_SESSION[$grupo][0][0] . "</p>";
                            //faseGrupos($seleccion, $grupo);
                        }
                    }
                }
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