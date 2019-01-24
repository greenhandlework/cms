 <div class="post-list" id="postList">  
   <div class="card-datatable table-responsive" id="cng_tbl">
             <table id="example1" class="table table-striped table-bordered" style="width:100%">
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
                if(isset($cart_data) && !empty($cart_data)){
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
                <?php } }  ?>              
             
              </tbody>
      
    </table></div>
    <?php echo $this->ajax_pagination->create_links(); ?>
  </div>

  <!-- <script type="text/javascript">
    function searchFilter1(page_num) {

     page_num = page_num?page_num:0;
        // var keywords = $('#keywords').val();
        // var sortBy = $('#sortBy').val();
       
        $.ajax({
            type: 'POST',
            url: '<?=ADMIN_PATH.'order_details/ajaxPaginationData_filter/'?>'+page_num,
            data:'page='+page_num,
            // beforeSend: function () {
            //     $('.loading').show();
            // },
            success: function (html) {
              console.log(html);
                $('#postList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
}
  </script> -->