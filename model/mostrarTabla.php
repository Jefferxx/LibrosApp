<?php
    require_once("../config/conexion.php");

    $conexion= new Conexion();
    $db= $conexion->getConexion();

    $sql= "SELECT * FROM libros";
    $stmt= $db->prepare($sql);
    $stmt->execute();
    $libros= $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($libros as $libro){
        echo "<tr>";
        echo "<td>{$libro['id_libros']}</td>";
        echo "<td>{$libro['titulo']}</td>";
        echo "<td>{$libro['precio']}</td>";
        echo "<td>{$libro['paginas']}</td>";
        echo "<td>{$libro['anio_publicacion']}</td>";
        echo "<td>{$libro['genero']}</td>";
        echo "<td>{$libro['id_autor']}</td>";
        echo "<td>{$libro['id_editorial']}</td>";
        echo "</tr>";
    }
