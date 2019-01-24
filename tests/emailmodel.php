<?php
class EmailModel extends CI_Model {

  function __construct()
  {
      parent::__construct();
      $this->load->library('email');
  }

  function sendVerificatinEmail($email,$verificationText){
      $data['verificationText'] = $verificationText;
      $ci = get_instance();
      $ci->load->library('email');
    /*  $config['protocol'] = "smtp";
      $config['smtp_host'] = "mail.greenhandle.in";
      $config['smtp_port'] = "25";
      $config['smtp_user'] = "sell@greenhandle.in"; 
      $config['smtp_pass'] = "Greenhandle123";
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      */
      $config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

//$this->email->initialize($config);
      
      $ci->email->initialize($config);

      $ci->email->from('sell@greenhandle.in', 'Greenhandle Sellercell');
      $list = array($email);
      $ci->email->to($list);
      $ci->email->cc('sellercell@greenhandle.in'); 
      $ci->email->subject('Email Verification');
      $ci->email->message($this->load->view('verification_mail',$data,true));
      $ci->email->send();
      
      
	
  }

  function sendoredr_By_Email($email,$content){

      $ci = get_instance();
      $ci->load->library('email');
      $config['protocol'] = "smtp";
      $config['smtp_host'] = "mail.greenhandle.in";
      $config['smtp_port'] = "25";
      $config['smtp_user'] = "sell@greenhandle.in"; 
      $config['smtp_pass'] = "Greenhandle123";
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";

      $ci->email->initialize($config);
      $email = 'help@greenhandle.in';
     
      $ci->email->from('help@greenhandle.in', 'Admin Team');
      $list = array($email);
      $ci->email->to($list);
      $ci->email->subject('Order Details');
      $ci->email->message($content['Product Name']);
      //set_time_limit(1); 
      if($ci->email->send())
      {
         $result = '<div class="alert alert-success" role="alert">Email Send Successfully</div>';   
         echo json_encode($result);
      }
      else
      {
        $result = '<div class="alert alert-danger" role="alert">'.show_error($this->email->print_debugger());'</div>';    
        echo json_encode($result);
      }
     
      
  }

  function check_email_exist($email=null)
  {
    // print_r($email);
    // die();
    $this->db->where('email',$email);
    $this->db->select('email');
    $this->db->from('login');
    $query = $this->db->get();
    return count($query->result());

  }
  function sendpasswordreset_link($email){
	  
      $ci = get_instance();
      $ci->load->library('email');
    /*  $config['protocol'] = "smtp";
      $config['smtp_host'] = "mail.greenhandle.in";
      $config['smtp_port'] = "25";
      $config['smtp_user'] = "sell@greenhandle.in"; 
      $config['smtp_pass'] = "Greenhandle123";
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      */
      $config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

//$this->email->initialize($config);
      
      $ci->email->initialize($config);

      $ci->email->from('sell@greenhandle.in', 'Greenhandle Sellercell');
      $list = array($email);
      $ci->email->to($list);
      $ci->email->cc('sellercell@greenhandle.in'); 
      $ci->email->subject('Email Verification');
      $ci->email->message("Dear User,\n Please click on below URL or paste into 
                            your browser to verify your Email Address 
                            \n\n ".base_url()."resetpassword?email_id=".$email);
      $ci->email->send();
      
      
	
  }
}
?>