<?php 

class Product_catalog extends CI_Controller
{
	
	public function index()
	{	
		$wh="";
		$wh.="products.seller_id!=''";
		$this->db->select('products.prod_id,
						   products.prod_name,
						     products.seller_id,
						   sections.section_name,
						   category.cat_name,
						   login.email,
						   login.mobile_number')
			     ->from('products')
			     ->join('sections','sections.section_id=products.section_id','left')
			     ->join('category','category.cat_id=products.cat_id','left')
			     ->join('login','login.user_id=products.seller_id','left')
			     ->where($wh)
			     // ->limit(10)
			     ->order_by('products.id','DESC');

		$data['products'] = $this->db->get()->result_array(); 
		// echo $this->db->last_query(); exit();
		$this->load->view('product_catalog/product_list',$data);
	}

	public function get_product()
	{
		$product_status = $this->input->post('product_status');
		$this->db->select('products.prod_id,
						   products.prod_name,
						   products.seller_id,
						   sections.section_name,
						   category.cat_name,
						   login.email,
						   login.mobile_number')
			     ->from('products')
			     ->join('sections','sections.section_id=products.section_id','left')
			     ->join('category','category.cat_id=products.cat_id','left')
			     ->join('login','login.user_id=products.seller_id','left')
			     ->where('products.product_status',$product_status)
			      // ->limit(10)
			     ->order_by('products.id','DESC');
		$data['products'] = $this->db->get()->result_array(); 
		//echo $this->db->last_query(); exit();
		 // echo "<pre>"; print_r($data['products']); 
		$this->load->view('product_catalog/search_products',$data);
	}

	public function product_detail()
	{	
		$seller_id = $this->uri->segment(4);
		$prod_id   = $this->uri->segment(3);

		// $data = $this->db->get_where('products',array('prod_id'=>$prod_id));
		
		$this->db->select('products.*,
						   sections.section_name,
						   category.cat_name,
						   category.cat_meta_title,
						   category.cat_meta_keywords,
						   category.cat_meta_description,
						   subcategory.sub_cat_name,
						   login.email,
						   login.mobile_number, 
						   gusset.gusset_name')
			     ->from('products')
			     ->join('sections','sections.section_id=products.section_id','left')
			     ->join('category','category.cat_id=products.cat_id','left')
			     ->join('subcategory','subcategory.sub_cat_id=products.sub_cat_id','left')
			     ->join('login',"login.user_id=".$seller_id." ",'left')
			    //  ->join('quantity_vs_price',"quantity_vs_price.prod_id='".$prod_id."'",'left')
			     ->join('filters',"filters.section_id=products.section_id and filters.cat_id=products.cat_id and filters.sub_cat_id=products.sub_cat_id",'left')
			     ->join('gusset','gusset.id=products.gusset','left')
			     ->where('products.prod_id',$prod_id );		 
		$a = $this->db->get()->result_array(); 	     
		$data['product'] = $a;
		 // echo "<pre>"; print_r($data['product']); exit();

		$section_id = $a[0]['section_id'];
		$cat_id     = $a[0]['cat_id'];
		$sub_cat_id = $a[0]['sub_cat_id'];

		$data['fil'] = $this->db->get_where('filters',array('section_id'=>$section_id,'cat_id'=>$cat_id,'sub_cat_id'=>$sub_cat_id))->result_array();

		$data['qvp'] = $this->db->get_where('quantity_vs_price',array('prod_id'=>$prod_id))->result_array();

		 // echo "<pre>"; print_r($data['qvp']); exit();
		$this->load->view('product_catalog/product_detail',$data);
	}

}

?>