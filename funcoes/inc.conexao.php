<?php

	function connect(){
		define ("HOST", "localhost");
		define ("USER", "root");
		define ("PASS", "");
		define ("BASE", "dracarys_store_db");

		$link = mysql_connect(HOST, USER, PASS) or die('Error mysql_connect : '.mysql_error());

		$db_selected = mysql_select_db(BASE, $link) or die('Error mysql_select_db : '.mysql_error());

		// echo "passei aqui";

		return $link;
	}
?>