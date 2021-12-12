<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Are you sure you want to delete record for the mentioned patient?</h2>
	<?php
		$myhe = (int)$_GET['qq'];
		$sql = "SELECT * FROM ad_patient WHERE pt_id=$myhe";
		$result = mysqli_query($db,$sql) or die (mysql_error());
		$sqlol = "SELECT pt_fst_name FROM ad_patient WHERE pt_id=$myhe";
		$resultlol = mysqli_query($db,$sqlol) or die (mysql_error());
		$newvar1=mysqli_fetch_assoc($resultlol);
		$finalvar=$newvar1['pt_fst_name'];

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;"></span>	
		<h4 style="color: white;"><?php echo $finalvar; ?></h4>
		<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	function onClickPay(my_inv_no) {
		window.location = `/newedit.php?qq=${my_inv_no}`;
	}
	
	</script>
	</div><br><br>
	
	<div style="padding-left: 650px;">
			<button class="btn btn-default" type="submit" name="submit11">Delete</button></div>
	</div>
	<?php

		if(isset($_POST['submit11']))
		{
			$sql111= "DELETE FROM ad_patient WHERE pt_id=$myhe;";

			if(mysqli_query($db,$sql111))
			{
				?>
					<script type="text/javascript">
						alert("Deleted Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>

