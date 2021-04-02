<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "travello";
$con = mysqli_connect($servername, $username, $password, $db);
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
$sql = "DELETE FROM booking WHERE id='$id'";
$result = mysqli_query($con,$sql);
if(isset($result)){
    header("Location:admin.php");
}

?>