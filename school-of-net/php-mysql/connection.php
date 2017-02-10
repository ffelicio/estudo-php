<?php
	$server = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'php_mysql_school_of_net';

	// Conexão com o banco de dados
	$mysqli = new mysqli($server, $user, $password, $database);

	// Para mostrar somente o erro sem mostrar as demais informações do php, utilizar conforme abaixo:
	// Comentar a linha de conexão acima e descomentar a linha abaixo.
	// @$mysqli = new mysqli($server, $user, $password, $database);

	// Erros
	if( mysqli_connect_errno() ) {
		echo 'Falha ao conectar para o Mysql:(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
		exit;
	}