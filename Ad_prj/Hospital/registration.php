<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Hospital Registration</title>
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
        <h1 style="text-align: center; font-size: 20px;font-family: Lucida Console;"> Welcome to Hospital Registration</h1>
        <h1 style="text-align: center; font-size: 15px;">Fill the details Below</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="hsp_id" placeholder="Hospital ID" required=""> <br>
          <input class="form-control" type="text" name="name" placeholder="Hospital Name" required=""> <br>
          <input class="form-control" type="text" name="street" placeholder="Street" required=""> <br>
          <input class="form-control" type="text" name="city" placeholder="City" required=""><br>
          <input class="form-control" type="text" name="state" placeholder="State" required=""><br>
          <input class="form-control" type="text" name="zipcode" placeholder="Zipcode" required=""><br>
          <input class="form-control" type="text" name="specialty" placeholder="Specialty" required=""><br>
          <input class="form-control" type="text" name="er_number" placeholder="Emergency number" required=""><br>
		      <input class="form-control" type="text" name="gn_enq_ph_no" placeholder="General Enquiry number" required=""><br>
		      <input class="form-control" type="text" name="r_adm_ph_no" placeholder="Admin phone number" required=""><br>
          
      
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT hsp_id from `ad_hospital`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['hsp_id']==$_POST['hsp_id'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_hospital (hsp_id, name, street, city, state, zipcode, specialty, er_number, gn_enq_ph_no, r_adm_ph_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?)");
          $stmt->bind_param("issssssiii",$_POST['hsp_id'], $_POST['name'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zipcode'], $_POST['specialty'], $_POST['er_number'], $_POST['gn_enq_ph_no'], $_POST['r_adm_ph_no']);
          
          $result = $stmt->execute();
          if($result){
          echo "New records created successfully";
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