<div class="card-datatable table-responsive" id="cng_tbl">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product</th>
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
      
    </table>
  </div>

  <script type="text/javascript">
   $(document).ready(function() {
    $('#example').DataTable({
       "columns": [
    { "width": "30%" },
    null,
    null,
    { "width": "15%" },
     null,
    
  ]
    });
} );
  </script>
