     <script type="text/javascript" src="<?php echo base_url('js/validation_script.js')?>"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<!--  <link href="<?php echo base_url() ?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>locales/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script> -->
<?php $this->load->view('hfs/html_header'); ?>
    <div id="content">
        <div class="container">
            
            <div class="blog_c ideas-hover">
            
              <div class="row"> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="title clearfix" align="center"><h2>Quote For Bid</h2> </div>
                </div>
                </div>

                <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="blog_blk red5 clearfix animated" data-animation="rollIn">
                            <div class="box ">
                              <div class="blog_desc">
                                <div class="row">
                                  <div class="col-md-6">
                                     <form  method="post" id="final_quote" action="">
                                              <input type="hidden" name="seller_id" value="<?php echo $seller_id; ?>" >
                                               <input type="text" name="bid_id" value="<?php echo $bid[0]['bid_id']; ?>" hidden>
                                              <div class="row">
                                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                                   <label>Product</label>
                                                 </div>

                                                 <div class="col-md-6 col-sm-6 col-xs-6">
                                                  <label><?php echo $bid[0]['product_name'] ?> </label>
                                                 </div>
                                               </div>
                                              <br> 
                                              <div class="row">
                                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                                   <label>Quantity</label>
                                                 </div>
                                                 <div class="col-md-6 col-sm-6 col-xs-6">
                                                   <label><?php echo $bid[0]['quantity'] ?> </label>
                                                 </div>
                                              </div>

                                              <br> 
                                             <?php 
                                              foreach ($bid_detail as $key => $value) { ?>
                                                <div class="row">
                                                   <div class="col-md-3 col-sm-6 col-xs-6">
                                                     <label><?php echo $value['label']; ?></label>
                                                   </div>
                                                   <div class="col-md-6 col-sm-6 col-xs-6">
                                                     <label><?php echo $value['value'] ?> </label>
                                                   </div>
                                                </div><br>
                                             <?php } ?>

                                          <style type="text/css">
                                             @media (min-width: 576px) and (min-width: 767.98px) and (min-width: 991.98px) { 
                                                 #img_product{height:150px ; width: 150px}
                                             }
                                               /*#img_product{height:50px ; width: 50px}*/
                                              @media (max-width: 1199.98px) and (max-width: 991.98px) and (max-width: 767.98px) { 
                                                #img_product{height:100px ; width: 100px}
                                             }
                                          </style>   
                                            
                                            
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div id="img_product">
                                          <?php if(isset($bid[0]['image']) && !empty($bid[0]['image'])){ 
                                            $img = base_url().'upload/bids_image/'.$bid[0]['image'];
                                            ?>
                                            <img  src="<?php echo $img ?> " height='150px' width='150px' class='img-responsive' ></div>
                                          <?php }else{ ?> <div id="img_product" style="display: none;"></div><?php } ?>
                                          
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div class="row">
                                                 <div class="col-md-3">
                                                   <label>Price</label>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <input type="text" name="price" value="<?php if(isset($bid_sellers[0]['price'])){ if($bid_sellers[0]['price']==0){ echo "";}else{ echo $bid_sellers[0]['price']; }}else{} ?>"  class="form-control" required=""  />
                                                 </div>
                                              </div><br>

                                                 <div class="row">
                                                 <div class="col-md-3">
                                                   <label>GST</label>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <input type="text" name="gst" value="<?php if(isset($bid_sellers[0]['gst'])){ echo $bid_sellers[0]['gst']; }else{} ?>"  class="form-control" required=""  />
                                                 </div>
                                              </div><br>


                                               <div class="row">
                                                 <div class="col-md-3">
                                                   <label>Delivery Days</label>
                                                 </div>
                                                 <div class="col-md-6">
                                               <input type="text"  class="form-control" value="<?php if(isset($bid_sellers[0]['delivery_days'])){ echo $bid_sellers[0]['delivery_days']; }else{} ?>" name="delivery_days" required="">
                                                 </div>
                                              </div><br>

                                               <div class="row">
                                                 <div class="col-md-3">
                                                   <label>Total weight in kg</label>
                                                 </div>
                                                 <div class="col-md-6">
                                               <input type="text"  class="form-control" value="<?php if(isset($bid_sellers[0]['total_weight'])){ echo $bid_sellers[0]['total_weight']; }else{} ?>" name="total_weight" required="">
                                                 </div>
                                              </div><br>

                                              <div class="row">
                                                 <div class="col-md-3">
                                                   <label>Message</label>
                                                 </div>
                                                 <div class="col-md-6">
                                               <input type="text"  class="form-control" name="other_details" value="<?php if(isset($bid_sellers[0]['other_details'])){ echo $bid_sellers[0]['other_details']; }else{} ?>">
                                                 </div>
                                              </div><br>

                                               <div class="row">
                                                 <div class="col-md-6">
                                                  <input type="button" id="btn" value="Submit" class="form-control" style="background-color: #94c766;color: white">  

                                                 </div>
                                                 
                                              </div><br><div id="error" style="color: red"></div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
 </form>       
                             </div>
                                    
                            </div>
                            </div>  
                        </div>
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      format: 'dd-mm-yy',
      autoclose: true
    });

  } );
  </script>

    <script type="text/javascript">
 $(document).ready(function()
    {
        $("#btn").click(function()
        {
          alert($("#final_quote").serialize())
            $.ajax({
                type:"post",
                data:$("#final_quote").serialize(),
                url:"<?php echo base_url()?>bids/get_bid_data",
               
                 success:function(res){
                  console.log(res);
                  //return;
                  var ss =JSON.parse(res);
                    if(ss.status==false)
                    {
                       $('#error').html(ss.message);
                    } else {
                        swal({
                          title: "Bid placed successfully.",
                          // text: "We will contact you soon",
                          type: "success",
                          timer: 3000,
                          showConfirmButton: false
                        }, function(){
                              //window.location.href = "<?php echo base_url('seller_page')?>";
                        });
                          } 
                 },
                error:function(er)
                {
                    console.log(er);
                        // $('.error_msg').html('error msg');
                     // window.location.href="<?php //echo base_url('Referlink')?>";
                }
            })
        })
    })

</script>