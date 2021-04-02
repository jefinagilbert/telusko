<html>
<head>
<title>OTP Success</title>
</head>
<body>
<h1>Booked Successfully</h1>
<br>
<?php
session_start();
if(isset($_SESSION["email"])){
    //nothing
}
else{
    header("location:index.php");
}
?>
<a href="display.php">Booking list</a>
<br>
<br>
<a href="index.php">back to home-></a>
</body>
</html>