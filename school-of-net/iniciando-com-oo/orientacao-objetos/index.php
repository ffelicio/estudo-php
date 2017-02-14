<?php
	require_once('Carro.php');

	/*
	 * Apesar de utilizar o mesmo molde (Carro) eles ganham a sua indepêndencia.
	 * Cada um terá as suas características.
	 */
	$oFerrari = new Carro();
	$oMustang = new Carro();
	$oCamaro = new Carro();

	$oFerrari->marca = 'Ferrari';
	$oFerrari->cor = 'Vermelha';
	$oFerrari->motor = 300;

	$oMustang->marca = 'Ford';
	$oMustang->cor = 'Preto';
	$oMustang->motor = 280;

	$oCamaro->marca = 'Chevrolet';
	$oCamaro->cor = 'Amarelo / Preto';
	$oCamaro->motor = 250;

	echo '<pre>';
	echo '<hr>';
	var_dump($oFerrari);
	echo '<hr>';
	var_dump($oMustang);
	echo '<hr>';
	echo '</pre>';

	##########################

	// Mostrando as informações no método.

	echo 'Utilização de métodos (Argumento obrigatório)<br>';
	echo 'Ferrari = ', $oFerrari->getMotorArgumentoObrigatorio('cavalos'), '<br>';
	echo 'Mustang = ', $oMustang->getMotorArgumentoObrigatorio('cavalos'), '<hr>';

	echo 'Utilização de métodos (Argumento não obrigatório)<br>';
	echo 'Camaro = ', $oCamaro->getMotorArgumentoNaoObrigatorio('cv'), '<hr>';