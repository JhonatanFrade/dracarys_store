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

	<table width="50%">
		<tr align="center">
			<td>
				<img align="center" width="60px" height="60px" src="../img/icon-login.png">
			</td>
		</tr>
		<tr align="center">
			<td>
				<form action="recebe.php" method="POST">
					<h3>Login:</h3>
					<input type="text" name="nome">
					<br><br>
					<h3>Senha:</h3>
					<input type="text" name="pass">
					<input type="hidden" name="tabela" value="login">
					<!-- <input type="submit" name="button" value="Registrar"> -->
				</form>
			</td>
		</tr>
	</table>
	<?php include_once('footer.php'); ?>
</body>
</html>