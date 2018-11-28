
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS-SELLER - Bulk-order-detail</title>
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
        <?php $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          
<?php echo form_open_multipart('enquiry/put',array('id'=>'order_form')); ?>
<input style="display: none;" type="text" name="bulk_id" value="<?php echo $record[0]['bulk_id']; ?>">
          <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-md-6">
                <div class="cui-example">
                  <div class="list-group">
                    <button type="button" data-toggle="collapse" data-target="#edit_frm" class="list-group-item list-group-item-action active "><b>EDIT&nbsp;/&nbsp;ADD</b></button>
                    <!-- <span class="list-group-item list-group-item-action active"><center><b>EDIT&nbsp;/&nbsp; ADD</b></center></span> -->
                    <div id="edit_frm" class="collapse show">
                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Name" value="<?php if(isset($record[0]['name'])){ echo $record[0]['name']; }?>" >
                          </div>
                       </div>
                     </div>
                  
                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Business Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="business_name" class="form-control form-control-sm" placeholder="Business Name" value="<?php if(isset($record[0]['business_name'])){ echo $record[0]['business_name']; }?>">
                          </div>
                       </div>
                     </div>

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control form-control-sm" placeholder="Mobile Number" value="<?php if(isset($record[0]['mobile'])){ echo $record[0]['mobile']; }?>">
                          </div>
                       </div>
                     </div>

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Email  </label>
                          <div class="col-sm-9">
                            <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" value="<?php if(isset($record[0]['email'])){ echo $record[0]['email']; }?>">
                          </div>
                       </div>
                     </div>

               

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Product</label>
                          <div class="col-sm-9">
                            <input type="text" name="product" class="form-control form-control-sm" placeholder="Product" value="<?php if(isset($record[0]['product'])){ echo $record[0]['product']; }?>">
                          </div>
                       </div>
                     </div>

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Quantity</label>
                          <div class="col-sm-9">
                            <input type="text"  name="quantity" class="form-control form-control-sm" placeholder="Quantity" value="<?php if(isset($record[0]['quantity'])){ echo $record[0]['quantity']; }?>">
                          </div>
                       </div>
                     </div>

                    <div class="list-group-item list-group-item-action">
                        <div class="row">
                            <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Message</label>
                            <div class="col-sm-9">
                              <textarea name="message"  class="form-control form-control-sm">
                                <?php if(isset($record[0]['message'])){ echo $record[0]['message']; }?>
                              </textarea>
                             
                            </div>
                         </div>
                     </div>

                     <div class="list-group-item list-group-item-action">
                        <div class="row">
                            <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Choose Image</label>
                            <div class="col-sm-9">
                              <?php   
                                 $imgg = base_url().'upload/bulk_order/'.$record[0]['image'];
                              if(!empty($record[0]['image'])){
                              // echo 1; ?>
                                  <div class="row">
                                  <div class="col-sm-6">
                                    <input type="file" name="img" value="<?php echo $imgg; ?>">
                                    <input type="hidden" name="present_img" value="<?php echo $record[0]['image']; ?>">
                                  </div>
                                  <div class="col-sm-6">

                                     <!-- Lightbox template -->
                                      <div id="product-item-lightbox" class="blueimp-gallery blueimp-gallery-controls">
                                        <div class="slides"></div>
                                        <h3 class="title"></h3>
                                        <a class="prev">‹</a>
                                        <a class="next">›</a>
                                        <a class="close">×</a>
                                        <ol class="indicator"></ol>
                                      </div>

                                      <div id="product-item-images" class="row">

                                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                                          <a href="<?php echo $imgg; ?>" class="d-block border-primary ">
                                            <img src="<?php echo $imgg; ?>" class="img-fluid." alt="" height='100px' width='100px'>
                                          </a>
                                        </div>
                                      </div>  
                                                
                                  </div>
                                </div>
                               <?php }else{  //echo 0; ?>
                                 <input type="file" name="img" value="<?php echo $imgg; ?>">
                                                  <?php } ?>
                             
                            </div>
                         </div>
                     </div>

                     <div class="list-group-item list-group-item-action">
                        <div class="row">
                            <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right"></label>
                            <div class="col-sm-9">
                                <input class="btn btn-primary" type="submit"  id='btnn' value="Submit">
                             
                            </div>
                         </div>
                     </div>

                     
                   </div>  
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="cui-example">
                  <div class="list-group">

                  <button type="button" data-toggle="collapse" data-target="#detail_frm" class="list-group-item list-group-item-action active "><b>Product&nbsp;Detail</b></button>
                    <!-- <span class="list-group-item list-group-item-action active"><center><b>EDIT&nbsp;/&nbsp; ADD</b></center></span> -->
                    <div id="detail_frm" class="collapse show">

                    <div class="input_fields_container">
                           <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">City</label>
                          <div class="col-sm-9">
                            <input type="text" name="city" class="form-control form-control-sm" placeholder="City" value="<?php if(isset($record[0]['city'])){ echo $record[0]['city']; }?>">
                          </div>
                       </div>
                     </div>
                  
                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Pincode  </label>
                          <div class="col-sm-9">
                            <input type="text" name="pincode" class="form-control form-control-sm" placeholder="Pincode " value="<?php if(isset($record[0]['pincode'])){ echo $record[0]['pincode']; }?>">
                          </div>
                       </div>
                     </div>
                      <?php 
                        foreach ($order_quote as $key => $value) { ?>
                      <div class="list-group-item list-group-item-action" id="t<?php echo $value['id']; ?>">
                        <div class="row">
                            <div class="col-sm-5">
                              <input type="text"  name="title[]"  class="form-control form-control-sm" placeholder="label" value="<?php echo $value['title']; ?>">
                            </div>
                            <div class="col-sm-5">
                              <input type="text" name="desc[]" class="form-control form-control-sm" placeholder="value" value="<?php echo $value['description']; ?>">
                            </div>
                            <div class="col-sm-2">
                              <button class="btn-sm btn-danger" type="button" onclick="remove_label('<?php echo $value['id']; ?>')" > <i class="fas fa-minus d-block"></i></button>
                             
                              </div>

                          </div>
                          
                       </div>
                       <?php } ?>


                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <div class="col-sm-5">
                            <input type="text"  name="title[]" id="t1" class="form-control form-control-sm" placeholder="label">
                          </div>
                          <div class="col-sm-5">
                            <input type="text" name="desc[]" id="d1" class="form-control form-control-sm" placeholder="value">
                          </div>
                          <div class="col-sm-2">
                            <button class="btn-sm btn-primary add_more_button" style="background-color: #5DADE2"> <i class="fas fa-plus d-block"></i></button>
                           
                            </div>

                          </div>

                       </div>
                     </div>
                   
                     </div>
                  </div>                  
                </div>
              </div>
            </div></form>
<hr>
 <button type="button" data-toggle="collapse" data-target="#seller_frm"  class="btn btn-round btn-outline-primary">List&nbsp;of&nbsp;Seller</button>
                    <div id="seller_frm" class="collapse "><br>
              <div class="row">
                  
                <div class="card">
                  <div class="card-datatable table-responsive">
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th >Business Name</th>
                                <th>Classification</th>
                                <th>Primary product</th>
                                <th>Making  process</th>  
                                <th>Location</th>
                                <th>Email Id</th>
                                <th>Mobile number</th>
                                <th>Type of seller</th>
                                <th>Action</th>
                               
                             </tr>
                        </thead>
                         <tbody id="tc">
                             <?php $i=1; foreach ($seller as $key => $value) { 
                                         // echo '<pre>'; print_r($bulk_id);
                                          $id = $value['id'];
                                          ?>
                                          <tr id="<?php echo $id; ?>">
                                            <td><?php echo $i++; ?></td> 
                                            <td> <?php echo $value['business_name'] ?></td>
                                             <td><?php echo $value['Classification']; ?></td>
                                              <td><?php echo $value['Primary_Product']; ?></td>
                                                <td><?php echo $value['Making_Process']; ?></td>
                                            <td><?php echo $value['city']; ?></td>
                                            <td><?php echo $value['email_id']; ?></td>
                                            <td><?php echo $value['mobile_number']; ?></td>
                                             <td><?php   
                                                  $seller_id  = $value['user_id'];
                                                  $data = $this->db->query("SELECT id from products where seller_id=".$seller_id." and product_status=2 ");
                                                  $cnt = $data->num_rows();
                                                 // echo $cnt;
                                              if($value['role_id']=5 && $value['account_status']=='Yes' && $cnt>0){
                                                echo "Vender";
                                              } elseif($value['role_id']=5 && $value['account_status']=='No'){
                                                echo 'Seller';
                                              }elseif($value['role_id']=5 && $value['account_status']=='Yes'){
                                                echo "Registered seller";  
                                              }elseif($value['role_id']=5 && $value['account_status']=='Offline'){
                                                echo "Offline";
                                              }  


                                              ?></td>
                                            <td>
                                               <!-- <button class="btn-sm btn-primary add_more_button" style="background-color: #5DADE2"> <i class="fas fa-plus d-block"></i></button>  -->
                                              <a href="javascript:(0)" class="btn-sm btn-primary" style="background-color: #5DADE2" onclick="todo(<?php echo $id; ?>,<?php echo $bulk_id ?>)"><b>+</b></a></td>
                                          </tr>
                                        <?php } ?>
                             
                          </tbody>
                      
                    </table>
                   </div>
                </div>
              </div>
              </div> <!--Row -->
<hr>
<center><h4 class="list-group-item list-group-item-primary">Responded&nbsp;Seller</h4><hr></center>
<form action="<?php echo base_url()?>enquiry/ins_mail" class="" method="post" enctype="multipart/form-data" />
   <input type="text" name="bulk_id" value="<?php echo $bulk_id; ?>" style="display: none;">
      <div class="row">
          
          <div class="card">
              <div class="card-datatable table-responsive">
                 <table id="responded_seller" class="table table-striped table-bordered" style="width:100%;">
                   <thead>
                        <tr>
                          <!-- <th>#</th> -->
                          <th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                          <th>Business&nbsp;name</th>
                          <th>Seller&nbsp;email</th>
                          <th>Location</th>
                          <th>Price</th>
                          <th>GST(%)</th>
                          <th>Delivery&nbsp;Date</th>
                          <th>Message</th>
                          <th>Total&nbsp;weight&nbsp;in&nbsp;kg</th>
                          <th>Action</th>      
                        </tr>
                    </thead>
                     <tbody id="list_seller" style="font">
                       <?php $i=1;
                       foreach ($responded as $key => $value) { 
                         $datetime = new DateTime($value['date']);
                         $date = $datetime->format('d-m-Y');
                        ?>
                          <tr id="a<?php echo $value['seller_id'] ?>">
                            <!-- <th><?php echo $i++; ?></th> -->
                            <th><?php echo $date; ?></th>
                            <th><?php echo $value['business_name'] ?></th>
                            <th><?php echo $value['seller_email'] ?><input type="text" name="emails[]" value="<?php echo $value['seller_id']; ?>" style='display: none;'></th>
                            <th><?php echo $value['city'] ?></th>
                            <th><?php if($value['price']==0){ echo "";}else{ echo $value['price'];} ?></th>
                            <th><?php echo $value['gst'] ?></th>
                            <th><?php echo $value['delivery_date'] ?></th>
                            <th><?php echo $value['message'] ?></th>
                            <th><?php echo $value['total_weight'] ?></th>
                           <th>
                             <?php 
                                if(!empty($value['price']) && $value['status']==2){ ?>
                                    <b style="color: blue"><i class="ion ion-md-done-all" style="font-size: medium"></i></b>
                               <?php }elseif(!empty($value['price']) && $value['status']==1){ ?>
                                    <a style="color: green" href="javascript:(0)" onclick="place_ord(<?php echo $value['seller_id'] ?>,<?php echo $value['bulk_id'] ?>)"><i class="ion ion-ios-checkmark-circle-outline" style="font-size: medium"></i></a>&nbsp;|&nbsp;<a style="color: red" href="javascript:(0)" onclick="rem(<?php echo $value['seller_id'] ?>)"><i class="ion ion-ios-remove-circle-outline" style="font-size: medium"></i></a>
                                <?php }else{ if($value['status']==3){}else{ ?>
                                  <a style="color: red;" href="javascript:(0)" onclick="rem(<?php echo $value['seller_id'] ?>)"><i class="ion ion-ios-remove-circle-outline" style="font-size: medium"></i></a> 
                                <?php } }
                             ?>
                           </th>
                          </tr>
                          <?php } ?>     
                      </tbody>
                  
                </table>
          </div>
          <!-- / Content -->          

        </div>
      </div>
      <hr>
      <div class="row">
          <input class="btn btn-primary" type="submit" >
      </div>
    
</form>


            </div>
          </div>
          <!-- / Content -->          

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  <!-- </div> -->
  <!-- / Layout wrapper -->
  <?php $this->load->view('hfs/footer') ?>

<script type="text/javascript">

  var idd =[];
  function todo(id,bulk_id) {
     
//       alert(id);
// alert(bulk_id);      
      idd.push(id);
      // var hh = $('#2').val();
      // alert(hh)
       //document.getElementById("demo").innerHTML = idd;
      $.ajax({
        url : '<?php echo base_url('enquiry/to_do_list') ?>',
        type : "POST",
        data : {id,bulk_id},

        success:function(resp){
          //alert(resp);
         // $html = "<tr><td>"+resp+"</td></tr>";
          $('#list_seller').append(resp);
          $('#'+id).hide();

        }
      })

     }

function rem(id){
  // /alert(id);
  $('#a'+id).remove();
  $('#'+id).show();
}

function remove_label(id){
  alert(id);

  $('#t'+id).remove();
}

function place_ord(seller_id,bulk_id){
  var seller_id = seller_id;
  var bulk_id   = bulk_id;
   $.ajax({
        url : '<?php echo base_url('enquiry/place_order') ?>',
        type : "POST",
        data : {seller_id,bulk_id},

        success:function(resp){
          console.log(resp);
          // window.location.reload();
        }
      });

}

  $(document).ready(function(){
   var max_fields_limit      = 15 ; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_button').click(function(e){ 
       //   alert()
            e.preventDefault();
            if(x < max_fields_limit){ 
                 
                $('.input_fields_container').append('<div class="list-group-item list-group-item-action" id="list_'+x+'"><div class="row"><div class="col-sm-5"><input type="text"  name="title[]" id="t1" class="form-control form-control-sm" placeholder="label"></div><div class="col-sm-5"><input type="text" name="desc[]" id="d1" class="form-control form-control-sm" placeholder="value"></div><div class="col-sm-2"><button class="btn-sm btn-danger remove_field" id="'+x+'" > <i class="fas fa-minus d-block"></i></button>    </div></div></div>'); //add input field
                x++;
            }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ 
            var id = $(this).attr('id');
           // alert(id); return;
            e.preventDefault(); 
            $('#list_'+id).remove(); x--;
            //$(this).parent('list_'+x).remove(); x--;
        })

        $('#btn').click(function(){
          var form_data = $('#order_form').serialize();

          //alert(form_data);

          $.ajax({
            url : "<?php echo base_url('enquiry/put') ?>",
            data : form_data,
            type : "POST",

            success:function(resp){
              console.log(resp);
            }
          })

        })
      })

</script>
  <script type="text/javascript">
         $(document).ready(function() {
    $('#example').DataTable();
    $('#responded_seller').DataTable();

} );
  </script>

</body>

</html>