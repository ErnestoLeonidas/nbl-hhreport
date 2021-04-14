<?php
    require_once '../../conexion/conexion.php';
    session_start();

    $mesReporteMensual = isset($_GET['mes']) ? $_GET['mes'] : null;
    $anioReporteMensual = isset($_GET['anio']) ? $_GET['anio'] : null;
    
    $conexion = new Conexion();
    $conexion->query("SET NAMES 'UTF8'");


    /* LISTADO DE PROYECTOS */    
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
        ;');
    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $listadoProyectos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* CRO */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as CRO
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 9
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoCRO = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* JAM */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as JAM
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 10
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoJAM = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* EVV */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as EVV
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 12
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoEVV = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* PNO */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as PNO
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 13
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoPNO = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* MAX */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as MAX
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 23
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoMAX = $consulta->fetchAll(PDO::FETCH_ASSOC);


    /* VFD */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as VFD
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 25
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoVFD = $consulta->fetchAll(PDO::FETCH_ASSOC);

    /* GGC GUILLERMO */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as GGC
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 24
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoGGC = $consulta->fetchAll(PDO::FETCH_ASSOC);


    /* PF - PERDRO FERNANDINO */
    $consulta = $conexion->prepare(
        'SELECT 
            P.NOMBRE_PROYECTO AS proyecto,
            sum(A.HH_USADAS + (A.HH_EXTRAS * 1.5)) as PF
        FROM ACTIVIDAD A 
            JOIN PROYECTO P
            JOIN USUARIO U
            JOIN UF
        WHERE A.ID_PROYECTO = P.ID_PROYECTO
            AND A.ID_USUARIO = U.ID_USUARIO
            AND A.ID_USUARIO = 28
            AND A.FECHA BETWEEN :mes AND :anio
        GROUP BY
            P.NOMBRE_PROYECTO
        ORDER BY P.NOMBRE_PROYECTO
    ;');

    $consulta->bindParam(':mes', $mesReporteMensual);
    $consulta->bindParam(':anio', $anioReporteMensual);
    $consulta->execute();
    $resultadoPF = $consulta->fetchAll(PDO::FETCH_ASSOC);



    $conexion = null;
/*

var_dump($resultadoCRO);die;

    $dataCRO = array('data' => $resultadoCRO );

    echo json_encode($dataCRO, true); 

*/
// var_dump($listadoProyectos); die;


/*

// obtengo el nombre del proyecto
var_dump($resultadoCRO[0]['proyecto']); 
// Obtengo las HH del Proyecto
var_dump($resultadoCRO[0]['CRO']);

*/


// Creo el array
$array = array();
//echo count($listadoProyectos);

$CRO = 0; 
$JAM = 0; 
$EVV = 0; 
$PNO = 0; 
$MAX = 0; 
$VFD = 0; 
$GGC = 0;
$PF = 0;

//Recorro todos los elementos
for($i=0; $i<count($listadoProyectos); $i++){
      //saco el valor de cada elemento

// echo $listadoProyectos[$i]['proyecto'];
// echo " - ";
// echo "<br>";

$proyecto = $listadoProyectos[$i]['proyecto'];

// $JAM = $resultadoJAM[$i]['proyecto'];
// $EVV = $resultadoEVV[$i]['proyecto'];
// $PNO = $resultadoPNO[$i]['proyecto'];
// $MAX = $resultadoMAX[$i]['proyecto'];
// $VFD = $resultadoVFD[$i]['proyecto'];


/*  
*   COMPARA SI EXISTE EL PROYECTO EN LAS HH DE LOS USUARIOS
*   VERDADERO: ESTABLECE EL VALOR DE LAS HH
*   FALSO: ASIGNA 0
*/

for ($j=0; $j < count($resultadoCRO); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoCRO[$j]['proyecto'];
    if ($proyecto == $val) {
        $CRO = $resultadoCRO[$j]['CRO'];
    } else {
        if ($CRO>0) {
            # code...
        } else {
            $CRO = 0;
        }
    }
}

for ($j=0; $j < count($resultadoJAM); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoJAM[$j]['proyecto'];
    if ($proyecto == $val) {
        $JAM = $resultadoJAM[$j]['JAM'];
    } else {
        if ($JAM>0) {
            # code...
        } else {
            $JAM = 0;
        }
    }
}

for ($j=0; $j < count($resultadoEVV); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoEVV[$j]['proyecto'];
    if ($proyecto == $val) {
        $EVV = $resultadoEVV[$j]['EVV'];
    } else {
        if ($EVV>0) {
            # code...
        } else {
            $EVV = 0;
        }
    }
}

for ($j=0; $j < count($resultadoPNO); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoPNO[$j]['proyecto'];
    if ($proyecto == $val) {
        $PNO = $resultadoPNO[$j]['PNO'];
    } else {
        if ($PNO>0) {
            # code...
        } else {
            $PNO = 0;
        }
    }
}

for ($j=0; $j < count($resultadoMAX); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoMAX[$j]['proyecto'];
    if ($proyecto == $val) {
        $MAX = $resultadoMAX[$j]['MAX'];
    } else {
        if ($MAX>0) {
            # code...
        } else {
            $MAX = 0;
        }
    }
}

for ($j=0; $j < count($resultadoVFD); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoVFD[$j]['proyecto'];
    if ($proyecto == $val) {
        $VFD = $resultadoVFD[$j]['VFD'];
    } else {
        if ($VFD>0) {
            # code...
        } else {
            $VFD = 0;
        }
    }
}

for ($j=0; $j < count($resultadoGGC); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoGGC[$j]['proyecto'];
    if ($proyecto == $val) {
        $GGC = $resultadoGGC[$j]['GGC'];
    } else {
        if ($GGC>0) {
            # code...
        } else {
            $GGC = 0;
        }
    }
}

for ($j=0; $j < count($resultadoPF); $j++) { 
    // SE RECORREN TODOS LOS PROYECTOS DEL USUARIO CON HH CARGADAS
    $val = $resultadoPF[$j]['proyecto'];
    if ($proyecto == $val) {
        $PF = $resultadoPF[$j]['PF'];
    } else {
        if ($PF>0) {
            # code...
        } else {
            $PF = 0;
        }
    }
}

    $pila = array(
        "proyecto" => $proyecto, 
        "CRO" => $CRO, 
        "JAM" => $JAM, 
        "EVV" => $EVV, 
        "PNO" => $PNO, 
        "MAX" => $MAX, 
        "VFD" => $VFD,
        "GGC" => $GGC,
        "PF" => $PF
        );
    $array[] = $pila;


    $CRO = 0; 
    $JAM = 0; 
    $EVV = 0; 
    $PNO = 0; 
    $MAX = 0; 
    $VFD = 0; 
    $GGC = 0;
    $PF = 0;

} 

/*
$array = array(
    $array = array("Proyecto" =>"proyecto 1", "CRO" => "1", "EVV" => "1"), 
    $array = array("Proyecto" =>"proyecto 2", "CRO" => "2", "EVV" => "2"), 
    $array = array("Proyecto" =>"proyecto 3", "CRO" => "3", "EVV" => "3"),
    $array = array("Proyecto" =>"proyecto 4", "CRO" => "4", "EVV" => "4")
);

*/

$dataResultado = array('data' => $array );

echo json_encode($dataResultado, true); 

?>

