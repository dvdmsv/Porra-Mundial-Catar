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
        session_start();

        $grupos = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; //Array que contiene las letras de los grupos

        for($i=1; $i<=8; $i++){
            echo "<table>";
                echo "<tr><th>Equipo</th><th>Ganador</th></tr>";
                echo "<tr>";
                    if(!empty($_SESSION['grupo' . $grupos[rand(0, 7)]][0][0])){
                        echo "<td>{$_SESSION['grupo' . $grupos[rand(0, 7)]][0][0]}</td>";
                        unset($_SESSION['grupo' . $grupos[rand(0,7)]][0][0]);
                    }else{
                        echo "<td>{$_SESSION['grupo' . $grupos[rand(0, 7)]][0][0]}</td>";
                        unset($_SESSION['grupo' . $grupos[rand(0,7)]][0][0]);
                    }
                    echo "<td><input type='checkbox'/></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>{$_SESSION['grupo' . $grupos[rand(0,7)]][1][0]}</td>";
                    unset($_SESSION['grupo' . $grupos[rand(0, 7)]][1][0]);
                    echo "<td><input type='checkbox'/></td>";
                echo "</tr>";
            echo "</table>";
        }
        
        // echo "<p>" . $_SESSION['grupoA'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoA'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoB'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoB'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoC'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoC'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoD'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoD'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoE'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoE'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoF'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoF'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoG'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoG'][1][0] . "</p>";

        // echo "<p>" . $_SESSION['grupoH'][0][0] . "</p>";
        // echo "<p>" . $_SESSION['grupoH'][1][0] . "</p>";
    ?>
     <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
</body>
</html>