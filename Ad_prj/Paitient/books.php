<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/PP.JPG".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"><a href="invoice.php">Invoice Details</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; SHOW MORE</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Search Treatment" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="book_id" placeholder="Enter treatment ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Generate Invoice				</button>
		</form>
	</div>


	<h2>List of Treatments</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from ad_treatment where trt_id like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No current treatment found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Treatment ID";	echo "</th>";
				echo "<th>"; echo "Treatment date";  echo "</th>";
				echo "<th>"; echo "Treatment type";  echo "</th>";
				echo "<th>"; echo "Treatment Unknown ";  echo "</th>";
				echo "<th>"; echo "Treatment Description ";  echo "</th>";
				echo "<th>"; echo "Patient ID";  echo "</th>";
				echo "<th>"; echo "Doctor ID";  echo "</th>";
				echo "<th>"; echo "ICD Code";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['trt_id']; echo "</td>";
				echo "<td>"; echo $row['trt_date']; echo "</td>";
				echo "<td>"; echo $row['trt_type']; echo "</td>";
				echo "<td>"; echo $row['trt_rst_st']; echo "</td>";
				echo "<td>"; echo $row['trt_desc']; echo "</td>";
				echo "<td>"; echo $row['pt_id']; echo "</td>";
				echo "<td>"; echo $row['d_id']; echo "</td>";
				echo "<td>"; echo $row['icd']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `ad_treatment`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Treatment ID";	echo "</th>";
				echo "<th>"; echo "Treatment date";  echo "</th>";
				echo "<th>"; echo "Treatment type";  echo "</th>";
				echo "<th>"; echo "Treatment result status ";  echo "</th>";
				echo "<th>"; echo "Treatment description ";  echo "</th>";
				echo "<th>"; echo "Patient ID";  echo "</th>";
				echo "<th>"; echo "Doctor ID";  echo "</th>";
				echo "<th>"; echo "ICD Code";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['trt_id']; echo "</td>";
				echo "<td>"; echo $row['trt_date']; echo "</td>";
				echo "<td>"; echo $row['trt_type']; echo "</td>";
				echo "<td>"; echo $row['trt_rst_st']; echo "</td>";
				echo "<td>"; echo $row['trt_desc']; echo "</td>";
				echo "<td>"; echo $row['pt_id']; echo "</td>";
				echo "<td>"; echo $row['d_id']; echo "</td>";
				echo "<td>"; echo $row['icd']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				//mysqli_query($db,)
				//mysqli_query($db,"INSERT INTO rental(ren_stat,br_date,e_ret_d,cust_id) values('Borrowed',sysdate,sysdate+15,'$_SESSION['login_user']');");
				//mysqli_query($db,"INSERT INTO rental(ren_stat,br_date,e_ret_d,cust_id,copy_id) values ('Borrowed',sysdate(),sysdate()+15,'$_SESSION['login_user']',(select copy_id from copies where book_id='$_POST[search]'));");
				$_SESSION['trt_id'] = $_POST['trt_id'];
				var_dump($_POST);
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>