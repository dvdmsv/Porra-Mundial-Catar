<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Resultados</title>
</head>
<body>
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
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

        $conexionBD = conectarBD();

        try {
            $sql = 'SELECT seleccion from ganador WHERE username = ?';
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(1, $_SESSION['user']);
            $consulta->execute();
            if($consulta->rowCount() == 0){
                echo "<h1 id='mensInfo'>Sin predicciones</h1>";
            }else{
                echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table class='selecciones'>";
                    echo "<tr><th>Nº Prediccion</th><th>Ganador</th></tr>";
                    $contador = 1;
                    while($registros = $consulta->fetch()){
                        echo "<tr>";
                            echo '<td >' . $contador . '</td>';
                            echo '<td>' . $registros['seleccion'] . '</td>';
                            echo "<td><button type='submit' name='eliminarRegistro' value='{$registros['seleccion']}'>Eliminar prediccion</button></td>";
                        echo "</tr>";
                        $contador++;
                    }
                echo "</table>";
                echo '</form>';
                if(isset($_POST['eliminarRegistro'])){
                    eliminarRegistro($_POST['eliminarRegistro']);
                }
            }
            
        } catch (\Throwable $th) {
            
        }
    ?>
</body>
</html>