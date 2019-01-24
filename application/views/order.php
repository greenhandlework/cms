
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

            <!-- <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
              <div>Order Details</div>
              <button type="button" class="btn btn-primary btn-round d-block">
                <span class="ion ion-md-add"></span>&nbsp; Add product</button>
            </h4> -->

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">
                  <label class="form-label">Date
                  
                  </label>
               <input type="text" id="b-m-dtp-date" class="form-control" name="order_date" placeholder="Date" data-dtp="dtp_u0u3J" >
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select" name="order_status">
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
                  <!-- <label class="form-label d-none d-md-block">&nbsp;</label> -->
                  <!-- <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                  <a href=""><i class="fas fa-undo-alt d-block"></i></a> -->
                </div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->

            <div class="card">
              <div class="sk-cube-grid sk-primary" id="loding" style="display: none;">
                      <div class="sk-cube sk-cube1"></div>
                      <div class="sk-cube sk-cube2"></div>
                      <div class="sk-cube sk-cube3"></div>
                      <div class="sk-cube sk-cube4"></div>
                      <div class="sk-cube sk-cube5"></div>
                      <div class="sk-cube sk-cube6"></div>
                      <div class="sk-cube sk-cube7"></div>
                      <div class="sk-cube sk-cube8"></div>
                      <div class="sk-cube sk-cube9"></div>
              </div>
              <div class="card-datatable table-responsive" id="cng_tbl">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product</th>
                  <th>Order&nbsp;Id</th>
                 <!--  <th>Order&nbsp;Date</th>
                  <th>Shipping&nbsp;Date</th> -->
                  <th>Email</th>
                  <th>Mobile&nbsp;No.</th>
                  <th>Status</th>
                  <th>View</th>
            </tr>
        </thead>
         <tbody id="tc">
                <?php $i=1;
                  foreach ($cart_data as $key => $value) { 
                    // $image = ADMIN_PATH.'' 
                   ?>
                   <tr >
                   <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?><br>&nbsp;(<?php 
                    $datetime = new DateTime($value['ordered_date']);
                    $date = $datetime->format('d-m-Y');     
                    echo $date; ?>) </span></div></td>

                    <td><?php echo str_replace('GHTRID_','',$value['Order_id']); ?></td>
                   <!--  <td><?php echo $value['ordered_date']; ?></td> -->
                    <!-- <td></td> -->
                    <td><?php if($value['email']!=0 || !empty($value['email']) ){ echo $value['email']; } ?></td>
                    <td><?php if($value['mobile_number']!=0 || !empty($value['mobile_number'])) { echo $value['mobile_number'];} ?></td>
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

                      </td>
                    <td><a href="<?= ADMIN_PATH.'order_details/order_detail/'?><?php echo $value['Order_id'] ?>/<?php echo $value['cart_product_id']?>" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a></td>
                  </tr>    
                <?php }  ?>              
             
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
        $("#loding").css("display", "");
        $("#cng_tbl").css("display", "none");
        $.ajax({
          url  : "<?= ADMIN_PATH.'order_details/get' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
            $("#loding").css("display", "none");
            $("#cng_tbl").css("display", "");
             $('#cng_tbl').html(resp);
           
          }
        })
      });

      
    })
   

      $(document).ready(function() {
    $('#example').DataTable();
} );

function clr(){
  document.getElementById("search_form").reset();
}

  </script>
</body>

</html>
