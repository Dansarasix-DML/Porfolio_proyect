<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require_once "DBAbstractModel.php";
    
    class RedSocial extends DBAbstractModel{
        private static $instancia;
        public static function getInstancia(){
            if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                return self::$instancia = new $miclase;
            }
            return self::$instancia;
        }
        public function __clone(){
            trigger_error("CLONACIÓN NO PERMITIDA", E_USER_ERROR);
        }

        private $id;
        private $titulo;
        private $url;
        private $created_at;
        private $updated_at;
        private $usuario_id;

        public function setID($id){
            $this->id = $id;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setURL($url){
            $this->url = $url;
        }

        public function setUsuarioID($usuID){
            $this->usuario_id = $usuID;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($id = "") {
            $this->query = "SELECT * FROM redes_sociales WHERE id=(:id)";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows;
        }

        function set() {
            $this->query = "INSERT INTO redes_sociales(redes_socialescol, url, usuarios_id) VALUES(:titulo, :url, :usuID)";
            //$this->parametros['id']= $id;
            $this->parametros['titulo'] = $this->titulo;
            $this->parametros['url'] = $this->url;
            $this->parametros['usuID'] = $this->usuario_id;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Red social agregado correctamente';
        }

        function edit() {
            
        }

        function delete() {
            
        }

    }

?>