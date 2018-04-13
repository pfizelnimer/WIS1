<?php
	session_start();
	if(isset($_SESSION['errormsg'])){
		$errmsg =$_SESSION['errormsg'];
		unset ($_SESSION['errormsg']);
	}
	$pTitle="Login page";
	require('./components_/html_head.php');
?>
		<script>
			function validate(){
			//	alert ("this is the validation");
				var username = document.forms["form_login"]["txt_user"].value;
				var password = document.forms["form_login"]["txt_pass"].value;
				if (username == null || username.trim() == "") {
					alert ("Username must be not be blank!");
					return false;
				}
				if (password == null || password == "" ){
					alert ("Password must not be blank!");
					return false;
				}
			}
		</script>
	</head>
	<body>
		<div class="container">
		<?php
			require('./components_/html_banner.php');
		?>
		<div class="row">

			<div class="col-sm-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3>Please Login </h3>
					</div>
					<div class="panel-body">
						<form method="post" action="login_check.php" name="form_login" onsubmit="validate()" >
						<label class="form-label"> Username : </label>
						<input class="form-control" type="text" name="txt_user" /> <br /> <br />
						<label class="form-label"> Password : </label>
						<input class="form-control" type="password" name="txt_pass" /> <br />
						<hr />
						<input type="submit" value="login" name="btn_submit" class="btn btn-primary" />
						<input type="reset" value="clear" class="btn btn-warning" />
						</form>
						<?php
							echo (isset($errmsg)? $errmsg : "");
						?>	
					</div><!--close of panel-body -->
				</div><!--close of panel -->
			</div><!--close of div col-sm-4 -->	
			<div class="col-sm-8">
			<p>
				Access to this site is being monitored. Authorized users are only allowed to login.
			</p>
			</div> <!--close div of col-sm-8 -->
		</div><!--closee div of row -->
		<?php
			require('./components_/html_footer.php');
		?>
	</div><!--close div of container -->
	</body>
</html>