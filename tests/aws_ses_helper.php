<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
public function send_mail($to,$from)
{
        echo " ";
        // echo $message = "I recieved your message from amazon s3 web service";
        // //class docs: http://www.orderingdisorder.com/aws/ses/
        // require_once('ses.php');
        // //get credentials at http://aws.amazon.com My Account / Console > Security Credentials
        // $ses = new SimpleEmailService('AKIAIG3BLLUNRSFKWFIA', 'Nt4/H6fbzcGxwPgHb7+kb8Z7B0Ze9is+9451XdAi');
        // $m = new SimpleEmailServiceMessage();

        // //$m->setheaders("Content-type:text/html;charset=UTF-8" . "\r\n");
        // //note that from and to emails must be verified using AWS SES dashboard.  Can remove limitations here https://aws-portal.amazon.com/gp/aws/html-forms-controller/contactus/SESProductionAccess2011Q3.
        // $m->addTo($to);
        // $m->setFrom($from);
        // $m->setSubject('welcome');
        // $m->setMessageFromString($message);
        // echo "<pre>";
        // var_dump($ses->sendEmail($m));
}

?>