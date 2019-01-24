 <script type="text/javascript">
					$(function() { 
		$('#Updatedata').click(function(){
	 
	 var coupons_name=$("#coupons_name").val();
	 var coupons_text=$("#coupons_text").val();
	 var coupons_type=$("#coupons_type").val();
	 var coupons_value=$("#coupons_value").val();
	 var coupons_from=$("#coupons_from").val();
	 var coupons_to=$("#coupons_to").val();
	 var coupons_status=$("#coupons_status").val();
	 var coupons_id=$("#coupons_id").val();
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
					'coupons_id' : coupons_id,
                }
	 
                  $.ajax({
                    type: 'POST',
                    ContentType: "application/json",
                    url: "<?php  echo base_url(); ?>cms/Coupon/Coupon_Update",
                    data: product_details,
                    success: function(data) { 
				$("#refresh").html(data);
					}
});

});
$('#sandbox-container .input-daterange').datepicker({
				 format: "yyyy/mm/dd",
				 clearBtn: true,
				  autoclose: true,
});

$('#Cancel_from').click(function(){
	var id=$(this).attr('id');
	
	var formData = {
                'id': id //for get email 
            };
	      $.ajax({
                    type: 'POST',
				
					/* ContentType: "application/json",*/
                    url: "<?php  echo base_url(); ?>cms/Coupon/Cancel_from",
                    data: formData,
                    success: function(data) { 
					$("#from_change").html(data);
					
					}
});
});

});
                     </script>
                        <!-- BEGIN FORM-->
							<!-- <form action="#" /> -->
                        <form action="#"   class="form-horizontal" method="post" enctype="multipart/form-data" />
						      <div class="row-fluid">
                               <div class="span4"> 
                                <input type="hidden" name="coupons_id" id="coupons_id" value="<?php echo $coupons_Edit[0]['coupons_id']; ?>" class="">
                                 <div class="control-group">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                              <label class="control-label">Name</label>
                              <div class="controls coupons_name">
      									<input type="text" name="coupons_name" id="coupons_name" value="<?php echo $coupons_Edit[0]['coupons_name']; ?>" class="">
                              </div>
                              </div>
                              </div>
                              <div class="span4"> 
                           <div class="control-group">
                              <label class="control-label">Description</label>
                              <div class="controls Description">
      									<input type="text" name="coupons_text" id="coupons_text" value="<?php echo $coupons_Edit[0]['coupons_text']; ?>" class="">
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
                                        <option value="Value" <?php if($coupons_Edit[0]['coupons_type']== "Value"){ ?> selected <?php } ?>>Value</option>
                                        <option value="Percent" <?php if($coupons_Edit[0]['coupons_type']== "Percent"){ ?> selected <?php } ?>>Percent</option>
                                        </select>
                              </div>
                              </div>
                              </div>
                              <div class="span4"> 
                           <div class="control-group">
                              <label class="control-label">Value</label>
                              <div class="controls coupons_value">
      									<input type="text" name="coupons_value" id="coupons_value" value="<?php echo $coupons_Edit[0]['coupons_value']; ?>" class="" maxlength="3">
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
      									<input type="text" name="coupons_from" id="coupons_from" value="<?php echo $coupons_Edit[0]['coupons_from']; ?>" class="">
                              </div>
                              </div>
                              </div>
                              <div class="span4"> 
                           <div class="control-group input-daterange" id="datepicker">
                              <label class="control-label">To</label>
                              <div class="controls coupons_to">
      									<input type="text" name="coupons_to" id="coupons_to" value="<?php echo $coupons_Edit[0]['coupons_to']; ?>" class="">
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
                                          <option value="1" <?php if($coupons_Edit[0]['coupons_status']==1){ ?> selected <?php } ?>>Live</option>
                                          <option value="0" <?php if($coupons_Edit[0]['coupons_status']==0){ ?> selected <?php } ?> >Offline</option>
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
                           <input type="button" name="Save" id="Updatedata" class="btn blue" value="Update">
                           <input type="button" name="Cancel" id="Cancel_from" class="btn blue" value="Cancel">
                           </div>
						   
                        </form>
                        <!-- END FORM-->           
                    
                    