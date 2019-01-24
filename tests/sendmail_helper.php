<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




function IsSMTP($to,$toname,$mailfromnane,$mailfrom,$subject,$html,$text,$tag,$replyto)
{
    /*require 'class.phpmailer.php';
    $from = "Senders_Email_Address";
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";
    $mail->Host= "tls://email-smtp.us-east.amazonaws.com"; // Amazon SES
    $mail->Port = 465;  // SMTP Port
    $mail->Username = "Senders_Email_Address";  // SMTP  Username
    $mail->Password = "MyPassword";  // SMTP Password
    $mail->SetFrom($from, 'From Name');
    $mail->AddReplyTo($from,'Senders_Email_Address');
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    if(!$mail->Send())
        return false;
    else
        return true;*/
}


function send_Aws_via(/*$to,$toname,$mailfromnane,$mailfrom,$subject,$html,$text,$tag,$replyto*/){
	
	error_reporting(E_ALL);ini_set('display_errors',true);
 

/*
if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}*/
/*	
	// Replace path_to_sdk_inclusion with the path to the SDK as described in 
// http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
define('REQUIRED_FILE','Aws/aws-autoloader.php'); 
                                                  
// Replace sender@example.com with your "From" address. 
// This address must be verified with Amazon SES.
define('SENDER', $mailfrom);           

// Replace recipient@example.com with a "To" address. If your account 
// is still in the sandbox, this address must be verified.
define('RECIPIENT', $to);    

// Specify a configuration set. If you do not want to use a configuration
// set, comment the following variable, and the 
// 'ConfigurationSetName' => CONFIGSET argument below.
define('CONFIGSET','ConfigSet');

// Replace us-west-2 with the AWS Region you're using for Amazon SES.
define('REGION','us-east-1'); 

define('SUBJECT',$subject);

define('HTMLBODY',$html);
define('TEXTBODY',$text);

define('CHARSET','UTF-8');

require REQUIRED_FILE;

//require 'Aws/aws-autoloader.php';

use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;
/*
$client = SesClient::factory(array(
    'version'=> 'latest',     
    'region' => REGION
));

try {
     $result = $client->sendEmail(['Destination' => ['ToAddresses' => [RECIPIENT,],],
    'Message' => [
        'Body' => [
            'Html' => [
                'Charset' => CHARSET,
                'Data' => HTMLBODY,
            ],
			'Text' => [
                'Charset' => CHARSET,
                'Data' => TEXTBODY,
            ],
        ],
        'Subject' => [
            'Charset' => CHARSET,
            'Data' => SUBJECT,
        ],
    ],
    'Source' => SENDER,
    // If you are not using a configuration set, comment or delete the
    // following line
    'ConfigurationSetName' => CONFIGSET,
]);
     $messageId = $result->get('MessageId');
     echo("Email sent! Message ID: $messageId"."\n");

} catch (SesException $error) {
     echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
}
	*/
}

function sendmailbymailgun($to,$toname,$mailfromnane,$mailfrom,$subject,$html,$text,$tag,$replyto){
	/*define('MAILGUN_URL',$subject);
	define('MAILGUN_KEY',$subject);
    $array_data = array(
		'from'=> $mailfromnane .'<'.$mailfrom.'>',
		'to'=>$toname.'<'.$to.'>',
		'subject'=>$subject,
		'html'=>$html,
		'text'=>$text,
		'o:tracking'=>'yes',
		'o:tracking-clicks'=>'yes',
		'o:tracking-opens'=>'yes',
		'o:tag'=>$tag,
		'h:Reply-To'=>$replyto
    );
    $session = curl_init(MAILGUN_URL.'/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($session, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($session);
    curl_close($session);
	//print_r($response);
    $results = json_decode($response, true);
    return $results;*/
	}

?>