<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    date_default_timezone_set('America/Santiago');

    //$nuevaUF = isset($_GET['nuevaUF']) ? $_GET['nuevaUF'] : null;

    $nuevaUF = $_POST['nuevaUF'];
    
    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('UPDATE UF SET VALORUF = :nuevaUF WHERE ID_UF = 1');
    $consulta->bindParam(':nuevaUF', $nuevaUF);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
?>