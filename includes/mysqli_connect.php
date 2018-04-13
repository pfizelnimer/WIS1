<?php
//save in includes/mysqli_connect.php 
	$cnn = mysqli_connect("localhost:3306","root","","wis1");
	if (mysqli_connect_error($cnn)){
		die("Application can not connect to the database server!.");
	}
?>