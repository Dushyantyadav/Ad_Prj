<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Doctor Registration</title>
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
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Doctor Registration </h1>
        <h1 style="text-align: center; font-size: 25px;">Doctor Registration Form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="d_id" placeholder="Doctor ID" required=""> <br>
          <input class="form-control" type="text" name="d_fst_name" placeholder="Doctor's First Name" required=""> <br>
          <input class="form-control" type="text" name="d_lst_name" placeholder="Doctor's Last Name" required=""> <br>
          <input class="form-control" type="text" name="d_ofc_no" placeholder="Doctor's office number" required=""> <br>
          <input class="form-control" type="text" name="d_pr_no" placeholder="Doctor's personal number" required=""><br>
          <input class="form-control" type="text" name="d_speciality" placeholder="Speciality" required=""><br>
          <input class="form-control" type="text" name="d_type" placeholder="Doctor type" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT d_id from `ad_doctor`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['d_id']==$_POST['d_id'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_doctor (d_id, d_fst_name, d_lst_name, d_ofc_no, d_pr_no, d_speciality, d_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("issiiss",$_POST['d_id'], $_POST['d_fst_name'], $_POST['d_lst_name'], $_POST['d_ofc_no'], $_POST['d_pr_no'], $_POST['d_speciality'], $_POST['d_type']);
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