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
            <h2>Welcome <?php echo $row["firstname"]; ?></h2>
            <div class = "menu">
                <div class = "item"><a href = "#"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "instructor-tab/index.php"><i class = "fas fa-table"></i>Instructors</a></div>
                <div class = "item"><a href = "student-admin/index.php"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "report/index.php"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>

                    <div class="card">
                        <div class="box">
                           <?php
                                $dash_category_query = "SELECT * FROM table_student";
                                $dash_category_query_run = mysqli_query($conn, $dash_category_query);

                                if($category_total = mysqli_num_rows($dash_category_query_run))
                                {
                                    echo '<h1> '.$category_total.'</h1>';
                                }
                                else {
                                    echo '<h1> No Data </h1>';
                                }
                           ?>
                            <h3>Students</h3>
                            <div class="icon-case">
                                <img src="student.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card1">
                        <div class="box">
                            <?php
                                $dash_instructor_query = "SELECT * FROM user";
                                $dash_instructor_query_run = mysqli_query($conn, $dash_instructor_query);

                                if($instructor_total = mysqli_num_rows($dash_instructor_query_run))
                                {
                                    echo '<h1> '.$instructor_total.'</h1>';
                                }
                                else {
                                    echo '<h1> No Data </h1>';
                                }
                            ?>
                            <h3>Teachers</h3>
                            <div class="icon-case1">
                                <img src="teacher.png" alt="">
                            </div>
                        </div>
                    </div>
                     
                    

        <script type="text/javascript">
            $('.side-bar').addClass('active');
        </script>
    </body>
</html>
