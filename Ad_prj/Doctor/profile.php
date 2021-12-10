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
 <body style="background-color: #004528; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
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
 				$q=mysqli_query($db,"SELECT * FROM ad_doctor where d_email='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

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
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['d_fst_name'];
	 					echo "</td>";
	 				echo "</tr>";
					
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_lst_name'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Office Phone: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_ofc_no'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Personal Number </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_pr_no'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Specialty </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_speciality'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Doctor Type </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_type'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
					 echo "<td>";
						 echo "<b> Email </b>";
					 echo "</td>";
					 echo "<td>";
						 echo $row['d_email'];
					 echo "</td>";
				 echo "</tr>";

				 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['d_password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>