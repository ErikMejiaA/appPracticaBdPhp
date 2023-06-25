<?php
    require_once 'vendor/autoload.php';
    use App\Database;
    use Models\Estudiante;

    $db = new Database();
    $Conn = $db -> getConnection('mysql');//conexion con mysql
    //asiganmos una conexion activa para todos los modelos que se crearon 
    Estudiante :: setConn($Conn);
?>