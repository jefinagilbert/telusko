<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Travello</title>

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="css/style1.css" />

</head>

<body>
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "travello";
	$msg="";
	$result= FALSE;
	session_start();
	if(isset($_SESSION["username"])){
		if(count($_POST)>0) {
			if($_POST["email"] and $_POST["tele"] and $_POST["departure"] and $_POST["date"] and $_POST["nooftravellers"] and $_GET["namenam"]){
				$con = mysqli_connect($servername, $username, $password, $db);
				$_SESSION["plid"] = $_GET["plid"];		
				$_SESSION["otpemail"] = $_POST["email"];
				$_SESSION["tele"]=$_POST["tele"];
				$_SESSION["departure"]=$_POST["departure"];
				$_SESSION["arrival"]=$_GET["namenam"];
				$_SESSION["date"]=$_POST["date"];
				$_SESSION["nooftravellers"] = $_POST["nooftravellers"];
				header("Location:otpprocess1.php");
			}
			else{
				$msg = "!Have to fill every Columns";
			}
	 	}
	}
	else{
		header("Location:index.php");
	}
?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1><a style="color:yellow; font-family: 'Oswald', sans-serif;" href="index.php">Travello</a></h1>
						</div>
						<form method="POST" action="">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Name</span>
										<label class="form-control"><?php echo $_SESSION["name"]; ?></label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" name="email" placeholder="Enter your email" required="required">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">CONTACT NUMBER</span>
								<input class="form-control" type="tel" name="tele" placeholder="Enter your phone number" required="required">
							</div>
							<div class="form-group">
								<span class="form-label">Pickup Location (YOUR ADDRESS)</span>
								<input class="form-control" type="text" name="departure" placeholder="Enter Location" required="required">
							</div>
							<div class="form-group">
								<span class="form-label">Destination</span>
								<?php 
								$con = mysqli_connect($servername, $username, $password, $db);
								$sql = "select * from destination";
								$result = mysqli_query($con,$sql);
								if(isset($_GET["namenam"])){
									echo '<label class="form-control">'.$_GET["namenam"].'</label>';
								}
								?>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<span class="form-label">No. of Travellers</span>
										<input class="form-control" type="number" min="2" max="15" name="nooftravellers" required="required">
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										<span class="form-label">Pickup Date</span>
										<input class="form-control" min="<?php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d",strtotime("+30days")); ?>" type="date" name="date" required="required">	
									</div>
								</div>                
							</div>
							<div class="form-btn">
								<button class="submit-btn">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>