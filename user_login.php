<?php 
	//user_login.php 
	session_start();
?>
<!doctype html>
<html>
	<head>
		<?php
			$pgTitle="User login page";
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
			<div class="col-sm-8">
			&nbsp;
			</div><!--end of col-sm-8 -->
			<div class="col-sm-4">
			&nbsp;
				<div class="panel panel-success">
					<div class="panel-heading">
						<strong>Please Login </strong>
					</div><!--end p heading -->
					<div class="panel-body">
						<form method="post" action="user_login_process.php">
							<div class="row form-group">
								<div class="col-sm-4">
									<label class="label-control">
									Username
									</label>
								</div>
								<div class="col-sm-8">
									<input type="text" name="txt_uname" required class="form-control"/>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-sm-4">
									<label class="label-control">
									Password
									</label>
								</div>
								<div class="col-sm-8">
									<input type="password" name="txt_pword" required class="form-control"/>
								</div>
							</div>	
							<div class="row form-group">
								<div class="col-sm-4">
									&nbsp;
								</div>
								<div class="col-sm-4">
									<input type="submit" name="smb_login" value="Login" class="btn btn-primary" />
								</div>
								<div class="col-sm-4">
									<input type="reset" name="smb_login" value="clear" class="btn btn-danger"/>
								</div>								
							</div>	
<div class="row form-group">
	<div class="col-sm-12 ">
		<label class="label-control danger">
		<?php
			if(isset($_SESSION['error']) ){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
		?>
		</label>
	</div>
</div>							
						</form>
					</div>
				</div><!--end panel-success
			</div> <!--end of col-sm-4 -->
		</div><!-- end of row -->
	</div> <!--end of container -->
	
	<?php
		require_once('./components/footers.php');
	?>
</body>
</html>