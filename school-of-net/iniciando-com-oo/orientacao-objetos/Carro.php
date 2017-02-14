<?php
	class Carro
	{
		public $marca;
		public $cor;
		public $motor;

		// Métodos são ações da classe.
		// O $this(palavra reservada), se refere a própria classe.
		public function getMotor()
		{
			return $this->motor . ' cavalos.';
		}
	}