<?php 
	require_once '../modelos/actividad.php';
    session_start();
    
    $accion = $_POST['accion']; // modificar - agregar - eliminar

    $id_actividad = $_POST['id'];
    $descripcion = $_POST['descripcion'];

    $fecha = $_POST['fecha'];
    $hh_usadas = $_POST['hh_usadas'];
    $hh_extras = $_POST['hh_extras'];
    $id_usuario = $_SESSION['usuario_activo'][0]['ID_USUARIO'];
    $id_especialidad = $_POST['id_especialidad'];
    $id_proyecto = $_POST['id_proyecto'];
    $id_solicito = $_POST['id_solicito'];

    $id_localidad = $_POST['id_localidad']; //no es necesaria ya que no se solicita


    switch ($accion) {
        case "agregar":
            
            $datos = new Actividad();
                $datos->setDescripcion($descripcion);
                $datos->setFecha($fecha);
                $datos->setHh_usadas($hh_usadas);
                $datos->setHh_extras($hh_extras);
                $datos->setId_usuario($id_usuario);
                $datos->setId_especialidad($id_especialidad);
                $datos->setId_proyecto($id_proyecto);
                $datos->setId_solicito($id_solicito);
            $datos->cargar();

            break;
        case "modificar":
            
            $datos = new Actividad();
                $datos->setId($id_actividad);
                $datos->setDescripcion($descripcion);
                $datos->setFecha($fecha);
                $datos->setHh_usadas($hh_usadas);
                $datos->setHh_extras($hh_extras);
                $datos->setId_usuario($id_usuario);
                $datos->setId_especialidad($id_especialidad);
                $datos->setId_proyecto($id_proyecto);
                $datos->setId_solicito($id_solicito);
            $datos->cargar();

            break;
        case "eliminar":
            
            $datos = new Actividad();
                $datos->setId($id_actividad);
            $datos->cargar();

            break;
    }

 	header('location: ../controlador/cargar_sesion.php');
?>