<?php 
/**
 * 
 */
class Seller_accounts extends CI_Controller
{
	
	public function index()
	{
		$this->db->select('login.*')
				->from('login')
				->where('role_id',5)
				->where('account_status','No')
				->order_by('login.id desc');

		$data['seller'] = $this->db->get()->result_array();

		// $data['seller_with_product'] = $this->db->query("SELECT DISTINCT a.user_id,
		// 						     	a.email_verified,
		// 						     	a.org_name,
		// 						     	a.name,
		// 						     	a.mobile_number,
		// 						     	a.email,
		// 						     	a.account_status,
		// 						     	 b.product_status
		// 						    from login a, 	
		// 						         products b
		// 						    where a.user_id = b.seller_id
		// 						       -- AND b.product_status =2
		// 						       -- AND a.account_status='Yes'
		// 						       ORDER BY a.account_creation_date DESC" )->result_array();
		 // echo "<pre>"; print_r($data['seller']); exit();

		$this->load->view('Seller_accounts/seller_accounts',$data);
	}


	public function get()
	{
		// print_r($_POST); exit();
		$seller_status = $this->input->post('seller_status');
		$search_seller = $this->input->post('search_seller');
		$activation_date = $this->input->post('activation_date');

		$d='';
		if(!empty($activation_date)){
			$d .=" and l.account_creation_date like '%".$activation_date."%' ";
		}
		$h = '';
		
		if(!empty($search_seller)){
			$h .= " and l.email LIKE '%".$search_seller."%' ";
		}
		if($seller_status=='seller' || $seller_status=='registered_seller'){
		
			if($seller_status=='seller'){
				$h .=" and account_status = 'No'";
			}else{
				$h .=" and account_status = 'Yes'";
				$h .=" AND NOT EXISTS(Select * FROM products as p  WHERE l.user_id =p.seller_id)";
			}

			$query1 = " SELECT l.* from login l where l.role_id=5 ".$h." ".$d." ";			   
			// print_r($query1); exit();
			$data['seller'] = $this->db->query($query1)->result_array();
			 
			 	
		}elseif ($seller_status=='vendor' || $seller_status=='offline_seller') {
			
			if($seller_status=='vendor'){
				$h .= " where l.account_status='Yes' ";
				$h .= "  and p.product_status=2 ";
			}else{
				$h .= " where l.account_status='Offline' ";
				$h .= "  and p.product_status=4 ";
			}

			$query = "SELECT DISTINCT l.*,
						 p.product_status
					 from login l
					 join products p
					   on p.seller_id=l.user_id
					   ".$h." ".$d." ";		
			// print_r($query); exit();
			$data['seller'] = $this->db->query($query)->result_array();			

		}	 
		  // echo $this->db->last_query(); exit();
		$this->load->view('Seller_accounts/seller_account_ajax',$data);

	}




	public function account_detail()
	 {
	 	$data['seller_id'] = $this->uri->segment(3);
	 	// print_r($seller_id); exit();
	// 	$data['user_detail'] = $this->db->get_where('login',array('user_id'=>$seller_id))->result_array();
	// 	$data['user_detail_seller'] = $this->db->get_where('seller',array('seller_id'=>$seller_id))->result_array();
	// 	 // echo "<pre>"; print_r($data['user_detail_seller']); exit();
		
		$this->load->view('Seller_accounts/account_detail',$data);
	}

	public function personal_detail()
	{
		$seller_id = $this->uri->segment(3);

		$check = $this->db->get_where('seller',array('seller_id'=>$seller_id));
		if($check->num_rows()>0){
			$this->db->select('login.*,
								seller.*')
					 ->from('login')
					 ->join('seller','seller.seller_id=login.user_id')
					 ->where("seller.seller_id=".$seller_id." ");


		$data['seller_data'] = $this->db->get()->result_array();
	}else{
		$data['seller_data'] = $this->db->get_where('login',array('user_id'=>$seller_id))->result_array();
	}
		// echo "<pre>"; print_r($data['seller_data']); exit();
		
		$this->load->view('Seller_accounts/personal_detail',$data);
	}

	public function product_list()
	{
		$seller_id = $this->uri->segment(3);

		 $this->db->select('products.*')
		 		  ->from('products')	
		 		  ->where("seller_id = ".$seller_id." and product_status=2");
		 		  // ->where('product_status',1);
		$data['prod'] = $this->db->get()->result_array();
		$data['seller_id'] = $seller_id;
		// echo "<pre>";  		  
		// print_r($data); exit();

		$this->load->view('Seller_accounts/product_list',$data);
	}


	public function product_list_ajax()
	{
		$seller_id   = $this->input->post('seller_id');
		$prod_status = $this->input->post('prod_status');

		 $this->db->select('products.*')
		 		  ->from('products')	
		 		  ->where("seller_id = ".$seller_id." and product_status=".$prod_status." ");
		$data['prod'] = $this->db->get()->result_array();
		$this->load->view('Seller_accounts/product_list_ajax',$data);		  
	}




	public function vendor_account_detail()
	{
		$seller_id = $this->uri->segment(3);
		$data['user_detail'] = $this->db->get_where('login',array('user_id'=>$seller_id))->result_array();
		$data['user_detail_seller'] = $this->db->get_where('seller',array('seller_id'=>$seller_id))->result_array();
		// echo "<pre>"; print_r($data['user_detail_seller']); exit();

		$this->db->select('products.*')
				->from('products')
				->where("seller_id",$seller_id)
				->where('product_status',2)
				->order_by('id','desc');


		$data['product_detail'] = $this->db->get()->result_array();
		//echo "<pre>"; print_r($data['product_detail']); exit();
		$this->load->view('Seller_accounts/vendor_account_detail',$data);
	}

	public function get_products()
	{
		$product_status = $this->input->post('product_status');
		$seller_id      = $this->input->post('seller_id');

		$this->db->select('products.*')
				->from('products')
				->where("seller_id",$seller_id)
				->where('product_status',$product_status)
				->order_by('id','desc');


		$data['product_detail'] = $this->db->get()->result_array();
		//echo "<pre>"; print_r($data['product_detail']); exit();
		$this->load->view('Seller_accounts/seller_account_by_status',$data);
	}

	public function delete_seller()
	{
		$seller_id = $this->uri->segment(3);
		
		$this->db->where('user_id',$seller_id);
		$resp = $this->db->delete('login');
		// $resp=1;
		if($resp==1){
			$data = $this->db->get_where('seller',array('seller_id'=>$seller_id));
			if($data->num_rows()>0){
				 $this->db->where('seller_id',$seller_id);
				 $this->db->delete('seller');

				redirect( ADMIN_PATH.'seller_accounts');

			}else{
				// $url = ADMIN_PATH.'seller_accounts';
				redirect( ADMIN_PATH.'seller_accounts');
			}
		}
	}


	public function offline_seller()
	{
		$seller_id = $this->uri->segment(3);

		$this->db->set('account_status','Offline');
		$this->db->where('user_id',$seller_id);
		$resp = $this->db->update('login');
		$resp=1;
		if($resp==1){
			$this->db->set('product_status',4);
					$this->db->where('seller_id',$seller_id);
					$this->db->where('product_status !=',0);
					$this->db->where('product_status !=',1);
					 $resp1 = $this->db->update('products');
			redirect( ADMIN_PATH.'seller_accounts');		 
			
		}
	}


	

	

	public function order_list()
	{
		$seller_id = $this->uri->segment(3);

		$this->db->select('	cart_product.cart_product_id,
							cart_product.product_id,
							cart_product.Order_id,	
							cart_product.ordered_date,
							cart_product.order_status,
							cart_product.seller_id,
							products.prod_name')
				 ->from('cart_product')
				 ->join('products','products.prod_id=cart_product.product_id','left')
				 ->where("cart_product.seller_id=".$seller_id." ")
				 ->where("cart_product.Order_id!='' ")
				 ->order_by('cart_product.cart_product_id','desc');

		$data['seller_order'] = $this->db->get()->result_array();
		// echo "<pre>"; print_r($data['seller_order']); exit();
		$this->load->view('Seller_accounts/order_list',$data);
	}

	public function order_list_ajax()
	{
		// echo "<pre>"; print_r($_POST); exit();
		$seller_id    = $this->input->post('seller_id');
		$order_date   = $this->input->post('order_date');
	    $order_status = $this->input->post('order_status');
	    $search       = $this->input->post('search');

	    $d='';
	    if(!empty($order_date)){
	    	$d .=" AND cart_product.ordered_date like '%".$order_date."%' ";
	    }
	    
	    $s='';
	    if(!empty($search)){
	    	$s .=" AND cart_product.product_id like '%".$search."%' OR cart_product.Order_id like '%".$search."%' ";	
	    }

	    $this->db->select('	cart_product.cart_product_id,
							cart_product.product_id,
							cart_product.Order_id,	
							cart_product.ordered_date,
							cart_product.order_status,
							products.prod_name')
				 ->from('cart_product')
				 ->join('products','products.prod_id=cart_product.product_id','left')
				 ->where("cart_product.seller_id=".$seller_id." ".$d." ".$s." ")
				 ->where("cart_product.Order_id!='' ")
				 ->order_by('cart_product.cart_product_id','desc');

		$data['seller_order'] = $this->db->get()->result_array();

		// echo "<pre>"; print_r($data['seller_order']); exit();
		$this->load->view('Seller_accounts/order_list_ajax',$data);


	}

	public function order_detail_page()
	{	
		$Order_id        = $this->uri->segment(3);
		$cart_product_id = $this->uri->segment(4);

		print_r($Order_id);
		
		$this->load->view('Seller_accounts/order_detail_page');
	}
}

?>