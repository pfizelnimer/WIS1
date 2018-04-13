 <?php 
 //save in ite18-finals/INC/mysql_functions.php 
 //functions for the users 
 function show_usertypes($selected = "",$conn){ 
 $qry="SELECT * FROM tbl_login_types;"; 
 $res=mysqli_query($conn,$qry) or die(mysqli_error($conn)); 
 while($row=mysqli_fetch_array($res)){ 
 $sel = ($selected==$row['id'] ? "selected":""); 
 echo '<option value="'.$row['id'].'" ' .$sel .' >'.$row['type_code'].' | '. $row['type_name'] .'</option>'; 
 } 
 } 
 function checkifUserExists($username,$conn){ 
 $found = false; 
 $qry="SELECT id FROM tbl_logins WHERE username='$username';"; 
 $res = mysqli_query($conn,$qry) or die(mysqli_error($conn)); 
 if (mysqli_num_rows($res)==1) { 
 $found=true; 
 } 
 return $found; 
 } 
 ?>