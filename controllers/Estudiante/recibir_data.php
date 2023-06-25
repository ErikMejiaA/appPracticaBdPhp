<?php
    require_once '../../app.php';
    use Models\Estudiante;

    $_METHOD = $_SERVER["REQUEST_METHOD"];
    $_DATA = ($_METHOD=="POST" && count($_FILES)) ? array_merge($_POST,$_FILES): json_decode(file_get_contents("php://input"), true);
    $objEstudiante = new Estudiante();
    //echo json_encode($objEstudiante -> loadByIdData(intval($_DATA)));
    echo json_encode($objEstudiante -> loadEdadMDataMenores(intval($_DATA)));
?>