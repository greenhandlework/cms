<?php
class Login_model extends CI_Model{
	
	
	function Checkuser($lEmail, $lpassword){
		$password=md5($lpassword);
		$sql = $this->db->query("select adminid,firstname,lastname,email,usertype,permission,userstatus,loginstatus from administrator_login where email = '$lEmail' AND password='$password'");
		
		return $sql->result_array();
	}
	
}




?>