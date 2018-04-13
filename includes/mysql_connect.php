<?php
$cnn = mysqli_connect("localhost:3306", "root", "", "wis1");
if(mysqli_connect_error($cnn))
	die("Unable to connect".mysqli_error($cnn));
?>