<?php
	require_once '../connection.php';
	require_once 'Usuario.php';

	$oUsuario = new Usuario($mysqli);
	$id = $oUsuario->setNome('Usuario')
			       ->setEmail('usuario@email.com')
			 	   ->insert();
	echo $id;
?>