<?php
//save in itp1131-finals/inc/mysql_funcs.php

function checkifUserExists($username,$connection){
	$found = false;
	$qry="SELECT id FROM tbl_users WHERE username='$username';";
	$res = mysqli_query($connection,$qry) or die(mysqli_error($connection));
	if (mysqli_num_rows($res)==1) {
		$found=true;
	}
	return $found;
}

?>