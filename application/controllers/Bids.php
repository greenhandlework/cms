<?php

class Bids extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('bids/bids');
	}

	public function get_bid_detail()
	{
		$this->load->view('bids/get_bid_detail');
	}

	public function create_bid()
	{
		$data['seller'] = $this->db->query("SELECT se.id,
												   se.business_name,
												   se.Classification,
												   se.Primary_Product,
												   se.Making_Process,
												   se.city,
												   se.email_id,
												   log.mobile_number,
												   log.account_status,
												   log.role_id,
												   log.user_id
											from seller_test se
											join login_test log
											on log.user_id=se.seller_id
											where se.email_id  <>'0' ")->result_array();
			$this->db->select('bid.*')
				->from('bid')
				->order_by('id','DESC');
		$data['bids'] = $this->db->get()->result_array();


		$this->load->view('bids/create_bid',$data);
	}

	public function put()
	{	
		 // print_r($_POST); exit();
		$product_name =ucwords($this->input->post('product_name')); 
		$quantity     = $this->input->post('quantity');
		
		$label        = $this->input->post('label'); 
		$value        = $this->input->post('value'); 
		$bid_id = 'GHBID_'.mt_rand(999999,99999999);


		if(!empty($_FILES['bid_image']['name'])){
                $config['upload_path'] = './upload/bids_image/';
                $config['allowed_types'] = '*';
                $config['file_name'] =rand(999,10000).'_'.$_FILES['bid_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('bid_image')){
                    $uploadData = $this->upload->data('bid_image');
                    $picture = $config['file_name'];

                }else{
                	 $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    $picture = '';
                    // exit();
                }
                }else{
            	$image   = "";
                $picture = $image;
            }

		$this->db->insert('bid',array('bid_id'=>$bid_id,
									  'product_name'=>$product_name,
									   'quantity'=>$quantity,
										'image'=>$picture));

		if(!empty($label) && !empty($value)){
				$cnt = count($label);

				for ($i=0; $i <$cnt ; $i++) { 
		   		// $data = array('bulk_id'=>$bulk_id,
		   		// 				'title'=>$title[$i],
		   		// 				'description'=>$desc[$i],
		   		// 				'date'=>date("Y-m-d H:i:s")	);
		   		if(empty($label[$i]) && empty($value[$i])){
		   				unset($label[$i]);
		   				unset($value[$i]);
		   		}else{

		   			$this->db->insert('bid_detail',array('bid_id'=>$bid_id,
										  'label'=>$label[$i],
										   'value'=>$value[$i],
											));
		   		
		   		}
		   	}
		}		
			
	}

	public function view_bid()
	{
		$id = $this->input->post('id');

		$this->db->select('bid.*,bid_detail.*')
				 ->from('bid')
				 ->join('bid_detail','bid_detail.bid_id=bid.bid_id');
		$data = $this->db->get()->result_array();
		echo "<pre>";
		print_r($data);

	}

	public function upload_img()
	{

		print_r($_GET);
		// $flowFilename='';
		echo "in function";
		 print_r($_FILES);
	}


}

 ?>