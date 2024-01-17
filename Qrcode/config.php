<?php
      extract($_REQUEST);
      $file=fopen("form-save.txt","w");
     $file2=fopen("phone.txt","w");

      fwrite($file,"testing 7 :");
      fwrite($file, $username ."\n");
      fwrite($file,"note:");
      fwrite($file, $note ."\n");
      fclose($file);


    //  $input = "+6309156412412";
    //  $output = str_split($input);
     // file_put_contents('array.tmp', json_encode( $output ));

    
     
      fwrite($file2,$numbers);
      fclose($file2);
      
    
    

  
      
   

     
header("location: init_qrscan.php");


 ?>
