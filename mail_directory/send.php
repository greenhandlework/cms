<?php

$filename1 = 'Aws/aws-autoloader.php';
require $filename1;
use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;

 function send_mail($RECIPIENT,$SENDER,$SUBJECT,$HTMLBODY,$email_type= null,$seller_id = null,$buyer_id  = null)
{
          $all_data = 'Recepient='.$RECIPIENT.', Sender ='.$SENDER.', Subject='.$SUBJECT;
        
          log_con('send','done',$all_data);

         $CONFIGSET = 'ConfigSet';
        $REGION = 'us-east-1';
        $CHARSET = 'UTF-8';

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
           con($RECIPIENT,$SENDER,$SUBJECT,$email_type,$seller_id,$buyer_id,$messageId);
           
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
    


 function send_msg($mobile_number,$message)
{
        $authKey = "102020AwNyvTnIfuG1568f67f0";  //Your authentication key
        
        $mobileNumber = $mobile_number; //Multiple mobiles numbers separated by comma
        
        $msg = urlencode($message); //Your message to send, Add URL encoding here.

        $senderId = "GreenH";  //Sender ID,While using route4 sender id should be 6 characters long.
        
        $route = "4";  //Define route 

        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $msg,
            'sender' => $senderId,
            'route' => $route
        );

        $url="http://api.msg91.com/api/sendhttp.php";  //API URL

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
        return $output;

}
// send_msg();


function multi($recipient_email,$sender,$sub,$body,$email_type= null,$seller_id = null,$buyer_id  = null)
{
    $recipient_emails =  $recipient_email;
        //print_r($recipient_email);exit();
    
        $SesClient = new SesClient([
            'version'=> 'latest',     
            'region' => 'us-east-1',
            'credentials' => [
                'key' => 'AKIAIG3BLLUNRSFKWFIA',
                'secret' => 'Nt4/H6fbzcGxwPgHb7+kb8Z7B0Ze9is+9451XdAi'],
        ]);

 $sender_email = $sender;

        // Replace these sample addresses with the addresses of your recipients. If
        // your account is still in the sandbox, these addresses must be verified.
        
        // 'ConfigurationSetName' => $configuration_set argument below.
        $configuration_set = 'ConfigSet';

        $subject = $sub;
       // // $plaintext_body = 'This email was sent with Amazon SES using the AWS SDK for PHP.' ;
       $html_body = $body;
        $char_set = 'UTF-8';

        try {
            $result = $SesClient->sendEmail([
                'Destination' => [
                    'ToAddresses' => $recipient_emails,
                ],
                'ReplyToAddresses' => [$sender_email],
                'Source' => $sender_email,
                'Message' => [
                  'Body' => [
                      'Html' => [
                          'Charset' => $char_set,
                          'Data' => $html_body,
                      ],
                      // 'Text' => [
                      //     'Charset' => $char_set,
                      //     'Data' => $plaintext_body,
                      // ],
                  ],
                  'Subject' => [
                      'Charset' => $char_set,
                      'Data' => $subject,
                  ],
                ],
                // If you aren't using a configuration set, comment or delete the
                // following line
               // 'ConfigurationSetName' => $configuration_set,
            ]);
           // print_r($result);
            $messageId = $result['MessageId'];
            $res = json_encode($recipient_emails);
             con($res,$sender_email,$subject,$email_type,$seller_id,$buyer_id,$messageId);
            //$res = json_encode($recipient_emails)
           //  $messageId = $result->get('MessageId');
           //con($res,$sender_email,$subject,$email_type,$seller_id,$buyer_id,$messageId);
            // echo "<pre>";
            echo("Email sent! Message ID: $messageId"."\n");
        } catch (AwsException $e) {
            // output error message if fails
            echo $e->getMessage();
            echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
            echo "\n";
        }    
}

function conn($RECIPIENT,$SENDER,$SUBJECT,$email_type,$seller_id,$buyer_id,$MessageId)
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
        $sql = "INSERT INTO sent_mail ".
      "(recipient,sender, subject,email_type,seller_id,buyer_id,MessageId,date) ".
      "VALUES ('$RECIPIENT','$SENDER','$SUBJECT','$email_type','$seller_id','$buyer_id','$MessageId','$date')";
       mysql_select_db('greenhandlelive');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
  // echo "Entered data successfully\n";
   
   mysql_close($conn);

}
    


?>