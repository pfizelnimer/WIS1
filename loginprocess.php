<?php
	session_start();
require_once('./includes/mysqlconnection.php');
if(isset($_POST['txtusername']) && isset($_POST['txtpassword'])){
	$username=trim($_POST['txtusername']);
	$password=trim($_POST['txtpassword']);
	if($username !="" && $password !=""){
		//query from the database
		$strquery="SELECT * FROM tbl_accounts WHERE username='$username' AND password='$password';";
		$result=mysql_query($strquery);
		if($result){
			if(mysql_num_rows($result)==1){
				$_SESSION['username']=$username;
				//echo "Welcome $username";
				header('location:home.php');
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Invalid Username and password!')
			window.location.href='login.php';
			</SCRIPT>");			
			}
		}else{
			die("Unable to fetch data ". mysql_error());
		}
	
	}else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Username and password can not be blank!')
			window.location.href='login.php';
			</SCRIPT>");
	}
}else{
	
	header('location:login.php');	
}

?>