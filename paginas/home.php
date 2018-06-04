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

		<table width="70%" align="center">
			<tr>
				<td align="center">
					<img width="512px" height="222px" src="../img/<?php echo $imagemInicialDefault; ?>"><br>
				</td>
			</tr>
		</table>

		<?php include_once('footer.php'); ?>
	</body>
</html>

<?php mysql_close();?>