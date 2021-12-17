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
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Create new registration </h1>
        <h1 style="text-align: center; font-size: 25px;">Below are the details</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          
          <input class="form-control" type="text" name="reg_no" placeholder="Registration number" required=""> <br>
          <input class="form-control" type="text" name="pt_id" placeholder="Patient ID" required=""> <br>
          
          
          <input class="btn btn-default" type="submit" name="submit" value="Submit" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT reg_no from `ad_reg`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['reg_no']==$_POST['reg_no'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_reg ( reg_no, pt_id) VALUES ( ?, ?)");
          $stmt->bind_param("ii", $_POST['reg_no'], $_POST['pt_id']);
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
              alert("The registation already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>