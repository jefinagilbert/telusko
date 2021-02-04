<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "travello";
    $message="";
    $result= FALSE;
	
	session_start();
	if(count($_POST)>0) {
	   $con = mysqli_connect($servername, $username, $password, $db);
	   $sql = "INSERT INTO login(Name,username,email,pass) VALUES ('" . $_POST["name"] . "','" . $_POST["username"] . "', '" . $_POST["email"] . "','" . $_POST["password"]. "')";
       $result = mysqli_query($con,$sql);
    }
	   if($result === TRUE) {
        header("Location:login.php");
        }
       
?>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="" id="signup-form" class="signup-form">
                    <h2 class="form-title">Create account on <a href="index.php" style="text-decoration: none;">Travello</a></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="email" placeholder="Your Username"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="password" placeholder="Your Email"/>                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="re_password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main1.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>