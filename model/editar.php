<?php
    require_once("../config/conexion.php");
    if(isset($_POST['id'])){ //verificar si se recibe el id por post
        $id=$_POST['id']; //Empezamos a guardar campos
        $titulo=$_POST['titulo'];
        $precio=$_POST['precio'];
        $paginas=$_POST['paginas'];
        $anio=$_POST['anio_publicacion'];
        $genero=$_POST['genero'];
        $id_autor=$_POST['id_autor'];
        $id_editorial=$_POST['id_editorial'];

        $conexion = new Conexion(); //Crear elemento conexion
        $db = $conexion->getConexion();

        //SQL para actualizar el libro
        $sql="UPDATE libros SET titulo=?,precio=?,paginas=?,anio_publicacion=?,genero=?,id_autor=?,id_editorial=?  WHERE id_libros=?";
        $stmt= $db->prepare($sql); //Preparar la sentencia
        $stmt->execute([$titulo, $precio, $paginas, $anio, $genero, $id_autor, $id_editorial, $id]); //Ejecutar la sentencia
        
        echo "Libro editado correctamente. <a href='../controller/opciones.php?opc=4'>Volver</a>";
    } else{
        echo "Datos no recibidos/incompletos";
    }