<?php 
	require_once '../modelos/usuario.php';
	session_start();

	$correos = Usuario::buscarCorreos();
	$_SESSION['correos'] = $correos;

 	header('location:../vista/intranet.php');
?>