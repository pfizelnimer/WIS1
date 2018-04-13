<?php
	require_once('../includes_/my_connection.php');
	require_once('../class/class_users.php');
	Users::$dbConn=$connection;
	
	$userN=$_POST['txtusername'];
	$pwd=$_POST['txtpassword'];
	$user = new Users();
	if($user->searchByUsername($userN)){
		if($user->Retries < 6){
			if($user->comparePassword($pwd)){
				$user->resetRetries();
				//go to home page
			}else{
				$user->updateRetries();
				echo 'Wrong password! Remaining Retries : '. (5 - ($user->Retries - 1)) .'.';
			}
		}else{
			echo 'Account is locked!';
		}
	}else{
		echo 'User does not exist';
	}
?>

