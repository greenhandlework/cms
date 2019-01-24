
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Order page</title>
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
        <?php $data['page']=$page; $this->load->view('hfs/header',$data) ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
         <div class="container-fluid flex-grow-1 container-p-y">

         
          <!--   <div class="media align-items-center py-3 mb-3">
            
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-0">Product List                  
                </h4>
               
              </div>
            </div> -->

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="" method="post" id='search_form'>
                <input type="hidden" name="seller_id"  value="<?php echo $seller_id ?>">
              <div class="form-row">
                <div class="col-md mb-4">
                 <!--  <label class="form-label pb-1">Sales
                    <span id="product-sales-slider-value" class="text-muted font-weight-normal ml-2">10 - 834</span>
                  </label>
                  <div id="product-sales-slider" class="product-list-slider my-3 mx-2 noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(1, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="10"><div class="noUi-tooltip">10</div></div></div><div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="834"><div class="noUi-tooltip">834</div></div></div></div></div> -->
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select" name="prod_status">
                    <option value="2">Live</option>
                    <option value="0">Pending</option>
                    <option value="1">Approve</option>
                    <option value="4">Offline</option>
                  </select>
                </div>
                <!-- <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
                </div>  -->
                  <div class="col-md  mb-4">
                  <label class="form-label d-none d-md-block">&nbsp;</label>
                  <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                </div>
                <div class="col-md  mb-4"></div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->

            <div class="card">
              <div class="card-datatable table-responsive" id="cng_ajax">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product&nbsp;Name</th>
                  <th>Product&nbsp;Id</th>
                  <!-- <th>Image</th> -->
                  <th>Status</th>
                  <!-- <th>View</th> -->
            </tr>
        </thead>
         <tbody id="tc">
              <?php  foreach ($prod as $key => $value) { ?>
                 <tr>
                  <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?></span></div></td>
                  <td><?php echo $value['prod_id'] ?></td>
                  <td><?php if($value['product_status']==0){ ?>
                      <label class=" btn-xs btn-warning">Pending</label>
                     <?php }elseif($value['product_status']==1){ ?>
                      <label class=" btn-xs btn-primary">Approve</label>
                     <?php }elseif ($value['product_status']==2) { ?>
                       <label class=" btn-xs btn-success">Live</label>
                     <?php }elseif ($value['product_status']==4) { ?>
                       <label class=" btn-xs btn-danger">Offline</label>
                     <?php } ?>


                  </td>
                  
                  <!-- <td></td> -->

              </tr>     
            <?php } ?>    
          </tbody>
      
    </table></div>
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
          url  : "<?= ADMIN_PATH.'seller_accounts/product_list_ajax' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
            $('#cng_ajax').html(resp);
          }
        })
      });

      
    })
    // function get(id) {
    //     var cart_product_id = id;
        
    //     $.ajax({
    //       url  :"<?= ADMIN_PATH."index.php/welcome/order_detail"?>",
    //       data : {cart_product_id:cart_product_id},
    //       type :"POST",

    //       success:function(resp){
    //         console.log()
    //       }

    //     })
    //   }

      $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
</body>

</html>
