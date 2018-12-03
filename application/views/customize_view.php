<?php  //global $section_id;
//echo 'kiran'; exit();//$data['datacart']  = $this->cart->contents();
//print_r($data);
global $subcategory_id;global $size_data;global $width;global $height;$left_handle_style='';$right_handle_style='';
if (isset($section_id)) {

   $section_id = $section_id;
}
if(isset($prod_style_size))
{
   // echo str_replace("*","x",$prod_style_size['0']['size'])."<pre>"; print_r($prod_style_size['0']['size']); echo "</pre>";
    $size_data = $prod_style_size;
    $yu = str_replace("*","x",$prod_style_size['0']['size']);
    $size_array = explode('x', str_replace("*","x",$prod_style_size['0']['size']));

    if(isset($size_array['0']) && isset($size_array['1']))
    { 
        $width = floatval($size_array['0']);
        $height = floatval($size_array['1']); 
    }
    if(isset($size_array['2']))
    {
        $gusset = floatval($size_array['2']); 
    }else{ $gusset ='';}
}
if (isset($section_id)) {

    $section_id = $section_id;
}
if (isset($sub_cat_id)) {

    $subcategory_id = $sub_cat_id;
}
if($section_id == '0'){ $sec_nm = 'Customizable'; }elseif($section_id == '1'){ $sec_nm = 'Ready To Print'; }elseif($section_id == '2'){ $sec_nm = 'Ready To Deliver'; }elseif($section_id == '3'){ $sec_nm = 'Ecological Ad Bags'; }else{$sec_nm = '';}
?>


<?php  
global $quntity;
global $quantity_list;
global $mrp_list;global $sell_list;global $discount_list;global $wcc_list;
global $order_quantity;

$quntity = $quantity_vs_price['0']['quantity'];
$seller_price = $quantity_vs_price['0']['seller_price'];
$ghmargin = $quantity_vs_price['0']['ghmargin'];

for ($i=0; $i < count($quantity_vs_price); $i++) { 
    $quantity_list[$i] = $quantity_vs_price[$i]['quantity'];
}
for ($i=0; $i < count($quantity_vs_price); $i++) { 
    $mrp_list[$i] = $quantity_vs_price[$i]['mrp'];
}
for ($i=0; $i < count($quantity_vs_price); $i++) { 
    $sell_list[$i] = $quantity_vs_price[$i]['sell_price'];
}
for ($i=0; $i < count($quantity_vs_price); $i++) { 
    $discount_list[$i] = $quantity_vs_price[$i]['discount'];
}
for ($i=0; $i < count($quantity_vs_price); $i++) { 
    $wcc_list[$i] = $quantity_vs_price[$i]['wcc'];
}
$order_quantity = $quantity_vs_price[count($quantity_list)-1]['quantity'];



function get_Coupon(){
$obj =& get_instance();
//$query="SELECT * FROM quantity_vs_price WHERE seller_id='$seller_id' AND prod_id='$prod_id' AND quantity='$quantity'";
$query="SELECT * FROM coupons WHERE coupons_status='1' LIMIT 0,1"; 

$sql=$obj->db->query($query);
return $sql->result_array();
}


?>
<style type="text/css">
.select-price-box {color: #666;float: right;font-size: 11px;text-align: center;border: 0;width: 100%;}
.table {display: table;margin-bottom: 0;width: 100%;}
.bg {background: #f9f9f9;font-size: 11px; color: #444;font-weight: normal;}
.table-row {display: table-row;}
/*.bg .table-cell {padding: 4px 15px 5px 8px;}*/
.table-cell {border-bottom: solid 1px #e8e8e8;display: table-cell;}
.table-row.bulk-option {cursor: pointer;}
input[type="radio"] {display: none;} 
input[type="radio"] + label {color: #292321;font-family: Arial, sans-serif;font-size: 14px;}
input[type="radio"] + label span {background-color: #fff;border: solid 1px #bdbdbd;margin: 7px;}
input[type="radio"] + label span { display: inline-block;width: 15px;height: 15px;margin: -1px 4px 0 0; vertical-align: middle;cursor: pointer;-moz-border-radius: 50%; border-radius: 50%;}
.table-row.active .table-cell:first-child {border-left: solid 2px #fa832a;}
.table-row.active .table-cell {border: solid 2px #fa832a;border-right: 0;border-left: 0;}
.BoxPer {background: #fff5c0;margin: 10px 0 0;padding: 4px 40px 5px 0px;color: #444;text-align: left;line-height: 16px;position: relative;z-index: 1;}
.BoxPer strong { font-family: open sans semibold; display: block;text-transform: uppercase;}
.BoxPer .qstionSec {position: absolute;right: 12px; top: 50%; transform: translateY(-50%);background: #fff;width: 15px;height: 15px;border-radius: 50%;
 text-align: center;line-height: 13px;font-size: 10px;font-family: open sans semibold;border: solid 1px #d7dad3;box-shadow: 0px 2px 4px #cac29a;}
.btn-sm{ font-size:15px !important;}
.BoxPer .answrToolTip {background: #fff; position: absolute; width: 324px;top: 23px;right: -13px;padding: 10px 40px 10px 10px;text-align: left;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);font-size: 12px;font-family: open sans regular;line-height: 17px;}
.BoxPer .answrToolTip .crossThinIcon {position: absolute;width: 16px;height: 16px;background-size: 100%;right: 10px;top: 10px;opacity: 0.5;}
#bd{font-weight: bold;}
.bounceInLeft{ background-color:#FFF;}
.breadcrumb > li + li:before {content: "> ";padding: 0 5px;}
.qaz{text-align: center;   /* Center the image horizontally *//*margin: 2em; *//*position: relative;*/}
.qazimg{vertical-align: middle;/* position: absolute;*/   width: 61%;max-height: 100%;}
.editorb{padding: 5px;margin: 2px;font-family: 'Poppins';font-size: 17px;border:1px solid #f2f2f2;font-weight: bold;text-align: center;width: 33px;float:left;cursor: pointer;}
.editori{padding: 5px;margin: 2px;font-family: 'Poppins';font-size: 17px;border:1px solid #f2f2f2;font-style: italic;text-align: center;width: 33px;float:left;cursor: pointer;}
.editoru{padding: 5px;margin: 2px;font-family: 'Poppins';font-size: 17px;border:1px solid #f2f2f2;text-decoration: underline;text-align: center;width: 33px;float:left;cursor: pointer;}
.editora{padding: 5px;margin: 2px;font-family: 'Poppins';font-size: 17px;border:1px solid #f2f2f2;color:red;text-align: center; width: 33px;float:left;cursor: pointer;}
.border_cls { border: solid 1px !important; border-style: dashed !important; border-color: white !important; }
.hide_this_div{ display: none !important; }
#grocery_bag_small_no_gusset{margin-top: 119px;} 
#grocery_bag_medium_no_gusset_parent_div{width: 107px; height: 192px; margin-top: 14px; margin-left: 10px; margin-right: 10px;  margin-bottom: 10px; border: solid 0px;  border-style: dashed; border-color: white;}  
#grocery_bag_medium_no_gusset{ margin-top: 152px;}
#grocery_bag_big_no_gusset_parent_div{width: 125px; height: 216px; margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}  
#grocery_bag_small_no_gusset_parent_div{width: 84px;height: 165px;margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#grocery_bag_big_no_gusset{ margin-top: 172px;}
#counter_bag_vertical_big_parent_div{width: 221px; height: 245px; margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed; border-color: white;}  
#counter_bag_vertical_small_parent_div{width: 173px; height: 181px;margin-top: 10px; margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}  
#counter_bag_vertical_medium_parent_div{width: 200px; height: 214px; margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#counter_bag_horizontal_small_parent_div{width: 207px;height: 182px; margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#counter_bag_horizontal_medium_parent_div{width: 252px;height: 195px;   margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;} 
#counter_bag_horizontal_big_parent_div{width: 287px; height: 218px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}
#parent_div{width: 221px;height: 245px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;/*border: solid 1px;border-style: dashed;border-color: white;*/} 
#jute_bag_vertical_div{width: 222px;height: 256px;margin-top: 0px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}
#jute_bag_horizontal_div{background-size: 293px 370px;width: 256px;height: 233px;margin-top: 0px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;background-repeat: no-repeat;}
#jute_bag_vertical_medium_parent_div{width: 200px; height: 227px;margin-top: -2px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#jute_bag_small_parent_div{width: 173px;height: 194px; margin-top: -2px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#jute_horizontal_small_parent_div{width: 207px;height: 193px;margin-top: -2px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#jute_horizontal_medium_parent_div{width: 252px;height: 207px;margin-top: -2px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#jute_horizontal_big_parent_div{width: 287px;height: 230px;margin-top: -2px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#paper_small_parent_div{width: 173px;height: 181px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}  
#paper_medium_parent_div{width: 200px;height: 214px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed; border-color: white;}  
#paper_horizontal_small_parent_div{width: 207px;height: 182px;margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#paper_horizontal_medium_parent_div{width: 252px;height: 195px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#paper_horizontal_big_parent_div{width: 240px;height: 240px;margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}  
#paper_horizontal_big_parent_divv{width: 287px;height: 220px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#box_bag_small_parent_div{width: 150px;height: 150px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#box_bag_medium_parent_div{width: 164px;height: 163px;margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}  
#box_medium_parent_div{width: 164px;height: 163px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;    } 
#mailing_box_parent_div{width: 177px;height: 174px;margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;    }  
#cake_box_parent_div{ width: 164px;height: 69px; margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px;  border: solid 0px; border-style: dashed; border-color: white;    }
#food_box_parent_div{width: 164px;height: 92px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed; border-color: white;    }
#food_box_diff_parent_div{width: 282px; height: 121px;margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px; border: solid 0px; border-style: dashed; border-color: white;    }
#box_bag_medium{ margin-top: 131px;}
#box_bag_big_parent_div{ width: 204px;height: 208px; margin-top: 10px; margin-left: 10px; margin-right: 10px;  margin-bottom: 10px; border: solid 0px; border-style: dashed;  border-color: white;}  
#basket_bag_medium_parent_div{width: 212px; height: 126px;margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;} 
#basket_bag_big_parent_div{width: 254px;height: 139px;margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed; border-color: white;}  
#basket_bag_small_parent_div{ width: 180px;height: 173px; margin-top: 19px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#grocery_bag_small_parent_div{width: 84px;height: 165px; margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px; border-style: dashed;border-color: white;} 
#grocery_bag_small{ margin-top: 119px;} 
#grocery_bag_medium_parent_div{ width: 107px;height: 192px; margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px; border-style: dashed;  border-color: white;}  
#grocery_bag_medium{ margin-top: 152px;}
#grocery_bag_big_parent_div{width: 125px; height: 216px; margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;}  
#grocery_bag_big{ margin-top: 172px;}
#wine_bag_small_parent_div{width: 84px;height: 165px; margin-top: 10px;margin-left: 10px; margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed; border-color: white;} 
#wine_bag_small{margin-top: 119px;} 
#wine_bag_medium_parent_div{width: 107px;height: 192px;margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#wine_bag_medium{margin-top: 152px;}
/*#wine_bag_big_parent_div{width: 162px;height: 251px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 1px;border-style: dashed;border-color: white;} */
#wine_bag_big_parent_div_other{width: 162px; height: 251px; margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;} 
#wine_bag_big_parent_div{width: 128px;height: 216px;margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#files_folder_parent_div{width: 148px; height: 216px; margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;} 
#pamplet_horizontal_big_parent_div{width: 187px;height: 216px;margin-top: 10px; margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px;border-style: dashed; border-color: white;}  
#address_horizontal_big_parent_div{width: 187px;height: 142px;margin-top: 10px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px;border-style: dashed;border-color: white;} 
#address_vertical_big_parent_div{width: 187px;height: 157px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}  
#tissue_paper_big_parent_div{ width: 187px; height: 200px;margin-top: 10px; margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed; border-color: white;}
#suitcover_big_parent_div{width: 187px;height: 278px;}
#bookmark_big_parent_div{width: 96px;height: 240px;margin-top: 10px; margin-left: 10px;margin-right: 10px; margin-bottom: 10px; border: solid 0px; border-style: dashed;border-color: white;}
#tags_big_parent_div{width: 198px;height: 221px; margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed; border-color: white;}
#tags_small_parent_div{width: 166px;height: 157px;margin-top: 10px; margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;} 
#envelope_big_parent_div{width: 207px;height: 226px;margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#envelope_horizontal_big_parent_div{width: 290px;height: 199px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}
#sticker_horizontal_big_parent_div{width: 290px;height: 199px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}
#sticker_vertical_big_parent_div{width: 177px;height: 199px;margin-top: 10px; margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}
#envelope_medium_parent_div{width: 246px;height: 172px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#envelope_small_parent_div{width: 142px;height: 159px; margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#wine_bag_big{ margin-top: 172px;}
#medical_bag_big_parent_div{width: 222px; height: 238px;margin-top: 10px; margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed; border-color: white;}  
#medical_bag_with_handle_medium_parent_div{width: 196px;height: 191px;margin-top: 44px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px; border-style: dashed;border-color: white;}
#medical_bag_with_handle_medium_parent_div_{width: 226px;height: 197px; margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 1px;border: solid 0px;border-style: dashed;border-color: white;}
#medical_bag_medium_parent_div{width: 192px;height: 226px;margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#medical_bag_big{ margin-top: 126px;} 
#medical_bag_medium{ margin-top: 126px;} 
#medical_bag_small_parent_div{width: 175px;height: 205px;margin-top: 10px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#medical_bag_small{margin-top: 164px;} 
#non_woven_small_parent_div{width: 175px;height: 180px;margin-top: 37px;margin-left: 10px;margin-right: 10px; margin-bottom: 10px;border: solid 0px;border-style: dashed;border-color: white;}
#non_woven_small{margin-top: 135px;} 
#medical_bag_with_handle_big_parent_div{width: 207px;height: 220px; margin-top: 25px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px;border: solid 0px;border-style: dashed; border-color: white;}
#non_woven_medium_parent_div{width: 194px;height: 194px; margin-top: 38px;margin-left: 10px; margin-right: 10px;margin-bottom: 10px;border: solid 0px; border-style: dashed; border-color: white;}
#non_woven_medium{margin-top: 135px;} 
#non_woven_big_parent_div{ width: 204px;height: 205px;margin-top: 35px;margin-left: 10px;margin-right: 10px;margin-bottom: 10px; border: solid 0px; border-style: dashed;border-color: white;}
#non_woven_big{margin-top: 79px;} 
.bag_labels{display: none;position: absolute; line-height:7px;padding-bottom: 1px;}
#resizable{  min-width: 10%; display: none;}
#content .tabing .nav-tabs > li.active > a{background-color: #fff !important;}
.fa-stack{position: relative;display: inline-block; width: 2em;height: 1em;/*line-height: -1em;*/vertical-align: middle;}
.Dispatch_diplay{ color:#F00 !important;}
/*#dprice{
position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 170px;
padding: 5px 0;
margin: 2px 0 0;
font-size: 14px;
list-style: none;
background-color: #ffffff;
border: 1px solid #cccccc;
border: 1px solid rgba(0, 0, 0, 0.15);
border-radius: 4px;
-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
-moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
background-clip: padding-box;
}*/

@media only screen and (min-width: 360px) and (max-width: 640px) {
label {width: 65px !important;}
}

</style>

<link rel="stylesheet" href="<?php echo base_url().'css/';?>cropper.css">
<link rel="stylesheet" href="<?php echo base_url().'css/';?>main.css">
<?php if(isset($cart_data['product_id']) && count($cart_data['product_id'])>0){ ?>
<script type="text/javascript">
 $('#ct').css({"display":"block","opacity":"1"});    
</script>
<?php } ?>
<script type="text/javascript">
var interval = null;
jQuery(function(){ interval = setInterval(callFunc, 10000); });
function callFunc(){ $('#ct').removeAttr('style'); }

$( function() {
    $( "#resizable" ).resizable({aspectRatio:true,containment:".cropped_image_div",handles: 'n, e, s, w'}).draggable({ containment: ".cropped_image_div" });
    $( ".bag_labels" ).draggable({ containment: ".cropped_image_div"});
} );


function calculate_image_co_ordinates()
{
    var avoid = "px";
    var div_height = $('.cropped_image_div').height();
    var div_width = $('.cropped_image_div').width();

    var image_height = $('#resizable').height();
    var image_width = $('#resizable').width();

    var image_margin_left = $('#resizable').css('left').replace(avoid,'');
    var image_margin_top = $('#resizable').css('top').replace(avoid,'');


    var image_margin_bottom = parseInt(div_height) - (parseInt(image_margin_top)+parseInt(image_height));
    var image_margin_right = parseInt(div_width) - (parseInt(image_margin_left)+parseInt(image_width));

    image_margin_left = Math.round(image_margin_left);
    image_margin_right = Math.round(image_margin_right);
    image_margin_top = Math.round(image_margin_top);
    image_margin_bottom = Math.round(image_margin_bottom);
    var image_margin_left_perc = (((parseInt(image_margin_left)/div_width))*100).toFixed(2); 
    var image_margin_right_perc = (((parseInt(image_margin_right)/div_width))*100).toFixed(2); 
    var image_margin_top_perc = (((parseInt(image_margin_top)/div_height))*100).toFixed(2); 
    var image_margin_bottom_perc = (((parseInt(image_margin_bottom)/div_height))*100).toFixed(2); 

    $('#calc_div_height').html(div_height);
    $('#calc_div_width').html(div_width);
    $('#calc_image_height').html(image_height);
    $('#calc_image_width').html(image_width);

    $('#image_margin_left').html(image_margin_left);
    $('#image_margin_top').html(image_margin_top);

    $('#image_margin_right').html(image_margin_right);
    $('#image_margin_bottom').html(image_margin_bottom);

    $('#image_margin_left_perc').val(image_margin_left_perc+'%');
    $('#image_margin_top_perc').val(image_margin_top_perc+'%');
    $('#image_margin_right_perc').val(image_margin_right_perc+'%');
    $('#image_margin_bottom_perc').val(image_margin_bottom_perc+'%');
}

</script>


<script>
    $('#myModal_image').hide(function () {
      
});
</script> 
<input type="hidden" id="width" value="<?php echo $width; ?>">
<input type="hidden" id="height" value="<?php echo $height; ?>">
<input type="hidden" id="gusset" value="<?php if(isset($gusset)) { echo $gusset;}else { echo "";}?>">
<input type="hidden" id="sub_cat_type" value="<?php echo $subcategory_id;?>">
<input type="hidden" id="bag_size" value="<?php echo $prod_style_size['0']['size'];?>">

<input type="hidden" id="handle_type_data" value="<?php if(isset($handle_type_details)) { $handle_t = str_replace(' ', '',$handle_type_details); echo $handle_t; }  else {  $handle_t = NULL; } ?>">
<input type="hidden" id="bag_text_img" value="<?php if(isset($texture['0']['bag_texture'])) { $bag_text = str_replace(' ', '',$texture['0']['bag_texture']);echo $bag_text; } else {  $bag_text = NULL; } ?> ">
<input type="hidden" id="handle_text_img" value="<?php if(isset($texture_handle['0']['handle_texture'])) { $bag_text1 = str_replace(' ', '',$texture_handle['0']['handle_texture']); echo $bag_text1; } else {  $bag_text1 = NULL; }  ?>">
<?php 
$main_id = "";
$main_div_style="";
$front_handle_style = "";
$front_bag_image_id = "";
$front_bag_image_style ="";
$parent_bag_front_id = "";
$bottom_style = "";
$left_id = "";
$left_style = "";
$right_id = "";
$right_style = "";
$back_handle_id = "";
$back_handle_style = "";
$back_id = "";
$back_style = "";
$bottom_style_id='';
/////////////////////////
$handle_type_data = $handle_t;
// $gusset ='';
// if(isset($gusset['0'])) { echo $gusset = $gusset['0'];}

if ($subcategory_id==0 || $subcategory_id==2 || $subcategory_id==9 || $subcategory_id==79 || 
    $subcategory_id==88 || $subcategory_id==98 || $subcategory_id==80 || $subcategory_id==10 || 
    $subcategory_id==15 || $subcategory_id==96 || $subcategory_id==16 || $subcategory_id==99 || 
    $subcategory_id==100)
{   
    if($gusset == "")
    { 
        if($width<$height)
        {
            $active_product = 'medical_bag_with_handle_medium';

            $main_id = "medical_bag_with_handle_medium";
            $main_div_style="";
            $front_handle_style = "style='background-repeat: no-repeat;height: 64px;transform: translateZ(2px) translateY(-50px) translateX(72px);'";
            $front_bag_image_id = "medical_bag_with_handle_medium_handle";
            $front_bag_image_style ="style='height: 245px;width:215px;background-size: 215px 245px;background-size: 215px 245px;transform: translateY(-64px) translateZ(6px) translateX(17px);overflow: hidden;'";
            $parent_bag_front_id = "medical_bag_with_handle_medium_parent_div";

            $bottom_style = "";
            $left_id = "";
            $left_style = "";
            $right_id = "";
            $right_style = "";
            $back_handle_id = "";
            $back_handle_style = "";
            $back_id = "";
            $back_style = "style='height: 245px;width:215px;background-size: 215px 245px;background-size: 215px 245px;transform: translateY(-64px) translateZ(6px) translateX(17px) rotateY(180deg); overflow: hidden;'";
        }
        else
        {

            $active_product = 'medical_bag_with_handle_medium';

            $main_id = "medical_bag_with_handle_medium";
            $main_div_style="";
            $front_handle_style = "style='background-repeat: no-repeat;height: 64px;transform: translateZ(2px) translateY(-50px) translateX(72px);'";
            $front_bag_image_id = "medical_bag_with_handle_medium_handle";
            $front_bag_image_style ="style='height: 210px;width:245px;background-size: 245px 210px;background-size: 245px 210px;transform: translateY(-64px) translateZ(6px) translateX(3px);overflow: hidden;'";
            $parent_bag_front_id = "medical_bag_with_handle_medium_parent_div_";

            $bottom_style = "";
            $left_id = "";
            $left_style = "";
            $right_id = "";
            $right_style = "";
            $back_handle_id = "";
            $back_handle_style = "";
            $back_id = "";
            $back_style = "style='height: 210px;width:245px;background-size: 245px 210px;background-size: 245px 210px;transform: translateY(-64px) translateZ(6px) translateX(3px) rotateY(180deg); overflow: hidden;'";
        }
    }
    else if($width<$height)
    {
        if ($handle_type_data=='D-cut')
        {

        }
        if ($subcategory_id==96 && $handle_type_data=='Rope')
        {
            $active_product = 'cotton_bag_vertical_big';
        }
        else
        {
             $active_product = 'paper_bag_vertical_big';
// $("#parent_bag_container").append($("#paper_bag_vertical_big").show());
//echo "<script type='text/javascript'>alert('paper_bag_vertical_big');<script>";

            $main_id = "paper_bag_vertical_big";
            $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-44px) translateX(72px);'";
            $front_bag_image_id = "vertical_big_id";
            $front_bag_image_style = "style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-64px) translateZ(44px) translateX(4px);overflow: hidden;'";
            $parent_bag_front_id = "parent_div";

            $bottom_style = "style='height: 87px;width: 245px;transform: rotateX(-90deg) translate3d(3px, -1px, 159px);background-size: 243px 266px;'";
            $left_id = "vertical_big_left";
            $left_style = "style='height: 266px;bottom: -17px;margin-left: -41px;background-size: 330px 266px;'";
            $right_id = "vertical_big_right";
            $right_style = "style='height: 266px;bottom: -17px;margin-left: -48px;background-size: 330px 266px;'";
            $back_handle_id = "vertical_big_handle";
            $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateY(-106px) translateZ(-42px) translateX(71px);'";
            $back_id = "vertical_big_back";
            $back_style = "style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-127px) translateZ(-44px) translateX(4px) rotateY(180deg);'";
        }
    }
    else if($width==$height)
    { 
            $active_product = 'paper_bag_horizontal_big';
            $main_id = "paper_bag_horizontal_big";
            $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-48px) translateX(82px);'";
            $front_bag_image_style = "style='height: 260px;width:260px;background-size: 260px 260px;transform: translateY(-64px) translateZ(44px);overflow: hidden;'";
            $front_bag_image_id = "paper_horizontal_big_id";
            $parent_bag_front_id = "paper_horizontal_big_parent_div";

            $bottom_style = "style='height: 89px;width: 261px;transform: rotateX(-90deg) translate3d(0px, 0px, 151px);'";
            $left_id = "paper_horizontal_big_left";
            $left_style = "style='height: 260px;bottom: -10px;background-size: 308px 260px;'";
            $right_id = "paper_horizontal_big_right";
            $right_style = "style='height: 260px;bottom: 47px;transform: rotateY(90deg) translate3d(0, 57px, 190px);background-size: 308px 260px;'";
            $back_handle_id = "paper_horizontal_big_handle";
            $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 99px;transform: translateY(-113px) translateZ(-42px) translateX(82px);'";
            $back_id = "paper_horizontal_big_back";
            $back_style = "style='height: 260px;width:260px;background-size: 260px 260px;transform: translateY(-127px) translateZ(-44px) rotateY(180deg);'";
    }
    else
    {
        if ($handle_type_data=='D-cut')
        {
//echo "<script type='text/javascript'>alert('D-cut');<script>";
// $("#paper_horizontal_big_parent_div ").css('height','186px');
// $("#paper_horizontal_big_parent_div ").css('margin-top','45px');
        }
        if ($subcategory_id==96 && $handle_type_data=='Rope')
        {
//  $("._3dface--front_handle").css('background-size','170px 100px');
//  $("._3dface--front_handle").css('transform','translateZ(43px) translateY(-4px) translateX(12px)');
//  $(".bag_handle_image").css('background-size','170px 100px'); 
// $(".bag_handle_image").css('transform','translateY(-152px) translateZ(-42px) translateX(9px)'); 
            $active_product = 'cotton_bag_vertical_big';
//echo "<script type='text/javascript'>alert('cake_box');<script>";
// $("#parent_bag_container").append($("#cotton_bag_vertical_bigsubcategory_id==96").show());
        }
        else
        {
            $active_product = 'paper_bag_horizontal_big';
// echo "<script type='text/javascript'>alert('paper_bag_horizontal_big');<script>";
            $main_id = "paper_bag_horizontal_big";
            $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-44px) translateX(72px);'";
            $front_bag_image_style = "style='height: 240px;width:290px;background-size: 290px 240px;transform: translateY(-62px) translateX(-21px) translateZ(45px);overflow: hidden;'";
            $front_bag_image_id = "paper_horizontal_big_id";
            $parent_bag_front_id = "paper_horizontal_big_parent_divv";

            $bottom_style = "style='height: 87px;width: 290px;transform: rotateX(-90deg) translate3d(-22px, 0px, 133px);'";
            $left_id = "paper_horizontal_big_left";
            $left_style = "style='height: 240px;bottom: 9px;background-size: 290px 240px; transform: rotateY(-90deg) translate3d(0, 0, 147px);'";
            $right_id = "paper_horizontal_big_right";
            $right_style = "style='height: 240px;bottom: 47px;transform: rotateY(90deg) translate3d(-1px, 39px, 198px);background-size: 290px 240px;'";
            $back_handle_id = "paper_horizontal_big_handle";
            $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 99px;transform: translateY(-106px) translateZ(-42px) translateX(71px);'";
            $back_id = "paper_horizontal_big_back";
            $back_style = "style='height: 240px;width:290px;background-size: 290px 240px;transform: translateY(-127px) translateX(-21px) translateZ(-45px) rotateY(180deg);'";
//$("#parent_bag_container").append($("#paper_bag_horizontal_big").show());
        }
    }

}
else if(($subcategory_id==3)  || ($subcategory_id==101))
{

    if($gusset == "")
    {
        $active_product = 'grocery_bag_big_no_gusset';   
//$("#parent_bag_container").append($("#grocery_bag_big_no_gusset").show());
//echo "<script type='text/javascript'>alert('grocery_bag_big_no_gusset');<script>";

        $main_id = "grocery_bag_big_no_gusset";
        $main_div_style="";
        $front_handle_style = "";
        $front_bag_image_id = "grocery_bag_big_id";
        $front_bag_image_style ="style='width: 147px;margin-left: 61px;background-size: 147px 237px;transform: translateZ(53px);height: 237px;bottom: 88px;'";
        $parent_bag_front_id = "grocery_bag_big_no_gusset_parent_div";

        $bottom_style = "";
        $left_id = "";
        $left_style = "";
        $right_id = "";
        $right_style = "";
        $back_handle_id = "";
        $back_handle_style = "";
        $back_id = "";
        $back_style = "";

    }
    else
    {
        $active_product = 'grocery_bag_big';   
//$("#parent_bag_container").append($("#grocery_bag_big").show());
//echo "<script type='text/javascript'>alert('grocery_bag_big');<script>";
    }


}
else if ($subcategory_id==11 || $subcategory_id==12)
{ 
    if($width<$height)
    {
        $active_product = 'jute_bag_vertical_big';
//echo "<script type='text/javascript'>alert('jute_bag_vertical_big');<script>";

        $main_id = "jute_bag_vertical_big";
        $main_div_style="";
        $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-49px) translateX(68px);'";
        $front_bag_image_id = "jute_bag_vertical_big_id";
        $front_bag_image_style ="style='background-color: #535353;height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-64px) translateZ(44px) translateX(-1px);overflow: hidden;'";
        $parent_bag_front_id = "jute_bag_vertical_div";

        $bottom_style = "style='height: 87px;width: 245px;transform: rotateX(-90deg) translate3d(-3px, -1px, 158px);'";
        $left_id = "jute_bag_vertical_left";
        $left_style = "style='height: 266px;bottom: -17px;margin-left: -72px;background-size: 243px 266px; transform: rotateY(-90deg) translate3d(0, 0, 99px);'";
        $right_id = "jute_bag_vertical_big_right";
        $right_style = "style='height: 266px;bottom: -17px;margin-left: -79px;background-size: 243px 266px;transform: rotateY(90deg) translate3d(0, 0, 151px);'";
        $back_handle_id = "jute_bag_vertical_big_handle";
        $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateY(-113px) translateZ(-42px) translateX(68px);'";
        $back_id = "jute_bag_vertical_big_back";
        $back_style = "style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-127px) translateZ(-44px) translateX(-1px) rotateY(180deg);'";
    }
    else
    { 
        $active_product = 'jute_horizontal_big';
        $main_id = "jute_horizontal_big";
        $main_div_style="";
        $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-49px) translateX(71px);'";
        $front_bag_image_id = "jute_horizontal_big_id";
        $front_bag_image_style ="style='background-color: #535353;height: 235px;width:275px;background-size: 275px 235px;transform: translateY(-64px) translateZ(44px) translateX(-16px);overflow: hidden;'";
        $parent_bag_front_id = "jute_bag_horizontal_div";

        //$bottom_style = "style='height: 245px;width: 87px;transform: rotateX(-90deg) translate3d(-27px, -1px, 159px);'";
        $left_id = "jute_horizontal_big_left";
        $left_style = "style='height: 235px;bottom: 7px;margin-left: -71px;background-size: 275px 235px; transform: rotateY(-90deg) translate3d(-1px, -8px, 115px);'";
        $right_id = "jute_horizontal_big_right";
        $right_style = "style='height: 235px;bottom: 7px;margin-left: -46px;background-size: 275px 235px; transform: rotateY(90deg) translate3d(-1px, -9px, 135px);'";
        $back_handle_id = "jute_horizontal_big_handle";
        $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateY(-113px) translateZ(-42px) translateX(69px);'";
        $back_id = "jute_horizontal_big_back";
        $back_style = "style='height: 235px;width:275px;background-size: 275px 235px;transform: translateY(-127px) translateZ(-44px) translateX(-16px) rotateY(180deg);'";   
    }
}
else if ($subcategory_id==97)
{
    if($width<$height)
    {
        $active_product = 'jute_bag_vertical_big';
//echo "<script type='text/javascript'>alert('woven_stitch_bags');<script>";

        $main_id = "jute_bag_vertical_big";
        $main_div_style="";
        $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-49px) translateX(46px);'";
        $front_bag_image_id = "jute_bag_vertical_big_id";
        $front_bag_image_style ="style='background-color: #535353;height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-64px) translateZ(44px) translateX(-27px);overflow: hidden;'";
        $parent_bag_front_id = "jute_bag_vertical_div";

        $bottom_style = "style='height: 87px;width: 245px;transform: rotateX(-90deg) translate3d(-27px, -1px, 159px);'";
        $left_id = "jute_bag_vertical_left";
        $left_style = "style='height: 266px;bottom: -17px;margin-left: -72px;background-size: 243px 266px;'";
        $right_id = "jute_bag_vertical_big_right";
        $right_style = "style='height: 266px;bottom: -17px;margin-left: -79px;background-size: 243px 266px;'";
        $back_handle_id = "jute_bag_vertical_big_handle";
        $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateY(-113px) translateZ(-42px) translateX(56px);'";
        $back_id = "jute_bag_vertical_big_back";
        $back_style = "style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-127px) translateZ(-44px) translateX(-27px) rotateY(180deg);'";
    }
    else
    { 
        $active_product = 'jute_horizontal_big';
//$("#parent_bag_container").append($("#jute_horizontal_big").show());
//echo "<script type='text/javascript'>alert('jute_horizontal_big');<script>";
    }
}
else if ($subcategory_id==13 || $subcategory_id==14)
{
    if($width<$height)
        {$active_product = 'cotton_bag_vertical_big';
//echo "<script type='text/javascript'>alert('cotton_bag_vertical_big1234');<script>";
    $main_id = "cotton_bag_vertical_big";
    $main_div_style="style='margin-top: 10px; margin-left:40px'";
    $handle_image = "background-image: url(".base_url()."upload/texture/cotton_blackhan.png);";
    $background_image = "background-image: url(".base_url()."upload/texture/black_cotton.jpg);";

    $front_handle_style = "style='background-repeat: no-repeat;".$handle_image."height: 150px;width: 150px;transform: translateZ(43px) translateY(-44px) translateX(21px);'";
    $front_bag_image_id = "cotton_bag_id";
    $front_bag_image_style ="style='height: 266px;".$background_image."width:243px;transform: translateY(-64px) translateZ(44px) translateX(-27px);overflow: hidden;background-size: 243px 266px;'";
    $parent_bag_front_id = "parent_div";

    $bottom_style = "style='height: 87px;width: 245px;transform: rotateX(-90deg) translate3d(-27px, -1px, 159px);background-size: 243px 266px;'";
    $left_id = "cotton_bag_left";
    $left_style = "style='height: 264px;bottom: -101px;".$background_image."background-size: 308px 240px;transform: rotateY(-90deg) translate3d(0px, 0px, 151px);'";
    $right_id = "cotton_bag_right";
    $right_style = "style='height: 266px;bottom: -102px;margin-left: -79px;background-size: 243px 266px;'";
    $back_handle_id = "cotton_bag_handle";
    $back_handle_style = "style='background-repeat: no-repeat;".$handle_image."height: 150px;width: 150px;transform: translateY(-173px) translateZ(-42px) translateX(56px);'";
    $back_id = "cotton_bag_back";
    $back_style = "style='height: 266px;width:243px;".$background_image."transform: translateY(-214px) translateZ(-44px) translateX(-27px) rotateY(180deg);background-size: 243px 266px;'";
}
else
{
    $active_product = 'cotton_bag_horizontal_big';
//$("#parent_bag_container").append($("#cotton_bag_horizontal_big").show());
//echo "<script type='text/javascript'>alert('cotton_bag_horizontal_big');<script>";
}
}
else if ($subcategory_id==5 || $subcategory_id==89)
{ 
    $active_product = 'wine_bag_big';   
//$("#parent_bag_container").append($("#wine_bag_big").show());
//echo "<script type='text/javascript'>alert('wine_bag_big');<script>";

    $main_id = "wine_bag_big";
    $main_div_style="";
    $front_handle_style = "style='background-repeat: no-repeat;height: 64px;transform: translateZ(-48px) translateY(-126px) translateX(80px);'";
    $front_bag_image_id = "wine_bag_big_id";
    $front_bag_image_style ="style='width: 147px;margin-left: 61px;transform: translateZ(53px);height: 237px;background-size: 147px 237px;bottom: 88px;'";
    $parent_bag_front_id = "wine_bag_big_parent_div";

    $bottom_style = "style='transform: rotateX(-90deg) translate3d(0, 0, -6px) translateZ(0px);;height:105px;width:148px;background-size: 148px 105px;margin-left: 62px;bottom: 31px;'";
    $left_id = "wine_bag_big_left";
    $left_style = "style='width: 105px;height: 237px;background-size: 105px 237px;left: 50%;margin-left: 4px;margin-top: -2px;transform: rotateY(-90deg) translate3d(0, 0, 119px);bottom: 88px;'";
    $right_id = "wine_bag_big_right";
    $right_style = "style='width:105px;margin-left: -93px;height: 237px;bottom: 88px;background-size: 105px 237px;'";
    $back_handle_id = "wine_bag_big_handle";
    $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(48px) translateY(-188px) translateX(82px);'";
    $back_id = "wine_bag_big_back";
    $back_style = "style='width: 147px;transform: translateX(61px) translateZ(-50px) rotateY(180deg);height: 237px;background-size: 148px 237px;bottom: 89px;'";
}
else if ($subcategory_id==6 || $subcategory_id==10)
{  
    $active_product = 'medical_bag_with_handle_big';    
//$("#parent_bag_container").append($("#medical_bag_with_handle_big").show());   
// echo "<script type='text/javascript'>alert('medical_bag_with_handle_big');<script>";

    $main_id = "medical_bag_with_handle_big";
    $main_div_style="";
    $front_handle_style = "style='background-repeat: no-repeat;height: 64px;transform: translateZ(2px) translateY(-51px) translateX(79px);'";
    $front_bag_image_id = "medical_bag_with_handle_big_id";
    $front_bag_image_style ="style='height: 252px;width:226px;background-size: 226px 252px;transform: translateY(-64px) translateZ(2px) translateX(11px);overflow: hidden;'";
    $back_style =           "style='height: 252px;width:226px;background-size: 226px 252px;transform: translateY(-64px) translateZ(2px) translateX(11px) rotateY(180deg); overflow: hidden;'";
    $parent_bag_front_id = "medical_bag_with_handle_big_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
}
else if ($subcategory_id==7)
{
    $active_product = 'box_bag_big';   
    //$("#parent_bag_container").append($("#box_bag_big").show());
    //echo "<script type='text/javascript'>alert('box_bag_big');<script>";

    $main_id = "box_bag_big";
    $main_div_style="";
    $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(43px) translateY(-44px) translateX(72px);'";
    $front_bag_image_id = "box_bag_big_id";
    $front_bag_image_style ="style='height: 233px;width: 225px;background-size: 225px 233px;transform: translateY(76px) translateZ(66px) translateX(5px);overflow: hidden;bottom: 88px;'";
    $parent_bag_front_id = "box_bag_big_parent_div";

    $bottom_style = "";
    $left_id = "box_bag_big_left";
    $left_style = "style='width: 147px;height: 233px;background-size: 147px 233px;left: 50%;margin-left: -37px;margin-top: -132px;transform: rotateY(-90deg) translate3d(-6px, 72px, 156px);'";
    $right_id = "box_bag_big_right";
    $right_style = "style='width:147px;background-size: 147px 233px;margin-left: -38px;height: 233px;bottom: 88px;transform: rotateY(90deg) translate3d(6px, 75px, 68px);'";
    $back_handle_id = "box_bag_big_handle";
    $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(-54px) translateY(-105px) translateX(72px);'";
    $back_id = "box_bag_big_back";
    $back_style = "style='height: 233px;width: 225px;background-size: 225px 233px;transform: translateY(76px) translateX(4px) translateZ(-79px) rotateY(180deg);bottom: 88px;'";

}
else if ($subcategory_id==4)
{

    $active_product = 'counter_bag_vertical_big';   
//$("#parent_bag_container").append($("#counter_bag_vertical_big").show());
//echo "<script type='text/javascript'>alert('counter_bag_vertical_big');<script>";

    $main_id = "counter_bag_vertical_big";
    $main_div_style="";
    $front_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateZ(43px) translateY(-48px) translateX(46px);'";
    $front_bag_image_id = "counter_bag_vertical_big_id";
    $front_bag_image_style ="style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-64px) translateZ(44px) translateX(-27px);overflow: hidden;'";
    $parent_bag_front_id = "counter_bag_vertical_big_parent_div";

    $bottom_style = "style='height: 87px;width: 245px;transform: rotateX(-90deg) translate3d(-27px, -1px, 159px);'";
    $left_id = "counter_bag_vertical_big_left";
    $left_style = "style='height: 266px;bottom: -17px;margin-left: -72px;background-size: 222px 266px;'";
    $right_id = "counter_bag_vertical_big_right";
    $right_style = "style='height: 266px;bottom: -17px;margin-left: -79px;background-size: 222px 266px;'";
    $back_handle_id = "counter_bag_vertical_big_handle";
    $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 120px;transform: translateY(-113px) translateZ(-42px) translateX(56px);'";
    $back_id = "counter_bag_vertical_big_back";
    $back_style = "style='height: 266px;width:243px;background-size: 243px 266px;transform: translateY(-127px) translateZ(-44px) translateX(-27px) rotateY(180deg);'";

}
else if($subcategory_id==8)
{   
     $active_product = 'basket_bag_big';
//$("#parent_bag_container").append($("#basket_bag_big").show()); 
//echo "<script type='text/javascript'>alert('basket_bag_big');<script>";
    $main_id = "basket_bag_big";
    $main_div_style="";
    $front_handle_style = "style='background-repeat: no-repeat;height: 64px;transform:  translateZ(-96px) translateX(74px) translateY(-36px);'";
    $front_bag_image_id = "basket_bag_big_id";
    $front_bag_image_style ="style='width: 275px;height: 159px;transform: translateZ(101px) translateX(-10px) translateY(0px);bottom: 88px;background-image: url('".base_url()."texture/left.png');transform: translateZ(100px);height: 159px;bottom: 88px;'";
    $parent_bag_front_id = "basket_bag_big_parent_div";

    $bottom_style = "";
    $left_id = "basket_bag_big_left";
    $left_style = "style='width: 200px;height: 159px;left: 50%;margin-left: -146px;margin-top: -2px;transform: rotateY(-90deg) translate3d(3px, 0, 89px);bottom: 88px;'";
    $right_id = "basket_bag_big_right";
    $right_style = "style='width:200px;height: 159px;bottom: 88px;  transform: rotateY(90deg) translate3d(-1px, 0px, 140px);'";
    $back_handle_id = "basket_bag_big_handle";
    $back_handle_style = "style='background-repeat: no-repeat;height: 64px;transform: translateZ(103px) translateY(-106px) translateX(76px);'";
    $back_id = "basket_bag_big_back";
    $back_style = "style='width: 275px;transform: translateX(-10px) translateZ(-98px) rotateY(180deg);height: 159px;bottom: 88px;'";
}
else if($subcategory_id==52 || $subcategory_id==53 || $subcategory_id==54 || $subcategory_id==55 || $subcategory_id==56 || $subcategory_id==57 || $subcategory_id==95)
{ 
    $active_product = 'pouches_big';
//$("#parent_bag_container").append($("#pouches_big").show());
//echo "<script type='text/javascript'>alert('".$subcategory_id."');<script>";

    $main_id = "pouches_big";
    $main_div_style="style='margin-top: 149px;margin-left: 95px;'";

    if(($subcategory_id !=95))
    {
        $front_handle_style = "style='background-repeat: no-repeat;height: 55px; margin-top: 49px;width: 295px;transform:translateZ(55px) translateY(-157px) translateX(8px) rotateX(368deg)'";
    }
    else
    {
        $front_handle_style = "";
    }

    if($subcategory_id ==52)
    {
        $front_handle_style = "";
    }

    $front_bag_image_id = "pouches_big_id";
    $front_bag_image_style ="style='width: 184px;margin-left: 61px;transform: translateZ(53px);height: 273px;background-size: 184px 273px;bottom: 72px;'";
    $parent_bag_front_id = "wine_bag_big_parent_div_other";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "";
}
else if($subcategory_id==58)
{ 
    $active_product = 'envelope_medium';
//$("#parent_bag_container").append($("#envelope_medium").show());
//echo "<script type='text/javascript'>alert('envelope_medium');<script>";

    $main_id = "envelope_medium";
    $main_div_style="style='margin-top: 147px;'";
    $front_handle_style = "";
    $front_bag_image_id = "envelope_medium_id";
    $front_bag_image_style ="style='height: 192px;width:266px;background-size: 266px 192px;transform: translateY(-64px) translateZ(44px) translateX(-27px);overflow: hidden;'";
    $parent_bag_front_id = "envelope_medium_parent_div";

    $bottom_style = "style='border-bottom: 16px solid #d7dbdb;border-left: 15px solid transparent;
    border-right: 15px solid transparent;height: 55px;width:266px;transform: translateY(-119px) translateZ(42px) translateX(-27px);overflow: hidden;'";
    $left_id = "";
    $left_style = "style='display:none'";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "style='height: 192px;width:266px;background-size: 266px 192px;transform: translateY(-64px) translateZ(42px) translateX(-27px);overflow: hidden;'";
}
else if ($subcategory_id==58)
{
    $active_product = 'medical_bag_big';
//$("#parent_bag_container").append($("#medical_bag_big").show());  
//echo "<script type='text/javascript'>alert('medical_bag_big');<script>";
}
else if ($subcategory_id==59)
{
    $active_product = 'files_folder_big';
//$("#parent_bag_container").append($("#files_folder_big").show());  
//echo "<script type='text/javascript'>alert('files_folder_big');<script>";

    $main_id = "files_folder_big";
    $main_div_style="style='margin-top: 142px;'";
    $front_handle_style = "";
    $front_bag_image_id = "files_folder_big_id";
    $front_bag_image_style ="style='width: 171px;margin-left: 61px;transform: translateZ(55px) rotateY(-23deg);height: 237px;background-size: 171px 237px;bottom: 88px;'";
    $parent_bag_front_id = "files_folder_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "wine_bag_big_back";
    $back_style = "style='width: 171px;transform: translateX(59px) translateZ(-22px) rotateY(211deg);height: 237px;bottom: 89px;background-size: 171px 237px;'";
}
else if($subcategory_id==60)
{ 
    $active_product = 'sticker_horizontal_big';
//$("#parent_bag_container").append($("#sticker_horizontal_big").show());
//echo "<script type='text/javascript'>alert('sticker_horizontal_big');<script>";

    $main_id = "sticker_horizontal_big";
    $main_div_style="style='margin-top: 150px;'";
    $front_handle_style = "";
    $front_bag_image_id = "sticker_horizontal_big_id";
    $front_bag_image_style ="style='height: 220px;width:312px;background-size: 312px 220px;transform: translateY(-64px) translateZ(44px) translateX(-27px);overflow: hidden;'";
    $parent_bag_front_id = "sticker_horizontal_big_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "";
}
else if ($subcategory_id==60)
{
    $active_product = 'sticker_vertical_big';
//$("#parent_bag_container").append($("#sticker_vertical_big").show());  
//echo "<script type='text/javascript'>alert('sticker_vertical_big');<script>";
}
else if($subcategory_id==61)
{ 
    $active_product = 'pamplet_horizontal_big';
//$("#parent_bag_container").append($("#pamplet_horizontal_big").show());
// echo "<script type='text/javascript'>alert('pamplet_horizontal_big');<script>";

    $main_id = "pamplet_horizontal_big";
    $main_div_style="style='margin-top: 142px;'";
    $front_handle_style = "";
    $front_bag_image_id = "pamplet_horizontal_big_id";
    $front_bag_image_style ="style='width: 207px;margin-left: 61px;transform: translateZ(33px) rotateY(-12deg);height: 237px;background-size: 207px 237px;bottom: 89px;'";
    $parent_bag_front_id = "pamplet_horizontal_big_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "";
}
else if ($subcategory_id==61)
{
    $active_product = 'pamplet_big';
//$("#parent_bag_container").append($("#pamplet_big").show());  
//echo "<script type='text/javascript'>alert('pamplet_big');<script>";
}
else if($subcategory_id==87)
{
    if($width[0]>$height[0])
    {
        $active_product = 'address_horizontal_big'; 
//echo "<script type='text/javascript'>alert();alert('address_horizontal_big');<script>";
    }
    else
    {
        $active_product = 'address_vertical_big';  
//echo "<script type='text/javascript'>alert('address_vertical_big');<script>";

        $main_id = "address_vertical_big";
        $main_div_style="style='margin-top: 142px;'";
        $front_handle_style = "";
        $front_bag_image_id = "address_vertical_big_id";
        $front_bag_image_style ="style='width: 207px;margin-left: 61px;transform: translateZ(33px) rotateY(-9deg);height: 178px;bottom: 89px;background-size: 207px 178px;'";
        $parent_bag_front_id = "address_vertical_big_parent_div";

        $bottom_style = "";
        $left_id = "";
        $left_style = "";
        $right_id = "";
        $right_style = "";
        $back_handle_id = "";
        $back_handle_style = "";
        $back_id = "";
        $back_style = "";
    }

}
else if($subcategory_id==82 || $subcategory_id==83)
{ 
    if($width>$height)
    {
        $active_product = 'tags_small';
//$("#parent_bag_container").append($("#tags_small").show());
//echo "<script type='text/javascript'>alert('tags_small');<script>";
    }
    else
    {
        $active_product = 'tags_big';
//$("#parent_bag_container").append($("#tags_big").show()); 
//echo "<script type='text/javascript'>alert('tags_big');<script>";

        $main_id = "tags_big";
        $main_div_style="style='margin-top: 120px;margin-left: 82px;'";
        $front_handle_style = "style='background-repeat: no-repeat;height: 55px;width: 205px;transform: translateZ(33px) translateY(-137px) translateX(46px);'";
        $front_bag_image_id = "tags_big_id";
        $front_bag_image_style ="style='width: 219px;margin-left: 61px;transform: translateZ(33px) rotateY(-9deg);height: 243px;background-size: 219px 243px;bottom: 21px;'";
        $parent_bag_front_id = "tags_big_parent_div";

        $bottom_style = "";
        $left_id = "";
        $left_style = "";
        $right_id = "";
        $right_style = "";
        $back_handle_id = "";
        $back_handle_style = "'";
        $back_id = "";
        $back_style = "";
    }

}
else if ($subcategory_id==84)
{    
    $active_product = 'bookmark_big';
//$("#parent_bag_container").append($("#bookmark_big").show());
// echo "<script type='text/javascript'>alert('bookmark_big');<script>";

    $main_id = "bookmark_big";
    $main_div_style="style='margin-top: 142px;'";
    $front_handle_style = "";
    $front_bag_image_id = "tissue_paper_big_id";
    $front_bag_image_style ="style='width: 116px;margin-left: 61px;transform: translateZ(33px) rotateY(-9deg);height: 260px;bottom: 89px;background-size: 116px 260px;'";
    $parent_bag_front_id = "bookmark_big_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "";
}
else if ($subcategory_id==85)
{
    $active_product = 'suitcover_big';
//$("#parent_bag_container").append($("#suitcover_big").show());  
//echo "<script type='text/javascript'>alert('suitcover_big');<script>";

    $main_id = "suitcover_big";
    $main_div_style="style='margin-top: 193px;margin-left: 95px;'";
    $front_handle_style = "";
    $front_bag_image_id = "suitcover_big_id";
    $front_bag_image_style ="style='width: 207px;margin-left: 61px;transform: translateZ(33px) rotateY(-9deg);height: 300px;bottom: 89px;background-size: 207px 300px;'";
    $parent_bag_front_id = "suitcover_big_parent_div";

    $bottom_style = "";
    $left_id = "";
    $left_style = "";
    $right_id = "";
    $right_style = "";
    $back_handle_id = "";
    $back_handle_style = "";
    $back_id = "";
    $back_style = "";
}
else if ($subcategory_id==50)
{
    $active_product = 'food_box_diff';
//$("#parent_bag_container").append($("#food_box_diff").show());  
//echo "<script type='text/javascript'>alert('food_box_diff50');<script>";
}
else if ($subcategory_id==78 || $subcategory_id==76 || $subcategory_id==77)
{
    $active_product = 'gift_box';
echo "<script type='text/javascript'>$('#parent_bag_container').append($('#gift_box').show())</script>";  
//echo "<script type='text/javascript'>alert('gift_box');<script>";
}
else if ($subcategory_id==75)
{  
    if($width>$height)
    {   
        
        $adjustWidth = 10*($width/$height);
        
        $active_produ = 'shipping_box';
        $main_id = "shipping_box";
        $main_div_style="";
        $front_handle_style = "shipping_box_front_handle";
        $front_bag_image_id = "shipping_box_id";
        $front_bag_image_style ="style='width: 300px;margin-left: -23px;transform: translateZ(69px);height: 142px;background-size: 300px 142px;'";
        $front_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(80px) translateY(2px) translateX(-23px) rotateX(165deg)'";

        $parent_bag_front_id = "food_box_diff_parent_div";

        $bottom_style_id = "shipping_box_bottom_ida";
        $bottom_style = "style='width: 300px;margin-left: -23px;transform: translateZ(0px) translateY(70px) translateX(0px) rotateX(90deg);height: 142px;background-size: 300px 142px;'";
        $left_id = "shipping_box_left";
        $left_style = "style='width: 142px;background-size: 142px 142px;height: 142px;left: 50%;margin-left: -45x;transform: rotateY(-90deg) translate3d(0px, 0px, 173px);'";
        $left_handle_id = "shipping_box_left_handle";
        $left_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-67px) translateX(-183px) rotateZ(165deg) rotateY(90deg)'";

        $right_id = "food_box_diff_right";
        $right_style = "style='width: 142px;margin-left: -44px;height: 142px;bottom: 39px;background-size: 142px 142px;'";
        $right_handle_id = "shipping_box_right_handle";
        $right_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-64px) translateX(190px) rotateZ(15deg) rotateY(90deg)'";

        $back_handle_id = "shipping_box_back_handle";
        $back_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(-80px) translateY(-66px) translateX(-23px) rotateX(15deg)'";
        $back_id = "shipping_box_back";
        $back_style = "style='background-size: 300px 142px;width: 300px;transform: translateX(-23px) translateZ(-70px) rotateY(180deg);height: 142px;bottom: 38px;'";

/*
YOOOOOOOOOOOO this is a base 


        $active_produ = 'shipping_box';
        $main_id = "shipping_box";
        $main_div_style="";
        $front_handle_style = "shipping_box_front_handle";
        $front_bag_image_id = "shipping_box_id";
        $front_bag_image_style ="style='width: 300px;margin-left: 61px;transform: translateZ(69px);height: 142px;background-size: 300px 142px;bottom: 128px;'";
        $front_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(80px) translateY(-84px) translateX(60px) rotateX(165deg)'";

        $parent_bag_front_id = "food_box_diff_parent_div";

        $bottom_style = "";
        $left_id = "shipping_box_left";
        $left_style = "style='width: 142px;background-size: 142px 142px;height: 142px;left: 50%;margin-left: -45x;transform: rotateY(-90deg) translate3d(0px, -90px, 90px);'";
        $left_handle_id = "shipping_box_left_handle";
        $left_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-156px) translateX(-100px) rotateZ(165deg) rotateY(90deg)'";

        $right_id = "food_box_diff_right";
        $right_style = "style='width: 142px;margin-left: 41px;height: 142px;bottom: 128px;background-size: 142px 142px;'";
        $right_handle_id = "shipping_box_right_handle";
        $right_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-156px) translateX(273px) rotateZ(15deg) rotateY(90deg)'";

        $back_handle_id = "shipping_box_back_handle";
        $back_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(-80px) translateY(-156px) translateX(60px) rotateX(15deg)'";
        $back_id = "shipping_box_back";
        $back_style = "style='background-size: 300px 142px;width: 300px;transform: translateX(61px) translateZ(-71px) rotateY(180deg);height: 142px;bottom: 128px;'";


*/

    }
    elseif($width<$height)
    {
        
        $adjustWidth = 10*($width/$height);
        
        $active_produ = 'shipping_box';
        $main_id = "shipping_box";
        $main_div_style="";
        $front_handle_style = "shipping_box_front_handle";
        $front_bag_image_id = "shipping_box_id";
        $front_bag_image_style ="style='width: 300px;margin-left: -23px;transform: translateZ(69px);height: 142px;background-size: 300px 142px;'";
        $front_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(80px) translateY(2px) translateX(-23px) rotateX(165deg)'";

        $parent_bag_front_id = "food_box_diff_parent_div";
        
    //bottom
        $bottom_style_id = "shipping_box_bottom_ida";
        $bottom_style = "style='width: 300px;margin-left: -23px;transform: translateZ(0px) translateY(70px) translateX(0px) rotateX(90deg);height: 142px;background-size: 300px 142px;'";
        
        //Left height was 142px
        $left_id = "shipping_box_left";
        $left_style = "style='width: 142px;background-size: 142px 142px;height: 284px;left: 50%;margin-left: -45x;transform: rotateY(-90deg) translate3d(0px, 0px, 173px);'";
        $left_handle_id = "shipping_box_left_handle";
        $left_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-67px) translateX(-183px) rotateZ(165deg) rotateY(90deg)'";
    
    //Right height was 142px
        $right_id = "food_box_diff_right";
        $right_style = "style='width: 142px;margin-left: -44px;height: 284px;bottom: 39px;background-size: 142px 142px;'";
        $right_handle_id = "shipping_box_right_handle";
        $right_handle_style = "style='background-size: 142px 70px;height: 70px;width: 142px;transform:translateZ(00px) translateY(-64px) translateX(190px) rotateZ(15deg) rotateY(90deg)'";
    
    //Handle
        $back_handle_id = "shipping_box_back_handle";
        $back_handle_style = "style='background-size: 300px 70px;height: 70px;width: 300px;transform:translateZ(-80px) translateY(-66px) translateX(-23px) rotateX(15deg)'";
        $back_id = "shipping_box_back";
        $back_style = "style='background-size: 300px 142px;width: 300px;transform: translateX(-23px) translateZ(-70px) rotateY(180deg);height: 142px;bottom: 38px;'";
        
        /*
        echo "large height";
        $active_produ = 'shipping_box';
        $main_id = "shipping_box";
        $main_div_style="style='";
        $front_handle_style = "";
        $front_bag_image_id = "shipping_box_id";
        $front_bag_image_style ="style='width: 185px;margin-left: 61px;transform: translateZ(85px);height: 142px;background-size: 185px 142px;bottom: 128px;'";
        $parent_bag_front_id = "food_box_diff_parent_div";

        $bottom_style = "";
        $left_id = "shipping_box_left";
        $left_style = "style='width: 176px;background-size: 176px 142px;height: 142px;left: 50%;margin-left: -57px;margin-top: 220px;transform: rotateY(-90deg) translate3d(-3px, 62px, 95px);'";
        $right_id = "food_box_diff_right";
        $right_style = "style='width: 176px;margin-left: -91px;height: 142px;bottom: 128px;background-size: 176px 142px;'";
        $back_handle_id = "shipping_box_handle";
        $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(-78px) translateY(-72px) translateX(101px);";
        $back_id = "shipping_box_back";
        $back_style = "style='background-size: 185px 142px;width: 185px;transform: translateX(61px) translateZ(-88px) rotateY(180deg);height: 142px;bottom: 128px;'";
        */
    }
    else
    {
        echo "same Width height";
        $active_produ = 'shipping_box';
        $main_id = "shipping_box";
        $main_div_style="style='";
        $front_handle_style = "";
        $front_bag_image_id = "shipping_box_id";
        $front_bag_image_style ="style='width: 185px;margin-left: 61px;transform: translateZ(85px);height: 142px;background-size: 185px 142px;bottom: 128px;'";
        $parent_bag_front_id = "food_box_diff_parent_div";

        $bottom_style = "";
        $left_id = "shipping_box_left";
        $left_style = "style='width: 176px;background-size: 176px 142px;height: 142px;left: 50%;margin-left: -57px;margin-top: 220px;transform: rotateY(-90deg) translate3d(-3px, -19px, 95px);'";
        $right_id = "food_box_diff_right";
        $right_style = "style='width: 176px;margin-left: -91px;height: 142px;bottom: 128px;background-size: 176px 142px;'";
        $back_handle_id = "shipping_box_handle";
        $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(74px) translateY(-137px) translateX(101px);'";
        $back_id = "shipping_box_back";
        $back_style = "style='background-size: 185px 142px;width: 185px;transform: translateX(61px) translateZ(-88px) rotateY(180deg);height: 142px;bottom: 128px;'";
    }
}
else if ($subcategory_id==86)
{
    $active_product = 'cake_box';
//$("#parent_bag_container").append($("#cake_box").show());  
//echo "<script type='text/javascript'>alert('cake_box');<script>";
}
else if ($subcategory_id==49 || $subcategory_id==48)
{
    $active_product = 'food_box_diff';
//$("#parent_bag_container").append($("#food_box_diff").show());  
//echo "<script type='text/javascript'>alert('food_box_diff49');<script>";

    $main_id = "food_box_diff";
    $main_div_style="style='margin-top: 0px;transform: translateY(-197px);'";
    $front_handle_style = "";
    $front_bag_image_id = "food_box_diff_id";
    $front_bag_image_style ="style='width: 185px;margin-left: 61px;transform: translateZ(85px);height: 142px;background-size: 185px 142px;bottom: 128px;'";
    $parent_bag_front_id = "food_box_diff_parent_div";

    $bottom_style = "";
    $left_id = "food_box_diff_left";
    $left_style = "style='width: 176px;background-size: 176px 142px;height: 142px;left: 50%;margin-left: -57px;margin-top: 220px;transform: rotateY(-90deg) translate3d(-3px, 62px, 95px);'";
    $right_id = "food_box_diff_right";
    $right_style = "style='width: 176px;margin-left: -91px;height: 142px;bottom: 128px;background-size: 176px 142px;'";
    $back_handle_id = "food_box_diff_handle";
    $back_handle_style = "style='background-repeat: no-repeat;height: 64px;width: 148px;transform: translateZ(74px) translateY(-137px) translateX(101px);'";
    $back_id = "food_box_diff_back";
    $back_style = "style='background-size: 185px 142px;width: 185px;transform: translateX(61px) translateZ(-88px) rotateY(180deg);height: 142px;bottom: 128px;'";
} 
?>



<!-- umesh code-->
<?php if($main_id==""){}else{?>
<div class="space3d paper_product hide_this_div" id="<?php echo $main_id;?>" <?php echo $main_div_style; ?> > 
    <div class="_3dbox">
        <?php 
        if($subcategory_id==49 || $subcategory_id==48)
        {
            ?>
            <div class="" id="" style="width: 176px;height: 55px;left: 50%;margin-left: -57px;margin-top: -78px;transform: rotateY(-90deg) translate3d(-3px, 16px, -13px) rotateX(-41deg);overflow:hidden;border-style: solid;border-width: 0 27.5px 55px 27.5px;border-color: transparent transparent rgba(221, 221, 221, 0.67) transparent;"></div>
            <div class="_3dface _3dface--right" id="food_box_diff_right" style="width: 176px;margin-left: -91px;height: 142px;bottom: 128px;background-size: 330px 142px;"></div>
            <div class="" id="" style="width: 176px;height: 55px;left: 50%;margin-left: -57px;margin-top: -148px;transform: rotateY(-90deg) translate3d(-1px, 107px, -232px) rotateX(43deg);overflow:hidden;border-style: solid;border-width: 0 27.5px 55px 27.5px;border-color: transparent transparent rgba(221, 221, 221, 0.67)  transparent;"></div> 
            <div class="" id="" style="width: 176px;height: 55px;left: 50%;margin-left: -57px;margin-top: -148px;transform: rotateY(0deg) translate3d(123px, 196px, -100px) rotateX(28deg);overflow:hidden;border-style: solid;border-width: 0 27.5px 55px 27.5px;border-color: transparent transparent rgba(221, 221, 221, 0.67)  transparent;"></div> 
            <div class="" id="" style="width: 182px;height: 55px;left: 50%;margin-left: -57px;margin-top: -148px;transform: rotateY(0deg) translate3d(119px, 289px, 92px) rotateX(-16deg);overflow:hidden;border-style: solid;border-width: 0 27.5px 55px 27.5px;border-color: transparent transparent rgba(221, 221, 221, 0.67)  transparent;"></div> 
            <?php                    
        }
        ?>
        <?php if($front_handle_style != ''){?>
        <div class="_3dface--front_handle" <?php echo $front_handle_style;?>>
        </div>  
        <?php } ?> 
           <?php if($front_bag_image_style==""){}else{?>
        <div class="_3dface _3dface--top front_bag_image" id="<?php echo $front_bag_image_id;?>"  <?php echo $front_bag_image_style;?> >      
            <div id="<?php echo $parent_bag_front_id;?>" style="" class ="parent_bag_front cropped_image_div" onMouseOut="rmvcls('<?php echo $parent_bag_front_id;?>')" onMouseOver="adcls('<?php echo $parent_bag_front_id;?>')">
                <p class="bag_labels" id="1" style="z-index:1;color:white; font-size:15px;left: 10px; top: 10px;" onClick="show_property('1')" ondrag="caculate_label_co_ordinates(1)"></p>
                <p class="bag_labels" id="2" style="z-index:1;color:white; font-size:15px;left: 10px; top: 29px;" onClick="show_property('2')" ondrag="caculate_label_co_ordinates(2)"></p>
                <p class="bag_labels" id="3" style="z-index:1;color:white; font-size:15px;left: 10px; top: 51px;" onClick="show_property('3')" ondrag="caculate_label_co_ordinates(3)"></p>
                <p class="bag_labels" id="4" style="z-index:1;color:white; font-size:15px;left: 10px; top: 71.7px;" onClick="show_property('4')" ondrag="caculate_label_co_ordinates(4)"></p>
                <p class="bag_labels" id="5" style="z-index:1;color:white; font-size:15px;left: 10px; top: 90.7px;" onClick="show_property('5')" ondrag="caculate_label_co_ordinates(5)"></p>
                <div id="resizable" style="line-height: 0; top: 0px;" ondrag="calculate_image_co_ordinates()" onresize="calculate_image_co_ordinates()">
                    <img id="" src="" class="cropped_image " height="100%" width="100%" alt="Greenhandle">
                </div>
            </div>
        </div>
<?php } ?>
        <?php   if($bottom_style !=''){ ?>
            <div class="_3dface _3dface--bottom" id="<?php echo $bottom_style_id;?>" <?php echo $bottom_style;?>></div>  
        <?php }  if($left_style !=''){ ?>
            <div class="_3dface _3dface--left left_bag_image" id="<?php echo $left_id?>" <?php echo $left_style;?>></div>      
        <?php }  if($left_handle_style!=''){ ?>
            <div class="_3dface _3dface--left bag_handle_image" id="<?php echo $left_handle_id; ?>" <?php echo $left_handle_style; ?>></div>      
        <?php } if($right_style !=''){ ?>
            <div class="_3dface _3dface--right left_bag_image" id="<?php echo $right_id?>" <?php echo $right_style;?>></div>
        <?php }  if($right_handle_style !=''){ ?>
            <div class="_3dface _3dface--right bag_handle_image" id="<?php echo $right_handle_id; ?>" <?php echo $right_handle_style; ?>></div>      
        <?php } if($back_handle_style !=''){ ?>
            <div class="_3dface--back_handle bag_handle_image" id="<?php echo $back_handle_id?>" <?php echo $back_handle_style;?>></div>      
        <?php } if($back_style !=''){  ?>
            <div class="_3dface _3dface--back back_bag_image" id=" <?php echo $back_id?>" <?php echo $back_style;?> ></div>  
        <?php } ?> 
</div>  
</div>
<?php  } ?>
<!--   onmouseout="rmvcls('<?php echo $back_id;?>')" onmouseover="adcls('<?php echo $back_id;?>')"
<script src="<?php echo base_url();?>js/jquery-1.10.2.js"></script> -->
<script type="text/javascript">
$(function(){
    $('.lable1').removeAttr('style','position');
    $('.lable1').css('position','relative');
    $('.lable1').css('z-index',1);
    
    $('.lable2').removeAttr('style','position');
    $('.lable2').css('position','relative');
    $('.lable2').css('z-index',1);
    
    $('.lable3').removeAttr('style','position');
    $('.lable3').css('position','relative');
    $('.lable3').css('z-index',1);
    
    $('.lable4').removeAttr('style','position');
    $('.lable4').css('position','relative');
    $('.lable4').css('z-index',1);
    
    $('.lable5').removeAttr('style','position');
    $('.lable5').css('position','relative');
    $('.lable5').css('z-index',1);



    var width = $.trim($("#width").attr('value'));
    var height = $.trim($("#height").attr('value'));
    var gusset = $.trim($("#gusset").attr('value'));

    var sub_cat_type = $("#sub_cat_type").attr('value');
    var bag_text_id = $("#bag_text_img").attr('value');
    var handle_type_data = $("#handle_type_data").attr('value');
    var handle_text_id = $("#handle_text_img").attr('value');

    if(bag_text_id == 0)
    {
        bag_text_id ="upload/texture/non_black.png";
    }

    if(sub_cat_type == 101)
    {
        bag_text_id ="/upload/texture/counter_black.jpg";
    }

    if(sub_cat_type == 100)
    {
        bag_text_id ="/upload/texture/news.png";
    }

    var bag_texture = '<?php echo base_url()?>'+bag_text_id;
    var handle_texture = '<?php echo base_url()?>'+handle_text_id; 

    if(handle_text_id == '')
    {
        $('.front_bag_image').css('background-image',"url("+bag_texture+")");
        $('.left_bag_image').css('background-image',"url("+bag_texture+")");
        $('._3dface--right').css('background-image',"url("+bag_texture+")");
        $('.back_bag_image').css('background-image',"url("+bag_texture+")");
        $('._3dface--bottom').css('background-image',"url("+bag_texture+")");
    }
    else
    {
        $('.front_bag_image').css('background-image',"url("+bag_texture+")");
        $('.left_bag_image').css('background-image',"url("+bag_texture+")");
        $('._3dface--right').css('background-image',"url("+bag_texture+")");
        $('.back_bag_image').css('background-image',"url("+bag_texture+")");
        $('._3dface--front_handle').css('background-image',"url("+handle_texture+")");
        $('.bag_handle_image').css('background-image',"url("+handle_texture+")");
        $('._3dface--bottom').css('background-image',"url("+bag_texture+")");
    }

    if (sub_cat_type==0 || sub_cat_type==2 || sub_cat_type==9 || sub_cat_type==79 || 
        sub_cat_type==88 || sub_cat_type==98 || sub_cat_type==80 || sub_cat_type==10 || 
        sub_cat_type==15 || sub_cat_type==96 || sub_cat_type==16 || sub_cat_type==99 || 
        sub_cat_type==100 )
    {  
        if(gusset == "")
        {
            $("#active_product").attr('value','medical_bag_with_handle_medium');
            $("#parent_bag_container").append($("#medical_bag_with_handle_medium").show());
        }
        else if(parseInt(width)<parseInt(height))
        {
            if (handle_type_data=='D-cut')
            {
                $(".parent_bag_front").css('height','204px');
                $(".parent_bag_front").css('margin-top','51px'); 
            }
            if (sub_cat_type==96 && handle_type_data=='Rope')
            {
                $("._3dface--front_handle").css('background-size','170px 100px');
                $("._3dface--front_handle").css('transform','translateZ(43px) translateY(-4px) translateX(12px)');
                $(".bag_handle_image").css('background-size','170px 100px'); 
                $(".bag_handle_image").css('transform','translateY(-152px) translateZ(-42px) translateX(9px)'); 
                $("#active_product").attr('value','cotton_bag_vertical_big');
                $("#parent_bag_container").append($("#cotton_bag_vertical_big").show());
            }
            else
            {
                $("#active_product").attr('value','paper_bag_horizontal_big');
                $("#parent_bag_container").append($("#paper_bag_horizontal_big").show());
                $("#active_product").attr('value','paper_bag_vertical_big');
                $("#parent_bag_container").append($("#paper_bag_vertical_big").show());
            }
        }
        else
        {
            if (handle_type_data=='D-cut')
            {
                $("#paper_horizontal_big_parent_div").css('height','186px');
                $("#paper_horizontal_big_parent_div").css('margin-top','45px');
                $("#paper_horizontal_big_parent_divv").css('height','186px');
                $("#paper_horizontal_big_parent_divv").css('margin-top','45px');
            }
            if (sub_cat_type==96 && handle_type_data=='Rope')
            {
                $("._3dface--front_handle").css('background-size','170px 100px');
                $("._3dface--front_handle").css('transform','translateZ(43px) translateY(-4px) translateX(12px)');
                $(".bag_handle_image").css('background-size','170px 100px'); 
                $(".bag_handle_image").css('transform','translateY(-152px) translateZ(-42px) translateX(9px)'); 
                $("#active_product").attr('value','cotton_bag_vertical_big');
                $("#parent_bag_container").append($("#cotton_bag_vertical_big").show());
            }
            else
            { 
                 $("#active_product").attr('value','paper_bag_vertical_big');
                $("#parent_bag_container").append($("#paper_bag_vertical_big").show());
               $("#active_product").attr('value','paper_bag_horizontal_big');
                $("#parent_bag_container").append($("#paper_bag_horizontal_big").show());
            }
        }
    }
    else if((sub_cat_type==3 ) || (sub_cat_type==101 ))
    {

        if(gusset == "")
        {
            $("#active_product").attr('value','grocery_bag_big_no_gusset');   
            $("#parent_bag_container").append($("#grocery_bag_big_no_gusset").show());
        }
        else
        {
            $("#active_product").attr('value','grocery_bag_big');   
            $("#parent_bag_container").append($("#grocery_bag_big").show());
        }


    }
    else if (sub_cat_type==11 || sub_cat_type==12)
    { 
        if(parseInt(width)<parseInt(height))
        { 
            $("#active_product").attr('value','jute_bag_vertical_big');
            $("#parent_bag_container").append($("#jute_bag_vertical_big").show());
        }
        else
        {  
            $("#active_product").attr('value','jute_horizontal_big');
            $("#parent_bag_container").append($("#jute_horizontal_big").show());
        }
    }

    else if (sub_cat_type==97)
    {
        if(parseInt(width)<parseInt(height))
        {
            if (handle_type_data=='D-cut')
            {

                $("#jute_bag_vertical_div  ").css('margin-top','45px');
                $("#jute_bag_vertical_div  ").css('height','212px');
            }
            $("#active_product").attr('value','jute_bag_vertical_big');
            $("#parent_bag_container").append($("#jute_bag_vertical_big").show());
        }
        else
        {
            $("#active_product").attr('value','jute_horizontal_big');
            $("#parent_bag_container").append($("#jute_horizontal_big").show());
        }
    }
    else if (sub_cat_type==13 || sub_cat_type==14)
    {
        if(parseInt(width)<parseInt(height))
        {
            var imageUrl = base_url+"/upload/texture/black_cotton.jpg";
            $('#cotton_bag_id').css('background-image', 'url(' + imageUrl + ')');
            $('#cotton_bag_left').css('background-image', 'url(' + imageUrl + ')');
            $('#cotton_bag_right').css('background-image', 'url(' + imageUrl + ')');
            $('.back_bag_image').css('background-image', 'url(' + imageUrl + ')');
            $("#active_product").attr('value','cotton_bag_vertical_big');
            $("#parent_bag_container").append($("#cotton_bag_vertical_big").show());
        }
        else
        {
            $("#active_product").attr('value','cotton_bag_horizontal_big');
            $("#parent_bag_container").append($("#cotton_bag_horizontal_big").show());
        }
    }
    else if (sub_cat_type==5 || sub_cat_type==89)
    { 
        $("#active_product").attr('value','wine_bag_big');   
        $("#parent_bag_container").append($("#wine_bag_big").show());
    }
    else if (sub_cat_type==6 || sub_cat_type==10)
    {  
        $("#active_product").attr('value','medical_bag_with_handle_big');    
        $("#parent_bag_container").append($("#medical_bag_with_handle_big").show());   
    }
    else if (sub_cat_type==7)
    {

        $("#active_product").attr('value','box_bag_big');   
        $("#parent_bag_container").append($("#box_bag_big").show());

    }
    else if (sub_cat_type==4)
    {

        $("#active_product").attr('value','counter_bag_vertical_big');   
        $("#parent_bag_container").append($("#counter_bag_vertical_big").show());

    }
    else if(sub_cat_type==8)
    {   
        $("#active_product").attr('value','basket_bag_big');
        $("#parent_bag_container").append($("#basket_bag_big").show()); 
    }
    else if(sub_cat_type==52 || sub_cat_type==53 || sub_cat_type==54 || sub_cat_type==55 || sub_cat_type==56 || sub_cat_type==57 || sub_cat_type==95)
    { 
        $("#active_product").attr('value','pouches_big');
        $("#parent_bag_container").append($("#pouches_big").show());
    }
    else if(sub_cat_type==58)
    { 
        $("#active_product").attr('value','envelope_medium');
        $("#parent_bag_container").append($("#envelope_medium").show());
    }
    else if (sub_cat_type==58)
    {
        $("#active_product").attr('value','medical_bag_big');
        $("#parent_bag_container").append($("#medical_bag_big").show());  
    }
    else if (sub_cat_type==59)
    {
        $("#active_product").attr('value','files_folder_big');
        $("#parent_bag_container").append($("#files_folder_big").show());  
    }
    else if(sub_cat_type==60)
    { 
        $("#active_product").attr('value','sticker_horizontal_big');
        $("#parent_bag_container").append($("#sticker_horizontal_big").show());
    }
    else if (sub_cat_type==60)
    {
        $("#active_product").attr('value','sticker_vertical_big');
        $("#parent_bag_container").append($("#sticker_vertical_big").show());  
    }
    else if(sub_cat_type==61)
    { 
        $("#active_product").attr('value','pamplet_horizontal_big');
        $("#parent_bag_container").append($("#pamplet_horizontal_big").show());
    }
    else if (sub_cat_type==61)
    {
        $("#active_product").attr('value','pamplet_big');
        $("#parent_bag_container").append($("#pamplet_big").show());  
    }
    else if(sub_cat_type==87)
    {
        if(parseInt(width)>parseInt(height))
        {
            $("#active_product").attr('value','address_horizontal_big'); 
            $("#parent_bag_container").append($("#address_horizontal_big").show());
        }
        else
        {
            $("#active_product").attr('value','address_vertical_big');
            $("#parent_bag_container").append($("#address_vertical_big").show());  
        }

    }
    else if(sub_cat_type==82 || sub_cat_type==83)
    { 
        if(parseInt(width)<parseInt(height))
        {
            $("#active_product").attr('value','tags_small');
            $("#parent_bag_container").append($("#tags_small").show());
        }
        else
        {
            $("#active_product").attr('value','tags_big');
            $("#parent_bag_container").append($("#tags_big").show()); 
        }

    }
    else if (sub_cat_type==84)
    {    
        $("#active_product").attr('value','bookmark_big');
        $("#parent_bag_container").append($("#bookmark_big").show());
    }
    else if (sub_cat_type==85)
    {
        $("#active_product").attr('value','suitcover_big');
        $("#parent_bag_container").append($("#suitcover_big").show());  
    }
    else if (sub_cat_type==50)
    {
        $("#active_product").attr('value','food_box_diff');
        $("#parent_bag_container").append($("#food_box_diff").show());  
    }
    else if (sub_cat_type==78 || sub_cat_type==76 || sub_cat_type==77)
    {
        $("#active_product").attr('value','gift_box');
        $("#parent_bag_container").append($("#gift_box").show());  
    }
    else if (sub_cat_type==75)
    { 
        if(parseFloat(width)<parseFloat(height))
        {
            $("#active_product").attr('value','shipping_box');
            $("#parent_bag_container").append($("#shipping_box").show());
        }
        else
        {
            $("#active_product").attr('value','shipping_box');
            $("#parent_bag_container").append($("#shipping_box").show()); 
        }

    }
    else if (sub_cat_type==86)
    {
        $("#active_product").attr('value','cake_box');
        $("#parent_bag_container").append($("#cake_box").show());  
    }
    else if (sub_cat_type==49 || sub_cat_type==48)
    {
        $("#active_product").attr('value','food_box_diff');
        $("#parent_bag_container").append($("#food_box_diff").show());  
    }

});

function caculate_label_co_ordinates(label_id) 
{
    if($('.bag_labels#'+label_id).text() != '')
    {
        var avoid = "px";
        var div_height = parseInt($('.cropped_image_div').height()+1); //adjust for border
        var div_width = parseInt($('.cropped_image_div').width());

        var label_height = $('.bag_labels#'+label_id).height();
        var label_width = $('.bag_labels#'+label_id).width();

        var label_position = $('#'+label_id).position();
        // top bottom
        var label_top = label_position.top;

        var handle_type = $('#handle_type_data').val();
        if(handle_type == 'D-cut')
        {
        var label_margin_top = label_top-10-label_height;// 10 is margin top
        label_margin_top = label_margin_top-32;
        }
        else
        {
        var label_margin_top = label_top-10-label_height;// 10 is margin top
        }

        if(label_margin_top <= 0)
        {
            label_margin_top = 0;
        }



        var label_margin_bottom = (parseInt(div_height)-1) - (parseInt(label_margin_top)+parseInt(label_height));

        if(label_margin_bottom <= 0)
        {
            label_margin_bottom = 0;
        }

        var label_margin_top_perc = (((parseInt(label_margin_top)/div_height))*100).toFixed(2); 
        var label_margin_bottom_perc = (((parseInt(label_margin_bottom)/div_height))*100).toFixed(2); 
        // right left 


        var label_margin_left = $('#'+label_id).offset().left  - $('#'+label_id).parent().offset().left  - $('#'+label_id).parent().scrollTop();


        label_margin_left = parseInt(label_margin_left)-10;
        if(label_margin_left <= 0)
        {
            label_margin_left = 0;
        }
        var label_margin_right = parseInt(div_width) - (parseInt(label_margin_left)+parseInt(label_width) );
        if(label_margin_right <= 0)
        {
            label_margin_right = 0;
        }


        var label_margin_left_perc = (((parseInt(label_margin_left)/div_width))*100).toFixed(2); 
        var label_margin_right_perc = (((parseInt(label_margin_right)/div_width))*100).toFixed(2); 

        //alert('#text'+label_id+'_margin_left_perc');

        $('#text'+label_id+'_margin_left_perc').val(label_margin_left_perc);
        $('#text'+label_id+'_margin_top_perc').val(label_margin_top_perc);
        $('#text'+label_id+'_margin_right_perc').val(label_margin_right_perc);
        $('#text'+label_id+'_margin_bottom_perc').val(label_margin_bottom_perc);
    }
}
</script>
 <script type="text/javascript" src="<?php echo base_url('js/jquery-ui.1.12.0.js')?>"></script>
<style>
#overlay {position: fixed;left: 550px;top: 300px;width: 100%;height: 100%;z-index: 9999;}
</style>
<body class="common-home page-home layout-fullwidth ">
<script>
$(window).load(function(){
   $('#overlay').fadeOut();
});

</script>

<?php 
global $sec_id;global $subcat_id;global $category_id;global $is_customizable;
if (isset($section_id)) {
    $sec_id = $section_id;
}
if (isset($sub_cat_id)) {
    $subcat_id = $sub_cat_id;
}
if (isset($cat_id)) {
    $category_id = $cat_id;
}
?>
<input type="hidden" id="is_custom" value="<?php echo $sec_id;?>">
<style>
.cropper-crop-box
{
    min-width: 15px;
    min-height: 15px;
}


@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
/*#loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 51%;
    height: 100%;
    background: #222222;
    z-index: 1000;
}
 
#loader-wrapper .loader-section.section-left {
    left: 0;
}
 
#loader-wrapper .loader-section.section-right {
    right: 0;
}
#loader {
    z-index: 1001; /* anything higher than z-index: 1000 of .loader-section 
}*/
h1 {
    color: #EEEEEE;
}
</style>
<style>
.separator {
    margin-top: 40px;
}
.twitter {
    color: #FFF;
    text-decoration: none;
    border-radius: 4px;
    background: #00ACED;
    display: inline-block;
    padding: 10px 8px;
    margin-bottom: 15px;
    font-weight: bold;
}

/* 3D Cube */
.space3d {
    perspective: 1000px;
    width: 250px;
    height: 250px;
    text-align: center;
    display: inline-block;
    margin-left: 0px;
    margin-top: 117px;
    margin:0 auto;
}

._3dbox {
    display: inline-block;
    transition: all 0.85s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    text-align: center;
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transform: rotateX(-15deg) rotateY(15deg);
}

._3dface {
    overflow: hidden;
    position: absolute;
    /* border: 1px solid #888;*/

    /* box-shadow: inset 0 0 60px rgba(0, 0, 0, 0.1), 0 0 50px rgba(0, 0, 0, 0.3);*/
    color: #333;
    line-height: 250px;
    opacity: 0.8;
}

._3dface--front {
    width: 208px;
    height: 141px;
    transform: translate3d(0, 0, 125px);
}

._3dface--front_handle {
    width: 194px;
    height: 64px;
    transform: rotateX(90deg) translate3d(0, 0, 119px);
    transform: translateZ(45px);
    height: 141px;
}

._3dface--back_handle {
    width: 194px;
    height: 64px;
    transform: rotateX(90deg) translate3d(0, 0, 119px);
    transform: translateZ(45px);
    height: 141px;
}

._3dface--top {
    width: 194px;
    /* height: 241px;*/
    transform: rotateX(90deg) translate3d(0, 0, 119px);
    transform: translateZ(45px);
    height: 141px;
}

._3dface--bottom {
    width: 194px;
    height: 102px;
    transform: rotateX(-90deg) translate3d(0, 0, 86px);
}

._3dface--left {
    width: 90px;
    height: 141px;
    left: 50%;
    margin-left: -45px;
    transform: rotateY(-90deg) translate3d(0, 0, 125px);
}

._3dface--right {
    width: 90px;
    height: 141px;
    left: 50%;
    margin-left: -100px;
    transform: rotateY(90deg) translate3d(0, 0, 124px);
}

._3dface--back {
    width: 194px;
    height: 141px;
    transform: rotateY(180deg) translate3d(0, 0, 44px);
}

@keyframes spin {
    from { transform: rotateY(0); }
    to { transform: rotateY(360deg); }
}
.bx-prev{
    z-index:1 !important;
    position: relative !important;
    left: -972px !important;
    bottom: -165px !important;
}

.bx-next{
    z-index:1 !important;
    position: relative !important;
    right: -18px !important;
    bottom: -165px !important;
}
 
/*._3dface_back_handle {
width: 194px;
height: 64px;
transform: rotateY(180deg) translate3d(0, 0, 44px) translateY(-72px);
}*/

/*
#radio-left:checked + .radio1 ~ .space3d ._3dbox {
transform: rotateY(90deg);
}

#radio-right:checked + .radio2 ~ .space3d ._3dbox {
transform: rotateY(-90deg);
}

#radio-bottom:checked + .radio3 ~ .space3d ._3dbox {
transform: rotateX(90deg);
}

#radio-top:checked + .radio4 ~ .space3d ._3dbox {
transform: rotateX(-90deg);
}

#radio-back:checked + .radio1 ~ .space3d ._3dbox {
transform: rotateY(180deg);
}*/

/*.radios .radio{
background-color:#c5e043;
display:inline-block;   
}*/


input[type=radio]{
    display:none
}

.radios input[type=radio]:checked + .radio{
    background-color:#241009
}

.ui-icon-gripsmall-diagonal-se{
    background-image: none;
}
.qty-decrease{border: 0;
   
    background: #fff;
    text-align: center;
    /*font-size: 20px;*/
    position: relative;
   margin: 7px;
   /* float: left;*/
    outline: none;
    cursor: pointer;
	margin-left:13px;}
	.qty-increase{border: 0;
   
    background: #fff;
    text-align: center;
   /* font-size: 20px;*/
    position: relative;
   margin: 7px;
   /* float: left;*/
    outline: none;
    cursor: pointer; margin-right:3px;}
</style>
<script src="<?php echo base_url();?>js/scripts.js"></script>
<!--<script src="<?php echo base_url();?>js/jquery-1.10.2.js"></script>-->
<script type="text/javascript" src="<?php echo base_url();?>lib/imgareaselect/jquery.imgareaselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>lib/imgareaselect/css/imgareaselect-default.css" />

<script type="text/javascript">
$(function() { 

    if($("#associated_sec_id").attr('value') == 2 || $("#associated_sec_id").attr('value') == 3) 
    { 

        $("#three_sixty").hide();
        $("#cust_properties1").hide();
        $("#fieldtextproperty2").hide();
        $("#radios").hide();
        /*$("#key_dec").show();*/
        $("#customize_bag_size").hide();
        $("#customize_bag_size_lable").hide();
    }
    else if($("#associated_sec_id").attr('value') == 0 || $("#associated_sec_id").attr('value') == 1)
    {
       /* $("#key_dec").hide();*/
        $("#three_sixty").show();
        $("#cust_properties1").show();
        $("#fieldtextproperty2").show();
        $("#customize_bag_size").show();
        $("#customize_bag_size_lable").show();
    }
    if($("#associated_sec_id").attr('value') == 1)
    {
        if($("#category_id").attr('value') == 8 || $("#category_id").attr('value') == 7 || $("#sub_cat_id").attr('value') == 79 || $("#sub_cat_id").attr('value') == 80 || $("#sub_cat_id").attr('value') == 97)
        {
            $("#bag_multi_color").show();
            $("#color_bag").show();
        }
        else
        {
            $("#bag_multi_color").hide();
            $("#color_bag").hide();
        }
        $("#handle_color_range").hide();
        $("#gusset_color_range").hide();
        $("#color_handle").hide();
        $("#color_gusset").hide();
    }

    var id = $('.photo_container').attr('id');
    $('#Preview').on('click', function(){
        var id_value = $('#active_product').attr('value');
        $('#myproduct_preview').html($("#"+id_value).clone());
    });
/*$('#modal-container-176045').on('shown.bs.modal',function(){
        $("#"+id_value+':last').css('border','solid 0px');
});*/

    $('.photo_container').draggable({
        containment:"parent",
    });
    $("#bag_fixed_size").val($("#bag_size").attr('value')+"/inch");

    var id_value = $('#active_product').attr('value');
    var sub_id_val = $('#'+id_value).find('.front_bag_image').attr('id');
    $('#customize_bag_size').text(Math.round($('#'+sub_id_val).width()*0.264583) +" * "+Math.round($('#'+sub_id_val).height()*0.264583)+" /mm");

    $('.photo_container').mousemove(function(){
        var elem = $(this);
        if(elem.parent().attr('id') == 'medical_bag_with_handle_medium_parent_div')
            { var remove_tp = 3.1544189453125; var remove_ol = 2; }
        else { var remove_tp = 2;  var remove_ol = 1.5200042724609375; }

        var lft_mrgn = (elem.offset().left - elem.parent().offset().left) - parseInt(remove_ol);
        if (lft_mrgn<0) { lft_mrgn = 0; }
        var lft_mrgn_percnt = (parseInt(lft_mrgn)/(elem.parent().width()+2))*100;       
        $('#left_preview_margin').val(lft_mrgn_percnt+"%");

        var rgt_mrgn = (elem.parent().width() - (lft_mrgn + elem.width())) - parseInt(remove_ol);
        if (rgt_mrgn<0) { rgt_mrgn = 0; }
        var rgt_mrgn_percnt = (parseInt(rgt_mrgn)/(elem.parent().width()+2))*100;       
        $('#right_preview_margin').val(rgt_mrgn_percnt+"%");

        var top_mrgn = (elem.offset().top - elem.parent().offset().top)-parseInt(remove_tp);
        if (top_mrgn<0) { top_mrgn = 0; }
        var top_mrgn_percnt = (parseInt(top_mrgn)/(elem.parent().height()+2))*100;       
        $('#top_preview_margin').val(top_mrgn_percnt+"%");

        var btm_mrgn = (elem.parent().height() - (top_mrgn + elem.height()))-parseInt(remove_tp);
        if (btm_mrgn<0) { btm_mrgn = 0; }
        var btm_mrgn_percnt = (parseInt(btm_mrgn)/(elem.parent().height()+2))*100;       
        $('#bottom_preview_margin').val(btm_mrgn_percnt+"%");
        $('#image_size').val(($(this).width())+'w*'+($(this).height())+'h');


$('.imgDisplayarea').css('width',$(".newarea").css("width"));
$('.imgDisplayarea').css('height',$(".newarea").css("height"));
// $('#priview_product').css('width',$(".newarea").css("width"));
$('.imgDisplayarea').css('height',$(".newarea").css("height"));
$('#priview_product').css('width',$(".newarea").css("width"));
$('#priview_product').css('height',$(".newarea").css("height"));
$('#priview_product').css('left',$(".photo_container").css("left"));
$('#priview_product').css('top',$(".photo_container").css("top"));
$('#priview_product').css('background-image','url('+img_url+')');
});

$('.lable1').mouseup(function(){
    $(this).css('cursor','all-scroll');
    var lable_1 = $(this).position();
    console.log(lable_1);
    if($('.lable1').text() !=undefined)
    {
// $('#product_lable_1').attr('value',$('.lable1').text());
$('#product_lable_1_top').val(Math.round(lable_1.left*0.264583));
$('#product_lable_1_left').val(Math.round(lable_1.top*0.264583));
}
});
$('.lable2').mouseup(function(){
    $(this).css('cursor','all-scroll');
    var lable_2 = $(this).position();
    console.log($('.lable2').text());
    if($('.lable2').text() !=undefined)
    {

$('#product_lable_2_top').val(Math.round(lable_2.left*0.264583));
$('#product_lable_2_left').val(Math.round(lable_2.top*0.264583));
}
});
$('.lable3').mouseup(function(){
    $(this).css('cursor','all-scroll');
    var lable_3 = $(this).position();
    console.log(lable_3);
    if($('.lable3').text() !=undefined)
    {
        
$('#product_lable_3_top').val(Math.round(lable_3.left*0.264583));
$('#product_lable_3_left').val(Math.round(lable_3.top*0.264583));
}
});
$('.lable4').mouseup(function(){
    $(this).css('cursor','all-scroll');
    var lable_4 = $(this).position();
    //console.log(lable_4);
    if($('.lable4').text() !=undefined)
    {
        
$('#product_lable_4_top').val(Math.round(lable_4.left*0.264583));
$('#product_lable_4_left').val(Math.round(lable_4.top*0.264583));
}
});
$('.lable5').mouseup(function(){
    $(this).css('cursor','all-scroll');
    var lable_5 = $(this).position();
    //console.log(lable_5);
    if($('.lable5').text() !=undefined)
    {
        
$('#product_lable_5_top').val(Math.round(lable_5.left*0.264583));
$('#product_lable_5_left').val(Math.round(lable_5.top*0.264583));
}
});

});

</script>
<link rel="stylesheet" href="<?php echo base_url();?>css/colorpicker.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url();?>css/layout.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/eye.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/utils.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/layout.js?ver=1.0.2"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.bxslider.css" type="text/css" />
<script src="<?php echo base_url();?>js/bxslider/jquery.bxslider.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $('#slider5').bxSlider({
        slideWidth: 250,
        minSlides: 2,
        maxSlides: 4,
        moveSlides: 1,
        slideMargin: 10
    });
});
</script>

<style type="text/css">
.circleBase {border-radius: 30%;behavior: url(PIE.htc); /* remove if you don't care about IE8 */}
.type1 {width: 106px;height: 91px;text-align: center; vertical-align: middle;background-color: #fff; margin-left:-28px;border: 1px solid #e4e4e4;}
.f{float: left;font-family: 'Poppins';padding: 9px 27px;border-radius: 0px;border: 1px solid #d0cdcd; background-color: #f9f9f9;}
.photo_container:hover .jcrop-hline .jcrop-vline{visibility: visible;}
.jcrop-hline .jcrop-vline{visibility: hidden; }
.type{width: 80px; height: 80px;margin-left:-28px;border: 1px solid #e4e4e4;  }  
</style>


<!-- scripts all required -->
<script type="text/javascript"> 

jQuery(function () {
    jQuery("#add_to_cart").click(function () {
        $("#itemadded").show();
    });
});
</script>
<div id="demo-content">
<!--div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div-->    
</div>
<div id="content" style="padding:0px;">
<input type="hidden" id="section_id" class="section_id" value="<?php echo $sec_id;?>">
    <div class="container">



   
        <div class="alert alert-success" id="success_msg" style="display:none;" role="alert">Item added successfully to your cart.</div>
        
<!--shree-->

        <?php
        $linkArr= explode('/',$this->uri->uri_string());
            echo '<div style="display:none;"> sadsadsadsadsa '.ucfirst(str_replace("-"," ",$this->uri->segment(2))).'</div>';
            $category ="";
            if(strpos($linkArr[1],"-")){
                $stringArr=explode('-',$linkArr[1]);
                $words = sizeof($stringArr);
                for($i=0;$i<=sizeof($words);$i++){
                    $category .= " ".ucfirst($stringArr[$i]);
                }
            }else{
                $category .= " ".ucfirst($linkArr[1]);
            } 
        ?>
        <br>
        <ol class="breadcrumb hidden-xs" style="margin-bottom: -35px;     background-color: transparent;     padding: 18px 15px 0px;" >
        <!--<li class="breadcrumb-item " style="font-size:13px;"><?php foreach($section_name as $row){echo $row['section_name'];}?></li-->
        <!--li class="breadcrumb-item " style="font-size:13px;"><?php foreach ($page_data4 as $row){echo $row['cat_name'];}?></li>-->


        <li><a href="<?php echo base_url(); ?>" class="breadcrumb-item " style="font-size:13px;color: #607d8b;">Home</a></li>


        <li class="breadcrumb-item " style="font-size:13px;color: #607d8b;">
            <a href="<?php echo base_url().$this->uri->segment(1);?>" style="color: #607d8b;"><?php echo $sec_nm; ?></a></li>
        <li><a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2); ?>" class="breadcrumb-item " style="font-size:13px;color: #607d8b;"><?php echo $category; ?></a></li>
<!--<li class="breadcrumb-item " style="font-size:13px;">
            <a href="<?php echo base_url().$this->uri->segment(1);?>" style="color: #607d8b;">
                <?php echo $sec_nm; ?>
            </a>

        </li>

<li class="breadcrumb-item " style="font-size:13px;">
            <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2);?>" style="color: #607d8b;">
                <?php echo $category; ?>
            </a>
        </li>-->


<li class="breadcrumb-item active" style="font-size:13px;">
        <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);?>" style="color: #607d8b;">
        <?php foreach($sub_cat_details as $row){echo $row['sub_cat_name'];}?>
        </a>
        </li>

<li class="breadcrumb-item active" id="bd" style="font-size:13px; color:#607d8b;">
        <?php echo $product_details['0']['prod_name']; ?>
        </li>



        <!--<li class="breadcrumb-item active" style="font-size:13px; color:#607d8b;"><?php foreach($sub_cat_details as $row){echo $row['sub_cat_name'];}?></li>-->

        </ol>
        
        <!-- <div class="col-md-12" id="rmd_brdm">
        <div class="brdcrm">
            <ul style>
                <li><?php foreach($section_name as $row){echo $row['section_name'];}?></li>
                <li> <?php foreach ($page_data4 as $row){echo $row['cat_name'];}?></li>
                <li><?php foreach($sub_cat_details as $row){echo $row['sub_cat_name'];} ?></li>
            </ul>
        </div>
        </div> -->
        <div class="title clearfix">
            <!--h2><?php  foreach($page_data5 as $row){echo $row['prod_name'];}?></h2-->
            
        </div>
        <div class="modal fade" id="modal-container-976962" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">               
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span> ×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Quick View
                        </h4>
                    </div>
                    <div class="modal-body" style="height: 516px;">
                        <div style="width: 426px; float:left;">
                            <ul class="slides">
                                <?php foreach($page_data5 as $row) { ?>
                                <li> <img src="<?php echo base_url().'upload/products/'.$row['prod_image1'] ?>" style="max-width: 317px; max-height: 390px;  padding-right: 18px;" id="display_image_view" alt="Greenhandle" /> </li>                         
                                <?php } ?>
                            </ul>
                        </div>
                        <?php if(isset($page_data5['0']['prod_image1']) && $page_data5['0']['prod_image1']!='') { ?><div class="type" style="float: right;margin-top:0px;margin-right: 16px; "><?php if (isset($page_data5['0']['prod_image1'])) {?> 
                        <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" style="width:100%; height:100%;" class="front" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" alt="Greenhandle" /><?php }?></div><?php } ?>
                        <?php if(isset($page_data5['0']['prod_image2']) && $page_data5['0']['prod_image2']!='') { ?><div class="type" ><?php if (isset($page_data5['0']['prod_image2'])) {?> 
                        <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>" alt="greenhandle" style="width:100%; height:100%;" class="back" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>"/><?php }?></div><?php } ?>

                        <?php if(isset($page_data5['0']['prod_image3']) && $page_data5['0']['prod_image3']!='') { ?><div class="type" ><?php if (isset($page_data5['0']['prod_image3'])) {?> 
                        <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>"/><?php }?></div><?php } ?>
                        <?php if(isset($page_data5['0']['prod_image4']) && $page_data5['0']['prod_image4']!='') { ?><div class="type" ><?php if (isset($page_data5['0']['prod_image4'])) {?> 
                        <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4'] ?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4']?>"/><?php }?></div><?php } ?>            
                    </div>
                    <script type="text/javascript">
                    $('.left').click(function(){
                        var img = this.id;
                        //console.log(img);
                        $('#display_image_view').attr('src', img);
                    });
                    $('.back').click(function(){
                        var img = this.id;
                        //console.log(img);
                        $('#display_image_view').attr('src', img);
                    });
                    $('.front').click(function(){
                        var img = this.id;
                        //console.log(img);
                        $('#display_image_view').attr('src', img);
                    });
                    $('.right').click(function(){
                        var img = this.id;
                        //console.log(img);
                        $('#display_image_view').attr('src', img);
                    });
                    </script>
                </div>

            </div>

        </div>
       

        <div class="pro_main_c">
            <div class="row" style="margin-right: 0px;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  bounceInLeft" >
                    <div class="row">
                        <div class="col-md-2">
                        <tr>
                                      <!-- pawanmore -->
                            <div class="col-xs-12" >
                              <?php if(isset($page_data5['0']['prod_image1']) && $page_data5['0']['prod_image1']!='') { ?><div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image1'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" style="width:100%; height:100%;" class="front" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" alt="Greenhandle" /><?php }?></div><?php } ?>
                                    <?php if(isset($page_data5['0']['prod_image2']) && $page_data5['0']['prod_image2']!='') { ?>

                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image2'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>" alt="greenhandle" style="width:100%; height:100%;" class="back" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>"/><?php }?></div><?php } ?>

                                    <?php if(isset($page_data5['0']['prod_image3']) && $page_data5['0']['prod_image3']!='') { ?>
                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image3'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>"/><?php }?></div><?php } ?>
                                    <?php if(isset($page_data5['0']['prod_image4']) && $page_data5['0']['prod_image4']!='') { ?>
                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image4'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4'] ?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4']?>"/><?php }?></div><?php } ?>
                            </div>
                        </tr>
                        </div>
<div class="col-md-10">
<div class="dotted clearfix">
<style type="text/css">
.prevw{margin:15px 15px 5px 5px;display: block;}
.dotted {  <?php if($section_id == 0 || $section_id == 1){  ?>
height:578px;padding: 0px 0px;background-image: -webkit-repeating-radial-gradient(center center, rgba(0,0,0,.08), rgba(0,0,0,.08) 1px, transparent 1px, transparent 100%);
background-image: -moz-repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
background-image: -ms-repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
background-image: repeating-radial-gradient(center center, rgba(0,0,0,.1), rgba(0,0,0,.1) 1px, transparent 1px, transparent 100%);
-webkit-background-size: 3px 3px;
-moz-background-size: 3px 3px;
background-size: 5px 5px;
background-color: #fff;
<?php } else {?>    
background-color: #fff;  
height:auto;
padding: 0px 0px;
<?php } ?>
}
 }
</style>

<div class="clearfix" id="image-block">
<span>
<div id="slider-product" class="flexslider">
<script type="text/javascript">
$(function(){
if($("#associated_sec_id").attr('value') == 0 || $("#associated_sec_id").attr('value') == 1){
}else if($("#associated_sec_id").attr('value') == 2 || $("#associated_sec_id").attr('value') == 3){
$("#view_quick").css('top','-8px');
}
});
</script>
<!-- <input type="hidden" id="associated_sec_id" value="<?php if (isset($sec_id)) { echo $sec_id;}?>">-->                                   
<input type="hidden" id="associated_sec_id" value="<?php if (isset($sec_id)) { echo $sec_id;}?>">
<!--img src="<?php //echo base_url();?>images/threesixty_view.jpg" style="margin-left: 454px;margin-top: -5px;height: 50px;width: 50px;cursor:pointer" id="three_sixty"-->
<div class="row" style="margin-left:-1px;">
<?php if($section_id == 2 || $section_id == 3){  } else {?>
<div class="front" onClick="st_rst('frt')"for="radio-bottom" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>"><button class="btn f" >FRONT</button></div>
<div class="back" onClick="st_rst('nf')"for="radio-front" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>"><button class="btn f" >BACK</button></div>
<div class="left hidden-xs" onClick="st_rst('nf')"for="radio-left" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>"><button class="btn f" >LEFT</button></div>
<div class="right hidden-xs" onClick="st_rst('nf')"for="radio-top" id="<?php echo base_url()."texture/handle.png" ?>"><button class="btn f" >RIGHT</button></div>
<div class=""><button class="btn f" id="three_sixty" > <span>360°</span></button></div><?php } ?>
</div>
<img style="width:1152px;height:960px;border: 1px solid;border-style: dashed;margin-top: 17px;display:none;" id="default_bag_container" alt="Greenhandle">
<div style="width:100%;height:auto; margin-top: 112px; " id="parent_bag_container"> 
<?php if($sec_id == 2 || $sec_id == 3)   { ?>
<div class="qaz">
<?php if(isset($page_data5['0']['prod_image1'])){ ?>
<img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1']; ?>" class="qazimg" alt="Greenhandle">
<?php }else{ ?>
<img src="<?php echo base_url().'upload/products/'; ?>" class="qazimg" alt="Greenhandle">
<?php } ?>
</div>
<?php } ?>
</div>
</div>
</span>
                               
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/html2canvas.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/canvas2image.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.plugin.html2canvas.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/html2canvas.min.js" title="http://www.nihilogic.dk/labs/canvas2image/base64.js"></script>
<input type="hidden" id="left_image">
<script type="text/javascript"> 
function cart_refresh(){
$.ajax({type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
url: '<?php echo base_url(); ?>add_to_cart/cart_refresh', // New_Add_to_Cart the url where we want to POST
data : '', // our data object
//dataType    : 'json', // what type of data do we expect back from the server
//encode: true
}).done(function(data) {// using the done promise callback
$('.cart_refresh').html(data);// $('.mobile_cart').html(data);
});
                                 
$.ajax({type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
url         : '<?php echo base_url(); ?>add_to_cart/cart_refresh_mobile', // New_Add_to_Cart the url where we want to POST
data        : '', // our data object
//dataType    : 'json', // what type of data do we expect back from the server
//encode: true
}).done(function(data) { // using the done promise callback
// $('.cart_refresh').html(data);
$('.mobile_cart').html(data);
});
}
                                
function reload_page(){ window.location.reload(true); }  

$(function() { 
// $("#cart_prod").mouseover(function(){$('.space3d ._3dbox').css("transform",'rotateY(0deg)');});
var image_data;

$("#cart_prod").click(function(){ 

  // var pid = $('#pid').val();// $(this).append(" &nbsp; <img src='<?php //echo base_url();?>images/ring-load-alt.gif' height='25px' width='25px'>");
if(($("#city_zipcode").val()==0)||($('#city_zipcode').val() == '' )){//if($('#ship_charge').text() == '0' || $('#ship_charge').text() == '' ){
$("#zipcode_not_entered").text('Please Enter Zipcode');
}else{
if($("#section_id").val() !=2 && $("#section_id").val() !=3){
	$("#load_me").hide();  
var imageData = $('#resizable img').attr('src');
if( imageData.length == 0){
$('#resizable img').attr('src','data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAAIAAgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKAP/2Q==');
var imageData ="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAAIAAgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKAP/2Q==";
}//$("#myModalAddToCart").modal("show");
console.log('customer_image and add to cart');
var response = customise_and_add_to_cart();//alert(response);//$('.loader').show();
 /*setTimeout(function() {//window.location.reload(true);  //location.reload(true);}, 3500);*/                                              
}else{               
console.log('Direct and add to cart');                          
// $("#myModalAddToCart").modal("show");
var pid = $('#pid').val();
//var ship_cost = jQuery('#ship_charge').text();
var product_id = $('#product_id').val();
var seller_id = $('#seller_id').val(); 
var ship_zhipcode= $('#city_zipcode').val(); 
//var product_price = parseFloat(jQuery('#product_price').val());
//var product_wise_total = parseFloat(jQuery('#product_wise_total').text());    
var product_quantity = parseFloat(jQuery('#mainvalue').val());    
var quantity_vspriceid=jQuery('#mainvalue').attr('lang');
//var qty_array = qty_data_id.split(',');
           // var qty1 = qty_array[1];
		//	var qpid = qty_array[2];
			//var seller_id = qty_array[3];
			//var prod_id = qty_array[4];

/*var data1 ={'product_id': product_id,'product_quantity': product_quantity,'product_price': product_price,'product_wise_total': product_wise_total,'seller_id' : seller_id,'ship_cost' : ship_cost,'ship_zhipcode' : ship_zhipcode }*/
var data1 = new FormData();
data1.append('pid',pid);
data1.append('product_id',product_id);
data1.append('product_quantity',product_quantity);
//data1.append('product_price',product_price);
//data1.append('product_wise_total',product_wise_total);
data1.append('seller_id',seller_id);
//data1.append('ship_cost',ship_cost);
data1.append('ship_zhipcode',ship_zhipcode);
data1.append('quantity_vspriceid',quantity_vspriceid);
console.log('carddata'.data1);
var formData = {'pid':pid,'product_type':'Normal','product_id': product_id,'product_quantity' :product_quantity ,'seller_id': seller_id,'ship_zhipcode': ship_zhipcode,'quantity_vspriceid':quantity_vspriceid};
$("#load_me").show();
console.log('formData',formData);
var base_url = window.location.origin;
$.ajax({type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
url: '<?php echo base_url(); ?>add_to_cart', // New_Add_to_Cart the url where we want to POST
data: formData, // our data object
dataType : 'json', // what type of data do we expect back from the server
encode: true
}).done(function(data) {// using the done promise callback// log data to the console so we can see
$("#load_me").hide();                         
//console.log('kiran',data)
//console.log('kiran',data.html)
// console.log(data.cart_counter);
// $('.cartcountpm').html(data.cart_counter);
//$('.carttablepm').html(data);
cart_refresh();
 // $('#badge').val(data.cart_counter);
$("#success_msg").fadeIn();
//  $(".pmdrop2").css("opacity", "1"); 
setTimeout(function () { $("#success_msg").fadeOut();/* $(".pmdrop2").css("opacity", "0"); $("#checkout_now").fadeOut();*/}, 2000);
//swal("Product added to cart!")// here we will handle errors and validation messages
});
} }
});
     
	 
	 
$("#cart_prodbuy").click(function(){ 

  // var pid = $('#pid').val();// $(this).append(" &nbsp; <img src='<?php //echo base_url();?>images/ring-load-alt.gif' height='25px' width='25px'>");
if(($("#city_zipcode").val()==0)||($('#city_zipcode').val() == '' )){//if($('#ship_charge').text() == '0' || $('#ship_charge').text() == '' ){
$("#zipcode_not_entered").text('Please Enter Zipcode');
}else{
if($("#section_id").val() !=2 && $("#section_id").val() !=3){
	$("#load_me").hide();  
var imageData = $('#resizable img').attr('src');
if( imageData.length == 0){
$('#resizable img').attr('src','data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAAIAAgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKAP/2Q==');
var imageData ="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgICAgMCAgIDAwMDBAYEBAQEBAgGBgUGCQgKCgkICQkKDA8MCgsOCwkJDRENDg8QEBEQCgwSExIQEw8QEBD/2wBDAQMDAwQDBAgEBAgQCwkLEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBD/wAARCAAIAAgDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9U6KKKAP/2Q==";
}//$("#myModalAddToCart").modal("show");
console.log('customer_image and add to cart');
var response = customise_and_add_to_cart();//alert(response);//$('.loader').show();
 /*setTimeout(function() {//window.location.reload(true);  //location.reload(true);}, 3500);*/                                              
}else{               
console.log('Direct and add to cart');                          
// $("#myModalAddToCart").modal("show");
var pid = $('#pid').val();
//var ship_cost = jQuery('#ship_charge').text();
var product_id = $('#product_id').val();
var seller_id = $('#seller_id').val(); 
var ship_zhipcode= $('#city_zipcode').val(); 
//var product_price = parseFloat(jQuery('#product_price').val());
//var product_wise_total = parseFloat(jQuery('#product_wise_total').text());    
var product_quantity = parseFloat(jQuery('#mainvalue').val());    
var quantity_vspriceid=jQuery('#mainvalue').attr('lang');
//var qty_array = qty_data_id.split(',');
           // var qty1 = qty_array[1];
		//	var qpid = qty_array[2];
			//var seller_id = qty_array[3];
			//var prod_id = qty_array[4];

/*var data1 ={'product_id': product_id,'product_quantity': product_quantity,'product_price': product_price,'product_wise_total': product_wise_total,'seller_id' : seller_id,'ship_cost' : ship_cost,'ship_zhipcode' : ship_zhipcode }*/
var data1 = new FormData();
data1.append('pid',pid);
data1.append('product_id',product_id);
data1.append('product_quantity',product_quantity);
//data1.append('product_price',product_price);
//data1.append('product_wise_total',product_wise_total);
data1.append('seller_id',seller_id);
//data1.append('ship_cost',ship_cost);
data1.append('ship_zhipcode',ship_zhipcode);
data1.append('quantity_vspriceid',quantity_vspriceid);
console.log('carddata'.data1);
var formData = {'pid':pid,'product_type':'Normal','product_id': product_id,'product_quantity' :product_quantity ,'seller_id': seller_id,'ship_zhipcode': ship_zhipcode,'quantity_vspriceid':quantity_vspriceid};
$("#load_me").show();
console.log('formData',formData);
var base_url = window.location.origin;
$.ajax({type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
url: '<?php echo base_url(); ?>add_to_cart', // New_Add_to_Cart the url where we want to POST
data: formData, // our data object
dataType : 'json', // what type of data do we expect back from the server
encode: true
}).done(function(data) {// using the done promise callback// log data to the console so we can see
$("#load_me").hide();                         
//console.log('kiran',data)
//console.log('kiran',data.html)
// console.log(data.cart_counter);
// $('.cartcountpm').html(data.cart_counter);
//$('.carttablepm').html(data);
cart_refresh();
//window.location('<?php  echo base_url(); ?>checkout');
 window.location="<?php  echo base_url(); ?>checkout";
 // $('#badge').val(data.cart_counter);
$("#success_msg").fadeIn();
//  $(".pmdrop2").css("opacity", "1"); 
setTimeout(function () { $("#success_msg").fadeOut();/* $(".pmdrop2").css("opacity", "0"); $("#checkout_now").fadeOut();*/}, 2000);
//swal("Product added to cart!")// here we will handle errors and validation messages
});
} }
});
	 
	 
	 
	                                
                                    
$("#buy_now").click(function(){ 
if($('#ship_charge').text() == '0' || $('#ship_charge').text() == '' ){
$("#zipcode_not_entered").text('Please enter Zipcode and calculate Shipping cost.');
}else{ 
if($("#section_id").val() !=2 && $("#section_id").val() !=3){   
var response = customise_and_add_to_cart();
/* setTimeout(function(){   //$('.loader').show();if(response == true){window.location.href = "<?php //echo base_url(); ?>checkout";}, 5000); */
}else{   
                                                $('.cart_top').hide();
                                                $('.cart_bot').show();
												var pid = $('#pid').val();
                                                var ship_cost = jQuery('#ship_charge').text();
                                                var product_id = $('#product_id').val();
                                                var seller_id = $('#seller_id').val(); 
                                                var ship_zhipcode= $('#city_zipcode').val(); 
                                                var product_quantity = parseFloat(jQuery('#mainvalue').val());
                                                var product_price = parseFloat($('#sell_price_per_piece').text());
                                                var product_wise_total = parseFloat(jQuery('#product_wise_total').text());    
                                                var refer_id_value = Math.random().toString(36).substring(1,9);
												var quantity_vsprice=$('#mainvalue').attr('lang');
                                              /* var data1 = {
                                                    'product_id': product_id,
                                                    'product_quantity': product_quantity,
                                                    'product_price': product_price,
                                                    'product_wise_total': product_wise_total,
                                                    'seller_id' : seller_id,
                                                    'ship_cost' : ship_cost,
                                                    'ship_zhipcode' : ship_zhipcode
                                                }*/
                                                var data1 = new FormData();
												data1.append('pid',pid);
                                                data1.append('product_id',product_id);
                                                data1.append('product_quantity',product_quantity);
                                                data1.append('product_price',product_price);
                                                data1.append('product_wise_total',product_wise_total);
                                                data1.append('seller_id',seller_id);
                                                data1.append('ship_cost',ship_cost);
                                                data1.append('ship_zhipcode',ship_zhipcode);
                                                data1.append('refer_id',refer_id_value);
                                                data1.append('quantity_vspriceid',quantity_vsprice);
                                                //var base_url = window.location.origin;
                                                $.ajax({
                                                    type: 'POST',
                                                    contentType: false,
                                                    cache: false,
                                                    async:false,
                                                    processData:false,
                                                    url: "<?php echo base_url(); ?>add_to_cart",
                                                    data: data1,
                                                    success: function(data) { 
                                                        //console.log(data); return;
                                                        window.location.href = "<?php echo base_url(); ?>checkout"; 
                                                    },
                                                });
                                                
                                            }
                                            $("#checkout_now").fadeIn();
                                        }
                                    });
                                    /*function dnt_use_this()
                                    {
                                        var ct = 
                                    }*/

                                    function customise_and_add_to_cart() { 
									  
                                    var pid = $('#pid').val();
                                    var date = new Date();
              var fileName = Math.ceil(Math.random()*10000)+'_'+date.getHours()+"_"+date.getMinutes()+"_"+date.getMilliseconds();
        ///////// Code For Lohit /////////
              var d = $('#resizable img').attr('src');
              var pid = $('#pid').val();
              var y = d.match(/.{1,506655}/g);
              var a = Object.keys(y).length;
            //  var date = new Date();
             // var fileName = Math.ceil(Math.random()*10000)+'_'+date.getHours()+"_"+date.getMinutes()+"_"+date.getMilliseconds();
              //for (var i = 0; i<a; i++) 
              {
                  var i = 0;
                var data2 = new FormData();
                data2.append('cropped_image',y[i]);
                data2.append('fileName',fileName);
                data2.append('infd',i);
                $.ajax(
                {
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    async:false,
                    processData:false,
                    url: "<?php echo base_url(); ?>customize/blb_tst",
                    data: data2, 
                    success : function(aaa) 
                    { 
//                          $("#success_msg").append(aaa+'<br><br><br><br>');
                            //location.reload(true); image_convert
                    }    
                });
            }   
        ///////// Code For Lohit /////////
        
                                        var response = false;
                                        var box_size = $("#bag_fixed_size").val(); 
                                        var image_size = $("#image_size").val(); 
                                        var right_margin = $("#image_margin_right_perc").val();
                                        var left_margin = $("#image_margin_left_perc").val();
                                        var top_margin = $("#image_margin_top_perc").val();
                                        var bottom_margin = $("#image_margin_bottom_perc").val();
                                        
                                        var lable_1_text = $(".bag_labels#1").html();
                                        var lable_1_left_margin = $("#text1_margin_left_perc").val();
                                        var lable_1_top_margin = $("#text1_margin_top_perc").val();
                                        var lable_1_bottom_margin = $("#text1_margin_bottom_perc").val();
                                        var lable_1_right_margin = $("#text1_margin_right_perc").val();

                                        var lable_2_text = $(".bag_labels#2").html();
                                        var lable_2_left_margin = $("#text2_margin_left_perc").val();
                                        var lable_2_top_margin = $("#text2_margin_top_perc").val();
                                        var lable_2_bottom_margin = $("#text2_margin_bottom_perc").val();
                                        var lable_2_right_margin = $("#text2_margin_right_perc").val();

                                        var lable_3_text = $(".bag_labels#3").html();
                                        var lable_3_left_margin = $("#text3_margin_left_perc").val();
                                        var lable_3_top_margin = $("#text3_margin_top_perc").val();
                                        var lable_3_bottom_margin = $("#text3_margin_bottom_perc").val();
                                        var lable_3_right_margin = $("#text3_margin_right_perc").val();

                                        var lable_4_text = $(".bag_labels#4").html();
                                        var lable_4_left_margin = $("#text4_margin_left_perc").val();
                                        var lable_4_top_margin = $("#text4_margin_top_perc").val();
                                        var lable_4_bottom_margin = $("#text4_margin_bottom_perc").val();
                                        var lable_4_right_margin = $("#text4_margin_right_perc").val();

                                        var lable_5_text = $(".bag_labels#5").html();
                                        var lable_5_left_margin = $("#text5_margin_left_perc").val();
                                        var lable_5_top_margin = $("#text5_margin_top_perc").val();
                                        var lable_5_bottom_margin = $("#text5_margin_bottom_perc").val();
                                        var lable_5_right_margin = $("#text5_margin_right_perc").val();
                                        var image = $("#default_bag_container").attr('src'); 
                                        var image_view = '';
//                                        alert(lable_1_left_margin+'  '+lable_1_top_margin+'  '+lable_1_bottom_margin+'    '+lable_1_right_margin);
//                                       return false;

                                        var cart_flag = false;
                                        if(image === undefined)
                                        {
                                            image_view = ' ';
                                        }
                                        else
                                        {
                                            image_view = $("#default_bag_container").attr('src');
                                        }
                                        var final_id = $('#active_product').attr('value');
                                        var product_id = $('#product_id').val();
                                        var seller_id = $('#seller_id').val();
                                        var current_div = $("#active_product").attr('value');
                                        var fron_view_color = $('.front_bag_image').css('background-image');
                                        var left_view_colr = $('.left_bag_image').css('background-image');
                                        var handle_view_color = $('.bag_handle_image').css('background-image');

                                        if($('.bag_labels#1').text()===undefined || $('.bag_labels#1').text()=="")
                                        {
                                            var font_specification1 = "none";
                                        }
                                        else
                                        {
                                            var font_color1 = $('.bag_labels#1').css('color');
                                            var font_size1 = $('.bag_labels#1').css('font-size');
                                            var font_family1 = $('.bag_labels#1').css('font-family');
                                            var fontWeight1 = $('.bag_labels#1').css('fontWeight');
                                            var font_style1 = $('.bag_labels#1').css('font-style');
                                            var text_decoration1 = $('.bag_labels#1').css('text-decoration');
                                            var font_specification1 = font_color1+','+' size: '+font_size1+',family :'+font_family1+', fontWeight: '+fontWeight1+',font_style1: '+font_style1+',text_decoration1'+text_decoration1;

                                        } 
                                        if($('.bag_labels#2').text()===undefined || $('.bag_labels#2').text()=="")
                                        {
                                            var font_specification2 = "none";
                                        }
                                        else
                                        {
                                            var font_color2 = $('.bag_labels#2').css('color');
                                            var font_size2 = $('.bag_labels#2').css('font-size');
                                            var font_family2 = $('.bag_labels#2').css('font-family');
                                            var fontWeight2 = $('.bag_labels#2').css('fontWeight');
                                            var font_style2 = $('.bag_labels#2').css('font-style');
                                            var text_decoration2 = $('.bag_labels#2').css('text-decoration');
                                            var font_specification2 = 'Color:'+font_color2+','+' size: '+font_size2+',family :'+font_family2+', fontWeight: '+fontWeight2+',font_style2: '+font_style2+',text_decoration2'+text_decoration2;
                                        }
                                        if($('.bag_labels#3').text()===undefined || $('.bag_labels#3').text()=="")
                                        {
                                            var font_specification3 = "none";
                                        }
                                        else
                                        {
                                            var font_color3 = $('.bag_labels#3').css('color');
                                            var font_size3 = $('.bag_labels#3').css('font-size');
                                            var font_family3 = $('.bag_labels#3').css('font-family');
                                            var fontWeight3 = $('.bag_labels#3').css('fontWeight');
                                            var font_style3 = $('.bag_labels#3').css('font-style');
                                            var text_decoration3 = $('.bag_labels#3').css('text-decoration');
                                            var font_specification3 = 'Color:'+font_color3+','+' size: '+font_size3+',family :'+font_family3+', fontWeight: '+fontWeight3+',font_style3: '+font_style3+',text_decoration3'+text_decoration3;
                                        }
                                        if($('.bag_labels#4').text()===undefined || $('.bag_labels#4').text()=="")
                                        {
                                            var font_specification4 = "none";
                                        }
                                        else
                                        {
                                            var font_color4 = $('.bag_labels#4').css('color');
                                            var font_size4 = $('.bag_labels#4').css('font-size');
                                            var font_family4 = $('.bag_labels#4').css('font-family');
                                            var fontWeight4 = $('.bag_labels#4').css('fontWeight');
                                            var font_style4 = $('.bag_labels#4').css('font-style');
                                            var text_decoration4 = $('.bag_labels#4').css('text-decoration');
                                            var font_specification4 = 'Color:'+font_color4+','+' size: '+font_size4+',family :'+font_family4+', fontWeight: '+fontWeight4+',font_style4: '+font_style4+',text_decoration4'+text_decoration4;
                                        }
                                        if($('.bag_labels#5').text()===undefined || $('.bag_labels#5').text()=="")
                                        {
                                            var font_specification5 = "none";
                                        }
                                        else
                                        {
                                            var font_color5 = $('.bag_labels#5').css('color');
                                            var font_size5 = $('.bag_labels#5').css('font-size');
                                            var font_family5 = $('.bag_labels#5').css('font-family');
                                            var fontWeight5 = $('.bag_labels#5').css('fontWeight');
                                            var font_style5 = $('.bag_labels#5').css('font-style');
                                            var text_decoration5 = $('.bag_labels#5').css('text-decoration');
                                            var font_specification5 = 'Color:'+font_color5+','+' size: '+font_size5+',family :'+font_family5+', fontWeight: '+fontWeight5+',font_style5: '+font_style5+',text_decoration5'+text_decoration5;
                                        }
                                        var current_div = $("#active_product").attr('value');
                                        var fron_view_id = $('.front_bag_image').attr('id');
                                        var left_view_id = $('.left_bag_image').attr('id');
                                        var handle_view_image = $('.bag_handle_image').attr('id');
                                        var full_image_class = $(".paper_product");

                                        $("#"+fron_view_id).html2canvas(
                                        {
                                            onrendered: function(canvas) 
                                            {
                                                document.body.appendChild(canvas);                                                
                                                image_data = canvas.toDataURL('image/png');
                                                $('#front_view_data').val(image_data);
                                            }
                                        });

                                        var left_image_data ="";
                                        
                                        if(left_view_id != "")
                                        {
                                            $("#"+left_view_id).html2canvas(
                                            { 
                                                onrendered: function(canvas) 
                                                { 
                                                    document.body.appendChild(canvas);                                                
                                                    var left_image_data = canvas.toDataURL('image/png');
                                                    $('#left_view_data').val(left_image_data);
                                                }
                                            });
                                        }
                                        
                                        var handle_image_data ="";
                                        
                                        if(handle_view_image !="")
                                        {
                                            $("#"+handle_view_image).html2canvas(
                                            {
                                                onrendered: function(canvas) 
                                                {
                                                    document.body.appendChild(canvas);                                                
                                                    var handle_image_data = canvas.toDataURL('image/png');
                                                    $('#handle_view_data').val(handle_image_data);
                                                }
                                            });
                                        }
                                        
                                        $("#parent_bag_container").html2canvas({ 
                                            onrendered: function(canvas) 
                                            {
//                                              document.body.appendChild(canvas);                                                
                                                var full_image_data = canvas.toDataURL('image/png');

                                                setTimeout(function() { 
                                                $('#new').attr('src',full_image_data);
                                                
                                                var full_view = $('#new').attr('src');
												var pid = $('#pid').val();
                                                var cropped_piece= $('#cropped_image_data').val();
                                                var preview_front_image = $("#preview_front_image").val();
                                                var product_quantity = parseFloat(jQuery('#mainvalue').val());    
                                                var product_price = parseFloat(jQuery('#product_price').val());
                                                var product_wise_total = parseFloat(jQuery('#product_wise_total').text()); 
                                                var ship_cost = jQuery('#ship_charge').text();  
                                                var ship_zhipcode= $('#city_zipcode').val();  
                                                var refer_id_value = Math.random().toString(36).substring(1,9);
												var quantity_vsprice=$('#mainvalue').attr('lang');
                                                var data1 = new FormData();
												data1.append('product_id',product_id);
                                                data1.append('pid',pid);
                                                data1.append('product_quantity',product_quantity);
                                                data1.append('product_price',product_price);
                                                data1.append('product_wise_total',product_wise_total);
                                                data1.append('seller_id',seller_id);
                                                data1.append('ship_cost',ship_cost);
                                                data1.append('ship_zhipcode',ship_zhipcode);
                                                data1.append('refer_id',refer_id_value);
                                                data1.append('quantity_vspriceid',quantity_vsprice);
                                                
                                                /*var data1 = 
                                                {
                                                    'product_id': product_id,
                                                    'product_quantity': product_quantity,
                                                    'product_price': product_price,
                                                    'product_wise_total': product_wise_total,
                                                    'seller_id' : seller_id,
                                                    'ship_cost' : ship_cost,
                                                    'ship_zhipcode' : ship_zhipcode,
                                                    'refer_id' : refer_id_value
                                                } */


                                                  var formData = {
                                                        'pid':pid,
                                                        'product_type':'customize',
                                                        'product_id'              : product_id,
                                                        'product_quantity'             :product_quantity ,
                                                        'product_price'    : product_price,
                                                        'product_wise_total'              : product_wise_total,
                                                        'seller_id'             : seller_id,
                                                        'ship_cost'    :ship_cost ,
                                                        'ship_zhipcode'    : ship_zhipcode,
                                                        'refer_id' : refer_id_value,
														'quantity_vspriceid' : quantity_vsprice,
                                                    };



                                   var base_url = window.location.origin;
                                   $("#load_me").show(); 
                                                     $.ajax({
                                                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                                        url         : '<?php echo base_url(); ?>add_to_cart', // the url where we want to POST
                                                        data        : formData, // our data object
                                                       dataType    : 'json', // what type of data do we expect back from the server
                                                        encode          : true
                                                    })  .done(function(data) {   
                                                console.log('custome image add to cart');
                                                
                                                
                                                var previewimage = $('#front_view_data').val();
                                                var left_image = $('#left_view_data').val();
                                                var handle_image = $('#handle_view_data').val();
                                                var data2 = new FormData();

                                                data2.append('cart_product_id',data.cart_product_id);
                                                data2.append('productid',product_id);
                                                data2.append('sellerid',seller_id);
                                                data2.append('boxsize','');
                                                data2.append('imagesize','');
                                                data2.append('rightmargin',right_margin);
                                                data2.append('leftmargin',left_margin);
                                                data2.append('topmargin',top_margin);
                                                data2.append('bottommargin',bottom_margin);
                                                data2.append('productimage',product_id);
                                                data2.append('previewimage',previewimage);

                                                data2.append('lable1text',lable_1_text);
                                                data2.append('lable1leftmargin',lable_1_left_margin);
                                                data2.append('lable1topmargin',lable_1_top_margin);
                                                data2.append('lable1bottommargin',lable_1_bottom_margin);
                                                data2.append('lable1rightmargin',lable_1_right_margin);

                                                data2.append('lable2text',lable_2_text);
                                                data2.append('lable2leftmargin',lable_2_left_margin);
                                                data2.append('lable2topmargin',lable_2_top_margin);
                                                data2.append('lable2bottommargin',lable_2_bottom_margin);
                                                data2.append('lable2rightmargin',lable_2_right_margin);

                                                data2.append('lable3text',lable_3_text);
                                                data2.append('lable3topmargin',lable_3_top_margin);
                                                data2.append('lable3leftmargin',lable_3_left_margin);
                                                data2.append('lable3bottommargin',lable_3_bottom_margin);
                                                data2.append('lable3rightmargin',lable_3_right_margin);

                                                data2.append('lable4text',lable_4_text);
                                                data2.append('lable4leftmargin',lable_4_left_margin);
                                                data2.append('lable4topmargin',lable_4_top_margin);
                                                data2.append('lable4bottommargin',lable_4_bottom_margin);
                                                data2.append('lable4rightmargin',lable_4_right_margin);

                                                data2.append('lable5text',lable_5_text);
                                                data2.append('lable5leftmargin',lable_5_left_margin);
                                                data2.append('lable5topmargin',lable_5_top_margin);
                                                data2.append('lable5bottommargin',lable_5_bottom_margin);
                                                data2.append('lable5rightmargin',lable_5_right_margin);
                                                data2.append('font1specification',font_specification1);
                                                data2.append('font2specification',font_specification2);
                                                data2.append('font3specification',font_specification3);
                                                data2.append('font4specification',font_specification4);

                                                data2.append('font5specification',font_specification5);
                                                data2.append('leftpreview',left_image);
                                                data2.append('handlepreview',handle_image);
                                                data2.append('full_image',full_view);
                                                //data2.append('cropped_image',cropped_piece);
                                                data2.append('refer_id',refer_id_value);
                                                data2.append('bag_color',fron_view_color);
                                                data2.append('handle_color',left_view_colr);
                                                data2.append('gusset_color',handle_view_color);
                                                data2.append('fileName',fileName);
                                               /*var data2 = 
                                                {
                                                    data2.append('product_id',product_id);

                                                    11
                                                    16
                                                    21
                                                    26

                                                    31
                                                    40

                                                    49
                                                }; */
                                                console.log(data2);
                                                
   var base_url = window.location.origin;
   $.ajax({type: 'POST',contentType: false,cache: false,async:false,processData:false,url: "<?php echo base_url(); ?>customize/image_convert",data: data2, 
   success : function(aaa){ 
   $("#success_msg").show();
   cart_refresh();
   $("#load_me").hide();//$("#success_msg").html(aaa); //  location.reload(true);
    }    
     });
    },);}, 1000);
    }});
    response = true;
    return response;
    }
    });
                                
                                
</script> 
<div id="mydiv">   

</div>
<br><br>

<script>
jQuery(function () {
jQuery('.space3d ._3dbox').css("transform",'rotateY(0deg)');
var front_element_id = $("#parent_id").attr('value');
jQuery(".right").click(function () {jQuery('.space3d ._3dbox').css("transform",'rotateY(90deg)');});
$('body').mousemove(function(){
var active_id = $('#active_product').prop('value');
var img_url = $(".newarea").attr("src");
jQuery('#default_bag_container').attr('src',img_url);
var parent_div_id = $('#'+active_id).closest('div').find('.parent_bag_front').prop('id');
$("._3dface--back").html($("#"+parent_div_id).clone());
});
$(".parent_bag_front").mouseover(function(){$("._3dface--back").html($(this).clone());});
jQuery(".back").click(function () { jQuery('.space3d ._3dbox').css("transform",'rotateY(180deg)');});        
jQuery(".left").click(function () { jQuery('.space3d ._3dbox').css("transform",'rotateY(-90deg)'); });
jQuery(".front").click(function () { jQuery('.space3d ._3dbox').css("transform",'rotateY(0deg)'); });
jQuery("#three_sixty").mouseover(function () { jQuery('._3dbox').css("animation",'spin 5s infinite linear');});
jQuery("#three_sixty").mouseout(function () {  jQuery('._3dbox').css("animation",'none');});
});
</script>
<style>
.abc{background: #fff;position: relative;box-shadow: 0 2px 2px rgba(11, 25, 28, 0.1); margin: 0 0 0px 0;border-radius: 5px;padding: 0;} 
</style>
<input type="hidden" id="order_details">
<input type="hidden" id="preview_front_image">
<!--lable id="customize_bag_size_lable">Customize Bags Size (w*h/ mm) : </lable><lable id="customize_bag_size"></lable-->
<!--div  width="118px" height="95px">
    <ul class="slides">      
        <li>
            <div id="radios">    
                <img src="<?php echo base_url()."texture/FRONT.png" ?>" class="front" onclick="st_rst('frt')"for="radio-bottom" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>" style="width: 94px;
    height: 89px;
   
    margin-right: 20px;
    margin-left: 20px;"/>
                <img src="<?php echo base_url()."texture/LEFT_view.png" ?>" class="left" onclick="st_rst('nf')"for="radio-left" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>" style="    width: 99px;
    height: 95px;
    margin-right: 20px;
}"/>
                <img src="<?php echo base_url()."texture/RIGHT.png" ?>" class="right" onclick="st_rst('nf')"for="radio-top" id="<?php echo base_url()."texture/handle.png" ?>" style="    width: 99px;
    height: 95px;
    margin-right: 20px;"/>
                <img src="<?php echo base_url()."texture/BACK.png" ?>" class="back" onclick="st_rst('nf')"for="radio-front" id="<?php echo base_url()."texture/bag_texture1.jpg" ?>" style="    width: 99px;
    height: 95px;
    margin-right: 20px;"/>
            </div>
        </li>     
    </ul>
</div-->
</div>


</div>

<!--div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="    margin-top: 12px;
    margin-bottom: 12px;
    background-color: #fff;
    padding: 10px;     box-shadow: 0 2px 2px rgba(11, 25, 28, 0.1); border-radius: 5px;"> 
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<div class="" align="center">
 <img src="<?php echo base_url();?>images/clk.png" style="height:40px; width:40px;"><br><span>6hr Cancellation Window</span>   
 </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="" align="center">
 <img src="<?php echo base_url();?>images/eco.png" style="height:40px; width:40px;"><br><span>Ecological <br>Products</span>   
 </div>  
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="" align="center">
 <img src="<?php echo base_url();?>images/secure.png" style="height:40px; width:40px;"><br><span>Secure Online<br> Payment</span>   
 </div>  
</div>
</div-->
 <style type="text/css">
                @media(min-width: 767.98px) { 
                    .hide_in_mobile{
                        display: none;
                    }
                }
            
        </style>
<div class="row">
            <!-- pawanmore -->
                            <div class="col-xs-12 hide_in_mobile" >
                              <?php if(isset($page_data5['0']['prod_image1']) && $page_data5['0']['prod_image1']!='') { ?><div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image1'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" style="width:100%; height:100%;" class="front" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image1'] ?>" alt="Greenhandle" /><?php }?></div><?php } ?>
                                    <?php if(isset($page_data5['0']['prod_image2']) && $page_data5['0']['prod_image2']!='') { ?>

                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image2'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>" alt="greenhandle" style="width:100%; height:100%;" class="back" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image2']?>"/><?php }?></div><?php } ?>

                                    <?php if(isset($page_data5['0']['prod_image3']) && $page_data5['0']['prod_image3']!='') { ?>
                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image3'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image3']?>"/><?php }?></div><?php } ?>
                                    <?php if(isset($page_data5['0']['prod_image4']) && $page_data5['0']['prod_image4']!='') { ?>
                                    <div class="type pmpop col-lg-6 col-md-6 col-sm-6 col-xs-6" ><?php if (isset($page_data5['0']['prod_image4'])) {?> 
                                    <img src="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4'] ?>" style="width:100%; height:100%;" class="left" alt="Greenhandle" id="<?php echo base_url().'upload/products/'.$page_data5['0']['prod_image4']?>"/><?php }?></div><?php } ?>
                            </div>  


</div>

                        </div>
                    </div>
                 </div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12   bounceInRight">
<?php if(($section_id==0)||($section_id==1)) {?>

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Customizable Click Here&nbsp;<i class="fa fa-angle-down" id="arrow"></i></button>
<?php } ?>
<div id="demo" class="collapse">
    <div class="abc" >
      <div class="tabing-animated" data-animation="bounceInUp"  id="cust_properties1" style="margin-bottom: 6px;">
        <ul class="nav nav-tabs nav-justified">
        <li class="active"><a href="#color" data-toggle="tab" style="font-family:Poppins;">COLOR</a></li>
         <li><a href="#imagee" data-toggle="tab" style="font-family:Poppins;">IMAGE</a></li>
        <li><a href="#textt" data-toggle="tab" style="font-family:Poppins;">TEXT</a></li>
        
        </ul> 

        <div class="tab-content" style="padding: 15px;">
            <div class="tab-pane active" id="color">
                <div class="row">
                  

                   
                       
<div class="color_bag" style=" padding:0px 23px 2px;">
<h4 style="font-size: 16px;">Product Color </h4><?php 
if ($sec_id==0) 
{ 
    if (isset($texture) && count($texture)>0) 
    { ?>
        <div id="bag_color_range" style="width: 75%; height: auto; padding:10px; background-color: #f3f7f7;"><?php 
        if (isset($texture)) 
        { 
            $cnt=0;
            foreach ($texture as $row)
            { ?>
                <i class="fa fa-circle bag_text<?php echo $cnt;?>" onClick="change_bag_texture(this.id)" id="bag_text<?php echo $cnt;?>,<?php echo base_url().$row['bag_texture'];?>,<?php echo $subcat_id;?>" style="color: <?php echo $row['color']?>;font-size: 30px;cursor:pointer"></i>&nbsp;<?php 
                $cnt++;
            }
        } ?>
        </div><?php 
    }
}
else if($sec_id==1)
{  
    $color_code = explode(',',$product_details['0']['prod_color']);
    foreach($color_code as &$valu){ $valu = strtolower($valu); }
    ?>
    <div id="bag_color_range" class="col-sm-12 col-xs-12" style="width: 75%; height: auto; padding:10px;background-color: #f3f7f7;"><?php 
    if (isset($texture)) 
    {
        $cnt=0;
        foreach ($texture as $row)
        {  
            foreach ($color_code as $row1)
            {
                if(strtolower($row['color']) == strtolower($row1))
                {  ?>
                    <i class="fa fa-circle bag_text<?php echo $cnt;?>" onClick="change_bag_texture(this.id)" id="bag_text<?php echo $cnt;?>,<?php echo base_url().$row['bag_texture'];?>,<?php echo $subcat_id;?>" style="color: <?php echo $row1?>;font-size: 28px;cursor:pointer"></i>&nbsp;<?php 
                    $cnt++;
                }
            }
        }
    } ?>
    </div><?php 
} ?>
</div>


<?php if ($subcat_id==11 || $subcat_id==12 || $subcat_id==96) {?>

<div class="color_gusset" style="padding:10px 23px 7px;"><?php
if ($subcat_id==11 || $subcat_id==12 || $subcat_id==96) 
{?>
    <h4 style="font-size: 16px;">Gusset Color</h4>
    <div id="gusset_color_range" style="width: 75%; height: auto; padding:10px; background-color: #f3f7f7;"> <?php
    if (isset($texture)) 
    {
        foreach ($texture as $row)
        { 
            $cnt=0;?>
            <i class="fa fa-circle gusset_text<?php echo $cnt;?>" onClick="change_gusset_texture(this.id)" id="gusset_text<?php echo $cnt;?>,<?php echo base_url().$row['bag_texture'];?>,<?php echo $subcat_id;?>" style="color: <?php echo $row['color']?>;font-size: 30px;"></i>&nbsp;<?php 
            $cnt++;
        }
    } ?>
    </div> <?php  
} ?>
</div>
<?php }?>

<?php if ($sec_id==0 && isset($texture_handle['0']['handle_texture']) && $texture_handle['0']['handle_texture']!='0') {?>
<div class="handle_texture" style=" padding:10px 23px 7px;">
   <h4 style="font-size: 16px;">Handle Color</h4><?php
    if ($sec_id==0) 
    {?>
        <div id="handle_color_range" style="width: 75%; height: auto; padding:10px;  background-color: #f3f7f7;"> <?php
        if (isset($texture)) 
        {
            foreach ($texture_handle as $row)
            { 
                $cnt=0;?>
                <i class="fa fa-circle handle_text<?php echo $cnt;?>" onClick="change_handle_texture(this.id)" id="handle_text<?php echo $cnt;?>,<?php echo base_url().$row['handle_texture'];?>,<?php echo $subcat_id;?>" style="color: <?php echo $row['color']?>;font-size: 30px;cursor:pointer"></i>&nbsp;<?php 
                $cnt++;
            }
        } ?>
        </div><?php 
    } ?>
</div>
<?php }?>



   </div>
</div>

            <div class="tab-pane" id="imagee">
                <div class="row">
               
               
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <span class="docs-buttons">
                            <label class="btn btn-upload" for="inputImage" title="Upload image file" style="width:118px;">
                                <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                                <span  id="crp" class="docs-tooltip" data-toggle="tooltip" ><img src="<?php echo base_url();?>images/photo.png"
                                    > <h4>Upload Image</h4>
                                    <span style="font-size: 12px;color:red;">Note: Upload <?php echo $print_color;?> color image</span>
                                </span>
                            </label>
                            <!--  
                                http://stackoverflow.com/questions/25874001/how-to-put-scrollbar-only-for-modal-body-in-bootstrap-modal-dialog
                            -->
                        <script>
                        $("#inputImage").change(function()
                        {
                           var val = $(this).val();
                            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase())
                            {
                                case 'jpeg': case 'jpg': case 'png': case 'bmp':
                                break;
                                default:
                                    $(this).val('');
                                    // error message here
                                    alert("Please select valid image");
                                    break;
                            }
                            
                            var oFile = document.getElementById("inputImage").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
                           
                            var a = true; 
                            if(oFile.size > 8119438)
                            {
                                alert("File size must under 7 Mb!");
                                a = false;
                            }
                            
                            if(oFile.size <  400000)
                            {
                                alert("File size must greater than 400 Kb!");
                                a = false;
                            }
                            
                            if(a == false)
                            {
                                clearForm();
                            }
                            
                            function clearForm(){
                                document.getElementById("inputImage").value = "";
                                return false;
                            }
                            
                        });
                        
                        
                        </script>
                        </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="note" style="margin: 10px;padding: 10px 18px;background-color: #f6fbdc;width: 203px; float: left;border-radius: 5px;">
                             <span>DESIGN GUIDELINES </span><br>
                             <span>File Size: 400kb - 7mb</span><br>
                             <span>File Format: pdf, .jpg, .png</span>
                        </div> 
                        </div>
                            <br>
                            <div style="clear: both;"></div>

                        <div class="row" >
                                 <div >
                             <span class="docs-buttons" style="cursor:pointer;">
                             <span id="place_center" class="xyz">  <img src="<?php echo base_url();?>images/center.png" alt="Greenhandle"> <h4 style="    font-size: 14px;">Center</h4></span>
                             </span>
                             </div>
                         <!--button type="button" class="btn " id="place_center" style="margin-bottom: 10px;">
                            <span >
                                 <img src="<?php echo base_url();?>images/center.png"> Center
                            </span>
                        </button-->
                       
                         
                           <span class="docs-buttons" style="cursor:pointer;"> <div >
                             <span id="fit_to_screen" class="xyz">  <img src="<?php echo base_url();?>images/scale.png" alt="Greenhandle"> <h4 style="    font-size: 14px; width:50px;">Fill</h4></span> </div>
                             </span>
                            

                        <!--button type="button" class="btn " id="fit_to_screen" style="margin-bottom: 10px;">
                            <span >
                                Fill
                            </span>
                        </button-->
                            
                                <div >
                             <span class="docs-buttons" style="cursor:pointer;">
                             <span id="scale_to_screen" class="xyz">  <img src="<?php echo base_url();?>images/fit.png"> <h4 style="font-size: 14px;">Scale to fit</h4></span>
                             </span></div>
                        <!--button type="button" class="btn" id="scale_to_screen" style="margin-bottom: 10px;">
                            <span >
                               <img src="<?php echo base_url();?>images/scale.png"> Scale to fit
                            </span>
                        </button-->
                      </div>
                       
                        


                       
                     <br>
                       
                  </div>  
                </div>
            </div>

            <div class="tab-pane" id="textt">
           

                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="float:left;" > 
                  <div id="TextBoxesGroup"></div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input class="t1" type="text" name="txt1" id="textbox1" onClick="show_property('1')" onKeyUp="gptxt(1)" style="border-radius:6px 0 0 0; border-bottom:1px dashed grey;">
                  <i class="fa fa-th" id="1" onClick="show_property('1')" ></i>
                   <i class="fa fa-times" id="1" onClick="remove_text(this.id)" val="removeButton3"></i>
                   <input type="hidden" name="text1_margin_left_perc" id="text1_margin_left_perc" value="0">
                   <input type="hidden" name="text1_margin_bottom_perc" id="text1_margin_bottom_perc" value="0">
                   <input type="hidden" id="para1" value="000">
                  </div>

                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input class="t1" type="text" name="txt2" id="textbox2" onClick="show_property('2')" onKeyUp="gptxt(2)" style="display:inherit; border-bottom:1px dashed grey; border-top:none;">
                  <i class="fa fa-th" id="2" onClick="show_property('2')"></i>
                   <i class="fa fa-times" id="2" onClick="remove_text(this.id)" val="removeButton3"></i>
                   <input type="hidden" name="text2_margin_left_perc" id="text2_margin_left_perc" value="0">
                   <input type="hidden" name="text2_margin_bottom_perc" id="text2_margin_bottom_perc" value="0">
                   <input type="hidden" id="para2" value="000">
                  </div>

                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input class="t1" type="text" name="txt3" id="textbox3" onClick="show_property('3')" onKeyUp="gptxt(3)" style="display:inherit; border-bottom:1px dashed grey; border-top:none;">
                  <i class="fa fa-th" id="3" onClick="show_property('3')"></i>
                  <i class="fa fa-times" id="3" onClick="remove_text(this.id)" val="removeButton3"></i>
                   <input type="hidden" name="text3_margin_left_perc" id="text3_margin_left_perc" value="0">
                   <input type="hidden" name="text3_margin_bottom_perc" id="text3_margin_bottom_perc" value="0">
                   <input type="hidden" id="para3" value="000">
                  </div>

                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input class="t1" type="text" name="txt4" id="textbox4" onClick="show_property('4')" onKeyUp="gptxt(4)" style="display:inherit; border-bottom:1px dashed grey; border-top:none;">
                  <i class="fa fa-th" id="4" onClick="show_property('4')"></i>
                   <i class="fa fa-times" id="4" onClick="remove_text(this.id)" val="removeButton3"></i>
                   <input type="hidden" name="text4_margin_left_perc" id="text4_margin_left_perc" value="0">
                   <input type="hidden" name="text4_margin_bottom_perc" id="text4_margin_bottom_perc" value="0">
                   <input type="hidden" id="para4" value="000">
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input class="t1" type="text" name="txt5" id="textbox5" onClick="show_property('5')" onKeyUp="gptxt(5)" style="display:inherit; border-top:none; border-radius:0 0 0 6px ;">
                   <i class="fa fa-th" id="5" onClick="show_property('5')"></i>
                   <i class="fa fa-times" id="5" onClick="remove_text(this.id)" val="removeButton3"></i>
                   <input type="hidden" name="text5_margin_left_perc" id="text5_margin_left_perc" value="0">
                   <input type="hidden" name="text5_margin_bottom_perc" id="text5_margin_bottom_perc" value="0">
                   <input type="hidden" id="para5" value="000">
                  </div>

                  </div>  
               
                 <div style=" display:none;margin-bottom:    7px;" class="text_property">
                <div class="col-md-5" style="float:left;">
                 <span>Font style</span>
    <select id="fs" style="margin-left: 10px;margin-top: 9px;width: 106px; padding:3px;"> 
        <option value="Arial">Arial</option>
        <option value="Arial Black">Arial Black</option>
        <option value="Agency FB">Agency FB</option>
        <option value="Comic Sans MS">Comic Sans MS</option>
        <option value="Courier">Courier</option>
        <option value="Decorative">Decorative</option>
        <option value="Georgia">Georgia</option>
        <option value="Helvetica">Helvetica</option>             
        <option value="Impact ">Impact </option>
        <option value="Monospace">Monospace</option>
        <option value="Palatino">Palatino</option>
        <option value="sans-serif">Sans Serif</option>
        <option value="Times New Roman">Times New Roman</option>
        <option value="Trebuchet MS">Trebuchet MS</option>
        <option value="Verdana">Verdana </option>
    </select>
    <br><br> <span>Font size</span>
        <select id="size" style="margin-left: 10px; padding:3px;">
        <?php 
        for ($i=1; $i <= 50; $i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php  }
        ?>             
    </select>
    <br><br>
    <div style="display:inline;">
    <div class="editorb" id="bold_txt">B</div>
    <div class="editori" id="italic_txt">I</div>
    <div class="editoru" id="underline_txt">U</div>
    <div class="editora" id="colorSelector_1">A</div>
    </div>
    </div></div> 
                 <img src="" id='new' style="display:none">
                        <textarea id='front_view_data' style="display:none"></textarea>
                        <textarea id='left_view_data' style="display:none"></textarea>
                        <textarea id='handle_view_data' style="display:none"></textarea>
                        <textarea id='cropped_image_data' style="display:none"></textarea>
                        <div id="txt_clr" class="txt_clr_cls" onMouseOut="clr1('')" style="display:none;width: 200px; float:right; height: 47px; margin-top:3px;padding:4px; margin-right: 20px;"> 
                            <div class="txt_clr_cls red fa fa-circle" onMouseOver="clr('#ff0000')" onClick="cls();" style="margin-left: 4px;"></div>
                            <div class="txt_clr_cls yellow fa fa-circle" onMouseOver="clr('#ffff00')" onClick="cls();" ></div>
                            <div class="txt_clr_cls green fa fa-circle" onMouseOver="clr('#274e13')" onClick="cls();" ></div>
                            <div class="txt_clr_cls blue fa fa-circle" onMouseOver="clr('#0000ff')" onClick="cls();" ></div>
                            <div class="txt_clr_cls black fa fa-circle" onMouseOver="clr('#000000')" onClick="cls();"></div>
                            <div class="txt_clr_cls white fa fa-circle" onMouseOver="clr('#ffffff')" onClick="cls();" ></div>
                            
                        </div>
                    </div>
            </div>
            <div class="prevw">
                <button type="button" class="btn btn-primary  final_priview" id="Preview" href="#modal-container-176045" role="button" data-toggle="modal">PREVIEW</button>
                
                <!--
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button>
                    <button id="upload" class="btn final_priview" style=" background-color:#4a75c3 ">Share on Facebook</button>
                -->
           </div>
           

        </div>
 </div>







      </div> 
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 des" style="padding:0px; display:none;">
<div class="abc" style="padding-top:10px; margin:7px 0 7px 0;" id="fieldtextproperty2">
      <div class="form-group" style="      margin-bottom: 10px;">                    
                    <style type="text/css">
                      label
                      {
                        width:95px;
                      }

                    </style>
                      <table class="table" >        
                          <tbody>
                                  
                            <tr>
                              <td style="padding-right: 0px;
    
    padding-left: 21px;"><label for="usr">Right-Margin</label></td>
                              <td style="padding-left: 0px;
    padding-right: 25px;"><input type="text" class="form-control" id="image_margin_right_perc" readonly style="width:100px;"></td>
                              <td><label for="usr">Left-Margin</label></td>
                              <td><input type="text" class="form-control" id="image_margin_left_perc" readonly style="width:100px;"></td>
                            </tr>
                            <tr>
                              <td style="padding-right: 0px;

    padding-left: 21px;"><label for="usr">Top-Margin</label></td>
                              <td style="padding-left: 0px;
    padding-right: 25px;"><input type="text" class="form-control" id="image_margin_top_perc" readonly style="width:100px;"></td>
                              <td ><label for="usr">Bottom-Margin</label></td>
                              <td><input type="text" class="form-control" id="image_margin_bottom_perc" readonly style="width:100px;"></td>
                            </tr>
                             <tr style="display:none">
                              <td><input type="hidden" class="form-control" id="product_lable_1" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_1_top" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_1_left" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_2" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_2_top" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_2_left" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_3" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_3_top" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_3_left" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_4" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_4_top" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_4_left" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_5" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_5_top" disabled=""></td>
                              <td><input type="hidden" class="form-control" id="product_lable_5_left" disabled=""></td>
                            </tr>
                          </tbody>
                      </table>
                  </div>
</div>
    </div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 des" style="padding: 12px;background-color: #fff;height: auto;margin:0px;box-shadow: 0 2px 2px rgba(11, 25, 28, 0.1);margin: 0 0 7px 0;border-radius: 5px;">
<div class="row">
<div class="col-md-12">

 <?php 
$dhgfhg = explode('-', $product_details['0']['GSM_name']);
$dsfds = explode('x', $product_details['0']['size']);
$rjkj = $dsfds[0].' inches';
for ($i=1; $i < sizeof($dsfds); $i++) { 
    $rjkj .= ' X '.$dsfds[$i].' inches';
}
if($section_id == 2){ $rjkj =''; }
if($dhgfhg['0'] == "No"){ $gdsasdsadsa = '</h4>'; } else { $gdsasdsadsa = ' | '.$dhgfhg['0'].' gsm </h4>'; }
   echo '<h4>'.$product_details['0']['prod_name'].' '.$rjkj.$gdsasdsadsa; ?>

</div>
  <div class="">
  <div class="col-md-8">
  <span style="top:5px;">&nbsp;By  
               <?php 
			  // print_r($seller_data);
			   if(isset($seller_data['0']['display_name'])) { 
			 //  $pos=strpos($seller_data['0']['display_name'], ' ', 8);
//echo substr($seller_data['0']['display_name'],0,$pos );
                 echo    $seller_data['0']['display_name']; //org_name
                    } ?></span>
                    </div>
                    <div class="col-md-4">
<div class="review_row clearfix">
<div class="row" style="margin-left: 10px;">
<div class="revieww">
    <ul class="start_list">
        <?php 
        $star = $value[0]['avg'];
        for($i=1;$i<=5;$i++){
        if($star >=1){?>
        <li class="fa fa-star active"></li>
		<?php }$star--;if($star <= 0.5 && $star > 0){?>
        <li class="fa fa-star-half-full active"></li> 
		<?php }if($star > 0.5 && $star < 1 ){?>
        <li class="fa fa-star active"></li> 
		<?php }if($star < 0){?>
        <li class="fa fa-star"></li>
		<?php }}?>
        </ul>
    </div>
    <div class="revieww" >
    <div class="total_rew">&nbsp;<?php if(!empty($viewvalue[0]['value'])){ echo $viewvalue[0]['value'].'&nbsp;Review'; }?></div></div>
        <?php /*if(isset($viewvalue[0]['value'])){ if($viewvalue[0]['value']==""){*/?>
        <div class="revieww" >
        <!--<div class="rating">
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                  </div>-->
        
        <!--<a href="#" class="share"><span class="fa fa-share-square-o"></span>Share</a>--> </div><?php /*} }*/ ?><!--<a href="#active4" class="add_rew">Add Your Review</a>--></div></div>
</div>
 </div>   
<div class="col-md-12">
<div id="product_wise_total" style="display:none"><?php
    /*echo $quntity ;*/if(isset($quantity_vs_price)) { //echo number_format((float)$foo, 2, '.', '');
	$seller_price_ghmargin=($quantity_vs_price['0']['seller_price'] + $quantity_vs_price['0']['ghmargin']);
	$quantity_vs_pricep=$quntity * $seller_price_ghmargin;
	echo number_format((float)$quantity_vs_pricep, 2, '.', '');
    }?></div>
<div class="price prod_price product_wise_total" id="product_final_price"  style="font-size: 25px;margin:8px; font-family: 'Poppins'; float:left;">
<span style="color:red"><i class="fa fa-rupee"><?php
    /*echo $quntity ;*/if(isset($quantity_vs_price)) { //echo number_format((float)$foo, 2, '.', '');
	$seller_price_ghmargin=($quantity_vs_price['0']['seller_price'] + $quantity_vs_price['0']['ghmargin']);
	$quantity_vs_pricep=$quntity * $seller_price_ghmargin;
	echo number_format((float)$quantity_vs_pricep, 2, '.', '');
    }?></i> </span>
    <span style="font-size: 13px;">(excluding&nbsp;<?php echo round($product_details['0']['refgst'],2); ?>%&nbsp;GST)</span>
    
</div><input type="hidden" name="fgst" id="fgst" value="<?php echo round($product_details['0']['refgst'],2); ?>">
<!--<h4 style="font-size: 14px; font-family:'Poppins';" >Price Rs.<span style="text-decoration: line-through; font-size: 13px;" id="mrpPrice"><?php if(isset($quantity_vs_price)) { echo  number_format((float)$quantity_vs_price['0']['mrp'], 2, '.', '');}?></span> </h4>--> 

      <!--<h2 style="color:red; font-size: 20px;" >Rs. <span id="sell_price_per_piece"><?php if(isset($quantity_vs_price)) { echo number_format((float)$quantity_vs_price['0']['sell_price'], 2, '.', '');}?> </span>

      <button class="btn btn-xs" id="disc_prod"><?php if(isset($quantity_vs_price)) { echo round($quantity_vs_price['0']['discount'],2);}?>% OFF</button></h2>-->

   

</div>
 
<form method="post">
    <!--<div class="desc_blk_bot clearfix" style="width: 100%; "></div>-->
             
                            
                
        <input type="hidden" id="sub_cat_id" value="<?php if(isset($subcat_id)){echo $subcat_id;}?>">
        <input type="hidden" id="category_id" value="<?php if(isset($category_id)){echo $category_id;}?>">
        <input type="hidden" id="start_quantity" class="start_quantity" value="<?php echo $quntity;?>">
        <input type="hidden" id="quantity_order" class="quantity_order" value="<?php echo $order_quantity;?>">
        <textarea id="qty_range" style="display:none"><?php print_r(json_encode($quantity_list)); ?></textarea>
        <textarea id="mrp_range" style="display:none"><?php print_r(json_encode($mrp_list)); ?></textarea>
        <textarea id="sell_range" style="display:none"><?php print_r(json_encode($sell_list)); ?></textarea>
        <textarea id="disc_range" style="display:none"><?php print_r(json_encode($discount_list)); ?></textarea>
        <textarea id="wcc_range" style="display:none"><?php print_r(json_encode($wcc_list)); ?></textarea>

  <!--<h4 style="font-size: 16px; font-family:'Poppins'; margin:10px; float:left;" >Total</h4>--> 
  <!--<div class="price prod_price" id="product_wise_total" style="font-size: 25px;margin:8px; font-family: 'Poppins'; float:left;">
    <i class="fa fa-rupee"> <?php
      // if(isset($quantity_vs_price)) { 
        //echo number_format((float)$foo, 2, '.', '');
		
		//$quantity_vs_pricep=$quntity*$quantity_vs_price['0']['sell_price'];
		//echo number_format((float)$quantity_vs_pricep, 2, '.', '');
   // }?></i>
</div>-->





<input type="hidden" name="product_price" id="product_price" value="<?php foreach($page_data5 as $row){echo $row['prod_price'];}?>">
<input type="hidden" name="product_id" id="product_id" value="<?php foreach($page_data5 as $row){ echo $row['prod_id'];}?>">
<input type="hidden" name="pid" id="pid" value="<?php foreach($page_data5 as $row){echo $row['id'];}?>">
<input type="hidden" name="seller_id" id="seller_id" value="<?php for ($i=0; $i < count($page_data5); $i++) { echo $page_data5['0']['seller_id'];}?>">
              
<script type="text/javascript"> 
    function user_validation_func(ele)
    {
        if($('#ship_charge').text() == '0' || $('#ship_charge').text() == '' )
        {
               $("#zipcode_not_entered").text('Please enter Zipcode and calculate Shipping cost.');
        }
       
        
    }
	
</script>
 
</form>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <h4 style="font-size: 14px;"><p style="display: none;"> Shipping cost: <span id="ship_charge" style="color:#000;">0</span>   &nbsp; </p>
     Price per piece&nbsp;<span id="priceperpiece" style="color:#000;"><i class="fa fa-rupee"><?php if(isset($quantity_vs_price)) { echo number_format((float)$seller_price_ghmargin, 2, '.', '');}?></i></span></h4>  
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<span style="color:#489437" id="yousave"><?php //if(isset($quantity_vs_price)) {if(($quantity_vs_price['0']['discount']=="0.00%")||($quantity_vs_price['0']['discount']=="0")||($quantity_vs_price['0']['discount']=="")){}else{?><?php // } } ?></span></div> <!--You saved <i class="fa fa-rupee">0</i>-->
<style>
@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}
}
</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="BoxPer" style="display:none;">
<img src="<?php echo base_url(); ?>img/percent-icon.svg" alt="" height="20" width="30" style="margin-top: 5px; position: absolute;" id="percent-icon">
<?php //$get_Coupon=get_Coupon(); echo $get_Coupon[0]['coupons_text']; ?>
<span style="margin-left:31px;" id="offertext">On This Diwali Get Flat <b class="blink">5%&nbsp;</b>Off On All Product. Offer Valid Till 15th of Nov</span><br><span id="offertext" style="margin-left:31px;">Use Coupon Code&nbsp;&nbsp;<b style="font-size:14px; color:#54bd48">DIWALI5<!--<input type="text" value="DIWALI15" id="myInput" style="padding-top: 8px;    padding-bottom: 8px;    text-align: center;color: #54bd48; width:100px; border:none;font-weight: 600;" readonly>--></b></span><!--&nbsp;&nbsp;<button onclick="myFunction()" style="background-color:#8bc34a; color:#fff; height:30px;">Copy Code</button>
-->
                        <div class="">
                            <!--<div class="qstncircle ah-qstncircle"></div>-->

                            <div class="answrToolTip ah-answrToolTip hide">
                                Prepaid options includes Credit/Debit Card, Net Banking, EMI, Wallet, NEFT &amp; Cheque.
                                <span class="crossThinIcon ah-close-tooltip-btn close-email-popup"></span>
                            </div>
                        </div>
                    </div>
              
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top: solid 1px #eee; margin-top:7px; margin-bottom:5px;"></div>       
            <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>-->    
 <div class="form-group" >   
 <!--<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 CheckShipping"><label>Check Shipping</label></div>-->
 <div class="col-md-6 col-lg-6 col-sm-8 col-xs-8" style="margin-left: -14px;"><input type="text" style="" name="zipcode" placeholder="Enter your zipcode" class="form-control zipcode" id="city_zipcode"><lable id="zipcode_not_entered" style="color: red;"></lable></div>
 <div class="col-md-1 col-lg-1 col-sm-2 col-xs-2"><button type="button" id="zipcode_check" class="btn btn-primary btn-sm zipcode_check" style="margin-left: -37px;">CHECK</button></div>                 
 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 ship_charge" style="margin-top: 9px;font-size: 12px;font-weight: 600;"></div>
 <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12"><img src="<?php echo base_url();?>images/ajax-loader.gif" id="load_me" style="display:none;width:20px;height:20px"></div>
 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left: -14px;">
   <span class=""> 
        <?php 
            if(isset($section_id) && $section_id == 0) { 
                echo "Check Dispatch Date and Availability"; } ///Product will be delivered in 27 days
            else if(isset($section_id) && $section_id == 1) { 
                echo "Check Dispatch Date and Availability"; } ///Product will be delivered in 21 days
            else { echo "Check Dispatch Date and Availability"; } ///Product will be delivered in  13 days
        ?>
    </span><br><span style="color:#900;" class="Dispatch_diplay"> </span>
   </div>
   <!--<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >&nbsp;</div>-->
    <table style="margin-top: -20px;     margin-bottom: 4px;">        
        <tbody> 
                <input type="hidden" id="per_ship_price">
                <input type="hidden" id="wcc_capacity" value="<?php if(isset($quantity_vs_price)) { echo $quantity_vs_price['0']['wcc'];}?>"> 
                <input type="hidden" id="wcc_quantity" value="<?php if(isset($quantity_vs_price)) { echo $quantity_vs_price['0']['quantity'];}?>">                           
               
            <!--<tr> 
                <td style="width: 4%;">Check Shipping Price</td>
                <td style="width: 56%;"><input type="text" style="border-radius: 3px;width: 100%;margin-left: -5px;padding-left: 5px;" name="zipcode" placeholder="Enter your pincode" class="form-control" id="city_zipcode"></td>
                <lable id="zipcode_not_entered" style="margin-left: 27px;color: red;"></lable>                
                <td><button type="button" id="zipcode_check" class="btn btn-primary btn-sm" style="margin-left: -51px; border:0px;    border-top-right-radius: 4px;border-bottom-right-radius: 4px;height: 34px;">CHECK</button></td><td><img src="<?php echo base_url();?>images/ajax-loader.gif" id="load_me" style="display:none;width:20px;height:20px"></td> 
                 <td class="hidden-xs" style="width: 176%;padding-left: 14px;">By
               <?php // if(isset($seller_data['0']['org_name'])) { echo $seller_data['0']['org_name']; } ?>
                    <br></td>  <br>                          
            </tr>--> 
            <tr>                              

                <td style="padding-left: 146px;"></td>   <br>                          
            </tr> 
        </tbody>

    </table>


    
    <script type="text/javascript">
	function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
//  alert("Copied -"+ copyText.value);
}
    $(function(){
        $("#zipcode_check").click(function(){
			var city_zipcode=$("#city_zipcode").val();
			if(city_zipcode==""){
				$("#zipcode_not_entered").text('Please Enter Zipcode');
                        $("#zipcode_not_entered").show();
						return false;
				}else{
            var data = {
                'zipcode' : $("#city_zipcode").val(),
                'wcc_capacity' : $("#wcc_capacity").val(),
                'product_id' : $("#product_id").attr('value'),
                'product_price' : $.trim($("#product_wise_total").text()),
				'section_id' : $("#section_id").val(),
				'seller_id' : $('#seller_id').val(),
                'qtyds' :  $('#mainvalue').val(),
           }
            $("#load_me").show();
							console.log('script2');

            var base_url = window.location.origin;
            $.ajax({
                type: 'POST',
                ContentType: "application/json",
                url: "<?php echo base_url(); ?>catalog/get_shipping_rate",
                data: data,
                success: function(data) { 
                    var data = JSON.parse(data);
                    var error_message = JSON.parse(data[0]).zip_error;
                    if(error_message){
                        $("#zipcode_not_entered").text(error_message);
                        $("#zipcode_not_entered").show();
                        $('#ship_charge').text("0");
                        $("#load_me").hide();
                        return;
                    }else{
                        $("#zipcode_not_entered").hide();   
                    }
                    var quantity = parseInt($('#mainvalue').val());
                    var ship_charge = JSON.parse(data[0]).success/quantity;
					//var delivered_date=JSON.parse(data[2]).delivered;
					//console.log('delivered_date',data[2].delivered);
                    if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                    // $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                    var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(quantity)) + parseFloat(JSON.parse(data[0]).success)
                    var per_pice_prise = ttl_price/parseInt(quantity);
                      //  $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                       // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                      //  $("#per_ship_price").attr('value',ship_charge.toFixed(2));
                      //  $("#mrpPrice").text(data[1]);
					 // $('.ship_charge').html("<span style='margin-top:5px;'>Shipping Cost&nbsp;&nbsp;<i class='fa fa-rupee'>"+ JSON.parse(data[0]).success.toFixed(2) +"</i></span>");
					$('.Dispatch_diplay').html(data[2].delivered);
					 $("#load_me").hide();
                    }else{
                    $("#load_me").hide();
					//$('.ship_charge').html("<span class=''></span>");
					$('.Dispatch_diplay').html('');
					}
                },
                error:function(){ $("#load_me").hide(); }
            });
				}
        });
		
    });                        
</script>



 <script>
    $(document).ready(function(){
        $('.change_checkout_amount').click(function(){ 
		 $('.bulk-option-click').css("background-color",'white');
								   $('.table-cell').css("border",'none');
								 // $('#bulk_option_'+bulk_option).css("background-color",'red');
								// $('#bulk_option_'+bulk_option).closest( ".table-cell" ).css( "border", "1px dashed red" );
            var qty_data = parseInt($(this).text());
            // var qty_data_id = $("select[name='quanity_select'] option:selected").attr('id');
            var qty_data_id = $(this).attr('id');
			var fgst=$("#fgst").val();
            var qty_array = qty_data_id.split(',');
            var qty1 = qty_array[1];
			var qpid = qty_array[2];
			var seller_id = qty_array[3];
			var prod_id = qty_array[4];
            // [Lp]
            var base_url = window.location.origin;
            if(!($("#city_zipcode").val() === undefined || $("#city_zipcode").val()=='')){
                $('#wcc_capacity').val(qty_array[0]);
                $('#wcc_quantity').val(qty_array[1]);
                var product_details = {
                    'zipcode' : $("#city_zipcode").val(),
					'section_id' : $("#section_id").val(),
                    'wcc_capacity' : qty_array[0],
                    'product_id' : $("#product_id").attr('value'),
                    'product_price' : $("#product_wise_total").text(),
                    'quantity' : qty_data,
                    'qtyds' : qty_data,
					'qpid' : qpid, 
					'seller_id':seller_id,
                }
            $("#zipcode_not_entered").text(' ');
            $("#load_me").show();
                $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php echo base_url(); ?>catalog/get_shipping_rate",
                    data: product_details,
                    success: function(data) { 
                        var data = JSON.parse(data);
                        var error_message = JSON.parse(data[0]).zip_error;
                        if(error_message){
                            $("#zipcode_not_entered").text(error_message);
                            $("#zipcode_not_entered").show();
                            $('#ship_charge').text("0");
                            $("#load_me").hide();
                            return;
                        }else{
                            $("#zipcode_not_entered").hide();
                        }
						
                        $.ajax({
                            type: 'POST',
                            ContentType: "application/json",
                            url: "<?php echo base_url(); ?>catalog/get_mrp_discount_sellprice",
                            data: product_details,
                            success: function(result) { 
                                if(result) {
                                    var product_details = JSON.parse(result);
                        //console.log(data[0]);

                                    var prod_mrp = "Rs."+ product_details.mrp;
                                    var sell_price = product_details.sell_price;
                                    var discount = product_details.discount;
                                    var finalprice = product_details.quantity_vs_pricep;
									var priceperpiece = product_details.seller_price_ghmargin;
									var mainvalue_by=$("#mainvalue_by").val();
									$("#priceperpiece").html("&nbsp;<i class='fa fa-rupee'>"+parseFloat(priceperpiece).toFixed(2)+"</i>");
									if(mainvalue_by==qty_data){$("#yousave").html(' ');}else{
									$("#yousave").html(" ");
									var you_saveprice=((parseFloat(finalprice).toFixed(2)/100)*parseFloat(discount).toFixed(2));
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");

									$("#yousave").html("("+parseFloat(discount).toFixed(2)+"% OFF You Save <i class='fa fa-rupee'> "+parseFloat(you_saveprice).toFixed(2)+"</i>)");
									}
									$('#product_final_price').html("<span style='color:red'><i class='fa fa-rupee'>"+parseFloat(finalprice).toFixed(2)+"</i>&nbsp;</span><span style='font-size: 13px;'>(excluding&nbsp;"+fgst+"%&nbsp;GST)</span>");
								    
									discount = parseFloat(discount).toFixed(2);
                                    discount = discount+" % Off"; 
                                   // $("#mrp_prod"). text(prod_mrp);
                                   // $("#sell_price_per_piece"). text(sell_price);
                                   // $("#disc_prod"). text(discount);
                                    $(".selected-quantity").text(qty_data);
									$("#mainvalue").val(qty_data);
									$("#mainvalue").attr('lang',qpid);
									$(".selected-quantity").attr('lang',qpid);
                                    $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                                    if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                                    var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(qty_data)) + parseFloat(JSON.parse(data[0]).success)
                                    var per_pice_prise = ttl_price/parseInt(qty_data);
                                   // $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                                   // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                                    //$("#mrpPrice").text(data[1]);
                                    }
									 $("#load_me").hide(); 
                                }
                            }
                        });
                        var ship_charge = parseFloat(data.success)/parseFloat(qty1);
                       // $("#per_ship_price").attr('value',ship_charge.toFixed(2));
                       
                    },
                });
            }else{
                $("#zipcode_not_entered").text('Please Enter Zipcode');
            }
			 $("#dprice").hide(); 
        });
		
		
		$('.bulk-option-click').click(function(){
			//alert();
	    var bulk_option=$(this).attr('title');		
		var base_url = window.location.origin;	
		var fgst=$("#fgst").val();
		var city_zipcode=$("#city_zipcode").val();
		
		var qvpid = $(this).attr('alt');
	    var wcc_capacity = $("#wcc_capacity").val();
        var product_id = $("#product_id").attr('value');
		var qty_lang = $(this).attr('lang');
		var qty_array = qty_lang.split(',');
		var qty1 = qty_array[1];
	    var qpid = qty_array[2];
	    var seller_id = qty_array[3];
	    var prod_id = qty_array[4];
		var customizedquantity=$('#customizedquantity').val();
		   if(($("#city_zipcode").val() === undefined) || ($("#city_zipcode").val()=='')){
			    $("#zipcode_not_entered").text('Please Enter Zipcode');
				$("#load_me").hide();
			   }else{
             
			    $('#wcc_capacity').val(qty_array[0]);
                $('#wcc_quantity').val(qty_array[1]);
                var product_details = {
                    'zipcode' : $("#city_zipcode").val(),
					'section_id' : $("#section_id").val(),
                    'wcc_capacity' : qty_array[0],
                    'product_id' : $("#product_id").attr('value'),
                    'product_price' : $("#product_wise_total").text(),
                    'quantity' : qty1,
                    'qtyds' : qty1,
					'qpid' : qpid, 
					'seller_id':seller_id,
                }
				
				
				
				
				
	    if(qty1>customizedquantity){
		$('.style_base').css("border", "1px dashed #993 ");
		$('.style_on').css("display", "block");
		}else{
	    $('.style_base').css("border", "none");
		$('.style_on').css("display", "none");
		}
				
				
            $("#zipcode_not_entered").text('');
            $("#load_me").show();
			
                $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>catalog/get_shipping_rate",
                    data: product_details,
                    success: function(data) { 
                        var data = JSON.parse(data);
                        var error_message = JSON.parse(data[0]).zip_error;
                        if(error_message){
                            $("#zipcode_not_entered").text(error_message);
                            $("#zipcode_not_entered").show();
                           // $('#ship_charge').text("0");
                            $("#load_me").hide();
                           // return;
                        }else{
							
                            $("#zipcode_not_entered").hide();
							 $('.Dispatch_diplay').html(data[2].delivered);
							$("#load_me").hide();
                        }
					}
				});
				
				 $.ajax({
                            type: 'POST',
                            ContentType: "application/json",
                            url: "<?php echo base_url(); ?>catalog/get_mrp_discount_sellprice",
                            data: product_details,
                            success: function(result) { 
                                if(result) {
                                    var product_details = JSON.parse(result);
                        //console.log(data[0]);

                                    var prod_mrp = "Rs."+ product_details.mrp;
                                    var sell_price = product_details.sell_price;
                                    var discount = product_details.discount;
                                    var finalprice = product_details.quantity_vs_pricep;
									var priceperpiece = product_details.seller_price_ghmargin;
									var mainvalue_by=$("#mainvalue_by").val();
									$("#priceperpiece").html("&nbsp;<i class='fa fa-rupee'>"+parseFloat(priceperpiece).toFixed(2)+"</i>");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									if(qty1==mainvalue_by){$("#yousave").html(" ");}else{
										$("#yousave").html(" ");
										
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									var you_saveprice=((parseFloat(finalprice).toFixed(2)/100)*parseFloat(discount).toFixed(2));
$("#yousave").html("("+parseFloat(discount).toFixed(2)+"% OFF You Save <i class='fa fa-rupee'> "+parseFloat(you_saveprice).toFixed(2)+"</i>)");									}
									$('#product_final_price').html("<span style='color:red'><i class='fa fa-rupee'>"+parseFloat(finalprice).toFixed(2)+"</i>&nbsp;</span><span style='font-size: 13px;'>(excluding&nbsp;"+fgst+"%&nbsp;GST)</span>");
								    
									discount = parseFloat(discount).toFixed(2);
                                    discount = discount+" % Off"; 
                                   // $("#mrp_prod"). text(prod_mrp);
                                   // $("#sell_price_per_piece"). text(sell_price);
                                   // $("#disc_prod"). text(discount);
                                    $(".selected-quantity").text(qty_array[1]);
									$(".selected-quantity").attr('lang',qty_array[2]);
									$("#mainvalue").val(qty_array[1]);
									$("#mainvalue").attr('lang',qty_array[2]);
                                  //  $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                                  //  if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                                  //  var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(qty_data)) + parseFloat(JSON.parse(data[0]).success)
                                //    var per_pice_prise = ttl_price/parseInt(qty_data);
                                   // $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                                   // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                                    //$("#mrpPrice").text(data[1]);
                                   // }
								   $('.bulk-option-click').css("background-color",'white');
								   $('.table-cell').css("border",'none');
								  $('#bulk_option_'+bulk_option).css("background-color",'#8bc34a');
								// $('#bulk_option_'+bulk_option).closest( ".table-cell" ).css( "border", "1px dashed red" );
									 $("#load_me").hide(); 
                                }
                            }
                        });
                       
				}
			
			
			
		});
    });
 </script>
</div>

</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-top: solid 1px #eee; margin-top:5px;margin-bottom:4px;"></div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" ><br/></div>


<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
<div class="alert alert-success" id="checkout_now"  style="display:none;" role="alert" align="center">Added to cart. <a href="<?php echo base_url(); ?>checkout">Checkout ?</a></div><!--[Lp]-->

<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" style="margin-bottom: 5px;margin-left: -14px;">
    <h4 style=" margin-right: 7px; margin-top: -16px; font-size: 13px; color:#000;">Update&nbsp;Quantity</h4>
    <div class="btn-group" style="border:1px solid #e4e4e4;width: 125px;">
   <span class="qty-decrease"><i class="fa fa-minus" ></i></span>&nbsp;<input type="text" name="mainvalue" id="mainvalue" class="mainvalue"  lang="<?php echo $quantity_vs_price[0]['id']; ?>" value="<?php echo $quantity_vs_price[0]['quantity']; ?>" readonly  style="width: 60px;height: 32px;text-align: center;border-left: 1px solid transparent;
margin-top: 0px;background-color: #FFFFFF;border-color: #D3D3D3;color: #4B4B4B; border-right: 1px solid navajowhite; border-top: navajowhite;border-bottom: navajowhite;"/>&nbsp;<span class="qty-increase"><i class="fa fa-plus"></i></span>
    <!--<button type="button" class="btn dropdown-toggle selected-quantity" id="dp" data-toggle="dropdown" style="width: 74px;height: 40px;background-color: #FFFFFF;border-color: #D3D3D3;color: #4B4B4B;">
        <span class="">
            <?php //echo $quantity_vs_price[0]['quantity']; ?>  
        <span class="caret"></span>
    </button>-->
    <!--<input type="hidden" name="mainvalue" id="mainvalue" class="mainvalue" lang="<?php // echo $quantity_vs_price[0]['id']; ?>" value="<?php //echo $quantity_vs_price[0]['quantity']; ?>"/>-->
    <input type="hidden" name="mainvalue_by" id="mainvalue_by" class="mainvalue_by" lang="<?php echo $quantity_vs_price[0]['id']; ?>" value="<?php echo $quantity_vs_price[0]['quantity']; ?>"/>
  <!--  <span class="dropdown-toggle" id="dp" data-toggle="dropdown"></span>-->
  <!--<span class="dropdowntoggle" id="dp"></span>-->
        <ul class="dropdown-menu" role="menu" id="dprice" style="display:none;">
             <?php if($section_id == 2 || $section_id == 3) {
    foreach($quantity_vs_price as $row) {  if($row['quantity']==0){}else{if($page_data5[0]['qns'] >= $row['quantity']) { ?>
   <option style = "cursor: pointer;margin: 13px 36px;" class="change_checkout_amount" lang="<?php echo $row['id']; ?>" id='<?php echo $row['wcc']; ?>,<?php echo $row['quantity']; ?>,<?php echo $row['id']; ?>,<?php echo $row['seller_id']; ?>,<?php echo $row['prod_id']; ?>' value="<?php echo $row['quantity']; ?>"><?php echo $row['quantity']; ?></option>
     <?php }} } } else{
      foreach($quantity_vs_price as $row) { if($row['quantity']==0){}else{  ?>
          <option style = "cursor: pointer;margin: 13px 36px;" class="change_checkout_amount" lang="<?php echo $row['id']; ?>" id='<?php echo $row['wcc']; ?>,<?php echo $row['quantity']; ?>,<?php echo $row['id']; ?>,<?php echo $row['seller_id']; ?>,<?php echo $row['prod_id']; ?>' value="<?php echo $row['quantity']; ?>"><?php echo $row['quantity']; ?></option>
        <?php }}   } ?>
        </ul>
        
    </div>
 </div>
 <?php $customizedquantity='';foreach($quantity_vs_price as $row) { if($row['quantity']==0){}else{ $customizedquantity= $row['quantity'];  }}?>
 <input type="hidden" name="customizedquantity" id="customizedquantity" value="<?php echo $customizedquantity;  ?>" />
 <?php
 foreach($quantity_vs_price as $row) { if($row['quantity']==0){}else{$qvpcc[]=$row['quantity']; }}

$qvpcch=count($qvpcc);if($qvpcch>2){$style_base="border: none;";$style_on="display:none;";}else{$style_base="border: 1px dashed #993;";$style_on="display:block;"; }
  ?>
 <span style="style_base" class="style_on"></span>
 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12"  style="margin-top: 2px; border:1px dashed #993; height: 35px;text-align: center; <?php //echo $style_base; ?> ">
 
 <span class="" style="font-size:11px;<?php //echo $style_on;?>">Looking for more than <?php echo $customizedquantity; ?> quanitity ? get customized price<a href="<?php echo base_url();?>bulk_order"> Click&nbsp;here</a></span>
 
 </div>
 
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"><br></div>
<?php foreach($quantity_vs_price as $row) { 
if($row['quantity']==0){}else{$qvpc[]=$row['quantity']; }}

$qvpcc=count($qvpc);

 if($qvpcc>2){ ?>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:-14px; margin-bottom:5px;">Buy in bulk quantities & save more!!</div>

<div class="select-price-box" id="AH_BulkPriceView" style="margin-left:-14px;">

        <div class="table">
        <div class="table-row bg">
        <div class="table-cell">Select</div>
        <div class="table-cell">Quantity</div>
        <div class="table-cell">Discount</div>
        <div class="table-cell">Price&nbsp;per&nbsp;piece</div>
        </div>
                                
                                
                   <?php if($section_id == 2 || $section_id == 3) {
                   $ii=0; 
				   array_shift($quantity_vs_price);
				  // print_r($quantity_vs);
				   foreach($quantity_vs_price as $row) { 
				   if($row['quantity']==0){}else{
				   if($page_data5[0]['qns'] >= $row['quantity']) { ?>
                   
 
<div class="table-row bulk-option AH_BulkPriceOption AH_BulkPriceOption_<?php echo $ii; ?>">
<div class="table-cell">
<div>
<input type="radio" name="radio" id="bulk_price_radio_<?php echo $ii; ?>" alt="<?php echo $row['id']; ?>"  class="AH_BulkPriceRadio">
<label for="bulk_price_radio_<?php echo $ii; ?>" alt="<?php echo $row['id']; ?>" style="width:65px !important;"><span class="bulk-option-click" title="<?php echo $row['id']; ?>" id="bulk_option_<?php echo $row['id']; ?>" lang="<?php echo $row['wcc']; ?>,<?php echo $row['quantity']; ?>,<?php echo $row['id']; ?>,<?php echo $row['seller_id']; ?>,<?php echo $row['prod_id']; ?>"></span></label>
</div></div>
<div class="table-cell tableQuantity_<?php echo $ii; ?>"><?php echo $row['quantity']; ?></div>
<div class="table-cell tablediscount_<?php echo $ii; ?>"><?php echo number_format((float)$row['discount'] , 2, '.', ''); ?> %</div>
<div class="table-cell tablePrice_<?php echo $ii; ?>"><i class="fa fa-rupee"><?php  $precide=$row['seller_price'] + $row['ghmargin'];  echo number_format((float)$precide , 2, '.', '');?></i> </div>
</div>    
                  
                    <?php $ii++;}} } } else{
						array_shift($quantity_vs_price);
                       $ik=0;foreach($quantity_vs_price as $row) { if($row['quantity']==0){}else{  ?>
<div class="table-row bulk-option AH_BulkPriceOption AH_BulkPriceOption_<?php echo $ik; ?>">
                                        <div class="table-cell">
                                         <div>
   <input type="radio" name="radio"  id="bulk_price_radio_<?php echo $ik; ?>" alt="<?php echo $row['id']; ?>" lang="<?php echo $row['wcc']; ?>,<?php echo $row['quantity']; ?>,<?php echo $row['id']; ?>,<?php echo $row['seller_id']; ?>,<?php echo $row['prod_id']; ?>" class="AH_BulkPriceRadio">
   <label for="bulk_price_radio_<?php echo $ik; ?>" alt="<?php echo $row['id']; ?>" class="" style="width:65px !important;"><span class="bulk-option-click" title="<?php echo $row['id']; ?>" id="bulk_option_<?php echo $row['id']; ?>" lang="<?php echo $row['wcc']; ?>,<?php echo $row['quantity']; ?>,<?php echo $row['id']; ?>,<?php echo $row['seller_id']; ?>,<?php echo $row['prod_id']; ?>"></span></label>
                                            </div>
                                        </div>
                                        <div class="table-cell tableQuantity_<?php echo $ik; ?>"><?php echo $row['quantity']; ?></div>
                                        <div class="table-cell tablediscount_<?php echo $ik; ?>"><?php echo number_format((float)$row['discount'] , 2, '.', ''); ?> %</div>
                                        <div class="table-cell tablePrice_<?php echo $ik; ?>"><i class="fa fa-rupee"></i> <?php 
										$precide=number_format((float)($row['seller_price'] + $row['ghmargin']), 2, '.', '');  
										 echo number_format((float)$precide , 2, '.', '');
										//echo number_format((float)$row['quantity'] * $precide , 2, '.', ''); //number_format((float)$quantity_vs_price['0']['sell_price'], 2, '.', '');?> </div>
                                    </div>
 <?php $ik++;}}   } ?>
</div><br>
                             </div><?php } ?>
                             <div class="clearfix"></div>
<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix" style="border-top: dashed 1px #ccc;"></div>-->
<!--<div class="clearfix"></br></div>-->
    <?php  $qqqtttt = array_map(function($details) { return $details['quantity'];}, $quantity_vs_price); 
	//echo array_sum($qqqtttt);
	if(isset($page_data5[0]['qns'])){
		$pdq=$page_data5[0]['qns'];}else{$pdq="";}
	//echo $section_id;
	//echo min($qqqtttt);
	//echo $pdq; 
	//if(($section_id == 2 || $section_id == 3) && min($qqqtttt)>$pdq)
    if(($section_id == 2 || $section_id == 3) && ($pdq)<=0) { echo "<div class='oos'>Out Of Stock</div>";  } else{
		// "<div class='oos'>Out Of Stock</div>";
    if(!$this->session->userdata('logged_in') || $this->session->userdata['logged_in']['role_id']== 5){?> 
      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >  
    <div class="btn btn-primary btn-sm"  id="cart_prod" style="width:230px; height:40px;font-size:16px;">ADD TO CART</div> 
        <!-- Loading ANimation Model  [Lp]-->
        <div class = "modal fade" id = "myModalAddToCart" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
           <div class = "modal-dialog" style="opacity:1 !important;">
                    <img src='<?php echo base_url();?>images/addToCartLoader.gif' align="middle">
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >
    <a class="btn btn-primary  BUY NOW" id="cart_prodbuy"  style="background-color: #fff;color: #000;width:230px; height:40px;font-size:16px;" href="javascript:void(0);">BUY NOW</a>
    <!--<a class="btn btn-primary BULK_ORDER"  style="background-color: #fff;color: #000;" href="<?php echo base_url(); ?>bulk_order">BULK ORDER</a>-->
<!--<div class="btn btn-primary" data-toggle="modal" data-target="#login_model" style="width: 120px;padding: 8px;height: 40px;" id="buy_now_1" onclick="user_validation_func(this.id)">Buy Now</div>-->
 </div>
    <?php } else { ?>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" > 
    <div class="btn btn-primary btn-sm" id="cart_prod" style="width:230px; height:40px;font-size:16px;">ADD TO CART</div>
    <div class = "modal fade" id = "myModalAddToCart" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
           <div class = "modal-dialog" style="opacity:1 !important;">
                    <img src='<?php echo base_url();?>images/addToCartLoader.gif' align="middle">
            </div><!-- /.modal-content -->
        </div>
    </div>
    
    
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >
    <a class="btn btn-primary BUY NOW" id="cart_prodbuy"  style="background-color: #fff;color: #000;width:230px; height:40px; font-size:16px;" href="javascript:void(0);">BUY NOW</a>
    <!--<a class="btn btn-primary BULK_ORDER" style="background-color: #fff;color: #000;" href="<?php echo base_url(); ?>bulk_order">BULK ORDER</a>-->
</div>
<!--<div class="btn btn-primary " style="width: 120px;padding: 8px;height: 40px;" id="buy_now" onclick="user_validation_func(this.id)">Buy Now</div>--> 
    <?php  } }?> 
<div class="btn-group" role="group" aria-label="..." style="margin:8px;">


</div>

</div>

</div>


<script type="text/javascript">
$(function()
{
    $( "#product_quantity" ).keyup(function() {
        var quantity = $( "#product_quantity" ).val();
        
        var price_per_piece = $( "#price_per_piece" ).val();
        var prod_wise_total = quantity*price_per_piece;
        $("#product_wise_total").text(prod_wise_total);
    });
        $(".add_rew").click(function(){ 
        $("#active1").removeClass('active');
        $("#active2").removeClass('active');
        $("#active3").removeClass('active');

        $("#home").removeClass('active');
        $("#moreinfo").removeClass('active');
        $("#information").removeClass('active');

        $("#active4").attr('class','active');
        $("#caretips").attr('class','active');
    });
$('.btn-info').click(function(){
	//alert();.attr('class')
	var c=$('#arrow').attr('class');//.closest("i");
	//alert(c);
	if(c=="fa fa-angle-down"){
	$('#arrow').removeClass("fa fa-angle-down");	
	$('#arrow').addClass("fa fa-angle-up");
	}else{
	$('#arrow').removeClass("fa fa-angle-up");	
	 $('#arrow').addClass("fa fa-angle-down");

	}
});

 $('.qty-decrease').click(function(){
	 
	 var mainvalue=$('.mainvalue').val();
	 var mainvalue_by=$('.mainvalue_by').val();
	 if(mainvalue==0){
     $('.mainvalue').val(mainvalue_by);
	 }else{
		 
	 var newval=Number(mainvalue) - Number(mainvalue_by);
	 console.log('mainvalue',mainvalue);
	 console.log('mainvalue_by',mainvalue_by);
	 console.log('newval',newval);
	 
	 if(newval<=mainvalue_by){
	 $('.mainvalue').val(mainvalue_by);
	  var newval= mainvalue_by;
		 }
			 
			 {
	
	    $('.style_base').css("border", "none");
		$('.style_on').css("display", "none");
	    var bulk_option=$(this).attr('title');	//id	
		var base_url = window.location.origin;	
		var fgst=$("#fgst").val();
		var city_zipcode=$("#city_zipcode").val();
		
		var qvpid = $(this).attr('alt');
	    //var wcc_capacity = $("#wcc_capacity").val();
        var product_id = $("#product_id").attr('value');
	///////////////////////////////////////////////////////////////////	
		//var qty_lang = $(this).attr('lang');
		//var qty_array = qty_lang.split(',');
		var qty1 =newval; //qty_array[1];
	    var qpid =''; //qty_array[2];
	    var seller_id = $('#seller_id').val();//qty_array[3];
	    var prod_id ='';// qty_array[4];
  ///////////////////////////////////////////////////////////////////	

		   if(($("#city_zipcode").val() === undefined) || ($("#city_zipcode").val()=='')){
			    $("#zipcode_not_entered").text('Please Enter Zipcode');
				$("#load_me").hide();
			   }else{
             
			  //  $('#wcc_capacity').val(qty_array[0]);
              //  $('#wcc_quantity').val(qty_array[1]);
                var product_details = {
                    'zipcode' : $("#city_zipcode").val(),
					'section_id' : $("#section_id").val(),
                    'wcc_capacity' :'', /*qty_array[0],*/
                    'product_id' : $("#product_id").attr('value'),
                    'product_price' : '',
                    'quantity' : newval,
                    'qtyds' : newval,
					'qpid' : '', 
					'seller_id':seller_id,
                }
				 $('.mainvalue').val(newval);
            $("#zipcode_not_entered").text('');
            $("#load_me").show();
			
                $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>catalog/get_shipping_rate",
                    data: product_details,
                    success: function(data) { 
                        var data = JSON.parse(data);
                        var error_message = JSON.parse(data[0]).zip_error;
                        if(error_message){
                            $("#zipcode_not_entered").text(error_message);
                            $("#zipcode_not_entered").show();
                           // $('#ship_charge').text("0");
                            $("#load_me").hide();
                           // return;
                        }else{
							
                            $("#zipcode_not_entered").hide();
							 $('.Dispatch_diplay').html(data[2].delivered);
							$("#load_me").hide();
                        }
					}
				});
				
				 $.ajax({
                            type: 'POST',
                            ContentType: "application/json",
                            url: "<?php echo base_url(); ?>catalog/get_mrp_discount_sellprice",
                            data: product_details,
                            success: function(result) { 
                                if(result) {
                                    var product_details = JSON.parse(result);
                        //console.log(data[0]);

                                    var prod_mrp = "Rs."+ product_details.mrp;
                                    var sell_price = product_details.sell_price;
                                    var discount = product_details.discount;
                                    var finalprice = product_details.quantity_vs_pricep;
									var priceperpiece = product_details.seller_price_ghmargin;
									var mainvalue_by=$("#mainvalue_by").val();
									$("#priceperpiece").html("&nbsp;<i class='fa fa-rupee'>"+parseFloat(priceperpiece).toFixed(2)+"</i>");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									if(newval==mainvalue_by){$("#yousave").html(" ");}else{
										$("#yousave").html(" ");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									var you_saveprice=((parseFloat(finalprice).toFixed(2)/100)*parseFloat(discount).toFixed(2));
$("#yousave").html("("+parseFloat(discount).toFixed(2)+"% OFF You Save <i class='fa fa-rupee'> "+parseFloat(you_saveprice).toFixed(2)+"</i>)");									}
									$('#product_final_price').html("<span style='color:red'><i class='fa fa-rupee'>"+parseFloat(finalprice).toFixed(2)+"</i>&nbsp;</span><span style='font-size: 13px;'>(excluding&nbsp;"+fgst+"%&nbsp;GST)</span>");
								    
									discount = parseFloat(discount).toFixed(2);
                                    discount = discount+" % Off"; 
                                   // $("#mrp_prod"). text(prod_mrp);
                                   // $("#sell_price_per_piece"). text(sell_price);
                                   // $("#disc_prod"). text(discount);
                                   // $(".selected-quantity").text(newval);
									//$(".selected-quantity").attr('lang',qty_array[2]);
									//$("#mainvalue").val(qty_array[1]);
								//	$("#mainvalue").attr('lang',qty_array[2]);
                                  //  $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                                  //  if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                                  //  var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(qty_data)) + parseFloat(JSON.parse(data[0]).success)
                                //    var per_pice_prise = ttl_price/parseInt(qty_data);
                                   // $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                                   // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                                    //$("#mrpPrice").text(data[1]);
                                   // }
								  // $('.bulk-option-click').css("background-color",'white');
								 //  $('.table-cell').css("border",'none');
								//  $('#bulk_option_'+bulk_option).css("background-color",'#8bc34a');
								// $('#bulk_option_'+bulk_option).closest( ".table-cell" ).css( "border", "1px dashed red" );
									 $("#load_me").hide(); 
                                }
                            }
                        });
                       
				}
	 
	 }
	 }
 });
 $('.qty-increase').click(function(){
	 
	 var mainvalue=$('.mainvalue').val();
	 var mainvalue_by=$('.mainvalue_by').val();
	 var customizedquantity=$('#customizedquantity').val();
	 var newval=Number(mainvalue) + Number(mainvalue_by);
	if(newval>customizedquantity){
		$('.style_base').css("border", "1px dashed #993 ");
		$('.style_on').css("display", "block");
		}else{
	    $('.style_base').css("border", "none");
		$('.style_on').css("display", "none");
	   var bulk_option=$(this).attr('title');	//id	
		var base_url = window.location.origin;	
		var fgst=$("#fgst").val();
		var city_zipcode=$("#city_zipcode").val();
		
		var qvpid = $(this).attr('alt');
	    //var wcc_capacity = $("#wcc_capacity").val();
        var product_id = $("#product_id").attr('value');
	///////////////////////////////////////////////////////////////////	
		//var qty_lang = $(this).attr('lang');
		//var qty_array = qty_lang.split(',');
		var qty1 =newval; //qty_array[1];
	    var qpid =''; //qty_array[2];
	    var seller_id = $('#seller_id').val();//qty_array[3];
	    var prod_id ='';// qty_array[4];
  ///////////////////////////////////////////////////////////////////	

		   if(($("#city_zipcode").val() === undefined) || ($("#city_zipcode").val()=='')){
			    $("#zipcode_not_entered").text('Please Enter Zipcode');
				$("#load_me").hide();
			   }else{
             
			  //  $('#wcc_capacity').val(qty_array[0]);
              //  $('#wcc_quantity').val(qty_array[1]);
                var product_details = {
                    'zipcode' : $("#city_zipcode").val(),
					'section_id' : $("#section_id").val(),
                    'wcc_capacity' :'', /*qty_array[0],*/
                    'product_id' : $("#product_id").attr('value'),
                    'product_price' : '',
                    'quantity' : newval,
                    'qtyds' : newval,
					'qpid' : '', 
					'seller_id':seller_id,
                }
				 $('.mainvalue').val(newval);
            $("#zipcode_not_entered").text('');
            $("#load_me").show();
			
                $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>catalog/get_shipping_rate",
                    data: product_details,
                    success: function(data) { 
                        var data = JSON.parse(data);
                        var error_message = JSON.parse(data[0]).zip_error;
                        if(error_message){
                            $("#zipcode_not_entered").text(error_message);
                            $("#zipcode_not_entered").show();
                           // $('#ship_charge').text("0");
                            $("#load_me").hide();
                           // return;
                        }else{
							
                            $("#zipcode_not_entered").hide();
							 $('.Dispatch_diplay').html(data[2].delivered);
							$("#load_me").hide();
                        }
					}
				});
				
				 $.ajax({
                            type: 'POST',
                            ContentType: "application/json",
                            url: "<?php echo base_url(); ?>catalog/get_mrp_discount_sellprice",
                            data: product_details,
                            success: function(result) { 
                                if(result) {
                                    var product_details = JSON.parse(result);
                        //console.log(data[0]);

                                    var prod_mrp = "Rs."+ product_details.mrp;
                                    var sell_price = product_details.sell_price;
                                    var discount = product_details.discount;
                                    var finalprice = product_details.quantity_vs_pricep;
									var priceperpiece = product_details.seller_price_ghmargin;
									var mainvalue_by=$("#mainvalue_by").val();
									$("#priceperpiece").html("&nbsp;<i class='fa fa-rupee'>"+parseFloat(priceperpiece).toFixed(2)+"</i>");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									if(newval==mainvalue_by){$("#yousave").html(" ");}else{
										$("#yousave").html(" ");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									var you_saveprice=((parseFloat(finalprice).toFixed(2)/100)*parseFloat(discount).toFixed(2));
$("#yousave").html("("+parseFloat(discount).toFixed(2)+"% OFF You Save <i class='fa fa-rupee'> "+parseFloat(you_saveprice).toFixed(2)+"</i>)");									}
									$('#product_final_price').html("<span style='color:red'><i class='fa fa-rupee'>"+parseFloat(finalprice).toFixed(2)+"</i>&nbsp;</span><span style='font-size: 13px;'>(excluding&nbsp;"+fgst+"%&nbsp;GST)</span>");
								    
									discount = parseFloat(discount).toFixed(2);
                                    discount = discount+" % Off"; 
                                   // $("#mrp_prod"). text(prod_mrp);
                                   // $("#sell_price_per_piece"). text(sell_price);
                                   // $("#disc_prod"). text(discount);
                                   // $(".selected-quantity").text(newval);
									//$(".selected-quantity").attr('lang',qty_array[2]);
									//$("#mainvalue").val(qty_array[1]);
									//$("#mainvalue").attr('lang',qty_array[2]);
                                  //  $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                                  //  if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                                  //  var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(qty_data)) + parseFloat(JSON.parse(data[0]).success)
                                //    var per_pice_prise = ttl_price/parseInt(qty_data);
                                   // $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                                   // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                                    //$("#mrpPrice").text(data[1]);
                                   // }
								  // $('.bulk-option-click').css("background-color",'white');
								 //  $('.table-cell').css("border",'none');
								//  $('#bulk_option_'+bulk_option).css("background-color",'#8bc34a');
								// $('#bulk_option_'+bulk_option).closest( ".table-cell" ).css( "border", "1px dashed red" );
									 $("#load_me").hide(); 
                                }
                            }
                        });
			   }
	 
	}
	 
 });
 
 $('.mainvaluee').change(function(){
	// var mainvalue=$('.mainvalue').val();
	 var mainvalue=$(this).val();
	 var mainvalue_by=$('.mainvalue_by').val();
	  var newval=Number(mainvalue) - Number(mainvalue_by);
	 if(mainvalue_by>newval){$('.mainvalue').val(mainvalue_by);}else{
	
	 
	 
	    var bulk_option=$(this).attr('title');	//id	
		var base_url = window.location.origin;	
		var fgst=$("#fgst").val();
		var city_zipcode=$("#city_zipcode").val();
		
		var qvpid = $(this).attr('alt');
	    //var wcc_capacity = $("#wcc_capacity").val();
        var product_id = $("#product_id").attr('value');
	///////////////////////////////////////////////////////////////////	
		//var qty_lang = $(this).attr('lang');
		//var qty_array = qty_lang.split(',');
		var qty1 =newval; //qty_array[1];
	    var qpid =''; //qty_array[2];
	    var seller_id = $('#seller_id').val();//qty_array[3];
	    var prod_id ='';// qty_array[4];
  ///////////////////////////////////////////////////////////////////	

		   if(($("#city_zipcode").val() === undefined) || ($("#city_zipcode").val()=='')){
			    $("#zipcode_not_entered").text('Please Enter Zipcode');
				$("#load_me").hide();
			   }else{
             
			  //  $('#wcc_capacity').val(qty_array[0]);
              //  $('#wcc_quantity').val(qty_array[1]);
                var product_details = {
                    'zipcode' : $("#city_zipcode").val(),
					'section_id' : $("#section_id").val(),
                    'wcc_capacity' :'', /*qty_array[0],*/
                    'product_id' : $("#product_id").attr('value'),
                    'product_price' : '',
                    'quantity' : newval,
                    'qtyds' : newval,
					'qpid' : '', 
					'seller_id':seller_id,
                }
				
            $("#zipcode_not_entered").text('');
            $("#load_me").show();
			 var newval=$(this).val();
                $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>catalog/get_shipping_rate",
                    data: product_details,
                    success: function(data) { 
                        var data = JSON.parse(data);
                        var error_message = JSON.parse(data[0]).zip_error;
                        if(error_message){
                            $("#zipcode_not_entered").text(error_message);
                            $("#zipcode_not_entered").show();
                           // $('#ship_charge').text("0");
                            $("#load_me").hide();
                           // return;
                        }else{
							
                            $("#zipcode_not_entered").hide();
							 $('.Dispatch_diplay').html(data[2].delivered);
							$("#load_me").hide();
                        }
					}
				});
				
				 $.ajax({
                            type: 'POST',
                            ContentType: "application/json",
                            url: "<?php echo base_url(); ?>catalog/get_mrp_discount_sellprice",
                            data: product_details,
                            success: function(result) { 
                                if(result) {
                                    var product_details = JSON.parse(result);
                        //console.log(data[0]);

                                    var prod_mrp = "Rs."+ product_details.mrp;
                                    var sell_price = product_details.sell_price;
                                    var discount = product_details.discount;
                                    var finalprice = product_details.quantity_vs_pricep;
									var priceperpiece = product_details.seller_price_ghmargin;
									var mainvalue_by=$("#mainvalue_by").val();
									$("#priceperpiece").html("&nbsp;<i class='fa fa-rupee'>"+parseFloat(priceperpiece).toFixed(2)+"</i>");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									if(newval==mainvalue_by){$("#yousave").html(" ");}else{
										$("#yousave").html(" ");
									//$("#yousave").html("( "+parseFloat(discount).toFixed(2)+"% OFF)");
									var you_saveprice=((parseFloat(finalprice).toFixed(2)/100)*parseFloat(discount).toFixed(2));
$("#yousave").html("("+parseFloat(discount).toFixed(2)+"% OFF You Save <i class='fa fa-rupee'> "+parseFloat(you_saveprice).toFixed(2)+"</i>)");									}
									$('#product_final_price').html("<span style='color:red'><i class='fa fa-rupee'>"+parseFloat(finalprice).toFixed(2)+"</i>&nbsp;</span><span style='font-size: 13px;'>(excluding&nbsp;"+fgst+"%&nbsp;GST)</span>");
								    
									discount = parseFloat(discount).toFixed(2);
                                    discount = discount+" % Off"; 
                                   // $("#mrp_prod"). text(prod_mrp);
                                   // $("#sell_price_per_piece"). text(sell_price);
                                   // $("#disc_prod"). text(discount);
                                   // $(".selected-quantity").text(newval);
									//$(".selected-quantity").attr('lang',qty_array[2]);
									//$("#mainvalue").val(qty_array[1]);
									//$("#mainvalue").attr('lang',qty_array[2]);
                                  //  $('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2));
                                  //  if($('#ship_charge').text(JSON.parse(data[0]).success.toFixed(2)) != undefined){
                                  //  var ttl_price = (parseFloat($("#sell_price_per_piece").text()) * parseInt(qty_data)) + parseFloat(JSON.parse(data[0]).success)
                                //    var per_pice_prise = ttl_price/parseInt(qty_data);
                                   // $("#product_wise_total").html("<i class='fa fa-rupee'>"+ ttl_price.toFixed(2) +"</i>");
                                   // $('#price_per_piece').text(per_pice_prise.toFixed(2));
                                    //$("#mrpPrice").text(data[1]);
                                   // }
								  // $('.bulk-option-click').css("background-color",'white');
								 //  $('.table-cell').css("border",'none');
								//  $('#bulk_option_'+bulk_option).css("background-color",'#8bc34a');
								// $('#bulk_option_'+bulk_option).closest( ".table-cell" ).css( "border", "1px dashed red" );
									 $("#load_me").hide(); 
                                }
                            }
                        });
			   }
	 }
	 });
	 
	 
	 /*$(document).click(function() {
   //$("#dprice").hide(); 
});*/
//$('.mainvalue').focusin(function() {
//$("#dprice").show(); 
//})/*.focusout(function() {
//$("#dprice").hide(); 
//})*/;
/*$(document).click(function (event) {            
   $("#dprice").hide(); 
});*/
///////////////////////////////////////////////////////////////	 
});

</script>
</div>


<input type="hidden" name="product_price" id="product_price" value="<?php foreach($page_data5 as $row){echo $row['prod_price'];}?>">
<input type="hidden" name="product_id" id="product_id" value="<?php foreach($page_data5 as $row){echo $row['prod_id'];}?>">
<input type="hidden" name="seller_id" id="seller_id" value="<?php for ($i=0; $i < count($page_data5); $i++) {  echo $page_data5['0']['seller_id'];}?>">
<!--              hidden-xs-->
<div class="col-lg-12 col-md-12 col-sm-12 " style=" display:none;background-color: #fff;padding: 10px;box-shadow: 0 2px 2px rgba(11, 25, 28, 0.1); border-radius: 5px;"> 
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<div class="" align="center">
<?php
if(($sec_id == 0) || ($sec_id == 1))  { ?> 
<img src="<?php echo base_url();?>images/clk.png" style="height:40px; width:40px;"><br><span>6hr Cancellation<br> Window</span> 
 <?php } else { ?> 
<img src="<?php echo base_url();?>images/clk.png" style="height:40px; width:40px;"><br><span>10 days easy<br> Return </span><?php } ?>
 </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="" align="center">
 <img src="<?php echo base_url();?>images/eco.png" style="height:40px; width:40px;"><br><span>Ecological <br>Products</span>   
 </div>  
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
  <div class="" align="center">
 <img src="<?php echo base_url();?>images/secure.png" style="height:40px; width:40px;"><br><span>Secure Online<br> Payment</span>   
 </div>  
</div>
</div>
</div>

</form>

<style type="text/css">
#errmsg{color: red;}
.rating{margin-left: 10px;margin-top: -8px;}
.revieww{float:left; padding-bottom: 5px;}
</style>
<script type="text/javascript">
$(document).ready(function () {
    
$("#product_quantity").keypress(function (e) {
    
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    
$("#errmsg").html("Digits Only").show();
return false;
}
else
{
    $("#errmsg").hide();
}
});
});
</script>

</div>

</div>
<script type="text/javascript">
    var counter = 1;


function gptxt(ele)
{
    var counter = ele;
    //$( "#textbox"+counter).keyup(function() {                                 
        $(".bag_labels#"+counter).show();
        var text_data = $( "#textbox"+counter).val();

        $(".bag_labels#"+counter).text(text_data);
        caculate_label_co_ordinates(ele);
    //});

}
</script>
<script type="text/javascript">
function show_property(ele){ 
    //[Lp]
    var text_val = $("#textbox"+ele).val(); 
    $(".text_property").attr("id","text_property"+ele); 
    $(".text_property").val(ele);
    $("#text_property"+ele).show();
    $("#text_property_heading").text("Text Properties for :"+text_val);

    var fnt=$("#"+ele).css("font-family").toLowerCase();
    var fntS=$("#"+ele).css("font-size");
    
    if (fnt.indexOf('"') >= 0) {
        fnt = fnt.substring(1, fnt.length - 1);
    }
    
    if($.trim($('#textbox'+ele).val()) != '' && fntS != 'undefined'){
        $('select#size option').each(function () {
            var dfd = $.trim($(this).val());
            if (dfd+'px' == fntS) {
                $(this).prop('selected','selected');
            }
        });
    }
    
    if($.trim($('#textbox'+ele).val()) != '' && fnt != 'undefined'){
        $('select#fs option').each(function () {
            var dfd = $.trim($(this).val()).toLowerCase().toString();
            if (dfd == fnt) {
                //console.log($.trim($(this).val()).toLowerCase() +" & "+ fnt);
                $(this).prop('selected','selected');
            }else{
                //console.log($.trim($(this).val()));
            }
        });
    }   
} 

function remove_text(ele){  
    $('#textbox'+ele).val("");//Lp
    $("#TextBoxDiv"+ele).remove();
    $(".bag_labels#"+ele).html('');
    $(".bag_labels#"+ele).attr('top','');
    $(".bag_labels#"+ele).attr('left','');
    counter--;
}
 $(document).ready(function(){
    $('#place_center').on('click',function()
            { 
                var avoid = "px";
                var div_height = $('.cropped_image_div').height();
                var div_width = $('.cropped_image_div').width();

                var image_height = $('#resizable').height();
                var image_width = $('#resizable').width();

                var image_margin_left = $('#resizable').css('left').replace(avoid,'');
                var image_margin_top = $('#resizable').css('top').replace(avoid,'');

                var margin_for_center_width = (parseInt(div_width)-parseInt(image_width))/2;
                var margin_for_center_height = (parseInt(div_height)-parseInt(image_height))/2;
                $('#resizable').css({'left': margin_for_center_width+'px', 'top': margin_for_center_height+'px'});
                calculate_image_co_ordinates();
            });


     $('#fit_to_screen').on('click',function()
            {
                var parent_height = $('.parent_bag_front ').height();

                $('#resizable').css({'width': '100%', 'height': parent_height+'px', 'left': '0px', 'top': '0px'});
                calculate_image_co_ordinates();
            });



            $('#scale_to_screen').on('click',function()
            {
                var hidden_image = $('#hidden_image').attr('src');

                var avoid = "px";
                var div_height = $('.cropped_image_div').height();
                var div_width = $('.cropped_image_div').width();

                var cropped_image_height = $('#hidden_image').height();
                var cropped_image_width = $('#hidden_image').width();

                // var height_image_for_scale = (parseInt(cropped_image_height)/div_height)*100; 

                // if(height_image_for_scale > div_height)
                // {
                //     height_image_for_scale = div_height;
                // }

                // var width_image_for_scale = (parseInt(cropped_image_width)/div_width)*100; 

                // if(width_image_for_scale > div_width)
                // {
                //     width_image_for_scale = div_width;
                // }

                if(cropped_image_height > cropped_image_width)
                {
                    //alert('height'); 
                    height_image_for_scale = div_height;
                    
                    var scale = cropped_image_height/cropped_image_width;
                    width_image_for_scale = div_width/scale; 
                }
                else
                {
                    //alert('wid'); 
                    width_image_for_scale = div_width;
                    var scale = cropped_image_width/cropped_image_height;
                    height_image_for_scale = div_height/scale; 
                }
                
                //console.log('div_height_'+div_height);
                //console.log('div_width_'+div_width);
                //console.log('height_image_for_scale_'+height_image_for_scale);
                //console.log('width_image_for_scale_'+width_image_for_scale);
                //console.log('scale_'+scale); 
                $('.cropped_image').attr('src',hidden_image);
                $('#resizable').css({'width': width_image_for_scale+'px', 'height': height_image_for_scale+'px','left': '0px', 'top': '0px','max-width': div_width+'px', 'max-height': div_height+'px'});
                //$('#resizable').css({'width': cropped_image_width+'px', 'height': cropped_image_height+'px','max-width': div_width+'px', 'max-height': div_height+'px','left': '0px', 'top': '0px'});
                //$('.cropped_image').css({'max-width': div_width+'px', 'max-height': div_height+'px'});
                calculate_image_co_ordinates();
            });


});   

</script>
<script>

var id = $('.photo_container').attr('id');

$('.photo_container').mouseover(function(){
    $(".jcrop-hline").show();
    $(".jcrop-vline").show();
    $(".jcrop-vline right").show();
    $(".jcrop-hline bottom").show();
    $('.photo_container').resizable({aspectRatio: true,handles: "all",containment:"parent"});
});
$('.photo_container').mouseout(function(){
    $(".jcrop-hline").hide();
    $(".jcrop-vline").hide();
    $(".jcrop-vline right").hide();
    $(".jcrop-hline bottom").hide();
});
function resizeme(ele)
{ 
    $('.newarea').css('width','100%');
    $('.newarea').css('height','100%'); 
    $('.newarea').css('position','absolute');
    $('.newarea').css('top','1px');  
    $('.newarea').css('left','1px');
    $('.photo_container').resizable({aspectRatio: true,handles: "all",containment:"parent"});
}
var bdl_txt = 'reset';  var itlic_txt = 'reset';   var undlin_txt = 'reset';
$(function() {  
 
$('#colorSelector_1').on('click',function()
{
    $('#txt_clr').show();
});

$('#bold_txt').on('click',function()
{
    var id_text = $('.text_property').attr('id');
    var label_id = id_text.substr(id_text.length - 1);
    var pa = $('#para'+label_id).val();
    if(pa[0] == '0') 
    {    
        $('.bag_labels#'+label_id).css('font-weight', 'bold');
        $('#text'+label_id+'_bold').html('true');
        $('#para'+label_id).val('1'+pa[1]+pa[2]);
    }
    else
    {
        $('.bag_labels#'+label_id).css('font-weight', '');
        $('#text'+label_id+'_bold').html('false');
        $('#para'+label_id).val('0'+pa[1]+pa[2]);
    }
});


$('#italic_txt').on('click',function()
{
    var id_text = $('.text_property').attr('id');
    var label_id = id_text.substr(id_text.length - 1);
    var pa = $('#para'+label_id).val();
    if(pa[1] == '0') 
    {    
        $('.bag_labels#'+label_id).css('font-style', 'italic');
        $('#text'+label_id+'_italic').html('true');
        $('#para'+label_id).val(pa[0]+'1'+pa[2]);
    }
    else
    {
        $('.bag_labels#'+label_id).css('font-style', '');
        $('#text'+label_id+'_italic').html('false');
        $('#para'+label_id).val(pa[0]+'0'+pa[2]);
    }
});

$('#underline_txt').on('click',function()
{
    var id_text = $('.text_property').attr('id');
    var label_id = id_text.substr(id_text.length - 1);
    var pa = $('#para'+label_id).val();
    if(pa[2] == '0') 
    {    
        $('.bag_labels#'+label_id).css('text-decoration', 'underline');
        $('#text'+label_id+'_underline').html('true');
        $('#para'+label_id).val(pa[0]+pa[1]+'1');
    }
    else
    {
        $('.bag_labels#'+label_id).css('text-decoration', 'none');
        $('#text'+label_id+'_underline').html('true');
        $('#para'+label_id).val(pa[0]+pa[1]+'0');
    }
});

$( "#underline_txt").click(function() {   
    var count = $(".text_property").val();
    if(undlin_txt == 'reset'){$('.lable'+count).css("text-decoration", "underline"); undlin_txt = 'set';}
    else {  $('.lable'+count).css("text-decoration", "none");   undlin_txt = 'reset';  }
}); 

$('#fs').on('change',function()
{
    var font = $(this).val();
    var id_text = $('.text_property').attr('id');

    var label_id = id_text.substr(id_text.length - 1);
    $('.bag_labels#'+label_id).css('font-family',font);
    $('#text'+label_id+'_font').html(font);
});

$('#size').on('change',function()
{

    var size = $(this).val();
    var id_text = $('.text_property').attr('id');

    var label_id = id_text.substr(id_text.length - 1);

    $('.bag_labels#'+label_id).css('font-size',size+'px');
    $('#text'+label_id+'_size').html(size);
});

var id_value = $('#active_product').attr('value');
var sub_id_val = $('#'+id_value).find('.front_bag_image').attr('id');

for (var i = 1; i <=5; i++) {
    $('.lable'+i).draggable({
        containment:"parent",
    });
};

});
var gusset_index;
function change_bag_texture(ele) { 
    var texture = ele.split(',');
    //alert(texture['1']); 

    if(!(texture['2']==11 || texture['2']==12))
    {
        //$('.'+texture['0']).mouseover(function () {                      
            $("._3dface--top").css('background-image','url('+texture['1']+')');
        //}); 
        //$('.'+texture['0']).mouseover(function () {                      
            $("._3dface--back").css('background-image','url('+texture['1']+')');
        //});                      
        //$('.'+texture['0']).mouseover(function () {                      
            $("._3dface--left").css('background-image','url('+texture['1']+')');
        //}); 
        //$('.'+texture['0']).mouseover(function () {                      
            $("._3dface--right").css('background-image','url('+texture['1']+')');
        //});                    
    }
    else
    {
        //alert(texture['1']);
        var active_id = $('#active_product').attr('value');
        var parent_div_id = $('#'+active_id).closest('div').find('.parent_bag_front').attr('id');        
        $(".parent_bag_front").css('background-image','url('+texture['1']+')');

    }
}
$("#addButton").click(function () {
$(".text_property").hide();
if(counter>5){ //    alert("Only 5 textfields are allow");
return false;
}   

var newTextBoxDiv = $(document.createElement('div'))
.attr("id", 'TextBoxDiv' + counter);
newTextBoxDiv.attr("class",'input-group');

newTextBoxDiv.html('<input type="text" class="form-control div_for_label_style" name="textbox' + counter + '" id="textbox' + counter + '"  class="text" onclick="clicked('+counter+')">'+'<span class="input-group-addon properties glyphicon glyphicon-th" id="'+counter+'" onclick="show_property('+counter+')"></span>'+'<span class="input-group-addon other glyphicon glyphicon-remove" id="'+counter+'"  onclick="remove_text(this.id)" val="removeButton'+counter+'"></span>');

var textid = 'TextBoxDiv' + counter;
newTextBoxDiv.appendTo("#TextBoxesGroup");

$(".bag_labels#"+counter).show();

counter++;
});

function change_handle_texture(ele) {
    var texture = ele.split(',');
    //console.log(texture);
    //$('.'+texture['0']).mouseover(function () { 
    
$("._3dface--front_handle").css('background-image','url('+texture['1']+')');
//}); 
//    $('.'+texture['0']).mouseover(function () {                      
        $("._3dface--back_handle").css('background-image','url('+texture['1']+')');
 //   });                  

}

function change_gusset_texture(ele) {
    var texture = ele.split(',');
    
//$('.'+texture['0']).mouseover(function () {                      
    $("._3dface--left").css('background-image','url('+texture['1']+')');
//}); 
//$('.'+texture['0']).mouseover(function () {                      
    $("._3dface--right").css('background-image','url('+texture['1']+')');
//});
//$('.'+texture['0']).mouseover(function () {                      
    $("._3dface--top").css('background-image','url('+texture['1']+')');
//}); 

//$('.'+texture['0']).mouseover(function () {                      
    $("._3dface--back").css('background-image','url('+texture['1']+')');
//}); 


}

if (gusset_index=="") {gusset_index = "._3dface--top";};


</script>

<script src="<?php echo base_url();?>js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.Jcrop.min.css" type="text/css" />
<div id="popup_upload">
    <div class="form_upload" style="width: 454px;height: 300px;">
        <span class="close" onClick="close_popup('popup_upload')">x</span>
        <h2>Upload photo</h2>
        <form action="<?php echo base_url();?>upload_photo" method="post" enctype="multipart/form-data" target="upload_frame" onSubmit="submit_photo()">
            
            <input type="file" name="img" id="img" class="file_input"/>
            <div id="loading_progress"></div>
            <input type="submit" value="Upload photo" id="upload_btn">
        </form>
        <hr style="margin-top: 67px;border: 1px solid #4C4C4C;border-style: dotted;">NOTE : <br>UPLOAD IMAGE DIMENSION : 305 X 254mm<br>FORMATS : JPG | JPEG | PNG<br>RESOLUTION : 300DPI
        <iframe name="upload_frame" class="upload_frame"></iframe>
    </div>
</div>
<style type="text/css">

.xyz{margin: 10px 18px;padding: 17px 22px;background-color: #f2f2f2;float: left;border-radius: 5px;}
#hidden_image{display: none}
.jcrop-holder{width: 1177px;height: 870px;/* position: absolute; */top: -2px;left: -2px;z-index: 290;cursor: crosshair;}
.t1 {float:left;padding:7px 20px;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;}
.fa-th{font-size: 18px;padding: 7px;background-color: #f2f2f2;}
.fa-times{font-size: 18px;padding: 7px;background-color: #f2f2f2; }
.plm{ font-size: 22px;    color:#94c766;font-family: "Poppins";font-weight: 400;text-align: justify;}
.pl{font-size: 18px;color: #000;font-family: "Poppins";font-weight: 500;margin-bottom: 3px;}

/* Loaded 
.loaded #loader-wrapper .loader-section.section-left {
    -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
    /*-ms-transform: translateX(-100%); */ /* IE 9 */
    /*transform: translateX(-100%);*/  /* Firefox 16+, IE 10+, Opera 
}
 
.loaded #loader-wrapper .loader-section.section-right {
    -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
   /* -ms-transform: translateX(100%);*/  /* IE 9 */
    /*transform: translateX(100%);*/  /* Firefox 16+, IE 10+, Opera 
}
.loaded #loader {
    opacity: 0;
}
.loaded #loader-wrapper {
    visibility: hidden;
}
.loaded #loader {
    opacity: 0;
    -webkit-transition: all 0.3s ease-out; 
            transition: all 0.3s ease-out;
}
.loaded #loader-wrapper .loader-section.section-right,
.loaded #loader-wrapper .loader-section.section-left {
 
    -webkit-transition: all 0.3s 0.3s ease-out; 
            transition: all 0.3s 0.3s ease-out;
}
.loaded #loader-wrapper {
        -webkit-transform: translateY(-100%);
            -ms-transform: translateY(-100%);
                transform: translateY(-100%);
 
        -webkit-transition: all 0.3s 0.6s ease-out; 
                transition: all 0.3s 0.6s ease-out;
}*/
/*.jcrop-tracker
{
    width: 1176px;
    height: 870px;
    position: absolute;
    top: -2px;
    left: -2px;
    z-index: 290;
    cursor: crosshair;
}*//*
.loaded #loader-wrapper .loader-section.section-right,
.loaded #loader-wrapper .loader-section.section-left {
 
    -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000); 
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
}*/

</style>
<script>


$(function () {
    var x1 = 0,
    y1 = 0,
    tw = 0,
    th = 0,
rw = 300, 
rh = 200; 

/*$('#cropbox').imgAreaSelect({
    handles: false,
    onSelectEnd: setValue,
    onSelectChange: preview,
    
fadeSpeed: 200,
minWidth: 50,
minHeight: 50,
});*/


function setValue(img, selection) {

    if (!selection.width || !selection.height)
        return;
    x1 = selection.x1;
    y1 = selection.y1;
    tw = selection.width;
    th = selection.height;
}


function getCImage() {

    $('#popup_crop').hide();

    $('.imgareaselect-outer').hide();
    $('.imgareaselect-border1').hide();
    $('.imgareaselect-border2').hide();
    $('.imgareaselect-border3').hide();
    $('.imgareaselect-border4').hide();
    $(".imgareaselect-selection").parent().removeAttr( 'style' );
    $('.imgareaselect-selection').parent().css( {'position':'fixed','z-index':'101'});

    
var base_url = window.location.origin;
$load_img = '<?php echo base_url();?>'
$('.photo_container').html('<img src='+base_url+'/images/loader.gif id="newarea"> Processing...');

$.ajax({type: "GET",
url: "<?php echo base_url();?>crop_image/?img=" + $("#imgName").val() + "&w=" + tw + "&h=" + th + "&x1=" + x1 + "&y1=" + y1 + "&rw=" + rw + "&rh=" + rh,
cache: false,
success: function (response) { // $('#cropbox').imgAreaSelect({remove:true});
        
var set_w = ((57/th)*100);
var set_h = ((65/tw)*100);
if(set_w > 56 || set_h > 65 ){set_w = set_w/2; set_h = set_h/2; } else if(set_w < 29 || set_h < 32){set_w = set_w + 12; set_h = set_h + 12; }

$('.photo_container').html(response);
var id = $('.photo_container').attr('id');
$('#'+id).show();
$('.photo_container').show();
$('.photo_container').draggable({
    containment:"parent"
});
$('.photo_container').css({'width': set_w+'%', 'height': set_h+'%', 'display': 'block'});
$('.imgareaselect-selection').removeAttr( 'style' );
$('.imgareaselect-selection').css( {'position':'absolute','font-size':'0px'});
$('.imgareaselect-outer').removeAttr( 'style' );
$('.imgareaselect-outer').css({'position':'fixed','z-index':'99'});
$('.imgareaselect-border1').removeAttr( 'style' );
$('.imgareaselect-border1').css({'position':'absolute','font-size':'0px'});
$('.imgareaselect-border2').removeAttr( 'style' );
$('.imgareaselect-border2').css({'position':'absolute','font-size':'0px'});
$('.imgareaselect-border3').removeAttr( 'style' );
$('.imgareaselect-border3').css({'position':'absolute','font-size':'0px'});
$('.imgareaselect-border4').removeAttr( 'style' );
$('.imgareaselect-border4').css({'position':'absolute','font-size':'0px'});

},
error: function () {
    alert("error on ajax");
},
});
}
function preview(img, selection) { 
if (!selection.width || !selection.height) {
return;
}
var scaleX = rw / selection.width;
var scaleY = rh / selection.height;
$('#preview img').css({
width: Math.round(scaleX * img.width),
height: Math.round(scaleY * img.height),
marginLeft: -Math.round(scaleX * selection.x1),
marginTop: -Math.round(scaleY * selection.y1)
});
}

$("#cropbtn").click(function () {getCImage();});

});
</script>
<!-- The popup for crop the uploaded photo -->
<div id="popup_crop">
    <div class="form_crop">
        <span class="close" onClick="close_popup('popup_crop')">x</span>
        <h2>Crop photo</h2>
        <!-- This is the image we're attaching the crop to -->
        <img id="cropbox" style="max-width: 1000px;max-height: 460px;"/>

        <input type="hidden" name="imgName" id="imgName" />

        <!-- This is the form that our event handler fills -->

        <div class="col-md-12">
            <br>
            <input type="button" class="btn btn-primary" value="Crop Image" id="cropbtn" />
        </div>
    </div>

</div>
<div class="col-md-12">

    <div class="modal fade" id="modal-container-176045" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Product Preview
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">

                        <div id="myproduct_preview" class="myproduct_preview">

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div> 
</div>

<input type="text" id="active_product" value="<?php //echo $active_product;?>" style="display:none">
<input type="text" id="parent_id"  style="display:none">
<input type="text" id="bag_front_id"  style="display:none">
<input type="text" id="bag_left_id"  style="display:none">
<input type="text" id="bag_handle_id"  style="display:none">
<div class="tabing bounceInUp table-responsive" style="margin-top: 5px;">
    <ul class="nav nav-tabs nav-justified">
   
         <?php   $v='active'; ?>
        <li id ='active2' class="<?php echo $v; ?> "><a href="#moreinfo" data-toggle="tab" style="font-size: 14px;">Product Details</a></li>
        <li id ='active4'><a href="#caretips" data-toggle="tab" style="font-size: 14px;">Reviews</a></li>
        <!--<li id ='active3'><a href="#information" data-toggle="tab" style="font-size: 14px;">Quantity Vs Price</a></li>
        -->
    </ul>
  

<div class="tab-content">
<?php  $v='active';
 ?>
    <div class="tab-pane " id="information" style="padding:22px;">
    <table class="table">
        <thead>
            <tr>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sell Price</th>
                <th>Discount</th>
               <!-- <th>Weight in KG</th>-->
            </tr>
        </thead>
        <tbody>
            <?php

            if (isset($quantity_price) && $quantity_price!="") {
                foreach($quantity_price as $row){ if($row['quantity']==0){}else{?>
                <tr>
                    <td><?php echo $row['quantity'];?></td>
                    <td><i class="fa fa-rupee"></i> <?php echo $row['sell_price']*$row['quantity'];?></td>
                    <td><i class="fa fa-rupee"></i> <?php echo $row['sell_price'];?></td>
                    <td><?php echo round($row['discount'],2);?> %</td>
                    <!--<td><?php // echo $row['wcc'];?></td>-->
                </tr>

                <?php  }}}else{?>
            <tr>
                <td><?php echo "Not Available";?></td>
            </tr>
            <?php }
            ?>         
        </tbody>
    </table>
</div>
<div class="tab-pane table-responsive <?php echo $v;?>" id="moreinfo">
    <div class="bs-example" style="padding:18px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">Product ID: <?php foreach($page_data5 as $row){ echo $row['prod_id']; } ?></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamic Rows [Lp] -->
                <?php 
                    // Product Name
                    if(isset($product_details['0']['prod_name']) && $product_details['0']['prod_name']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Material Name</td>";  
                            if($section_id != 2) { echo "<td>".$product_details['0']['prod_name']."</td>"; }
                            else { echo "<td>".$product_details['0']['product_material']."</td>"; }
                        echo "<tr>";
                    }
                    
                    // GSM / Weight 
                    if(isset($product_details['0']['GSM_name']) && $product_details['0']['GSM_name']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>GSM / Weight carrying capacity</td>";
                            echo "<td>".$product_details['0']['GSM_name']."</td>";
                        echo "<tr>";
                    }
                    
                    // Style USES $product_style_details
                    if(isset($product_style_details['0']['style_id']) && $product_style_details['0']['style_id']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Style</td>";
                            echo "<td>".$product_style_details['0']['style']."</td>";
                        echo "<tr>";
                    }
                    
                    // Size
                    if(isset($product_details['0']['size']) && $product_details['0']['size']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Size</td>";
                            echo "<td>".$product_details['0']['size']."</td>";
                        echo "<tr>";
                    }else if(isset($product_details['0']['product_material_size']) && $product_details['0']['product_material_size']!='') {
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Size</td>";
                            echo "<td>".$product_details['0']['product_material_size']."</td>";
                        echo "<tr>";
                    }
                    
                    // Handle
                    if(isset($product_details['0']['handle']) && $product_details['0']['handle']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Handle Type</td>";
                            echo "<td>".$product_details['0']['handle']."</td>";
                        echo "<tr>";
                    }
                    
                    // Handle Size
                    if(isset($product_details['0']['handle_size']) && $product_details['0']['handle_size']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Handle Size</td>";
                            echo "<td>".$product_details['0']['handle_size']."</td>";
                        echo "<tr>";
                    }
                    
                    // Handle Color
                    if(isset($product_details['0']['handle_color']) && $product_details['0']['handle_color']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Handle Colour</td>";
                            echo "<td>".$product_details['0']['handle_color']."</td>";
                        echo "<tr>";
                    }
                    
                    // Print
                    if(isset($product_details['0']['print']) && $product_details['0']['print']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Print</td>";
                            echo "<td>".$product_details['0']['print']."</td>";
                        echo "<tr>";
                    }

                    // Gusset
                    if(isset($product_details['0']['gusset']) && $product_details['0']['gusset']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Gusset</td>";
                            if($product_details['0']['gusset'] == 2) { echo "<td> Side Gusset</td>"; }
                            elseif($product_details['0']['gusset'] == 3) { echo "<td> Bottom Gusset</td>"; }
                            elseif($product_details['0']['gusset'] == 4) { echo "<td> Side and Bottom Gusset</td>"; }
                            else { echo "<td> No Gusset</td>"; }
                        echo "<tr>";
                    }
                    
                    // Product Color
                    if(isset($product_details['0']['product_material_color']) && $product_details['0']['product_material_color']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Product Color</td>";
                            echo "<td>".$product_details['0']['product_material_color']."</td>";
                        echo "<tr>";
                    }else{ /*
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Product Color</td>";
                            echo "<td> As per Customization</td>";
                        echo "<tr>"; */
                    }
                    
                    // Number Of Color Options
                    if(isset($product_details['0']['print_color']) && $product_details['0']['print_color']!=''){ 
                        $color=$product_details['0']['print_color'];
                        if($product_details['0']['print_color'] == 'M'){
                            $color="Multi Color";
                        }
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Number Of Prints</td>";
                            echo "<td>".$color." Color print</td>";
                        echo "<tr>";
                    }
                    
                    // Lamination
                    if(isset($product_details['0']['lamination']) && $product_details['0']['lamination']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Lamination</td>";
                            echo "<td>".$product_details['0']['lamination']."</td>";
                        echo "<tr>";
                    }

                    //Lid
                    if($category_id == 26 && isset($product_details['0']['lid']) && $product_details['0']['lid']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Lid</td>";
                            echo "<td>".$product_details['0']['lid']."</td>";
                        echo "<tr>";
                    }
                    
                    // Compartments
                    if(isset($product_details['0']['compartment']) && $product_details['0']['compartment']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Compartment</td>";
                            echo "<td>".$product_details['0']['compartment']."</td>";
                        echo "<tr>";
                    }
                    
                    // Volume
                    if(isset($product_details['0']['volumn']) && $product_details['0']['volumn']!=''){ 
                        echo "<tr>"; 
                            echo "<td style='background-color: rgba(220, 220, 220, 0.21);width: 32%;'>Volume</td>";
                            echo "<td>".$product_details['0']['volumn']."</td>";
                        echo "<tr>";
                    } 
                ?>
                
            </tbody>
        </table>
    </div> 
    <div class="bs-example" style="padding:18px;">
        <div class="pl"> Description</div>
        <div class="ygv">
        <p><?php echo $product_details['0']['prod_description']; ?></p>
        </div>
    </div>
    <div class="bs-example" style="padding:18px;">
       <div class="pl"> Tags:</div>
       <div class="yg">
            <?php
                $tagarr=explode(",",$product_details['0']['taggings']);
                $arrlen=sizeof($tagarr);
                $arrlen= $arrlen - 1;
                for($i=0;$i<$arrlen;$i++){
                    echo "<span class='tagst' id=".$tagarr[$i].">".$tagarr[$i]."</span>&nbsp;&nbsp;";
                }
            ?>
       </div>
    </div>

</div>
<div class="tab-pane" id="caretips" style="padding:18px;">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="rew_blk clearfix" >

                <div class="top_row clearfix" >
                <?php //Lp
                $noOfReviews = sizeof($review);
        for($r=0;$r<$noOfReviews;$r++){
            if((isset($this->session->userdata['logged_in']['id']) && isset($review[$r]['user_id']))&&$this->session->userdata['logged_in']['id'] == $review[$r]['user_id']){
                $link = base_url()."deleteReview/".$this->session->userdata['logged_in']['id']."/".$review[$r]['prod_id'];
                $deleteButton="<a href='".$link."'><i class='fa fa-trash-o' aria-hidden='true' style='color: red;font-size:20px;'></i></a>";
            }else{ $deleteButton="";}
            $stars = $review[$r]['start_rating'];
            echo"<div style='padding-bottom: 68px;box-shadow: 1px 2px 7px #8883;-webkit-box-shadow: 1px 2px 7px #8883; margin-left: 11px;margin-right: 29px;margin-bottom: 17px;'><div class='col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10'><div class='col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9'><b>".$review[$r]['one_word']."</b></div><div class='col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3'>";
            for($x=1;$x<=$stars;$x++) {
                    echo "<li class='fa fa-star' style='color:#fbcf00'></li>";
                    }
                    while ($x<=5) {
                    echo "<li class='fa fa-star' ></li>";
                    $x++;
                    }
            echo"</div><div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 '><span class='fa fa-user'></span>&nbsp;&nbsp;".$review[$r]['user_name']."</div><div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>".$review[$r]['details']."</div></div><div class='col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2' style='text-align: center;padding-top: 18px;'>".$deleteButton."</div></div>";
        }
                ?>

<ul class="start_list">
    <?php 
    /*
    foreach ($review as $id)
    {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<table style='margin-left: -500px; width: 500px;'>";
        echo "<tr>";
        echo "<td ><b>".$id['one_word']."</b></td>";
        echo "</tr>";
        echo "<tr>";                  
        echo "<td colspan=2>".$id['details']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>"."<span class='fa fa-calendar'></span>"."&nbsp&nbsp".$id['date']."</td>";

        echo "<td>"."<span class='fa fa-user'></span>"."&nbsp&nbsp".$id['user_name']."</td>";

        echo "<td align='justify'>";

        echo '<ul class="start_list" style="float:left;">';
        
        for($i=1;$i<=5;$i++){

            $rating_active = "";
            if($i<=$id['start_rating'])
                {
                $rating_active = "style='color: #fbcf00;'"; ?> 
                <li class="fa fa-star" <?php echo $rating_active; ?> ></li>
            <?php }
            else{ ?>
                <li class="fa fa-star"></li>
                <?php  
                }
        }
echo "</ul></td>";
echo "</tr>";
echo "</table>";
}*/
?></ul>


</div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="frm rew_frm">
        <h5>Write a review</h5>
        <form id="review_form" method="post">
            <div class="row first_row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lbltxt">Your Name: <span class="req">*</span></div>
                    <input type="hidden" name="my_user_id" value="<?php if(isset($this->session->userdata['logged_in']['id'])) { echo $this->session->userdata['logged_in']['id']; } ?>">
                    <input type="text" class="txtbox display_name" value="<?php if(isset($this->session->userdata['logged_in']['id'])) { echo $this->session->userdata['logged_in']['username'];} ?>" name="reviewer_name" id="reviewer_name">
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lbltxt">E-mail:<span class="req">*</span></div>
                    <input type="text" class="txtbox email_id" value="<?php if(isset($this->session->userdata['logged_in']['id'])) { echo $this->session->userdata['logged_in']['email_id']; }?>" name="reviewer_email" id="reviewer_email">
                    <lable id="error_reviewer_email"></lable>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lbltxt">One Word:<span class="req">*</span></div>
                    <input type="text" class="txtbox one_word" name="review_one_word" id="review_one_word">
                    <input type="hidden" name="product_id" value="<?php foreach($page_data5 as $row){ echo $row['prod_id']; }  ?>">
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="lbltxt">Rate on a scale:</div>
                    <ul class="start_list">
                        <li class="fa fa-star" id="star_1"></li>
                        <li class="fa fa-star" id="star_2"></li>
                        <li class="fa fa-star" id="star_3"></li>
                        <li class="fa fa-star" id="star_4"></li>
                        <li class="fa fa-star" id="star_5"></li>
                    </ul>
                </div>
            </div>
            <input type="hidden" name="rate_review" id="rate_review">
            <div class="lbltxt">Message: <span class="req">*</span></div>
            <textarea class="prod_details" name="review_details" id="review_details" style="max-width: 480px;max-height: 100px;"></textarea>
            <lable id="error_review_details" style="color:red"></lable>
            <div class="clearfix frm_bot">
                <?php if (isset ($this->session->userdata('logged_in')['email_id']))
                {
                    ?>
                    <input type="button" class="btn_c" value="SUBMIT" id="submit_review" >
                    <input type="reset" class="clear_btn" value="CLEAR">
                    <?php 
                }
                else {
                    ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_model">
                        PLEASE LOGIN TO REVIEW </button>
                        <?php } ?>  
                        <span class="reqired" id="error_submit_review" style="display:none">* Required Fields</span> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
$(function() {
$('#inputImage').click(function(){ $('#crpimage').attr('disabled',false);});
});

function checkreview() { $('#login_model').show(); $('#login_model').addClass('in'); }

$(function(){
$(".fa-star").click(function(){
var starrating = $(this).attr('id');
var num = starrating.split('_');
for(var i=1;i<=5;i++){
if(i<=num[1]){
$("#star_"+i).css('color','#FBCF01');
}else{
$("#star_"+i).css('color','#D7DBDB');
}
}
$("#rate_review").attr('value',num[1]);
});

$("#submit_review").click(function(){
if($("#reviewer_name").val() != '' && $("#reviewer_email").val() != '' && $("#rate_review").val() != '' && $("#review_details").val() != ''){
$("#submit_review").prop('type','submit');
$("#review_form").attr('action','<?php echo base_url(); ?>catalog/submit_prod_review');
}else{ 
$("#error_submit_review").text("All fields are mandatory.");
$("#error_submit_review").css('color','red');
$("#error_submit_review").show();
}
});
});
</script>
<?php if(count($recent_view) < 4) { ?> <script> $(document).ready(function(){ $(".bx-controls-direction").hide(); }); </script>
<?php } ?> 
<div class=" animated  fadeInUp hidden-xs" data-animation="fadeInUp">
<div class="clearfix"><h3>RECOMMENDED PRODUCTS</h3></div><br>
<div class="row view-grid animated  fadeInUp" data-animation="fadeInUp" >
<div id="slider5" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
         
<?php 	
$i=0;
$this->load->library('../controllers/encryption');
$this->encrypt = new Encryption();  
if(isset($_COOKIE))
{
    foreach($recent_view as $row)
    {
        $url = $row['section_id'].'/'.$row['cat_id'].'/'.$row['sub_cat_id'];
        $url1 = explode('_',$row['prod_id']);
        $data["price_vs_quantity"] = $this->common_model->price_vs_qty($row['prod_id']);
        if($row['material_id'] == ''){
            $material_name = $row['product_material'];
            $material_name = str_replace(' ', '-',$material_name);
        }
        else
        {
            $material_name = $this->common_model->getsubmaterial_filter($row['material_id']);
            $material_name = str_replace(' ', '-',$material_name['0']['material_name']);
        }
        
        if(isset($data["price_vs_quantity"]) && count($data["price_vs_quantity"])>0){
        foreach ($data["price_vs_quantity"] as $row1) {
        if($row1['mrp'] !=0){
        $price_vs_quantity = $row1;
        }
		}
        }
	
        $encrypt_url = $this->encrypt->encode($url);
        $encrypt_url1 = $this->encrypt->encode($url1[0]);
        echo "<div class=''>";
        echo "<div class='main_box'>";?> 
        <div class="box_1"> <img alt="alt" style="max-height: 203px;max-width:259;height: 203px;" src="<?php echo base_url()?>upload/products/<?php echo $row['prod_image1'] ?>" draggable="false">
            <div class="overlay" id="add_to"> 
                <?php
                if ($row['section_id']==2 || $row['section_id']==3) { 
                    $category_name = $this->common_model->getcategory_name($row['cat_id'],$row['section_id']);  
                    $section_name = $this->common_model->section_name($row['section_id']);
                    $sub_cat_name = $this->common_model->getsubcategory_details($row['section_id'],$row['cat_id'],$row['sub_cat_id']);
                    ?>
                    <a href="<?php echo base_url(); ?><?php if(isset($section_name['0']['section_name'])){ 
					$section_name = str_replace(' ', '-',$section_name['0']['section_name']);
					 echo strtolower($section_name); } ?>/<?php if(isset($category_name['0']['cat_name'])){ 
					 $cat_name = str_replace(' ', '-',$category_name['0']['cat_name']);
					  echo strtolower($cat_name); } ?>/<?php if(isset($sub_cat_name['0']['sub_cat_name'])){
				     $sub_cat_name = str_replace(' ', '-',$sub_cat_name['0']['sub_cat_name']); 
					echo strtolower($sub_cat_name); } ?>/<?php if($row['section_id']!='2'){
					echo strtolower($material_name)."/".$url1[1]; }else { 
					$material_comm = str_replace(',', '',$row['prod_name']);  //$entry = str_replace(",", "",$entry);
					 $material = preg_replace('/[^a-zA-Z0-9-.]/', '', $material_comm);
					echo strtolower($material)."/".$url1[1]; }?>" class="btn_c cart_btn_1">BUY NOW</a> 

                <?php
                }else{
                    $category_name = $this->common_model->getcategory_name($row['cat_id'],$row['section_id']);  
                    $section_name = $this->common_model->section_name($row['section_id']);
                    $sub_cat_name = $this->common_model->getsubcategory_details($row['section_id'],$row['cat_id'],$row['sub_cat_id']);
                    ?>
                    <a href="<?php echo base_url(); ?><?php if(isset($section_name['0']['section_name'])){
						 $section_name = str_replace(' ', '-',$section_name['0']['section_name']); 
						 echo strtolower($section_name); } ?>/<?php if(isset($category_name['0']['cat_name'])){ 
						 $cat_name = str_replace(' ', '-',$category_name['0']['cat_name']);
						  echo strtolower($cat_name); } ?>/<?php if(isset($sub_cat_name['0']['sub_cat_name'])){ 
						  $sub_cat_name = str_replace(' ', '-',$sub_cat_name['0']['sub_cat_name']); 
						  echo strtolower($sub_cat_name); } ?>/<?php if($row['section_id']!='2'){ 
						  echo strtolower($material_name)."/".$url1[1]; }else {
					      $material_comm = str_replace(',', '',$row['prod_name']);  //$entry = str_replace(",", "",$entry);
						 $material = preg_replace('/[^a-zA-Z0-9-.]/', '', $material_comm);
					      //$material = str_replace(' ', '-',$material_comm); 
						  echo strtolower($material)."/".$url1[1]; }?>" class="btn_c cart_btn_1">CUSTOMIZE</a>                       
                    <?php }
                    ?>
            </div>
        </div>

<div class="desc" style="height: 139px;max-height:139px;">
<h5><?php echo $row['prod_name']; ?></h5>
<strong ><?php //[Lp]
if($row['print_color'] !='' && $row['print_color'] !="M"){
echo $row['print_color']." colour print option.";
}else{
if($row['print_color'] =="M"){
echo "Multi colour print option.";
} }?></strong>

<p style="padding-top: 16px;"><?php if(isset($data["price_vs_quantity"]) && $data["price_vs_quantity"]!=0) { echo "MOQ : ".$data["price_vs_quantity"]['0']['quantity']." quantity"; } ?></p>
<?php $wt = explode('-', $row['GSM_name']); ?>
<p style="font-size: 15px;" class="price"><span style="text-decoration: line-through;">Rs. <?php if(isset($data["price_vs_quantity"]) && $data["price_vs_quantity"]!=0) {echo $data["price_vs_quantity"]['0']['mrp']; }?></span>&nbsp;&nbsp; Rs. <?php if(isset($data["price_vs_quantity"]) && $data["price_vs_quantity"]!=0) {echo $data["price_vs_quantity"]['0']['sell_price']; }?>&nbsp;&nbsp;| <?php if(isset($data["price_vs_quantity"]) && $data["price_vs_quantity"]!=0) { echo round($data["price_vs_quantity"]['0']['discount'],2); }?>% Off</p><p style="margin-top: -15px;"><?php if(isset($wt[0]) && isset($wt[1]) && $wt!=0) { echo ' GSM - '.$wt[0].' | WCC - '.$wt[1]; }?></p>
</div>
</div>
</div>
<?php     }  }?>
</div>
</div>

</div>

</div>
</div>
</div>
</div>

<div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4></div>
<div class="modal-body"></div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url().'js/';?>cropper.js"></script>
<script src="<?php echo base_url().'js/';?>main.js"></script>
<div class="container">
    <!-- Modal-->
<div class="modal fade" id="myModal_image" role="dialog" style="overflow-y: auto;">
<div class="modal-dialog" role="document"> <!-- Modal content-->
<div class="modal-content" id="m" style="width:790px; height:auto; z-index: -1;">
<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></div>
<div class="modal-body"  style="max-width: 750px; max-height: 600px; min-height: 200px; min-width: 300px;"><img src="" id="image" ></div>
<div class="modal-footer">
<div class="docs-buttons">
<div class="btn-group btn-group-crop"><button type="button" id="crpimage" class="btn btn-primary" data-method="getCroppedCanvas">
<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">Crop Image</span> 
</button>
</div>
</div>
</div> 
</div><!-- End of Modal content-->
</div>
</div>
    <!-- End of Modal -->

</div>
<script type="text/javascript">
$(document).ready(function(){
$("#dp").click(function(){/*$("#dprice").toggle();*/});});

function rmvcls(t){ $('#'+t).children().removeClass('border_cls'); }
function adcls(t){ $('#'+t).children().addClass('border_cls'); }


$(document).ready(function(){
var is_custome = $('#is_custom').val();
if((is_custome ==  1) || (is_custome ==  0)){ 
$('.paper_product').removeClass('hide_this_div');
} 
});
function st_rst(s){
$(".back_bag_image").css("display","block"),flg2=s;/*alert(flg2);*/
}
var flg="set",rmvdv,flg2="frt";
$(document).ready(
function(){
$("#parent_bag_container").hover(function(){
"frt"==flg2&&($(".back_bag_image").css("display","none"),$("._3dbox").css("transform-style","flat"))
},
function(){
$(".back_bag_image").css("display","block"),$("._3dbox").css("transform-style","preserve-3d")
})
});

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1139606612801567',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</div>


<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function() {
$('.pmpop').on('click', function() {console.log("pmpop");
$('.imagepreview').attr('src', $(this).find('img').attr('src'));
$('#imagemodal').modal('show');   
});     
});
</script>