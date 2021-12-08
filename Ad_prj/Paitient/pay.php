<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
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
	function onClickPay(inv_num) {
		window.location = `/pay.php?q=${inv_num}`;
	}
	
	</script>
	<br><br>
	<section>
  <div class="">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Pay Your Fine</h1>
        <h1 style="text-align: center; font-size: 25px;">Enter the Payment details</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="pm_method" placeholder="Payment Method" required=""> <br>
          <input class="form-control" type="text" name="crd_h_fname" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="crd_h_lname" placeholder="Last Name" required=""><br>
          <input class="form-control" type="text" name="pmt_amt" placeholder="Payment amount" required=""><br>
          
          <input class="btn btn-default" type="submit" name="submit" value="Pay" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT cust_id from `customer`";
        $res=mysqli_query($db,$sql);
        if($count==0)
        {
          $inv_num = (int)$_GET['q'];
		  $pp="INSERT INTO payments (pm_date,pm_method, crd_h_fname, crd_h_lname, pm_amt,inv_no) values (sysdate(),'$_POST[pm_method]','$_POST[crd_h_fname]','$_POST[crd_h_lname]','$_POST[pmt_amt]',$inv_no);";
	
		  $r=mysqli_query($db,"INSERT INTO payments (pm_date,pm_method, crd_h_fname, crd_h_lname, pm_amt,inv_no) values (sysdate(),'$_POST[pm_method]','$_POST[crd_h_fname]','$_POST[crd_h_lname]','$_POST[pmt_amt]',$inv_no);") or die(mysqli_error($db));
		  
		  $lr=mysqli_query($db,"UPDATE invoice set pay_status='Paid' where inv_no=$inv_no");
		  //$stmt = $db->prepare("INSERT INTO invoice (pay_status) VALUES ('Paid') where inv_no=?");
		  //$stmt->bind_param("i",$_GET['q']);
		  //$result = $stmt->execute();
		  //$stmt = $db->prepare("INSERT INTO payments (pm_method, crd_h_fname, crd_h_lname, pm_amt) VALUES (?, ?, ?, ?)");
          //$stmt->bind_param("sssi",$_POST['pm_method'], $_POST['crd_h_fname'], $_POST['crd_h_lname'], $_POST['pmt_amt']);


          // $res = mysqli_query($db,"INSERT INTO customer VALUES('$_POST[customer_id]', '$_POST[f_name]', '$_POST[l_name]', '$_POST[email]', '$_POST[phone]', '$_POST[id_type]', '$_POST[id_number]');");
        
        ?>
          <!---<script type="text/javascript">
           alert("Registration successful");
          </script>-->
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>
	</div>
</div>
</body>
</html>