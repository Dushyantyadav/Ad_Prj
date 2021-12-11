<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Patient Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> EMERGENCY CONTACT DETAILS </h1>
        <h1 style="text-align: center; font-size: 25px;">Please Fill the details</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          
          <input class="form-control" type="text" name="er_name" placeholder="Name" required=""> <br>
          <input class="form-control" type="text" name="er_house_no" placeholder="House number" required=""> <br>
          <input class="form-control" type="text" name="er_street" placeholder="Street" required=""><br>
          <input class="form-control" type="text" name="er_city" placeholder="City" required=""><br>
          <input class="form-control" type="text" name="er_zipcode" placeholder="Zipcode" required=""><br>
          <input class="form-control" type="text" name="er_ph_no" placeholder="Phone Number" required=""><br>
          <input class="form-control" type="text" name="er_rel" placeholder="Relationship" required=""><br>
          <input class="form-control" type="text" name="pt_id" placeholder="Your id" required=""><br>
          
          
          <input class="btn btn-default" type="submit" name="submit" value="Submit" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT er_cnt_id from `ad_er_cnt`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['er_cnt_id']==$_POST['er_cnt_id'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_er_cnt( er_name, er_house_no, er_street, er_city, er_zipcode, er_ph_no, er_rel,pt_id) VALUES ( ?, ?, ?, ?, ?, ?, ?,?)");
          $stmt->bind_param("sisssisi", $_POST['er_name'], $_POST['er_house_no'], $_POST['er_street'], $_POST['er_city'], $_POST['er_zipcode'], $_POST['er_ph_no'], $_POST['er_rel'], $_POST['pt_id']);
          $result = $stmt->execute();
          if($result){
          echo "Thank You";
          }else{
            echo "Error!";
          }

          $stmt->close();
          $db->close();
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

</body>
</html>