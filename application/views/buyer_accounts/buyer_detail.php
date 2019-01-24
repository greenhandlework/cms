
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Buyer Peronal Detail</title>
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
                <h4 class="font-weight-bold mb-0"><?php if(isset($buyer_detail[0]['first_name'])){ echo $buyer_detail[0]['first_name'].' '.$buyer_detail[0]['last_name'];  } ?>            
                </h4>
               
              </div>
         
         <div class="media-body ml-4">
          <a href="<?= ADMIN_PATH.'buyer_accounts/delete_buyer/' ?><?php echo $buyer_detail[0]['user_id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-xs btn-outline-danger" >Delete</a>
         </div>
            </div>
            <!-- personal info End -->
                 <h6 class="card-header alert alert-primary alert-dismissible fade show">Personal&nbsp;Details</h6>
                      
            <div class="row" style="margin-top:-16px">
              <div class="col-md-6" style="padding-right: 1px;">
              <div class="card ">
                 <div class="card-body">
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Buyer&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['first_name'])){
                                    echo $buyer_detail[0]['first_name'].' '.$buyer_detail[0]['last_name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Address&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?= $buyer_detail[0]['address_1']; ?>&nbsp;<?= $buyer_detail[0]['address_2']; ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">City&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['city'])){
                                    echo $buyer_detail[0]['city'];
                                  } ?></label>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">State&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['state'])){
                                    echo $buyer_detail[0]['state'];
                                  } ?></label>
                    </div>
                  </div>

                        <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Zipcode&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['zipcode'])){
                                    echo $buyer_detail[0]['zipcode'];
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
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Mobile&nbsp;No.&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['mobile_number'])){
                                    echo $buyer_detail[0]['mobile_number'];
                                  } ?></label>
                    </div>
                  </div>
                 

                <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Email&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['email'])){
                                    echo $buyer_detail[0]['email'];
                                  } ?></label>
                    </div>
                  </div>
               

                 <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Business&nbsp;Name&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['org_name'])){
                                    echo $buyer_detail[0]['org_name'];
                                  } ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">GSTIN&nbsp;:</label>
                    <div class="col-sm-7">
                      <label class="col-form-label col-form-label-sm"><?php if(isset($buyer_detail[0]['gst'])){
                                    echo $buyer_detail[0]['gst'];
                                  } ?></label>
                    </div>
                  </div>

                 </div>
              </div>
            </div>
            </div> 
            <br> 
           
            <!-- personal info End -->

            
           
 

          
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