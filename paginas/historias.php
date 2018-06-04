<?php 

	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	$queryHistorias = 'SELECT imagem, historia, id_casa, titulo FROM tb_historias';

	$resHistorias = mysql_query($queryHistorias, $link);

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
				<h4>HISTORIAS</h4>
			</td>	
		</tr>
	</table>

	<table width="70%" align="center">
		<?php if($resHistorias){while($linha = mysql_fetch_assoc($resHistorias)){ if($linha['id_casa'] == $id){ ?>
		<tr align="center">
			<td>
				<h4><?php echo $linha['titulo']; ?></h4>
				<img width="550px" height="343px" src="../img/historias/<?php echo $linha['imagem']; ?>"><br>
			</td>	
		</tr>
		<tr>
			<td align="justify">
				<h3><?php echo $linha['historia']; ?></h3>
			</td>
		</tr>
		
		<?php }else{?>
		<tr align="center">
			<td colspan="9"><?php echo "<p style='color:red;'>Não há registro!</p>" ?></td>
		</tr>
		<?php break;} ?>
		<?php } ?>
		<?php } ?>
	</table>

	<?php include_once('footer.php'); ?>

</body>
</html>

<?php mysql_close();?>