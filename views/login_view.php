<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolios Web</title>
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
        </ul>
    </nav>
    <!-- Formulario de login -->
    <section id="login">
        <h2>Iniciar Sesión</h2>
        <form action="/login" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="submit" value="Iniciar Sesión">
        </form>
        <p>
            ¿No tienes cuenta? <a class="reg" href="/registrar">Regístrate</a>
        </p>
    </section>

    <footer>
        <p>Creado por S. Coop. CV CRAFT Creations</p>
    </footer>
</body>

</html>