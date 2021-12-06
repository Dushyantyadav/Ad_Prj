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
 				$q=mysqli_query($db,"SELECT * FROM ad_patient where pt_email='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">Patient's Profile</h2>

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
	 						echo $row['pt_fst_name'];
	 					echo "</td>";
	 				echo "</tr>";
					
		


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_last_name'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Phone Number: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['ph_num'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> email </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> ID Type: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['id_type'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> ID NUmber: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['id_num'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>