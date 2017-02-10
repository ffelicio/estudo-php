<?php
	require_once 'connection.php';

	// Consulta dos dados
	$sql = 'SELECT * FROM usuario ORDER BY nome';
	$query = $mysqli->query($sql);

	echo '<hr>';
	while( $data = $query->fetch_assoc() ) {
		echo 'ID: ', $data['id'], '<br>';
		echo 'Nome: ', $data['nome'], '<br>';
		echo 'E-mail: ', $data['email'], '<hr>';
	}
?>