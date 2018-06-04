<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$base = 'dracarys_store_db';

	$link = mysql_connect($host, $user, $pass) or die(mysql_error());

	mysql_select_db($base, $link) or die(mysql_error());

?>