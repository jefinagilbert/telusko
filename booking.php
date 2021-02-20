<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Travello</title>

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
		if(count($_POST)>0) {
			if($_POST["email"] and $_POST["tele"] and $_POST["departure"] and $_POST["arrival"] and $_POST["date"]){
				$con = mysqli_connect($servername, $username, $password, $db);
				session_start();
				$_SESSION["otpemail"] = $_POST["email"];
 				$_SESSION["email"]=$_POST["email"];
 				$_SESSION["tele"]=$_POST["tele"];
				$_SESSION["departure"]=$_POST["departure"];
 				$_SESSION["arrival"]=$_POST["arrival"];
 				$_SESSION["date"]=$_POST["date"];
				$_SESSION["tell"] = count($_POST);
				header("Location:otpprocess1.php");
			}
			else{
				session_start();
				$msg = "!Have to fill every Columns";
			}
		 }
		 else{
			 session_start();
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
								<span class="form-label">Phone</span>
								<input class="form-control" type="tel" name="tele" placeholder="Enter your phone number" required="required">
							</div>
							<div class="form-group">
								<span class="form-label">Pickup Location</span>
								<input class="form-control" type="text" name="departure" placeholder="Enter Location" required="required">
							</div>
							<div class="form-group">
								<span class="form-label">Destination</span>
								<select class="form-control" name="arrival">
								<?php 
								$con = mysqli_connect($servername, $username, $password, $db);
								$sql = "select * from destination";
								$result = mysqli_query($con,$sql);
								if(isset($_GET["namenam"])){
									echo '<option value="'.$_GET["namenam"].'">'.$_GET["namenam"].'</option>';
								}
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if ($row['name'] == $_GET["namenam"]){
										//nothing bro
									}
									else{
										echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
									}
									}
								}
								?></select>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<span class="form-label">Pickup Date</span>
										<input class="form-control" type="date" name="date" required="required">
									</div>
								</div>
								<h5 style="font-size:20px; color:red; position:absolute; top:77%; left: 48%;">
									<?php echo $msg; ?>
								</h5>
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