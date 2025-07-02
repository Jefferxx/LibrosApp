<?php
require_once("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $paginas = $_POST['paginas'];
    $anio = $_POST['anio_publicacion'];
    $genero = $_POST['genero'];
    $id_autor = $_POST['id_autor'];
    $id_editorial = $_POST['id_editorial'];

    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $sql = "INSERT INTO libros (titulo, precio, paginas, anio_publicacion, genero, id_autor, id_editorial) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([$titulo, $precio, $paginas, $anio, $genero, $id_autor, $id_editorial]);

    echo "Libro agregado correctamente. <a href='../view/index.html'>Volver al inicio</a>";
}
?>
