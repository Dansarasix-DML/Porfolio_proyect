<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Models\Usuario;
    
    class AuthController {
        public function LoginAction(){
            if (isset($_POST)) {
                $email = $_POST["email"];
                $passwd = $_POST["password"];

                $user = Usuario::getInstancia();
                $auth = $user->getByCredentials($email, $passwd);

                if ($auth) {
                    $_SESSION["profile"] = "Usuario";
                    $_SESSION["user"] = $auth;
                }


            }

            header("Location: http://cvcraft.com/");
            
        }

        public function LogoutAction() {

            session_unset();

            session_destroy();

            header("Location: http://cvcraft.com/");
            
        }
    }