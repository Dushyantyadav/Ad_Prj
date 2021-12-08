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
			$hname=$row['name'];
			$street=$row['street'];
			$city=$row['city'];
			$state=$row['state'];
			$zipcode=$row['zipcode'];
			$spec=$row['specialty'];
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
		<input class="form-control" type="text" name="name" value="<?php echo $hname; ?>">

		<label><h4><b>Street</b></h4></label>
		<input class="form-control" type="text" name="street" value="<?php echo $street; ?>">

		<label><h4><b>City</b></h4></label>
		<input class="form-control" type="text" name="city" value="<?php echo $city; ?>">

		<label><h4><b>State</b></h4></label>
		<input class="form-control" type="text" name="state" value="<?php echo $state; ?>">

		<label><h4><b>Zipcode</b></h4></label>
		<input class="form-control" type="text" name="zipcode" value="<?php echo $zipcode; ?>">

		<label><h4><b>Specialty</b></h4></label>
		<input class="form-control" type="text" name="specialty" value="<?php echo $spec; ?>">
		
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

			$hname=$row['name'];
			$street=$row['street'];
			$city=$row['city'];
			$state=$row['state'];
			$zipcode=$row['zipcode'];
			$spec=$row['specialty'];
			$emer=$row['er_number'];
			$gnenq=$row['gn_enq_ph_no'];
			$radm=$row['r_adm_ph_no'];
			$email=$row['h_email'];
			$passw=$row['h_password'];

			$sql1= "UPDATE ad_hospital SET name='$hname', street='$street', city='$city', state='$state', zipcode='$zipcode', specialty='$spec', er_number='$emer', gn_enq_ph_no='$gnenq', r_adm_ph_no='$radm', h_email='$email', h_password='$passw' WHERE h_email='".$_SESSION['login_user']."';";

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

