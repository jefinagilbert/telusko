<html>
<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
</style>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION["username"])){
			$servername = "localhost";
      $username = "root";
      $password = "";
      $db = "travello";
      $con = mysqli_connect($servername, $username, $password, $db);
      $sql = "select * from booking where name ='".$_SESSION["name"]."'";
      $result = mysqli_query($con,$sql);
		}
    else{
      header("Location:index.php");
    }
?>

<table id="t01">
<tr>
    <th>Name</th>
    <th>Email</th> 
    <th>Telephone</th>
    <th>Departure</th>
    <th>Arrival</th>
    <th>Date</th>
    <th>Booked Date</th>
    <th>Booked Time</th>
    <th>No of Travellers</th>
    <th>Allotted Car</th>
    <th>Cost</th>
    <th>Status</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  echo '
  <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["tele"].'</td>
    <td>'.$row["departure"].'</td>
    <td>'.$row["arrival"].'</td>
    <td>'.$row["date"].'</td>
    <td>'.$row["currdate"].'</td>
    <td>'.$row["currtime"].'</td>
    <td>'.$row["nooftravellers"].'</td>
    <td>'.$row["allottedcar"].'</td>
    <td>'.$row["cost"].'<br><a href="#">Pay Online</a></td>
    <td>'.$row["status"].'</td>
  </tr>';
    }}
    else{
        echo '';
    }
    mysqli_close($con);
?>
</table>
<br>
<br>
<a href="index.php">Back to home-></a>
</body>
</html>
