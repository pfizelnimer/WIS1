<?php
//save in includes/session_check.php 
if(isset($_SESSION['user_id'])){
	$userID=$_SESSION['user_id'];
	$userN=$_SESSION['user_NAME'];
	$userFull=$_SESSION['full_name'];
}else{
	header('location:user_login.php');
}

?>