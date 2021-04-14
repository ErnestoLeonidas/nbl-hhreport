<?php
    require_once '../../conexion/conexion.php';
    
    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");

    $consulta = $conexion->prepare('SELECT 
        ID_LOCALIDAD as id, 
        NOMBRE_LOCALIDAD as Localidad 
    FROM 
        LOCALIDAD 
    ORDER BY NOMBRE_LOCALIDAD');

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
    $data = array('data' => $resultado );

    echo json_encode($resultado, true);
?>