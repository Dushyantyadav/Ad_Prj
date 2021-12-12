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
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open </span>
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
	function onClickPay(pt_id) {
		window.location = `newedit.php?qq=${pt_id}`;
	}
	function onClickPayt(pt_id) {
		window.location = `newdelete.php?qq=${pt_id}`;
	}		
	</script>
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))
		{
			//$q=mysqli_query($db,"SELECT * from rental where cust_id='$_SESSION[login_user]' ;");
			//echo "<h1>" . implode(" ",$_SESSION) . "</h1>";
			$p=mysqli_query($db,"INSERT INTO ad_invoice (inv_date, lab_cost,pres_cost,sur_cost,bed_cost,total_cost,bill_ins,cost_pat,reg_no) values (sysdate(),(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*15,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*5,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*2,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*6,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*1,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*12,(select TIMESTAMPDIFF(SECOND,(select tbl_last_dt from ad_patient ORDER BY tbl_last_dt DESC LIMIT 1),sysdate()))*11,999);") or die(mysqli_error($db));
			$q=mysqli_query($db,"SELECT * from ad_patient ;");
			$qq=mysqli_query($db,"SELECT * from ad_patient where reg_no in (select reg_no from ad_reg where pt_id=(select pt_id from ad_patient where pt_email='$_SESSION[login_user]'));");
			#$r = mysqli_fetch_assoc(mysqli_query($db,"SELECT inv_num from ad_invoice where pt_id='$_SESSION[login_user]' ORDER BY inv_num DESC LIMIT 1 ;"));
			#$inserted_id = $r['ren_id'];
			#$amt=15*0.2;
			#$r=mysqli_query($db,"INSERT INTO invoice(inv_date,inv_amt,ren_id) values (sysdate(),$amt, '$inserted_id');") or die(mysqli_error($db));
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
				
				echo "<th>"; echo "Patient ID"; echo "</th>";
				echo "<th>"; echo "Patient first name";  echo "</th>";
				echo "<th>"; echo "Patient last name";  echo "</th>";
				echo "<th>"; echo "Patient house number";  echo "</th>";
				echo "<th>"; echo "Patient street";  echo "</th>";
				echo "<th>"; echo "Patient city";  echo "</th>";
				echo "<th>"; echo "Patient Zipcode";  echo "</th>";
				echo "<th>"; echo "Patient Phone number";  echo "</th>";
				echo "<th>"; echo "Patient Birthdate";  echo "</th>";
				echo "<th>"; echo "Patient Race";  echo "</th>";
				echo "<th>"; echo "Patient Marital status";  echo "</th>";
				echo "<th>"; echo "Patient Gender";  echo "</th>";
				echo "<th>"; echo "Patient Blood group";  echo "</th>";
				echo "<th>"; echo "Patient type";  echo "</th>";
				echo "<th>"; echo "Patient email";  echo "</th>";
				echo "<th>"; echo "Patient password";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['pt_id'] ; echo "</td>";
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
				echo "<td>"; echo $row['pt_password']; echo "</td>";
				#$my_inv_no = $row['inv_num'];
				if(1){
					$myvar=$row['pt_id'];
					echo "<td> <button style='background-color: #6db6b9e6;' type='submit' name='submit1' 
					onclick=\"onClickPay($myvar)\"
					class='btn btn-default'>Edit
					</button>
					</td>";
				}
				if(1){
					$myvar=$row['pt_id'];
					echo "<td> <button style='background-color: #6db6b9e6;' type='submit' name='submit2' 
					onclick=\"onClickPayt($myvar)\"
					class='btn btn-default'>Delete
					</button>
					</td>";
				}				
				else{
					echo "<td/>";
				}
				echo "</tr>";
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