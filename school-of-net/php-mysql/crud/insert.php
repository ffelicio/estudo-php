<?php
	require_once '../connection.php';
	require_once 'Usuario.php';

	$range = range('A', 'Z');
	$indiceLetra = rand(0, (count($range) - 1));
	$letraSelecionada = $range[$indiceLetra];

	$oUsuario = new Usuario($mysqli);
	$id = $oUsuario->setNome('Usuario - ' . $letraSelecionada)
			       ->setEmail('usuario-'. $letraSelecionada . '@email.com')
			 	   ->insert();
	echo $id;
?>