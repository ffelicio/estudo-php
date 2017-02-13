<?php
	require_once '../connection.php';
	require_once 'Usuario.php';
	require_once 'UsuarioService.php';

	$order = filter_input(INPUT_GET, 'order');

	$oUsuario = new Usuario();
	$oUsuarioService = new UsuarioService($mysqli, $oUsuario);
	$usuarios = $oUsuarioService->list($order);
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
				<?php foreach ($usuarios as $usuario) { ?>
					<tr>
						<td><?php echo $usuario['id']; ?></td>
						<td><?php echo $usuario['nome']; ?></td>
						<td><?php echo $usuario['email']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</body>
</html>