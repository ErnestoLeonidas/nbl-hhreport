<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    $id = $_SESSION['idUsuario_Activo'];
    
    $conexion = new Conexion();

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT ID_USUARIO as id, CONCAT(NOMBRE_USUARIO, " ", APELLIDO_USUARIO) AS nombre, ID_AREA as idArea FROM USUARIO WHERE ID_USUARIO = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;
    
    $data = array('data' => $resultado );

    echo json_encode($resultado, true);  

?>