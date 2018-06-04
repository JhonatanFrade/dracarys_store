<?php
	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$queryPersonagens = 'SELECT nome, descricao, image, casa_id
				FROM tb_personagens';

	$resPersonagens = mysql_query($queryPersonagens, $link);

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
					<h4>PERSONAGENS</h4>
				</td>	
			</tr>
		</table>

		<?php if($resPersonagens){	while($linha = mysql_fetch_assoc($resPersonagens)){ if($linha['casa_id'] == $id){ ?>
		
		<table align="center" width="70%" height=100px>
			<tr>
				<td>
					<img width="260px" height="329px" src='../img/personagens/<?php echo $linha['image']; ?>'><br>
				</td>
				<td>
					<h3><?php echo $linha['nome']; ?></h3>
					<h3><?php echo $linha['descricao']; ?></h3>
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