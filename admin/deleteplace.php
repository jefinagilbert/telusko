<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "travello";
    $conn = mysqli_connect($servername, $username, $password, $db);
    session_start();
	if(isset($_SESSION["adminuname"])){
		//nothing bro
	}
	else{
		header("Location:../index.php");
	}
    if(isset($_POST["submit"])){
        $sql = "DELETE FROM destination WHERE placeid='".$_POST["select"]."'";
        $result = mysqli_query($conn,$sql);
        if(isset($result)){
            header("Location:admindashboard.php");
        }
        else{
            header("Location:displayplacetodelete.php");
        }
    }
?>