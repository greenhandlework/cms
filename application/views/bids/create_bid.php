
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Bid-Details</title>
  <?php $this->load->view('hfs/html_header') ?>
   <style type="text/css">
                  .file {
                    visibility: hidden;
                    position: absolute;
                  }
                </style>
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
<?php echo form_open_multipart('',array('id'=>'order_form')); ?>
          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-md-6">
               <div class="card mb-4">
             <button type="button" data-toggle="collapse" data-target="#edit_frm" class="list-group-item list-group-item-action active collapsed" aria-expanded="false"><b>PRODUCT&nbsp;DETAILS</b></button>
              <div id="edit_frm" class="collapse show" style="">
              <div class="card-body">
               <div class="input_fields_container">
                   <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Product Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Product Name" >
                          </div>
                       </div>
                    </div> 

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Quantity</label>
                          <div class="col-sm-9">
                            <input type="text" name="quantity" class="form-control form-control-sm" placeholder="quantity" >
                          </div>
                       </div>
                    </div>  
                   <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <div class="col-sm-5">
                            <input type="text"  name="label[]" id="l1" class="form-control form-control-sm" placeholder="label">
                          </div>
                          <div class="col-sm-5">
                            <input type="text" name="value[]" id="v1" class="form-control form-control-sm" placeholder="value">
                          </div>
                          <div class="col-sm-2">
                            <button class="btn-sm btn-primary add_more_button" style="background-color: #5DADE2"> <i class="fas fa-plus d-block"></i></button>
                           
                            </div>
                            <!-- <input type="file" name="g"> -->

                          </div>

                       </div>

                </div>
              </div>
            </div>
            </div>
              </div>

              <div class="col-md-6">
               <div class="card mb-4">
             <button type="button" data-toggle="collapse" data-target="#bid_frm" class="list-group-item list-group-item-action active collapsed" aria-expanded="false"><b>BIDS&nbsp;DETAILS</b></button>
              <div id="bid_frm" class="collapse show" style="">
               
             <br><br>

            <!-- <div class="card-body">
                <div class="flow-error alert alert-danger">
                  Your browser, unfortunately, is not supported by Flow.js. The library requires support for
                  <a href="http://www.w3.org/TR/FileAPI/">the HTML5 File API</a> along with
                  <a href="http://www.w3.org/TR/FileAPI/#normalization-of-params">file slicing</a>.
                </div>

                <div class="flow-drop py-5 px-3" ondragenter="$(this).addClass('flow-dragover')" ondragend="$(this).removeClass('flow-dragover')" ondrop="$(this).removeClass('flow-dragover')" style="display: block;">
                  <h4>Drop files here to upload or</h4>
                  <button type="button" class="flow-browse btn btn-secondary">Select from your computer
                    <input type="file" multiple="multiple" name="img123" style="visibility: hidden; position: absolute; width: 1px; height: 1px;"></button>
                  <button type="button" class="flow-browse-image btn btn-secondary">Select images<input type="file" multiple="multiple" accept="image/*" style="visibility: hidden; position: absolute; width: 1px; height: 1px;"></button>
                  <button type="button" class="flow-browse-folder btn btn-secondary">Select folder<input type="file" multiple="multiple" webkitdirectory="webkitdirectory" style="visibility: hidden; position: absolute; width: 1px; height: 1px;"></button>
                </div>

                <div class="flow-progress media mt-4">
                  <div class="mr-3">
                    <button type="button" onclick="r.upload(); return(false);" class="progress-resume-link btn icon-btn btn-primary" style="display: none;">
                      <i class="ion ion-md-play"></i>
                    </button>
                    <button type="button" onclick="r.pause(); return(false);" class="progress-pause-link btn icon-btn btn-warning" style="display: none;">
                      <i class="ion ion-md-pause"></i>
                    </button>
                    <button type="button" onclick="r.cancel(); return(false);" class="progress-cancel-link btn icon-btn btn-danger">
                      <i class="ion ion-md-close"></i>
                    </button>
                  </div>
                  <div class="media-body align-self-center">
                    <div class="progress-container progress">
                      <div class="progress-bar" style="width: 0%;"></div>
                    </div>
                  </div>
                </div>

                <ul class="flow-list list-group mt-4"></ul>
              </div>
     -->
         <div class="form-group" style=" padding-left: 56px;">
                  <input type="file" name="bid_image" class="file" id="imgInp">
                    <div class="input-group col-md-8">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                      <input type="text" class="form-control input-lg"  disabled placeholder="Upload Image">
                      <span class="input-group-btn">
                        <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                      </span>
                    </div>

                    <div class="col-md-4">
                     <!-- // <img id="blah" src="#" alt="your image" /> -->
                    </div>
                </div>

                 <div class="form-group row">
                  <div class="col-md-2"></div>
                  <div class="col-md-6">
                  <img id="blah" src="#" alt="your image here" height="150px" width="200px" />
                    
                  </div>
                   <!--  <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Size</label>
                    <div class="col-sm-8">
                      <input type="text" readonly="" class="form-control form-control-sm" placeholder="Small input" value="10*10">
                    </div> -->
                  </div>

            </div>
            </div>
              </div>
             
            </div> 
            <div class="row">
              <input type="submit" value="Submit" id="submit" class="btn btn-round btn-outline-primary">
              <!-- <button type="submit" class="btn btn-round btn-outline-primary">Submit</button> -->
              </form>
            </div>
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
                                            <!--   <a href="javascript:(0)" class="btn-sm btn-primary" style="background-color: #5DADE2" onclick="todo(<?php echo $id; ?>,<?php echo $bulk_id ?>)"><b>+</b></a> -->
                                            </td>
                                          </tr>
                                        <?php } ?>
                             
                          </tbody>
                      
                    </table>
                   </div>
                </div>
              </div>
              </div> <!--Row -->
              <hr>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
              <div class="card-datatable table-responsive">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Bid_ID</th>
                            <th>Product&nbsp;Name</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody id="tc">
                      <?php $i=1;
                      foreach ($bids as $key => $value) { 
                          $datetime = new DateTime($value['date']);
                               $date = $datetime->format('Y-m-d');
                        ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['bid_id'] ?></td>
                          <td><?php echo $value['product_name'] ?></td>
                          <td><?php echo $value['quantity'] ?></td>
                          <td><?php echo $date; ?></td>
                          <td>
                        <a class="btn btn-xs btn-primary" href="javascript:(0)" onclick="view_bid('<?php echo $value['id'] ?>')">View</a> | <a class="btn btn-xs btn-danger" href="javascript:(0)" onclick="alert('Do you want to delete!')">Delete</a>
                       </td>
                        </tr>
                      <?php } ?>

                    
                     <!--   <td>
                         <img src="<?=ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>" height="100px" width="100px">
                       </td> -->
                     
                      
                      <!--  <?php $i=1;
                            foreach ($enq as $key => $value) { 
                              $data = $this->db->query("SELECT count(bulk_id) as cnt from bulk_order_seller where price!='' and bulk_id=".$value['bulk_id']." ")->result_array();

                                $bulk_id_pro = base_url().'enquiry/bulk_order_detail/'.$value['bulk_id'];
                               $datetime = new DateTime($value['date']);
                               $date = $datetime->format('Y-m-d');
                             ?>
                         <tr>
                           <td><?php echo $i++; ?></td>
                           <td><?php echo $value['name'] ?></td>
                           <td><?php echo $value['email'] ?></td>
                           <td><?php echo $value['mobile'] ?></td>
                           <td><?php echo $value['product'] ?></td>
                           <td><?php echo $value['quantity'] ?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="<?php echo $bulk_id_pro; ?> "> <?php if(!empty($data[0]['cnt']) && $data[0]['cnt']!=0) { ?> <span class="badge badge-outline-success"><?php echo $data[0]['cnt'];?></span> <?php }else{} ?> </a></td> 
                            <td><a href="<?php echo $bulk_id_pro; ?>" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a>&nbsp;|&nbsp;<a href="#  " class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="fas fa-ban d-block" style="color: red;"></i></a>

                              </td>
                         </tr>
                       <?php } ?>   -->              
                         
                      </tbody>
                  
                </table>
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
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  <?php $this->load->view('hfs/footer') ?>
  <script type="text/javascript">
     $(document).ready(function() {
        $('#example').DataTable();

        var max_fields_limit      = 15 ; //set limit for maximum input fields
        var x = 1; //initialize counter for text box
        $('.add_more_button').click(function(e){ 
       //   alert()
            e.preventDefault();
            if(x < max_fields_limit){ 
                 
                $('.input_fields_container').append('<div class="list-group-item list-group-item-action" id="list_'+x+'"><div class="row"><div class="col-sm-5"><input type="text"  name="label[]" id="t1" class="form-control form-control-sm" placeholder="label" required ></div><div class="col-sm-5"><input type="text" name="value[]" id="d1" class="form-control form-control-sm" placeholder="value" required></div><div class="col-sm-2"><button class="btn-sm btn-danger remove_field" id="'+x+'" > <i class="fas fa-minus d-block"></i></button>    </div></div></div>'); //add input field
                x++;
            }
        });  
        $('.input_fields_container').on("click",".remove_field", function(e){ 
            var id = $(this).attr('id');
           // alert(id); return;
            e.preventDefault(); 
            $('#list_'+id).remove(); x--;
            //$(this).parent('list_'+x).remove(); x--;
        });

      // ajax code for upload image
      

         $('#order_form').submit(function(e){
            //alert()
            var l1 = $('#l1').val(); 
            var v1 = $('#v1').val();   
            if(l1=='' && v1!=''){
              alert('Label should not be empty');
              return false;
            }else if(v1=='' && l1!=''){
              alert('Value should not be empty');
              return false;
            }
            e.preventDefault(); 
                 $.ajax({
                      url  : "<?= ADMIN_PATH.'bids/put' ?>",
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(resp){
                        console.log(resp); return;
                        var ss =JSON.parse(resp);
                        if(ss.status==false)
                        {
                            // alert(ss.message);
                            $('#error').html(ss.message);
                        } else {
                            $('#error').fadeOut(200);
                            $('#success').html(ss.message).fadeOut(7000);
                             swal({
                                  title: "Product successfully uploaded.",
                                  text: "Redirecting in 2 seconds.",
                                  type: "success",
                                  timer: 1500,
                                  showConfirmButton: false
                                }, function(){
                                      window.location.href = "<?= base_url('cms/product_upload')?>";
                                });
                        }
                   }
                 });
            });    

     });


   $(document).on('click', '.browse', function(){
    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');
  });

  $(document).on('change', '.file', function(){
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });

  //View bid call here

  function view_bid(id){
    
    $.ajax({
      url  : "<?=  ADMIN_PATH.'bids/view_bid' ?>",
      data : {id:id},
      type : "POST",

      success:function(resp){
        console.log(resp);
      }

    })    
  }

  </script>
</body>

</html>