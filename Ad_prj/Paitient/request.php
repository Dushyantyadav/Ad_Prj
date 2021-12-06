<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice Generation Request</title>
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

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/pp.jpg".$_SESSION['pic']."'>";
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
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div class="container">


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
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))
		{
			//$q=mysqli_query($db,"SELECT * from rental where cust_id='$_SESSION[login_user]' ;");
			//echo "<h1>" . implode(" ",$_SESSION) . "</h1>";
			$p=mysqli_query($db,"INSERT INTO ad_invoice (inv_date, lab_cost,pres_cost,sur_cost,bed_cost,total_cost,bill_ins,cost_pat,reg_no) values (sysdate(),(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,999);") or die(mysqli_error($db));
			$q=mysqli_query($db,"SELECT * from rental where cust_id='$_SESSION[login_user]' ;"); 
			$r = mysqli_fetch_assoc(mysqli_query($db,"SELECT ren_id from rental where cust_id='$_SESSION[login_user]' ORDER BY ren_id DESC LIMIT 1 ;"));
			$inserted_id = $r['ren_id'];
			$amt=15*0.2;
			$r=mysqli_query($db,"INSERT INTO invoice(inv_date,inv_amt,ren_id) values (sysdate(),$amt, '$inserted_id');") or die(mysqli_error($db));
			//echo "<h1>".$p."</h1>";
			if(mysqli_num_rows($q)==0)
			{
				echo "There's no pending request";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Rental-ID";  echo "</th>";
				echo "<th>"; echo "Copy-ID";  echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['ren_id']; echo "</td>";
				echo "<td>"; echo $row['copy_id']; echo "</td>";
				echo "<td>"; echo $row['ren_stat']; echo "</td>";
				echo "<td>"; echo $row['br_date']; echo "</td>";
				echo "<td>"; echo $row['e_ret_d']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2><b>";
			echo " Please login first to see the request information.";
			echo "</b></h2>";
		}
		?>
	</div>
</div>
</body>
</html>