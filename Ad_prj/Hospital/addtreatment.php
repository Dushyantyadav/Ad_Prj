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
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Add treatment</h1>
        <h1 style="text-align: center; font-size: 25px;">Treatment entry form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          
          <input class="form-control" type="text" name="trt_date" placeholder="Treatment date" required=""> <br>
          <input class="form-control" type="text" name="trt_type" placeholder="Treatment type" required=""> <br>
          <input class="form-control" type="text" name="trt_rst_st" placeholder="Treatment status" required=""> <br>
          <input class="form-control" type="text" name="trt_desc" placeholder="Treatment description" required=""><br>
          <input class="form-control" type="text" name="pt_id" placeholder="Patient to be treated" required=""><br>
          <input class="form-control" type="text" name="d_id" placeholder="Doctor to be assigned" required=""><br>
          <input class="form-control" type="text" name="icd" placeholder="ICD number" required=""><br>
          
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT trt_id from `ad_treatment`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['trt_id']==$_POST['trt_id'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_treatment ( trt_date, trt_type, trt_rst_st, trt_desc, pt_id, d_id, icd) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssiii", $_POST['trt_date'], $_POST['trt_type'], $_POST['trt_rst_st'], $_POST['trt_desc'], $_POST['pt_id'], $_POST['d_id'], $_POST['icd']);
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