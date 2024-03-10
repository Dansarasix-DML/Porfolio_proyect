<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\Usuarios;

    class AuthController extends BaseController{
        public function loginAction() {
            $nombre = $_POST['nombre'] ?? null;
            $password = $_POST['password'] ?? null;
            $claseUsuario = Usuarios::getInstancia();
            $claseUsuario->login($nombre, $password);
            if (isset($_POST['submit'])) {
                if ($claseUsuario->getMensaje() != 'Usuario no encontrado o con cuenta sin activar. Por favor, revisa tu email y activa tu cuenta.') {
                    echo "<h2>Bienvenido " . $claseUsuario->nombre . "</h2>";
                    $_SESSION['auth'] = true;
                    $_SESSION['usuario'] = $claseUsuario->nombre;

                    $_SESSION['tipo'] = 'Usuario';
                    header('Location: /');
                } else {
                    echo "<h2>" . $claseUsuario->getMensaje() . "</h2>";
                }
            } else {
                $this->renderHTML('../views/login_view.php');
            }
        }

        public function cerrarSesionAction() {
            session_unset();
            session_destroy();
            header('Location: /');
        }

        public function registrarAction() {
            $rb = random_bytes(32);
            $token = base64_encode($rb);
            $secureToken = str_replace('/', '', uniqid('', true) . $token);

            $fecha_creacion_token = date('Y-m-d H:i:s');
            $nombre = $_POST['nombre'] ?? null;
            $apellidos = $_POST['apellidos'] ?? null;
            $password = $_POST['password'] ?? null;
            $email = $_POST['email'] ?? null;
            $categoria_profesional = $_POST['categoria_profesional'] ?? null;
            $resumen_perfil = $_POST['resumen_perfil'] ?? null;
            $claseUsuario = Usuarios::getInstancia();
            if (isset($_POST['submit'])) {
                $claseUsuario->registrar($nombre, $apellidos, $password, $email, $categoria_profesional, $resumen_perfil, $secureToken, $fecha_creacion_token);
                if ($claseUsuario->getMensaje() == 'Usuario registrado') {
                    echo "<h2>" . $claseUsuario->getMensaje() . "</h2>";
                    header('Location: /');
                } else {
                    echo "<h2>" . $claseUsuario->getMensaje() . "</h2>";
                }
            } else {
                $this->renderHTML('../views/registrar_view.php');
            }
        }
        public function verificarAction() {
            $token = explode('/', $_SERVER['REQUEST_URI'])[2];
            $claseUsuario = Usuarios::getInstancia();
            $claseUsuario->verificarToken($token);
            if ($claseUsuario->getMensaje() == 'Usuario verificado') {
                echo "<h2>" . $claseUsuario->getMensaje() . "</h2>";
                $_SESSION['auth'] = true;
                $_SESSION['usuario'] = $claseUsuario->nombre;
                $_SESSION['tipo'] = 'Usuario';
                header('Location: /');
            } else {
                echo "<h2>" . $claseUsuario->getMensaje() . "</h2>";
            }
        }
    }