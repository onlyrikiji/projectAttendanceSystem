<?php
    require '../config.php';
    if(!empty($_SESSION["id"])){
    header("Location: ../index.php");
    }

    if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
                if($row["id"]==1){
                    header("Location: ../index.php");
                }else{
                    header("Location: ../qrcode/index.php");
                }
            
            //header("Location: ../index.php");
                
        }

        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }

    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MCEC Attendance System</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class = "center">
                <img src="logo.png" style = "width: 150px; height: 150px;">
            <h1>Login to start your session</h1>
            <form class="" action="" method="post" autocomplete="off">
                <div class="txt_field"> 
                    <input type="text" name="usernameemail" id = "usernameemail" required value="">
                    <label>Username</label>
                    <span></span>
                </div>
                <div class="txt_field"> 
                    <input class="text" type="password" name="password" id = "password" required value=""> 
                    <label>Password</label>
                    <span></span>
                </div>
                <button class="button" type="submit" name="submit">Login</button>
            </form>
        </div>
    </body>