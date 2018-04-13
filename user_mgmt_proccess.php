<?php 
	//user_mgmt_process.php
	session_start();	
	require_once('./includes/session_check.php');
	require_once('./includes/general_functions.php');
	require_once('./includes/mysqli_connect.php');
	$flagProceed=1;
	$errMsg="";
	if (isset($_POST['smb_user_add'])){
		
		//retrieve and trim spaces of the data 
		$username=trim($_POST['txt_username']);
		$password=trim($_POST['txt_username']);
		//continue with elements
		
		//validate important data 
		
		if(empty($username)){
			$flagProceed=0;
		//	concatError($errMsg,"Username Must not be empty");
		}
		if(empty($password)){
			$flagProceed=0;
		//	concatError($errMsg,"Password Must not be empty");
		}
		if($flagProceed==1){
			//save in the database
			//mysqsli_query();
			
			
			$res=mysqli_query($cnn,qry);
			if($res){
				//task no. 3 save in database
			}else{
				die(mysqli_error($cnn));
			}
		}else{
			//go back to user_add.php and show the error 
			$_SESSION['user_error']=$errMsg;
			header('location:user_add.php');
		}
	}elseif(isset($_POST['smb_user_edit'])){
		$selected_id=$_POST['selected_id'];
		$username=$_POST['txt_user'];
		$qry="UPDATE tbl_users SET username='$username' WHERE id=$selected_id;";
		$result=mysqli_query($cnn,$qry);
		if($result){
			$_SESSION['info_msg']="Record updated successfully!";
			header('location:user_mgmt.php');
		}else{
			die(mysqli_error($cnn) );
		}
	}elseif(isset($_POST['form_activity'] )){
		$selected_id=$_POST['selected_user_id'];
		$sql="DELETE FROM tbl_users WHERE id=$selected_id;";
		$res=mysqli_query($cnn,$sql);
		if($res){
			$_SESSION['info_msg']="Record deleted successfully!";
			header('location:user_mgmt.php');
		}else{
			die(mysqli_error($cnn) );
		}
	}
?>