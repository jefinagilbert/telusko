<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Travello Admin Modify</title>
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

    if(isset($_POST["submitalter"])){
            if(is_uploaded_file($_FILES['alterimage']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['alterimage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['alterimage']['tmp_name']);
                $sql="UPDATE destination SET name='".$_POST["place_name"]."',price='".$_POST["price"]."',offer='".$_POST["exist"]."',image='".$imgData."',title='".$_POST["desc"]."' WHERE placeid='".$_SESSION["placeid"]."'";
                $result = mysqli_query($conn,$sql);
                unset($_SESSION["placeid"]);
                header("Location:admindashboard.php");
            }  
            else{
                $sql = "UPDATE destination SET name='".$_POST["place_name"]."',price='".$_POST["price"]."',offer='".$_POST["exist"]."',title='".$_POST["desc"]."' WHERE placeid='".$_SESSION["placeid"]."'";   
                $result = mysqli_query($conn,$sql);
                unset($_SESSION["placeid"]);
                header("Location:admindashboard.php");
            }
        }


    if(isset($_POST["submit"])){
        $_SESSION["placeid"] = $_POST["select"];
        $sql = "select * from destination where placeid='".$_POST["select"]."'";
        $result = mysqli_query($conn,$sql);
    }

    function destoffer($offer){
        if($offer == 1){
            return "<div class='spec_offer text-center'><a href=''>Special Offer</a></div>";
        }
        else{
            return "";
        }
    }
    function offer1($off){
        if($off==1){
            return 'checked="checked"';
        }
        else{
            return "";
        }
    }
    function offer2($off){
        if($off==0){
            return 'checked="checked"';
        }
        else{
            return "";
        }
    }

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {


    ?>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"><a href="admindashboard.php" style="text-decoration: none; color:white; ">TRAVELLO</a> ADMIN MODIFY</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-row m-b-55">
                            <div class="name">NAME</div>
                            <div class="value">    
                                <div class="input-group-desc">
                                    <input class="input--style-5" type="text" name="place_name" value="<?php echo $row['name']; ?>">                                           
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">DESCRIPTION</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="desc" value="<?php echo $row['title']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">PRICE</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="price" value="<?php echo $row['price'];  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">IMAGE</div>
                            <div class="value">
                                <div class="input-group">
                                <input class="input--style-5" type="file" name="alterimage"  multiple accept="image/*">
                                <label class="label--desc">Image should be below 100KB and this column is Optional</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">WANT TO ADD OFFER?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" name="exist" <?php echo offer1($row['offer']); ?> value="1" >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist" <?php echo offer2($row['offer']);}} ?> >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn--radius-2 btn--red" name="submitalter" type="submit">
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