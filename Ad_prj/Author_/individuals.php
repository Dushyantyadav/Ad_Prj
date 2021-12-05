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

</div>

<div id="main">


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
function onClickPay() 
{
	window.location = `event.php`;
}

</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
		<style>	

</style>
			
		</form>
	</div>
    
</div>

	<h2>List Of Individual Sponsors</h2>
	<?php
	

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from individual where ename like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Event ID";	echo "</th>";
				echo "<th>"; echo "Event Name";	echo "</th>";
				echo "<th>"; echo "Event Type";  echo "</th>";
				echo "<th>"; echo "Event Start Date";  echo "</th>";
				echo "<th>"; echo "Event Stop Date";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['e_id']; echo "</td>";
				echo "<td>"; echo $row['ename']; echo "</td>";
				echo "<td>"; echo $row['etype']; echo "</td>";
				echo "<td>"; echo $row['s_date']; echo "</td>";
				echo "<td>"; echo $row['st_date']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `individual` ORDER BY `individual`.`in_id` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Individual ID";	echo "</th>";
				echo "<th>"; echo "Individual First Name";	echo "</th>";
				echo "<th>"; echo "Individual Last Name";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['in_id']; echo "</td>";
				echo "<td>"; echo $row['fname']; echo "</td>";
				echo "<td>"; echo $row['lname']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
		}


	?>
</div>
</body>
</html>