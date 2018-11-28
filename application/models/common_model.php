<?php 
class Common_model extends CI_Model
{
    function getproductDetails($data=null)
	{
		if(count($data)>0){
			
			$where=$data['where'];
			$table=$data['table'];
			//$order_by=$data['order_by'];
			//$sql=$this->db->query('select * from '.$table.' '.$where.' '.$order_by.'');
			$sql=$this->db->query('select * from '.$table.' '.$where.'');
			//print_r($sql);die();
			$cart_product = $sql->result_array();
			//print_r($cart_product[0]['product_id']);die();

			for ($i=0; $i< count($cart_product) ; $i++) {  //print_r(count($productid));die();
				 $sql= $this->db->query("select * from products where prod_id = '".$cart_product[$i]['product_id']."' AND product_status!=4");	
				 $products[$i] = $sql->result_array();		
			} // print_r($products);die();  
			//print_r($products[0][0]['prod_id']);die(); //first index must be $i and 2nd always 0
			$data['products'] = $products;   //take product_image, prod name,
			//print_r($data['products']) ;die();
			return $data;
		}
	}// newly added for gh_story -my products
	function getAllDetails($data=null)
	{
		if(count($data)>0){
			
			$where=$data['where'];
			$table=$data['table'];


			//$order_by=$data['order_by'];
			//$sql=$this->db->query('select * from '.$table.' '.$where.' '.$order_by.'');
			$sql=$this->db->query('select * from '.$table.' '.$where.'');
			//echo $this->db->last_query().'<br><br><br>'; //exit;
			return $sql->result_array();
		}
	}
	function insertreview($data)
	{
		$date = date("Y-m-d");
      $insertdata = array(
       'product_id' => $data['product_id'],
       'review_headline' =>$data['review_one_word'],
       'name'=>$data['reviewer_name'],
       'review_msg' =>$data['review_details'],
       'star_rating' =>$data['rate_review'],
       'review_date'=>$date

      	);
      $this->db->insert('reviews',$insertdata);

	}
	function reviewsvalue($prod_data)

	{
		$sql=$this->db->query("select avg(start_rating) as avg from product_review where prod_id = '$prod_data'");
		return $sql->result_array();
	}
	function viewvalue($prod_data)

	{
		$sql=$this->db->query("select count(*) as value from product_review where prod_id = '$prod_data'");
		return $sql->result_array();
	}
	function getname($user_id)
	{
		$sql = $this->db->query("select first_name,last_name from login where user_id='$user_id'");
		return $sql->result_array();



	}
	function retrieverivews($prod_data)
	{

		$sql = $this->db->query("select * from product_review where prod_id = '$prod_data'");
		
		return $sql->result_array();
	}
	function retrieveproductid($cart_id)
	{

		$sql = $this->db->query("select cart_product_id from cart_product where cart_id = '$cart_id'");
		return $sql->result_array();
	}
	function retrieveuserid($cart_id)
	{
       $sql = $this->db->query("select user_id from cart where cart_id = '$cart_id'");
		return $sql->result_array();
	

	}

	function getShippingAddr($email_id=null)
	{ 
	
	
	
	$email=$email_id['email_id'];
	        $sql = $this->db->query("SELECT * FROM seller WHERE email_id='$email'");
 		//	echo $this->db->last_query(); die;
			return $sql->result_array();
  
	}

        function Update_ShippingAddr($user_id=null)
	{
		//print_r($user_id['user_id']);die();
			//$seller_id = $user_id;
			$SellerShipping = array(
			  
              'address_1' => $this->input->post('address1'),
              'address_2'=> $this->input->post('address2'),
              'zipcode' => $this->input->post('zipcode'),
              'city' => $this->input->post('city'),
              'state' => $this->input->post('state'),
              'business_name' => $this->input->post('business_name'),
              'pan' => $this->input->post('pan'),
              'tin' => $this->input->post('tin'),
              'tan' => $this->input->post('tan'),
              'account_holder' => $this->input->post('account_holder'),
              'account_number' => $this->input->post('account_number'),
              'IFSC_code' => $this->input->post('IFSC_code'),
              'bank' => $this->input->post('bank'),
              'bank_state' => $this->input->post('bank_state'),
              'bank_city' => $this->input->post('bank_city'),
              'branch' => $this->input->post('branch'),
              'display_name' => $this->input->post('display_name'),
              'store_description' => $this->input->post('store_description'),
            );

//print_r($SellerShipping['address_1']);die();
           
    		$this->db->where('seller_id',$user_id['user_id']);
    		$this->db->update('seller',$SellerShipping);
    		
	}//end seller shipping detail 

        function getbuyerDetails($user_id=null)
	{
			$sql = $this->db->query("SELECT * FROM login WHERE user_id ='".$user_id['user_id']."'");
			
			return $sql->result_array();

	}
        
		function password_check($OldPassword,$user_id){
			$sql=$this->db->query("select count(*) as Total from login where password = '$OldPassword' AND user_id='$user_id'");
		return $sql->result_array();
		}
		
		
    function Update_buyerdata($user_id=null,$buyerShipping = null)
	{
           
    		$this->db->where('user_id',$user_id['user_id']);
    		$this->db->update('login',$buyerShipping);
    		
	}//end seller shipping detail 

	//////////////////All functions regarding Filter//////////////////////////////

	//to retrive material result to down side based on subcategory//

	function getsubcategory_filter($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
/*		
//		$sql = $this->db->query("select * from products where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_status=2 GROUP BY  `product_material`");
//echo "select * from products where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_status=2 GROUP BY  `product_material`";
//		$sql = $this->db->query("select * from filters where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id GROUP BY  `material_name`");
//		return $sql->result_array();

		$sql = $this->db->query("select material_id from filters where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id GROUP BY  `material_name`");
		$td = $sql->result_array();
		$l = count($td);
		$idid = $td[0]['material_id'];
		for ($i=1; $i < $l; $i++) { 
			$idid .= ' OR material_id='.$td[$i]['material_id'];
		}
//		echo "select * from products a, filters b where a.section_id = $section_id and a.cat_id=$cat_id and a.sub_cat_id=$sub_cat_id and a.product_status=2 and a.material_id= b.material_id GROUP BY  `product_material`";
*/		$sql = $this->db->query("select * from products a, filters b where a.section_id = $section_id and a.cat_id=$cat_id and a.sub_cat_id=$sub_cat_id and a.product_status=2 and a.material_id= b.material_id GROUP BY a.material_id");
		//echo $this->db->last_query();
		return $sql->result_array();
	}

	function delivered_sub_category($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		$sql = $this->db->query("select * from products where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id GROUP BY  `product_material`");
		return $sql->result_array();
	}
        
	function delivered_sub_category1($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		
		$sql = $this->db->query("select sc.*,p.* from products as p 
		LEFT JOIN subcategory as sc ON  p.sub_cat_id = sc.sub_cat_id WHERE 
p.section_id='$section_id' and p.cat_id='$cat_id' and p.sub_cat_id='$sub_cat_id' and p.product_status=2 GROUP BY  p.product_material");
//echo "select * from products where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_status=2 GROUP BY  `product_material`";
		return $sql->result_array();

	}

	// Breadcrum data///////////////////////////////////////////////

	function subcategory_name($sub_cat_id=null)
	{
		$sql = $this->db->query("select sub_cat_name from subcategory where sub_cat_id=$sub_cat_id");
   	 	 return $sql->result_array(); 
	}

        function section_name($sec_id=null)
	{
		$sql = $this->db->query("select section_name from sections where section_id=$sec_id");
   	 	 return $sql->result_array(); 
	}

        function getcategory_name($cat_id=null,$section_id=null)
	{
			$sql = $this->db->query("select * from category where section_id = $section_id and cat_id=$cat_id");
			
			return $sql->result_array();
			
	}

        function delivered_sub_category_filter($section_id=null,$cat_id=null)
	{
		
		$sql = $this->db->query("select * from subcategory where section_id = $section_id and cat_id=$cat_id");
		return $sql->result_array();

	}

	function getsubmaterial_filter($material_id=null)
	{
		$sql = $this->db->query("select * from filters where material_id=$material_id");
		return $sql->result_array();

	}

	function delivered_material_filter($material_id=null)
	{
		$sql = $this->db->query("select * from products where product_material='".$material_id."' AND product_status!=4");
		return $sql->result_array();

	}

	//to retrive product result to right side based on subcategory//

	function getsubcat_relatedprod($array=null)
	{	
			$sql = $this->db->query("select * from products where cat_id='".$array['1']."' and section_id='".$array['0']."' and sub_cat_id='".$array['2']."' and product_status=2");
							//echo $this->db->last_query();exit;
			return $sql->result_array();
			
	}

    function getsection_relatedprod($array=null)
	{	//echo "arrd :- select * from products where cat_id='".$array['1']."' and section_id='".$array['0']."' and product_status=2<br><br><br>";
			$sql = $this->db->query("select cat_id from products where section_id=".$array['0']." and cat_id=".$array['1']." and product_status=2");
			return $sql->result_array();
	}
	
	function getStyleProd($param=array())
	{	
		$section	= $param[0];
		$category	= $param[1];
		$style		= $param[3];
		
		
		if(isset($section) && $section == 2){
			$this->db->where('section_id',$section);
		}
		elseif(isset($section) && isset($category)){
			$this->db->where('section_id',$section);
			$this->db->where('cat_id',$category);
		}
		$this->db->where('style',$style);
		$this->db->where('product_status','2');
		$query = $this->db->get('products',9,0);
		$result=$query->result_array();
		
		$this->db->select('count(id) as count');
		$queryAll = $this->db->get('products');
		$rowCount=$queryAll->result_array();
		
		return array('results'=>$result,'count'=>$rowCount[0]);
	}

	function count_cat($arr=null)
	{
		$this->db->limit(9,0);
		$this->db->where('section_id',$arr['0']);
		$this->db->where('product_status','2');
		$query = $this->db->get('products',9,0);
		$row=$query->result_array();
		return $row;
	}

    function count_subcat_prod_data($sec_id=null,$cat_id=null,$sub_cat_id = null)
	{
		$this->db->limit(9,0);
		$this->db->where('section_id',$sec_id);
		$this->db->where('cat_id',$cat_id);
		$this->db->where('sub_cat_id',$sub_cat_id);
		$this->db->where('product_status','2');
		$query = $this->db->get('products',9,0);
		$row=$query->result_array();
		return $row;
	}

    function count_subcat_data($sec_id=null,$cat_id=null)
	{
		$this->db->limit(9,0);
		$this->db->where('section_id',$sec_id);
		$this->db->where('cat_id',$cat_id);
		$this->db->where('product_status','2');
		$query = $this->db->get('products',9,0);
		$row=$query->result_array();
		return $row;
	}

    function count_section($arr=null)
	{
		if(2 == 6){
//		if(count($arr) == 6){
/*			$this->db->limit(9,0);
			$this->db->where('section_id',$sec_id);
			$this->db->where('cat_id',$cat_id);
			$this->db->where('product_status','2');
			$query = $this->db->get('products',9,0);
			$row=$query->result_array();
			return $row;
*/		
		$this->db->limit($arr['4'],$arr['5']);
		$this->db->where('section_id',$arr['0']);
		$this->db->where('cat_id',$arr['1']);
		$this->db->where('product_status','2');
		$query = $this->db->get('products', $arr['4'],'18');
		$row=$query->result_array(); 
	//	echo $this->db->last_query();
		return $row;
		}
		else {
		$this->db->limit($arr['3'],$arr['4']);
        $this->db->where('product_status','2');
		$this->db->where('section_id',$arr['0']);
		$this->db->where('cat_id',$arr['1']);
		$query = $this->db->get('products', $arr['3'],$arr['4']);
//		echo $this->db->last_query();
		$row=$query->result_array(); 
		return $row; }
	}

	function getcat_relatedprod($array=null)
	{	
		$sql = $this->db->query("select * from products where section_id='".$array['0']."' and product_status=2");
		return $sql->result_array();
	}
  
        function getsub_cat_relatedprod($section_id=null,$cat_id=null)
	{	
			$sql = $this->db->query("select * from products where section_id='".$section_id."' and cat_id='".$cat_id."' and product_status=2");
			return $sql->result_array();
			
	}

	// function product_details($prod_id=null)
	// {	
	// 		$sql = $this->db->query("select * from quantity_vs_price where prod_id=$prod_id");
	// 		return $sql->result_array();
			
	// }

	//to retrive GSM result to down side based on material//

	function search_material($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and product_status=2 GROUP BY  `GSM_name`");
		return $sql->result_array();
	}

	function search_material_for_deliver($section_id=null,$cat_id=null,$sub_cat_id=null,$product_material=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_material='".$product_material."' and product_status=2 GROUP BY  `GSM_name` ");
		return $sql->result_array();
	}

	//to retrive Style result to down side based on subcategory//

	function search_style($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null)
	{
		$sql = $this->db->query("select * from products where section_id='".$section_id."' and cat_id='".$cat_id."' and sub_cat_id='".$sub_cat_id."' and material_id='".$material_id."' and GSM_name='".$GSM_name."' and product_status=2 GROUP BY `style_id`");
		//echo $this->db->last_query();	 exit();
		return $sql->result_array();
	}

	function search_delivered_style($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null)
	{
		$sql = $this->db->query("select * from products where section_id='".$section_id."'  and cat_id='".$cat_id."'  and sub_cat_id='".$sub_cat_id."'  and product_material='".$material_id."' and GSM_name='".$GSM_name."' and product_status=2 GROUP BY  `style_id`");
		//echo $this->db->last_query();
		return $sql->result_array();
	}

	function style_name($style_id=null)
	{
		$sql = $this->db->query("select * from style_details where style_id=$style_id  GROUP BY  `style`");
		return $sql->result_array();
	}
         
        function price_vs_qty($prod_id=null)
	{
		
                $query = $this->db->query("select * from quantity_vs_price where prod_id = '".$prod_id."'  and sell_price != 0");
		$row=$query->result_array();
		return $row;
	}

	//to retrive size result to down side based on style//

	function getfilterSize_product($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$style_id=null,$GSM_name=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and style_id=$style_id and GSM_name='".$GSM_name."' and product_status=2 GROUP BY  `size`");
		return $sql->result_array();
	}

	function delivered_Size_product($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$style_id=null,$GSM_name=null)
	{
		$style_query = ""; //added by umesh
		if($style_id != '')
		{
			$style_query = "AND style_id='".$style_id."'";
		}
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_material='".$material_id."' and GSM_name='".$GSM_name."' and product_status=2 $style_query GROUP BY  `product_material_size`");
		return $sql->result_array();
	}

	//to retrive size result to right side based on style and size//

	function getfilterSize($style_id=null,$size=null)
	{
		$sql = $this->db->query("select * from products where style_id=$style_id and size=$size and product_status=2");
		return $sql->result_array();
	}

	//to retrive handle result to down side based GSM//

	function getfilterhandle($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null)
	{

		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name='".$GSM_name."' and style_id=$style_id and size='".$size."' and product_status=2 GROUP BY  `handle`");
		return $sql->result_array();
	}

	function delivered_filterhandle($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null)
	{

		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_material='".$material_id."' and GSM_name='".$GSM_name."' and product_material_size='".$style_id."' and product_status=2  GROUP BY  `product_material_size`");
		//echo $this->db->last_query();exit;
		return $sql->result_array();
	}

	//to retrive print result to down side based handle//

	function getfilterprint($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null,$handle=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name='".$GSM_name."' and style_id='".$style_id."' and size='".$size."' and handle='".$handle."' and product_status=2 GROUP BY  `print`");
		return $sql->result_array();
	}

	function delivered_filterprint($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null,$handle=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and product_material='".$material_id."' and GSM_name='".$GSM_name."' and product_material_size='".$style_id."' and handle='".$handle."' and product_status=2");
		return $sql->result_array();
	}

	//to retrive print_color result to down side based print//

	function getfilterprint_color($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null,$handle=null,$print=null)
	{
		$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name='".$GSM_name."' and style_id='".$style_id."' and size='".$size."' and handle='".$handle."' and print='".$print."' and product_status=2 GROUP BY  `print_color`");
		return $sql->result_array();
	}

	//to retrive lamination result to down side based print_color//

	function getfilterlamination($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$style_id=null,$size=null,$handle=null,$print,$print_color=null)
	{ 
		 $query = "SELECT * FROM products 
			WHERE section_id=$section_id
			AND cat_id=$cat_id
			AND sub_cat_id=$sub_cat_id
			AND material_id='".$material_id."'
			AND GSM_name='".$GSM_name."'
			AND style_id='".$style_id."'
			AND size='".$size."'
			AND handle='".$handle."' 
			AND print='".$print."'
			AND print_color='".$print_color."' 
			AND product_status=2  GROUP BY  `lamination`";	
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	//to retrive special_wrk result to down side based lamination//

	// function getfiltersecial_wrk($section_id=null,$cat_id=null,$sub_cat_id=null,$material_id=null,$GSM_name=null,$handle=null,$print,$print_color=null,$lamination=null)
	// {
	// 	$sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and handle=$handle and print=$print and print_color=$print_color and lamination=$lamination");
	// 	return $sql->result_array();
	// }

	//to retrive product result to right side for handle,print,print_color,lamination,//

	function getmaterial_relatedprod($array=null)
	{		
		
		//print_r($array);
		$a = $this->session->userdata('size_details');
		$b = $this->session->userdata('style_id');	
		if (count($array)==7) {

			$this->db->limit($array['5'],$array['6']);
			$this->db->where('section_id',$array['0']);
			$this->db->where('cat_id',$array['1']);
			$this->db->where('sub_cat_id',$array['2']);			
			$this->db->where('product_status','2');
			
			if ($array['0']!=2) {
				$this->db->where('material_id',$array['4']);
			}
			else
			{
				$this->db->where('product_material',$array['4']);
			}
			$query = $this->db->get('products',$array['5'],$array['6']);
			$row=$query->result_array();
			return $row;
		}
		else if(count($array)==8)
		{						
				$this->db->limit($array['6'],$array['7']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('GSM_name',$array['5']);
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
				}
				else
				{
					$this->db->where('product_material',$array['4']);
				}							
				$query = $this->db->get('products',$array['6'],$array['7']);

				$row=$query->result_array();
				return $row;		
			
		}
		else if(count($array)==9)
		{	 // 2/10/110/1/Color jute/M-Vertical/260-5kg/9/0
				$this->db->limit($array['7'],$array['8']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('GSM_name',$array['6']);
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					//$this->db->where('style',$array['5']);
				}
				else
				{ 
					$this->db->where('product_material',$array['4']);
					//$this->db->where('product_material_size',$array['5']);
					$this->db->where('style_id',$array['5']);
				}		
				$query = $this->db->get('products',$array['7'],$array['8']);
				//echo $this->db->last_query();exit;
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==10)
		{	
			// echo "<pre>";
   // print_r($array);
				$this->db->limit($array['8'],$array['9']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('GSM_name',$array['7']);					
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					//$this->db->where('size',$array['6']);
					$this->db->like('size', $array['6']);
				}
				else
				{
					$this->db->where('product_material',$array['4']);
					$this->db->like('product_material_size',$array['6']); // added by Yogesh
					//$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}			
				$query = $this->db->get('products',$array['8'],$array['9']);

				
				$row=$query->result_array();
				//echo $this->db->last_query(); //exit;
				return $row;	
			
		}
		else if(count($array)==11)
		{
				$this->db->limit($array['9'],$array['10']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('material_id',$array['4']);
				$this->db->where('GSM_name',$array['7']);
				$this->db->where('style_id',$array['5']);
				$this->db->like('size',$array['6']);
				$this->db->where('handle',$array['8']);
				$this->db->where('product_status','2');				
				$query = $this->db->get('products',$array['9'],$array['10']);
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==12)
		{
			
				$this->db->limit($array['10'],$array['11']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);								
				$this->db->where('product_status','2');	
                                if ($array['0']!=2) {
                                        $this->db->where('GSM_name',$array['7']);
                                        $this->db->where('handle',$array['8']);
				        $this->db->where('print',$array['9']);	
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					$this->db->like('size',$array['6']);
				}
				else
				{
					$this->db->where('GSM_name',$array['9']);
                                        $this->db->where('product_material',$array['4']);
					$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}		
				$query = $this->db->get('products',$array['10'],$array['11']);
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==13)
		{
			
				$this->db->limit($array['11'],$array['12']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);	
				
				
                                if ($array['0']!=2) {
                                        $this->db->where('GSM_name',$array['7']);
                                        $this->db->where('handle',$array['8']);
				        $this->db->where('print',$array['9']);	
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					$this->db->like('size',$array['6']);
                                        $this->db->where('print',$array['9']);
                                        $this->db->where('print_color',$array['10']);
				}
				else
				{
					$this->db->where('GSM_name',$array['9']);
                                        $this->db->where('handle',$array['10']);
                                        $this->db->where('product_material',$array['4']);
					$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}
				$this->db->where('product_status','2');				
				$query = $this->db->get('products',$array['11'],$array['12']);
				$row=$query->result_array();
				return $row;
			
		}
		else if(count($array)==14)
		{
			
				$this->db->limit($array['12'],$array['13']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('material_id',$array['4']);
				$this->db->where('GSM_name',$array['7']);
				$this->db->where('style_id',$array['5']);
				$this->db->like('size',$array['6']);
				$this->db->where('handle',$array['8']);
				$this->db->where('print',$array['9']);
				$this->db->where('print_color',$array['10']);
				$this->db->where('lamination',$array['11']);
				$this->db->where('product_status','2');				
				$query = $this->db->get('products',$array['12'],$array['13']);
				$row=$query->result_array();

				return $row;	
			
		}
		
	}

    function getmaterial_relatedprod_total_page($array=null)
	{		
		
		//print_r($array);die();
		$a = $this->session->userdata('size_details');
		$b = $this->session->userdata('style_id');	
		if (count($array)==7) {
			$this->db->where('section_id',$array['0']);
			$this->db->where('cat_id',$array['1']);
			$this->db->where('sub_cat_id',$array['2']);			
			$this->db->where('product_status','2');
			
			if ($array['0']!=2) {
				$this->db->where('material_id',$array['4']);
			}
			else
			{
				$this->db->where('product_material',$array['4']);
			}
			$query = $this->db->get('products');
			$row=$query->result_array();
			return $row;
		}
		else if(count($array)==8)
		{
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('GSM_name',$array['5']);
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
				}
				else
				{
					$this->db->where('product_material',$array['4']);
				}							
				$query = $this->db->get('products');
				$row=$query->result_array();
				return $row;		
			
		}
		else if(count($array)==9)
		{	
				
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				//$this->db->where('material_id',$array['4']);
				$this->db->where('GSM_name',$array['6']);
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
				}
				else
				{
					$this->db->where('product_material',$array['4']);
//					$this->db->where('product_material_size',$array['5']);
					$this->db->where('style_id',$array['5']);
				}	

				$query = $this->db->get('products');
				//echo $this->db->last_query();
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==10)
		{	
				
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('GSM_name',$array['7']);					
				$this->db->where('product_status','2');
				if ($array['0']!=2) {
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					$this->db->where('size',$array['6']);
				}
				else
				{
					$this->db->where('product_material',$array['4']);
					$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}			
				$query = $this->db->get('products');
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==11)
		{
				
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('material_id',$array['4']);
				$this->db->where('GSM_name',$array['7']);
				$this->db->where('style_id',$array['5']);
				$this->db->where('size',$array['6']);
				$this->db->where('handle',$array['8']);
				$this->db->where('product_status','2');				
				$query = $this->db->get('products');
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==12)
		{
			
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);								
				$this->db->where('product_status','2');	
                                if ($array['0']!=2) {
                                        $this->db->where('GSM_name',$array['7']);
                                        $this->db->where('handle',$array['8']);
				        $this->db->where('print',$array['9']);	
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					$this->db->where('size',$array['6']);
				}
				else
				{
					$this->db->where('GSM_name',$array['9']);
                                        $this->db->where('product_material',$array['4']);
					$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}		
				$query = $this->db->get('products');
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==13)
		{
			
				
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);	
				
				
                                if ($array['0']!=2) {
                                        $this->db->where('GSM_name',$array['7']);
                                        $this->db->where('handle',$array['8']);
				        $this->db->where('print',$array['9']);	
					$this->db->where('material_id',$array['4']);
					$this->db->where('style_id',$array['5']);
					$this->db->where('size',$array['6']);
                                        $this->db->where('print',$array['9']);
                                        $this->db->where('print_color',$array['10']);
				}
				else
				{
					$this->db->where('GSM_name',$array['9']);
                                        $this->db->where('handle',$array['10']);
                                        $this->db->where('product_material',$array['4']);
					$this->db->where('product_material_size',$array['5'].'/'.$array['6']);
				}
				$this->db->where('product_status','2');				
				$query = $this->db->get('products');
				$row=$query->result_array();
				return $row;	
			
		}
		else if(count($array)==14)
		{
			
				$this->db->limit($array['12'],$array['13']);
				$this->db->where('section_id',$array['0']);
				$this->db->where('cat_id',$array['1']);
				$this->db->where('sub_cat_id',$array['2']);
				$this->db->where('material_id',$array['4']);
				$this->db->where('GSM_name',$array['7']);
				$this->db->where('style_id',$array['5']);
				$this->db->where('size',$array['6']);
				$this->db->where('handle',$array['8']);
				$this->db->where('print',$array['9']);
				$this->db->where('print_color',$array['10']);
				$this->db->where('lamination',$array['11']);
				$this->db->where('product_status','2');				
				$query = $this->db->get('products',$array['12'],$array['13']);
				$row=$query->result_array();

				return $row;	
			
		}
		
	}	

	//////////////////End For functions regarding Filter//////////////////////////////

	function getdistinct_value($table,$column)
	{
		$sql = $this->db->query("SELECT DISTINCT $table.$column FROM $table");
		$result = $sql->result_array();
		return $result;
	}

	function getdistinct_id($table,$column1,$column2)
	{
		$sql = $this->db->query("SELECT DISTINCT $column2, $column1 FROM $table");
		$result = $sql->result_array();
		return $result;
	}

	function get_all_values($table,$column1,$column2){
		$sql = $this->db->query("SELECT $column2, $column1 FROM $table GROUP by $column2");
		$result = $sql->result_array();
		return $result;
	}

	function Update_buyer_ShippingAddr($user_id=null)
	{
		//print_r($user_id['user_id']);die();
			//$seller_id = $user_id;
			$BuyerShipping = array(
			  // 'billing_name' =>$this->input->post('billing_name'),
              'address_1' => $this->input->post('address_1'),
              'address_2'=> $this->input->post('address_2'),
              'zipcode' => $this->input->post('zipcode'),
              'city' => $this->input->post('city'),
              'state' => $this->input->post('state'),    
            );

//print_r($SellerShipping['address_1']);die();
           
    		$this->db->where('user_id',$user_id['user_id']);
    		$this->db->update('login',$BuyerShipping);
    		
	}//end buyer shipping detail 


	function get_prod_style_size($table,$prod_id=null)
	{
		$sql = $this->db->query("select * from $table where prod_id='".$prod_id."'");
		return $sql->result_array();

	}

/*	function header_cart_details()
	{  
            global $cart_id;
            $cart_id = $this->session->userdata('cart_id');
            if($cart_id) {
            $cart_product_details['where']="where cart_id='".$cart_id."'";
			$cart_product_details['table']='cart';
			$cart_product_details['order_by']='';
			$cart_prod_records = $this->common_model->getAllDetails($cart_product_details);
			}
				
//print_r($cart_id);die();
			// check cart_id is present or not in cart_product
         if(isset($cart_id) && $cart_id!='')
         {
			$cart_product_details['where']="where cart_id='".$cart_id."' and payment_done!=1";
			$cart_product_details['table']='cart_product';
			$cart_product_details['order_by']='';
			$cart_products = $this->common_model->getAllDetails($cart_product_details);
			//print_r($cart_products); exit();
			
			if(count($cart_products) > 0) {
				// Get product ids and quantity and product total
				$product_id_array = array();
				$quantity_array = array();
				$product_wise_total_array = array();
				$product_name_array = array();
				$product_short_desc_array = array();
				$product_image_array = array();

				foreach ($cart_products as $key => $value) {
					$product_id_array[] = $value['product_id'];
					$quantity_array[] = $value['quantity'];
					$product_wise_total_array[] = $value['product_wise_total'];
					$cart_product_id[] = $value['cart_product_id'];
					// get product
					
					$prod_val = $value['product_id'];
					//print_r($prod_val);die();
					$get_product['where']="where prod_id='".$prod_val."'";
					$get_product['table']='products';
					$get_product['order_by']='';
					$product = $this->common_model->getDetail($get_product);
					$product_name_array[] = $product['prod_name'];
					$product_short_desc_array[] = $product['prod_short_description'];
					$product_image_array[] = $product['prod_image1'];
				}
				$data['product_id'] = $product_id_array;
				$data['quantity'] = $quantity_array;
				$data['product_wise_total'] = $product_wise_total_array;
				$data['product_name'] = $product_name_array;
				$data['product_short_desc'] = $product_short_desc_array;
				$data['product_image'] = $product_image_array;
				$data['cart_product_id'] = $cart_product_id;
				$data['cart_counter'] = count($cart_products);
			       

				// Get cart total
				$cart_details['where']="where cart_id='".$cart_id."'";
				$cart_details['table']='cart';
				$cart_details['order_by']='';
				$cart = $this->common_model->getDetail($cart_details);
				//print_r($this->session->userdata('cart_id'));die();
				//$data['cart_total'] = $cart['cart_total'];
			} else {
				// cart empty
				$data['empty'] = true;
			}
		} else {
			// cart empty
//print_r("hgfhgf");die();
			$data['empty'] = true;
		}

		return $data;
	}
*/
/*	Updated Code But for now commented dur to wrong JOIN Query */
	function header_cart_details()
	{  
            global $cart_id;
            $cart_id = $this->session->userdata('cart_id');
            if($cart_id) 
            {
	            $cart_product_details['where']="where cart_id='".$cart_id."'";
				$cart_product_details['table']='cart';
				$cart_product_details['order_by']='';
				$cart_prod_records = $this->common_model->getAllDetails($cart_product_details);
			}


         if(isset($cart_id) && $cart_id!='')
         {
			$query = "SELECT p.* ,cp.*
							FROM cart_product as cp 
							LEFT JOIN products p 
							ON cp.product_id = p.prod_id 
							WHERE cp.cart_id='".$cart_id."' and cp.payment_done!=1";

				$cart_products = $this->db->query($query)->result_array();
//echo "<pre>";
	//		print_r($cart_products); 
	//	echo "</pre>";	exit;		
				
				if(isset($cart_products[0]))
				{
					foreach ($cart_products as $key => $product) 
					{ //echo "ddddd";
						if(($product['section_id'] == 1) || ($product['section_id'] == 0))
						{
							$query = "SELECT cp.*, op.*,p.section_id
							FROM cart_product as cp 
							LEFT JOIN order_product_data op 
							ON cp.cart_product_id = op.cart_product_id 
							LEFT JOIN products p 
							ON cp.product_id = p.prod_id 
							WHERE cp.cart_id='".$cart_id."' and cp.payment_done!=1 AND op.cart_product_id = '".$product['cart_product_id']."'";
						//echo  "<br><br><br>";

							$cart_products[$key] = $this->db->query($query)->row_array();
						}
					}
				}
				//	echo "<pre>"; print_r($cart_products);exit;
			if(count($cart_products) > 0) 
			{
				$product_id_array = array();
				$quantity_array = array();
				$product_wise_total_array = array();
				$product_name_array = array();
				$product_short_desc_array = array();
				$product_image_array = array();
                $cart_product_id= array();
				foreach ($cart_products as $key => $value) 
				{
					//echo "<pre>";
				 //print_r($value);exit;
					if(isset($value['product_id']))
					{
						$product_id_array[] = $value['product_id'];
						$quantity_array[] = $value['quantity'];
						$product_wise_total_array[] = $value['product_wise_total'];
						$cart_product_id[] = $value['cart_product_id'];
						$product_price_array[] = $value['product_price'];
						
						$prod_val = $value['product_id'];
						
						$get_product['where']="where prod_id='".$prod_val."'";
						$get_product['table']='products';
						$get_product['order_by']='';
						$product = $this->common_model->getDetail($get_product);
						$product_name_array[] = $product['prod_name'];
						$product_short_desc_array[] = $product['prod_short_description'];

						if(($product['section_id'] == 1) || ($product['section_id'] == 0))
						{
							$product_image_array[] = $value['preview_image'];
						}
						else
						{
							$product_image_array[] = base_url().'upload/products/'.$product['prod_image1'];
						}
					}
					
				}
				
				$data['product_id'] = $product_id_array;
				$data['quantity'] = $quantity_array;
				$data['product_wise_total'] = $product_wise_total_array;
				$data['product_price'] = $product_price_array;
				$data['product_name'] = $product_name_array;
				$data['product_short_desc'] = $product_short_desc_array;
				$data['product_image'] = $product_image_array;
				$data['cart_product_id'] = $cart_product_id;
				$data['cart_counter'] = count($cart_products);
			       
				$cart_details['where']="where cart_id='".$cart_id."'";
				$cart_details['table']='cart';
				$cart_details['order_by']='';
				$cart = $this->common_model->getDetail($cart_details);
			} 
			else 
			{
				$data['empty'] = true;
			}
		} 
		else 
		{
			$data['empty'] = true;
		}
		 //echo "<pre>"; print_r($data);exit;

		
		return $data;
	}

function header_cart_details1()
	{
                $ip = $this->input->ip_address();
  		$data['where']="where ip_address='".$ip."'";
		$data['table']='cart';
		$data['order_by']='';
		$prv_ip_address = $this->common_model->getAllDetails($data);
                
                if ($this->session->userdata('logged_in') != null) {
  				$user_id = $this->session->userdata['logged_in']['id'];

  				$data['where']="where user_id='".$user_id."'";
				$data['table']='cart';
				$data['order_by']='';
				$prv_cart_id = $this->common_model->getAllDetails($data);

				//print_r($this->session->userdata['logged_in']['cart_id']);die();

				$logged_in = $this->session->userdata('logged_in');
				$user_id = $logged_in['id'];			
				$session_id = $this->session->userdata('session_id');
  			}
  			else if (count($prv_ip_address)>0) {
  				$prev_session_id = $prv_ip_address['0']['session_id'];
  				$prev_session_cart_id = $prv_ip_address['0']['cart_id'];
  				$prev_session_user_id = $prv_ip_address['0']['user_id'];

  			}
		if ($this->session->userdata('cart_id')=='' || isset($prv_cart_id['0']['cart_id']) || isset($prev_session_cart_id)) {
			$cart_id = '';
			if ($this->session->userdata('cart_id')) {
				$cart_id = $this->session->userdata('cart_id');
			}
			else if(isset($prev_session_cart_id))
			{
				$cart_id = $prev_session_cart_id;
			}
			else if(isset($prv_cart_id['0']['cart_id']))
			{
				$cart_id = $prv_cart_id['0']['cart_id'];
			}
                       
			// check cart_id is present or not in cart_product
			$cart_product_details['where']="where cart_id='".$cart_id."'";
			$cart_product_details['table']='cart_product';
			$cart_product_details['order_by']='';
			$cart_products = $this->common_model->getAllDetails($cart_product_details);
			//print_r($cart_products);die();
			
			if(count($cart_products) > 0) {
				// Get product ids and quantity and product total
				$product_id_array = array();
				$quantity_array = array();
				$product_wise_total_array = array();
				$product_name_array = array();
				$product_short_desc_array = array();
				$product_image_array = array();

				foreach ($cart_products as $key => $value) {
					$product_id_array[] = $value['product_id'];
					$quantity_array[] = $value['quantity'];
					$product_wise_total_array[] = $value['product_wise_total'];
					$cart_product_id[] = $value['cart_product_id'];
					// get product
					
					$prod_val = $value['product_id'];
					//print_r($prod_val);die();
					$get_product['where']="where prod_id='".$prod_val."'";
					$get_product['table']='products';
					$get_product['order_by']='';
					$product = $this->common_model->getDetail($get_product);
					$product_name_array[] = $product['prod_name'];
					$product_short_desc_array[] = $product['prod_short_description'];
					$product_image_array[] = $product['prod_image1'];
				}
				$data['product_id'] = $product_id_array;
				$data['quantity'] = $quantity_array;
				$data['product_wise_total'] = $product_wise_total_array;
				$data['product_name'] = $product_name_array;
				$data['product_short_desc'] = $product_short_desc_array;
				$data['product_image'] = $product_image_array;
				$data['cart_product_id'] = $cart_product_id;
				$data['cart_counter'] = count($cart_products);
				//print_r($data['product_image']);die();

				// Get cart total
				$cart_details['where']="where cart_id=".$cart_id;
				$cart_details['table']='cart';
				$cart_details['order_by']='';
				$cart = $this->common_model->getDetail($cart_details);
				//print_r($this->session->userdata('cart_id'));die();
				//$data['cart_total'] = $cart['cart_total'];
			} else {
				// cart empty
				$data['empty'] = true;
			}
		} else {
			// cart empty
			$data['empty'] = true;
		}

		return $data;
	}

	function getDetail($data=null)
	{
		if(count($data)>0){
			
			$where=$data['where'];
			$table=$data['table'];
			$order_by=$data['order_by'];
			$sql=$this->db->query('select * from '.$table.' '.$where.' '.$order_by.'');
			//echo $this->db->last_query();
			return $sql->row_array();
		}
	}

	function update_status($section_id,$cat_id,$sub_cat_id,$prod_id,$status)
	{
		
		
		if($status==1)
		{
			$new_status = 0;

		}
		else
		{
			$new_status = 1;
		}

		
		$data = array(
			
			'status' => $new_status,
			);

		$data1 = array(
			'section_id' => $section_id,
			'cat_id' => $cat_id,
			'sub_cat_id' => $sub_cat_id,
			'prod_id' => $prod_id,
			);
		$sql = $this->db->query("UPDATE products SET status=$new_status WHERE section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and prod_id=$prod_id");

		//$this->db->update('products',$data);
		//$this->db->set('status',$new_status);
		//$this->db->where('section_id',$section_id);
		//$this->db->where('cat_id',$cat_id);
		//$this->db->where('sub_cat_id',$sub_cat_id);
		//$this->db->where('prod_id',$prod_id);

		
		

	}

	function max_id_value($table,$column)
	{
		$query = $this->db->query("select max($column) from $table");
		$row=$query->result_array();
		return count($row);
	}


	function refer_earn_order_date($table,$cart_id)
	{
		$query = $this->db->query("select min(ordered_date) from $table where cart_id='".$cart_id."'");
		$row=$query->result_array();
		
		return $row;
	}

	
	function refer_earn_order_time($table,$cart_id,$order_date)
	{
		$query = $this->db->query("select min(ordered_time) from $table where cart_id='".$cart_id."' and ordered_date = '".$order_date."'");
		$row=$query->result_array();
		
		$query1 = $this->db->query("select * from $table where cart_id='".$cart_id."' and ordered_date = '".$order_date."' and ordered_time = '".$row['0']['min(ordered_time)']."'");
		$row1=$query1->result_array();
		
		//print_r($row1);die();

		return $row1;
	}

	function invitor_matching_list()
	{
		$query = $this->db->query("select `Invited_To` from `login` WHERE Invited_To != ''");
		$row=$query->result_array();
		
		return $row;
	}

	function get_all_filter_product($per_page,$offset) 
	{
		$query = $this->db->get('products', $per_page, $offset);
		$row=$query->result_array();
		return $row;
	}

	function status_prod_list($status) 
	{
		$sql = $this->db->query("select * from products where product_status=$status");
	    $rst = $sql->result_array();

		return $rst;
	}

	function customize_prod_list($status) 
	{
		$sql = $this->db->query("select * from products where section_id=0 and product_status=$status");
	    $rst = $sql->result_array();

		return $rst;
	}

	function readyToprint_prod_list($status) 
	{
		$sql = $this->db->query("select * from products where section_id=1 and product_status=$status");
	    $rst = $sql->result_array();

		return $rst;
	}

	function readyTodeliver_prod_list($status) 
	{
		$sql = $this->db->query("select * from products where section_id=2 and product_status=$status");
	    $rst = $sql->result_array();

		return $rst;
	}

	function count_subcat($arr=null)
	{	//echo"<pre>";print_r($arr);echo"</pre>";
		$this->db->limit($arr['4'],$arr['5']);
		$this->db->where('section_id',$arr['0']);
		$this->db->where('cat_id',$arr['1']);
		$this->db->where('sub_cat_id',$arr['2']);
		$this->db->where('product_status','2');
		$query = $this->db->get('products', $arr['4'],$arr['5']);
		//echo $this->db->last_query();
		$row=$query->result_array();
		return $row;
	}

	function count_subcategory($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		 
	    $sql = $this->db->query("select * from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_material($section_id,$cat_id,$sub_cat_id,$material_id)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_GSM($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_size($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_style($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size,$style)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size and style=$style AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_handle($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size,$style,$handle)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size and style=$style and handle=$handle AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_print($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size,$style,$handle,$print)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size and style=$style and handle=$handle and print=$print AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_lamination($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size,$style,$handle,$print,$lamination)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size and style=$style and handle=$handle and print=$print and lamination=$lamination AND product_status!=4");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function count_special_wrk($section_id,$cat_id,$sub_cat_id,$material_id,$GSM_name,$size,$style,$handle,$print,$lamination,$spl_wrl)
	{
		 
	    $sql = $this->db->query("select prod_id from products where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id and material_id=$material_id and GSM_name=$GSM_name and size=$size and style=$style and handle=$handle and print=$print and lamination=$lamination and spl_wrl=$spl_wrl");
	    $rst = $sql->result_array();

		return count($rst);
	}

	function search_result($for=null)
	{

		$this->db->select("*");
        $this->db->distinct();
		$this->db->from('products');
		$this->db->like('prod_name',$for);
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
/*		$this->db->select("*");
		$this->db->from('material');
		$this->db->like('material',$for);
		$query1 = $this->db->get(); 

$search = $for;
$Linkearray = array('products.prod_name' => $search);
$Linkearray2 = array('sections.section_name' => $search);
$Linkearray3 = array('category.cat_id' => $search);
$this->db->or_like($Linkearray);
$this->db->or_like($Linkearray2);
$this->db->or_like($Linkearray3);
$this->db->from('products,category,sections');
$query = $this->db->get();		
		echo $this->db->last_query()."<br>";
*/
		return $query->result_array();

	}

	function quantity_price($prod_id=null)
	{	

		$sql1 = $this->db->query("select * from quantity_vs_price where prod_id='".$prod_id."' and sell_price!=0");
		return  $sql1->result_array();

	}
	
	function get_mrp_discount_sellprice($product_id,$quantity,$seller_id){
		//$sql1 = $this->db->query("select * from quantity_vs_price where id='".$qpid."' AND seller_id='".$seller_id."' AND prod_id='".$prod_id."' and sell_price!=0");
		$q="SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' 
AND quantity=(select min(quantity) from (
select quantity
from quantity_vs_price
where quantity >= $quantity and prod_id='$product_id' AND seller_id='$seller_id'
union
select max(quantity)
from quantity_vs_price where prod_id='$product_id' AND seller_id='$seller_id'
)a)";
		$sql1 =$this->db->query("SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' 
AND quantity=(select min(quantity) from (
select quantity
from quantity_vs_price
where quantity >= $quantity and prod_id='$product_id' AND seller_id='$seller_id'
union
select max(quantity)
from quantity_vs_price where prod_id='$product_id' AND seller_id='$seller_id'
)a)"); 
		return  $sql1->result_array();
	}

	function search_subcat($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		$sql = $this->db->query("select * from subcategory where section_id=$section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id");
		return $sql->result_array();
	}

	function getcategorylist($section_id=null)
	{	

		$sql1 = $this->db->query("select * from category where section_id=$section_id");
		return  $sql1->result_array();

	}
        
    function count_cat_data($arr=null)
	{ 
		if (count($arr) == 6) 
		{ 
			$this->db->limit($arr['4'],$arr['5']);
	   		$this->db->where('section_id',$arr['0']);
			$this->db->where('cat_id',$arr['1']);
			$this->db->where('sub_cat_id',$arr['2']);
			$this->db->where('product_status','2');
			$query = $this->db->get('products',$arr['4'],$arr['5']);
			$row=$query->result_array();
			return $row;
		}
		else{
			$this->db->limit($arr['3'],$arr['4']);
	   		$this->db->where('section_id',$arr['0']);
	        $this->db->where('cat_id',$arr['1']);
	        $this->db->where('product_status','2');
			$query = $this->db->get('products', $arr['3'],$arr['4']);
			$row=$query->result_array();
			return $row;
		}
	}

        function getcat_relatedprod_list($array=null)
	{	
			$sql = $this->db->query("select * from products where section_id='".$array['0']."' and cat_id = '".$array['1']."' and product_status=2");
			return $sql->result_array();
			
	}

        function getcategory_list($section_id=null,$cat_id=null)
	{	

		$sql1 = $this->db->query("select * from category where section_id=$section_id and cat_id=$cat_id");
		return  $sql1->result_array();

	}
	
	function getsubcatlist($section_id=null,$cat_id=null)
	{
		$sql = $this->db->query("select * from subcategory where section_id=$section_id and cat_id=$cat_id");
		return $sql->result_array();
	}

	function getfilterstyle_product($arr)
	{
		$sql = $this->db->query("select * from products where section_id='".$arr['0']."' and cat_id='".$arr['1']."' and sub_cat_id='".$arr['2']."' and style_id='".$arr['4']."' and material_id='".$arr['5']."' and CSM_name='".$arr['6']."'");
		return $sql->result_array();
	}

	function checkuser($data=null)
	{
		try {
			$sql = $this->db->query("select * from login where (username='".$data['username']."' or email='".$data['username']."') and password='".$data['password']."'");

			$rowcount = $sql->num_rows();	
			
			if($rowcount>0)
			{
				return $sql->result_array();
			}
			else
			{
				return false;
			}
		} catch (Exception $e) {
			// print error
			redirect('/index','refrest');
		}
	}

	function checkseller($data=null)
	{
		
		
		
		
		try {
			$sql = $this->db->query("select * from login where (mobile_number='".$data['username']."' or email='".$data['username']."')  and role_id=5 and password='".$data['password']."'"); //and email_verified = 1

			$rowcount = $sql->num_rows();	
			
			
			if($rowcount>0)
			{
				return $sql->result_array();
			}
			else
			{
				return false;
			}
		} catch (Exception $e) {
			// print error
			redirect('/index','refrest');
		}
	}

	function update_login_table($data=null,$user_id=null)
	{
		try {
			$this->db->where('user_id', $user_id);
			$this->db->update('login', $data); 
		} catch (Exception $e) {
			// erro page
			$error = "Error in update login table";
			return $error;
		}
	}

   




	function checkbuyer($data=null)
	{
		$this->db->trans_begin();
		//try {
			$sql = $this->db->query("select * from login where (mobile_number='".$data['username']."' or email='".$data['username']."') and role_id =2 and password='".$data['password']."'");

			$rowcount = $sql->num_rows();
			if($rowcount>0){
			$update_log = $this->db->query("Update login SET `log_status`='1' where (mobile_number='".$data['username']."' or email='".$data['username']."') and role_id =2 and password='".$data['password']."'");

				return $sql->result_array();
			}
			else
			{
				return false;
			}
			
		if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		//$p=1; 
              }else{
        $this->db->trans_commit();
	//	$p=2; 
            }	
			
		//} catch (Exception $e) {
			// print error
		//	redirect('/index','refrest');
		//}
	}

	
	function getMobileNo($verificationText)
	{
		try {
			$sql = $this->db->query("select mobile_number from login where email_verification_code = '".$verificationText."'");

			$rowcount = $sql->num_rows();	
			
			if($rowcount>0)
			{
				return $sql->result_array();
			}
			else
			{
				return false;
			}
		} catch (Exception $e) {
			// print error
			redirect('/index','refrest');
		}
	}

	function getAllProducts($data){
			
		$start=0;
		$limit=8;

		if(isset($_GET['pagid']))
		{

			$pagid=$_GET['pagid'];
			$start=($pagid-1)*$limit;
		 $start;
		}
		else
		{
			$pagid=1;
		}
		if(count($data)>0){

			$where=$data['where'];
			$table=$data['table'];
			$sql=$this->db->query('select * from '.$table.' '.$where.' limit '.$start.', '.$limit.'');
			return array($sql->result_array(), $pagid);
		}
	}

	function last_insert_data($table=null,$id=null)
	{
		$sql = $this->db->query("select * from $table where id='".$id."'");
		return $sql->result_array();
	}

	function getPagination($data=null)
	{
		
		if(count($data)>0){
		
			$where=$data['where'];
			$table=$data['table'];
			$order_by=$data['order_by'];
			
		$sql=$this->db->query('SELECT COUNT(*) as cnt FROM '.$table.' '.$where.'');
		$limit=8;

		foreach($sql->result_array() as $rw)
		{
			$rows=$rw['cnt'];
		}
		$total=ceil($rows/$limit);
		
		return array($total, $rows);
		}
	}

	//newly added
	function getdatacat($cat_id=null,$section_id=null)
	{
			
			$sql = $this->db->query("select * from category where cat_id=$cat_id and section_id=$section_id");
			return $sql->result_array();
	}

        function getsection($section_id=null)
	{
		$sql = $this->db->query("select * from sections where section_id = $section_id");
		return $sql->result_array();
	}

	
	function register($data=null)
	{
		try {
			$this->db->insert('login',$data);
			
           $sql = $this->db->query("select user_id from login where id = '".$this->db->insert_id()."'");
		    return $sql->result_array();
		} catch (Exception $e) {
			// erro page
			$error = "Registration Error";
			return $error;
		}

	}

	
	function getdataprod($cat_id=null, $section_id=null )
	{
			$sql = $this->db->query("select * from products where cat_id=$cat_id and section_id ='$section_id' AND product_status!=4");
			return $sql->result_array();
			
	}
	
	function getsubprodimg($section_id=null,$cat_id=null,$prod_id=null)
	{
			
			$sql = $this->db->query("select * from products where cat_id=$cat_id and section_id=$section_id and prod_id='".$prod_id."' AND product_status!=4");
			return $sql->result_array();
			
	}

	function getheader_subcatimg($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		
			$data = array(
				'section_id'=>$section_id,
				'cat_id' => $cat_id,
				'sub_cat_id' => $sub_cat_id,
				);
			
			$this->db->select("*");
		  $this->db->from('header_slider');
		  $this->db->where($data);		  
		  $query = $this->db->get();
		  return $query->result_array();
			
	}

	

	

	function getcategory($section_id=null)
	{
			$sql = $this->db->query("select * from category where section_id = $section_id ORDER BY cat_name ASC");
			return $sql->result_array();
			
	}
	
	function getsubcategory($section_id=null,$cat_id=null)
	{
		$sql = $this->db->query("select * from subcategory where section_id = $section_id and cat_id=$cat_id ORDER BY sub_cat_name ASC");
		return $sql->result_array();
	}

	// function getsection_details($section_id=null)
	// {
	// 	$sql = $this->db->query("select * from sections where section_id = $section_id");
	// 	return $sql->result_array();
	// }

	function getcategory_details($section_id=null,$cat_id=null)
	{
		$sql = $this->db->query("select cat_name from category where section_id = $section_id and cat_id=$cat_id");
		//echo $this->db->last_query();
		return $sql->result_array();
	}

	function getsubcategory_details($section_id=null,$cat_id=null,$sub_cat_id=null)
	{
		$sql = $this->db->query("select * from subcategory where section_id = $section_id and cat_id=$cat_id and sub_cat_id=$sub_cat_id");
		return $sql->result_array();
	}	
	
	function get_head()
	{
		$catIdArr="";
		$catNameArr="";
		
		$subCatIdArr="";
		$subCatNameArr="";	
		
		$arr['table']='sections';
		$arr['where']="";
		$arr['and']="";
		$arr['order_by']=""; 

		$data['section_data']=$this->site_sentry->get_all($arr); 
		
		foreach($data['section_data'] as $row)
		{
			$sql = $this->db->query("select * from category where section_id=".$row['section_id']);
			$result = $sql->result_array();
			
			foreach($result as $row1)
			{
				$catIdArr[$row['section_id']][]=$row1['cat_id'];
				$catNameArr[$row['section_id']][]=$row1['cat_name'];
				
				$sql1=$this->db->query("select * from subcategory where cat_id=".$row1['cat_id']." and section_id=".$row['section_id']);
				$res1=$sql1->result_array();
				//extract($res1);
				foreach($res1 as $subrow)
				{
				
					$subCatIdArr[$row['section_id']][$row1['cat_id']][] = $subrow['sub_cat_id'];
					$subCatNameArr[$row['section_id']][$row1['cat_id']][] = $subrow['sub_cat_name'];
				}
			}
		}
		
		$data['catIdArr']=$catIdArr;
		$data['catNameArr']=$catNameArr;
		$data['subCatIdArr']=$subCatIdArr;
		$data['subCatNameArr']=$subCatNameArr;

		

		
		return $data;
	}

	function add_to_cart($data=null)
	{
		
		//unset($data['cart_id']);

		try {
			$this->db->insert('cart',$data);
			return $this->db->insert_id(); 
		} catch (Exception $e) {
			// erro page
			$error = "Error in Cart insert";
			return $error;
		}
	}

	function add_to_cart_product($data=null)
	{	

		
		try {
			$this->db->insert('cart_product',$data);
		    return $this->db->insert_id();
		} catch (Exception $e) {
			// erro page
			$error = "Error in Cart product insert";
			return $error;
		}
	}

	function update_cart($data=null, $cart_id)
	{
		try {
			$this->db->where('cart_id', $cart_id);
			$this->db->update('cart', $data); 
		} catch (Exception $e) {
			// erro page
			$error = "Error in update cart";
			return $error;
		}
	}

	function update_cart_product($data=null, $cart_product_id)
	{
		try {
			$this->db->where('cart_product_id', $cart_product_id);
			$this->db->update('cart_product', $data); 
		} catch (Exception $e) {
			// erro page
			$error = "Error in update cart product";
			return $error;
		}
	}

	function remove_cart_product($cart_id=null,$cart_prod_id = null,$product_id=null)
	{
		try
		{
			$this->db->where('cart_id', $cart_id);
			$this->db->where('product_id', $product_id);
			$this->db->where('cart_product_id', $cart_prod_id);
			$this->db->delete('cart_product'); 
		} catch(Exception $e) {
			$error = "Error in update cart product";
			return $error;

		}
		
	}

	function get_min_order_date($cart_id=null)
	{
		
		$sql = $this->db->query("select min(ordered_date) from `cart_product` where payment_done=1 and issue_raised=0 and cart_id='".$cart_id."'");
		return $sql->result_array();

	}

        function get_state_code($city_zipcode)
        {
          $sql = $this->db->query("select state from `postal_code_table` where postal_code ='".$city_zipcode."'");
		return $sql->result_array();
        }

	function get_seller_email_orgname($verificationText)
	{
		try {
			$sql = $this->db->query("select email, org_name from login where email_verification_code = '".$verificationText."'");

			$rowcount = $sql->num_rows();	
			
			if($rowcount>0)
			{
				return $sql->result_array();
			}
			else
			{
				return false;
			}
		} catch (Exception $e) {
			// print error
			redirect('/index','refrest');
		}
	}
	
	public function get_productdetails($product_id){
		$query="SELECT * FROM products WHERE prod_id='$product_id' AND product_status!=4";
		$sql = $this->db->query($query);
		return $sql->result_array();

	}
	
	public function get_cart_total($cart_id_value){
		$query="SELECT *, sum(product_wise_total) as Total_Amount,count(cart_product_id) as Total_count FROM cart_product WHERE cart_id='$cart_id_value' AND payment_done='0'";
		$sql = $this->db->query($query);
		return $sql->result_array();

	}
	
	
	
	public function Get_orederdata($cart_id,$txnid){
	 $query="SELECT cp.*, op.*,p.section_id,p.prod_name,p.other_details,p.other_details,p.prod_image1
					FROM cart_product as cp 
					LEFT JOIN order_product_data op 
					ON cp.cart_product_id = op.cart_product_id 
					LEFT JOIN products p 
					ON cp.product_id = p.prod_id 
					WHERE cp.cart_id='$cart_id'  AND cp.txnid='$txnid'";
					$sql = $this->db->query($query);
		return $sql->result_array();
	}
	
	public function Get_Userdetails($logged_id){
	 $query="SELECT user_id,first_name,last_name,name,username,email,cart_id,mobile_number,org_name,account_creation_date,address_1,address_2,
	 state,city,zipcode FROM login WHERE user_id='$logged_id'";
	$sql = $this->db->query($query);
		return $sql->result_array();
	}
	
	public function Get_Cartdetails($logged_id){
	 $query="SELECT p.*,opd.*,cp.* FROM cart_product as cp
	 LEFT join order_product_data as opd ON cp.cart_product_id=opd.cart_product_id 
	 LEFT join products as p ON cp.pid=p.id
	 WHERE cp.cuser_id='$logged_id' AND cp.payment_done='1'"; // AND order_status!='Cancle'
					$sql = $this->db->query($query);
		return $sql->result_array();
	}
	
	public function Cancle_order($logged_id){
	 $query="SELECT p.*,opd.*,cp.* FROM cart_product as cp
	 LEFT join order_product_data as opd ON cp.cart_product_id=opd.cart_product_id 
	 LEFT join products as p ON cp.pid=p.id
	 WHERE cp.cuser_id='$logged_id' AND cp.payment_done='1' AND order_status='Cancle'";
					$sql = $this->db->query($query);
		return $sql->result_array();
	}
	
	
	public function Order_Cancle($logged_id,$cart_product_id,$track_id,$cart_id){
		$p='';
		$query="UPDATE cart_product SET order_status='Cancle' WHERE cart_product_id='$cart_product_id' AND cart_id='$cart_id'";
		$sql = $this->db->query($query);
		if($sql){
			return 1;
		}else{
			return 2;
		}
	}
	
	
	function Registercart_update($user_id,$cart_id_value){
	   $this->db->trans_begin();
	   
	   $query1="UPDATE cart SET user_id='$user_id' WHERE cart_id='$cart_id_value'";
	   $sql1 = $this->db->query($query1);
		
	   $query2="UPDATE cart_product SET cuser_id='$user_id' WHERE cart_id='$cart_id_value'";
	   $sql2 = $this->db->query($query2);	
	   
	   if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		return 1; 
              }else{
        $this->db->trans_commit();
		return 2; 
            }	
   }
   
   
   function addcart_productdetails($pid,$product_id,$ship_zhipcode,$quantity,$seller_id,$quantity_vspriceid){
	    $this->db->trans_begin();
	   // $query="SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' AND quantity='$quantity' AND id='$quantity_vspriceid'"; // AND order_status!='Cancle'
	$query="SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' 
AND quantity=(select min(quantity) from (
select quantity
from quantity_vs_price
where quantity >= $quantity and prod_id='$product_id' AND seller_id='$seller_id'
union
select max(quantity)
from quantity_vs_price where prod_id='$product_id' AND seller_id='$seller_id'
)a) ";
	$sql = $this->db->query($query);
     if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		return 1; 
              }else{
        $this->db->trans_commit();
		return $sql->result_array();
            }	
 }
 
 
 
 function get_product_details($prod_id){
	 
	 
	  $this->db->trans_begin();
	   // $query="SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' AND quantity='$quantity' AND id='$quantity_vspriceid'"; // AND order_status!='Cancle'
	$query="SELECT * FROM products WHERE prod_id='$prod_id'";
	$sql = $this->db->query($query);
     if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		return 1; 
              }else{
        $this->db->trans_commit();
		return $sql->result_array();
            }	
 }
 
 
 function get_seller_datails($seller_id){
	 
	 $this->db->trans_begin();
	   // $query="SELECT * FROM quantity_vs_price WHERE prod_id='$product_id' AND seller_id='$seller_id' AND quantity='$quantity' AND id='$quantity_vspriceid'"; // AND order_status!='Cancle'
	$query="SELECT l.*,s.* FROM login as l LEFT JOIN seller as s ON s.seller_id=l.user_id  WHERE l.user_id='$seller_id'";
	$sql = $this->db->query($query);
     if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		return 1; 
              }else{
        $this->db->trans_commit();
		return $sql->result_array();
            }	
	 
 }
	
}
?>
