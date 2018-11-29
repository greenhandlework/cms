
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Enquiry</title>
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

                 <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">
                  <label class="form-label pb-1">Sales
                    <span id="product-sales-slider-value" class="text-muted font-weight-normal ml-2">10 - 834</span>
                  </label>
                  <input type="text" id="b-m-dtp-date" class="form-control" name="enquiry_date" placeholder="Date" data-dtp="dtp_u0u3J" >
                </div>
                <div class="col-md mb-4">
                 <!--  <label class="form-label">Status</label>
                  <select class="custom-select" name="seller_status">
                    <option value="seller">Seller</option>
                    <option value="registered_seller">Registered&nbsp;Seller</option>
                    <option value="vendor">Vendor</option>
                    <option value="offline_seller">Offline&nbsp;Seller</option>
                  </select> -->
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
                </div> 
                  <div class="col-md col-xl-2 mb-4">
                  <label class="form-label d-none d-md-block">&nbsp;</label>
                  <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                </div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->
             <div class="card">
              <div class="card-datatable table-responsive" id="cng_tbl">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile&nbsp;No.</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Response</th>
                              <th>Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                     <tbody id="tc">
                       <?php $i=1;
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
                       <?php } ?>                
                         
                      </tbody>
                  
                </table>
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
              $('#search_btn').click(function(){
        
              $.ajax({
                url  : "<?= ADMIN_PATH.'enquiry/get' ?>",
                data : $('#search_form').serialize(),
                type : "POST",

                success:function(resp){
                  console.log(resp);
                   $('#cng_tbl').html(resp);
                 
                }
              })
            });



    $('#example').DataTable();

} );
  </script>

</body>

</html>