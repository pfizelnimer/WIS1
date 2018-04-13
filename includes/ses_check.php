<?php	
//save this in inc/ses_check.php
	session_start();
	if(isset($_SESSION['UID']) && isset($_SESSION['USERNAME']) && isset($_SESSION['UFULLNAME'])){
		if($_SESSION['UID'] > 0 && !empty($_SESSION['USERNAME']) && !empty($_SESSION['UFULLNAME'])){
			$struserid=$_SESSION['UID'];
			$struser=$_SESSION['USERNAME'];
			$struserF= 'Welcome '.$_SESSION['UFULLNAME'];
			$strLogout= '<a href="logout.php"> Logout </a>';
		}else{
			header('location:login.php');
		}
	}else{
		//echo 'sesion not set';
		header('location:login.php');
	}
?>