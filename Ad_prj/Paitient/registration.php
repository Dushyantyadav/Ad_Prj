<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Customer Registration</title>
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
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Patient Registration </h1>
        <h1 style="text-align: center; font-size: 25px;">Patient Registration Form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="cfname" placeholder="Patient's First Name" required=""> <br>
          <input class="form-control" type="text" name="cfname" placeholder="Patient's Last Name" required=""> <br>
          <input class="form-control" type="text" name="clname" placeholder="House number" required=""> <br>
          <input class="form-control" type="text" name="email" placeholder="Street" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="City" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Zipcode" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Phone Number" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Date of birth" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Patient's race" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Marital Status" required=""><br>
          <input class="form-control" type="text" name="email" placeholder="Gender" required=""><br>
          <input class="form-control" type="text" name="ph_num" placeholder="Blood Group" required=""><br>
          <input class="form-control" type="text" name="id_type" placeholder="Type" required=""><br>

          
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
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

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['cust_id']==$_POST['cust_id'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO customer (cust_id, cfname, clname, ph_num, email, id_type, id_num) VALUES (?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ississi",$_POST['cust_id'], $_POST['cfname'], $_POST['clname'], $_POST['ph_num'],$_POST['email'], $_POST['id_type'], $_POST['id_num']);
          
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