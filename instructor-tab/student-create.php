<?php
session_start();
require 'dbcon.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($con, "SELECT * FROM user WHERE id = $id");
    $instructor = mysqli_fetch_assoc($result);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "style-instructor.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset = "utf-8"></script>

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <title>MCEC Attendance System</title>
</head>
<body>
        <div class = "side-bar">
            <img src="logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $instructor['firstname']; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "../index.php"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-table"></i>Instructors</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-info-circle"></i>Activity Log</a></div>
                <div class = "item"><a href = "../logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header1">
                        <h4>Instructor Add 
                            <a href="index.php" class="btn-back">BACK</a>
                        </h4>
                        
                    </div>
                    <div class="card-body1">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Instructor First Name</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor Middle Name</label>
                                <input type="text" name="middlename" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor Last Name</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Instructor School Year</label>
                                <input type="text" name="schoolyear" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_instructor" class="btn-save1">Save Instructor</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
