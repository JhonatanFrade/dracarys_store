<?php
	require_once("../funcoes/inc.conexao.php");

	$link = connect();

	//************** INICIO DADOS DO COMENTARIO ***************

	$queryComentarios = 'SELECT comentario, id_usuarios
				FROM tb_comentarios';

	$resComentarios = mysql_query($queryComentarios, $link);

	//************** FIM DADOS DO COMENTARIO ***************

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

		<table width="100%">
			<tr align="center">
				<td>
					<h4>COMENTARIOS</h4>
				</td>	
			</tr>
		</table>

		<table align="center" width="40%" height=100px>
			<tr>
				<td>
					<h3>Adicionar comentarios</h3>
					<form action="recebe.php" method="POST">
						<h3>Usuário:</h3>
						<input type="text" name="usuario">
						<h3>Comentario:</h3>
						<input type="text" name="comentario">
						<input type="hidden" name="tabela" value="comentario">
						<input type="hidden" name="id" value="<?php echo $id?>">
						<input type="submit" name="button" value="Registrar">
					</form>
				</td>
			</tr>
		</table>

		<table class="table-coments">
			<?php if($resComentarios){	
				while($linha = mysql_fetch_assoc($resComentarios)){ 
					$queryUsuarios = 'SELECT nome FROM tb_usuarios WHERE usuario_id = '.$linha['id_usuarios'];
					$resUsuarios = mysql_query($queryUsuarios, $link);
					if($resUsuarios){
						$linha2 = mysql_fetch_assoc($resUsuarios);
					}
			?>
			<tr align="center">
				<td>
					<b><h1>Usuário: <?php echo $linha2['nome']; ?></h1></b> 
				</td>
			</tr>
			<tr>
				<td>
					<h2><?php echo $linha['comentario']; ?></h2>
				</td>
			</tr>

			<?php } ?>
			<?php }else{?>
			<tr align="center">
				<td colspan="2"><?php echo "<p style='color:red;'>Não há registro!</p>" ?></td>
			</tr>
			<?php break;} ?>
		</table>

		<?php include_once('footer.php'); ?>
		
	</body>
</html>