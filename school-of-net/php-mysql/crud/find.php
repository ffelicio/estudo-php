<?php
	require_once '../connection.php';
	require_once 'Usuario.php';

	$id = filter_input(INPUT_GET, 'id');

	if( !$id ) {
		die('É NECESSÁRIO INFORMAR O VALOR DE BUSCA');
	}

	$oUsuario = new Usuario($mysqli);
	$usuario = $oUsuario->setId($id)
						->findById();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LISTA DE USUÁRIOS</title>
	</head>
	<body>
		<table border="1">
			<caption>USUÁRIOS</caption>
			<thead>
				<tr>
					<th>#</th>
					<th>NOME</th>
					<th>E-MAIL</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $usuario['id']; ?></td>
					<td><?php echo $usuario['nome']; ?></td>
					<td><?php echo $usuario['email']; ?></td>
				</tr>
			</tbody>
		</table>
	</body>
</html>