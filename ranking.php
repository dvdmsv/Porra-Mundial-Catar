<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Menu</title>
</head>
<body>
<nav class="menu">
        <a href="./logoff.php">Cerrar sesión</a>
        <a href="./menu.html">Menu</a>
        <a href="./faseGrupos.php">Hacer predicción</a>
        <a href="./resultados.php">Predicciones</a>
    </nav>
    
    <h1 id="titulo">Selecciones más ganadoras según usuarios</h1>

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

        try{
            $conexionBD = conectarBD();
            $sql = 'SELECT count(seleccion) vecesElegida, seleccion FROM ganador GROUP BY seleccion ORDER BY vecesElegida DESC'; //Consulta a la base de datos que muestra el numero de veces que se repite una seleccion en la tabla ganador ordenado de mayor a menor. Para mostrar el numero de veces que se ha elegido una seleccion como campeona
            $resultado = $conexionBD->query($sql);
            $registros = $resultado->rowCount(); //Se obtiene el numero de registros
            if($registros>0){ //Si hay registros se crea una tabla con ellos
                echo "<table class='selecciones'>";
                echo "<tr><th>Ranking</th><th>Veces elegida ganadora</th><th>Ganador</th></tr>";
                $ranking = 1;
                while($registros = $resultado->fetch()){
                    echo "<tr>";
                    echo '<td >' .  $ranking . 'º</td>';
                        echo '<td >' . $registros['vecesElegida'] . '</td>';
                        echo '<td>' . $registros['seleccion'] . '</td>';
                    echo "</tr>";
                    $ranking++;
                }
                echo "</table>";
            }else{ //Si no los hay
                echo "<h1 id='mensInfo'>Aún no hay registros</h1>"; //Se muestra un mensaje indicandolo
            } 
        }catch(PDOException $e){
            echo "Error: ", $e->getMessage(), (int)$e->getCode();
        }
    ?>
</body>
</html>