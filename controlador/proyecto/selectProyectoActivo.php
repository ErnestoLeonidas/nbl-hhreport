<?php
    require_once '../../conexion/conexion.php';

    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT ID_PROYECTO as id, lower(NOMBRE_PROYECTO) as Proyecto FROM PROYECTO');

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );

    echo json_encode($resultado, true);  

?>