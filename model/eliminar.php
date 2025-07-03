<?php
    require_once("../config/conexion.php"); //Enlazar la conexion

    if(isset($_GET['id'])){ //Validar si se recibe el id por GET
        $id= $_GET['id']; //guardar el ide
        $conexion= new Conexion(); //crear el objeto conexion
        $db = $conexion->getConexion(); //obtener la coneción
        
        //SQL para eliminar
        $sql = "DELETE from libros WHERE id_libros= ?";
        $stmt = $db->prepare($sql); //preparar la sentencia resibiendo la consulta
        $stmt->execute([$id]); //Ejecutar la consulta con el id (pk)

        echo "Libro eliminado correctamente. <a href='../controller/opciones.php?opc=4'>Volver</a>";
    }else{
            echo "ID no recibido";
    }