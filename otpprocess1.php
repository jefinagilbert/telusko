<?php 
 session_start();
 $rndno = rand(1000,9999);
 $message = urlencode("otp number.".$rndno);
 $to = $_SESSION["otpemail"];
 $subject = "OTP";
 $txt = "OTP: ".$rndno."";
 $header = "From: TRAVELLO VERIFICATION"." Cc: Welcome";
 $done=mail($to,$subject,$txt,$header);
 if(isset($done))
 {
  $_SESSION['otp']=$rndno;
  $_SESSION["done"]=$done;
  header( "Location: otp.php" );
 }
# $header = "From: TRAVELLO VERIFICATION"."Cc: Welcome";
?>
