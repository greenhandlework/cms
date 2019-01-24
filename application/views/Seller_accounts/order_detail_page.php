
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Order Detail</title>
  <?php $this->load->view('hfs/html_header') ?>
  <style type="text/css">
    
    ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
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
        <?php 
         $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
             <div class="media align-items-center py-3 mb-4" style="margin-top: -20px !important;margin-bottom:-20px !important;">
              <img src="<?php echo base_url() ?>upload/products/<?php if(isset($detail[0]['prod_image1'])){echo $detail[0]['prod_image1'];} ?>" alt="" class="d-block ui-w-80 ui-bordered">
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-2"><?php if(isset($detail[0]['prod_name'])){ echo $detail[0]['prod_name']; } ?>
               
                </h4>
               
              </div>
            </div>
            <hr>


            <div class="row">
              <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                        <span class="text-muted">Order Id :</span>&nbsp; <?php if(isset($detail[0]['Order_id'])){ echo $detail[0]['Order_id'];}  ?>
                          <hr>
                         <span class="text-muted">Product Id :</span>&nbsp; <?php if (isset($detail[0]['product_id'])) { echo $detail[0]['product_id'];  } ?>
                      </div>
                    </div>
              </div>

               <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                          <span class="text-muted">Order Date :</span>&nbsp; <?php if(isset($detail[0]['ordered_date'])){
                               $datetime = new DateTime($detail[0]['ordered_date']);
                               $date = $datetime->format('d-m-Y');


                           echo $date; } ?>
                          <hr>
                         <span class="text-muted">Shipping Date :</span>&nbsp; <?php if(isset($detail[0]['product_delivered_date'])){ echo $detail[0]['product_delivered_date']; } ?>
                      </div>
                    </div>
              </div>

               <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                          <span class="text-muted">Buyer GST :</span>&nbsp; <?php if(isset($detail[0]['Gst']) && $detail[0]['Gst']!=0 && !empty($detail[0]['Gst'])){ echo $detail[0]['Gst']; }else { echo '-';} ?>
                          <hr>
                         <span class="text-muted">Seller GST :</span>&nbsp; <?php if(isset($detail[0]['Gst'])  && $detail[0]['Gst']!=0 && !empty($detail[0]['Gst'])){ echo $detail[0]['Gst']; }else{ echo '-'; } ?>
                      </div>
                    </div>
              </div>
            </div>



            
            
                  <hr>
                  <div class="row">
        <div class="col-md">

          <div class="card bg-transparent border-success mb-3 box-shadow-none">
            <div class="card-body">
              <center><h4 class="card-title" style="color: #02BC77 ">Product Details</h4><hr></center>
             <p>
                          <span class="text-muted">Material Name:</span>&nbsp; <?php if(isset($detail[0]['product_material'])){ echo $detail[0]['product_material']; } ?> </p>
                        <p>
                          <span class="text-muted">GSM :</span>&nbsp; <?php if(isset($detail[0]['GSM_name'])){ echo $detail[0]['GSM_name']; }  ?></p>
                        <p>
                          <span class="text-muted">Style:</span>&nbsp; <?php if(isset($detail[0]['style'])){ echo $detail[0]['style']; } ?></p>
                        <p>
                          <span class="text-muted">Size:</span>&nbsp;<?php if(isset($detail[0]['size'])){ echo $detail[0]['size']; } ?></p>
                        <p>
                          <span class="text-muted">Handle Type:</span>&nbsp;<?php if(isset($detail[0]['handle'])){ echo $detail[0]['handle']; } ?></p>
                        <p>
                          <span class="text-muted">Handle Size:</span>&nbsp;<?php if(isset($detail[0]['handle_size'])){ echo $detail[0]['handle_size'];} ?></p>
                        <p>
                          <span class="text-muted">Handle Colour:</span>&nbsp;<?php if(isset($detail[0]['handle_color'])){ echo $detail[0]['handle_color']; } ?></p>
                        <p>
                          <span class="text-muted">Gusset:</span>&nbsp;<?php if(isset($detail[0]['gusset_name'])){ echo $detail[0]['gusset_name']; }  ?></p>
                        <p>
                          <span class="text-muted">Product Color:</span>&nbsp;<?php if(isset($detail[0]['product_material_color'])){ echo $detail[0]['product_material_color']; } ?></p>
                        <p>
                          <span class="text-muted">Lamination:</span>&nbsp;<?php if(isset($detail[0]['lamination'])){ echo $detail[0]['lamination']; } ?></p>
            </div>
          </div>

        </div>
        <div class="col-md">

          <div class="card bg-transparent border-success mb-3 box-shadow-none">
            <div class="card-body">
              <center><h4 class="card-title" style="color: #02BC77 ">Buyer Details</h4><hr></center>
            <p>
                          <span class="text-muted">Name :</span>&nbsp;<?php if(isset($detail[0]['first_name']) && isset($detail[0]['last_name'])){  echo $detail[0]['first_name'] .' '. $detail[0]['last_name']; } ?> </p>
                        <p>
                          <span class="text-muted">Mobile No.:</span>&nbsp;<?php if(isset($detail[0]['mobile_number'])){ echo $detail[0]['mobile_number']; } ?> </p>
                        <p>
                          <span class="text-muted">Email :</span>&nbsp;<?php if(isset($detail[0]['email'])){ echo $detail[0]['email']; } ?></p>
                        <p>
                          <span class="text-muted">Address :</span>&nbsp;<?php if(isset($detail[0]['address_1']) && isset($detail[0]['address_2'])){ echo $detail[0]['address_1'].' '.$detail[0]['address_2']; } ?> </p>
                        <p>
                          <span class="text-muted">City:</span>&nbsp;<?php if(isset($detail[0]['city'])){ echo $detail[0]['city'];} ?></p>
                        <p>
                          <span class="text-muted">State:</span>&nbsp;<?php if(isset($detail[0]['state'])){ echo $detail[0]['state'];} ?> </p>
                        <p>
                          <span class="text-muted">Zipcode:</span>&nbsp;<?php if(isset($detail[0]['zipcode'])){ echo $detail[0]['zipcode']; } ?> </p>
                        
            </div>
          </div>

        </div>
        <div class="col-md">

          <div class="card bg-transparent border-success mb-3 box-shadow-none ">
            <div class="card-body ">
             <center><h4 class="card-title" style="color: #02BC77 ">Seller Details</h4><hr></center>
             <p>
                          <span class="text-muted">Name :</span>&nbsp;<?php if(isset($detail[0]['sel_name'])){ echo $detail[0]['sel_name']; } ?> </p>
                        <p>
                          <span class="text-muted">Business Name:</span>&nbsp;<?php if(isset($detail[0]['sel_business'])){ echo $detail[0]['sel_business']; } ?></p>
                        <p>
                          <span class="text-muted">Email:</span>&nbsp;<?php if(isset($detail[0]['sel_email'])){ echo $detail[0]['sel_email']; } ?> </p>
                        <p>
                          <span class="text-muted">Address:</span>&nbsp;<?php if(isset($detail[0]['sel_address1']) && isset($detail[0]['sel_address2'])){ echo $detail[0]['sel_address1'].' '.$detail[0]['sel_address2']; }  ?> </p>
                        <p>
                          <span class="text-muted">City :</span>&nbsp;<?php if(isset($detail[0]['sel_city'])){ echo $detail[0]['sel_city'] ;} ?></p>
                        <p>
                          <span class="text-muted">State:</span>&nbsp;<?php if(isset($detail[0]['sel_state'])){ echo $detail[0]['sel_state']; } ?></p>
                        <p>
                          <span class="text-muted">Zipcode:</span>&nbsp;<?php if(isset($detail[0]['sel_zipcode'])){ echo $detail[0]['sel_zipcode'];} ?> </p>
            </div>
          </div>

        </div>
        <div class="w-100"></div>
    
        
      </div>
         
                  <hr>
                  <div class="card-body" style="margin-top: -30px !important;margin-bottom: -36px !important;">

                    <div class="table-responsive    bg-lighter border-warning ">
                      <table class="table product-item-discounts-table">
                        <thead>
                          <tr class="table-success">
                            <th>Quantity</th>
                            <th>Price&nbsp;/&nbsp;piece</th>
                            <th>Discount</th>
                            <th>GST</th>
                            <th>Shipping&nbsp;Charges</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th><?php if(isset($detail[0]['quantity'])){ echo $detail[0]['quantity'] ; }  ?></th>
                            <td><?php if(isset($detail[0]['product_price'])){ echo $detail[0]['product_price'] ;}  ?></td>
                            <td><?php if(isset($detail[0]['discount']) && $detail[0]['discount']!=0 && !empty($detail[0]['discount']) ){ echo $detail[0]['discount'];}else{ echo '-';}  ?></td>
                            <td><?php if(isset($detail[0]['Gst']) && $detail[0]['Gst']!=0 && !empty($detail[0]['Gst'])){ echo $detail[0]['Gst']; }else{echo '-';} ?></td>
                            <td><?php if(isset($detail[0]['shipping_charges'])){ echo $detail[0]['shipping_charges']; }  ?></td>
                            <td><?php if(isset($detail[0]['product_wise_total'])){ echo $detail[0]['product_wise_total']; } ?></td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <hr>
                  <div class="card-body" style="margin-top: -36px !important;">

                    <div class="mb-4">
                      <!-- <span class="badge badge-dot badge-primary"></span> Primary image -->
                    </div>

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

                      <?php if(isset($detail[0]['prod_image1'])){ ?>
                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image1'] ?>" class="d-block border-primary ui-bordered">
                          <img src="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image1'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>
                    <?php } ?>

                     <?php if(isset($detail[0]['prod_image2'])){ ?>
                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image2'] ?>" class="d-block ui-bordered">
                          <img src="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image2'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>
                     <?php } ?>

                    <?php if(isset($detail[0]['prod_image3'])){ ?>
                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image3'] ?>" class="d-block ui-bordered">
                          <img src="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image3'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>
                     <?php } ?>

                     <?php if(isset($detail[0]['prod_image4'])){ ?>
                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image4'] ?>" class="d-block ui-bordered">
                          <img src="<?php echo base_url() ?>upload/products/<?php echo $detail[0]['prod_image4'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>
                    <?php } ?>
                    </div>
                  </div>

<!-- tracking code start -->
       <?php $count_current=""; foreach($Cartdetails as $list) { if(($list['order_status']!=="Delivered")&&($list['order_status']!=="Cancle")){ $count_current=count($list['order_status']);?>

<div class="edit-move-delete"><div class="actions"><span class="confirm-delete-item"> <b>
<span class="text gray confirm-delete-item tappable">

</span>
<div>
<?php

 $order="";
 $Production="";
 $Packed="";
 $Shipped="";
 $Delivered="";
 
 if($list['order_status']=="Order"){
 $order="progtrckr-done";
 $Production="progtrckr-todo";
 $Packed="progtrckr-todo";
 $Shipped="progtrckr-todo";
 $Delivered="progtrckr-todo";
 }elseif($list['order_status']=="Production"){
 $order="progtrckr-done";
 $Production="progtrckr-done";
 $Packed="progtrckr-todo";
 $Shipped="progtrckr-todo";
 $Delivered="progtrckr-todo";
 }elseif($list['order_status']=="Packed"){
 $order="progtrckr-done";
 $Production="progtrckr-done";
 $Packed="progtrckr-done";
 $Shipped="progtrckr-todo";
 $Delivered="progtrckr-todo";
 }elseif($list['order_status']=="Shipped"){
 $order="progtrckr-done";
 $Production="progtrckr-done";
 $Packed="progtrckr-done";
 $Shipped="progtrckr-done";
 $Delivered="progtrckr-todo";
 }elseif($list['order_status']=="Delivered"){ 
 $order="progtrckr-done";
 $Production="progtrckr-done";
 $Packed="progtrckr-done";
 $Shipped="progtrckr-done";
 $Delivered="progtrckr-done";
 }else{
 $order="progtrckr-todo";
 $Production="progtrckr-todo";
 $Packed="progtrckr-todo";
 $Shipped="progtrckr-todo";
 $Delivered="progtrckr-todo";
 }
 
?>
<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="<?php echo $order; ?>">Order Placed</li><!--
 --><li class="<?php echo $Production; ?>">Processing</li><!--
 --><li class="<?php echo $Packed; ?>">Ready To Dispatch</li><!--
 --><li class="<?php echo $Shipped; ?>">Dispatched</li><!--
 --><li class="<?php echo $Delivered; ?>">Delivered</li>
</ol></div>
</b></span><b>
</b>
</div></div>
<!-- </div></div></div><?php }}?>
                                </div>
                                <div class="row"> </div>
                                <?php if($count_current==0){?>
                                <div class="alert alert-success">
                                                 <lable id="current_lable">Current list is empty</lable>
                                                </div>
                                                <?php } ?>
                              </div> -->
<!-- tracking code end -->

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
</body>

</html>