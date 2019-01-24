
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
            <?php $data['page']=$page; $this->load->view('hfs/header',$data); ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">
<?php echo form_open_multipart('',array('id'=>'order_form')); ?>
<input type="hidden" name="bid_id1" value="<?php if(isset($bid_details[0]['bid_id'])){ echo $bid_details[0]['bid_id'];}else{} ?>">
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
                            <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Product Name" value="<?php if(isset($bid_details[0]['product_name'])){ echo $bid_details[0]['product_name'];}else{} ?>" >
                          </div>
                       </div>
                    </div> 

                    <div class="list-group-item list-group-item-action">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Quantity</label>
                          <div class="col-sm-9">
                            <input type="text" name="quantity" class="form-control form-control-sm" placeholder="quantity" value="<?php  if(isset($bid_details[0]['quantity'])){echo $bid_details[0]['quantity'];}else{} ?>" >
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
                          <?php 
                          if(isset($bid_details[0]['label']) && isset($bid_details[0]['value'])){
                            foreach ($bid_details as $key => $value) { ?>
                            
                             <div class="list-group-item list-group-item-action" id="t<?php echo $value['id']; ?>"> 
                            <div class="row">
                              <div class="col-sm-5">
                                <input type="text"  name="label[]" id="l1" value="<?php echo $value['label']; ?>" class="form-control form-control-sm" placeholder="label" required>
                              </div>
                              <div class="col-sm-5">
                                <input type="text" name="value[]" id="v1" value="<?php echo $value['value']; ?>" class="form-control form-control-sm" placeholder="value" required>
                              </div>
                              <div class="col-sm-2">
                               <button class="btn-sm btn-danger remove_field" onclick="remove_label('<?php echo $value['id']; ?>')" > <i class="fas fa-minus d-block"></i></button>
                               
                                </div>
                                <!-- <input type="file" name="g"> -->
                            </div>    
                          </div>
                          <?php  } } ?>

                      

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

                  <?php
                    if(!empty($bid_details[0]['image']) && isset($bid_details[0]['image'])){ // echo "exit"; ?>
                     <input type="hidden" name="present_img" value="<?php echo $bid_details[0]['image']; ?>">
                    <img id="blah" src="<?= ADMIN_PATH.'upload/bids_image/' ?><?php echo $bid_details[0]['image'];?>" alt="your image here" height="150px" width="200px" />
                   <?php  }else{ ?>
                      <img id="blah" src="#" alt="your image here" height="150px" width="200px" />
                  <?php  }
                   ?>  

                
                    
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
             <div id="error23" style="color: red"></div>
             
            <div class="row">
              <div class="col-md-4">
                  <input type="submit" value="Submit" id="submit" class="btn btn-round btn-outline-primary">
              </div>
              <div class="col-md-6">
                  <div id="success23" style="color: green"></div>   
              </div>
            </div>
              </form>
<hr>

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

  <!-- model code -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
      <div class="modal-header">
        <div class="modal-title">
            <h3 style="margin-bottom: 0px;">
               <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button> -->
               <center><label style="color:rgb(217, 83, 79);margin-left: 104px;">Alert!</label></center>
            </h3>
            <center><small style="margin-left: 100px;">Please mention appropriate reason to cancel bid.</small></center>                
        </div>
                        
      </div>
        <!-- Modal body -->
      <form method="post" id="cancel_bid">
          <div class="modal-body">
          <textarea class="form-control" placeholder="Please mention appropriate reason to cancel bid." name="msg"></textarea>
          <input type="hidden" name="bid_idd" id="bidd">
          </div>
          <!-- Modal footer -->
         <div class="modal-footer">
          <div id="error1" style="color: red"></div>
          <div id="success1" style="color: green"></div>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="can">Save</button>
         </div>
      </form>
      </div>
    </div>
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
                      url  : "<?= ADMIN_PATH.'bids/update_bid' ?>",
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(resp){
                       // console.log(resp); return;
                        var ss =JSON.parse(resp);
                        if(ss.status==false)
                        {
                            // alert(ss.message);
                            $('#error23').html(ss.message);
                        } else {
                            // $('#error').fadeOut(200);
                             $('#success23').html(ss.message);//.fadeOut(7000);
                               setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 700);
                        }
                   }
                 });
            });    


    $('#can').click(function(){
        
        $.ajax({
          url  : "<?= ADMIN_PATH.'bids/cancel_bid' ?>",
          data : $('#cancel_bid').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
           // $('#cng_tbl').html(resp);
            var ss =JSON.parse(resp);
                        if(ss.status==false)
                        {
                            // alert(ss.message);
                            $('#error1').html(ss.message);
                        } else{
                          
                          $('#success1').html(ss.message);

                          setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 1000); 
                        }
          }
        })
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

  function sel_list(id){
    
    $.ajax({
      url  : "<?=  ADMIN_PATH.'bids/seller_list' ?>",
      data : {bid_id:id},
      type : "POST",

      success:function(resp){
        console.log(resp);
      }

    })    
  }


function cancel_bid(bid_id) {
  $('#bidd').val(bid_id);
}

function remove_label(id){
 // alert(id);

  $('#t'+id).remove();
}
  </script>
</body>

</html>