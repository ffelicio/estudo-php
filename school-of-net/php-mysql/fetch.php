<?php
	require_once 'connection.php';

	/*
	 *	fetch_all - Armazena todas as linhas do banco.
	 *		MYSQLI_NUM
	 *		MYSQLI_ASSOC
	 *		MYSQLI_BOTH
	 *	fetch_array - Armazena somente a primeira linha do banco
	 *		MYSQLI_NUM
	 *		MYSQLI_ASSOC
	 *		MYSQLI_BOTH
	 *	fetch_row - Armazena somente a última linha do banco
	 *	fetch_object - Armazena somente a primeira linha do banco
	 */	

	// Consulta dos dados
	$sql = 'SELECT * FROM usuario ORDER BY nome';

	if( $query = $mysqli->query($sql) ) {
		echo '###################################################################', '<br>';

		/*
		 * Por padrão é 'MYSQLI_NUM' caso não seja passada a constante no argumento do método fetch_all.
		 * Retorna a informação das colunas em número
		 */
		$fetch_all = $query->fetch_all();
		echo '<pre>';
		echo 'FETCH_ALL<br>';
		var_dump($fetch_all);
		echo '</pre>';

		/*
		 * MYSQLI_ASSOC
		 * Retorna a informação das colunas em formato associativo utilizando os nomes
		 */
		$fetch_all_mysqli_assoc = $query->fetch_all(MYSQLI_ASSOC);
		echo '<pre>';
		echo 'FETCH_ALL_MYSQLI_ASSOC<br>';
		var_dump($fetch_all_mysqli_assoc);
		echo '</pre>';

		/*
		 * MYSQLI_BOTH - retorna a informação das colunas em número e associativo com os nomes das colunas
		 */
		$fetch_all_mysqli_both = $query->fetch_all(MYSQLI_BOTH);
		echo '<pre>';
		echo 'FETCH_ALL_MYSQLI_BOTH<br>';
		var_dump($fetch_all_mysqli_both);
		echo '</pre>';

		echo '###################################################################', '<br>';

		/*
		 * Devolve os dados em formato array e somente uma linha na lista retornada.
		 * Melhor utilizado com while.
		 * Caso o argumento do método esteja vazio, retornará as colunas com formato número e também com os nomes associativos
		 . (mesmo formato de MYSQLI_BOTH)
		 */

		while( $fetch_array_padrao = $query->fetch_array() ) {
			echo 'Nome (FETCH_ARRAY - acesso coluna formato número): ', $fetch_array_padrao[1], '<br>';
			echo 'Nome (FETCH_ARRAY - acesso associativo): ', $fetch_array_padrao['nome'], '<br>';
		}

		while( $fetch_array_mysqli_assoc = $query->fetch_array(MYSQLI_ASSOC) ) {
			echo 'Nome: (FETCH_ARRAY_MYSQLI_ASSOC)', $fetch_array_mysqli_assoc['nome'], '<br>';
		}

		while( $fetch_array_mysqli_both = $query->fetch_array(MYSQLI_BOTH) ) {
			echo 'Nome (FETCH_ARRAY_MYSQLI_BOTH - acesso coluna formato número): ', $fetch_array_mysqli_both[1], '<br>';
			echo 'Nome (FETCH_ARRAY_MYSQLI_BOTH - acesso associativo): ', $fetch_array_mysqli_both['nome'], '<br>';
		}

		echo '###################################################################', '<br>';

		/*
		 * Devolve os dados em formato array e somente uma linha na lista retornada.
		 * Retorna as colunas em formato númerico.
		 * Melhor utilizado com while.
		 */
		while( $fetch_row = $query->fetch_row() ) {
			echo 'Nome (FETCH_ROW - acesso coluna formato número): ', $fetch_row[1], '<br>';
		}


		echo '###################################################################', '<br>';

		/*
		 * Devolve os dados em forma de objeto (stdClass).
		 * As colunas são acessadas como variáveis de instância (atributos da classe).
		 * Armazena somente o primeiro item da lista de dados.
		 * Melhor utilizado com while.
		 */
		while( $fetch_object = $query->fetch_object() ) {
			echo 'Nome (FETCH_OBJECT - acesso coluna formato atributo): ', $fetch_object->id, '<br>';
		}

		echo '###################################################################', '<br>';
	}
?>