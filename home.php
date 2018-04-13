<?php 
	//home.php
	session_start();	
	require_once('./includes/session_check.php');
?>
<!doctype html>
<html>
	<head>
		<?php
			$pgTitle="Home page";
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
			<!--this is for the panels -->
			<?php
require_once('./components/user_panel.php');
			?>
			</div>
			<div class="col-sm-8">
			<!--this is for contents/menu-->
			
			<a href="user_mgmt.php" class="btn btn-primary">User Management</a>
			</div>
		</div>
	</div>
	
	<?php
		require_once('./components/footers.php');
	?>
</body>
</html>