<?php
	// Métodos são ações da classe.
	// O $this (palavra reservada), se refere a própria classe.

	class Carro
	{
		public $marca;
		public $cor;
		public $motor;

		/*
		 * Assinatura de métodos
		 * Paramêtros nos métodos.
		 * Da forma que está, caso algum valor não seja passado em sua utilização, será mostrado um erro.
		 */
		public function getMotorArgumentoObrigatorio($tipo)
		{
			return $this->motor . ' ' .  $tipo;
		}

		/*
		 * Assinatura de métodos
		 * Paramêtros nos métodos.
		 * Da forma que está, caso algum valor não seja passado em sua utilização, não será mostrado erro,
		 * devido ao valor já estar sendo passado no argumento.
		 * Caso seja passado, o valor será substituído.
		 */
		public function getMotorArgumentoNaoObrigatorio($tipo = 'cavalos')
		{
			return $this->motor . ' ' .  $tipo;
		}
	}