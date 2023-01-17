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
    <nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
        <a href="./resultados.php">Predicciones</a>
        <a href="ranking.php">Ranking</a>
    </nav>
    <!-- Se importa el archivo con las funciones -->
    <?php
        require_once('funciones.php');
    ?>
    <?php
        session_start(); //Se inicia la sesion

        if(!isset($_SESSION['user'])){ //Si la variable de sesion user no está seteada
            echo "<h1 id='mensInfo'>No estás logueado. Redirigiendo a login...</h1>"; //se muestra un error ya que no se está logueado
            header("refresh:3; url=login.php"); //se redirige a la pagina de login
            exit;
        }

        try {
            $conexionBD = conectarBD(); //Conexion con la base de datos
            $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos
            echo "<div class='tablas'>";
            for($i=0; $i<sizeof($grupos); $i++){ //Bucle que recorre el array con las letras de los grupos y setea en cada vuelta las variables con la letra correspondiente
                $sql = "SELECT nombre, grupo FROM selecciones WHERE grupo = '{$grupos[$i]}'"; //Se guarda la consulta SQL
                $resultado = $conexionBD->query($sql); //Se ejecuta la consulta
                echo '<form id="grupoSelec" action="' . $_SERVER["PHP_SELF"] . '" method="POST">';
                echo "<table class='selecciones'>";
                    echo "<tr><th>Nombre</th><th>Grupo</th></tr>";
                    $contadorCheck = 0; //Contador que va enumerando los radioButton
                    while($registros = $resultado->fetch()){ //Se van obteniendo los registros y se introducen en la tabla
                        echo "<tr>";
                            echo '<td>' . $registros['nombre'] . '</td>';
                            echo "<td>" . $registros['grupo'] . "</td>";
                            echo '<td><input type="checkbox" id="pasaFase" name="rbG' . $grupos[$i] . $contadorCheck . '" value="' . $registros['nombre'] . "#" . $registros['grupo'] . '" /></td>'; //El valor del boton será el nombre y el grupo
                        echo "</tr>";
                        $contadorCheck++; //Se incrementa el contador al final de la ejecución
                    }
                    echo "<td><button type='submit' name='grupo{$grupos[$i]}'>Pasa de fase</button></td>";
                echo "</table>";
                echo '</form>';
                if(isset($_POST['grupo' . $grupos[$i]])){ //Cuando el botón es pulsado
                    faseGrupos('grupo' . $grupos[$i], $grupos[$i]); //Se ejecuta la función
                } 
            }
            echo "</div>";
        } catch (PDOException $e) {
            echo "Error: ", $e->getMessage(), (int)$e->getCode();
        }
    ?>
    
    <form action="./octavos.php" method="post">
        <button type="submit" id="pasarFase">Octavos</button>
    </form>
</body>
</html>