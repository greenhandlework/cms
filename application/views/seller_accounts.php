
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Seller-Account</title>
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

            <div class="media align-items-center py-3 mb-4" style="padding-bottom:0px !important">
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-2">Seller Accounts
                </h4>
               
              </div>
            </div>

            <div class="nav-tabs-top nav-responsive-sm">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#item-seller">Sellers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-reg_seller">Registered Seller</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-vendor">Vendor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-offline_seller">Offline Seller</a>
                </li>
              </ul>
              <div class="tab-content">

                <!-- Overview -->
                <div class="tab-pane fade active show" id="item-seller">

                  <div class="card-body">
                    <table id="seller_1" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th >Business&nbsp;Name</th>
                                <th>Seller&nbsp;Name</th>
                                <th>Seller&nbsp;Id</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action</th>
                               
                             </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                            foreach ($seller as $value) { 
                              if($value['account_status']=="No"){
                                // $bulk_id_pro = base_url().'seller_accounts/account_detail/'.$value['user_id'];
                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['org_name'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td><?php echo $value['email'] ?></td>

                              </td>
                                </tr>
                          <?php  } } ?>
                             
                          </tbody>
                      
                    </table>
                  </div>
                 

                </div>
                <!-- / Overview -->

                <!-- Description -->
                <div class="tab-pane fade" id="item-reg_seller">
                    <div class="card-body">
                    <table id="reg_seller" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                              <th>#</th>
                                <th >Business&nbsp;Name</th>
                                <th>Seller&nbsp;Name</th>
                                <th>Seller&nbsp;Id</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action</th>
                             </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                            foreach ($seller as $value) { 
                              if($value['account_status']=="Yes"){
                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['org_name'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td></td>
                                </tr>
                          <?php  } } ?>
                             
                          </tbody>
                      
                    </table>
                  </div>
                 
                </div>
                <!-- / Description -->

                <!-- Discounts -->
                <div class="tab-pane fade" id="item-vendor">
                     <div class="card-body">
                    <table id="vendor1" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th >Business&nbsp;Name</th>
                                <th>Seller&nbsp;Name</th>
                                <th>Seller&nbsp;Id</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action</th>
                             </tr>
                        </thead>
                         <tbody>
                           <?php $i=1;
                            foreach ($seller_with_product as $value) { 
                               if($value['account_status']=="Yes" && $value['product_status']==2){
                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['org_name'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td></td>
                                </tr>
                          <?php  } } ?>
                             
                          </tbody>
                      
                    </table>
                  </div>
                 
                </div>
                <!-- / Discounts -->

                <!-- Images -->
                <div class="tab-pane fade" id="item-offline_seller">
                     <div class="card-body">
                    <table id="offline_seller" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                               <th>#</th>
                                <th >Business&nbsp;Name</th>
                                <th>Seller&nbsp;Name</th>
                                <th>Seller&nbsp;Id</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action</th>
                             </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                            foreach ($seller_with_product as $value) { 
                               if($value['account_status']=="Offline" && $value['product_status']==4  ){
                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['org_name'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td></td>
                                </tr>
                          <?php  } } ?>
                             
                          </tbody>
                      
                    </table>
                  </div>
                 
                </div>
                <!-- / Images -->

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
    $('#seller_1').DataTable();
     $('#reg_seller').DataTable();
      $('#vendor1').DataTable();
       $('#offline_seller').DataTable();

} );
  </script>
</body>

</html>