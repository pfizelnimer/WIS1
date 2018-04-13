<?php
session_start();
//connect to database
require_once('./includes/mysql_connect.php');
require_once('./includes/session_check.php');
require_once('./includes/general_functions.php');
$flagProceed=1;
$errMsg="";
if(isset($_POST['smb_add_user']))
{
    $uname=($_POST['username']);
    $fullname=($_POST['fullname']);
    $password=($_POST['pword']);
    $usertype=($_POST['utype']);

    if (empty($uname)) {
        $flagProceed=0;
        concatError($errMsg, "Username must not be empty!");
    }
    if (empty($fullname)) {
        $flagProceed=0;
        concatError($errMsg, "Name field must not be empty!");
    }
    if (empty($password)) {
        $flagProceed=0;
        concatError($errMsg, "Password must not be empty!");
    }
    if (empty($usertype)) {
        $flagProceed=0;
        concatError($errMsg, "User Type must not be empty!");
    }

    if ($flagProceed==1) {
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO tbl_users(username,fullname,pwd,retries,usertype) VALUES('$uname','$fullname','$password', '0',$usertype );";
            $res=mysqli_query($cnn,$sql);
            if($res){
                header('location:user_mgmt.php');
            }else{
                die(mysqli_error($cnn));
            } 
    }else{
        $_SESSION['user_error']=$errMsg;
        header('location:user_add.php');
    }
    
 }else if(isset($_POST['smb_user_edit'])) {
    $selected_id=$_POST['selected_user_id'];
    $username=$_POST['txt_user'];
    $qry="UPDATE tbl_users SET username='$username' WHERE id=$selected_id;";
    $result=mysql_query($cnn,$qry);
    if ($result) {
        $_SESSION['info_msg']="Record updated successfully!";
        header('location:user_mgmt.php');
    }else{
        die(mysqli_error($cnn));
    }

 } else if(isset($_POST['form_activity'])){
    $selected_id=$_POST['selected_user_id'];
    $sql="DELETE FROM tbl_users WHERE id=selected_user_id;";
    $res=mysqli_query($cnn,$sql);
    if ($res) {
        $_SESSION['info_msg']="Record deleted successfully!";
        header('location:user_mgmt.php');
    }else{
        die(mysqli_error($cnn));
    }
 }

?>