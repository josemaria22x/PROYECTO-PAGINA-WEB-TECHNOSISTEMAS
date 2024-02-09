<?php
	session_start();
	ob_start();
	//Cerrar sesion es tan simple como igualar a 0 la variable...
	$_SESSION['sesion_exito']=0;
	$_SESSION['iniciado'] = false;
	header('Location: login.php');
?>
