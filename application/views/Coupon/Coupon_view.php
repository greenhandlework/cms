
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Coupon page</title>
  <?php $this->load->view('hfs/html_header') ?>
</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <!-- Layout sidenav -->
      <?php $this->load->view('hfs/sidebar') ?>
      <!-- / Layout sidenav -->

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
       <?php  $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
         <div class="container-fluid flex-grow-1 container-p-y">

           <div class="page-content"> 
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12"> 
                  <h3 class="page-title">
                     Coupon System
                  </h3> 
				   		
               </div>
            </div>
            <script>
			function Apply_For(m){
	var value=m.value;
	if(value=="Iteam"){
		$('.Iteam_load').css("display", "block");
	}else{
		$('.Iteam_load').css("display", "none");
	}
}
			</script>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM PORTLET-->   
				 
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i></h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a> 
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form" id="from_change">
                        <!-- BEGIN FORM-->
							<!-- <form action="#" /> -->
                        <form action="#"   class="form-horizontal" method="post" enctype="multipart/form-data" />
                        <div class="row-fluid">
                        
                        <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Coupon Apply For</label>
                              <div class="controls Section_name">
      									<select class="form-control" id="Apply_For" name="Apply_For" onchange="Apply_For(this)">
                                          <option  value="">--Select--</option>
  <option  value="Iteam">Each Product</option>
  <option  value="Total">Total</option>
 
  </select>
                              </div>
                              </div>
                              </div>
                        
                        </div>
                      <div class="Iteam_load" style="display:none;">  
                        <div class="row-fluid">
                        
                        <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Section</label>
                              <div class="controls Section_name">
      									<select class="form-control" id="Section_name" name="c31[]" multiple="multiple" aria-describedby="c31-help-block" data-rule-required="true" >
  <?php foreach($Sectionlist as $list){?>
  <option  value="<?php echo $list['section_id']; ?>"><?php echo $list['section_name']; ?></option>
  <?php } ?>
  </select>
                              </div>
                              </div>
                              </div>
                        
                        </div>
                        
                        <div class="row-fluid">
                        
                        <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Category</label>
                              <div class="controls Section_name">
      									<select class="form-control" id="Category_name" name="Category_name[]" multiple="multiple" aria-describedby="c31-help-block" data-rule-required="true" >
  <?php foreach($Categorylist as $clist){?>
  <option  value="<?php echo $clist['cat_id']; ?>"><?php echo $clist['cat_name'].' ('.$clist['section_name'].' )'; ?></option>
  <?php } ?>
  </select>
                              </div>
                              </div>
                              </div>
                        
                        </div>
                        
                        <div class="row-fluid">
                        
                        <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Sub Category</label>
                              <div class="controls Section_name">
      									<select class="form-control" id="SubCategory" name="SubCategory[]" multiple="multiple" aria-describedby="c31-help-block" data-rule-required="true" >
  <?php foreach($SubCategorylist as $list){?>
  <option  value="<?php echo $list['sub_subcat_id']; ?>"><?php echo $list['sub_subcat_name'].' ('.$list['cat_name'].') '.' ('.$list['section_name'].') '; ?></option>
  <?php } ?>
  </select>
                              </div>
                              </div>
                              </div>
                        
                        </div>
                        
                        <div class="row-fluid">
                        
                        <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Product</label>
                              <div class="controls Section_name">
      									<select class="form-control" id="Productlist" name="Productlist[]" multiple="multiple" aria-describedby="c31-help-block" data-rule-required="true" >
  <?php foreach($Productlist as $list){?>
  <option  value="<?php echo $list['prod_id']; ?>"><?php echo $list['prod_name'].' ('.$list['cat_name'].') '.' ('.$list['section_name'].') '; ?></option>
  <?php } ?>
  </select>
                              </div>
                              </div>
                              </div>
                        
                        </div>
                        </div>
						      <div class="row-fluid">
                               <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Name</label>
                              <div class="controls coupons_name">
      									<input type="text" name="coupons_name" id="coupons_name" value="" class="">
                              </div>
                              </div>
                              </div>
                              
                              <div class="span4"> 
                           <div class="control-group">
                              <label class="control-label">Description</label>
                              <div class="controls Description">
      									<input type="text" name="coupons_text" id="coupons_text" value="" class="">
                              </div>
                             
                              </div>
                           </div>
                          </div>
                          <div class="row-fluid">
                               <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Type</label>
                              <div class="controls coupons_type">
      									<select  name="coupons_type" id="coupons_type" class="">
                                         <option value="">Select</option>
                                        <option value="Value">Value</option>
                                        <option value="Percent">Percent</option>
                                        </select>
                              </div>
                              </div>
                              </div>
                              <div class="span4"> 
                           <div class="control-group">
                              <label class="control-label">Value</label>
                              <div class="controls coupons_value">
      									<input type="text" name="coupons_value" id="coupons_value" value="" class="" maxlength="3">
                              </div>
                             
                              </div>
                           </div>
                          </div>
                          <div class="row-fluid " id="sandbox-container">
                               <div class="span4"> 
                                
                                 <div class="control-group input-daterange" id="datepicker">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">From</label>
                              <div class="controls coupons_from">
      									<input type="text" name="coupons_from" id="coupons_from" value="" class="">
                              </div>
                              </div>
                              </div>
                              <div class="span4"> 
                           <div class="control-group input-daterange" id="datepicker">
                              <label class="control-label">To</label>
                              <div class="controls coupons_to">
      									<input type="text" name="coupons_to" id="coupons_to" value="" class="">
                              </div>
                             
                              </div>
                           </div>
                          </div>
                          
                          <div class="row-fluid">
                               <div class="span4"> 
                                
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Status</label>
                              <div class="controls coupons_status">
      									<select name="coupons_status" id="coupons_status" >
                                         <option value="" >Select</option>
                                          <option value="1" >Live</option>
                                          <option value="0" >Offline</option>
                                          </select>
                              </div>
                              </div>
                              </div>
                              <!--<div class="span4" id="sandbox-container"> 
                           <div class="input-daterange input-group" id="datepicker">
    <input type="text" class="input-sm form-control" name="start" />
    <span class="input-group-addon">to</span>
    <input type="text" class="input-sm form-control" name="end" />
</div>
                           </div>-->
                          </div>
                           <div class="form-actions">
                           <input type="button" name="Save" id="Save" class="btn blue" value="Save">
                              <button type="reset" class="cancel btn">Reset</button>
                           </div>
						   
                        </form>
                        <!-- END FORM-->           
                     </div>
                  </div>
				  
                  <!-- END SAMPLE FORM PORTLET-->
               </div>
            </div>
			
            
            <div class="row-flud" id="refresh">
            <div class="form-body">
                              <div class="portlet-body" id="tab_0">
                                 <table id="example1" class="table table-striped table-bordered" style="width:100%; border:">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                         <th>Name</th>
                                          <th>Descrpition</th>
                                          <th>Type</th>
                                          <th>Value</th>
                                           <th>&nbsp;&nbsp;&nbsp;&nbsp;From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                          <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                         
                                          <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1; foreach($page_data as  $value) { ?>
                                      <tr>
                                        <td><?php echo $i++; ?></td>
                                          <td><?php  //echo $value['payment_date'];
										   //echo date("Y-m-d",strtotime($value['payment_date']));
										   echo $str=$value['coupons_name'];
										  
										  //$createDate = new DateTime($value['payment_date']);

//echo $strip = $createDate->format('Y-m-d');
										  ?></td>
                                          <td><?php echo trim($value['coupons_text']); ?></td>
                                          <td><?php echo $value['coupons_type']; ?></td>
                                          <td><?php echo $value['coupons_value']; ?></td>
                                           <td><?php echo $value['coupons_from']; ?></td>
                                          <td><?php echo $value['coupons_to']; ?></td>
                                         
                                          <td><?php echo $value['coupons_date']; ?></td>
                                          <td>
										  <select name="coupons_status" id="<?php echo $value['coupons_id']; ?>" onchange="coupons_chnage(this);">
                                          <option value="1" <?php if($value['coupons_status']==1){ ?> selected="selected"<?php } ?>>Live</option>
                                          <option value="0" <?php if($value['coupons_status']==0){ ?> selected="selected"<?php } ?>>Offline</option>
                                          </select>
										  <?php //if($value['coupons_status']==1){echo 'Live';}else{echo 'Offline';} ?></td>
                                          <td><a href="#" id="<?php echo $value['coupons_id']; ?>" class="coupons_del">Deleted</a>|<a href="#" id="<?php echo $value['coupons_id']; ?>" class="coupons_Edit">Edit</a></td>
                                      </tr> 
                                    <?php }  ?>
                                      </tbody>
                                  </table>
                                 <!-- <div class="pagination">
                                  <?php //echo $pendingPagination; ?>
                                </div> -->

                              </div>

                           </div>
            
            </div>
			</div>
            </div>
            

          </div>
          <!-- / Content -->          

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <!--<div class="layout-overlay layout-sidenav-toggle"></div>-->
  </div>
  <!-- / Layout wrapper -->
  <?php $this->load->view('hfs/footer') ?>


 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>

<style type="text/css">
.select2-hidden-accessible{
	opacity: 0;
    width:1% !important;
}
.select2-container .select2-selection--single{
  height: 34px;
  padding-top: 2px;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  border: 1px solid #ccc;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{
  top: 4px;
}
</style>
<script type="text/javascript">

;(function(){
	
	function templateResult (obj) {
	  if (!obj.id) { return obj.text; }

	  var img = $(obj.element).data('imgSrc');
	  if( img ){
	    return $( '<span><img src="' + img + '" class="img-flag" /> ' + obj.text + '</span>' );
	  };

	  return obj.text;
	};
	 
	$(".jf-form select").css('width', '100%'); // make it responsive
	
	$("#Section_name").select2({
	  templateResult: templateResult
	}).change( function(e){
	  $(e.target).valid();
	});
$("#Category_name").select2({
	  templateResult: templateResult
	}).change( function(e){
	  $(e.target).valid();
	});
	
	$("#SubCategory").select2({
	  templateResult: templateResult
	}).change( function(e){
	  $(e.target).valid();
	});
	$("#Productlist").select2({
	  templateResult: templateResult
	}).change( function(e){
	  $(e.target).valid();
	});
})();
</script>

            <script type="text/javascript">$(document).ready(function(){
				$('#example1').DataTable( {responsive: true//,"order": [[ 0, "asc" ]]
    } );
			$('#sandbox-container .input-daterange').datepicker({
				 format: "yyyy/mm/dd",
				 clearBtn: true,
				  autoclose: true,
});

$('.coupons_del').click(function(){
	var id=$(this).attr('id');
	
	var formData = {
                'id': id //for get email 
            };
	      $.ajax({
                    type: 'POST',
				
					/* ContentType: "application/json",*/
                    url: "<?php  echo base_url(); ?>cms/Coupon/coupons_del",
                    data: formData,
                    success: function(data) { 
					$("#refresh").html(data);
					//alert(data);
					}
});
});

$('.coupons_Edit').click(function(){
	var id=$(this).attr('id');
	
	var formData = {
                'id': id //for get email 
            };
	      $.ajax({
                    type: 'POST',
				
					/* ContentType: "application/json",*/
                    url: "<?php  echo base_url(); ?>cms/Coupon/coupons_Edit",
                    data: formData,
                    success: function(data) { 
					$("#from_change").html(data);
					
					}
});
});


 $('#Save').click(function(){
	 
	 var coupons_name=$("#coupons_name").val();
	 var coupons_text=$("#coupons_text").val();
	 var coupons_type=$("#coupons_type").val();
	 var coupons_value=$("#coupons_value").val();
	 var coupons_from=$("#coupons_from").val();
	 var coupons_to=$("#coupons_to").val();
	 var coupons_status=$("#coupons_status").val();
	 
	 if(coupons_name==""){
		 $('#coupons_name').css('border-color','red');
		// $('.coupons_name').after('please Enter Name');
		 return false;
	 }else{
		 $('#coupons_name').css('border-color','none');
		// $('.coupons_name').after(' ');
	 }
	 
	  if(coupons_type==""){
		   $('#coupons_type').css('border-color','red');
		 //  $('.coupons_type').after('please Select Type');
		  return false;
	 }else{
		  $('#coupons_type').css('border-color','none');
	 }
	 
	  if(coupons_value==""){
		   $('#coupons_value').css('border-color','red');
		//   $('.coupons_value').after('please Enter value');
		//  return false;
		  return false;
	 }else{
		 $('#coupons_value').css('border-color','none');
	 }
	 
	  if(coupons_from==""){
		   $('#coupons_from').css('border-color','red');
		  return false;
	 }else{
		 $('#coupons_from').css('border-color','none');
	 }
	 
	  if(coupons_to==""){
		   $('#coupons_to').css('border-color','red');
		  return false;
	 }else{
		   $('#coupons_to').css('border-color','none');
	 }
	 
	  if(coupons_status==""){
		   $('#coupons_status').css('border-color','red');
		  // $('.coupons_status').after('please Select Status');
		  return false;
	 }else{
		  $('#coupons_status').css('border-color','none');
		// $('.coupons_status').after('please Select Status');
	 }
	 
	 var product_details = {
                    'coupons_name' : coupons_name,
					'coupons_text' : coupons_text,
                    'coupons_type' :coupons_type,
                    'coupons_value' : coupons_value,
                    'coupons_from' : coupons_from,
                    'coupons_to' : coupons_to,
                    'coupons_status' : coupons_status,
					
                }
	 
                  $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>cms/Coupon/Coupon_insert",
                    data: product_details,
                    success: function(data) { 
					$("#refresh").html(data);
					}
});

});
/////////////////////////////

});
function coupons_chnage(t){
	var id=$(t).attr('id');
	var value=t.value;
	var formData = {
                'id': id ,//for get email 
				'value': value //for get email 
            };
	      $.ajax({
                    type: 'POST',
				
					/* ContentType: "application/json",*/
                    url: "<?php  echo base_url(); ?>cms/Coupon/coupons_status",
                    data: "id="+id+"&value="+value,
                    success: function(data) { 
					$("#refresh").html(data);
					//alert(data);
					}
});
}
            </script>
              
</body>

</html>
