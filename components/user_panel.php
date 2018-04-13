<?php

?>
<div class="panel panel-success">
	<div class="panel-heading">
		<strong>User Information</strong>
	</div>
	<div class="panel-body">
		<label class="label-control">
		Username: <?=$userN;?>
		</label></br>
		<label class="label-control">
		Fullname: <?=$userFull;?>
		</label></br>
		<a href="change_pwd.php" class="btn btn-primary">Change password</a>
		<a href="user_logout.php" class="btn btn-danger">Logout</a><br/>
		<a href="home.php">Back to Home</a>
	</div>
</div>