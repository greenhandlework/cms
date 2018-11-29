<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		 
	parent::__construct();
	$this->load->model('Login_model');
	 }
	 
	public function index(){
		// if(isset($this->session->set_userdata('isLogin'))){$session}
		 if(($this->session->set_userdata('isLogin'))!==null){$session=true;}else{$session=FALSE;}
        if($session == FALSE){
         $this->load->view('Login');
		 }else{
		 $this->load->view('order_details/order');
		 }
	}
	
	public function Login_check(){
		
	}

	public function login_form(){
		$output = array('error' => false);
		
		 $email = $_POST['lEmail'];
		//$password = $_POST['lpassword'];
 /*
		$data = $this->users_model->login($email, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			$output['message'] = 'Logging in. Please wait...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Login Invalid. User not found';
		}
 
		echo json_encode($output); */

$this->form_validation->set_rules('lEmail', 'Email', 'trim|required|valid_email');

$this->form_validation->set_rules('lpassword', 'Password', 'trim|required');

//$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

if($this->form_validation->run()==FALSE){

//$this->load->view('form_login');
$output['error'] = true;
$output['message'] =( validation_errors());
//echo validation_errors();
}else{
//$output['error'] = true;	
$output['message'] = 'Logging in. Please wait...';
$lEmail = $this->input->post('lEmail');

$lpassword = $this->input->post('lpassword');

//$level = $this->input->post('level');

$cek = $this->Login_model->Checkuser($lEmail, $lpassword);

//if($cek > 0){
	if(!empty($cek)){
$adminid=$cek[0]['adminid'];
$firstname=$cek[0]['firstname'];
$lastname=$cek[0]['lastname'];
$email=$cek[0]['email'];
$usertype=$cek[0]['usertype'];
$permission=$cek[0]['permission'];
$userstatus=$cek[0]['userstatus'];
$loginstatus=$cek[0]['loginstatus'];
$this->session->set_userdata('isLogin', TRUE);
$datasession=array('adminid'=>$adminid,'firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,'usertype'=>$usertype,'permission'=>$permission,'userstatus'=>$userstatus,'loginstatus'=>$loginstatus);
$this->session->set_userdata('logsession',$datasession);
//}
//$this->session->set_userdata('isLogin',true);
//$this->session->set_userdata('level',$level);

//redirect('order_details/order');

}else{
$output['error'] = true;
$output['message'] = 'Login Invalid. User not found';

}

}

	echo json_encode($output); 

}


	
function Logout(){
	
	$this->session->unset_userdata('logsession');
	$this->session->unset_userdata('isLogin');
	//$this->session->unset_userdata('user');
	 //$this->load->view('Login');
	 redirect('Login');
}


}
