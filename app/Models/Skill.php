<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require_once "DBAbstractModel.php";

    class Skill extends DBAbstractModel{
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
        private $habilidades;
        private $visible;
        private $created_at;
        private $updated_at;
        private $categoria;
        private $usuarioID;


        public function setID($id){
            $this->id = $id;
        }

        public function setHabilidades($habs){
            $this->habilidades = $habs;
        }

        public function setVisible($visible){
            $this->visible = $visible;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function setUsuarioID($usuID){
            $this->usuarioID = $usuID;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($id = "") {
            $this->query = "SELECT * FROM skills WHERE id=(:id)";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows;
        }

        function set() {
            $this->query = "INSERT INTO skills(habilidades, categorias_skills_categoria, usuarios_id) 
            VALUES(:habs, :categoria, :usuID)";
            //$this->parametros['id']= $id;
            $this->parametros['habs'] = $this->habilidades;
            $this->parametros['categoria'] = $this->categoria;
            $this->parametros['usuID'] = $this->usuarioID;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Skills agregadas correctamente';
        }

        function edit() {
            
        }

        function delete() {
            
        }

    }


?>