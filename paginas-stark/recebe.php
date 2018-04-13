<?php

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$CPF = $_POST['CPF'];
	$password = $_POST['senha'];
	$genero = $_POST['genero'];

	$query  = 'INSERT INTO tb_usuarios (nome, sobrenome, cpf, senha, genero)
			VALUES ("'.$nome.'", "'.$sobrenome.'", "'.$CPF.'", "'.$password.'", "'.$genero.'")';

	inserir($query, $link);

?>