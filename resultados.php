<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Predicciones</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
        <a href="./faseGrupos.php">Hacer predicción</a>
        <a href="ranking.php">Ranking</a>
    </nav>

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

        try {
            $conexionBD = conectarBD();
            $sql = 'SELECT count(seleccion) as vecesElegido, seleccion from ganador WHERE username = ? GROUP BY seleccion'; //Se genera una consulta para mostrar las predicciones del usuario
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(1, $_SESSION['user']);
            $consulta->execute();
            if($consulta->rowCount() == 0){ //Si no obtiene resultados es que no hay predicciones
                echo "<h1 id='mensInfo'>Sin predicciones</h1>";
                echo "<a id='enlacePredicciones' href='./faseGrupos.php'>Hacer prediccion</a>";
            }else{ //Si hay resultados se muestra una table con las predicciones del usuario
                echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table class='selecciones'>";
                    echo "<tr><th>Veces elegido ganador</th><th>Ganador</th></tr>";
                    while($registros = $consulta->fetch()){
                        echo "<tr>";
                            echo '<td >' . $registros['vecesElegido'] . '</td>';
                            echo '<td>' . $registros['seleccion'] . '</td>';
                            echo "<td><button type='submit' name='eliminarRegistro' value='{$registros['seleccion']}'>Eliminar prediccion</button></td>";
                        echo "</tr>";
                    }
                echo "</table>";
                echo '</form>';
                if(isset($_POST['eliminarRegistro'])){ //Si se ha pulsado el boton de eliminar registro
                    eliminarRegistro($_POST['eliminarRegistro']); //Se ejecuta la funcion
                }
            }
        } catch (\Throwable $th) {
            echo "Error: ", $e->getMessage(), (int)$e->getCode();
        }
    ?>
</body>
</html>