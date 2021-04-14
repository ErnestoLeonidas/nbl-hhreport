<?php
    require_once '../../conexion/conexion.php';
    
    session_start();
    date_default_timezone_set('America/Santiago');
    //viene desde sesionActiva.php
    $id_usuario = $_SESSION['idUsuario_Activo'];

    $conexion = new Conexion();
    $mes = date("m");
    $anio = date("Y");

    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT
    ACTIVIDAD.ID_ACTIVIDADES as id, 
    ACTIVIDAD.FECHA as Fecha,
    lower(PROYECTO.NOMBRE_PROYECTO) as Proyecto,
    lower(ESPECIALIDAD.TIPO_ESPECIALIDAD) as Especialidad, 
    lower(utf(ACTIVIDAD.DESCRIPCION_ACTIVIDAD)) as Descripcion, 
    ACTIVIDAD.HH_USADAS as HH, 
    ACTIVIDAD.HH_EXTRAS as Ex,
    SOLICITO.NOMBRE as Solicito,
    PROYECTO.ID_PROYECTO as idProyecto,
    ACTIVIDAD.ID_SOLICITO as idSolicito,
    ACTIVIDAD.ID_ESPECIALIDAD AS idEspecialidad,
    PROYECTO.ID_LOCALIDAD as idLocalidad
    FROM 
    PROYECTO, SOLICITO, ESPECIALIDAD, ACTIVIDAD 
    WHERE 
    ACTIVIDAD.ID_PROYECTO = PROYECTO.ID_PROYECTO AND 
    ACTIVIDAD.ID_SOLICITO = SOLICITO.ID_SOLICITO AND 
    ACTIVIDAD.ID_ESPECIALIDAD = ESPECIALIDAD.ID_ESPECIALIDAD AND 
    ACTIVIDAD.ID_USUARIO = :id_usuario AND 
    week(ACTIVIDAD.FECHA) = (SELECT WEEK(curdate())) AND 
    YEAR(ACTIVIDAD.FECHA) = :anio  
    ORDER BY ACTIVIDAD.FECHA DESC');

    //$consulta = $conexion->prepare('SELECT ID_ACTIVIDADES, DESCRIPCION_ACTIVIDAD, FECHA, HH_USADAS, HH_EXTRAS, ID_USUARIO, ID_ESPECIALIDAD, ID_PROYECTO, ID_SOLICITO FROM ' . self::TABLA . ' WHERE ID_USUARIO = :id_usuario AND MONTH(FECHA) = :mes AND YEAR(FECHA) = :anio');
    $consulta->bindParam(':id_usuario', $id_usuario);
    $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );

    echo json_encode($data, true);
        
?>



