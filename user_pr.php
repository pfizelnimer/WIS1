<?php
require_once('inc/ses_check.php');
require('./inc/mysql_conni.php');
require('./inc/mysql_funcs.php');
require('./inc/general_functions.php');
if (isset($_POST['operation'])){
	$a=$_POST['operation'];
	if($a==10 or $a ==20){
		//task #5 filter the values from $_POST to avoid mysql injection
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$usertype= $_POST['usertype'];
		$password= $_POST['pass'];
		
	}
	if($a==1){
		$helperType=1;
		include('./helpers/user_helper.php');	
	}else if($a==2){
		$helperType=2;
		$tempid = $_POST['selected_id'];
		$qry="SELECT * FROM tbl_users WHERE id = $tempid;";
		$result = mysqli_query($connection,$qry) or die(mysqli_error($connection));
		if(mysqli_num_rows($result)==1){
			$userdata=mysqli_fetch_array($result);
			include('./helpers/user_helper.php');	
		}else{
			$_SESSION['errmsg']='Record is not found!';
			gotoUser();
		}
		
	}else if($a==10){ // this will add record to the database
		if(!checkifUserExists($username,$connection)){
			//task #6 do not allow empty values for username,fullname,password and usertype
			//if there are empty values return an error message prompting empty values are not allowed.
			$sql="INSERT INTO tbl_users SET username='$username',
					fullname ='$fullname',retries=0,usertype=$usertype,password=md5('$password');";
			$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
			if(mysqli_affected_rows($connection) > 0 ){
				$_SESSION['infomsg']="Record has been successfully added!";
				gotoUser();
			}else{
				$_SESSION['errmsg']="Record not added!";
				gotoUser();
			}	
		}else{
			$_SESSION['errmsg']='Record already exists!';
			gotoUser();
		}
	}else if ($a==20){// this will update/edit the record
		$userid=$_POST['selected_id'];
		//tASK # 8 if the password input is blank do not update the password else update the password.
		$sqlupdate="UPDATE tbl_users SET username='$username',
					fullname ='$fullname',retries=0,usertype=$usertype WHERE id =$userid;";

		$result = mysqli_query($connection,$sqlupdate);
		if ($result){
			$_SESSION['infomsg']="Record has been successfully updated!";
			gotoUser();			
		}else{
			 die(mysqli_error($connection));
		}
	}else if($a==30){ // this will delete
		$tempid = $_POST['selected_id'];
		if($tempid > 0 || !empty($tempid)){
			$sqldel="DELETE FROM tbl_users WHERE id=$tempid";
			$res=mysqli_query($connection,$sqldel);
			if($res){
				if(mysqli_affected_rows($connection) > 0){
					$_SESSION['infomsg']="Record has been successfully deleted!";
				}else{
					$_SESSION['errmsg']='No record deleted!';
				}				
			}else{
				die(mysqli_error($connection));
			}
		}else{
			$_SESSION['errmsg']='Invalid Record ID!';
		}
	}else if($a==40){// this will search 
		$arr = array('username'=>'a');
		$jsondata=json_encode($arr);
		echo $jsondata;
	}else{
		die("Invalid operation selected!");
	}
}else{
	die('Invalid form request');
}

//functions for the users
function show_usertypes($selected = "",$connection){
	$qry="SELECT * FROM tbl_usertypes;";
	$res=mysqli_query($connection,$qry) or die(mysqli_error($connection));
	while($row=mysqli_fetch_array($res)){
		$sel = ($selected==$row['id'] ? "selected":"");
		echo '<option value="'.$row['id'].'" ' .$sel .' >'.$row['type_code'].' | '. $row['type_desc'] .'</option>'; 
	}
}
?>