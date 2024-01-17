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
    <link rel = "stylesheet" href = "style-student.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset = "utf-8"></script>
    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <title>MCEC Attendance System</title>
</head>
<body>
    <div class = "side-bar">
            <img src="logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $instructor['firstname']; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "../qrcode/index.php"><i class = "fas fa-table"></i>Attendance</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "../report/index.php"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "../logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="../qr generator/contact.html" class="btn-add">Add Student</a>
                            <a href="view-all.php" class="btn-add" style = "margin-right:10px;">View All List</a>
                        </h4>
                        
                    </div>
                    <div class="card-body">

                    <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    <th>Section</th>
                                    <th>TIME IN</th>
                                    <th>TIME OUT</th>
                                    <th>DATE</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                             
                                    $query ="SELECT table_student.ID, table_attendance.LOGDATE, table_student.Name, table_student.STUDENTID, table_student.SECTION,table_attendance.TIMEIN,
                                    table_attendance.TIMEOUT FROM table_attendance INNER JOIN table_student ON table_attendance.CONTACTNUMBER=table_student.CONTACTNUMBER ";

                                    $query_run = mysqli_query($con, $query);
                                 
                                  

                                    if(mysqli_num_rows($query_run) > 0)
                                    {

                                       
                                   
                                        foreach($query_run as $student )  
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['Name']; ?></td>
                                                <td><?= $student['STUDENTID']; ?></td>
                                                <td><?= $student['SECTION']; ?></td>
                                                <td><?= $student['TIMEIN']; ?></td>
                                                <td><?= $student['TIMEOUT']; ?></td>
                                                <td><?= $student['LOGDATE']; ?></td>
                                            
                                                <td>
                                                    <a href="student-view.php?id=<?= $student['ID']; ?>" class="btn-view"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="student-edit.php?id=<?= $student['ID']; ?>" class="btn-edit"><i class="fa-solid fa-user-pen"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility");
    </script>

</body>
</html>