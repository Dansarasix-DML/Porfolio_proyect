<?php 

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    $usuarios = $data["usuarios"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido a CV CRAFT</h1>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <?php 
                if ($data["profile"] !== "Invitado") {
                    echo "<li><a href='/logout'>Cerrar Sesión</a></li>";
                }
            ?>
        </ul>
    </nav>

    <?php 
        if ($data["profile"] == "Invitado") {
            include "../views/include/loginForm.php";
        } else {
            echo "<p>Bienvenido " . $_SESSION["user"]["nombre"] . "</p>";
        }

        // echo "<p>Estos son los perfiles de los usuarios</p>";
        echo "<h2>Usuarios Disponibles</h2>";
        foreach ($usuarios as $usuario) {
            if ($usuario["cuenta_activa"] === 1) {
                echo "<p>" . $usuario["nombre"] . " " . $usuario["apellidos"] . "(".$usuario["email"].")</p>";
                echo "<p><a href=\"/user/".$usuario["id"]."\">Ver pérfil</a></p>";
            }
        }
    
    ?>
</body>
</html>