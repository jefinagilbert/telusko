<!DOCTYPE html>
<html lang="en">
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "travello";
$con = mysqli_connect($servername, $username, $password, $db);
session_start();
if(isset($_POST["submit"])) {
    if(is_uploaded_file($_FILES['uploadimage']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['uploadimage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['uploadimage']['tmp_name']);
    }
    else{
        header("Location:../index.php");
    }
   $sql = "INSERT INTO destination(name,price,offer,image,title) VALUES('" . $_POST["place_name"] . "','" . $_POST["price"] . "','" . $_POST["offer"] . "','" . $imgData . "','" . $_POST["title"] . "')";
   $result = mysqli_query($con,$sql);
   if(isset($result)){
       header("Location:admindashboard.php");
   }
   else{
       header("Location:adminupload.php");
   }
}  
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Travello Admin Place Uploads</title>

    <!-- Icons font CSS-->
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/mainadlog.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"><a href="admindashboard.php" style="text-decoration: none; color:white; ">TRAVELLO</a> ADMIN UPLOADS</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-row m-b-55">
                            <div class="name">NAME</div>
                            <div class="value">    
                                <div class="input-group-desc">
                                    <input class="input--style-5" type="text" name="place_name" value="" required="required">                                           
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">DESCRIPTION</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="title" value="" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">PRICE</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="price" value="" required="required">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">IMAGE</div>
                            <div class="value">
                                <div class="input-group">
                                <input class="input--style-5" type="file" name="uploadimage"  multiple accept="image/*" required="required">
                                <label class="label--desc">Image should be below 500KB</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">WANT TO ADD OFFER?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="offer" value="1" required="required">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="offer" value="0" required="required">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" name="submit" type="submit">UPLOAD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../js/global.js"></script>

</body>

</html>
<!-- end document-->