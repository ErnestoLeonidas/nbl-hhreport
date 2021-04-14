<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    $id = $_SESSION['idArea_Activo'];

    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT E.ID_ESPECIALIDAD AS id, lower(E.TIPO_ESPECIALIDAD) AS Especialidad FROM ESPECIALIDAD E, AREA_ESPECIALIDAD A WHERE E.ID_ESPECIALIDAD = A.ID_ESPECIALIDAD AND A.ID_AREA = :id');
    $consulta->bindParam(':id', $id);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
    $data = array('data' => $resultado );

    echo json_encode($resultado, true);  

?>