<?php
    require_once '../../conexion/conexion.php';
    session_start();

    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");
    
    $consulta = $conexion->prepare('SELECT 
        P.ID_PROYECTO as id, 
        P.NOMBRE_PROYECTO as Proyecto, 
        P.ESTADO as estado, 
        L.NOMBRE_LOCALIDAD as localidad,
        P.ID_LOCALIDAD as id_localidad 
    FROM 
        PROYECTO P JOIN LOCALIDAD L 
    ON P.ID_LOCALIDAD = L.ID_LOCALIDAD
    WHERE P.ID_LOCALIDAD = :id
    AND P.ESTADO = "ACTIVO"');

    $consulta->bindParam(':id', $id, PDO::PARAM_INT);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );

    echo json_encode($resultado, true);

?>