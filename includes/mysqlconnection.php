<?php

	$mysqlConnection=mysql_connect("localhost","root","") or die(mysql_error());
	if ($mysqlConnection){
		//echo "Connected to the server!";
		$dblink=mysql_select_db("db_students",$mysqlConnection) or die(mysql_error());
		if($dblink){
		//	echo "Database selected!";
		}else{
			die ("Unknown database");
		}
	}else{
		die ("Unable to connect to the server!");
	}

?>