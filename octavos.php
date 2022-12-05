<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <?php
        require_once('funciones.php');
    ?>
    <?php
        session_start();
        $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos

        for($i=0; $i<sizeof($grupos); $i++){ //Se recorre el array de grupos
            if(!isset($_SESSION['grupo' . $grupos[$i]][0][0])){ //Si la variable de sesion user no está seteada
                for($i=0; $i<sizeof($grupos); $i++){ //se eliminan los elementos que haya en los arrays
                    unset($_SESSION['grupo' . $grupos[$i]]);
                }
                echo "<h1 id='mensInfo'>Faltan equipos por elegir...</h1>"; //se muestra un error indicando que faltan selecciones por elegir
                header("refresh:1; url=faseGrupos.php"); //se redirige a la pagina de faseGrupos
                exit;
            }
        }

        //Se establecen dos arrays temporales vacíos, uno para los primeros y otro para los segundos
        $arrTemp1 = [];
        $arrTemp2 = [];
        for($i=0; $i<sizeof($grupos); $i++){ //Se ejecuta un bucle tantas veces como el tamaño del array grupos
            echo "<table>";
                echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                echo "<tr>";
                    $flag1 = true; //Se establece una bandera en true
                    while($flag1){ //meintras esa bandera permanezca en true se ejecuta un bucle
                        $grupoAleat1 = rand(0, (sizeof($grupos)-1)); //Se escoje un numero aleatorio entre el 0 y el numero de elementos en el array grupo
                        $selecTemp1 = $_SESSION['grupo' . $grupos[$grupoAleat1]][0][0]; //Se obtiene la seleccion aleatoria
                        if(!in_array($selecTemp1, $arrTemp1)){ //Si la seleccion aleatoria NO está en el array temporal
                            array_push($arrTemp1, $selecTemp1); //Se introduce en el array temporal
                            $selecTemp1 = extraerSeleccion($selecTemp1);
                            echo "<td>{$selecTemp1}</td>"; //Se muestra en la tabla
                            echo "<td><input type='checkbox'/></td>";
                            $flag1 = false; //Se cambia la bandera a false
                        }
                    }
                echo "</tr>";
                echo "<tr>";
                $flag2 = true;
                while($flag2){
                    $grupoAleat2 = rand(0, (sizeof($grupos)-1));
                    $selecTemp2 = $_SESSION['grupo' . $grupos[$grupoAleat2]][1][0];
                    if(!in_array($selecTemp2, $arrTemp2)){
                        array_push($arrTemp2, $selecTemp2);
                        $selecTemp2 = extraerSeleccion($selecTemp2);
                        echo "<td>{$selecTemp2}</td>";
                        echo "<td><input type='checkbox'/></td>";
                        $flag2= false;
                    }
                }
                echo "</tr>";
                echo "<tr>";
                echo "<td><button type='submit' name='grupo{}'>Pasa de fase</button></td>";
                echo "</tr>";
            echo "</table>";
        }
    ?>
     <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
    <form action="./cuartos.php" method="post">
        <button type="submit" id="logoff">Cuartos</button>
    </form>
</body>
</html>