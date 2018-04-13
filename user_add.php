<?php
session_start();
require_once('./components/banners.php');
require_once('./includes/session_check.php');
require_once('/includes/mysql_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		$pgTitle="User Management page";
		require_once('./components/headers.php');
	?>
	<style>
		
	</style>
	<script>
		
	</script>
</head>
<body>
	<?php
		require_once('./components/banners.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			<?php
				require_once('./components/user_panel.php');
			?>	
			</div>
			<div class="col-sm-8">
				<!-- this is for the content menu-->
			<div class="panel panel-success">
				<div class="panel-heading">
					<strong>Create New User</strong>
				</div>
				<div class="panel-body">
					<form method="POST" action="user_add_process.php">
					
						<div>
							<label class="label-control">Username</label>
							<input type="text" name="username" class="form-control" required/><br>
							<label class="label-control">Fullname</label>
							<input type="text" name="fullname" class="form-control" required/><br>
							<label class="label-control">Password</label>
							<input type="Password" name="pword" class="form-control" required/><br>
							<label class="label-control">User Type</label>
							<select name="utype" class="form-control" required>
							<option disabled selected>Choose User Type</option>
 							<?php
								$qry= "SELECT * FROM tbl_usertypes;";
								$result=mysqli_query($cnn, $qry);
								if($result){
									while($row=mysqli_fetch_array($result)){
										echo '<option value="'.$row['id'].'">'.$row['type_code'].'</option>';
									}
								}else {
									die(mysqli_error($cnn) );
								}
								?>
							</select><br>
							<input type="submit" name="smb_add_user" value="Save" class="btn btn-primary" />
							<a href="user_mgmt.php" class="btn btn-success">Back</a>
							<input type="hidden" name="activity" value="1">
						</div>
						
					
					</form>
					<div class="row form-group">
					<?php
						if(isset($_SESSION['user_error'])){
							echo $_SESSION['user_error'];
							unset($_SESSION['user_error']);
						}
							?>
					
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<?php
		require_once('./components/footers.php');
	?>
</body>
</html>