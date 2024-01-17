<?php 
session_start();

$con = mysqli_connect("localhost","root","","qrcodedb");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM user WHERE id = $id");
  $instructor = mysqli_fetch_assoc($result);
  }?>
<html>
   <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>MCEC Attendance System</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "css/style-scan.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset = "utf-8"></script>
		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables 
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">-->
    </head>
    <body>
    <div class = "side-bar">
            <img src="../login/logo.png" style = "width: 100px; height: 100px;">
            <h1>Welcome <?php echo $instructor['firstname']; ?></h1>
            <div class = "menu">
                <div class = "item"><a href = "#"><i class = "fas fa-desktop"></i>Attendance</a></div>
                <div class = "item"><a href = "../student/index.php"><i class = "fas fa-th"></i>Students</a></div>
                <div class = "item"><a href = "../report/index.php"><i class = "fas fa-cogs"></i>Reports</a></div>
                <div class = "item"><a href = "../logout.php"><i class = "fas fa-door-open"></i>Logout</a></div>
            </div>
        </div>
        <div class="row">
                 <div class="col-md-4" style="padding:10px;border-radius: 5px;" id="divvideo">
					
                    <video id="preview" width="30%" height="30%" style="border-radius:10px;"></video>
					<br>
					<br>
                    <div class="message">
                    <?php

                    if (isset($_SESSION['error'])){
                        echo "
                                <div class= 'aler alert-danger'>
                                <h4> Error! </h4>
                                 ".$_SESSION['error']."
    
                                </div>
                              ";
                    }
                    if (isset($_SESSION['success'])){
                        echo "
                                <div class= 'aler alert-success' style= 'background: green;color:white;'>
                                <h4> Success! </h4>
                                 ".$_SESSION['success']."
    
                                </div>
                              ";
                    }
					?>
                </div>
                </div>
               
                <div class="col-md-6">
                <form action="insert1.php" method="post" class="form-horizontal">
                     <label>SCAN QR CODE</label>
                    <input type="text" name="text" id="text" readonly placeholder="Name" class="form-control">
                    <input type="text" name="qrcontent" id="qrcontent" readonly placeholder="contact number" class="form-control">
                </form>
                </div>
                <div class="col-md-7">
                  <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>STUDENT ID</td>
                            <td>TIMEIN</td>
                            <td>TIME OUT</td>
                            <td>LOGDATE</td>
                            <td>STATUS</td>
                            <td>CONTACT NUMBER</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodedb";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
                    
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                                 
                        $sql ="SELECT * FROM table_attendance INNER JOIN table_student ON table_attendance.CONTACTNUMBER=table_student.CONTACTNUMBER ";
                               $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>

                            <tr>
                                <td><?php echo $row['ID'];?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['TIMEOUT'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                                <td><?php echo $row['STATUS'];?></td>
                                <td><?php echo $row['CONTACTNUMBER'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>

        

        <script>

           
           
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 100, mirror: false });
  
           





           
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               var numbervalue ='';
				    	var numberPattern =/\+\d+/g;
               document.getElementById('text').value=c;
               numbervalue = document.getElementById("text").value.match( numberPattern ).join([]);
						  document.getElementById("qrcontent").value= numbervalue;
               document.forms[0].submit();
              
           });
       
       
           
          
	
	
        </script>
         <script type="text/javascript">
            $('.side-bar').addClass('active');
            </script>
       
    </body>
</html>