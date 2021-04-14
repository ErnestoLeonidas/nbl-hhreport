<?php
	require_once '../modelos/usuario.php';
    session_start();

	$datos = Usuario::buscarCorreos();
    
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $id = 0;
    $validador = false;

    foreach($datos as $row){
        if($row['USUARIO']== $email & $row['PASS']== $pass)
        {
            $validador = true;
            $id = $row['ID_USUARIO'];
        }
    }

    if($validador)
    {
        $usuario = new Usuario();
        $usuario->setId($id);
        $activo = $usuario->activo(); //selecciona todos los datos del ususario activo

        $_SESSION['idUsuario_Activo'] = $activo[0]['ID_USUARIO'];
        $_SESSION['nombre_Activo'] = $activo[0]['NOMBRE'];
        $_SESSION['idArea_Activo'] = $activo[0]['ID_AREA'];

        //header('location: cargar_sesion.php');
        header('location: ../mishoras.php');
    }
    else 
    {
        $_SESSION['error'] = "Contraseña incorrecta, favor ingrese nuevamente";
        header("location: ../vista/error.php");
    }

?>