<?php 
// echo "<pre>"; print_r($user_detail_seller); exit();

?>
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
                <!-- <h4 class="font-weight-bold mb-2">Seller Accounts -->
                </h4>
               
              </div>
            </div>

            <div class="nav-tabs-top nav-responsive-sm">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active show" data-toggle="tab" href="#item-current">Current&nbsp;Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-order_in_process">Order&nbsp;In&nbsp;Process</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-order_on_delivery">Order&nbsp;On&nbsp;Delivery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-delivered_order">Delivered&nbsp;Order </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-billing_info">Billing&nbsp;Info </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-personal_details">Personal&nbsp;Details </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#item-product_list">Product&nbsp;List </a>
                </li>
              </ul>
              <div class="tab-content">
                <!-- current -->
                <div class="tab-pane fade active show " id="item-current">
                  <div class="card-body">
                   
                  </div>
                </div>
                <!-- / current -->

                <!-- order_in_process -->
                <div class="tab-pane fade" id="item-order_in_process">
                    <div class="card-body">
                   
                  </div>
                 
                </div>
                <!-- / order_in_process -->

                <!-- order_on_delivery -->
                <div class="tab-pane fade" id="item-order_on_delivery">
                     <div class="card-body">
                    
                  </div>
                 
                </div>
                <!-- / order_on_delivery -->

                <!-- delivered_order -->
                <div class="tab-pane fade" id="item-delivered_order">
                     <div class="card-body">
                   
                  </div>
                 
                </div>
                <!-- / delivered_order -->

                 <!-- billing_info -->
                <div class="tab-pane fade " id="item-billing_info">

                  <div class="card-body">
                   
                  </div>
                 

                </div>
                <!-- / billing_info -->

                 <!-- personal_details -->
                <div class="tab-pane fade " id="item-personal_details">

                  <div class="card-body">
                    <div class="row">
                <div class="col-md-6">
                  <div class="card mb-6">
                  <!-- Add `.with-elements` to the parent `.card-header` element -->
                    <div class="card-header with-elements alert alert-primary alert-dismissible fade show">
                      <span class="card-header-title mr-2"><b><center>PERSONAL&nbsp;DETAIL</center></b></span>
                    </div>

                    <div class="card-body" style="padding-right:1.5rem !important ;padding-left:1.5rem !important ;padding-bottom: 1.5rem !important ;padding-top: 0rem !important ">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Seller&nbsp;Name :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['name'])){ echo $user_detail[0]['name']; } ?> </label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Business&nbsp;Name :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['org_name'])){ echo $user_detail[0]['org_name']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Address :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail[0]['address_1'])){ echo $user_detail[0]['address_1']; echo $user_detail[0]['address_2']; } ?></label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">City :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['city'])){ echo $user_detail[0]['city']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">State :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['state'])){ echo $user_detail[0]['state']; } ?></label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Zipcode :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['zipcode'])){ echo $user_detail[0]['zipcode']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Email&nbsp;Id :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['email'])){ echo $user_detail[0]['email']; } ?> </label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Mobile&nbsp;Number :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail[0]['mobile_number'])){ echo $user_detail[0]['mobile_number']; } ?></label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Registration&nbsp;Date :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail[0]['account_creation_date'])){
                               $datetime = new DateTime($user_detail[0]['account_creation_date']);
                               $date = $datetime->format('d-m-Y');
                            echo $date; } ?> </label>
                       </div>
                    </div>

                </div> 
                </div>  
       <?php
     //  if($user_detail[0]['account_status']=='Yes'){ ?>
                 <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card mb-12">
                  <!-- Add `.with-elements` to the parent `.card-header` element -->
                    <div class="card-header with-elements alert alert-primary alert-dismissible fade show">
                      <span class="card-header-title mr-2"><b><center>BUSSINESS&nbsp;DETAIL</center></b></span>
                    </div>

                    <div class="card-body" style="padding-right:1.5rem !important ;padding-left:1.5rem !important ;padding-bottom: 1.5rem !important ;padding-top: 0rem !important ">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Business&nbsp;Name :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 ">
                           <?php if(isset($user_detail_seller[0]['business_name'])){ echo $user_detail_seller[0]['business_name']; } ?> </label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">PAN&nbsp;Number :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail_seller[0]['pan'])){ echo $user_detail_seller[0]['pan']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">GSTIN :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 ">  <?php if(isset($user_detail_seller[0]['biz_gst'])){ echo $user_detail_seller[0]['biz_gst']; } ?></label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">TAN&nbsp;Number :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail_seller[0]['Tan_Number'])){ echo $user_detail_seller[0]['Tan_Number']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Legal&nbsp;Identity :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 ">  <?php if(isset($user_detail_seller[0]['Legal_Identity'])){ echo $user_detail_seller[0]['Legal_Identity']; } ?></label>
                       </div>

                    </div>

                </div> 
                    </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                  <div class="card mb-6">
                  <!-- Add `.with-elements` to the parent `.card-header` element -->
                    <div class="card-header with-elements alert alert-primary alert-dismissible fade show">
                      <span class="card-header-title mr-2"><b><center>BANK&nbsp;DETAILS</center></b></span>
                    </div>

                    <div class="card-body" style="padding-right:1.5rem !important ;padding-left:1.5rem !important ;padding-bottom: 1.5rem !important ;padding-top: 0rem !important ">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Account&nbsp;Holder&nbsp;Name :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "> <?php if(isset($user_detail_seller[0]['account_holder'])){ echo $user_detail_seller[0]['account_holder']; } ?> </label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Bank&nbsp;Account&nbsp;Number :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "> <?php if(isset($user_detail_seller[0]['account_number'])){ echo $user_detail_seller[0]['account_number']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">IFSC&nbsp;Code :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "><?php if(isset($user_detail_seller[0]['IFSC_code'])){ echo $user_detail_seller[0]['IFSC_code']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Bank :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "> <?php if(isset($user_detail_seller[0]['bank'])){ echo $user_detail_seller[0]['bank']; } ?></label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Branch :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "><?php if(isset($user_detail_seller[0]['branch'])){ echo $user_detail_seller[0]['branch']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Bank&nbsp;City :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "><?php if(isset($user_detail_seller[0]['bank_city'])){ echo $user_detail_seller[0]['bank_city']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-5 text-sm-right">Bank&nbsp;State :</label>
                           <label class="col-form-label col-form-label-sm col-sm-7 "><?php if(isset($user_detail_seller[0]['bank_state'])){ echo $user_detail_seller[0]['bank_state']; } ?> </label>
                       </div>

                    </div>

                </div> 
                </div>  
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card mb-12">
                  <!-- Add `.with-elements` to the parent `.card-header` element -->
                    <div class="card-header with-elements alert alert-primary alert-dismissible fade show">
                      <span class="card-header-title mr-2"><b><center>STORE&nbsp;DETAIL</center></b></span>
                    </div>

                    <div class="card-body" style="padding-right:1.5rem !important ;padding-left:1.5rem !important ;padding-bottom: 1.5rem !important ;padding-top: 0rem !important ">
                      <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Display&nbsp;Name :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail_seller[0]['display_name'])){ echo $user_detail_seller[0]['display_name']; } ?></label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Store&nbsp;Decription :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "> <?php if(isset($user_detail_seller[0]['store_description'])){ echo $user_detail_seller[0]['store_description']; } ?></label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Classification :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail_seller[0]['Classification'])){ echo $user_detail_seller[0]['Classification']; } ?> </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Primary&nbsp;Product :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail_seller[0]['Primary_Product'])){ echo $user_detail_seller[0]['Primary_Product']; } ?>  </label>
                       </div>

                        <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Secondary&nbsp;Product :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail_seller[0]['Secondry_Product'])){ echo $user_detail_seller[0]['Secondry_Product']; } ?> </label>
                       </div>

                       <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Making&nbsp;Process :</label>
                           <label class="col-form-label col-form-label-sm col-sm-8 "><?php if(isset($user_detail_seller[0]['Making_Process'])){ echo $user_detail_seller[0]['Making_Process']; } ?> </label>
                       </div>

                    </div>

                </div> 
                    </div>
                </div>
              </div>
            </div>

            <br>
           <div class="row">
             <div class="col-md-12">
                 <div class="card mb-2">
                <div class="card-header with-elements alert alert-primary alert-dismissible fade show">
                      <span class="card-header-title mr-2"><b><center>DOCUMENT&nbsp;PROVIDED</center></b></span>
                </div>
                  <div class="card-body p-3">
                    <div class="row no-gutters">
                      <div class="col-md-3 col-lg-6 col-xl-3 p-1">

                        <div class="project-attachment ui-bordered p-2">
                          <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['pan_image'])){ echo $user_detail_seller[0]['pan_image']; } ?>" style="height: 100px;padding-left: 25px;">
                          <!-- <div class="project-attachment-img" style="background-image: url(http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['pan_image'])){ echo $user_detail_seller[0]['pan_image']; } ?>)"></div> -->
                          <div class="media-body ml-3">
                            <strong class="project-attachment-filename">PAN Image</strong>
                            <div>
                              <a href="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['pan_image'])){ echo $user_detail_seller[0]['pan_image']; } ?>" target="_blank">View</a>
                              <!-- provide image path here -->
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3 col-lg-6 col-xl-3 p-1">

                        <div class="project-attachment ui-bordered p-2">
                        <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['id_image'])){ echo $user_detail_seller[0]['id_image']; } ?>" style="height: 100px;padding-left: 25px;">
                          <div class="media-body ml-3">
                            <strong class="project-attachment-filename">ID Image</strong>
                            
                            <div>
                             <a href="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['id_image'])){ echo $user_detail_seller[0]['id_image']; } ?>" target="_blank">View</a>
                            </div>
                          </div>
                        </div>

                      </div>

                        <div class="col-md-3 col-lg-6 col-xl-3 p-1">

                        <div class="project-attachment ui-bordered p-2">
                          <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['address_image'])){ echo $user_detail_seller[0]['address_image']; } ?>" style="height: 100px;padding-left: 25px;">
                          <div class="media-body ml-3">
                            <strong class="project-attachment-filename">Address Image</strong>
                            <div>
                              <a href="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['address_image'])){ echo $user_detail_seller[0]['address_image']; } ?>" target="_blank">View</a>
                              <!-- provide image path here -->
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3 col-lg-6 col-xl-3 p-1">

                        <div class="project-attachment ui-bordered p-2">
                           <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['cancel_chk_image'])){ echo $user_detail_seller[0]['cancel_chk_image']; } ?>" style="height: 100px;padding-left: 25px;">
                          <div class="media-body ml-3">
                            <strong class="project-attachment-filename">Cancelled Cheque Image</strong>
                           
                            <div>
                             <a href="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['cancel_chk_image'])){ echo $user_detail_seller[0]['cancel_chk_image']; } ?>" target="_blank">View</a>
                            </div>
                          </div>
                        </div>

                      </div>

                        <div class="col-md-3 col-lg-6 col-xl-3 p-1">

                        <div class="project-attachment ui-bordered p-2">
                           <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['gst_image'])){ echo $user_detail_seller[0]['gst_image']; } ?>" style="height: 100px;padding-left: 25px;">
                          <div class="media-body ml-3">
                            <strong class="project-attachment-filename">GSTIN Image</strong>
                            <div>
                              <a href="http://52.66.99.138/upload/seller_documents/<?php if(isset($user_detail_seller[0]['gst_image'])){ echo $user_detail_seller[0]['gst_image']; } ?>" target="_blank">View</a>
                              <!-- provide image path here -->
                            </div>
                          </div>
                        </div>

                      </div>
                      
                      
                    </div>
                  </div>
                </div>
             </div>
           </div> 
      <?php // }  ?>

                  </div>
                 

                </div>
                <!-- / personal_details -->

                 <!-- product_list -->
                <div class="tab-pane fade" id="item-product_list">
                  <input type="hidden" name="seller_id" id="seller_id" value="<?php echo $user_detail_seller[0]['seller_id']  ?>">
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-3">
                      <label class="form-label">Product Status</label>
                        <select class="custom-select" name="product_status" onchange="productby(this)">
                          <option value="0">Pending</option>
                          <option value="1">Approved</option>
                          <option value="2" selected="selected">Live</option>
                          <option value="4">Offline</option>
                        </select>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="card-datatable table-responsive" id="replace_with_response">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                              <th>Product&nbsp;Name</th>
                              <th>Product&nbsp;ID</th>
                              <th>Image</th>
                              <th>Status</th>
                        </tr>
                    </thead>
                     <tbody id="tc">
                          <?php $i=1;
                              foreach ($product_detail as $key => $value) { ?>
                                <tr>
                                  <td><?php echo $i++ ?></td>
                                  <td><?php echo $value['prod_name'] ?></td>
                                  <td><?php echo $value['prod_id'] ?></td>
                                  <td> <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($value['prod_image1'])){ echo $value['prod_image1']; } ?>" style="height: 100px;padding-left: 25px;"> </td>
                                  <td>
                                    <label class="btn-xs btn-success">Live</label>
                                    <!-- <button type="button" class="btn btn-xs btn-success">Live</button></td> -->
                                </tr>
                          <?php } ?>     
                         
                      </tbody>
                  
                </table>
              </div>
                    </div>
                  </div>
                 

                </div>
                <!-- / product_list -->

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
} );

function productby(m){
  var status = m.value;
  var seller_id = $('#seller_id').val();
  $.ajax({
    url  : "<?= ADMIN_PATH.'seller_accounts/get_products' ?>",
    data : {product_status:status,seller_id:seller_id},
    type : "POST",
    success:function(res){
      console.log(res);
      $('#replace_with_response').html(res);
    }
  })

}


  </script>
</body>

</html>