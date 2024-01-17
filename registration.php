<?php
require 'config.php';
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $schoolyear = $_POST["schoolyear"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email already taken'); </script>";
    }
    else {
        if($password == $confirmpassword) {
            $query = "INSERT INTO user VALUES('', '$username','$password','$confirmpassword','$firstname','$middlename','$lastname','$email','$position','$schoolyear')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful'); </script>";
            header("Location: index.php");
        }
        else {
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title>
            Registration
        </title>
    </head>

    <body>
        <h2>Registration</h2>
        <form class="" action="" method="post" autocomplete="off">
            <div class="txt_field"> 
                <input type="text" name="username" id = "username" required value="">
                <label>Username: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="password" id = "password" required value="">
                <label>Password: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="confirmpassword" id = "confirmpassword" required value="">
                <label>Confirm Password: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="firstname" id = "firstname" required value="">
                <label>First Name: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="middlename" id = "middlename" required value="">
                <label>Middle Name: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="lastname" id = "lastname" required value="">
                <label>Last Name: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="email" id = "email" required value="">
                <label>Email: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="position" id = "position" required value="">
                <label>Position: </label>
                <span></span>
            </div>
            <div class="txt_field"> 
                <input type="text" name="schoolyear" id = "schoolyear" required value="">
                <label>School Year: </label>
                <span></span>
            </div>
            <button class="button" type="submit" name="submit">Register</button>
        </form>
        <a href = "index.php"></a>
    </body>
</html>