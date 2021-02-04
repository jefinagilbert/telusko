<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "travello";
$conn = mysqli_connect($servername, $username, $password, $db);
$kd = $_GET["id"];
if($_GET["sta1"] == 1){

    $sql = "UPDATE booking SET status='accepted' where id='$kd'";
    if(mysqli_query($conn,$sql)){
        $to = $_SESSION["otpemail"];
        $subject = "Status";
        $txt = "Your Tour Booking is Accepted. For more details Contact our Website http://localhost/travello";
        $header = "From: TRAVELLO VERIFICATION"." Cc: Welcome";
        mail($to,$subject,$txt,$header);
        header('Location:admin.php');
   } 
}
elseif($_GET["sta2"] == 0){
    $sql = "UPDATE booking SET status='declined' where id='$kd'";
    if(mysqli_query($conn,$sql)){
        $to = $_SESSION["otpemail"];
        $subject = "Status";
        $txt = "Your Tour Booking is Declined. For more details Contact our Website http://localhost/travello";
        $header = "From: TRAVELLO VERIFICATION"." Cc: Welcome";
        mail($to,$subject,$txt,$header);
        header('Location:admin.php');
       }
}



?>