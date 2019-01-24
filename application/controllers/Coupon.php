<?php
class Coupon extends CI_Controller{
	
	function __Construct()
	{
		parent::__construct();
		//if(!$this->session->userdata('user_id')){
			//	   redirect("cms/login");
			//	}
		$this->load->library('site_sentry');
		$this->load->model('cms/coupon_system');
		//$this->load->model('contact_model');
	}
	
	
	
	function index($cart_id_recent = ''){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		
		
		//$this->load->view('cms/header_view',$data);
		$this->load->view('cms/Coupon_view',$data);
		//$this->load->view('cms/footer_view',$data);	
	}
	
	
	
	function Coupon_insert(){
		
		            $coupons_name=strtoupper($this->input->post('coupons_name'));
					
					//exit();
					$coupons_text=$this->input->post('coupons_text');
                    $coupons_type=$this->input->post('coupons_type');
                    $coupons_value=$this->input->post('coupons_value');
                    $coupons_from=$this->input->post('coupons_from');
                    $coupons_to=$this->input->post('coupons_to');
                    $coupons_status=$this->input->post('coupons_status');
					
			$k=$this->coupon_system->Coupon_insert($coupons_name,$coupons_text,$coupons_type,$coupons_value,$coupons_from,$coupons_to,$coupons_status);
			if($k==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
				}
		//	redirect('cms/Coupon');
					
	
	}
	
	function Coupon_Update(){
		
		            $coupons_name=strtoupper($this->input->post('coupons_name'));
					
					//exit();
					$coupons_text=$this->input->post('coupons_text');
                    $coupons_type=$this->input->post('coupons_type');
                    $coupons_value=$this->input->post('coupons_value');
                    $coupons_from=$this->input->post('coupons_from');
                    $coupons_to=$this->input->post('coupons_to');
                    $coupons_status=$this->input->post('coupons_status');
					 $coupons_id=$this->input->post('coupons_id');
					
			$k=$this->coupon_system->Coupon_Update($coupons_name,$coupons_text,$coupons_type,$coupons_value,$coupons_from,$coupons_to,$coupons_status,$coupons_id);
			if($k==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
				}
		//	redirect('cms/Coupon');
					
	}
	
	
	 public function coupons_status(){
		 $id=$this->input->post('id');
		 $value=$this->input->post('value');
		//echo $this->coupon_system->delete_Co(); 
	//$data['page_data']=$this->coupon_system->get_coupon(); 
	//$this->load->view('cms/Coupon_refresh',$data);
		 $d=$this->coupon_system->coupons_status($id,$value);
		if($d==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}else{
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}
	}
	
	
	
     public function coupons_del(){
		 $id=$this->input->post('id');
		//echo $this->coupon_system->delete_Co(); 
	//$data['page_data']=$this->coupon_system->get_coupon(); 
	//$this->load->view('cms/Coupon_refresh',$data);
		 $d=$this->coupon_system->delete_Co($id);
		if($d==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}else{
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}
	}
	
	
	 public function coupons_Edit(){
		 $id=$this->input->post('id');
		//echo $this->coupon_system->delete_Co(); 
	//$data['page_data']=$this->coupon_system->get_coupon(); 
	//$this->load->view('cms/Coupon_refresh',$data);
		 $data['coupons_Edit']=$this->coupon_system->coupons_Edit($id);
		 $this->load->view('cms/Coupons_edit',$data);
		/*if($d==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}else{
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}*/
	}
	 public function Cancel_from(){
		// $id=$this->input->post('id');
		//echo $this->coupon_system->delete_Co(); 
	//$data['page_data']=$this->coupon_system->get_coupon(); 
	//$this->load->view('cms/Coupon_refresh',$data);
		// $data['coupons_Edit']=$this->coupon_system->coupons_Edit($id);
		 $this->load->view('cms/Coupon_from');
		/*if($d==1){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}else{
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
		}*/
	}
	function Coupon_refresh(){
		$data['page_data']=$this->coupon_system->get_coupon(); 
		$this->load->view('cms/Coupon_refresh',$data);
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
}

?>