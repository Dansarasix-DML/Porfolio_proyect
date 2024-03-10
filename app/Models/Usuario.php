<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    // require_once "DBAbstractModel.php";
    
    namespace App\Models;
    include "../lib/funciones.php";

    class Usuario extends DBAbstractModel{
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
        private $nombre;
        private $apellidos;
        private $foto;
        private $categorias_profesional;
        private $email;
        private $resumen_perfil;
        private $password;
        private $visible;
        private $created_at;
        private $updated_at;
        private $token;
        private $fecha_creacion_token;
        private $cuenta_activa;

        
        public function setID($id){
            $this->id = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellidos($apellidos){
            $this->apellidos = (isset($apellidos)) ? $apellidos : null;
        }

        public function setFoto($foto){
            $this->foto = (isset($foto)) ? $foto : null;
        }

        public function setCategoriasProfesional($catsProf){
            $this->categorias_profesional = (isset($catsProf)) ? $catsProf : null;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setResumenPerfil($resumen){
            $this->resumen_perfil = (isset($resumen)) ? $resumen : null;
        }

        public function setPassword($passwd){
            $this->password = $passwd;
        }

        public function setVisible($visible){
            $this->visible = (isset($visible)) ? $visible : 0;
        }

        public function setToken($token){
            $this->token = $token;
        }

        public function setActiva($activa){
            $this->cuenta_activa = $activa;
        }

        public function getMessage(){
            return $this->mensaje;
        }

        function get($id = "") {
            $this->query = "SELECT * FROM usuarios WHERE id=(:id)";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows[0];
        }

        public function getAll(){
            $this->query = "SELECT * FROM usuarios";

            $this->get_results_from_query();

            // Verificamos si hay resultados.
            if (count($this->rows) > 0) {
                // Si hay al menos un resultado, asignamos los valores al objeto actual.
                foreach ($this->rows as $indice => $fila) {
                    // Aquí, $fila representa un registro en forma de array asociativo.
                    foreach ($fila as $propiedad => $valor) {
                        $this->$propiedad = $valor;
                    }
                }
                $this->mensaje = 'Registros encontrados';
            } else {
                $this->mensaje = 'No se encontraron registros';
            }

            // Devolvemos los registros (puede ser un array de registros o null si no hay registros).
            return $this->rows ?? null;
        }

        function set($data = []) {
            foreach ($data as $campo=>$valor) {
                $$campo = $valor;                
            }
            
            $this->query = "INSERT INTO INSERT INTO usuarios (nombre, apellidos, password, email, 
            categoria_profesional, resumen_perfil, visible, token, fecha_creacion_token, cuenta_activa) 
            VALUES (:nombre, :apellidos, :password, :email, :categoria_profesional, 
            :resumen_perfil, :visible, :token, :fecha_creacion_token, :cuenta_activa)";

            $this->parametros['nombre'] = $nombre;
            $this->parametros['apellidos'] = $apellidos;
            $this->parametros['password'] = $password;
            $this->parametros['email'] = $email;
            $this->parametros['categorias_profesional'] = $categoria_profesional;
            $this->parametros['resumen_perfil'] = $resumen_perfil;
            $this->parametros['visible'] = 1;
            $this->parametros['fecha_creacion_token'] = new \DateTime();
            $this->parametros['cuenta_activa'] = 1;
            $this->parametros['token'] = generarToken();

            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Usuario agregado correctamente';
        }

        function edit($id="", $user_data = []) {
            $fecha = new \DateTime();
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
                
            }
            $this->query = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, 
            categoria_profesional = :categoria_profesional, resumen_perfil = :resumen_perfil, 
            foto = :foto, visible = :visible WHERE id = :id";

            $this->parametros['nombre'] = $nombre;
            $this->parametros['foto'] = $foto;
            $this->parametros['apellidos'] = $apellidos;
            $this->parametros['categorias_profesional'] = $categoria_profesional;
            $this->parametros['resumen_perfil'] = $resumen_perfil;
            $this->parametros['visible'] = $visible;
            $this->parametros['fecha'] = date("Y-m-d H:m:s", $fecha->getTimestamp());
            $this->get_results_from_query();
            $this->mensaje = 'Usuario modificado correctamente';
        }

        function delete($id="") {
            $this->query = "DELETE FROM usuarios
            WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado correctamente';
        }

        function getByCredentials($email, $password){
            $this->query = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
            $this->parametros['email'] = $email;
            $this->parametros['password'] = $password;
            $this->get_results_from_query();
            return $this->rows[0];
        }
    }


?>