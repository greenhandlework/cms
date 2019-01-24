<?php

$filename1 = '../Aws/aws-autoloader.php';
require $filename1;
use Aws\S3\S3Client;
  use Aws\S3\Exception\S3Exception;

function backupDatabaseTables($file){ 
// AWS Info
  $bucketName = 'testing-bucket-for-study';
  $IAM_KEY = 'AKIAIB3PRPDH7C4MWWUQ';
  $IAM_SECRET = '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';
  // Connect to AWS
  try {  

     $s3 = S3Client::factory(array(
                  
                  'version'=> 'latest',     
                  'region'  => 'ap-south-1',
                  'credentials' => [
                      'key' => $IAM_KEY,
                      'secret' => $IAM_SECRET],
              ));

  } catch (Exception $e) {
    
    die("Error: " . $e->getMessage());
  }
  
 ;
      // Add it to S3
  date_default_timezone_set("Asia/Calcutta");
    $t =date("d-m-Y h:i:sa");
      // $file = '/var/www/html/cms/final_backup/bkup.zip';
      try {     
       
        $s3->putObject(
          array(
            'Bucket'=>$bucketName,  //name of bucket
            'Key' =>  $t,  //ency key
            'SourceFile' => $file, //data to upload
             'ACL' => 'public-read',
            'StorageClass' => 'STANDARD'//REDUCED_REDUNDANCY
          )
        );
      } catch (S3Exception $e) {
        die('Error:' . $e->getMessage());
      } catch (Exception $e) {
        die('Error:' . $e->getMessage());
      }
      echo 'Done';
   }
//print_r($_POST);
$filename_to_upload = $argv[1];
//print_r($filename_to_upload);
//exit();
echo  backupDatabaseTables($filename_to_upload);


?>