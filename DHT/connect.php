<?php

	function Connection(){
		$server="localhost:58136";
		$user="g04";
		$pass="2017nchu_g04";
		$db="g04_17";
	   	
		$connection = mysql_connect($server, $user, $pass);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
