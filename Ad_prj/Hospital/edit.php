<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
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

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM ad_hospital WHERE h_email='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$hsp_id=$row['hsp_id'];
			$hname=$row['h_name'];
			$street=$row['h_street'];
			$city=$row['h_city'];
			$state=$row['h_state'];
			$zipcode=$row['h_zipcode'];
			$spec=$row['h_specialty'];
			$emer=$row['er_number'];
			$gnenq=$row['gn_enq_ph_no'];
			$radm=$row['r_adm_ph_no'];
			$email=$row['h_email'];
			$passw=$row['h_password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<label><h4><b>Name </b></h4></label>
		<input class="form-control" type="text" name="hsp_id" value="<?php echo $hsp_id; ?>">
		
		<label><h4><b>Name </b></h4></label>
		<input class="form-control" type="text" name="h_name" value="<?php echo $hname; ?>">

		<label><h4><b>Street</b></h4></label>
		<input class="form-control" type="text" name="h_street" value="<?php echo $street; ?>">

		<label><h4><b>City</b></h4></label>
		<input class="form-control" type="text" name="h_city" value="<?php echo $city; ?>">

		<label><h4><b>State</b></h4></label>
		<input class="form-control" type="text" name="h_state" value="<?php echo $state; ?>">

		<label><h4><b>Zipcode</b></h4></label>
		<input class="form-control" type="text" name="h_zipcode" value="<?php echo $zipcode; ?>">

		<label><h4><b>Specialty</b></h4></label>
		<input class="form-control" type="text" name="h_specialty" value="<?php echo $spec; ?>">
		
		<label><h4><b>Emergency Number</b></h4></label>
		<input class="form-control" type="text" name="er_number" value="<?php echo $emer; ?>">
		
		<label><h4><b>General Enquiry Number</b></h4></label>
		<input class="form-control" type="text" name="gn_enq_ph_no" value="<?php echo $gnenq; ?>">
		
		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="h_email" value="<?php echo $email; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="h_password" value="<?php echo $passw; ?>">
		

		
		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{

			$hsp_id=$POST['hsp_id'];
			$hname=$POST['h_name'];
			$street=$POST['h_street'];
			$city=$POST['h_city'];
			$state=$POST['h_state'];
			$zipcode=$POST['h_zipcode'];
			$spec=$POST['h_specialty'];
			$emer=$POST['er_number'];
			$gnenq=$POST['gn_enq_ph_no'];
			$radm=$POST['r_adm_ph_no'];
			$email=$POST['h_email'];
			$passw=$POST['h_password'];

			$sql1= "UPDATE ad_hospital SET hsp_id = '$hsp_id', h_name='$hname', h_street='$street', h_city='$city', h_state='$state', h_zipcode='$zipcode', h_specialty='$spec', er_number='$emer', gn_enq_ph_no='$gnenq', r_adm_ph_no='$radm', h_email='$email', h_password='$passw' WHERE h_email='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>

