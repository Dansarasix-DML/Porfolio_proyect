<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require_once "DBAbstractModel.php";

    class Trabajo extends DBAbstractModel{
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
        private $fechaInicio;
        private $fechaFin;
        private $logros;
        private $visible;
        private $created_at;
        private $updated_at;
        private $usuarioID;

        public function setID($id){
            $this->id = $id;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setDescripcion($descp){
            $this->descripcion = $descp;
            // if (isset($descp)) {
            //     $this->descripcion = $descp;
            // } else {
            //     $this->descripcion = null;
            // }
        }

        public function setFechaInicio($fechaInit){
            $this->fechaInicio = $fechaInit;
        }

        public function setFechaFin($fechaFin){
            $this->fechaFin = $fechaFin;
        }

        public function setlogros($logros){
            $this->logros = $logros;
        }

        public function setVisible($visible){
            $this->visible = $visible;
        }

        public function setUsuarioID($usuID){
            $this->usuarioID = $usuID;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($id = "") {
            $this->query = "SELECT * FROM usuarios WHERE id=(:id)";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows;
        }

        function set() {
            $this->query = "INSERT INTO trabajos(titulo, descripcion, fecha_inicio, 
            fecha_final, logros, usuarios_id) VALUES(:titulo, :descp, :fechaInit, :fechaFin,
            :logros, :usuID)";
            //$this->parametros['id']= $id;
            $this->parametros['titulo'] = $this->titulo;
            $this->parametros['descp'] = $this->descripcion;
            $this->parametros['fechaInit'] = $this->fechaInicio;
            $this->parametros['fechaFin'] = $this->fechaFin;
            $this->parametros['logros'] = $this->logros;
            $this->parametros['usuID'] = $this->usuarioID;
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Trabajo agregado correctamente';
        }

        function edit() {
            
        }

        function delete() {
            
        }
    }

?>