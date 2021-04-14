<?php
	require_once '../modelos/usuario.php';
    session_start();
    $datos = $_SESSION['correos'];
    
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
        $_SESSION['usuario_activo'] = $id;
        header('location: hhmes.php');
    }
    else 
    {
        $_SESSION['error'] = "Contraseña incorrecta, favor ingrese nuevamente";
        header("location: ../vista/error.php");
    }

?>