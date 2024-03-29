<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    $usuarios = $data['usuarios'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CV CRAFT</title>

</head>

<body>
    <header>
        <img class="iconoweb" src="img/IconoPorfoliosWebSinFondo.png" alt="IconoPorfoliosWebSinFondo">
        <h1>CV CRAFT</h1>
    </header>

    <nav>
        <div>
            <ul>
                <li><a href="/">Inicio</a></li>
                <?php if (!$data['auth']) {
                    echo '<li><a href="/login">Iniciar Sesión</a></li>';
                    echo '<li><a href="/registrar">Registrarse</a></li>';
                }
                ?>
                <?php if ($data['auth']) {
                    echo '<li><a href="/cerrarsesion">Cerrar Sesión</a></li>';
                }
                ?>
            </ul>
            <?php

                if ($data['auth']) {
                    echo '<p class="perfil"><a href="/perfil">' . $_SESSION['usuario'] . '</a></p>';
                    echo "</div>";
                } else {
                    echo '<p class="perfil">Invitado</p>';
                    echo "</div>";
                }
                ?>
            <form class="search" action="/" method="get">
                <input type="text" name="q" id="q" placeholder="Buscar">
                <input type="submit" name="submitbuscar" id="submitbuscar" value="Buscar">
            </form>
    </nav>

    <section id="home">
        <p>Descubre perfiles en el área de nuevas tecnologías...</p>
    </section>

    <section id="usuarios">
        <h2>Porfolios:</h2>
        <div class="usuarios-container">
            <?php foreach ($usuarios as $usuario) : ?>
                <div class="usuario-card">
                    <?php
                    if ($usuario['foto']) {
                        echo '<img class="imgporfolio" src="' . $usuario['foto'] . '" alt="Foto de perfil">';
                    } else {
                        echo '<img class="imgporfolio" src="img/IconoPerfil.png" alt="Foto de perfil">';
                    }
                    ?>
                    <div class="usuario-info">
                        <h3><?= $usuario['nombre']  ?> <?= $usuario['apellidos'] ?></h3>
                        <p><strong>Email:</strong> <?= $usuario['email'] ?></p>
                        <p><strong>Categoría profesional:</strong> <?= $usuario['categorias_profesional'] ?></p>
                        <p><strong>Resumen:</strong> <?= $usuario['resumen_perfil'] ?></p>
                    </div>
                    <div class="usuario-trabajos">
                        <h4>Trabajos:</h4>
                        <ul>
                            <?php foreach ($usuario['trabajos'] as $trabajo) :
                                if ($trabajo['visible'] == 1) : ?>
                                    <li><?= $trabajo['titulo'] ?> | <?= $trabajo['fecha_inicio'] ?> - <?= $trabajo['fecha_final'] ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="usuario-proyectos">
                        <h4>Proyectos:</h4>
                        <ul>
                            <?php foreach ($usuario['proyectos'] as $proyecto) :
                                if ($proyecto['visible'] == 1) : ?>
                                    <li><?= $proyecto['titulo'] ?> | <?= $proyecto['descripcion'] ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="usuario-redes-sociales">
                        <h4>Redes Sociales:</h4>
                        <ul>
                            <?php foreach ($usuario['redes_sociales'] as $red_social) :
                                if ($red_social['visible'] == 1) : ?>
                                    <li><a class="reg" href="<?= $red_social['url'] ?>"><?= $red_social['url'] ?></a></li>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </ul>

                    </div>
                    <div class="usuario-habilidades">
                        <h4>Habilidades:</h4>
                        <ul>
                            <?php foreach ($usuario['skills'] as $habilidad) :
                                if ($habilidad['visible'] == 1) : ?>
                                    <li><?= $habilidad['habilidades'] ?> | <?= $habilidad['categorias_skills_categoria'] ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>Creado por S. Coop. CV CRAFT Creations</p>
    </footer>
</body>

</html>