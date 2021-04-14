<?php
    require_once '../modelos/actividad.php';
    require_once '../modelos/area_especialidad.php';
    require_once '../modelos/proyecto.php';
    require_once '../modelos/localidad.php';
    require_once '../modelos/solicito.php';
    require_once '../conexion/conexion.php';
    
    session_start();

    $id_activo = $_SESSION['usuario_activo'][0]['ID_USUARIO'];
    $nombre_activo = $_SESSION['usuario_activo'][0]['NOMBRE'];
    $area_activo = $_SESSION['usuario_activo'][0]['ID_AREA'];

    //Especialidades del usuario
    $especialidad_usuario = new AreaEspecialidad();
    $especialidad_usuario->setId_area($area_activo);
    $especialidades = $especialidad_usuario->buscarEspecialidades();
    $_SESSION['especialidades'] = $especialidades; //  VALORES: ID, NOMBRE
        //print_r($_SESSION['especialidades']);die;

    //Proyectos Activos
    $proy_en_ejecucion = new Proyecto();
    $proyectos_activos = $proy_en_ejecucion->buscarActivos(); 
    $_SESSION['proyectos_activos'] = $proyectos_activos; // VALORES: ID_PROYECTO, NOMBRE_PROYECTO, ID_LOCALIDAD
            //print_r($_SESSION['proyectos_activos']);die;

    //Localidades
    $localidad = new Localidad();
    $localidades = $localidad->buscarTodo();
    $_SESSION['localidades'] = $localidades; //VALORES: ID_LOCALIDADES, NOMBRE_LOCALIDAD
            //print_r($_SESSION['localidades']);die;

    // HH del usuario
    $horas_mes = new Actividad();
    $horas_mes->setId_usuario($id_activo);
    $hhs = $horas_mes->mostrar();
    $_SESSION['hh_mes'] = $hhs;
        //print_r($_SESSION['hh_mes']);die;

    //Solicitantes
    $aux1 = new Solicito();
    $solicitantes = $aux1->buscarTodos(); 
    $_SESSION['solicitantes'] = $solicitantes; // VALORES: ID_SOLICITO, NOMBRE, NOMBRE_PROYECTO
    // print_r($solicitantes);die;

    header('location: ../mishoras.php');
?>