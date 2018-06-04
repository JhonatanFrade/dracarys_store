<?php 

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$id = $_REQUEST['id'];

	//************** INICIO DADOS DA CASA ***************
	
	$queryCasa = 'SELECT logo, icone, imagem_inicial FROM tb_casa WHERE id_casa ='.$id;

	$resCasa = mysql_query($queryCasa, $link);
	
	$linhaCasa = mysql_fetch_assoc($resCasa);

	$logoDefault = $linhaCasa['logo'];
	$iconeDefault = $linhaCasa['icone'];
	$imagemInicialDefault = $linhaCasa['imagem_inicial'];

	//************** FIM DADOS DA CASA ***************

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Casa Stark</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>
	<?php include_once('topo.php'); ?>

	<?php include_once('menu.php'); ?>

	<?php include_once('resultado.php'); ?>
	<table width="50%">
		<tr align="center">
			<td>
				<img width="220px" height="90px" src="../img/icon-register.png">
			</td>
		</tr>
		<tr align="center">
			<td>
				<form action="recebe.php" method="POST">
					<h3>Nome completo:</h3>
					<input type="text" name="nome">
					<h3>Usuário:</h3>
					<input type="text" name="sobrenome">
					<h3>E-mail:</h3>
					<input type="text" name="email">
					<h3>Confirmar e-mail:</h3>
					<input type="text" name="confirmar-email">
					<h3>CPF:</h3>
					<input type="text" name="CPF">
					<h3>Senha:</h3>
					<input type="text" name="senha">
					<h3>Confirmar senha:</h3>
					<input type="text" name="confirma-senha">
					<h3>Genero:</h3>
					<h3>
						<input type="radio" name="genero" value="M">Masculino
						<input type="radio" name="genero" value="F">Feminino
						<input type="radio" name="genero" value="N">Não informar
					</h3>
					<input type="hidden" name="tabela" value="usuario">
					<input type="hidden" name="id" value="<?php echo $id?>">
					<input type="submit" name="button" value="Registrar">
				</form>
			</td>
		</tr>
	</table>	
	<?php include_once('footer.php'); ?>
</body>
</html>

<?php mysql_close();?>