<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\Usuarios;

    class IndexController extends BaseController {
        public function indexAction() {

            $claseUsuario = Usuarios::getInstancia();
            if (isset($_GET['q'])) {
                $usuarios = $claseUsuario->search($_GET['q']);
            } else {
                // Obtener todos los usuarios (por defecto
            $usuarios = $claseUsuario->getAll();
            }

            $data = ['usuarios' => $usuarios, 'auth' => isset($_SESSION['auth'])];
            $this->renderHTML('../views/index_view.php', $data);       
            

        }
    }