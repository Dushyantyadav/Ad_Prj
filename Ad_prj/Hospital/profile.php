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


 				$q=mysqli_query($db,"SELECT * FROM author where email='$_SESSION[login_user]' ;");
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
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['afname'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['alname'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['at_id'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> House Number: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['h_no'];
	 					echo "</td>";
	 				echo "</tr>";
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> City: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['city'];
	 					echo "</td>";
	 				echo "</tr>";
						 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> State: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['state'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Country: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['cntry'];
	 					echo "</td>";
	 				echo "</tr>";
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Zip Code: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['z_code'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>