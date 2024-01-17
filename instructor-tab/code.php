<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_instructor']))
{
    $id = mysqli_real_escape_string($con, $_POST['delete_instructor']);

    $query = "DELETE FROM user WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);
    echo '<script>alert("You successfully delete a record!")</script>';
    echo "<script>window.history.back()</script>";
}

if(isset($_POST['update_instructor']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $schoolyear = mysqli_real_escape_string($con, $_POST['schoolyear']);

    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', schoolyear='$schoolyear' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    echo '<script>alert("You successfully update a student!")</script>';
    echo "<script>window.history.go(-2)</script>";

}


if(isset($_POST['save_instructor']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $schoolyear = mysqli_real_escape_string($con, $_POST['schoolyear']);

    $query = "INSERT INTO user (firstname,middlename,lastname,email,username,password,schoolyear) VALUES ('$firstname','$middlename','$lastname','$email','$username','$password','$schoolyear')";

    $query_run = mysqli_query($con, $query);

    echo '<script>alert("You successfully added a student!")</script>';
    echo "<script>window.history.go(-2)</script>";
}

?>