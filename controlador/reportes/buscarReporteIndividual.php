<?php
    require_once '../../conexion/conexion.php';
    session_start();

    $mes = isset($_GET['mes']) ? $_GET['mes'] : null;
    $anio = isset($_GET['anio']) ? $_GET['anio'] : null;

    $inasistencia = 87;
    $vacaciones = 73;
    $array = array();

    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");
    $consulta = $conexion->prepare('SELECT
            ID_USUARIO AS id
            FROM ACTIVIDAD
            WHERE MONTH(FECHA) = :mes
                AND YEAR(FECHA) = :anio
            group BY ID_USUARIO');

    $consulta->bindParam(':mes', $mes, PDO::PARAM_INT);
    $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);
    $consulta->execute();
    $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    foreach($registros as $row){ 
        $user = $row['id'];

        $conexion = new Conexion();
        $conexion->query("SET NAMES 'UTF8'");
        $consulta = $conexion->prepare('SELECT
        concat(U.NOMBRE_USUARIO, " ", U.APELLIDO_USUARIO) AS usuario,
        SUM(A.HH_USADAS) AS hh,
        SUM(A.HH_EXTRAS) AS extra,
    
        (   SELECT
                count(ID_ESPECIALIDAD)
            FROM ACTIVIDAD
            WHERE ID_ESPECIALIDAD = :inasistencia 
                AND ID_USUARIO = :user
                AND MONTH(FECHA) = :mes
                AND YEAR(FECHA) = :anio
        ) AS inasistencia,
    
        (
            SELECT
                count(ID_ESPECIALIDAD)
            FROM ACTIVIDAD
            WHERE ID_ESPECIALIDAD = :vacaciones 
                AND ID_USUARIO = :user
                AND MONTH(FECHA) = :mes
                AND YEAR(FECHA) = :anio
        ) AS vacaciones
    
        FROM ACTIVIDAD A JOIN USUARIO U
        WHERE A.ID_USUARIO = U.ID_USUARIO
        AND A.ID_USUARIO = :user
        AND MONTH(A.FECHA) = :mes
        AND YEAR(A.FECHA) = :anio');
    
        $consulta->bindParam(':mes', $mes, PDO::PARAM_INT);
        $consulta->bindParam(':anio', $anio, PDO::PARAM_INT);
        $consulta->bindParam(':user', $user, PDO::PARAM_INT);
        $consulta->bindParam(':inasistencia', $inasistencia, PDO::PARAM_INT);
        $consulta->bindParam(':vacaciones', $vacaciones, PDO::PARAM_INT);
    
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;

        //print_r($resultado);

        $array[] = $resultado[0];

    }
    //print_r($array);

    $data = array('data' => $array );
    echo json_encode($data, true); 
    
?>