<?php

/**
 * 
 */
class Order_details extends CI_Controller
{
	public function order()
	{

		$this->db->select('products.prod_name,
			               products.prod_image1,
						   cart_product.cart_product_id,
						   cart_product.Order_id,
						   cart_product.ordered_date,
						   cart_product.quantity,
						   cart_product.payment_Amount,
						   cart_product.order_status,
							 login.email,
							 login.mobile_number')
		         ->from('cart_product')
		         ->join('login', 'cart_product.cuser_id = login.user_id')
		         ->join('products', 'products.prod_id = cart_product.product_id')
		         ->order_by('cart_product.cart_product_id','desc')
		         ->where('cart_product.payment_done','1');
		        //	 ->limit(10);
		$data['cart_data'] = $this->db->get()->result_array(); 
	 //echo "<pre>";	print_r($data['cart_data']); exit();
		$this->load->view('order/order',$data);
	}

	public function get()
	{
		//echo "<pre>"; print_r($_POST); exit();
		$search        = $this->input->post('search');
		$order_status  = $this->input->post('order_status'); 
		$order_date    = $this->input->post('order_date');
		//$check='->where(cart_product.order_status="Order")';
		// $a=$this->db->select('products.*,
		// 				   gusset.gusset_name,
		// 				   cart_product.cart_product_id,
		// 				   cart_product.product_id,
		// 				   cart_product.Order_id,
		// 				   cart_product.Gst,
		// 				   cart_product.ordered_date,
		// 				   cart_product.product_delivered_date,
		// 				   cart_product.quantity,
		// 				   cart_product.payment_Amount,
		// 				   cart_product.order_status,
		// 				   cart_product.product_price,
		// 				   cart_product.discount,
		// 				   cart_product.shipping_charges,
		// 				   cart_product.product_wise_total,
		// 				   login.email,
		// 				   login.mobile_number,
		// 				   login.first_name,
		// 				   login.last_name,
		// 				   login.name,
		// 				   login.address_1,
		// 				   login.address_2,
		// 				   login.state,
		// 				   login.city,
		// 				   login.zipcode,
		// 				   sel_log.name as sel_name,
		// 				   sel_log.mobile_number as sel_mobile,
		// 				   seller.business_name as sel_business,
		// 				   seller.email_id as sel_email,
		// 				   seller.city as sel_city,
		// 				   seller.state as sel_state,
		// 				   seller.zipcode as sel_zipcode,
		// 				   seller.address_1 as sel_address1,
		// 				   seller.address_2 as sel_address2 ')
		//          ->from('cart_product')
		//          ->join('login', 'cart_product.cuser_id = login.user_id')
		//          ->join('login as sel_log', 'cart_product.seller_id = sel_log.user_id')
		//          ->join('products', 'products.prod_id = cart_product.product_id')
		//          ->join('gusset', 'gusset.id = products.gusset')
		//          ->join('seller', 'seller.seller_id = cart_product.seller_id')
		//          ->where("login.email LIKE '%".$search."%' OR cart_product.order_id LIKE 'GHTRID_".$search."%' OR login.mobile_number LIKE '%".$search."%' AND cart_product.order_status='".$order_status."' ")
		//          // ->where(" login.email LIKE '%".$search."%' OR cart_product.order_id LIKE 'GHTRID_".$search."%' OR login.mobile_number LIKE '%".$search."%' AND cart_product.order_status='".$order."'  ")  
		//          ->order_by('cart_product.cart_product_id','desc');	

		$d='';
		if(!empty($order_date)){
			
			$d .=" AND cart_product.ordered_date='".$order_date."'";
		}

		$d1='';
		if(!empty($search)){
			$d1 .="login.email LIKE '%".$search."%' OR cart_product.Order_id LIKE 'GHTRID_".$search."%' OR login.mobile_number LIKE '%".$search."%' AND ";
		}

		$this->db->select('products.prod_name,
			               products.prod_image1,
						   cart_product.cart_product_id,
						   cart_product.Order_id,
						   cart_product.ordered_date,
						   cart_product.quantity,
						   cart_product.payment_Amount,
						   cart_product.order_status,
							 login.email,
							 login.mobile_number')
		         ->from('cart_product')
		         ->join('login', 'cart_product.cuser_id = login.user_id','left')
		         ->join('products', 'products.prod_id = cart_product.product_id','left')
		         ->where(" ".$d1." cart_product.order_status='".$order_status."' ".$d." AND cart_product.Order_id!=''  ")
		         ->order_by('cart_product.cart_product_id','desc');
		$data['cart_data'] = $this->db->get()->result_array(); 
	   // echo "<pre>";	print_r($this->db->last_query()); exit();
		 $this->load->view('order/ajax_order',$data);
		// echo "<pre>";
		//echo json_encode($data);
		// exit();	
	}


	public function order_detail()
	{
		$order_id        = $this->uri->segment(3);
		$cart_product_id = $this->uri->segment(4);
		//print_r($order_id);
	/*	products.prod_name,
						   products.GSM_name,
						   products.style,
						   products.size,
						   products.handle,
			               products.prod_image1, */
		$this->db->select('products.*,
						   gusset.gusset_name,
						   cart_product.cart_product_id,
						   cart_product.product_id,
						   cart_product.Order_id,
						   cart_product.Gst,
						   cart_product.ordered_date,
						   cart_product.product_delivered_date,
						   cart_product.quantity,
						   cart_product.payment_Amount,
						   cart_product.order_status,
						   cart_product.product_price,
						   cart_product.discount,
						   cart_product.shipping_charges,
						   cart_product.product_wise_total,
						   login.email,
						   login.mobile_number,
						   login.first_name,
						   login.last_name,
						   login.name,
						   login.address_1,
						   login.address_2,
						   login.state,
						   login.city,
						   login.zipcode,
						   sel_log.name as sel_name,
						   sel_log.mobile_number as sel_mobile,
						   seller.business_name as sel_business,
						   seller.email_id as sel_email,
						   seller.city as sel_city,
						   seller.state as sel_state,
						   seller.zipcode as sel_zipcode,
						   seller.address_1 as sel_address1,
						   seller.address_2 as sel_address2
							 ')
		         ->from('cart_product')
		         ->join('login', 'cart_product.cuser_id = login.user_id')
		         ->join('login as sel_log', 'cart_product.seller_id = sel_log.user_id')
		         ->join('products', 'products.prod_id = cart_product.product_id')
		         ->join('gusset', 'gusset.id = products.gusset')
		         ->join('seller', 'seller.seller_id = cart_product.seller_id')
		         //->order_by('cart_product.cart_product_id','desc')
		         ->where('cart_product.order_id',$order_id)
		         ->where('cart_product.cart_product_id',$cart_product_id);

		     $data['detail']= $this->db->get()->result_array();
		       // /echo "<pre>"; print_r($data['detail']); exit();
	     	$this->load->view('order/order_detail_page',$data);
	}
	
}
 ?>