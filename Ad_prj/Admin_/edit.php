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
<body style="background-color: #006bff;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM ad_admin WHERE ademailid='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['fstname'];
			$last=$row['lstname'];
			$password=$row['adpassword'];
			$email=$row['ademailid'];
			$contact=$row['adcontactno'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">



		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="fstname" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="lstname" value="<?php echo $last; ?>">


		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="adpassword" value="<?php echo $password; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="ademailid" value="<?php echo $email; ?>">

		<label><h4><b>Contact No</b></h4></label>
		<input class="form-control" type="text" name="adcontactno" value="<?php echo $contact; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{

			$first=$_POST['fstname'];
			$last=$_POST['lstname'];
			$password=$_POST['adpassword'];
			$email=$_POST['ademailid'];
			$contact=$_POST['adcontactno'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE ad_admin SET fstname='$first', lstname='$last',adpassword='$password', ademailid='$email', adcontactno='$contact' WHERE ademailid='".$_SESSION['login_user']."';";

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

