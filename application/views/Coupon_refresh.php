<script type="text/javascript">$(document).ready(function(){
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
});$('.coupons_Edit').click(function(){
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


$('#example1').DataTable( {responsive: true//,"order": [[ 0, "asc" ]]
    });
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
<div class="form-body">
                              <div class="portlet-body" id="tab_0">
                                 <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                         <th>Name</th>
                                          <th>Descrpition</th>
                                          <th>Type</th>
                                          <th>Value</th>
                                           <th>&nbsp;&nbsp;&nbsp;&nbsp;From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                          <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                         
                                          <th>&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                                          <td><select name="coupons_status" id="<?php echo $value['coupons_id']; ?>" onchange="coupons_chnage(this);">
                                          <option value="1" <?php if($value['coupons_status']==1){ ?> selected="selected"<?php } ?>>Live</option>
                                          <option value="0" <?php if($value['coupons_status']==0){ ?> selected="selected"<?php } ?>>Offline</option>
                                          </select><?php // if($value['coupons_status']==1){echo 'Live';}else{echo 'Offline';} ?></td>
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
            
           