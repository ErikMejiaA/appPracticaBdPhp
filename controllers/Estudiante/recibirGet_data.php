<?php 
    include_once '../../app.php';

    use Models\Estudiante;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // El método de solicitud es GET
        $objEstudiante = new Estudiante();
        //echo json_encode($objEstudiante -> loadByIdData($_GET['id']));
        echo json_encode($objEstudiante -> loadEdadMDataMayores($_GET['edad']));

    } else {
        // El método de solicitud es GET
        echo "La solicitud se hizo utilizando el método GET";
    }
?>