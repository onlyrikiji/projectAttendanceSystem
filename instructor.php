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
        <div class = "side-bar">
            <img src="login/logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $row["firstname"]; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "#"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-table"></i>Instructors</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-info-circle"></i>Activity Log</a></div>
                <div class = "item"><a href = "logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>

        <div class = "card-body">
            <div class = "table-responsive">
                <table class = "table table-bordered">
                    <thead>
                        <tr>
                            <th scope = "col">First Name</th>
                            <th scope = "col">Middle Name</th>
                            <th scope = "col">Last Name</th>
                            <th scope = "col">Email</th>
                            <th scope = "col">School Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'config.php';
                        $query1 = mysqli_query($conn, "SELECT * FROM user");
                        while(@$row=mysqli_fetch_array($query1))
                        {

                        }
                        ?>

                        <tr>
                            <td></td>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['middlename'];?></td>
                            <td><?php echo $row['lastname'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['schoolyear'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
                        

        

        <script type="text/javascript">
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
        </script>
    </body>
</html>