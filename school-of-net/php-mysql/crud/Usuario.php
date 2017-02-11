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
	        $this->id = $id;

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

		public function list()
		{

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

		}

		public function delete()
		{

		}
	}