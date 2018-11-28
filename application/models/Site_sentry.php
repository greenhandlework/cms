<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site_sentry extends CI_Model {
		
	

	function Save_records($data){
		//print_r($data);die();
		//if($this->input->post('img_url'))
		//{
		$img_url=$this->input->post('img_url');		
		
		if(isset($_FILES['fileinput']['name']) && $_FILES['fileinput']['name']!=" " && $_FILES['fileinput']['name']!=null && $_FILES['fileinput']['name']!=""){
			
			if($img_url!=" " && $img_url!="" && $img_url!=null){
				
				if(file_exists($img_url)){
					unlink($img_url);
				}
			}
		
			$arr=$_FILES['fileinput']['name'];
			$path_parts = pathinfo($arr);
			$ext=$path_parts['extension'];			 

			$_FILES['fileinput']['name']=md5(rand()).'.'.$ext;
			$config['upload_path'] ='upload/products';
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';

			//$index = $this->session->userdata('indexgbr');

			$this->load->library('upload', $config);
							
		if ( ! $this->upload->do_upload("fileinput")){

				echo("{errors: {id:'name', msg:'" . $this->upload->display_errors(). "'}}");
			
				////return;
			}    
			else{

				$link=$config['upload_path'].'/'.$_FILES['fileinput']['name'];
				
			}
		}
		else {
					
				$link=$img_url;
		}

		 //$link;
		
		
		
		$CI =& get_instance();
		
		$primary="";
		$table=$data['table'];

		if($table!=""){
			
		$primary_key = $this->db->field_data($table);

		
		// print_r($primary_key);
		// die();
		
		foreach ($primary_key as $field){
		   
		   if($field->primary_key==1){

				$primary=$field->name;
		   }
		}		 

		$id=$this->input->post($primary);
		

		$arr = $this->db->list_fields($table);
		

		foreach ($arr as $field)
		{
			if(isset($data[$field]) && $data[$field]!="" ){
				 
				$data1[$field]=$data[$field];						
			
			}else{
				
				if($field=="image_url")
				{
					//echo $field;
				$data1[$field]=$link;
				}
				else
				{
					
				$data1[$field]=$this->input->post($field);
				}
			}
		}
		//die;

		if (isset($data['sub_subcat_id'])) {
			$id = $data['sub_subcat_id'];
			$primary = 'sub_subcat_id';
		}


		if($id==" " || $id==null){

			$this->db->insert($table,$data1);			
			$num = $this->db->insert_id();
					
		  		
		}else if($id!=" "){
			//print'<pre>';print_r($data1);exit;
			$sql = $this->db->query("select * from $table where $primary=$id");			
	  		$result = $sql->result_array();  		

	  		if(count($result)>0)
	  		{
	  			$this->db->where($primary,$id);
				$this->db->update($table,$data1);
				$num = $this->db->insert_id();	
	  			
	  		}
	  		else
	  		{
	  			$this->db->insert($table,$data1);			
				$num = $this->db->insert_id();
	  		}

			
		}
		return $num;
	
	}else{
		return 0;
	}
	
}

function insertsubcat($data=null)
	{
		$this->db->insert('subcategories',$data);
		
	}
	
function save_slide($data){
		
		//if($this->input->post('img_url'))
		//{
		$img_url=$this->input->post('img_url');		
		
		if($_FILES['fileinput']['name']!=" " && $_FILES['fileinput']['name']!=null && $_FILES['fileinput']['name']!=""){
			
			if($img_url!=" " && $img_url!="" && $img_url!=null){
				
				if(file_exists($img_url)){
					unlink($img_url);
				}
			}
		
			$arr=$_FILES['fileinput']['name'];
			$path_parts = pathinfo($arr);
			$ext=$path_parts['extension'];			 

			$_FILES['fileinput']['name']=md5(rand()).'.'.$ext;
			$config['upload_path'] ='upload/products';
			$config['allowed_types'] = '*';
			$config['max_size'] = '0';
			$config['max_width'] = '0';
			$config['max_height'] = '0';

			//$index = $this->session->userdata('indexgbr');

			$this->load->library('upload', $config);
							
		if ( ! $this->upload->do_upload("fileinput")){

				echo("{errors: {id:'name', msg:'" . $this->upload->display_errors(). "'}}");
			
				////return;
			}    
			else{

				$link=$config['upload_path'].'/'.$_FILES['fileinput']['name'];
				
			}
		}
		else {
					
				$link=$img_url;
		}

		 //$link;
		
		
		
		$CI =& get_instance();
		
		$primary="";$table=$data['table'];

		if($table!=""){
			
		$primary_key = $this->db->field_data($table);


		
		foreach ($primary_key as $field){
		   
		   if($field->primary_key==1){

				$primary=$field->name;

		   }
		}		 

		$id=$this->input->post($primary);
		
		
			$data1['slide_on_home'] = $this->input->post('slide_on_home');

		
		$arr = $this->db->list_fields($table);

		foreach ($arr as $field)
		{
			if(isset($data[$field]) && $data[$field]!="" ){
				 
				$data1[$field]=$data[$field];						
			
			}else{
				
				if($field=="image_url")
				{
					//echo $field;
				$data1[$field]=$link;
				}
				else
				{
					
				$data1[$field]=$this->input->post($field);
				}
			}
		}
		//die;
		if($id==" " || $id==null){
			
			$this->db->insert($table,$data1);


		}else if($id!=" "){
			//print'<pre>';print_r($data1);exit;				
			$this->db->where($primary,$id);
			$this->db->update($table,$data1);	
		}
		return 1;
	
	}else{
		return 0;
	}
	
}



	function PopulateValues($data){

		$CI =& get_instance();
		
		$primary="";
		$primary_id="";
		
			if(isset($data['primary_id'])){
				$primary_id=$data['primary_id'];
			}
		
		$table=$data['table'];

		if($table!=""){
			
			$primary_key = $this->db->field_data($table);
			
			foreach ($primary_key as $field){
			   
			   if($field->primary_key==1){

					$primary=$field->name;
			   }
			} 
			
			if($primary_id==""){
				
				$query = $this->db->query("SELECT * FROM $table");

				foreach ($query->list_fields() as $field){
				   $fdata[$field]="";
				}
				
				return $fdata;

			}else if($primary_id!=""){

				$sql=$this->db->query("select * from $table where $primary='$primary_id' ");
				
				$arr=$sql->row_array();
				return $arr;
			}
		}
	}

function max_id_value($table,$column)
	{
		$query = $this->db->query("select MAX($column) from $table");
		$row=$query->result_array();
		return $row;
	}

function get_selected($data=null){

	//print_r($data);exit();
	
	if(count($data)>0){
		
		$where=$data['where'];
		$table=$data['table'];
		$sql=$this->db->query('select * from $table where $where');
		return $sql->result_array();
	}
}

function get_row($data){

	$table=$data['table'];
	$column=$data['col_name'];
	$val=$data[$column];
 
	$CI =& get_instance(); 

		if(count($data)>0){ 
				
			$sql=$this->db->query("select * from $table where $column='$val'");
			return $sql->row_array();
		}
}

function get_all($data){

	//print'<pre>';print_r($data);exit;
	
	$CI =& get_instance(); 
	
	if(count($data)>0){
		
		$table=$data['table'];
		$where=$data['where'];
			
			if($where!="" && $where!=null){
				
				$and=$data['and'];
			}else{
				
				$and="";
			} 

		$order_by=$data['order_by']; 

		if($table!=null){

			$sql=$this->db->query("select * from $table $where $and $order_by ");
			//echo $this->db->last_query();
			return $sql->result_array();
		}
	}else{
		print"na";exit;
	}
	
}

function get_all_count($data){

	//print'<pre>';print_r($data);exit;
	
	$CI =& get_instance(); 
	
	if(count($data)>0){
		
		$table=$data['table'];
		$where=$data['where'];
			
			if($where!="" && $where!=null){
				
				$and=$data['and'];
			}else{
				
				$and="";
			} 

		$order_by=$data['order_by']; 

		if($table!=null){

			$sql=$this->db->query("select  count(*) as count from $table $where $and $order_by ");
			//echo $this->db->last_query();
			return $sql->row();
		}
	}else{
		print"na";exit;
	}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_section_wise(){
			$query_section="SELECT s.section_name,count(p.section_id) as Total,p.* FROM products as p LEFT JOIN sections as s ON s.section_id=p.section_id WHERE p.product_status='2' GROUP BY p.section_id";
$sql=$this->db->query($query_section);
return $sql->result_array();
}


function get_category_wise(){

$query_category="SELECT c.cat_name,count(p.cat_id) as Total,p.* FROM products as p LEFT JOIN category as c ON c.cat_id=p.cat_id WHERE p.product_status='2' GROUP BY p.cat_id ORDER BY Total DESC limit 0,5";
$sql=$this->db->query($query_category);
return $sql->result_array();

}
function get_subcategory_wise(){
$query_subcategory="SELECT sc.sub_cat_name,count(p.sub_cat_id ) as Total,p.* FROM products as p LEFT JOIN subcategory as sc ON sc.sub_cat_id=p.sub_cat_id WHERE p.product_status='2' GROUP BY p.sub_cat_id ORDER BY Total DESC limit 0,5";
$sql=$this->db->query($query_subcategory);
return $sql->result_array();
}


function get_city_wise(){
$query_city="Select s.city,s.business_name,count(s.city) as Total FROM login as a left join seller as s ON s.seller_id=a.user_id WHERE a.role_id = '5' AND s.business_name!='' and a.account_status='Yes' AND EXISTS(Select * FROM products as b WHERE a.user_id =b.seller_id)
group by s.city ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}
function get_state_wise(){
$query_city="Select s.state,s.business_name,count(s.state) as Total FROM login as a left join seller as s ON s.seller_id=a.user_id WHERE a.role_id = '5' AND s.business_name!='' and a.account_status='Yes' AND EXISTS(Select * FROM products as b WHERE a.user_id =b.seller_id)
group by s.state ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}

function get_category_seller_wise(){
$query_city="Select c.cat_name,s.business_name,count(p.seller_id ) as Total FROM products as p
left join seller as s ON s.seller_id=p.seller_id 
left join category as c ON p.cat_id=c.cat_id

WHERE p.product_status= '2' 
group by p.seller_id  ORDER BY Total DESC LIMIT 0,5";
$sql=$this->db->query($query_city);
return $sql->result_array();
}

function get_subcategory_seller_wise(){
$query_city="Select sc.sub_cat_name,s.business_name,count(p.seller_id) as Total FROM products as p
left join seller as s ON s.seller_id=p.seller_id 
left join subcategory as sc ON sc.sub_cat_id=p.sub_cat_id

WHERE p.product_status= '2' 
group by p.seller_id ORDER BY Total DESC limit 0,5";
$sql=$this->db->query($query_city);
return $sql->result_array();
}
function get_product_quinity(){
	$query_city="select max(qvp.quantity) ,p.qns as pquqnity, p.prod_id,p.prod_name,s.business_name,s.email_id,l.mobile_number,p.cat_id,p.section_id,p.sub_cat_id,p.prod_image1,p.style_id,p.seller_id,p.filter_id,p.material_id from products as p 
LEFT JOIN quantity_vs_price as qvp ON p.prod_id=qvp.prod_id  
LEFT JOIN seller as s ON p.seller_id=s.seller_id
LEFT JOIN login as l ON p.seller_id=l.user_id
where  p.product_status!='4' 
##AND  p.prod_id ='GHPRODID_89398768'
AND qvp.quantity!=0 

##AND p.qns>=qvp.quantity 

GROUP BY p.prod_id

HAVING  max(qvp.quantity) > p.qns

ORDER BY qvp.quantity DESC ##limit 0,1000";
$sql=$this->db->query($query_city);
return $sql->result_array();
}
/////////////////////////////////////////////////////Buyer/////////////////////////////////////////////////////////////////////////////

function get_city_wise_order(){
$query_city="Select Shipping_city,count(Shipping_city) as Total FROM cart_product where payment_done = '1' and status='success' AND Order_id!='' AND Shipping_city!=''
group by Shipping_city ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_state_wise_order(){
$query_city="Select Shipping_state,count(Shipping_state) as Total FROM cart_product where payment_done = '1' and status='success' AND Order_id!='' AND Shipping_state!=''
group by Shipping_state ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_category_wise_order(){
$query_city="Select c.cat_name,cp.Shipping_state,count(cp.Shipping_state) as Total FROM cart_product as cp
LEFT JOIN products as p ON p.prod_id=cp.product_id
LEFT JOIN category as c ON c.cat_id=p.cat_id
 where cp.payment_done = '1' and cp.status='success' AND cp.Order_id!='' AND cp.Shipping_state!=''
group by c.cat_name ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function get_subcategory_wise_order(){
$query_city="Select c.sub_cat_name,cp.Shipping_state,count(cp.Shipping_state) as Total FROM cart_product as cp
LEFT JOIN products as p ON p.prod_id=cp.product_id
LEFT JOIN subcategory as c ON c.sub_cat_id=p.sub_cat_id
 where cp.payment_done = '1' and cp.status='success' AND cp.Order_id!='' AND cp.Shipping_state!=''
group by c.sub_cat_name ORDER BY Total DESC limit 0,5";

$sql=$this->db->query($query_city);
return $sql->result_array();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}

?>