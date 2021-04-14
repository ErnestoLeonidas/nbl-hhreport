<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    $id_usuario = $_SESSION['idUsuario_Activo'];
    date_default_timezone_set('America/Santiago');
    $conexion = new Conexion();
    $mes = date("m");
    $anio = date("Y");
    $dia = date("d");

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT
    ifnull(sum(HH_USADAS), 0) as horas,
    ifnull(sum(HH_EXTRAS), 0) as extras
    FROM 
    ACTIVIDAD 
    WHERE 
    ID_USUARIO = :id_usuario AND 
    MONTH(FECHA) = :mes AND 
    YEAR(FECHA) = :anio AND
    DAY(FECHA) = :dia');

    $consulta->bindParam(':id_usuario', $id_usuario);
    $consulta->bindParam(':mes', $mes, PDO::PARAM_INT);
    $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);
    $consulta->bindParam(':dia', $dia, PDO::PARAM_INT);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );

    echo json_encode($resultado, true);
        
?>



