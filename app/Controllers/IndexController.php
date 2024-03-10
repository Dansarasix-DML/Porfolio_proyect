<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    use App\Models\Usuario;
    use App\Controllers\BaseController;

    class IndexController extends BaseController{
        public function IndexAction(){
            $data = [];

            $data["profile"] = $_SESSION["profile"];
            $data["usuarios"] = Usuario::getInstancia()->getAll();

            $this->renderHTML("../views/index_view.php", $data);
        }
    }