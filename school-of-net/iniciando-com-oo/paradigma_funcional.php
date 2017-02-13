<?php
	// Paradigma baseado em funções

	$input = [22, 34, 17, 18, 14, 13, 22, 25];

	// Guardando a função na variável.
	$filtro = function(int $age) {
		return ($age >= 18);
	};
	$output1 = array_filter($input, $filtro);

	// Pode ser passada a função diretamente.
	$output2 = array_filter($input, function(int $age) {
		return ($age >= 18);
	});

	echo '<pre>';
	var_dump($output1, $output2);
	echo '</pre>';