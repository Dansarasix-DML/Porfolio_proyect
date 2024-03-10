<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require_once "DBAbstractModel.php";

    class CategoriaSkill extends DBAbstractModel{
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

        private $categoria;

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($categoria = "") {
            $this->query = "SELECT * FROM categorias_skills WHERE categoria=(:categoria)";
            $this->parametros['categoria'] = $categoria;
            $this->get_results_from_query();
            return $this->rows;
        }

        function set() {
            $this->query = "INSERT INTO categorias_skills(categoria) VALUES(:categoria)";
            //$this->parametros['id']= $id;
            $this->parametros['categoria'] = $this->categoria;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Categoria agregada correctamente';
        }

        function edit() {
            
        }

        function delete() {
            
        }
    }


?>