

<?php
$filename1 = 'Aws/aws-autoloader.php';
require $filename1;
use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;

 function send_mail($RECIPIENT,$SENDER,$SUBJECT,$HTMLBODY)
{
           
        define('RECIPIENT', $RECIPIENT);    

        define('SENDER', $SENDER);           

        define('CONFIGSET','ConfigSet');

        define('REGION','us-east-1'); 

        define('SUBJECT',$SUBJECT);

        define('HTMLBODY',$HTMLBODY);
        // define('TEXTBODY','CHECK 1.....');

        define('CHARSET','UTF-8');


        $client = SesClient::factory(array(
            
            'version'=> 'latest',     
            'region' => REGION,
            'credentials' => [
                'key' => 'AKIAIG3BLLUNRSFKWFIA',
                'secret' => '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'],
        ));
        // print_r($client);

        try {
             $result = $client->sendEmail([
            'Destination' => [
                'ToAddresses' => [
                    RECIPIENT,
                ],
            ],
            'Message' => [
                'Body' => [
                    'Html' => [
                        'Charset' => CHARSET,
                        'Data' => HTMLBODY,
                    ],
                    // 'Text' => [
                    //     'Charset' => CHARSET,
                    //     'Data' => TEXTBODY,
                    // ],
                ],
                'Subject' => [
                    'Charset' => CHARSET,
                    'Data' => SUBJECT,
                ],
            ],
            'Source' => SENDER,
            // If you are not using a configuration set, comment or delete the
            // following line
            //'ConfigurationSetName' => CONFIGSET,
        ]);
             // echo "1";
             return 1;
             // $messageId = $result->get('MessageId');
             // echo("Email sent! Message ID: $messageId"."\n");

        } catch (SesException $error) {
            return 0;
            // echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
        } return 2;
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

?>