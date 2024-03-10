<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require "../bootstrap.php";

    use App\Core\Router;
    use App\Controllers\IndexController;
    use App\Controllers\AuthController;
    use App\Controllers\UserController;

    session_start();

    if (!isset($_SESSION["profile"])){
        $_SESSION["profile"] = "Invitado";
    }

    // echo "HOLA MUNDO";

    $router = new Router();

    $router->add(array(
        "name"=>"home",
        "path"=>"/^\/$/",
        "action"=>array(IndexController::Class, "IndexAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"login",
        "path"=>"/^\/login$/",
        "action"=>array(AuthController::Class, "LoginAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"logout",
        "path"=>"/^\/logout$/",
        "action"=>array(AuthController::Class, "LogoutAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"user",
        "path"=>"/^\/user\/(\d+)$/",
        "action"=>array(UserController::Class, "UserAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"editView",
        "path"=>"/^\/edit$/",
        "action"=>array(UserController::Class, "EditViewAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"editNow",
        "path"=>"/^\/editNow$/",
        "action"=>array(UserController::Class, "EditAction"),
        "auth"=>array("Usuario")
    ));
        
    //Comprobamos ruta válida
    $request = $_SERVER['REQUEST_URI'];

    $route=$router->match($request);

    if($route) {
        if (in_array($_SESSION["profile"], $route["auth"])) {
            $controllerName = $route["action"][0];
            $actionName = $route["action"][1];
            $controller = new $controllerName;
            $controller->$actionName($request);
        } else {
            echo "NO AUTORIZADO";
        }
    } else {
        echo "No route";
    }

