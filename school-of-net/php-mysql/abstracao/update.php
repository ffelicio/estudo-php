<?php
	require_once '../connection.php';
	require_once 'Usuario.php';
	require_once 'UsuarioService.php';

	$id = filter_input(INPUT_GET, 'id');

	if( !$id ) {
		throw new Exception("É NECESSÁRIO INFORMAR O VALOR PARA ATUALIZAÇÃO", 1);
	}

	$oUsuario = new Usuario();

	$range = range('A', 'Z');
	$indiceLetra = rand(0, (count($range) - 1));
	$letraSelecionada = $range[$indiceLetra];

	$oUsuario->setNome('Usuario editado ' . $letraSelecionada)
	         ->setEmail('usuario-editado-'. $letraSelecionada . '@email.com')
	         ->setId($id);

    $oUsuarioService = new UsuarioService($mysqli, $oUsuario);
    $retorno = $oUsuarioService->update();

    echo 'REALIZAR UPDATE = ', ($retorno ? 'SIM' : 'NAO');
?>