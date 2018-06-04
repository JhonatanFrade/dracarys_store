<?php

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$tabela = $_POST['tabela'];
	$id = $_REQUEST['id'];

	echo $id;

	switch ($tabela) {
		case 'usuario':
			$nome = $_POST['nome'];
			$sobrenome = $_POST['sobrenome'];
			$email = $_POST['email'];
			$CPF = $_POST['CPF'];
			$password = $_POST['senha'];
			$genero = $_POST['genero'];

			$query  = 'INSERT INTO tb_usuarios (nome, sobrenome, email, cpf, senha, genero, id_casa)
					VALUES ("'.$nome.'", "'.$sobrenome.'", "'.$email.'", "'.$CPF.'", "'.$password.'", "'.$genero.'", "'.$id.'")';

			inserir($query, $link);

			header("location:../paginas/register.php?id=".$id."&resultado=Registrado+com+sucesso!");
			exit();

			break;

		case 'comentario':
			$comentario = $_POST['comentario'];
			$usuario = $_POST['usuario'];

			$queryUsuarios = 'SELECT nome, usuario_id FROM tb_usuarios';
			$resUsuarios = mysql_query($queryUsuarios, $link);
			if($resUsuarios){
				while($linha2 = mysql_fetch_assoc($resUsuarios)){
					if($usuario == $linha2['nome']){
						$query  = 'INSERT INTO tb_comentarios (comentario, id_usuarios)
								VALUES ("'.$comentario.'", "'.$linha2['usuario_id'].'")';

						inserir($query, $link);

						header("location:../paginas/comentarios.php?resultado=Registrado+com+sucesso!&id=".$id);
						exit();

						break;
					}	
				}
			}

			header("location:../paginas/comentarios.php?resultado=Usuario+não+existe!&id=".$id);
			exit();

			break;

		case 'login':
			$nome = $_POST['nome'];
			$pass = $_POST['pass'];

			$query  = 'INSERT INTO tb_usuarios (comentario, usuario)
					VALUES ("'.$comentario.'", "'.$usuario.'")';

			break;
	}

?>