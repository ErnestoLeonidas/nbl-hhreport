<?php
    require_once '../../conexion/conexion.php';

    $id_actividad = $_POST['actividad'];
    date_default_timezone_set('America/Santiago');

    $conexion = new Conexion();
    $mes = date("m");
    $anio = date("Y");
 
    $consulta = $conexion->prepare('DELETE FROM ACTIVIDAD WHERE ID_ACTIVIDADES = :id'); 
    $consulta->bindParam(':id', $id_actividad);
    $consulta->execute(); 
    $conexion = null; 
    
    echo "ELIMINACION EXITOSA";

?>



