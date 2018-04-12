<?php

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$CPF = $_POST['CPF'];
	$password = $_POST['senha'];
	$sobrenome = $_POST['sobrenome'];
	$sobrenome = $_POST['sobrenome'];

	$query  = 'INSERT INTO usuario (nome, sobrenome, cpf, senha)
			VALUES ("'.$nome.'", "'.$sobrenome.'", "'.$CPF.'", "'.$password.'")';

	echo $query;

	// mysql_query($query, $link) or die(mysql_error());

?>