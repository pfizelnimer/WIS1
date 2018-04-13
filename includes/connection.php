<?php

$conn=mysqli_connect("localhost:3306","root","","db_wis1");
if (mysqli_connect_error($conn)){
die("An error occured while connecting to the database server".mysqli_error($conn));
}
//else{
//echo "Successfully connected to the server!";
//}
?>
