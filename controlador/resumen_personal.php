<?php
    require_once '../modelos/actividad.php';
    session_start();

    $id_usuario = $_SESSION['usuario_activo'][0]['ID_USUARIO'];

    $mes = date("m");
    $anio = date("Y");

    // HH del usuario
    $resumen_personal = new Actividad();
    $resumen_personal->setId_usuario($id_usuario);
    $resumen_personal->set_mes($mes);
    $resumen_personal->set_anio($anio);

    $resumen = $resumen_personal->hh_proyectos_usuario();

    $_SESSION['resumen'] = $resumen;
    //print_r($_SESSION['resumen']);die;

    header('location: ../vista/resumen_personal.php');
?>