<?php
	require_once '../connection.php';
	require_once 'Usuario.php';

	$oUsuario = new Usuario($mysqli);
	$retorno = $oUsuario->setNome('Usuario editado')
			            ->setEmail('novo-email@email.com.br')
			            ->setId(2)
			            ->update();

    echo 'REALIZAR UPDATE = ', ($retorno ? 'SIM' : 'NAO');
?>