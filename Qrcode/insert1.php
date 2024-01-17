<?php

      extract($_REQUEST);
      $file=fopen("form-save.txt","w");
      $file2=fopen("phone.txt","w");

      fwrite($file,"Manila City Education Center \n\n");
      fwrite($file,"Good day\n\n");
      fwrite($file,"Your son/daugther with the information of ");
      fwrite($file, $text ."\n\n");
     
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodedb";
  
    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['text'])){
        date_default_timezone_set('Asia/Manila');
        $text =$_POST['text'];
        $contact = $_POST['qrcontent'];
        $date = date('m-d-Y');
		$time = date('h:i:sa');


		   $sql = "SELECT * FROM table_attendance WHERE STUDENTID='$text' AND LOGDATE='$date' AND STATUS='TIMEIN'";
           $query = $conn->query($sql);
            if($query->num_rows>0){
            $sql ="UPDATE table_attendance SET TIMEOUT= '$time',STATUS='TIMEOUT' WHERE STUDENTID='$text' AND LOGDATE='$date'";
            $query = $conn->query($sql);
             $_SESSION['success']= ' Your Attendance successfully Time out';

             fwrite($file,"Left the school at: ");
             fwrite($file, $time ."\n");

			}else{
			  $sql = "INSERT INTO table_attendance(STUDENTID,TIMEIN,LOGDATE,STATUS,CONTACTNUMBER) VALUES('$text','$time','$date','TIMEIN','$contact')";
		   if($conn->query($sql) ===TRUE){
         		$_SESSION['success'] = 'Your Attendance Sucessfully Time In';

                 fwrite($file,"Entered the school at: ");
                 fwrite($file, $time ."\n");

		  }else {
              $_SESSION['error'] = $conn->error;
          }
	}
    }



    fclose($file);
     
    fwrite($file2,$qrcontent);
    fclose($file2);


    $conn->close();

    require 'vendor/autoload.php';

    /** Error Debugging */
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL | E_STRICT);
    
    /** Make sure to add autoload.php */
    require './vendor/autoload.php';
    
    /** Aliasing the classes */
    
    use Aws\Sns\SnsClient;
    use Aws\Exception\AwsException;
    
    
    /** AWS SNS Access Key ID */
    $access_key_id    = 'AKIAZYI57YHAM5N5U3RW';
    
    /** AWS SNS Secret Access Key */
    $secret = '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';
    
    /** Create SNS Client By Passing Credentials */
    $SnSclient = new SnsClient([
        'region' => 'ap-southeast-1',
        'version' => 'latest',
        'credentials' => [
            'key'    => $access_key_id,
            'secret' => $secret,
        ],
    ]);
    
    
    
    
        $filenames ="form-save.txt";
        $filenames2 ="phone.txt";
        $files = fopen($filenames,"r");
        if($files == false){
            echo "error in opening file";
        }
    
        $files2 = fopen($filenames2,"r");
        if($files2 == false){
            echo "error in opening file";
        }
        $filesizes = filesize($filenames);
        $filesizes2 = filesize($filenames2);
      
    
    
    
        
    
    /** Message data & Phone number that we want to send */
    $message =  fread($files,$filesizes);
    
    
    
    
    /** NOTE: Make sure to put the country code properly else SMS wont get delivered */
   $phone =   fread($files2,$filesizes2);
    
    
    fclose($files);
    fclose($files2);
    
    try {
    /** Few setting that you should not forget */
    $result = $SnSclient->publish([
    'MessageAttributes' => array(
    /** Pass the SENDERID here */
    'AWS.SNS.SMS.SenderID' => array(
        'DataType' => 'String',
        'StringValue' => 'StackCoder'
    ),
    /** What kind of SMS you would like to deliver */
    'AWS.SNS.SMS.SMSType' => array(
        'DataType' => 'String',
        'StringValue' => 'Transactional'
    )
    ),
    /** Message and phone number you would like to deliver */
    'Message' => $message,
    'PhoneNumber' => $phone,
    ]);
    
    } catch (AwsException $e) {
    // output error message if fails
    echo $e->getMessage() . "<br>";
    }
    


    header("location: index.php");






?>
