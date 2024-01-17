<?php
session_start();
require 'dbcon.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($con, "SELECT * FROM user WHERE ID = $id");
    $instructor = mysqli_fetch_assoc($result);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "style-student.css">
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
            <div class = "item"><a href = "../user.php"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "qrcode/index.php"><i class = "fas fa-table"></i>Instructors</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "../pdf_export/index.php"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "../logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header1">
                        <h4>Instructor Edit 
                            <a href="index.php" class="btn-back">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body1">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM table_student WHERE ID ='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="ID" value="<?= $student['ID']; ?>">

                                    <div class="mb-3">
                                        <label>Student's Name</label>
                                        <input type="text" name="Name" value="<?=$student['Name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Number</label>
                                        <input type="text" name="CONTACTNUMBER" value="<?=$student['CONTACTNUMBER'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Section</label>
                                        <input type="text" name="SECTION" value="<?=$student['SECTION'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn-update">
                                            Update Instructor
                                        </button>
                                    </div>

                                </form>
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