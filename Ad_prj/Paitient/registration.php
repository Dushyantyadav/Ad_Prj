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
          <input class="form-control" type="text" name="pt_fst_name" placeholder="Patient's First Name" required=""> <br>
          <input class="form-control" type="text" name="pt_lst_name" placeholder="Patient's Last Name" required=""> <br>
          <input class="form-control" type="text" name="pt_house_no" placeholder="House number" required=""> <br>
          <input class="form-control" type="text" name="pt_street" placeholder="Street" required=""><br>
          <input class="form-control" type="text" name="pt_city" placeholder="City" required=""><br>
          <input class="form-control" type="text" name="pt_zipcode" placeholder="Zipcode" required=""><br>
          <input class="form-control" type="text" name="pt_ph_no" placeholder="Phone Number" required=""><br>
          <input class="form-control" type="text" name="pt_b_date" placeholder="Date of birth" required=""><br>
          <input class="form-control" type="text" name="pt_race" placeholder="Patient's race" required=""><br>
          <input class="form-control" type="text" name="pt_mar_stat" placeholder="Marital Status" required=""><br>
          <input class="form-control" type="text" name="pt_gen" placeholder="Gender" required=""><br>
          <input class="form-control" type="text" name="pt_bld_grp" placeholder="Blood Group" required=""><br>
          <input class="form-control" type="text" name="pt_type" placeholder="Type" required=""><br>

          
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        #$sql="SELECT pt_id from `ad_patient`";
        #$res=mysqli_query($db,$sql);

        #while($row=mysqli_fetch_assoc($res))
        #while(1)
        #{
          #if($row['pt_id']==$_POST['pt_id'])
         # {
            #$count=$count+1;
          #}
        #}
        if($count==0)
        {
          $stmt = $db->prepare("INSERT INTO ad_patient (pt_fst_name, pt_lst_name, pt_house_no, pt_street, pt_city, pt_zipcode, pt_ph_no, pt_b_date,pt_race,pt_mar_stat,pt_gen,pt_bld_grp,pt_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssisssissssss",$_POST['pt_fst_name'], $_POST['pt_lst_name'], $_POST['pt_house_no'], $_POST['pt_street'],$_POST['pt_city'], $_POST['pt_zipcode'], $_POST['pt_ph_no'],$_POST['pt_b_date'],$_POST['pt_race'], $_POST['pt_mar_stat'], $_POST['pt_gen'], $_POST['pt_bld_grp'], $_POST['pt_type']);
          
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