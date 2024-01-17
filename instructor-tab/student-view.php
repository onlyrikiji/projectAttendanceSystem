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
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header1">
                        <h4>Instructor View Details 
                            <a href="index.php" class="btn-back">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body2">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM user WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $instructor = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-view">
                                        <label>Instructor First Name</label>
                                        <p class="form-control">
                                            <?=$instructor['firstname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-view">
                                        <label>Instructor Last Name</label>
                                        <p class="form-control">
                                            <?=$instructor['lastname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-view">
                                        <label>Instructor Email</label>
                                        <p class="form-control">
                                            <?=$instructor['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-view">
                                        <label>Instructor School Year</label>
                                        <p class="form-control">
                                            <?=$instructor['schoolyear'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>