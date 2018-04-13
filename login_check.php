<?php
	session_start();
	require_once('./inc/mysql_conni.php');
	require_once('./inc/general_functions.php');
	
	if(isset($_POST['btn_submit'])){
		if(isset($_POST['txt_user']) && isset($_POST['txt_pass'])){
			$user=trim($_POST['txt_user']);
			$passw=trim($_POST['txt_pass']);
			if(!empty($user) && !empty($passw)){
				$qry="SELECT * FROM tbl_users WHERE username='$user';";
				$result=mysqli_query($connection,$qry) or die("unable to execute sql statement" .mysqli_error($connection));
				if(mysqli_num_rows($result)==1){
					$row=mysqli_fetch_array($result);
					if($row['retries'] < 6){
						if(md5($passw)==$row['password']){
							//reset the retries to zero 
							$sql="UPDATE tbl_users SET retries = 0 WHERE id =". $row['id'].";";
$res=mysqli_query($connection,$sql) or die(mysqli_error($connection));
							session_regenerate_id();
							$_SESSION['UID']=$row['id'];
							$_SESSION['UFULLNAME']=$row['fullname'];
							$_SESSION['USERNAME']=$row['username'];
							gotoHome();
						}else{
							$_SESSION['errormsg']='<font color="red">Invalid password. Remaining retries: </font>';
							//increment retries 
								$sql="UPDATE tbl_users SET retries = retries + 1 WHERE id =". $row['id'].";";
								$sql="UPDATE tbl_users SET retries = retries + 1 WHERE id =". $row['id'].";";
$res=mysqli_query($connection,$sql) or die(mysqli_error($connection));
							gotoLogin();							
						}
					}else{
						$_SESSION['errormsg']='<font color="red">Account is locked! </font>';
						gotoLogin();						
					}
				}else{
					$_SESSION['errormsg']='<font color="red">User does not exists!</font>';
					gotoLogin();					
				}
			}else{
				$_SESSION['errormsg']='<font color="red">Username and password must not be empty!</font>';
				gotoLogin();				
			}
		}else{
			$_SESSION['errormsg']='<font color="red">Username and password must not be empty!</font>';
			gotoLogin();
		}
	}else{
		$_SESSION['errormsg']='Invalid form request';
		gotoLogin();
	}
	
?>