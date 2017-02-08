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