
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Product Catalog</title>
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

            <!-- <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
              <div>Order Details</div>
              <button type="button" class="btn btn-primary btn-round d-block">
                <span class="ion ion-md-add"></span>&nbsp; Add product</button>
            </h4> -->

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="<?= ADMIN_PATH.'product_catalog/get_product' ?>" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">
                  <label class="form-label pb-1">Sales
                    <span id="product-sales-slider-value" class="text-muted font-weight-normal ml-2">10 - 834</span>
                  </label>
                  <div id="product-sales-slider" class="product-list-slider my-3 mx-2 noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(1, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="10"><div class="noUi-tooltip">10</div></div></div><div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="834"><div class="noUi-tooltip">834</div></div></div></div></div>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select" name="product_status">
                    <option value="0">Pending</option>
                    <option value="1">Approve</option>
                    <option value="2">Live</option>
                    <option value="4">Offline</option>
                  </select>
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
            <div id="cng">
            <div class="card">
              <div class="card-datatable table-responsive">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Section</th>
                <th>Category</th>
                <th>Product&nbsp;ID</th>
                <th>Email&nbsp;ID</th>
                <th>Mobile&nbsp;No.</th>
                  <th>View</th>
            </tr>
        </thead>
         <tbody id="tc">
                <?php $i=1;
                  foreach ($products as $key => $value) { 
                    // $image = ADMIN_PATH.'' 
                   ?>
                  <tr >
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['prod_name'] ?></td>
                    <td><?php echo $value['section_name'] ?></td>
                    <td><?php echo $value['cat_name'] ?></td>
                    <td><?php echo $value['prod_id'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['mobile_number'] ?></td>                   
                    <td><a class="btn btn-xs btn-primary" href="<?= ADMIN_PATH.'product_catalog/product_detail/' ?><?php echo $value['prod_id'].'/'; ?><?php echo $value['seller_id']; ?>" >View</a></td>
                  </tr>    
                <?php }  ?>              
             
              </tbody>
      
    </table>
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
    $(document).ready(function(){
      $('#search_btn').click(function(){
        
        $.ajax({
          url  : "<?= ADMIN_PATH.'product_catalog/get_product' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
          
            $('#cng').html(resp);
          }
        })
      });

      
    })

    function get_product_detail(id) {
        var prod_id = $(id).attr('id');
        var seller_id = $(id).attr('lang');
       
        
        $.ajax({
          url  :"<?= ADMIN_PATH."product_catalog/product_detail"?>",
          data : {prod_id:prod_id,seller_id:seller_id},
          type :"POST",

          success:function(resp){
            console.log(resp)
          }

        })
      }

      $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
</body>

</html>
