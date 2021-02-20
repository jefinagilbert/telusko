<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travello Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "travello";
	$message="";
	
	session_start();
	if(count($_POST)>0) {
	   $con = mysqli_connect($servername, $username, $password, $db);
	   $sql = "SELECT * FROM login WHERE username='" . $_POST["username"] . "' and pass = '". $_POST["password"]."'";
	   $result = mysqli_query($con,$sql);
	   $row  = mysqli_fetch_array($result);
	   if(is_array($row)) {
	   $_SESSION["username"] = $row['username'];
	   $_SESSION["email"] = $row['email'];
	   $_SESSION["name"] = $row['Name'];
	   } else {
	   $message = "Invalid Username or Password!";
	   }
	   }
	   if(isset($_SESSION["username"])) {
	   header("Location:index.php");
	   }
?>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
			<h4 style="text-align:center; position:absolute; top:10px; left:46%; color:red; font-weight:bold;"><?php   
			if(isset($_GET['message'])){
				echo $_GET['message'];
			}
			?></h4>
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<a href="index.php">
					<span class="login100-form-title p-b-34 p-t-27">
						Travello
					</span>
					</a>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<label class="label-checkbox50">
							<?php echo $message; ?>
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="register.php">
							Dont have an account!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

</body>
</html>