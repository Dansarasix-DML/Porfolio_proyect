<?php

    session_start();
    require('../vendor/autoload.php');
    require "../bootstrap.php";
    use App\Core\Router;
    use App\Controllers\IndexController;
    use App\Controllers\AuthController;
    use App\Controllers\UserController;

    $router = new Router();

    $router->add(array(
        'name' => 'home',
        'path' => '/^\/$/',
        'action' => [IndexController::class, 'IndexAction'],
        'auth' => ['Invitado', 'Usuario']
    ));

    $router->add(array(
        'name' => 'login',
        'path' => '/^\/login$/',
        'action' => [AuthController::class, 'loginAction'],
        'auth' => ['Invitado']
    ));

    $router->add(array(
        'name' => 'registrar',
        'path' => '/^\/registrar$/',
        'action' => [AuthController::class, 'registrarAction'],
        'auth' => ['Invitado']
    ));

    $router->add(array(
        'name' => 'cerrarSesion',
        'path' => '/^\/cerrarsesion$/',
        'action' => [AuthController::class, 'cerrarSesionAction'],
        'auth' => ['Usuario']
    ));

    // Verificar con token enviado por email y el token enviado por la url y lo capturas con una expresion regular
    $router->add(array(
        'name' => 'verificar',
        'path' => '/^\/verificar\/.*$/',
        'action' => [AuthController::class, 'verificarAction'],
        'auth' => ['Invitado']
    ));

    $router->add(array(
        'name' => 'perfil',
        'path' => '/^\/perfil$/',
        'action' => [UserController::class, 'perfilAction'],
        'auth' => ['Usuario']
    ));

    // Router para eliminar trabajos
    $router->add(array(
        'name' => 'eliminarTrabajo',
        'path' => '/^\/eliminartrabajo\/.*$/',
        'action' => [UserController::class, 'eliminarTrabajoAction'],
        'auth' => ['Usuario']
    ));

    // Router para eliminar proyectos
    $router->add(array(
        'name' => 'eliminarProyecto',
        'path' => '/^\/eliminarproyecto\/.*$/',
        'action' => [UserController::class, 'eliminarProyectoAction'],
        'auth' => ['Usuario']
    ));

    // Router para eliminar redes sociales
    $router->add(array(
        'name' => 'eliminarRedSocial',
        'path' => '/^\/eliminarredsocial\/.*$/',
        'action' => [UserController::class, 'eliminarRedSocialAction'],
        'auth' => ['Usuario']
    ));

    // Router para eliminar habilidades
    $router->add(array(
        'name' => 'eliminarHabilidad',
        'path' => '/^\/eliminarhabilidad\/.*$/',
        'action' => [UserController::class, 'eliminarHabilidadAction'],
        'auth' => ['Usuario']
    ));

    // Router para ocultar trabajos
    $router->add(array(
        'name' => 'ocultarTrabajo',
        'path' => '/^\/ocultartrabajo\/.*$/',
        'action' => [UserController::class, 'ocultarTrabajoAction'],
        'auth' => ['Usuario']
    ));

    // Router para ocultar proyectos
    $router->add(array(
        'name' => 'ocultarProyecto',
        'path' => '/^\/ocultarproyecto\/.*$/',
        'action' => [UserController::class, 'ocultarProyectoAction'],
        'auth' => ['Usuario']
    ));

    // Router para ocultar redes sociales
    $router->add(array(
        'name' => 'ocultarRedSocial',
        'path' => '/^\/ocultarredsocial\/.*$/',
        'action' => [UserController::class, 'ocultarRedSocialAction'],
        'auth' => ['Usuario']
    ));


    // Router para ocultar habilidades
    $router->add(array(
        'name' => 'ocultarHabilidad',
        'path' => '/^\/ocultarhabilidad\/.*$/',
        'action' => [UserController::class, 'ocultarHabilidadAction'],
        'auth' => ['Usuario']
    ));


    $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $route = $router->match($request);
    if ($router) {
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];

        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo 'error';
    }
