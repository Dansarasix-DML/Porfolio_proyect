<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV CRAFT</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <img class="iconoweb" src="img/IconoPorfoliosWebSinFondo.png" alt="IconoPorfoliosWebSinFondo">
        <h1>Bienvenido a CV CRAFT</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/login">Iniciar Sesión</a></li>
        </ul>
    </nav>
    <!-- Formulario de registro -->
    <section id="registrar">
        <h2>Iniciar Sesión</h2>
        <form action="/registrar" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" >
                <label for="password">Contraseña:</label>
                <input type="text" id="password" name="password" required>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
                <label for="categoria_profesional">Categoría Profesional:</label>
                <select name="categoria_profesional" id="categoria_profesional">
                    <option value="Desarrollador">Desarrollador</option>
                    <option value="Diseñador">Diseñador</option>
                    <option value="Tester">Tester</option>
                    <option value="Analista">Analista</option>
                </select>
                <label for="resumen_perfil">Resumen Perfil:</label>
                <textarea name="resumen_perfil" id="resumen_perfil" cols="30" rows="10"></textarea>
                <input type="submit" name="submit" value="Iniciar Sesión">

        </form>
    </section>




    <footer>
        <p>Creado por S. Coop. CV CRAFT Creations</p>
    </footer>
</body>

</html>