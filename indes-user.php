<?php
    require 'config.php';
    if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    }

    else{
        header("Location: ../projectAttendanceSystem/login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name = "viewport" context = "width=device-width, initial-scale=1.0">
        <title>MCEC Attendance System</title>
        <link rel = "stylesheet" href = "style-index.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset = "utf-8"></script>
    </head>
    <body>
        <div class = "menu-btn">
            <i class = "fas fa-bars"></i>
        </div>
        <div class = "side-bar">
            <div class = "close-btn">
                <i class = "fas fa-times"></i>
            </div>
            <img src="login/logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $row["firstname"]; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "#"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>`
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.menu-btn').click(function() {
                    $('.side-bar').addClass('active');
                    $('.menu-btn').css("visibility", "hidden");
                });

                $('.close-btn').click(function() {
                    $('.side-bar').removeClass('active');
                    $('.menu-btn').css("visibility", "visible");
                });
            })
        </script>
    </body>
</html>
