     <div class="post-list" id="postList">
    <div class="card-datatable table-responsive" id="cng_ajax">
            <table id="seller_11" class="table table-hover table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th>Buyer&nbsp;ID</th>
                                <th>Buyer&nbsp;Name</th>
                                <th>Mobile&nbsp;Number</th>
                                <th>Email&nbsp; Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                          if(isset($buyer) && !empty($buyer)){
                            foreach ($buyer as $value) { 
                             
                                $name = $value['first_name'].' '.$value['last_name'];
                                $url = ADMIN_PATH.'buyer_accounts/get_detail/'.$value['user_id'];

                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $name; ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td><a href="<?php echo $url; ?>" class="btn btn-xs btn-outline-success" >View</a>&nbsp;|&nbsp;<a href="<?= ADMIN_PATH.'buyer_accounts/delete_buyer/' ?><?php echo $value['user_id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-xs btn-outline-danger" ><i class="ion ion-ios-close d-block"></i></a>

                              </td>
                                </tr>
                          <?php   } } ?>
                             
                          </tbody>
                      
                    </table>
  </div>
   <?php echo $this->ajax_pagination->create_links(); ?>
 </div>

 <input type="hidden" name="activation_date1" id="activation_date1" value="<?php if(isset($activation_date)){ echo $activation_date;} ?>">
<input type="hidden" name="search_buyer1" id="search_buyer1" value="<?php if(isset($search_buyer)){ echo $search_buyer;} ?>">

  <script type="text/javascript">
    function searchFilter1(page_num) {
 //alert(page_num);
     page_num = page_num?page_num:0;
     var p = page_num;
        var activation_date = $('#activation_date1').val();
        var search_buyer = $('#search_buyer1').val();
      //  var search_seller = $('#search_seller1').val();
       
        $.ajax({
            type: 'POST',
            url: '<?=ADMIN_PATH.'buyer_accounts/ajaxPaginationData_filter/'?>'+page_num,
            data:{page:p,activation_date:activation_date,search_buyer:search_buyer},
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

  