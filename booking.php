<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style1.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
<?php 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "travello";
		$message="";
		$result= FALSE;
		if(count($_POST)>0) {
			$con = mysqli_connect($servername, $username, $password, $db);
			session_start();
			$sql = "INSERT INTO booking(name,email,tele,arrival,departure,date) VALUES ('" . $_SESSION["name"] . "','" . $_POST["email"] . "','" . $_POST["tele"] . "','" . $_POST["arrival"] . "', '" . $_POST["departure"] . "','" . $_POST["date"]. "')";
			$result = mysqli_query($con,$sql);
		 }
		 if($result==TRUE){
			 header("Location:index.php");
		 }	
?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1><a href="index.php">Travello</a></h1>
						</div>
						<form method="POST" action="">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Name</span>
										<label class="form-control"><?php session_start(); echo $_SESSION["name"]; ?></label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" name="email" placeholder="Enter your email">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Phone</span>
								<input class="form-control" type="tel" name="tele" placeholder="Enter your phone number">
							</div>
							<div class="form-group">
								<span class="form-label">Pickup Location</span>
								<input class="form-control" type="text" name="arrival" placeholder="Enter Location">
							</div>
							<div class="form-group">
								<span class="form-label">Destination</span>
								<select class="form-control" name="departure" ><?php 
								$con = mysqli_connect($servername, $username, $password, $db);
								$sql = "select * from destination";
								$result = mysqli_query($con,$sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {

										echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
									}
								}
								?></select>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<span class="form-label">Pickup Date</span>
										<input class="form-control" type="date" name="date" required>
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>