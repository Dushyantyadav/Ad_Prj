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
	 						echo $row['pt_lst_name'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Apt/House Number: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_house_no'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Street: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_street'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> City: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_city'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Zipcode: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_zipcode'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Phone </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_ph_no'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Date of Birth </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_b_date'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Race </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_race'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Marital Status </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_mar_stat'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Gender </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_gen'];
	 					echo "</td>";
	 				echo "</tr>";

				    echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Blood Group </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_bld_grp'];
	 					echo "</td>";
	 				echo "</tr>";

					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Patient Type </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['pt_type'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>