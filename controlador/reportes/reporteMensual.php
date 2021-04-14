<?php
    require_once '../../conexion/conexion.php';

    
    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");

    $consulta = $conexion->prepare('SELECT 
        A.FECHA AS fecha,
        L.NOMBRE_LOCALIDAD AS localidad,
        P.NOMBRE_PROYECTO AS proyecto,
        concat(U.NOMBRE_USUARIO, " ", U.APELLIDO_USUARIO) AS usuario,
        E.TIPO_ESPECIALIDAD AS especialidad,
        A.DESCRIPCION_ACTIVIDAD AS descripcion,
        S.NOMBRE_COMPLETO AS solicito,
        A.HH_USADAS AS hh,
        A.HH_EXTRAS AS extra,
        A.HH_USADAS + (A.HH_EXTRAS * 1.5) as "hh real",
        ROUND(U.FACTOR * (A.HH_USADAS + (A.HH_EXTRAS * 1.5)) * UF.VALORUF,2) as "valor individual",
        ROUND(U.FACTOR / UF.FACTORNBL * ((A.HH_USADAS) + (A.HH_EXTRAS) * 1.5),2) as "hh nbl" 
    FROM ACTIVIDAD A 
        JOIN PROYECTO P
        JOIN USUARIO U
        JOIN ESPECIALIDAD E
        JOIN SOLICITO S
        JOIN LOCALIDAD L
        JOIN UF
    WHERE A.ID_PROYECTO = P.ID_PROYECTO
        AND A.ID_USUARIO = U.ID_USUARIO
        AND A.ID_ESPECIALIDAD = E.ID_ESPECIALIDAD
        AND A.ID_SOLICITO = S.ID_SOLICITO
        AND P.ID_LOCALIDAD = L.ID_LOCALIDAD
        AND A.FECHA BETWEEN "2020-01-26" AND "2020-02-25"
        ');

    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $conexion = null;

    $data = array('data' => $resultado );
    echo json_encode($data, true);

?>