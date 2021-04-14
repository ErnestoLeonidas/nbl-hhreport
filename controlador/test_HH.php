<?php
    require_once '../conexion/conexion.php';
    
    session_start();
    
    $id_usuario = $_SESSION['usuario_activo'][0]['ID_USUARIO'];
    $nombre_activo = $_SESSION['usuario_activo'][0]['NOMBRE'];
    $area_activo = $_SESSION['usuario_activo'][0]['ID_AREA'];

        $conexion = new Conexion();
        $mes = date("m");
        $anio = date("Y");

        $consulta = $conexion->prepare('SELECT
        ACTIVIDAD.ID_ACTIVIDADES, 
        ACTIVIDAD.FECHA,
        lower(PROYECTO.NOMBRE_PROYECTO) as NOMBRE_PROYECTO,
        lower(ESPECIALIDAD.TIPO_ESPECIALIDAD) as TIPO_ESPECIALIDAD, 
        lower(ACTIVIDAD.DESCRIPCION_ACTIVIDAD) as DESCRIPCION_ACTIVIDAD, 
        ACTIVIDAD.HH_USADAS, 
        ACTIVIDAD.HH_EXTRAS,
        SOLICITO.NOMBRE as SOLICITO,
        PROYECTO.ID_PROYECTO as ID_PROYECTO
        FROM 
        PROYECTO, SOLICITO, ESPECIALIDAD, ACTIVIDAD 
        WHERE 
        ACTIVIDAD.ID_PROYECTO = PROYECTO.ID_PROYECTO AND 
        ACTIVIDAD.ID_SOLICITO = SOLICITO.ID_SOLICITO AND 
        ACTIVIDAD.ID_ESPECIALIDAD = ESPECIALIDAD.ID_ESPECIALIDAD AND 
        ACTIVIDAD.ID_USUARIO = :id_usuario AND 
        MONTH(ACTIVIDAD.FECHA) = :mes AND 
        YEAR(ACTIVIDAD.FECHA) = :anio 
        ORDER BY ACTIVIDAD.FECHA DESC');

        //$consulta = $conexion->prepare('SELECT ID_ACTIVIDADES, DESCRIPCION_ACTIVIDAD, FECHA, HH_USADAS, HH_EXTRAS, ID_USUARIO, ID_ESPECIALIDAD, ID_PROYECTO, ID_SOLICITO FROM ' . self::TABLA . ' WHERE ID_USUARIO = :id_usuario AND MONTH(FECHA) = :mes AND YEAR(FECHA) = :anio');
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->bindParam(':mes', $mes, PDO::PARAM_INT);
        $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        
        print_r(json_encode(array(
            'data' => $resultado
        )));

?>