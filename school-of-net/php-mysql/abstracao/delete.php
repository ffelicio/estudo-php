<?php
	require_once '../connection.php';
	require_once 'Usuario.php';
	require_once 'UsuarioService.php';

	$id = filter_input(INPUT_GET, 'id');

	if( !$id ) {
		die('É NECESSÁRIO INFORMAR O VALOR PARA EXCLUSÃO');
	}

	$oUsuario = new Usuario();
	$oUsuario->setId($id);

	$oUsuarioService = new UsuarioService($mysqli, $oUsuario);

	$retorno = $oUsuarioService->delete();

	echo 'EXCLUIU = ', ($retorno ? 'SIM' : 'NAO');
?>