<?php
    namespace Models;
    class Estudiante {

        //definimos las variables 
        protected static $conn;
        protected static $columnsTbl = ['id_estudiante', 'nombre', 'direccion', 'edad', 'logros', 'detalle'];
        private $id_estudiante;
        private $nombre;
        private $direccion;
        private $edad;
        private $logros;
        private $detalle;

        public function __construct($args = [])
        {
            $this -> id_estudiante = $args['id_estudiante'] ?? '';
            $this -> nombre = $args['nombre'] ?? '';
            $this -> direccion = $args['direccion'] ?? '';
            $this -> edad = $args['edad'] ?? '';
            $this -> logros = $args['logros'] ?? '';
            $this -> detalle = $args['detalle'] ?? '';
        }

        //definimos la funcion para guardarlos en la base de datos (insertar datos)
        public function saveData($data) {

            $delimiter = ":";
            $dataBd = $this -> sanitizarAttributos();
            $valorCols = $delimiter . join(',:', array_keys($data));
            $cols = join(',', array_keys($data));
            $sql = "INSERT INTO estudiantes ($cols) VALUES ($valorCols)";
            $stmt = self :: $conn -> prepare($sql);
            
            try {
                $stmt -> execute($data);
                $response = [[
                    'id_estudiante' => self :: $conn -> lastInsertId(), //permite obtener el ultimo Id que se a insertado (por se auto-incremental)
                    'nombre' => $data['nombre'],
                    'direccion' => $data['direccion'],
                    'edad' => $data['edad'],
                    'logros' => $data['logros'],
                    'detalle' => $data['detalle']
                ]]; 

            } catch (\PDOException $e) {
                return $sql . "<br/>" . $e -> getMessage();
            }
            return $response; 
        }

        //para traer los datos del la base de datos para verla en el HTML
        public function loadAllData() {
            $sql = "SELECT id_estudiante, nombre, direccion, edad, logros, detalle FROM estudiantes";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $miSgav = $stmt -> fetchAll(\PDO :: FETCH_ASSOC);
            return $miSgav;
        }

        //funcion para traer datos de la base de datos poa id
        public function loadByIdData($id)
         {
            $sql = "SELECT id_estudiante, nombre, direccion, edad, logros, detalle FROM estudiantes WHERE id_estudiante = $id";
            $stmt = self::$conn->prepare($sql);
            $stmt->execute();
            $miSgav = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $miSgav;
        }

        //Funcion para buscar por mayores de edad
        public function loadEdadMDataMayores($edadMa) 
        {
            $sql = "SELECT id_estudiante, nombre, direccion, edad, logros, detalle FROM estudiantes WHERE edad >= $edadMa";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $mySgav = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
            return $mySgav;
        }

        //funcion para buscar por menores de edad
        public function loadEdadMDataMenores($edadMe) 
        {
            $sql = "SELECT id_estudiante, nombre, direccion, edad, logros, detalle FROM estudiantes WHERE edad < $edadMe";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> execute();
            $mySgav = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
            return $mySgav;
        }

        //funcion para borrar datos de la base de datos
        public function deleteData($id) {
            $sql = "DELETE FROM estudiantes WHERE id_estudiante = :id";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':id', $id);
            $stmt -> execute();
        }

        //funcion para editar los datos de la base de datos 
        public function updateData($data) {
            $sql = "UPDATE estudiantes SET nombre = :nombre, direccion = :direccion, edad = :edad, logros = :logros, detalle = :detalle WHERE id_estudiante = :id_estudiante";
            $stmt = self :: $conn -> prepare($sql);
            $stmt -> bindParam(':nombre', $data['nombre']);
            $stmt -> bindParam(':direccion', $data['direccion']);
            $stmt -> bindParam(':edad', $data['edad']);
            $stmt -> bindParam(':logros', $data['logros']);
            $stmt -> bindParam(':detalle', $data['detalle']);

            $stmt -> bindParam(':id_estudiante', $data['id_estudiante']);
            $stmt -> execute();
        }

        //acontinuacion se escribe la funcion de sanitizacion
        //para prevenir inyesion de cosigo SQL y caracteres especiales 
        public static function setConn($connBd) {
            self :: $conn = $connBd;
        }
        
        public function atributos(){
            $atributos = [];
            foreach (self::$columnsTbl as $columna){
                if($columna === 'id_estudiante') continue;
                $atributos [$columna]=$this->$columna;
             }
             return $atributos;
        }

        public function sanitizarAttributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$conn->quote($value);
            }
            return $sanitizado;
        }

    }

?>