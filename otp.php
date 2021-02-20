<!DOCTYPE html>
<html lang="en">
<head>
	<title>OTP Verification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css">

</head>
<body>
<?php
session_start();
if(isset($_POST['save']))
{
 $rno=$_SESSION['otp'];
 $urno=$_POST['otpvalue'];
 if(!strcmp($rno,$urno))
 {	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "travello";
	$con = mysqli_connect($servername, $username, $password, $db);
	$_SESSION["status"] = "pending";
	date_default_timezone_set("Asia/Calcutta");
	$currdate = date("y/m/d");
	$currtime = date("h:i:sa");
	$sql = "INSERT INTO booking(name,email,tele,departure,arrival,currdate,currtime,date,status) VALUES ('" . $_SESSION["name"] . "','" . $_SESSION["email"] . "','" . $_SESSION["tele"] . "','" . $_SESSION["departure"] . "','" . $_SESSION["arrival"] . "','" . $currdate . "','" . $currtime . "','" . $_SESSION["date"] . "','" . $_SESSION["status"] . "')";
	$result = mysqli_query($con,$sql);
	if($result>0){
		header("Location:otpsuccess.php");
	}
	else{
		header("Location:index.php");
	}
 }
 else{
	 echo "Invalid OTP";
 }
}
?>
	
	<div class="limiter">
		<div class="container-login100">
			
			<div class="wrap-login100">			
				<h1 style="font-weight:bold; position:absolute; top:17%; left:43%; user-select:none;">TRAVELLO</h1>	
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title" style="font-size:20px;">
						OTP send to <?php echo $_SESSION["otpemail"]; ?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="otpvalue" placeholder="Enter OTP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="save">
							Confirm
						</button>
					</div>

					<div class="text-center p-t-12">
						
						<a class="txt2" href="otpprocess1.php">
							Resend OTP
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main2.js"></script>

</body>
</html>