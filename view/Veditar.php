<?php
require_once("../config/conexion.php"); // Incluir conexión

if (isset($_GET['id'])) { // Verificar si recibe id por GET
    $id = $_GET['id'];

    $conexion = new Conexion();
    $db = $conexion->getConexion();

    $sql = "SELECT * FROM libros WHERE id_libros = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $libro = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Editar Libro</h1>
    <form method="POST" action="../model/editar.php">
        <input type="hidden" name="id" value="<?php echo $libro['id_libros']; ?>">
        <input type="text" name="titulo" value="<?php echo $libro['titulo']; ?>" required><br>
        <input type="number" name="precio" value="<?php echo $libro['precio']; ?>" required><br>
        <input type="number" name="paginas" value="<?php echo $libro['paginas']; ?>" required><br>
        <input type="number" name="anio_publicacion" value="<?php echo $libro['anio_publicacion']; ?>"><br>
        <input type="text" name="genero" value="<?php echo $libro['genero']; ?>"><br>
        <input type="number" name="id_autor" value="<?php echo $libro['id_autor']; ?>" required><br>
        <input type="number" name="id_editorial" value="<?php echo $libro['id_editorial']; ?>" required><br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
