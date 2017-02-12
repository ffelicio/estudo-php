<?php
	require_once '../connection.php';
	require_once 'Usuario.php';

	$id = filter_input(INPUT_GET, 'id');

	if( !$id ) {
		die('É NECESSÁRIO INFORMAR O VALOR PARA EXCLUSÃO');
	}

	$oUsuario = new Usuario($mysqli);

	$retorno = $oUsuario->setId($id)
						->delete();

	echo 'EXCLUIU = ', ($retorno ? 'SIM' : 'NAO');
?>