<?php
    require_once '../../conexion/conexion.php';
    session_start();

    $mesReporteMensual = isset($_GET['mes']) ? $_GET['mes'] : null;
    $anioReporteMensual = isset($_GET['anio']) ? $_GET['anio'] : null;
    
    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");

    $consulta = $conexion->prepare(
        'SELECT 
        L.NOMBRE_LOCALIDAD AS localidad,
        P.NOMBRE_PROYECTO AS proyecto,
        concat(U.NOMBRE_USUARIO, " ", U.APELLIDO_USUARIO) AS usuario,
        sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as "hh"
    FROM ACTIVIDAD A 
        JOIN PROYECTO P
        JOIN USUARIO U
        JOIN LOCALIDAD L
        JOIN UF
    WHERE A.ID_PROYECTO = P.ID_PROYECTO
        AND A.ID_USUARIO = U.ID_USUARIO
        AND P.ID_LOCALIDAD = L.ID_LOCALIDAD
        AND A.FECHA BETWEEN :mes AND :anio
    GROUP BY
		P.NOMBRE_PROYECTO, usuario
	ORDER BY P.NOMBRE_PROYECTO
        ');


    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );

    echo json_encode($data, true); 

?>

