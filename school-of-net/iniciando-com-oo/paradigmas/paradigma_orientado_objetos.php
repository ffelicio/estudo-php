<?php
	/**
	 * O conceito desse paradigma é enxergar os problemas do dis a dia como objetos.
	 * Esse objeto pode ser encaixar com outros, formando uma cadeia.
	 * A grande vantagem é o reaproveitamento de código.
	*/

	// A classe é como se fosse um molde de algo concreto que queremos construir 
	class Pessoa
	{
		// Método = funções utilizadas dentro da classe
		public function getHello($nome)
		{
			return 'Hello ' . $nome;
		}

		public function getNome($nome)
		{
			return 'Seu nome é: <strong>' . $nome . '</strong>';
		}
	}

	$oPessoa = new Pessoa();
	echo $oPessoa->getHello('Teste 1'), '<br>';
	echo $oPessoa->getNome('Teste 2'), '<br>';