<?php
    

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




    $filename ="form-save.txt";
    $filename2 ="phone.txt";
    $file = fopen($filename,"r");
    if($file == false){
        echo "error in opening file";
    }

    $file2 = fopen($filename2,"r");
    if($file2 == false){
        echo "error in opening file";
    }
    $filesize = filesize($filename);
    $filesize2 = filesize($filename2);
  



    

/** Message data & Phone number that we want to send */
$message =  fread($file,$filesize);




/** NOTE: Make sure to put the country code properly else SMS wont get delivered */
$phone =   fread($file2,$filesize2);


fclose($file);
fclose($file2);

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


header("location: init_qrscan.php");
 ?>
