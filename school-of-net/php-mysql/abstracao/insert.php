<?php
	require_once '../connection.php';
	require_once 'Usuario.php';
	require_once 'UsuarioService.php';

	$oUsuario = new Usuario();

	$range = range('A', 'Z');
	$indiceLetra = rand(0, (count($range) - 1));
	$letraSelecionada = $range[$indiceLetra];

	$oUsuario->setNome('Usuario - ' . $letraSelecionada)
	         ->setEmail('usuario-'. $letraSelecionada . '@email.com');

	$oUsuarioService = new UsuarioService($mysqli, $oUsuario);
	$id = $oUsuarioService->insert();

	echo $id;
?>