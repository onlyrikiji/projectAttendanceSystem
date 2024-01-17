<?php
// database connection code
if(isset($_POST['txtName']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','qrcodedb');

// get the post records

$name = $_POST['txtName'];
$studentid = $_POST['txtstudentid'];
$txtContactNumber = $_POST['txtContactNumber'];
$txtSection = $_POST['txtSection'];

// database insert SQL code
$sql = "INSERT INTO `table_student` (`ID`, `Name`, `STUDENTID`, `CONTACTNUMBER`, `SECTION`) VALUES ('0', '$name', '$studentid', '$txtContactNumber', '$txtSection')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo '<script>alert("You successfully added a student!")</script>';
}

}
else
{
	echo '<script>alert("Not recorded!")</script>';
	
}
echo "<script>window.history.back()</script>";
	
?>
