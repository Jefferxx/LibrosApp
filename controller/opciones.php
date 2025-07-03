<?php
    $opcion=$_GET['opc'];
    switch($opcion){
        case 1:
            include("../view/ingreso.html");
            break;
        case 2:
            include("../view/mostrar.html");
            break;
        case 3:
            include("../view/buscar.html");
            break;
        case 4:
            include("../view/eliminarEditar.php");
            break;
        case 5:
            include("../view/reportes.html");
            break;
        default:
            echo "Opción no válida";
    }
?>