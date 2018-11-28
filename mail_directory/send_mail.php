<?php

$filename1 = 'Aws/aws-autoloader.php';
require $filename1;
use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;


class Send_mail
{
  
  // function test()
  // {
  //   echo "string";
  // }
 
      function send_mail1($RECIPIENT,$SENDER,$SUBJECT,$HTMLBODY,$email_type= null,$seller_id = null,$buyer_id  = null)
      {

                $all_data = 'Recepient='.$RECIPIENT.', Sender ='.$SENDER.', Subject='.$SUBJECT;
              
                $this->log_con('send','done',$all_data);

              // define('RECIPIENT', $RECIPIENT);    

              //define('SENDER', $SENDER);           
                $CONFIGSET = 'ConfigSet';
                $REGION = 'us-east-1';
                $CHARSET = 'UTF-8';
              // define('CONFIGSET','ConfigSet');

              //define('REGION','us-east-1'); 

             // define('SUBJECT',$SUBJECT);

             // define('HTMLBODY',$HTMLBODY);
              // define('TEXTBODY','CHECK 1....);

          //    define('CHARSET','UTF-8');


              $client = SesClient::factory(array(
                  
                  'version'=> 'latest',     
                  'region' => $REGION,
                  'credentials' => [
                      'key' => 'AKIAIG3BLLUNRSFKWFIA',
                      'secret' => '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'],
              ));
              // print_r($client);

              try {
                   $result = $client->sendEmail([
                  'Destination' => [
                      'ToAddresses' => [
                          $RECIPIENT,
                      ],
                  ],
                  'Message' => [
                      'Body' => [
                          'Html' => [
                              'Charset' => $CHARSET,
                              'Data' => $HTMLBODY,
                          ],
                          // 'Text' => [
                          //     'Charset' => CHARSET,
                          //     'Data' => TEXTBODY,
                          // ],
                      ],
                      'Subject' => [
                          'Charset' => $CHARSET,
                          'Data' => $SUBJECT,
                      ],
                  ],
                  'Source' => $SENDER,
                  // If you are not using a configuration set, comment or delete the
                  // following line
                  //'ConfigurationSetName' => CONFIGSET,
              ]);
                   // echo "1";
                 $messageId = $result->get('MessageId');
                 
                 //echo $ip_address;
                 $this->con($RECIPIENT,$SENDER,$SUBJECT,$email_type,$seller_id,$buyer_id,$messageId);
                 //echo "done";
                   //echo("Email sent! Message ID: $messageId"."\n");
                   return 1;

              } catch (SesException $error) {
                  return 0;
                  // echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
              } return 2;
      }

      function con($RECIPIENT,$SENDER,$SUBJECT,$email_type,$seller_id,$buyer_id,$MessageId)
      {
           $dbhost = 'greenhandle.ctjf6g73jsdo.ap-south-1.rds.amazonaws.com';
           $dbuser = 'greenhandle';
           $dbpass = 'A1S2D3F4';
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
             if(! $conn ) {
                die('Could not connect: ' . mysql_error());
             }
              date_default_timezone_set("Asia/Kolkata");
           		$ipaddress = $_SERVER['REMOTE_ADDR'];
              $date = date("Y-m-d H:i:s");
              $sql = "INSERT INTO sent_mail ".
            "(recipient,sender, subject,email_type,seller_id,buyer_id,MessageId,ipaddress,date) ".
            "VALUES ('$RECIPIENT','$SENDER','$SUBJECT','$email_type','$seller_id','$buyer_id','$MessageId','$ipaddress','$date')";
             mysql_select_db('greenhandlelive');
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
         }
         
        // echo "Entered data successfully\n";
         
         mysql_close($conn);

      }

      function log_con($source,$message,$desc)
      {
           $dbhost = 'greenhandle.ctjf6g73jsdo.ap-south-1.rds.amazonaws.com';
           $dbuser = 'greenhandle';
           $dbpass = 'A1S2D3F4';
           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
             if(! $conn ) {
                die('Could not connect: ' . mysql_error());
             }
              date_default_timezone_set("Asia/Kolkata");
              $date = date("Y-m-d H:i:s");
              $sql = "INSERT INTO log_messages ".
            "(source,message, description,date) ".
            "VALUES ('$source','$message','$desc','$date')";
           // print_r($sql);
             mysql_select_db('greenhandlelive');
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
         }
         
        // echo "Entered data successfully\n";
         
         mysql_close($conn);

      }

      

}



    

    


?>