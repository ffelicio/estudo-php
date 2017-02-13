<?php
	require_once('Carro.php');

	/*
	 * Apesar de utilizar o mesmo molde (Carro) eles ganham a sua indepêndencia.
	 * Cada um terá as suas características.
	 */
	$oFerrari = new Carro();
	$oMustang = new Carro();

	$oFerrari->marca = 'Ferrari';
	$oFerrari->cor = 'Vermelha';
	$oFerrari->motor = 300;

	$oMustang->marca = 'Ford';
	$oMustang->cor = 'Preto';
	$oMustang->motor = 280;

	echo '<pre>';
	echo '<hr>';
	var_dump($oFerrari);
	echo '<hr>';
	var_dump($oMustang);
	echo '<hr>';
	echo '</pre>';