<?php
	class UsuarioService
	{
		private $db,
		        $usuario;

		public function __construct(Mysqli $mysqli, Usuario $usuario)
		{
			$this->db = $mysqli;
			$this->usuario = $usuario;
		}

		public function list($order = null)
		{
			$sql = ' SELECT * FROM usuario ';

			if( $order ) {
				$sql .= ' ORDER BY ' . $order;
			}

			$query = $this->db->query($sql);
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function insert()
		{
			$nome = $this->usuario->getNome();
			$email = $this->usuario->getEmail();

			$stmt = $this->db->stmt_init();
			$stmt->prepare('INSERT INTO usuario(nome, email) VALUES(?, ?)');
			$stmt->bind_param('ss', $nome, $email);
			$stmt->execute();
			$id = $stmt->insert_id;
			$stmt->close();

			return $id;
		}

		public function update()
		{
			$nome = $this->usuario->getNome();
			$email = $this->usuario->getEmail();
			$id = $this->usuario->getId();

			$stmt = $this->db->stmt_init();
			$stmt->prepare('UPDATE usuario SET nome = ?, email = ? WHERE id = ?');
			$stmt->bind_param('ssi', $nome, $email, $id);
			$updated = $stmt->execute();
			$stmt->close();
			return $updated;
		}

		public function delete()
		{
			$id = $this->usuario->getId();

			$stmt = $this->db->stmt_init();
			$stmt->prepare('DELETE FROM usuario WHERE id = ?');
			$stmt->bind_param('i', $id);
			$deleted = $stmt->execute();
			$stmt->close();
			return $deleted;
		}

		public function findById()
		{
			$stmt = $this->db->stmt_init();
			$stmt->prepare('SELECT * FROM usuario WHERE id = ?');
			$stmt->bind_param('i', $this->usuario->getId());
			$stmt->execute();
			$stmt->bind_result($id, $nome, $email);
			$stmt->fetch();
			$stmt->close();
			return ['id' => $id, 'nome' => $nome, 'email' => $email];
		}
	}