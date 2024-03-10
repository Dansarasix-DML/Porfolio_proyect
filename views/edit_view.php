<?php 

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    $usuario = $data["usuario"];
    
    $visible = ($usuario["visible"] === 1) ? "checked" : "" ;
    $activa = ($usuario["cuenta_activa"] == 1) ? "checked" : "" ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición del porfolio</title>
</head>
<body>
    <h1>Bienvenido a CV CRAFT</h1>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><?php echo "<a href='/user/".$usuario["id"]."'>Editar porfolio</a>"; ?></li>
        </ul>
    </nav>

    <h2>Edición del perfil</h2>

    <form action="/editNow" method="post">
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $usuario["nombre"] ?>">
        </div>

        <div>
            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuario["apellidos"] ?>">
        </div>

        <div>
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto">
        </div>

        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="<?php echo $usuario["email"] ?>">
        </div>

        <div>
            <label for="resumen_perfil">Resumen del perfil: </label>
            <textarea name="resumen_perfil" id="resumen_perfil" cols="30" rows="10"><?php echo $usuario["resumen_perfil"] ?></textarea>
        </div>

        <div>
            <label for="categoria_profesional">Categoría Profesional: </label>
            <select name="categoria_profesional" id="categoria_profesional">
                <option value="Desarrollador">Desarrollador</option>
                <option value="Diseñador">Diseñador</option>
                <option value="Tester">Tester</option>
                <option value="Analista">Analista</option>
            </select>
        </div>

        <div>
            <label for="visible">Visible: </label>
            <input type="checkbox" name="visible" id="visible" <?php echo $visible ?> />
        </div>

        <input type="submit" value="Actualizar">
</body>
</html>