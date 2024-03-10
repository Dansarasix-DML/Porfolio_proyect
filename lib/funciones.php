<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    function generarToken() {
        $rb = random_bytes(32);
        $token = base64_encode($rb);
        $secureToken = uniqid("",true) . $token;
        return $secureToken;
    }

?>