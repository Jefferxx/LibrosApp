<?php
    require_once("../model/mostrarInicio.php");

    $orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc'; //recibir el parámetro

    //instanciar el modelo
    $mostrar = new Mostrar();
    $libros = $mostrar->getLibrosOrdenados($orden);

    //crear archivo JSON
    file_put_contents("libros.json", json_encode($libros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    //devolver el JSON como respuesta directa
    header('Content-Type: application/json');
    echo json_encode($libros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
