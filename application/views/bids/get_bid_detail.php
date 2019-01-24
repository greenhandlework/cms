
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Bid-Details</title>
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
            <div class="row">
              <div class="col-md-6">
               <div class="card mb-4">
             <button type="button" data-toggle="collapse" data-target="#edit_frm" class="list-group-item list-group-item-action active collapsed" aria-expanded="false"><b>PRODUCT&nbsp;/&nbsp;DETAILS</b></button>
              <div id="edit_frm" class="collapse show" style="">
              <div class="card-body">
                <form>
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Product Name :</label>
                    <div class="col-sm-8">
                       <label class="col-form-label col-form-label-sm "><?php echo  $get_bid[0]['product_name']; ?></label>
                      <!-- <input type="text" class="form-control form-control-sm" placeholder="Small input"> -->
                    </div>
                 

                 
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Quantity :</label>
                    <div class="col-sm-8">
                     <label class="col-form-label col-form-label-sm "><?php echo  $get_bid[0]['quantity']; ?></label>
                    </div>
                  
                    <hr>
                      
                 <?php
                    foreach ($get_bid as $key => $value) { ?>
                          <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right"><?php echo $value['label'] ?>&nbsp;:</label>
                          <div class="col-sm-8">
                            <label class="col-form-label col-form-label-sm "><?php echo  $value['value']; ?></label>                         
                          </div>
                 <?php  }  ?>

                   </div> <!-- form-group row -->
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Product Image</label>
                    <div class="col-sm-8">
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
                                          <a href="<?= ADMIN_PATH.'upload/bids_image/' ?><?php echo $value['image'] ?>" class="d-block border-primary ">
                                            <img src="<?= ADMIN_PATH.'upload/bids_image/'?><?php echo $value['image'] ?>" class="img-fluid." alt="" height='100px' width='100px'>
                                          </a>
                                        </div>
                                      </div>  
                    </div>
                  </div>

                 

                </form>
              </div>
            </div>
            </div>
              </div>

              <div class="col-md-6">
               <div class="card mb-4">
             <button type="button" data-toggle="collapse" data-target="#bid_frm" class="list-group-item list-group-item-action active collapsed" aria-expanded="false"><b>BIDS&nbsp;/&nbsp;DETAILS</b></button>
              <div id="bid_frm" class="collapse show" style="">
              <div class="card-body">
                <form>
                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">No.&nbsp;Bids :</label>
                    <div class="col-sm-8">
                       <label class="col-form-label col-form-label-sm "><?php echo $get_bid1[0]['cnt']; ?></label>
                      <!-- <input type="text" class="form-control form-control-sm" placeholder="Small input"> -->
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Average&nbsp; Price</label>
                    <div class="col-sm-8">
                        <label class="col-form-label col-form-label-sm "><?php echo $get_bid1[0]['avg_price']; ?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Lowest&nbsp;Price</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm "><?php echo $get_bid1[0]['min_price']; ?></label>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Average&nbsp;Duration</label>
                    <div class="col-sm-8">
                     <label class="col-form-label col-form-label-sm "><?php echo $get_bid1[0]['avg_duration']; ?></label>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Lowest&nbsp;Duration</label>
                    <div class="col-sm-8">
                      <label class="col-form-label col-form-label-sm "><?php echo $get_bid1[0]['min_duration']; ?></label>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            </div>
              </div>
             
            </div> 
<hr>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
              <div class="card-datatable table-responsive">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Seller&nbsp;Name</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody id="tc">

                      <?php $i=1;
                        foreach ($seller_det as $key => $value) {
                             $datetime = new DateTime($value['date']);
                            $date = $datetime->format('d-m-Y');
                          ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['price']; ?></td>
                            <td><?php echo $value['delivery_days']; ?></td>
                            <td><?php echo $date; ?></td>
                            <td> <a class="btn btn-xs btn-success" href="javascript:(0)" onclick="alert('Order Placed')">Place Order</a></td>
                          </tr>
                      <?php  } ?>
                     
                           
                         
                      </tbody>
                  
                </table>
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
  <script type="text/javascript">
         $(document).ready(function() {
    $('#example').DataTable();
    });
  </script>
</body>

</html>