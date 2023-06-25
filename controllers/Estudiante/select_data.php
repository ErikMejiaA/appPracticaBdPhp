<?php 
    require_once '../../app.php';
    
    use Models\Estudiante;  
    $objEstudiante =new Estudiante();
    echo json_encode($objEstudiante -> loadAllData()); 
?>