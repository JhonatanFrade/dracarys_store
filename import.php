<?php

	// include
	// require

	// include_once
	// require_once

	require_once("funcoes/inc.conexao.php");

	$link = connect();

	$nome = 'jhonatan';

	$query  = 'INSERT INTO usuario (nome, sobrenome, celular, cpf, email)
				VALUES ("'.$nome.'", "frade", "51991750080", "94262470253", "jhone@gmail.com")';

	echo $query; 

	// mysql_query($query, $link) or die(mysql_error());

?>