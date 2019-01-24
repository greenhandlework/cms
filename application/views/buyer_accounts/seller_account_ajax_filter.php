 <div class="post-list" id="postList">
<div class="card-datatable table-responsive" id="cng_ajax">
            <table id="seller_1" class="table table-hover table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th >Business&nbsp;Name</th>
                                <th>Seller&nbsp;Name</th>
                                <th>Seller&nbsp;Id</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                               
                             </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                            foreach ($seller as $value) { 
                             
                                $bulk_id_pro = base_url().'seller_accounts/account_detail/'.$value['user_id'];

                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['org_name'] ?></td>
                                  <td><?php echo $value['name'] ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td><a href="<?php echo $bulk_id_pro; ?>" class="btn btn-xs btn-outline-success" >View</a>&nbsp;|&nbsp;<a href="<?= ADMIN_PATH.'seller_accounts/delete_seller/' ?><?php echo $value['user_id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-xs btn-outline-danger" ><i class="ion ion-ios-close d-block"></i></a>

                                  </td>
                                </tr>
                          <?php   } ?>
                             
                          </tbody>
                      
                    </table>
  </div>
  <?php echo $this->ajax_pagination->create_links(); ?>
  </div>
  <input type="hidden" name="activation_date1" id="activation_date1" value="<?php if(isset($activation_date)){ echo $activation_date;} ?>">
<input type="hidden" name="seller_status1" id="seller_status1" value="<?php if(isset($seller_status)){ echo $seller_status;} ?>">
<input type="hidden" name="search_seller1" id="search_seller1" value="<?php if(isset($search_seller)){ echo $search_seller;} ?>">

  <script type="text/javascript">
    function searchFilter1(page_num) {
// alert(page_num);
     page_num = page_num?page_num:0;
     var p = page_num;
        var activation_date = $('#activation_date1').val();
        var seller_status = $('#seller_status1').val();
        var search_seller = $('#search_seller1').val();
       
        $.ajax({
            type: 'POST',
            url: '<?=ADMIN_PATH.'seller_accounts/ajaxPaginationData_filter/'?>'+page_num,
            data:{page:p,activation_date:activation_date,seller_status:seller_status,search_seller:search_seller},
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
  </script>