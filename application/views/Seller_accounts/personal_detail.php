
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
                <h4 class="font-weight-bold mb-0">Seller Name Here                  
                </h4>
               
              </div>
            </div>
            <!-- personal info End -->
        
             <div class="card mb-4">
                  <h6 class="card-header alert alert-primary alert-dismissible fade show">Personal Details</h6>
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-md-6 col-lg-12 col-xl-6 p-1" id="hr">
                        
                        <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Seller&nbsp;Name&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['name']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Address&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['address_1']; ?>&nbsp;<?= $seller_data[0]['address_2']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">City&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['city']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Zipcode&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['zipcode']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Mobile No.&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['mobile_number']; ?></label>
                          </div>
                        </div>

                      <!--    <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Seller&nbsp;Name:</td>
                                <td><?= $seller_data[0]['name']; ?></td>
                              </tr>
                              <tr>
                                <td>Address:</td>
                                <td><?= $seller_data[0]['address_1']; ?></td>
                              </tr>
                              <tr>
                                <td>City:</td>
                                <td><?= $seller_data[0]['city']; ?></td>
                              </tr>
                              <tr>
                                <td>Zipcode:</td>
                                <td><?= $seller_data[0]['zipcode']; ?></td>
                              </tr>
                              <tr>
                                <td>Mobile No.:</td>
                               <td><?= $seller_data[0]['mobile_number']; ?></td>
                              </tr>
                            </tbody>
                          </table>                     -->
                      </div>

                      <div class="col-md-6 col-lg-12 col-xl-6 p-1" >

                        <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Business&nbsp;&nbsp;Name&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?php if(isset($seller_data[0]['business_name'])){
                                      echo $seller_data[0]['business_name'];
                                    } ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">State&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['state']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Email&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['email']; ?></label>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Registration&nbsp;Date&nbsp;</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?= $seller_data[0]['account_creation_date']; ?></label>
                          </div>
                        </div>

                         

                        <!--  <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Business&nbsp;&nbsp;Name:</td>
                                <td><?php if(isset($seller_data[0]['business_name'])){
                                      echo $seller_data[0]['business_name'];
                                    } ?>
                                </td>
                              </tr>
                              <tr>
                                <td>Address:</td>
                                <td><?= $seller_data[0]['address_2']; ?></td>
                              </tr>
                              <tr>
                                <td>State:</td>
                                <td><?= $seller_data[0]['state']; ?></td>
                              </tr>
                              <tr>
                                <td>Email:</td>
                                <td><?= $seller_data[0]['state']; ?></td>
                              </tr>
                              <tr>
                                <td>Registration Date:</td>
                                <td><?= $seller_data[0]['account_creation_date']; ?></td>
                              </tr>
                            </tbody>
                          </table> -->
                      </div>
                     
                    </div>
                  </div>
            </div>
            <!-- personal info End -->

            <!-- Business Detail -->
            <div class="card mb-4">
                  <h6 class="card-header">Business Details</h6>
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-md-6 col-lg-12 col-xl-6 p-1">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Business Name : </td>
                                <td>
                                  <?php if(isset($seller_data[0]['business_name'])){
                                    echo $seller_data[0]['business_name'];
                                  } ?>
                                </td>
                              </tr>
                              <tr>
                                <td>GSTIN :</td>
                                <td><?php if(isset($seller_data[0]['biz_gst'])){
                                    echo $seller_data[0]['biz_gst'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>TAN Number :</td>
                                <td><?php if(isset($seller_data[0]['tan'])){
                                    echo $seller_data[0]['tan'];
                                  } ?></td>
                              </tr>
                              
                            </tbody>
                          </table>                    
                      </div>

                      <div class="col-md-6 col-lg-12 col-xl-6 p-1" id="hr">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>PAN Number :</td>
                                <td><?php if(isset($seller_data[0]['pan'])){
                                    echo $seller_data[0]['pan'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Legal Identity :</td>
                                <td><?php if(isset($seller_data[0]['Legal_Identity'])){
                                    echo $seller_data[0]['Legal_Identity'];
                                  } ?></td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div>
                     
                    </div>
                  </div>
            </div>
          <!-- Business detail End -->

          <!--  Bank Detail start -->
          <div class="card mb-4">
                  <h6 class="card-header">Bank Details</h6>
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-md-6 col-lg-12 col-xl-6 p-1">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Account Holder Name:</td>
                                <td><?php if(isset($seller_data[0]['account_holder'])){
                                    echo $seller_data[0]['account_holder'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>IFSC Code:</td>
                                <td><?php if(isset($seller_data[0]['IFSC_code'])){
                                    echo $seller_data[0]['IFSC_code'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Branch:</td>
                                <td><?php if(isset($seller_data[0]['branch'])){
                                    echo $seller_data[0]['branch'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Bank State:</td>
                                <td><?php if(isset($seller_data[0]['bank_state'])){
                                    echo $seller_data[0]['bank_state'];
                                  } ?></td>
                              </tr>
                              
                            </tbody>
                          </table>                    
                      </div>

                      <div class="col-md-6 col-lg-12 col-xl-6 p-1" id="hr">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Bank Account Number:</td>
                                <td><?php if(isset($seller_data[0]['account_number'])){
                                    echo $seller_data[0]['account_number'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Bank:</td>
                                <td><?php if(isset($seller_data[0]['bank'])){
                                    echo $seller_data[0]['bank'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Bank City:</td>
                                <td><?php if(isset($seller_data[0]['bank_city'])){
                                    echo $seller_data[0]['bank_city'];
                                  } ?></td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div>
                     
                    </div>
                  </div>
            </div>
            <!-- Bank Details End -->

            <!-- Store Detail -->
            <div class="card mb-4">
                  <h6 class="card-header">Store Details</h6>
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-md-6 col-lg-6 col-xl-3 p-1">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Display Name:</td>
                                <td><?php if(isset($seller_data[0]['display_name'])){
                                    echo $seller_data[0]['display_name'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Classification:</td>
                                <td><?php if(isset($seller_data[0]['Classification'])){
                                    echo $seller_data[0]['Classification'];
                                  } ?></td>
                              </tr>
                              
                              <tr>
                                <td>Secondary Product:</td>
                                <td><?php if(isset($seller_data[0]['Secondry_Product'])){
                                    echo $seller_data[0]['Secondry_Product'];
                                  } ?></td>
                              </tr>
                            </tbody>
                          </table>                    
                      </div>

                      <div class="col-md-6 col-lg-6 col-xl-3 p-1" id="hr">
                         <table class="table user-view-table m-0">
                            <tbody>
                              <tr>
                                <td>Primary Product:</td>
                                <td><?php if(isset($seller_data[0]['Primary_Product'])){
                                    echo $seller_data[0]['Primary_Product'];
                                  } ?></td>
                              </tr>
                              <tr>
                                <td>Making Process:</td>
                                <td><?php if(isset($seller_data[0]['Making_Process'])){
                                    echo $seller_data[0]['Making_Process'];
                                  } ?></td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div>
                     
                    </div>
                  </div>
            </div>
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