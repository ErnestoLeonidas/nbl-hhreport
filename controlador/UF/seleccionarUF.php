<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    date_default_timezone_set('America/Santiago');
    
    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT VALORUF as valor FROM UF');
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
    $data = array('data' => $resultado );
    echo json_encode($resultado, true);  
?>