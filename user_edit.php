<?php 
	//user_edit.php
	session_start();	
	require_once('./includes/session_check.php');
?>
<!doctype html>
<html>
	<head>
		<?php
			$pgTitle="user-edit page";
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
		require_once('./includes/mysqli_connect.php');
		//retrieve selected id from previous page
		$user_id=$_POST['selected_user_id'];
		$qry="SELECT * FROM tbl_users WHERE id=$user_id;";
		$result=mysqli_query($cnn,$qry);
		if($result){
			if(mysqli_num_rows($result)==1){
				$userrow=mysqli_fetch_array($result);
			}else{
				die("Record not found!");
			}
		}else{
			die(mysqli_error($cnn));
		}
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			<!--this is for the panels -->
			<?php
require_once('./components/user_panel.php');
			?>
			</div>
			<div class="col-sm-8">
			<!--this is for contents/menu-->
			<h3>Update User </h3>
			<form method="post" action="user_mgmt_proccess.php">
			
			<div class="row form-group">
				<div class="col-sm-2">
				<label class="form-label">Username </label>
				</div>
				<div class="col-sm-6">
					<input type="text" name="txt_user" required class="form-control" placeholder="Username" value="<?=$userrow['username'];?>" />
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-2">
				<label class="form-label">Full Name</label>
				</div>
				<div class="col-sm-6">
					<input type="text" name="txt_fullname" required class="form-control" placeholder="Full Name" value="<?=$userrow['username'];?>" />
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-4">
				
				</div>
				<div class="col-sm-8">
					<input type="submit" name="smb_user_edit" value="UPDATE" class="btn btn-primary"/>
					<a href="user_mgmt.php" class="btn btn-success">BACK </a>
					<input type="hidden" name="activity" value="2" />
					<input type="hidden" name="selected_id" value="<?=$userrow['id'];?>"/>
				</div>
			</div>			
			</form>
			
			<div class="row form-group">
			<?php 
			if(isset($_SESSION['user_error'] )){
				echo $_SESSION['user_error'];
				unset($_SESSION['user_error']);
			}
			
			?>
			</div>
		</div>
	</div>
	
	<?php
		require_once('./components/footers.php');
	?>
</body>
</html>