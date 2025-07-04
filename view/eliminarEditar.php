<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar / Editar Libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Eliminar / Editar Libros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Páginas</th>
                <th>Año</th>
                <th>Género</th>
                <th>ID Autor</th>
                <th>ID Editorial</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once("../config/conexion.php"); // Incluir conexión

                $conexion = new Conexion(); // Crear objeto
                $db = $conexion->getConexion(); // Obtener conexión

                $sql = "SELECT * FROM libros"; // SQL para seleccionar todos
                $stmt = $db->prepare($sql);
                $stmt->execute(); // Ejecutar
                $libros = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos como array asociativo

                foreach ($libros as $libro) { // Recorrer cada libro
                    echo "<tr>";
                    echo "<td>{$libro['id_libros']}</td>";
                    echo "<td>{$libro['titulo']}</td>";
                    echo "<td>{$libro['precio']}</td>";
                    echo "<td>{$libro['paginas']}</td>";
                    echo "<td>{$libro['anio_publicacion']}</td>";
                    echo "<td>{$libro['genero']}</td>";
                    echo "<td>{$libro['id_autor']}</td>";
                    echo "<td>{$libro['id_editorial']}</td>";

                    // Columna eliminar
                    echo "<td>
                            <a href='../model/eliminar.php?id={$libro['id_libros']}' onclick='return confirm(\"¿Estás seguro de eliminar este libro?\")'>
                                <img src='../public/img/basura.png' alt='Eliminar' width='20'>
                            </a>
                        </td>";

                    // Columna editar
                    echo "<td>
                           <a href='../view/Veditar.php?id={$libro['id_libros']}' onclick='return confirm(\"¿Deseas editar este libro?\")'>
    <img src='../public/img/lapiz.png' alt='Editar' width='20'>
</a>


                        </td>";

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
