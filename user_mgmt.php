<?php 
	//save as user_mgmt.php
	session_start();	
	require_once('./includes/session_check.php');
	require_once('./includes/mysqli_connect.php');
?>
<!doctype html>
<html>
	<head>
		<?php
			$pgTitle="User Management page";
			require_once('./components/headers.php');
		?>
	<style>
	</style>
	<script>
		function operation(op){
			if (op=="1"){
				window.location="user_add.php";
			}else if(op=="2"){
				var x = document.getElementById("selected_user_id").value;
				if(x==""){
					alert("Please select a record to edit");
				}else{
					document.userform.action="user_edit.php";
					document.userform.submit();
				}
			}else if(op==3){
			var c = confirm("Are you sure you want to delete the record?");
			if (c==true){
				var x = document.getElementById("selected_user_id").value;
				if(x==""){
					alert("Please select a record to delete.");
				}else{
					document.userform.action="user_mgmt_proccess.php";
					document.userform.submit();
				}				
			}
		}
			
		}
		function setValue(){
			var radElements = document.getElementsByName("rad_select");
			for(var i=0; i < radElements.length; i ++){
				if(radElements[i].checked==true){
			//	alert(radElements[i].value);
					document.getElementById("selected_user_id").value=radElements[i].value;
				}
			}
		}	
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
			<div class="panel panel-success">
					<div class="panel-heading">
						<strong> User Management Page </strong>
					</div>
					<div class="panel-body">
<form method="post" action="#" name="userform">
<div class="row form-group">
	<div class="col-sm-5">
		<label class="label-control">Search by:</label>
		<select name="str_srch_by" class="form-control">
			<option value="username" selected >Username</option>
			<option value="fullname">Full Name</option>
		</select>
	</div>
	<div class="col-sm-5">
		<label class="label-control">Search</label>
		<input type="text" name="str_search" class="form-control"/>
	</div>
	<div class="col-sm-2">
		<input type="submit" name="smb_search" value="Proceed"/>
	</div>
</div>
<!--added -->

	<input type="hidden" name="selected_user_id" id="selected_user_id" />
	<input type="hidden" name="form_activity" id="form_activity" value="3"/>
	

</form>
<!--display data -->
<table class="table table-hover table-bordered table-compact">
	<thead>
		<th>Username</th>
		<th>Full Name </th>
		<th>Retries</th>
		<th>Usertype </th>
		<th>Select </th>
	</thead>
	<tbody>
<?php
$qry="select * from tbl_users";	
$result=mysqli_query($cnn,$qry);
if($result){
	while($row=mysqli_fetch_array($result)){
		echo '<tr><td>'.$row['username'].'</td>';
		echo '<td>'.$row['fullname'].'</td>';
		echo '<td>'.$row['retries'].'</td>';
		echo '<td>'.$row['usertype'].'</td>';
		echo '<td><input type="radio" name="rad_select" 
			value="'.$row['id'].'" onclick="setValue()" />';
		echo '</td></tr>';
	}
}else{
	die(mysqli_error($cnn) );
}
?>
	</tbody>
</table>
<div class ="row form-group">
	<div class="col-sm-3">
		<input type="button" class="btn btn-primary" value="New" onclick="operation(1)"/>
	</div>
	<div class="col-sm-3">
		<input type="button" class="btn btn-primary" value="Edit" onclick="operation(2)"/>	
	</div>
	<div class="col-sm-3">
		<input type="button" class="btn btn-primary" value="Delete" onclick="operation(3)"/>	
	</div>
	<div class="col-sm-3">
			<input type="button" class="btn btn-primary" value="Print" onclick="operation(4)"/>
	</div>	
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