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
        foreach($_SESSION['grupoA'] as $clave => $valor){ //Se obtienen los valores del array
            foreach($valor as $clave2 => $valor2){
                //echo "<p>" . $valor2 . "</p>";
            }  
        }
        echo "<p>" . $_SESSION['grupoA'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoA'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoB'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoB'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoC'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoC'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoD'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoD'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoE'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoE'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoF'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoF'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoG'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoG'][1][0] . "</p>";

        echo "<p>" . $_SESSION['grupoH'][0][0] . "</p>";
        echo "<p>" . $_SESSION['grupoH'][1][0] . "</p>";
    ?>
     <form action="./logoff.php" method="post">
        <button type="submit" id="logoff">Cerrar sesion</button>
    </form>
</body>
</html>