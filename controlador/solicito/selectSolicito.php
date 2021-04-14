<?php
    require_once '../../conexion/conexion.php';
    
    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT ID_SOLICITO AS id, NOMBRE AS Solicito, NOMBRE_COMPLETO AS Nombre FROM SOLICITO ORDER BY NOMBRE_COMPLETO');

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
    $data = array('data' => $resultado );

    echo json_encode($resultado, true);  

?>