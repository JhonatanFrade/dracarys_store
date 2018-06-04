<?php

if( isset($_GET['resultado']) and !empty($_GET['resultado']) ){
	$resultado = $_GET['resultado'];
	echo '<h4><b>'.$resultado.'</b></h4>';
}

?>