<?php

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$CPF = $_POST['CPF'];
	$password = $_POST['senha'];
	$genero = $_POST['genero'];

	$query  = 'INSERT INTO tb_usuarios (nome, sobrenome, email, cpf, senha, genero)
			VALUES ("'.$nome.'", "'.$sobrenome.'", "'.$email.'", "'.$CPF.'", "'.$password.'", "'.$genero.'")';

	// echo $query;

	inserir($query, $link);

?>