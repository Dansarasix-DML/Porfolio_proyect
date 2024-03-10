<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    namespace App\Controllers;
    
    class BaseController {
        public function renderHTML($flieName, $data = []){
            include $flieName;
        }

    }
    
?>