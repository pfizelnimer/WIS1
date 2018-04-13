<?php
//save in itp1131-finals/users_mgmt.php
	require_once('inc/ses_check.php');
	$pTitle="User main page";
	require('./components_/html_head.php');
	?>
	<script>
	$(document).ready(function() {
		$("#btn_add").click(function() {  //start for add button on click event           		
				$.ajax({  //create an ajax request to load_page.php
					type: "POST",
					url: "user_pr.php", 
					data:{
						operation:1,
						name : "xxx",
						},	
						dataType: "html",   //expect html to be returned                
						success: function(response){                    
							$("#response_container").html(response); 
							//alert(response);							
							$('#userModal').modal('show');
						}
					});
		});	// end of ajax script for add	
		$("#btn_edit").click(function() {  
			var x='';
		  if($('.rad').is(':checked')) { 
			 x=$('input[name=rad]:checked').val();
		  }				  
			if (x==''){
				
				alert("Please select an item to edit");
			}else{		
				$.ajax({    //create an ajax request to load_page.php
					type: "POST",
					url: "user_pr.php", 
					data:{
						operation:2,
						selected_id: x,
						name : "xxx",
						},	
						dataType: "html",   //expect html to be returned                
						success: function(response){                    
							$("#response_container").html(response); 
							//alert(response);							
							$('#userModal').modal('show');
						}
					});
				}
		});	// end of ajax script for edit	
		$("#btn_del").click(function() {                
		  var x='';
		  if($('.rad').is(':checked')) { 
			 x=$('input[name=rad]:checked').val();
		  }
			//alert (x);
			if (x==''){
				alert("Please select an item to delete");
			}else{		
				$.ajax({    //create an ajax request to load_page.php
					type: "POST",
					url: "user_pr.php", 
					data:{
						operation:30,
						selected_id: x,					
						},	
						dataType: "html",   //expect html to be returned                
						success: function(response){ 
							window.location.reload();
						}
					});
				}
		});	// end of ajax script for delete
		$("#btn_search").click(function() {   				
			var x=document.getElementById("txt_search").value;
				$.ajax({    //create an ajax request to load_page.php
					type: "POST",
					url: "user_pr.php", 
					data:{
						operation:40,
						search_str: x,
						limit_start:0,
						limit_end:15,
						page_no:1,	
						},	
						dataType: "json",   //expect html to be returned                
						success: function(JSONObject){                    
						//$("#displayContainer").html(response); 
						alert(JSONObject);
						}
					});
				
		});	// end of ajax script for search		
	}); 
	</script>
	</head>
	<body>
		<?php
			require('./components_/html_banner.php');
			require('./inc/mysql_conni.php');
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
			<?php
			require_once('./components_/user_panel.php');
			?>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
						
						</div>
						<div class="panel-body">
			<b><center>User Management Page</center></b>
			<hr />
<div class="row form-group"><!--begin search -->
	<div class="col-sm-4">
	
	</div>
	<div class="col-sm-4">
		<input type="text" name="txt_search" id="txt_search" placeholder="Search" class="form-control"/>
	</div>
	<div class="col-sm-4">
		<input type="button" name="btn_search" value="Search" id="btn_search" class="btn btn-primary"/>
	</div>
</div><!--end search -->
<!--begin list users -->
<table class="table table-bordered table-condensed">
	<thead>
		<tr><th>Username</th><th>Fullname</th><th>Usertype</th><th>Retries</th><th>Select</th></tr>
	</thead>
	<tbody>
		<?php
$qry="SELECT * FROM tbl_users;";
$result=mysqli_query($connection, $qry) or die(mysqli_error($connection));
while($row=mysqli_fetch_array($result)){
echo '<tr><td>'.$row['username'].'</td>';
echo '<td>'.$row['fullname'].'</td>';
echo '<td>'.$row['retries'].'</td>'; //0 becomes 5
echo '<td>'.$row['usertype'].'</td>';	
echo '<td><input type="radio" class="rad" id="rad" value="'.$row['id'].'" name="rad"/>';
echo '</td></tr>';
}
		?>
	</tbody>
</table> 

	<input type="submit" name="btn_add" id="btn_add" value="CREATE NEW" class="btn btn-primary"/>
	<input type="submit" name="btn_edit" id="btn_edit" value="EDIT " class="btn btn-primary"/>
	<input type="submit" name="btn_del" id="btn_del" value="DELETE" class="btn btn-danger"/>
<?php
	//info messages 
	if(isset($_SESSION['infomsg'])){
		echo '<br /><font color="Green">'.$_SESSION['infomsg'] .'</font>';
		unset($_SESSION['infomsg']);
	}
	//error messages
	if(isset($_SESSION['errmsg'])){
		echo '<br /><font color="Red">'.$_SESSION['errmsg'] .'</font>';
		unset($_SESSION['errmsg']);
	}	
?>
	
<!--end list users -->	
  <!---THIS WILL BE FOR THE MODAL DISPLAY-->
	 <form method="POST" action="user_pr.php" >
		<div id="response_container">
		
		</div>
	 </form>
<!-- end for jquery pap up! -->	 
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			require('./components_/html_footer.php');
		?>
	</body>
</html>	








