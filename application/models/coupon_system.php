<?php 
class coupon_system extends CI_Model
{
	
		function get_coupon(){
			//$CI =& get_instance();
		
		 $query = "SELECT * FROM coupons order by coupons_id DESC";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		function coupons_Edit($id){
			//$CI =& get_instance();
		
		 $query = "SELECT * FROM coupons WHERE coupons_id='$id'";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		function Check_code($Apply_code){
			//$CI =& get_instance();
		$currnt_date=date('Y-m-d');
		 // $query = "SELECT * FROM coupons WHERE coupons_name='$Apply_code' AND coupons_from >= '$currnt_date' AND coupons_to <= '$currnt_date' order by coupons_id DESC";
		$query = "SELECT * FROM coupons WHERE coupons_name='$Apply_code' AND CURDATE() between coupons_from  and coupons_to";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		function Check_coupons_id($coupons_id){
			$currnt_date=date('Y-m-d');
		 // $query = "SELECT * FROM coupons WHERE coupons_name='$Apply_code' AND coupons_from >= '$currnt_date' AND coupons_to <= '$currnt_date' order by coupons_id DESC";
		$query = "SELECT * FROM coupons WHERE coupons_id='$coupons_id' AND CURDATE() between coupons_from  and coupons_to";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		function Check_user($Apply_code,$user_id,$coupons_value){
			$query = "SELECT * FROM coupons_use WHERE coupons_name='$Apply_code' AND coupon_user='$user_id' AND coupons_value='$coupons_value'";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		function Check_cartid($Apply_code,$coupons_type,$cart_id_value,$coupons_value){
		$query = "SELECT * FROM coupons_use WHERE coupons_code='$Apply_code' AND coupon_cartid='$cart_id_value' AND coupons_value='$coupons_value'";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		function Get_coupon_discount($cart_id_value,$Apply_code){
		 $query = "SELECT coupons_discount FROM coupons_use WHERE coupon_cartid='$cart_id_value' AND coupons_code='$Apply_code'";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		 
		}
		function update_coupon_discount($cart_id_value,$cuser_id,$Apply_code){
		$query = "UPDATE coupons_use SET coupon_user='$cuser_id' WHERE coupon_cartid='$cart_id_value' AND coupons_code='$Apply_code'";
         $sql = $this->db->query($query);
		}
		
		function Check_coupon_discount($cuser_id,$Apply_code){
		$query = "SELECT * FROM coupons_use WHERE coupon_user='$cuser_id' AND coupons_code='$Apply_code'";
         $sql = $this->db->query($query);
      	 return $sql->result_array();
		}
		
		
		function coupons_status($id,$value){
		$query = "UPDATE coupons SET coupons_status='$value' WHERE coupons_id='$id'";
         $sql = $this->db->query($query);
      	if($sql){
			return 1;}else{return 2;}
		
		}
		
		
		function Coupon_add($Apply_code,$coupons_type,$cart_id_value,$coupons_value,$final_price,$discount_price){
			$currnt_date=date('Y-m-d');
			$data=array(
			'coupon_cartid'=>$cart_id_value,
			'coupons_type'=>$coupons_type,
			'coupons_code'=>$Apply_code,
			'coupons_value'=>$coupons_value,
			'coupons_amount'=>$final_price,
			'coupons_discount'=>$discount_price,
			'coupons_date'=>$currnt_date
			);
			$sql =  $this->db->insert('coupons_use',$data);
			//$sql = $this->db->query($query);
			if($sql){
				return 1;
			}else{
				return 2;
			}
		}
		function Coupon_insert($coupons_name,$coupons_text,$coupons_type,$coupons_value,$coupons_from,$coupons_to,$coupons_status){
			$coupons_date=date('Y-m-d');
		$data = array(
			        'coupons_category' => 0,
					'coupon_product' =>0,
					'coupon_seller' => 0,
					'coupon_user' => 0,
					'coupon_All' => 0,
			        'coupons_name' => $coupons_name,
					'coupons_text' => $coupons_text,
					'coupons_type' => $coupons_type,
					'coupons_value' => $coupons_value,
					'coupons_from' => $coupons_from,
					'coupons_to' => $coupons_to,
					'coupons_date' => $coupons_date,
					'coupons_status' => $coupons_status,
					
				);
				$sql=$this->db->insert('coupons',$data);
				if($sql){
				return 1;
			}else{
				return 2;
			}
		}
		
	function Coupon_Update($coupons_name,$coupons_text,$coupons_type,$coupons_value,$coupons_from,$coupons_to,$coupons_status,$coupons_id){
		
		$data = array(
			        'coupons_category' => 0,
					'coupon_product' =>0,
					'coupon_seller' => 0,
					'coupon_user' => 0,
					'coupon_All' => 0,
			        'coupons_name' => $coupons_name,
					'coupons_text' => $coupons_text,
					'coupons_type' => $coupons_type,
					'coupons_value' => $coupons_value,
					'coupons_from' => $coupons_from,
					'coupons_to' => $coupons_to,
					'coupons_status' => $coupons_status,
					
				);
				$this->db->where('coupons_id',$coupons_id);
				if( $this->db->update('coupons',$data))
      {
      return 1;
      }
      else
      {
       return 2;
      }
	}
		
}
?>