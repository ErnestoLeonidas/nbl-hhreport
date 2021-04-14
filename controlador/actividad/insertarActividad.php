<?php
    require_once '../../conexion/conexion.php';
    session_start();
    //viene desde sesionActiva.php
    $id_usuario = $_SESSION['idUsuario_Activo'];

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
    $consulta = $conexion->prepare('INSERT INTO ACTIVIDAD (DESCRIPCION_ACTIVIDAD, FECHA, HH_USADAS, HH_EXTRAS, ID_USUARIO, ID_ESPECIALIDAD, ID_PROYECTO, ID_SOLICITO) VALUES(utf(:descripcion), :fecha, :hh_usadas, :hh_extras, :id_usuario, :id_especialidad, :id_proyecto, :id_solicito)');
    $consulta->bindParam(':descripcion', $descripcion);
    $consulta->bindParam(':fecha', $fecha);
    $consulta->bindParam(':hh_usadas', $hh_usadas);
    $consulta->bindParam(':hh_extras', $hh_extras);
    $consulta->bindParam(':id_usuario', $id_usuario);
    $consulta->bindParam(':id_especialidad', $id_especialidad);
    $consulta->bindParam(':id_proyecto', $id_proyecto);
    $consulta->bindParam(':id_solicito', $id_solicito);
    $consulta->execute();
    $conexion->lastInsertId();   
    $conexion = null; 

    echo "CARGA EXITOSA";
?>



