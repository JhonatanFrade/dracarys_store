<?php
	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$queryProdutos = 'SELECT nome, descricao, valor, foto, casa_id FROM tb_produtos';

	$resProdutos = mysql_query($queryProdutos, $link);

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

	<table width="100%">
		<tr align="center">
			<td>
				<h4>PRODUTOS</h4>
			</td>	
		</tr>
	</table>

	<table width="300px" height="100px">
	<?php if($resProdutos){	while($linha = mysql_fetch_assoc($resProdutos)){ if($linha['casa_id'] == $id){ ?>
		<tr>
			<td>
				<img width="150px" height="150px" src="../img/produtos/<?php echo $linha['foto']; ?>">
			</td>
			<td>
				<table width="100%">
					<tr height="50px">
						<td>
							<h3><?php echo $linha['nome']; ?></h3>
						</td>
					</tr>
					<tr height="50px">
						<td>
							<h3><?php echo $linha['descricao']; ?></h3>
						</td>
					</tr>
					<tr height="50px">
						<td>
							<h3><?php echo $linha['valor']; ?></h3>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="carrinho" value="adicionar ao carrinho">
			</td>
			<td>
				<input type="submit" name="favorito" value="adicionar aos favoritos">
			</td>
		</tr>
	

		<?php } ?>
		<?php } ?>
		<?php }else{?>
		<tr align="center">
			<td colspan="9"><?php echo "<p style='color:red;'>Não há registro!</p>" ?></td>
		</tr>
		<?php break;} ?>
	</table>

	<?php include_once('footer.php'); ?>

</body>
</html>

<?php mysql_close();?>