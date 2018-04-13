<?php
	session_start();
	require_once('../includes_/my_connection.php');
	require_once('../includes_/mysql_functions.php');
	//we need to create a class about the object users :
	require('../class/class_users.php');
	Users::$dbConn=$connection;
	if(isset($_POST['submit'])){
		//check if username and password is set
		if(isset($_POST['username']) && isset($_POST['password'])){		
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$user = new Users();
				//$conn->clean_data($_POST['username']))
				if($user->searchbyUsername(clean_data($_POST['username']))){
					if($user->Retries > 5){
						$_SESSION['errormsg']= '<font color ="red" >Account is locked! </font>';
						header('location:../login/');
					}else{
						if($user->comparePassword(clean_data($_POST['password']))){
							$user->resetRetries();
							session_regenerate_id();
							$_SESSION['ULOGINID']=$user->Id;
							$_SESSION['UFULLNAME']=$user->Username;
							$_SESSION['usertype']=$user->Usertype;
							header('location:../home/home.php');
						}else{
							$user->updateRetries();
							$_SESSION['errormsg']= '<font color ="red" >Invalid Password! Remaining Retries Left: '.(5 -$retry).'  </font>';
							header('location:../login/');
						}
					}				
				}else{
					$_SESSION['errormsg']= '<font color ="red" >User does not exists! </font>';
					header('location:../login/');
				}
			}else{
				$_SESSION['errormsg']= '<font color ="red" >Invalid username / password </font>';
				header('location:../login/');
			}
		}else{//else of check if username and password is set
			$_SESSION['errormsg']= '<font color ="red" >Invalid username / password </font>';
			header('location:../login/');			
		}
	}else{
		header('location:../login/');
	}

?>