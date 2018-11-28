<?php 

/**
 Calculate shipping charges
 */
class Shipping_calculate 
{
	
	function shipping_calculation($buyers_zipcode,$sellers_zipcode,$kg = ""){

	
    $obj =& get_instance();
	$metro_cities = array('NEW DELHI','MUMBAI','KOLKATA','CHENNAI','BANGLORE','HYDERABAD','AHMADABAD','PUNE','SURAT','JAIPUR');
	$north_states = array("JK","AR","AS","MN","ML","MZ","NL","TR");
	$buyer_pincode = $buyers_zipcode;
	//Get buyers city and state
	$buyers_query['where']="where postal_code=$buyer_pincode";
	$buyers_query['table']='postal_code_table';
	$buyers_pin_details_arr = $obj->common_model->getAllDetails($buyers_query);
	
	
	if(empty($buyers_pin_details_arr)){
		
		$err["zip_error"] = "Delivery is not available at this pin code";
		return $err;
	}

	// echo "<pre>"; print_r($buyers_pin_details_arr);
	//Get sellers city and state
	$sellers_pincode = $sellers_zipcode;
	$sellers_query['where']="where postal_code=$sellers_pincode";
	$sellers_query['table']='postal_code_table';
	$sellers_pin_details_arr = $obj->common_model->getAllDetails($sellers_query);

	//Check cities are metro or not
	//  Check buyers city is metro or not  
	if (in_array($buyers_pin_details_arr[0]['city_name'], $metro_cities)){
		$buyers_pin_details_arr[0]['metro'] = "metro";
	}else{
		$buyers_pin_details_arr[0]['metro'] = "byr";
	}
	//  Check sellers city is metro or not
	if (in_array($sellers_pin_details_arr[0]['city_name'], $metro_cities)){
		$sellers_pin_details_arr[0]['metro'] = "metro";
	}else{
		$sellers_pin_details_arr[0]['metro'] = "slr";
	}
	// end metro check

	// create empty variables
	$zone = "";
	// $zone_number = "";
	$metro = "";
	//		echo "<pre>"; print_r($sellers_pin_details_arr); exit();

	// if buyer[metro] == seller[metro]
	if ($buyers_pin_details_arr[0]['metro'] == $sellers_pin_details_arr[0]['metro']) {
		 $zone = "Both are in Metro Cities";
		 $zone_number  = 3;
		 $metro = "1";
	}

	// if buyer[state] == seller[state]
	if($buyers_pin_details_arr[0]['state'] == $sellers_pin_details_arr[0]['state']){
		 $zone_number  = 2;
		 $zone = "Both are in Same State"; 
		 // if buyer[metro] == seller[metro]

		 if ($buyers_pin_details_arr[0]['metro'] == $sellers_pin_details_arr[0]['metro']) {
		 $zone = "Both are in Metro Cities";
		 $zone_number  = 3;
		}
	 
		// if buyer[city] == seller[city]
		if($buyers_pin_details_arr[0]['city_name'] == $sellers_pin_details_arr[0]['city_name']){
		 $zone = "Both are in Same City";
		 $zone_number  = 1;
		}
	}
	if(!$metro){
		if($buyers_pin_details_arr[0]['state'] != $sellers_pin_details_arr[0]['state']){
		$zone = "Different state";
		$zone_number  = 4;
		}
	}
	if (in_array($sellers_pin_details_arr[0]['state'], $north_states)){
	$zone = "Estern States";
	$zone_number  = 5;
	}
	if (in_array($buyers_pin_details_arr[0]['state'], $north_states)){
	$zone = "Estern States";
	$zone_number  = 5;
	}

	if($zone_number ==1){
		if($kg>2){
		$shipping_cost = ($kg)*(5.6);
		}
		if($kg<2.1){
		$shipping_cost = 94.8;
		}
		if($kg<1.5){
		$shipping_cost = 72.9;
		}
		if($kg<1){
		$shipping_cost = 51;
		}
		if($kg<0.5){
		$shipping_cost = 29.1;
		}

	}
	if($zone_number ==2){

		if($kg>2){
		$shipping_cost = ($kg)*(6.7);
		}
		if($kg<2.1 ){
		$shipping_cost = 108.9;
		}
		if($kg<1.5){
		$shipping_cost = 83.7;
		}
		if($kg<1){
		$shipping_cost = 58.5;
		}
		if($kg<0.5){
		$shipping_cost = 33.3;
		}
	}
	if($zone_number ==3){
		 
		if($kg>2){
		$shipping_cost = ($kg)*(7.4);
		///	echo "<pre>"; print_r($shipping_cost); exit();
		}
		if($kg<2.1 && $kg>1.4){
		$shipping_cost = 139.5;
		}
		if($kg<1.5 && $kg>0.99){
		$shipping_cost = 107.4;
		//echo "<pre>"; print_r($shipping_cost); exit();
		}
		if($kg<1 && $kg>0.4){
		$shipping_cost = 75.3;
		}
		if($kg<0.5){
		$shipping_cost = 43.2;
		}
	}

	if($zone_number ==4){
		
		if($kg>2){
		$shipping_cost = ($kg)*(8.4);
		}
		if($kg<2.1 ){
		$shipping_cost = 172.8;
		}
		if($kg<1.5){
		$shipping_cost = 131.7;
		}
		if($kg<1){
		$shipping_cost = 90.6;
		}
		if($kg<0.5){
		$shipping_cost = 49.5;
		}
	}
	if($zone_number ==5){
		
		if($kg>2){
		$shipping_cost = ($kg)*(9.5);
		}
		if($kg<2.1 ){
		$shipping_cost = 239.4;
		}
		if($kg<1.5){
		$shipping_cost = 181.5;
		}
		if($kg<1){
		$shipping_cost = 123.6;
		}
		if($kg<0.5){
		$shipping_cost = 65.7;
		}
	}
 

	$fuel_percent = 30;
	$service_tax = 15;
	$shipping_cost = ($shipping_cost)+($shipping_cost/100)*($fuel_percent);
	$shipping_cost = ($shipping_cost)+($shipping_cost/100)*($service_tax);
	
	if($shipping_cost < 60){
		$shipping_cost = 60; //Lp
	}
	
	$success = $shipping_cost;//["shipping_cost"]
	return $success; 
}
}
?>