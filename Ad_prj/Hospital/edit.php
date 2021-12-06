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
		
		$sql = "SELECT * FROM author WHERE email='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['afname'];
			$last=$row['alname'];
			$email=$row['email'];
			$password=$row['at_id'];
			$house_no=$row['h_no'];
			$city=$row['city'];
			$state=$row['state'];
			$country=$row['cntry'];
			$zip_code=$row['z_code'];
			
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="afname" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="alname" value="<?php echo $last; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="at_id" value="<?php echo $password; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="h_no" value="<?php echo $house_no; ?>">

		<label><h4><b>City</b></h4></label>
		<input class="form-control" type="text" name="city" value="<?php echo $city; ?>">
		
		<label><h4><b>State</b></h4></label>
		<input class="form-control" type="text" name="state" value="<?php echo $state; ?>">
		
		<label><h4><b>Country</b></h4></label>
		<input class="form-control" type="text" name="cntry" value="<?php echo $country; ?>">
		
		<label><h4><b>Zip Code</b></h4></label>
		<input class="form-control" type="text" name="z_code" value="<?php echo $zip_code; ?>">
		

		
		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{

			$first=$_POST['afname'];
			$last=$_POST['alname'];
			$email=$_POST['email'];
			$password=$_POST['at_id'];
			$house_no=$_POST['h_no'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$country=$_POST['cntry'];
			$zip_code=$_POST['z_code'];

			$sql1= "UPDATE author SET afname='$first', alname='$last', email='$email', at_id='$password', h_no='$house_no', city='$city', state='$state', cntry='$country' WHERE email='".$_SESSION['login_user']."';";

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

