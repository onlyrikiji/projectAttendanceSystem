<?php
session_start();
require 'dbcon.php';

if(isset($_POST['update_student']))
{
    $id = mysqli_real_escape_string($con, $_POST['ID']);
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $CONTACTNUMBER = mysqli_real_escape_string($con, $_POST['CONTACTNUMBER']);
    $SECTION = mysqli_real_escape_string($con, $_POST['SECTION']);

    $query = "UPDATE table_student SET Name='$Name', CONTACTNUMBER='$CONTACTNUMBER', SECTION='$SECTION' WHERE ID='$id' ";
    $query_run = mysqli_query($con, $query);

}
echo '<script>alert("You successfully update a student!")</script>';
echo "<script>window.history.go(-2)</script>";
?>