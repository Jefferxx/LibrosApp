<?php
//Conexión a la base de datos utilizando principios PDO
    class Conexion {
        private $host = "localhost";
        private $dbName= "librosinvform"; // nombre de la BD
        private $username = "root";
        private $password = "";
        public $conn; //atributo donde se guarda la conexion

        public function getConexion(){ // clase para obtener la conexion
            $this->conn = null; //declarar la conexion como nula
            try{
                $this-> conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName,
                $this->username,
                $this->password); //Ahora ya no es nula, ya se ha creado la conexion
            } catch(PDOException $exception){  //capturar excepcion en caso de haber error
                echo "Error de conexión: " .$exception->getMessage(); //mensaje de error
            }
            return $this->conn; //retornar la conexion
        }
    }
