<?php
	require_once '../connection.php';
	require_once 'Usuario.php';
	require_once 'UsuarioService.php';

	$id = filter_input(INPUT_GET, 'id');

	if( !$id ) {
		throw new Exception("É NECESSÁRIO INFORMAR O VALOR PARA ATUALIZAÇÃO", 1);
	}

	$oUsuario = new Usuario();
	$oUsuario->setId($id);

	$oUsuarioService = new UsuarioService($mysqli, $oUsuario);
	$usuario = $oUsuarioService->findById();
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