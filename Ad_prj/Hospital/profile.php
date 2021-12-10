<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #004598; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 			if(isset($_POST['submit1']))
 			{
 				?>
 				<script type="text/javascript">
 					window.location="edit.php"
 				</script>
 				<?php
 			}


 				$q=mysqli_query($db,"SELECT * FROM ad_hospital where h_email='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/pp.jpg".$_SESSION['pic']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['h_name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Street </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_street'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> City </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_city'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> State </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_state'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Zipcode </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_zipcode'];
	 					echo "</td>";
	 				echo "</tr>";
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Specialty </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_specialty'];
	 					echo "</td>";
	 				echo "</tr>";
						 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Emergency Number </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['er_number'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> General Enquiry Number </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['gn_enq_ph_no'];
	 					echo "</td>";
	 				echo "</tr>";
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Admin Phone Number </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['r_adm_ph_no'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_email'];
	 					echo "</td>";
	 				echo "</tr>";
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Your Password </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>