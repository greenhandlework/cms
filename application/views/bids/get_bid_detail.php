
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
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Color :</label>
                    <div class="col-sm-8">
                       <label class="col-form-label col-form-label-sm ">Red</label>
                      <!-- <input type="text" class="form-control form-control-sm" placeholder="Small input"> -->
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Handle Color</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" placeholder="Small input" value="Blue">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-3 text-sm-right">Size</label>
                    <div class="col-sm-8">
                      <input type="text" readonly="" class="form-control form-control-sm" placeholder="Small input" value="10*10">
                    </div>
                  </div>

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
                                          <a href="<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>" class="d-block border-primary ">
                                            <img src="<?= ADMIN_PATH.'upload/seller_document/demo_image.jpg' ?>" class="img-fluid." alt="" height='50px' width='50px'>
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
                       <label class="col-form-label col-form-label-sm ">10</label>
                      <!-- <input type="text" class="form-control form-control-sm" placeholder="Small input"> -->
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Average&nbsp; Price</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" placeholder="Small input" value="15">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Lowest&nbsp;Price</label>
                    <div class="col-sm-8">
                      <input type="text" readonly="" class="form-control form-control-sm" placeholder="Small input" value="10">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Average&nbsp;Duration</label>
                    <div class="col-sm-8">
                      <input type="text" readonly="" class="form-control form-control-sm" placeholder="Small input" value="10 Days">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Lowest&nbsp;Duration</label>
                    <div class="col-sm-8">
                      <input type="text" readonly="" class="form-control form-control-sm" placeholder="Small input" value="5 Days">
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
                      <td>1</td>
                      <td>Prasanna PaTil.</td>
                      <td>15</td>
                      <td>5 Days</td>
                      <td>14-11-2018</td>
                      <td>
                        <a class="btn btn-xs btn-success" href="javascript:(0)" onclick="alert('Order Placed')">Place Order</a>
                        <!-- <a href="#" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a> -->
                      </td>
                      <!--  <?php $i=1;
                            foreach ($enq as $key => $value) { 
                              $data = $this->db->query("SELECT count(bulk_id) as cnt from bulk_order_seller where price!='' and bulk_id=".$value['bulk_id']." ")->result_array();

                                $bulk_id_pro = base_url().'enquiry/bulk_order_detail/'.$value['bulk_id'];
                               $datetime = new DateTime($value['date']);
                               $date = $datetime->format('Y-m-d');
                             ?>
                         <tr>
                           <td><?php echo $i++; ?></td>
                           <td><?php echo $value['name'] ?></td>
                           <td><?php echo $value['email'] ?></td>
                           <td><?php echo $value['mobile'] ?></td>
                           <td><?php echo $value['product'] ?></td>
                           <td><?php echo $value['quantity'] ?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="<?php echo $bulk_id_pro; ?> "> <?php if(!empty($data[0]['cnt']) && $data[0]['cnt']!=0) { ?> <span class="badge badge-outline-success"><?php echo $data[0]['cnt'];?></span> <?php }else{} ?> </a></td> 
                            <td><a href="<?php echo $bulk_id_pro; ?>" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a>&nbsp;|&nbsp;<a href="#  " class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="fas fa-ban d-block" style="color: red;"></i></a>

                              </td>
                         </tr>
                       <?php } ?>   -->              
                         
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