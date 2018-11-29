<?php 

//$filename = '../mail_directory/send_mail.php';
// // require 'Aws/aws-autoloader.php';
// /*use Aws\Ses\SesClient;
// use Aws\Ses\Exception\SesException;*/
// if (file_exists($filename)) {
//     echo "The file $filename exists";
// } else {
//     echo "The file $filename does not exist";
// }
// exit();


// $filename = '../mail_directory/send_mail.php';
 //require $filename;
class Enquiry extends CI_Controller
{
	
	public function index()
	{
		    $this->db->select('*')
		             ->from('bulk_order')
		             ->order_by('bulk_id','desc');
		$data['enq'] = $this->db->get()->result_array();


		 
		$this->load->view('bulk_order/enquiry',$data);
	}

	public function get()
	{
		// echo "<pre>"; print_r($_POST); exit();
		$enquiry_date = $this->input->post('enquiry_date');
    	$search       = $this->input->post('search');

    	$d = '';
    	if(!empty($enquiry_date) && $search==""){
    		$d .=" where date like '%".$enquiry_date."%' ";
    	}elseif(!empty($search) && $enquiry_date==""){
    		$d .=" where email like '%".$search."%' OR  mobile like '%".$search."%' ";
    	}elseif(!empty($enquiry_date) && !empty($search)){
    		$d.="where email like '%".$search."%' OR  mobile like '%".$search."%'  AND  date like '%".$enquiry_date."%'";
    	}

    	$q = "SELECT * from bulk_order ".$d." " ;
    	$data['enq'] = $this->db->query($q)->result_array();
    	// print_r($data['enq']); exit();
    	$this->load->view('bulk_order/ajax_enquiry',$data);
    	
	}


	public function bulk_order_detail()
	{
		$bulk_id = $this->uri->segment(3);
		// print_r($bulk_id);exit();

		$data['bulk_id'] = $bulk_id;
		$data['record'] = $this->db->get_where('bulk_order',array('bulk_id'=>$bulk_id))->result_array();
		// print_r($)

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


		$this->db->select('bulk_order_seller.*,
						   seller_test.business_name,
						   seller_test.city')
				  ->from('bulk_order_seller')
				  ->join('seller_test','seller_test.seller_id=bulk_order_seller.seller_id')
				  ->where("bulk_order_seller.bulk_id=".$bulk_id."")
				  ->order_by('bulk_order_seller.price asc');
		$data['responded'] = $this->db->get()->result_array(); 		
	//echo "<pre>";	print_r($data['responded']); exit();




		// $data['responded'] = $this->db->query("SELECT bo.seller_id,
		// 											  bo.bulk_id,
		// 											  bo.seller_email,
		// 											  bo.price,
		// 											  bo.gst,
		// 											  bo.delivery_date,
		// 											  bo.message,
		// 											  bo.status,
		// 											  bo.date,
		// 											  bo.total_weight,
		// 											  s.business_name,													 
		// 											  s.city
		// 											   from bulk_order_seller bo
		// 											  join seller_test s
		// 											  on s.seller_id=bo.seller_id
		// 											  where bo.bulk_id=".$bulk_id." order by bo.price=0 asc  ")->result_array();
		$data['order_quote'] = $this->db->get_where('bulk_order_quote',array('bulk_id'=>$bulk_id))->result_array();
		$this->load->view('bulk_order/bulk_order_detail',$data);
	}

		public function to_do_list()
	{
			$id_email = $this->input->post('id');
			$bulk_id = $this->input->post('bulk_id');

		$check_data = $this->db->query("SELECT * from bulk_order_seller where bulk_id=".$bulk_id." and seller_id=".$id_email." ");
		$num= $check_data->num_rows();
			
		if($num===1){
			$data = $this->db->query("SELECT bo.seller_id,bo.seller_email,
														  bo.price,
														  bo.delivery_date,
														  bo.message,
														  s.business_name,
														  s.seller_id as sel_id,
														  s.city
														   from bulk_order_seller bo
														  join seller_test s
														  on s.id=bo.seller_id
														  where bo.bulk_id=".$bulk_id." and bo.seller_id=".$id_email." ")->result_array();
			$email_id = $data[0]['seller_email'];

			echo "<tr id=a".$id_email."><td>". $data[0]['business_name']."<input type='text' name=emails[] value='".$data[0]['seller_id']."' style='display:none'></td><td>".$email_id."</td><td>".$data[0]['city']."</td><td>".$data[0]['price']."</td><td>".$data[0]['delivery_date']."</td><td>".$data[0]['message']."</td><td><a href='javascript:(0)'  class='btn-sm btn-danger' style='color:white' onclick='rem(".$id_email.")'><b>-</b></a></td></tr>"; 
		}else{
			//echo "in else";
			$data = $this->db->query("SELECT * from seller_test where id=".$id_email." ")->result_array();
			$email_id = $data[0]['email_id'];

			echo "<tr id=a".$id_email."><td></td><td>". $data[0]['business_name']."<input type='text' name=emails[] value='".$data[0]['id']."' style='display:none'></td><td>".$email_id."</td><td>".$data[0]['city']."</td><td></td><td></td><td></td><td></td><td></td><td><a href='javascript:(0)' class='btn-sm btn-danger' style='color:white' onclick='rem(".$id_email.")'><b>-</b></a></td></tr>"; 
		}

	}

	public function put()
	{	
		// echo "<pre>"; print_r($_POST); 
	// / echo "<pre>"; print_r($_FILES); exit();

		date_default_timezone_set("Asia/Kolkata");
		$date = date('Y-m-d');
		$bulk_id       = $this->input->post('bulk_id');
		
		$name          = $this->input->post('name');
	    $business_name = $this->input->post('business_name');
	    $mobile        = $this->input->post('mobile');
	    $email         = $this->input->post('email');
	    $product       = $this->input->post('product');
	    $quantity 	   = $this->input->post('quantity');
	    $message       = ltrim($this->input->post('message'),' ');
		$image         = $this->input->post('image');
		$city          = $this->input->post('city');
		$pincode       = $this->input->post('pincode');


	    $title         = $this->input->post('title') ;
	    $desc		   = $this->input->post('desc') ;
	    $emails        = $this->input->post('emails') ;

	     if(!empty($_FILES['img']['name'])){
                $config['upload_path'] = './upload/bulk_order/';
                $config['allowed_types'] = '*';
                $config['file_name'] =rand(999,10000).'_'.$_FILES['img']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('img')){
                    $uploadData = $this->upload->data('img');
                    $picture = $config['file_name'];

                }else{
                	 // $error = array('error' => $this->upload->display_errors());
                        // print_r($error);
                    $picture = '';
                    // exit();
                }


			// $target_dir = "./upload/";
			// $target_file = $target_dir . basename($_FILES["img"]["name"]);
			// $picture =	basename($_FILES["img"]["name"]);
			// $uploadOk = 1;
			// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
			//         //echo "The file ". basename( $_FILES["image_file"]["name"]). " has been uploaded.";
			//     } else {
			//         echo "Sorry, there was an error uploading your file.";
			//     }
			
            }else{
            	$image         = $this->input->post('present_img');
                $picture = $image;
            }

            $data_update = array('name'=>$name,
        						'business_name'=>$business_name,
        						'mobile'=>$mobile,
        						'email'=>$email,
        						'city'=>$city,
        						'pincode'=>$pincode,
        						'product'=>$product,
        						'quantity'=>$quantity,
        						'message'=>trim($message),
        						'image'=>$picture
        					);
          
        $this->db->set($data_update);
		$this->db->where('bulk_id', $bulk_id);
		$this->db->update('bulk_order'); //

	  $this->db->query("DELETE from bulk_order_quote  where bulk_id =".$bulk_id." ");	
	  if(!empty($title[0]) && !empty($desc[0])){
	  	  $cnt_title = count($title);

	   	for ($i=0; $i <$cnt_title ; $i++) { 
	   		$data = array('bulk_id'=>$bulk_id,
	   						'title'=>$title[$i],
	   						'description'=>$desc[$i],
	   						'date'=>date("Y-m-d H:i:s")	);
	   		if(empty($title[$i]) && empty($desc[$i])){
	   				unset($title[$i]);
	   				unset($desc[$i]);
	   		}else{
	   		 $this->db->query("INSERT into bulk_order_quote values('',$bulk_id,'$title[$i]','$desc[$i]','$date') ");
	   		}
	   	}
	  }
	  $url = base_url().'enquiry/bulk_order_detail/'.$_POST['bulk_id'];
	  redirect($url);
	}


public function ins_mail()
	{
	//echo "<pre>"; print_r($_POST); exit();
		if(!empty($_POST['emails'])){
		date_default_timezone_set("Asia/Kolkata");
		$bulk_id = $this->input->post('bulk_id');
		$emails = $this->input->post('emails');
		
		$separate_email = implode(',',$emails); 	 
		$data_delete= $this->db->query("DELETE from bulk_order_seller where bulk_id='".$bulk_id."' and seller_id NOT IN (".$separate_email.") ");

		foreach ($emails as $key => $value) {

			$this->db->select('*');
			$this->db->from('seller_test');
			$this->db->where('id',$value);
			$get_email = $this->db->get()->result_array();
		 
			$mail = $get_email[0]['email_id'];
			$sel_id = $get_email[0]['seller_id'];
			//echo "<pre>";	print_r($sel_id); 
			 $check_data = array('bulk_id'=>$bulk_id,
							'seller_id'=>$value);
			 $prod_id = 'GHBULK_'.mt_rand(999999,99999999);
			  $get = $this->db->get_where('bulk_order_seller',$check_data);
			   $num = $get->num_rows();
			  // print_r($num);
			   if($num===0){
			 	 $data = array('bulk_id'=>$bulk_id,
							'seller_id'=>$sel_id,
							'prod_id'=>$prod_id,
							'seller_email'=>$mail,
							'price' =>'',
							'date'=>date("Y-m-d H:i:s"));
				$this->db->insert('bulk_order_seller',$data);

				$this->db->select('product,quantity');
				$this->db->from('bulk_order');
				$this->db->where('bulk_id',$bulk_id);
				$get_data = $this->db->get()->result_array();
				
				$product = $get_data[0]['product'];
				$quantity = $get_data[0]['quantity'];
				if(isset( $get_data[0]['image'])){
				$image =  $get_data[0]['image']; 
				}else{
					$image='default.jpg';
				}
				
				$encode_bulk_id = $this->encrypt->encode($bulk_id);
				$blk=strtr($encode_bulk_id,array('+' => '.', '=' => '-', '/' => '~'));
				
				$seller_id = $this->encrypt->encode($sel_id);
				$slr=strtr($seller_id,array('+' => '.', '=' => '-', '/' => '~'));
				
				$this->db->select('title,description');
				$this->db->from('bulk_order_quote');
				$this->db->where('bulk_id',$bulk_id);
				$get_quote = $this->db->get()->result_array();
				$url = "https://www.greenhandle.in/get_bulk_order/final_quote?bid=".$blk."&sid=".$slr."";
				$new_obj = new Send_mail();		   
				$title = 'Bulk order quotation request';
				// $content = "<table><tr><td>Product</td><td style='padding-right:50px'>".$product."</td><td></td><td><tr> <td>pro</td><td>".$product."</td></tr> </td></tr></table>";
		   		$HTMLBODY = $this->test_mail->mail($title,$url);
		        $RECIPIENT = $mail;
		        $SUBJECT= 'Quotation';
		        $SENDER = 'quote@greenhandle.in';
		       $s =$new_obj->send_mail1($RECIPIENT,$SENDER,$SUBJECT,$HTMLBODY);

			 }
		}
		}else{
			$url = base_url().'enquiry/send_quotation/'.$_POST['bulk_id'];
			redirect($url);
		}
		$url = base_url().'enquiry/send_quotation/'.$_POST['bulk_id'];
			redirect($url);
	}


		function place_order()
	{
		//print_r($_POST); exit();
		 $bulk_id    = $this->input->post('bulk_id'); 
		 $seller_id  = $this->input->post('seller_id'); 
		
		 $query1 = $this->db->get_where('seller_test',array('seller_id'=>$seller_id))->result_array();
			$get_seller_zipcode = $query1[0]['zipcode'];

			$query2 = $this->db->get_where('bulk_order',array('bulk_id'=>$bulk_id))->result_array();
			$get_buyer_zipcode = $query2[0]['pincode'];
			$product_quantity  = $query2[0]['quantity'];
			$from_type         = $query2[0]['from_type'];

			$query3 = $this->db->get_where('bulk_order_seller',array('bulk_id'=>$bulk_id,'seller_id'=>$seller_id))->result_array();
			$total_weight      = $query3[0]['total_weight'];
			$product_per_price = $query3[0]['price'];
			$gst_on_product    = $query3[0]['gst'];
			$product_id        = $query3[0]['prod_id'];	

			$get_shipping_charge = $this->shipping_calculate->shipping_calculation($get_buyer_zipcode,$get_seller_zipcode,$total_weight);  //correct
			//ppp
			$price_per_piece1   = (10*$product_per_price)/100;
			//echo "Shipping->";print_r($get_shipping_charge);
			$gh_margin = ($product_per_price * $product_quantity)*10/100; //correct

			//echo "<-- gh margin -->";print_r($gh_margin);
			$total_gst =($price_per_piece1 * $product_quantity)*$gst_on_product/100;  //correct

			//echo "<-- total_gst -->";print_r($total_gst);
			$product_wise_total = ($product_per_price * $product_quantity)+$total_gst+$gh_margin+$get_shipping_charge;
			
			//echo "product_wise_total";print_r($product_wise_total); exit();
			
			//for user_id
		    $user_id = "GHUSERID_".random_string('numeric', 10);
		    $ip_address = $this->input->ip_address();

		    $cart_session = time();

		     $data_for_cart = array('cart_session' =>$cart_session, 		    						
		    						'user_id'     =>$user_id,
		    						'cart_total'  =>$product_wise_total,
		    						'ip_address'  =>$ip_address, 	
		    						);
		     $this->db->insert('cart',$data_for_cart);
		     $insert_id = $this->db->insert_id();
		     //print_r($insert_id);exit();
		     if($this->db->affected_rows()>0){
		     	$query4 = $this->db->get_where('cart',array('cart_id'=>$insert_id))->result_array();
		     	$cart_id = $query4[0]['cart_id'];
		     	$cart_sessions = $query4[0]['cart_session'];

		     	$all_data = array('cart_id'            => $cart_id,
			    				  'product_id'         => $product_id,
								  'quantity'           => $product_quantity,
								  'product_price'      => $price_per_piece1,
								  'product_wise_total' => $product_wise_total,
								  'seller_id'          => $seller_id,
								  'product_type'       => $from_type,
								  'shipping_charges'   => $get_shipping_charge,
								  'ship_zhipcode'      => $get_buyer_zipcode,
								  'cart_session'	   => $cart_sessions
								);
				$this->db->insert('cart_product',$all_data);

				if($this->db->affected_rows()>0){
					//send mail to seller as well as buyer
					$get_order_detail = $this->db->get_where('bulk_order_quote',array('bulk_id'=>$bulk_id))->result_array();
					$price_per_piece   = (10*$product_per_price)/100;
					$total_price_wogst = $product_quantity*$price_per_piece;
					$final_price       = $price_per_piece + $total_price_wogst;

					$data = array(
			        'email_title' => 'My Blog Title',
			        'email_content' => $get_order_detail,
			        'price_per_piece'=>$price_per_piece,
			        'total_price_wogst'=>$total_price_wogst,
			        'total_gst'=>$total_gst,
			        'final_price'=>$final_price
					);
					$string = $this->parser->parse('emails/buyer_bulk_confirmation_mail.html', $data, TRUE);
					$new_obj = new Send_mail();		   
				
			   		$HTMLBODY = $string;
			        $RECIPIENT = 'pvpatil2407@gmail.com';
			        $SUBJECT= 'Buyer Order Detail';
			        $SENDER = 'parse_test@greenhandle.in';
			       $s =$new_obj->send_mail1($RECIPIENT,$SENDER,$SUBJECT,$HTMLBODY);


				}
		     }
	}


}

?>