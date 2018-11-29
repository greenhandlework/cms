
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Order Detail</title>
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
          <div class="container-fluid flex-grow-1 container-p-y">
             <div class="media align-items-center py-3 mb-4" style="margin-top: -20px !important;margin-bottom:-20px !important;">
              <img src="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image1'] ?>" alt="" class="d-block ui-w-80 ui-bordered">
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-2">
                Product name here
                </h4>
               
              </div>
            </div>
            <hr>


            <div class="row">
              <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                        <span class="text-muted">Order Id :</span>&nbsp; 
                          <hr>
                         <span class="text-muted">Product Id :</span>&nbsp; 
                      </div>
                    </div>
              </div>

               <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                          <span class="text-muted">Order Date :</span>&nbsp; 
                          <hr>
                         <span class="text-muted">Shipping Date :</span>&nbsp; 
                      </div>
                    </div>
              </div>

               <div class="col-md-4">
                    <div class="card bg-transparent border-primary mb-3 box-shadow-none ">
                      <div class="card-body ">
                          <span class="text-muted">Buyer GST :</span>&nbsp; 
                          <hr>
                         <span class="text-muted">Seller GST :</span>&nbsp; 
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
                          <span class="text-muted">Material Name:</span>&nbsp;  </p>
                        <p>
                          <span class="text-muted">GSM :</span>&nbsp; </p>
                        <p>
                          <span class="text-muted">Style:</span>&nbsp; </p>
                        <p>
                          <span class="text-muted">Size:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Handle Type:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Handle Size:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Handle Colour:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Gusset:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Product Color:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Lamination:</span>&nbsp;</p>
            </div>
          </div>

        </div>
        <div class="col-md">

          <div class="card bg-transparent border-success mb-3 box-shadow-none">
            <div class="card-body">
              <center><h4 class="card-title" style="color: #02BC77 ">Buyer Details</h4><hr></center>
            <p>
                          <span class="text-muted">Name :</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Mobile No.:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Email :</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Address :</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">City:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">State:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Zipcode:</span>&nbsp; </p>
                        
            </div>
          </div>

        </div>
        <div class="col-md">

          <div class="card bg-transparent border-success mb-3 box-shadow-none ">
            <div class="card-body ">
             <center><h4 class="card-title" style="color: #02BC77 ">Seller Details</h4><hr></center>
             <p>
                          <span class="text-muted">Name :</span>&nbsp; </p>
                        <p>
                          <span class="text-muted">Business Name:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Email:</span>&nbsp; </p>
                        <p>
                          <span class="text-muted">Address:</span>&nbsp; </p>
                        <p>
                          <span class="text-muted">City :</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">State:</span>&nbsp;</p>
                        <p>
                          <span class="text-muted">Zipcode:</span>&nbsp; </p>
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
                            <th></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
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

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image1'] ?>" class="d-block border-primary ui-bordered">
                          <img src="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image1'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image2'] ?>" class="d-block ui-bordered">
                          <img src="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image2'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image3'] ?>" class="d-block ui-bordered">
                          <img src="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image3'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image4'] ?>" class="d-block ui-bordered">
                          <img src="<?php //echo base_url() ?>upload/products/<?php //echo $detail[0]['prod_image4'] ?>" class="img-fluid" alt="">
                        </a>
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