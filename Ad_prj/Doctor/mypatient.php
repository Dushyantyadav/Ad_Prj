<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Patient List</title>
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
</script>
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Search Patient.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>


	<h2>Patient List</h2>
	<?php
		ini_set('display_errors', 'Off');

		if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from ad_patient where pt_fst_name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Patient found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Patient's ID";	echo "</th>";
				echo "<th>"; echo "Patient's Lirst Name";  echo "</th>";
				echo "<th>"; echo "Patient's Last Name";  echo "</th>";
				echo "<th>"; echo "Patient's house number";  echo "</th>";
				echo "<th>"; echo "Patient's street";  echo "</th>";
				echo "<th>"; echo "Patient's City";  echo "</th>";
				echo "<th>"; echo "Patient's Zipcode";  echo "</th>";
				echo "<th>"; echo "Patient's Phone number";  echo "</th>";
				echo "<th>"; echo "Patient's birth date";  echo "</th>";
				echo "<th>"; echo "Patient's Race";  echo "</th>";
				echo "<th>"; echo "Patient's Marital status";  echo "</th>";
				echo "<th>"; echo "Patient's Gender";  echo "</th>";
				echo "<th>"; echo "Patient's blood group";  echo "</th>";
				echo "<th>"; echo "Patient's type";  echo "</th>";
				echo "<th>"; echo "Patient's email";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['pt_id']; echo "</td>";
				echo "<td>"; echo $row['pt_fst_name']; echo "</td>";
				echo "<td>"; echo $row['pt_lst_name']; echo "</td>";
				echo "<td>"; echo $row['pt_house_no']; echo "</td>";
				echo "<td>"; echo $row['pt_street']; echo "</td>";
				echo "<td>"; echo $row['pt_city']; echo "</td>";
				echo "<td>"; echo $row['pt_zipcode']; echo "</td>";
				echo "<td>"; echo $row['pt_ph_no']; echo "</td>";
				echo "<td>"; echo $row['pt_b_date']; echo "</td>";
				echo "<td>"; echo $row['pt_race']; echo "</td>";
				echo "<td>"; echo $row['pt_mar_stat']; echo "</td>";
				echo "<td>"; echo $row['pt_gen']; echo "</td>";
				echo "<td>"; echo $row['pt_bld_grp']; echo "</td>";
				echo "<td>"; echo $row['pt_type']; echo "</td>";
				echo "<td>"; echo $row['pt_email']; echo "</td>";


				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `ad_dept` ORDER BY `ad_dept`.`dept_name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Dept. Name";  echo "</th>";
				echo "<th>"; echo "Phone Number";  echo "</th>";
				echo "<th>"; echo "Floor";  echo "</th>";
				echo "<th>"; echo "Building";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['dept_id']; echo "</td>";
				echo "<td>"; echo $row['dept_name']; echo "</td>";
				echo "<td>"; echo $row['dept_ph_no']; echo "</td>";
				echo "<td>"; echo $row['dept_floor']; echo "</td>";
				echo "<td>"; echo $row['dept_bld']; echo "</td>";
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
				$_SESSION['dept_id'] = $_POST['dept_id'];
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