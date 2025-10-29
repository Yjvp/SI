<?php

	require_once "../../../clases/Usuario.php";

 	$password = sha1($_POST['password']);
	
	$datos = array(
							"nombre" => $_POST['nombre'], 
							"apellido" =>	$_POST['apellido'],  
							"usuario" => $_POST['usuario'],  
							"password" =>	$password
					);

		$usuarioO = new Usuario();

		echo $usuarioO->agregarUsuario($datos); 

?>