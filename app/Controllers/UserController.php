<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Models\Usuario;
    use App\Controllers\BaseController;

    class UserController extends BaseController{
        public function UserAction($request){
            $data = [];

            $parts = explode("/", $request);
            $id = end($parts);

            $usuario = Usuario::getInstancia();

            $data["profile"] = $_SESSION["profile"];
            $data["usuario"] = $usuario->get($id);

            $this->renderHTML("../views/user_view.php", $data);
        }

        public function EditAction() {
            if (isset($_POST)) {
                $usuario = Usuario::getInstancia();

                $usuario->setNombre($_POST["nombre"]);
                $usuario->setApellidos($_POST["apellidos"]);
                $usuario->setEmail($_POST["email"]);
                $usuario->setCategoriasProfesional($_POST["categorias_profesional"]);
                $usuario->setResumenPerfil($_POST["resumen_perfil"]);
                $usuario->setFoto($_POST["foto"]);
                $usuario->setVisible($_POST["visible"]);

                $usuario->edit($_SESSION["user"]["id"]);

                var_dump($usuario->getMessage());
                exit();
                
                header("Location: /user/" . $_SESSION["user"]["id"]);
            }
        }

        public function EditViewAction($request){
            $data = [];


            $data["profile"] = $_SESSION["profile"];
            $data["usuario"] = $_SESSION["user"];

            $this->renderHTML("../views/edit_view.php", $data);
        }
    }