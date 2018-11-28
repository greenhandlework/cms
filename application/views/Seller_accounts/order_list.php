
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
        <?php $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
         <div class="container-fluid flex-grow-1 container-p-y">

            <div class="media align-items-center py-3 mb-3">
            
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-0">Order List                  
                </h4>
               
              </div>
            </div>

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="<?= ADMIN_PATH.'welcome/get' ?>" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">
                  <label class="form-label pb-1">Sales
                    <span id="product-sales-slider-value" class="text-muted font-weight-normal ml-2">10 - 834</span>
                  </label>
                  <div id="product-sales-slider" class="product-list-slider my-3 mx-2 noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(1, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="10"><div class="noUi-tooltip">10</div></div></div><div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="834"><div class="noUi-tooltip">834</div></div></div></div></div>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select">
                    <option>Order</option>
                    <option>Production</option>
                    <option>Packed</option>
                    <option>Dispatched</option>
                    <option>Delivered</option>
                    <option>Cancel</option>
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

            <div class="card">
              <div class="card-datatable table-responsive">
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
            <tr>
                <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php //echo $value['prod_name'] ?></span></div></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="<?= ADMIN_PATH.'seller_accounts/order_detail_page'?> " class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip" title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a></td>

            </tr>                  
             
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
          url  : "<?= ADMIN_PATH.'welcome/get' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);

            var json = JSON.parse(resp);
            var content = '';
            for(var i=0; i<json.length;i++){
              content +='<tr>';
              content +='<td>'+  i+1 +'</td>';
              content +='<td>'+ json[i].payment_date+'</td>';
              content +='<td>'+ json[i].email+'</td>';
              content +='<td>'+ json[i].product_id+'</td>';
              content +='<td>'+ json[i].payment_Amount+'</td>';
              content +='<td>'+ json[i].ordered_date+'</td>';
              content +='<td><a href="javascript:void(0)" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip" title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a></td>';
              content +='</tr>';
            }


            $('#tc').html(content);
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
