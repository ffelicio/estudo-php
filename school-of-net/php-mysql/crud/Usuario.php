<?php
	class Usuario
	{
		private $db;
		private $id;
		private $nome;
		private $email;

	    public function getId()
	    {
	        return $this->id;
	    }

	    public function setId($id)
	    {
	        $this->id = (int)$id;

	        return $this;
	    }

	    public function getNome()
	    {
	        return $this->nome;
	    }

	    public function setNome($nome)
	    {
	        $this->nome = $nome;

	        return $this;
	    }

	    public function getEmail()
	    {
	        return $this->email;
	    }

	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    public function __construct(Mysqli $mysqli)
		{
			$this->db = $mysqli;
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
			$stmt = $this->db->stmt_init();
			$stmt->prepare("INSERT INTO usuario(nome, email) VALUES(?,?)");
			$stmt->bind_param('ss', $this->nome, $this->email);
			$stmt->execute();

			return $stmt->insert_id;
		}

		public function update()
		{
			$stmt = $this->db->stmt_init();
			$stmt->prepare("UPDATE usuario SET nome = ?, email = ? WHERE id = ?");
			$stmt->bind_param("ssi", $this->nome, $this->email, $this->id);
			$updated = $stmt->execute();
			$stmt->close();
			return $updated;
		}

		public function delete()
		{
			$stmt = $this->db->stmt_init();
			$stmt->prepare("DELETE FROM usuario WHERE id = ?");
			$stmt->bind_param("i", $this->id);
			$deleted = $stmt->execute();
			$stmt->close();
			return $deleted;
		}

		public function findById()
		{
			$stmt = $this->db->stmt_init();
			$stmt->prepare('SELECT * FROM usuario WHERE id = ?');
			$stmt->bind_param("i", $this->id);
			$stmt->execute();
			$stmt->bind_result($id, $nome, $email);
			$stmt->fetch();
			$stmt->close();
			return ['id' => $id, 'nome' => $nome, 'email' => $email];
		}
	}