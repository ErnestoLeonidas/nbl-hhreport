<?php
	require_once '../modelos/actividad.php';
    session_start();

    $id_activo = $_SESSION['usuario_activo'];
    
    $horas_mes = new Actividad();
    $horas_mes->setId_usuario($id_activo);

    $hhs = $horas_mes->mostrar();
    
    $_SESSION['hh_mes'] = $hhs;

    header('location: ../vista/hhmes.php');
?>