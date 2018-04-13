<?php
//save in itp1131-finals/home.php
	require_once('inc/ses_check.php');
	$pTitle="My Home page";
	require('./components_/html_head.php');
	?>
	</head>
	<body>
		<?php
			require('./components_/html_banner.php');
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				<?php
		require_once('./components_/user_panel.php');
				?>
				</div>
				<div class="col-sm-8">
					<strong> Choose what do you want to do </strong>
					<hr />
					<a href="users_mgmt.php"> Users </a>
				</div>
			</div>
		</div>
		<?php
			require('./components_/html_footer.php');
		?>
	</body>
</html>	








