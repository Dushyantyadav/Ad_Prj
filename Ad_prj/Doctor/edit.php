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
		
		$sql = "SELECT * FROM ad_doctor WHERE d_email ='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['d_fst_name'];
			$last=$row['d_lst_name'];
			$ofc=$row['d_ofc_no'];
			$pr=$row['d_pr_no'];
			$spec=$row['d_speciality'];
			$dtype=$row['d_type'];
			$email=$row['d_email'];
			$dpassw=$row['d_password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="d_fst_name" value="<?php echo $first; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="d_lst_name" value="<?php echo $last; ?>">

		<label><h4><b>Office Phone Number</b></h4></label>
		<input class="form-control" type="text" name="d_ofc_no" value="<?php echo $ofc; ?>">

		<label><h4><b>Personal Phone Number</b></h4></label>
		<input class="form-control" type="text" name="d_pr_no" value="<?php echo $pr; ?>">

		<label><h4><b>Speciality</b></h4></label>
		<input class="form-control" type="text" name="d_speciality" value="<?php echo $spec; ?>">

		<label><h4><b>Doctor Type</b></h4></label>
		<input class="form-control" type="text" name="d_type" value="<?php echo $dtype; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="d_email" value="<?php echo $email; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="d_password" value="<?php echo $dpassw; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/pp.png".$_FILES['file']['name']);

			$first=$POST['d_fst_name'];
			$last=$POST['d_lst_name'];
			$ofc=$POST['d_ofc_no'];
			$pr=$POST['d_pr_no'];
			$spec=$POST['d_speciality'];
			$dtype=$POST['d_type'];
			$email=$POST['d_email'];
			$dpassw=$POST['d_password'];

			$sql1= "UPDATE ad_doctor SET d_fst_name='$first', d_lst_name='$last', d_ofc_no='$ofc', d_pr_no='$pr', d_speciality='$spec', d_type='$dtype', d_email='$email', d_password='$dpassw' WHERE d_email='".$_SESSION['login_user']."';";

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

