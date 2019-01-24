<?php

if ( ! function_exists('sendmailbymailgun'))
{
define('MAILGUN_URL', 'https://api.mailgun.net/v3/greenhandle.in');

define('MAILGUN_KEY', '7dcf9d24888fba8f6cb0495ac2129191-8b7bf2f1-3556fda4'); 

function sendmailbymailgun($to,$toname,$mailfromnane,$mailfrom,$subject,$html,$text,$tag,$replyto){


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

    // print_r($response);

    $results = json_decode($response, true);
	if($results){

    return $results;
	}else{
		return "Error mail";
	}
    }
	
}


function test_helper(){
	echo 'test';
}
     ?>