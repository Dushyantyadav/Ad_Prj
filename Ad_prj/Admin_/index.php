<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		We Offer Wellness
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
	}
</style>
</head>


<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="images/hi.png">
			<h1 style="color: white;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp We Offer Wellness</h1>
		</div>
		

		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">TREATMENTS</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
						<li><a href="topics.php">TOPICS</a></li>
						<li><a href="rooms.php">ROOMS</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="logout.php">LOGOUT</a></li>						
					</ul>
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">TREATMENTS</a></li>
								<li><a href="admin_login.php">LOGIN</a></li>
								<li><a href="registration.php">SIGN-UP</a></li>
								<li><a href="feedback.php">FEEDBACK</a></li>
							</ul>
						</nav>
		<?php
		}
			
		?>

		
		</header>
		<section>
		<div class="sec_img">
			<br><br><br>
			<!--<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to our hospital</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Open 24 x 7 </h1><br>
			</div> -->
		</div>
		</section>
	

	</div>
	<?php  

		include "footer.php";
	?>
</body>
</html>