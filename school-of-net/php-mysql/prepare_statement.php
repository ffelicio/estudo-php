<?php
	require_once 'connection.php';

     /*
	// Nesse formato alguém poderá fazer o sql injection
	$sql = "SELECT * FROM usuario WHERE id = {$_GET['id']}";
	$query = $mysqli->query($sql);

	echo '<hr>';
	while( $data = $query->fetch_assoc() ) {
		echo 'ID: ', $data['id'], '<br>';
		echo 'Nome: ', $data['nome'], '<br>';
		echo 'E-mail: ', $data['email'], '<hr>';
	}
	*/

	# Prepare statement #

	// inicia o statement
	$stmt = $mysqli->stmt_init();

	// inicia o prepare
	$stmt->prepare("SELECT nome, email FROM usuario WHERE id = ?");

	/*
	 * Envio dos parâmetros
	 */
	$stmt->bind_param('i', $_GET['id']); // inteiro
	// $stmt->bind_param('d', $_GET['nome']); // double
	// $stmt->bind_param('s', $_GET['nome']); // string
	// $stmt->bind_param('b', $_GET['arquivo']); // blob

	// Caso exista a necessidade de passagem de mais parâmetros, conforme mostrado no sql abaixo
	// utilizar o método bind_param conforme as linhas subsequentes.
	// $stmt->prepare("SELECT nome, email FROM usuario WHERE id = ? AND nome = ?");
	// $stmt->bind_param('is', $_GET['id'], $_GET['nome']);
	// ou da forma abaixo
	// $stmt->bind_param('i', $_GET['id']); // integer
	// $stmt->bind_param('s', $_GET['nome']); // string

	// Executa o sql
	$stmt->execute();

	// mapeia as colunas nas variáveis.
	$stmt->bind_result($nome, $email);
	$stmt->fetch();

	echo 'Nome = ', $nome, '<br>';
	echo 'Email = ', $email, '<br>';