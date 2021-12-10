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

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM ad_patient WHERE pt_email='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['pt_fst_name'];
			$last=$row['pt_lst_name'];
			$house=$row['pt_house_no'];
			$street=$row['pt_street'];
			$city=$row['pt_city'];
			$zipcode=$row['pt_zipcode'];
			$contact=$row['pt_ph_no'];
			$dob=$row['pt_b_date'];
			$race=$row['pt_race'];
			$marital=$row['pt_mar_stat'];
			$gender=$row['pt_gen'];
			$bloodgrp=$row['pt_bld_grp'];
			$ptype=$row['pt_type'];
			$email=$row['pt_email'];
			$password=$row['pt_password'];

		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="pt_fst_name" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="pt_lst_name" value="<?php echo $last; ?>">

		<label><h4><b>Apt/House Number</b></h4></label>
		<input class="form-control" type="text" name="pt_house_no" value="<?php echo $house; ?>">

		<label><h4><b>Street</b></h4></label>
		<input class="form-control" type="text" name="pt_street" value="<?php echo $street; ?>">

		<label><h4><b>City</b></h4></label>
		<input class="form-control" type="text" name="pt_city" value="<?php echo $city; ?>">

		<label><h4><b>Zipcode</b></h4></label>
		<input class="form-control" type="text" name="pt_zipcode" value="<?php echo $zipcode; ?>">

		<label><h4><b>Phone</b></h4></label>
		<input class="form-control" type="text" name="pt_ph_no" value="<?php echo $contact; ?>">

		<label><h4><b>Date of Birth </b></h4></label>
		<input class="form-control" type="text" name="pt_b_date" value="<?php echo $dob; ?>">

		<label><h4><b>Race</b></h4></label>
		<input class="form-control" type="text" name="pt_race" value="<?php echo $race; ?>">

		<label><h4><b>Marital Status</b></h4></label>
		<input class="form-control" type="text" name="pt_mar_stat" value="<?php echo $marital; ?>">

		<label><h4><b>Gender</b></h4></label>
		<input class="form-control" type="text" name="pt_gen" value="<?php echo $gender; ?>">

		<label><h4><b>Blood Group</b></h4></label>
		<input class="form-control" type="text" name="pt_bld_grp" value="<?php echo $bloodgrp; ?>">

		<label><h4><b>Patient type</b></h4></label>
		<input class="form-control" type="text" name="pt_type" value="<?php echo $ptype; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="pt_email" value="<?php echo $email; ?>">

		<label><h4><b>Update Password</b></h4></label>
		<input class="form-control" type="password" name="pt_password" value="<?php echo $password; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/pp.png".$_FILES['file']['name']);

			$first=$_POST['pt_fst_name'];
			$last=$_POST['pt_lst_name'];
			$house=$_POST['pt_house_no'];
			$street=$_POST['pt_street'];
			$city=$_POST['pt_city'];
			$zipcode=$_POST['pt_zipcode'];
			$contact=$_POST['pt_ph_no'];
			$dob=$_POST['pt_b_date'];
			$race=$_POST['pt_race'];
			$marital=$_POST['pt_mar_stat'];
			$gender=$_POST['pt_gen'];
			$bloodgrp=$_POST['pt_bld_grp'];
			$ptype=$_POST['pt_type'];
			$email=$_POST['pt_email'];
			$password=$_POST['pt_password'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE ad_patient SET pt_fst_name='$first', pt_lst_name='$last', pt_house_no='$house', pt_street='$street', pt_city='$city', pt_zipcode='$zipcode',pt_ph_no='$contact', pt_b_date='$dob', pt_race='$race', pt_mar_stat='$marital', pt_gen='$gender', pt_bld_grp='$bloodgrp', pt_type='$ptype', pt_email='$email', pt_password='$password'WHERE pt_email='".$_SESSION['login_user']."';";

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

