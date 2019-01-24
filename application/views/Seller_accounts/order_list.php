
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
                <h4 class="font-weight-bold mb-0">Order List                  
                </h4>
               
              </div>
            </div> -->

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="#" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">
                  <label class="form-label pb-1">Order Date</label>
                  <input type="text" id="b-m-dtp-date" name="order_date" class="form-control" placeholder="Date" data-dtp="dtp_x0bm2">
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select" name="order_status">
                    <option value="">All</option>
                    <option value="Order">Order</option>
                    <option value="Production">Production</option>
                    <option value="Packed">Packed</option>
                    <option value="Dispatched">Dispatched</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancel">Cancel</option>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
                  <input type="hidden" name="seller_id" value="<?php if(isset($seller_order[0]['seller_id'])){ echo $seller_order[0]['seller_id'];}  ?>">
                </div> 
                  <div class="col-md col-xl-2 mb-4">
                    <div class="form-row">
                    <div class="col-md md-8">
                      <label class="form-label d-none d-md-block">&nbsp;</label>
                     <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                    </div>
                    <div class="col-md md-4">
                      <label class="form-label d-none d-md-block">&nbsp;</label>
                       <a href="javascript:void(0)" onclick="clr()" class="btn btn-secondary "><i class="ion ion-md-refresh d-block" style="margin: 4px"></i></a>
                    </div>
                  </div>
                </div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->

            <div class="card">
              <div class="card-datatable table-responsive" id="cng_tbl">
             <table id="example" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>Product&nbsp; </th>
                <!-- <th>Product&nbsp;Id<label class="col-form-label col-form-label-sm  text-sm-right">(GHPRODID_)</label></th>
                <th>Order&nbsp;Id<label class="col-form-label col-form-label-sm  text-sm-right">(GHTRID_)</label></th> -->
                <th>Order&nbsp;Date</th>
                <th>Shipping&nbsp;Date</th>                
                <th>Status</th>
                <!-- <th>View</th> -->
            </tr>
        </thead>
         <tbody id="tc">
            <?php 
              foreach ($seller_order as $key => $value) { 
                $product_id = $value['product_id'];//str_replace('GHPRODID_','' , $value['product_id']);
                $order_id   =  $value['Order_id'];//str_replace('GHTRID_','', $value['Order_id']);
                $date = new DateTime($value['ordered_date']);
                ?>
              <tr>
                <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?></span></div>
                   <span class="media-body  text-dark ml-3" style="padding-left:39px"><label style="font-weight:bold;">Product&nbsp;Id&nbsp;:&nbsp;</label><?php echo $product_id; ?></span><br>
                   <span class="media-body  text-dark ml-3" style="padding-left:39px;"><label style="font-weight:bold;">Order&nbsp;Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</label><?php echo $order_id; ?></span>
                  
                </td>
                <!-- <td>a</td>
                <td><?php echo$order_id; ?></td> -->
                <td><?php echo  $date->format('d-m-Y');  ?></td>
                <td><?php echo 'comming soon.' ?></td>
                 <td><?php if($value['order_status']=='Order'){ ?>
                        <span class="badge badge-outline-success"><?php echo $value['order_status']; ?></span>
                       <?php }elseif($value['order_status']=='Production'){ ?>
                        <span class="badge badge-outline-secondary"><?php echo $value['order_status']; ?></span>
                       <?php }elseif($value['order_status']=='Packed'){ ?>
                        <span class="badge badge-outline-primary"><?php echo $value['order_status']; ?></span>
                       <?php }elseif($value['order_status']=='Dispatched'){ ?>
                        <span class="badge badge-outline-warning"><?php echo $value['order_status']; ?></span>
                       <?php }elseif($value['order_status']=='Delivered'){ ?>
                        <span class="badge badge-outline-dark"><?php echo $value['order_status']; ?></span>
                       <?php }elseif($value['order_status']=='Cancel'){ ?>
                        <span class="badge badge-outline-danger"><?php echo $value['order_status']; ?></span>
                       <?php }  ?>

                     <!--  <span class="badge badge-outline-success"><?php echo $value['order_status']; ?></span> -->
                     &nbsp;|&nbsp;
                     <a href="<?= ADMIN_PATH.'seller_accounts/order_detail_page/'?><?php echo $value['Order_id'] ?>/<?php echo $value['cart_product_id']?> " class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip" title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a>
                      </td>
                <!-- <td>    </td> -->

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
          url  : "<?= ADMIN_PATH.'seller_accounts/order_list_ajax' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
            $('#cng_tbl').html(resp);
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
        // $('#example').dataTable({bFilter: false, bInfo: false});
    $('#example').DataTable({

       "columns": [
    { "width": "30%" },
    null,
    null,
    { "width": "15%" },
     
    
  ]
    });
} );

      function clr(){
  document.getElementById("search_form").reset();
}
  </script>
</body>

</html>
