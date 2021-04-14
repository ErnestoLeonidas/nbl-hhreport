<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    $id_usuario = $_SESSION['idUsuario_Activo'];

    $id_actividad = $_POST['actividad'];
    
    $id_proyecto = $_POST['proyecto'];
    $id_solicito = $_POST['solicito'];
    $id_especialidad = $_POST['especialidad'];

    $fecha = $_POST['date'];
    $hh_usadas = $_POST['hh'];
    $hh_extras = $_POST['hhe'];
    
    $descripcion = $_POST['descripcion'];

    $conexion = new Conexion();
    $mes = date("m");
    $anio = date("Y");

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('UPDATE ACTIVIDAD SET DESCRIPCION_ACTIVIDAD = utf(:descripcion), FECHA = :fecha, HH_USADAS = :hh_usadas, HH_EXTRAS= :hh_extras, ID_USUARIO = :id_usuario, ID_ESPECIALIDAD = :id_especialidad, ID_PROYECTO = :id_proyecto, ID_SOLICITO = :id_solicito WHERE ID_ACTIVIDADES = :id');
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':fecha', $fecha);
    $consulta->bindParam(':hh_usadas', $hh_usadas);
    $consulta->bindParam(':hh_extras', $hh_extras);
    $consulta->bindParam(':id_usuario', $id_usuario);
    $consulta->bindParam(':id_especialidad', $id_especialidad);
    $consulta->bindParam(':id_proyecto', $id_proyecto);
    $consulta->bindParam(':id_solicito', $id_solicito);
    $consulta->bindParam(':id', $id_actividad);
    $consulta->execute(); 
    $conexion = null; 
    
    echo "MODIFICACION EXITOSA";


?>



