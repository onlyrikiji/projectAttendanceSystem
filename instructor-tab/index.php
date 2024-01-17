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
    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <title>MCEC Attendance System</title>
</head>
<body>
    <div class = "side-bar">
            <img src="logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $instructor['firstname']; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "../index.php"><i class = "fas fa-desktop"></i>Dashboard</a></div>
                <div class = "item"><a href = "#"><i class = "fas fa-table"></i>Instructors</a></div>
                <div class = "item"><a href = "../student-admin/index.php"><i class = "fas fa-th"></i>Students</a></div>
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
                        <h4>Instructor Details
                            <a href="instructor-create.php" class="btn-add">Add Instructor</a>
                        </h4>
                        
                    </div>
                    <div class="card-body">

                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>School year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM user";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $instructor)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $instructor['firstname']; ?></td>
                                                <td><?= $instructor['lastname']; ?></td>
                                                <td><?= $instructor['email']; ?></td>
                                                <td><?= $instructor['schoolyear']; ?></td>
                                                <td>
                                                    <a href="instructor-view.php?id=<?= $instructor['id']; ?>" class="btn-view"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="instructor-edit.php?id=<?= $instructor['id']; ?>" class="btn-edit"><i class="fa-solid fa-user-pen"></i></a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_instructor" value="<?=$instructor['id'];?>" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
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