
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Account Detailk</title>
  <?php 
   $this->load->view('hfs/html_header') ?>
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
                <div class="media-body ml-4">
                  <h4 class="font-weight-bold mb-2"><?= 'Seller Name Here' ?></h4>              
                </div>
            </div>
<hr>
            <div class="row">
              <div class="col-md-4 ">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="<?= ADMIN_PATH.'seller_accounts/personal_detail/'?><?php echo $seller_id ?>" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Details</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

              <div class="col-md-4 ">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="<?= ADMIN_PATH.'seller_accounts/product_list/'?><?php echo $seller_id ?>" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Products</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

              <div class="col-md-4 ">
               <div class="card mb-4 ">
                  <div class="w-100">
                    <a href="<?= ADMIN_PATH.'seller_accounts/order_list'?>" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Orders</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

            </div>
            <br>
             <div class="row">
              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Settelment</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

              <div class="col-md-4">
               <div class="card mb-4">
                  <div class="w-100">
                    <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Review&nbsp;&&nbsp;Comments</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Offer&nbsp;&&nbsp;Discount</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
                  </div>
                 
                </div>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="w-100">
                    <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Business&nbsp;Intelligent</span>    
                        </div>
                       <!--  <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">FREE</div>
                        </div> -->
                      </div>
                    </a>
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
</body>

</html>