<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require_once "DBAbstractModel.php";

    class Proyecto extends DBAbstractModel {
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
        private $descripcion;
        private $logo;
        private $tecnologias;
        private $visible;
        private $created_at;
        private $updated_at;
        private $usuarios_id;

        public function setID($id){
            $this->id = $id;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setDescripcion($desc){
            $this->descripcion = $desc;
        }

        public function setLogo($logo){
            $this->logo = $logo;
        }

        public function setTecnologias($tecs){
            $this->tecnologias = $tecs;
        }

        public function setVisible($visible){
            $this->visible = $visible;
        }

        public function setUsuarioID($usuId){
            $this->usuarios_id = $usuId;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($id = ""){
            $this->query = "SELECT * FROM proyectos WHERE id=(:id)";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows;
        }

        function set() {
            $this->query = "INSERT INTO proyectos(titulo, tecnologias, usuarios_id) 
            VALUES(:titulo, :tecnologias, :usuarios_id)";
            //$this->parametros['id']= $id;
            $this->parametros['titulo'] = $this->titulo;
            $this->parametros['tecnologias'] = $this->tecnologias;
            $this->parametros['usuarios_id'] = $this->usuarios_id;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Proyecto agregado correctamente';
        }

        function edit() {
            
        }

        function delete() {
            
        }
    }

?>