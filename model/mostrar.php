<?php
require_once("../config/conexion.php"); //requerir la conexion de la base

class Mostrar{
    private $conn; //la variable de conexion
    private $table_name = "libros"; //la tabla a la que se debe acceder

    public function __construct(){ //constructor
        $conexion= new Conexion();  //inicializar la conexion a la base
        $this->conn = $conexion->getConexion(); //obtener la conexion
    }
    public function getLibrosOrdenados($orden){
        $sql = "SELECT * FROM ". $this->table_name . " "; // nota: espacio agregado

        if($orden == "asc"){ 
            $sql .= "ORDER BY precio ASC"; // espacio agregado al inicio
        } elseif($orden === "desc"){ 
            $sql .= "ORDER BY precio DESC"; // espacio agregado al inicio
        }

        $stmt = $this->conn->prepare($sql); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
