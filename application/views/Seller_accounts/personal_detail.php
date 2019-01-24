
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Seller Peronal Detail</title>
  <?php $this->load->view('hfs/html_header') ?>
      <style type="text/css">
        #hr{ 
          
            border:         none;
            border-right:    1px solid #E6E6E6;
            /*height:         100vh;*/
            width:          1px;  
            /*margin     */
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

          <!-- Content -->
         <div class="container-fluid flex-grow-1 container-p-y">

            <div class="media align-items-center py-3 mb-3">
            
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-0"><?php if(isset($seller_data[0]['name'])){ echo $seller_data[0]['name'];  } ?>            
                </h4>
               
              </div>
            </div>
            <!-- personal info End -->
                 <h6 class="card-header alert alert-primary alert-dismissible fade show">Personal&nbsp;Details</h6>
                      
            <div class="row" style="margin-top:-16px">
              <div class="col-md-6" style="padding-right: 1px;">
              <div class="card ">
                 <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Seller&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['name'])){
                                    echo $seller_data[0]['name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Address&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?= $seller_data[0]['address_1']; ?>&nbsp;<?= $seller_data[0]['address_2']; ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">City&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['city'])){
                                    echo $seller_data[0]['city'];
                                  } ?></label>
                    </div>
                  </div>

                        <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Zipcode&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['zipcode'])){
                                    echo $seller_data[0]['zipcode'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Mobile&nbsp;No.&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['mobile_number'])){
                                    echo $seller_data[0]['mobile_number'];
                                  } ?></label>
                    </div>
                  </div>

                  </div>

                  </div>
              </div>
           
              <div class="col-md-6" style="padding-left: 2px;">
            <div class="card ">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Business&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['business_name'])){
                                    echo $seller_data[0]['business_name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">State&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['state'])){
                                    echo $seller_data[0]['state'];
                                  } ?></label>
                    </div>
                  </div>

                     <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Email&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['email'])){
                                    echo $seller_data[0]['email'];
                                  } ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> 
            <br> 
           
            <!-- personal info End -->

            <!-- Business Detail -->           
            <h6 class="card-header alert alert-primary alert-dismissible fade show">Business Details</h6>

            <div class="row" style="margin-top:-16px">
              <div class="col-md-6" style="padding-right: 1px;">
              <div class="card ">
                 <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Business&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['business_name'])){
                                    echo $seller_data[0]['business_name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">GSTIN&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['biz_gst'])){
                                    echo $seller_data[0]['biz_gst'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">TAN&nbsp;Number&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['tan'])){
                                    echo $seller_data[0]['tan'];
                                  } ?></label>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
              <div class="col-md-6" style="padding-left: 2px;">
            <div class="card ">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">PAN&nbsp;Number&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['pan'])){
                                    echo $seller_data[0]['pan'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Legal&nbsp;Identity&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Legal_Identity'])){
                                    echo $seller_data[0]['Legal_Identity'];
                                  } ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> 
            <br>                  
          <!-- Business detail End -->

          <!--  Bank Detail start -->
            <h6 class="card-header alert alert-primary alert-dismissible fade show">Bank&nbsp;Details</h6>
                      
            <div class="row" style="margin-top:-16px">
              <div class="col-md-6" style="padding-right: 1px;">
              <div class="card ">
                 <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Account&nbsp;Holder&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['account_holder'])){
                                    echo $seller_data[0]['account_holder'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">IFSC&nbsp;Code&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['IFSC_code'])){
                                    echo $seller_data[0]['IFSC_code'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Branch&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['branch'])){
                                    echo $seller_data[0]['branch'];
                                  } ?></label>
                    </div>
                  </div>

                        <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Bank&nbsp;State&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['bank_state'])){
                                    echo $seller_data[0]['bank_state'];
                                  } ?></label>
                    </div>
                  </div>
                  </div>

                  </div>
              </div>
           
              <div class="col-md-6" style="padding-left: 2px;">
            <div class="card ">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">PAN&nbsp;Number&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['pan'])){
                                    echo $seller_data[0]['pan'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Legal&nbsp;Identity&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Legal_Identity'])){
                                    echo $seller_data[0]['Legal_Identity'];
                                  } ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> 
            <br> 
        
            <!-- Bank Details End -->

            <!-- Store Detail -->
            <h6 class="card-header alert alert-primary alert-dismissible fade show">Stores&nbsp;Details</h6>
                      
            <div class="row" style="margin-top:-16px">
              <div class="col-md-6" style="padding-right: 1px;">
              <div class="card ">
                 <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Display&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['display_name'])){
                                    echo $seller_data[0]['display_name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Classification&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Classification'])){
                                    echo $seller_data[0]['Classification'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Secondary&nbsp;Product&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Secondry_Product'])){
                                    echo $seller_data[0]['Secondry_Product'];
                                  } ?></label>
                    </div>
                  </div>
                        
                  </div>

                  </div>
              </div>
           
              <div class="col-md-6" style="padding-left: 2px;">
            <div class="card ">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Primary&nbsp;Product&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Primary_Product'])){
                                    echo $seller_data[0]['Primary_Product'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Making&nbsp;Process&nbsp;:</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($seller_data[0]['Making_Process'])){
                                    echo $seller_data[0]['Making_Process'];
                                  } ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> 
            <br> 
          
            <!-- Store Details End -->
 

          <div class="card" >
                  <h6 class="card-header">Attached files</h6><br>
               <!-- Lightbox template -->
                    <div id="product-item-lightbox" class="blueimp-gallery blueimp-gallery-controls">
                      <div class="slides"></div>
                      <h3 class="title"></h3>
                      <a class="prev">‹</a>
                      <a class="next">›</a>
                      <a class="close">×</a>
                      <ol class="indicator"></ol>
                    </div>

                    <div id="product-item-images" class="row" style="
    margin-left: 10px;margin-right: 9px
">

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="d-block border-primary ui-bordered">
                          <img src="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="img-fluid" alt="">
                        </a>PAN Image
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                             <a href="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="d-block border-primary ui-bordered">
                          <img src="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="img-fluid" alt="">
                        </a>ID Image
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                             <a href="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="d-block border-primary ui-bordered">
                          <img src="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="img-fluid" alt="">
                        </a>Address Image
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                             <a href="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="d-block border-primary ui-bordered">
                          <img src="https://greenhandle.in/upload/seller_document/demo_image.jpg" class="img-fluid" alt="">
                        </a>Cancelled cheque Image
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
</body>

</html>