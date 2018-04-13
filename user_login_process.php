<?php
//save as user_login_process.php 
session_start();
require_once('./includes/mysqli_connect.php');

if(isset($_POST['smb_login'])){
	$uname=trim($_POST['txt_uname']);
	$pword=trim($_POST['txt_pword']);
	if(!empty($uname) && !empty($pword)){
		$qry="SELECT * FROM tbl_users WHERE username='$uname'  and pwd=md5('$pword') ;";
		$result=mysqli_query($cnn,$qry);
		if($result){
			if(mysqli_num_rows($result)==1 ){
				//echo 'Login is successful';;
				$row=mysqli_fetch_array($result);
				session_regenerate_id();
				$_SESSION['user_id']=$row['id'];
				$_SESSION['user_NAME']=$row['username'];
				$_SESSION['full_name']=$row['fullname'];
				header('location:home.php');
			}else{
				gotoLoginpage("Invalid username and password");
			}
		}else{
			die(mysqli_error($cnn));
		}
	}else{
		gotoLoginpage("Username and password must not be empty!");
	}
}else{
	gotoLoginpage("Invalid form request!");
}


function gotoLoginpage($errMsg=""){
	if ($errMsg <> ""){
		$_SESSION['error']=$errMsg;
	}
	header('location:user_login.php');
}
?>