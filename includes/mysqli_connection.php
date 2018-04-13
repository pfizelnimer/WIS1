<?php
$conn = mysqli_connect("localhost:3306","root","",'db_wis1');
if(mysqli_connect_error($conn))
	die("Unable to connect".mysqli_error($conn));
?>