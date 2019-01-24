
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Bids</title>
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
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="http://52.66.99.138/cms/welcome/get" method="post" id="search_form">
              <div class="form-row">
                 <div class="col-md mb-2"></div>
                <div class="col-md mb-4">
                  <label class="form-label pb-1">Date</label>
                <input type="text" id="b-m-dtp-date" class="form-control" placeholder="Date" name="bid_date" data-dtp="dtp_bI5KZ">
                </div>
              <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
              </div> 
              <div class="col-md col-xl-2 mb-4">
                  <label class="form-label d-none d-md-block">&nbsp;</label>
                  <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
              </div>
              <div class="col-md mb-2"></div>
              </div>
           
            
           </form>    
            </div>
             <div class="card">
              <div class="card-datatable table-responsive">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                            <th>Bid&nbsp;ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Response</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody id="tc">  
                      <?php $i=1;
                        foreach ($bids as $key => $value) {
                            $datetime = new DateTime($value['date']);
                            $date = $datetime->format('d-m-Y');
                            $qry = "SELECT count(*) as cnt from bid_sellers where bid_id='".$value['bid_id']."'";
                              $cnt = $this->db->query($qry)->result_array();
                         ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value['bid_id']; ?></td>
                            <td><?php echo $value['product_name']; ?></td>
                            <td><?php echo $value['quantity']; ?></td>
                            <td><?php  echo $date; ?></td>
                            <td><span class="badge badge-outline-success"><?php print_r($cnt[0]['cnt']) ?></span></td>
                            <td>
                              <a href="<?= ADMIN_PATH.'bids/get_bid_detail' ?>/<?php echo $value['bid_id']; ?>" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a>
                            </td>
                          </tr>
                      <?php  }  ?>

                      
                                
                         
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
    $('#example').DataTable();

} );
  </script>

</body>

</html>