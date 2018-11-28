<?php 

/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __Construct(){

		parent::__construct();
		
	$this->load->model('site_sentry');
	}
	public function index()
	{
		$this->load->view('dashboard');
	}
	
	public function Seller()
	{
		
		/*$incomplete_s_q['table']='login';
		$incomplete_s_q['where']="where role_id = '5' and account_status = 'No'";
		$incomplete_s_q['and']="";
		$incomplete_s_q['order_by']=""; 
		$data['incomplete_seller']=$this->site_sentry->get_all_count($incomplete_s_q); */
		
		$query = $this->db->query("Select *,count(*) as count FROM login as a WHERE a.role_id = '5' and a.account_status='NO'");
		$data['incomplete_seller'] = $query->row();
		
		
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM login as a WHERE a.role_id = '5' and a.account_status='Yes' AND NOT EXISTS(Select * FROM products as b WHERE a.user_id =b.seller_id)");
		$data['Registered'] = $query->row();
        //////////////////////////////////////////////////////////////////////////////////
		
		//$query = $this->db->query("select DISTINCT a.user_id from login a,products b where a.user_id = b.seller_id");
		//$query = $this->db->query("Select count(*) as count FROM login as a WHERE a.role_id = '5' and a.account_status='Yes' AND EXISTS(Select * FROM products as p WHERE a.user_id =p.seller_id)");
		$query = $this->db->query("SELECT COUNT(*) as count
        FROM (
Select count(seller_id)  FROM products WHERE product_status= '2' GROUP BY seller_id
) seller_id");

		  $data['Vendor'] = $query->row();
        //////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select count(*) as count FROM login as a WHERE a.role_id = '5' and a.account_status='Offline'");
		$data['offline_seller'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		
		
		$pending['table']='products';
		$pending['where']="where product_status=0 and seller_id!=0";
		$pending['and']="";
		$pending['order_by']=""; 
		$data['pending']=$this->site_sentry->get_all_count($pending); 

		$approve['table']='products';
		$approve['where']="where product_status=1";
		$approve['and']="";
		$approve['order_by']=""; 
		$data['approve']=$this->site_sentry->get_all_count($approve); 

		$live['table']='products';
		$live['where']="where product_status=2";
		$live['and']="";
		$live['order_by']=""; 
		$data['live']=$this->site_sentry->get_all_count($live); 

		$offline['table']='products';
		$offline['where']="where product_status=4";
		$offline['and']="";
		$offline['order_by']=""; 
		$data['offline']=$this->site_sentry->get_all_count($offline); 
		
		/////////////////////////////////////////////////////////////////////////
		$data['section_wise']=$this->site_sentry->get_section_wise();
		$data['category_wise']=$this->site_sentry->get_category_wise();
		$data['subcategory_wise']=$this->site_sentry->get_subcategory_wise();
		$data['city_wise']=$this->site_sentry->get_city_wise();
		$data['state_wise']=$this->site_sentry->get_state_wise();
		$data['get_category_seller_wise']=$this->site_sentry->get_category_seller_wise();
		$data['subcategoryseller_wise']=$this->site_sentry->get_subcategory_seller_wise();
		
		$data['get_product_quinity']=$this->site_sentry->get_product_quinity();
		
		
		
		
		
		$this->load->view('dashboard_seller',$data);
	}
	
	
	public function Buyer()
	{
		
		/*$incomplete_s_q['table']='login';
		$incomplete_s_q['where']="where role_id = '5' and account_status = 'No'";
		$incomplete_s_q['and']="";
		$incomplete_s_q['order_by']=""; 
		$data['incomplete_seller']=$this->site_sentry->get_all_count($incomplete_s_q); */
		
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!=''");
		$data['Order'] = $query->row();
		
		
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='failure' AND unmappedstatus='failed' AND Order_id!=''");
		$data['Fail_order'] = $query->row();
        //////////////////////////////////////////////////////////////////////////////////
		
		//$query = $this->db->query("select DISTINCT a.user_id from login a,products b where a.user_id = b.seller_id");
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Production'");
		$data['Inprocess'] = $query->row();
        //////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Delivered'");
		$data['Ondelivery'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Cancel'");
		$data['Canceled'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Return'");
		$data['Return'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Refund'");
		$data['Refund'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM cart_product WHERE payment_done = '1' and status='success' AND Order_id!='' AND order_status='Complain'");
		$data['Complain'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		
		//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM bid WHERE status = '1'");
		$data['Bids'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		
				//////////////////////////////////////////////////////////////////////////////////
		$query = $this->db->query("Select *,count(*) as count FROM bulk_order WHERE from_type = 'enquiry' and status='1'");
		$data['Enquiry'] = $query->row();
		//////////////////////////////////////////////////////////////////////////////////
		
        		//////////////////////////////////////////////////////////////////////////////////

		
		
		
		/////////////////////////////////////////////////////////////////////////
		$data['city_wise_order']=$this->site_sentry->get_city_wise_order();
		$data['state_wise_order']=$this->site_sentry->get_state_wise_order();
		$data['category_wise_order']=$this->site_sentry->get_category_wise_order();
		$data['subcategory_wise_order']=$this->site_sentry->get_subcategory_wise_order();
		$data['city_wise']=$this->site_sentry->get_city_wise();
		$data['state_wise']=$this->site_sentry->get_state_wise();
		$data['get_category_seller_wise']=$this->site_sentry->get_category_seller_wise();
		$data['subcategoryseller_wise']=$this->site_sentry->get_subcategory_seller_wise();
		
		$data['get_product_quinity']=$this->site_sentry->get_product_quinity();
		
		
		
		
		
		$this->load->view('dashboard_buyer',$data);
	}
	
	
	function Send_sms(){
	
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
				$authKey = "102020AwNyvTnIfuG1568f67f0";


				$mobileNumber = '9960006338';

				$authKey = "102020AwNyvTnIfuG1568f67f0";
				
				$senderId = "GreenH";

				//$otp = $this->randomWithLength(4);
				$message = urlencode("Sorry, Your Payment Process Faild For Some Reasons.");


				//Define route 
				$route = "4";
				//Prepare you post parameters
				$postData = array(
				    'authkey' => $authKey,
				    'mobiles' => $mobileNumber,
				    'message' => $message,
				    'sender' => $senderId,
				    'route' => $route
				);



				//API URL
				$url="https://control.msg91.com/api/sendhttp.php";


				
				// init the resource
				$ch = curl_init();
				curl_setopt_array($ch, array(
				    CURLOPT_URL => $url,
				    CURLOPT_RETURNTRANSFER => true,
				    CURLOPT_POST => true,
				    CURLOPT_POSTFIELDS => $postData
				    //,CURLOPT_FOLLOWLOCATION => true
				));

				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


				//get response
				$output = curl_exec($ch);
				print_r($output);
				//Print error if any
				if(curl_errno($ch)){
				   echo 'error:' . curl_error($ch);
				}
	}
	
}
?>