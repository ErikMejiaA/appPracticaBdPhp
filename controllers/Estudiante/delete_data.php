<?php 
    require_once '../../app.php';

    use Models\Estudiante;
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // El método de solicitud es GET
        $objEstudiante = new Estudiante();
        $objEstudiante -> deleteData($_GET['id']);
    } else {
        // El método de solicitud no es GET
        echo "La solicitud no se hizo utilizando el método GET";
    }
?>