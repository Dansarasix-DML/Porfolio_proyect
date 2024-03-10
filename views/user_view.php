<?php 

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    $usuario = $data["usuario"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $usuario["nombre"] . " " . $usuario["apellidos"] ?></title>
</head>
<body>
    <h1>Bienvenido a CV CRAFT</h1>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <?php 
                if ($data["profile"] !== "Invitado") {
                    echo "<li><a href='/edit'>Editar porfolio</a></li>";
                    echo "<li><a href='/logout'>Cerrar Sesión</a></li>";
                }
            ?>
        </ul>
    </nav>

    <div>
        <img src="<?php echo $usuario["foto"] ?>" alt="Foto de perfil">
        <h1><?php echo $usuario["nombre"] . " " . $usuario["apellidos"] ?></h1>
        <p><?php echo $usuario["email"] ?></p>
    </div>
    <hr>
    <div>
        <p><?php echo $usuario["resumen_perfil"] ?></p>
    </div>
    <hr>
    

</body>
</html>