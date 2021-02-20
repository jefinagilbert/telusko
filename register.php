<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>


    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


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
       $sql1 = "SELECT * FROM login WHERE username='" . $_POST["username"] . "'";
       $result1 = mysqli_query($con,$sql1);
       $row  = mysqli_fetch_array($result1);
       if(isset($row)){
        header("Location:register.php?msg=Username Already exist");
       }
	   $sql = "INSERT INTO login(Name,username,email,pass) VALUES ('" . $_POST["name"] . "','" . $_POST["username"] . "', '" . $_POST["email"] . "','" . $_POST["password"]. "')";
       $result = mysqli_query($con,$sql);
    }
	if($result === TRUE) {
        header("Location:login.php");
        }
       
?>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="" id="signup-form" class="signup-form">
                    <h2 class="form-title">Create account on <a href="index.php" style="text-decoration: none;">Travello</a></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required="required"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="email" placeholder="Your Username" required="required"/>
                            <?php if(isset($_GET["msg"])){
                            echo "<label for='username' style='color:red; font-weight:bold;'>".$_GET['msg']."</label>";
                        } ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="password" placeholder="Your Email" required="required"/>                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="re_password" placeholder="Password" required="required"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required="required"/>
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

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main1.js"></script>
</body>
</html>