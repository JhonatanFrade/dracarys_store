<?php

	function connect(){
		define ("HOST", "localhost");
		define ("USER", "root");
		define ("PASS", "");
		define ("BASE", "dracarys_store_db");

		$link = mysql_connect(HOST, USER, PASS) or die('Error mysql_connect : '.mysql_error());

		$db_selected = mysql_select_db(BASE, $link) or die('Error mysql_select_db : '.mysql_error());

		return $link;
	}

	function inserir($query, $link){
		mysql_query($query, $link) or die(mysql_error());
	}
?>