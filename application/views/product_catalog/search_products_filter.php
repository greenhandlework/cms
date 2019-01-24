 <div class="post-list" id="postList">
              <div class="card-datatable table-responsive">
             <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
               
                <th>Product</th> 
                <th>Product&nbsp;Id</th>            
                <th>Email&nbsp;ID</th>
                <th>Mobile&nbsp;No.</th>
                <th>Status</th>
                <th>View</th>
            </tr>
        </thead>
         <tbody id="tc">
                <?php $i=1;
                if(isset($products) && !empty($products)){
                  foreach ($products as $key => $value) { 
                     $prod_id = str_replace('GHPRODID_', "", $value['prod_id']); 
                   ?>
                  <tr >                   
                    <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?></span></div>

                    <div class="media align-items-center"><div class="ui-w-40 d-block"></div>
                      <span class="media-body d-block text-dark ml-3"><?php echo $value['section_name']; ?>&nbsp;,&nbsp;<?php echo $value['cat_name']; ?></span></div>                     
                    
                    
                    </td>
                     <td><?php echo $prod_id;  ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['mobile_number'] ?></td>
                     <td><?php if($value['product_status']==0){ ?>
                               <label class="btn-xs btn-secondary" style="color: white">Pending</label> 
                              <?php }elseif($value['product_status']==1){ ?>
                                <label class="btn-xs btn-info">Approve</label>   
                              <?php }elseif($value['product_status']==2){ ?>
                                <label class="btn-xs btn-success">Live</label> 
                              <?php }elseif($value['product_status']==4){ ?>
                                <label class="btn-xs btn-danger">Offline</label> 
                              <?php } ?>
                    </td>                   
                    <td><a class="btn btn-xs btn-primary" href="<?= ADMIN_PATH.'product_catalog/product_detail/' ?><?php echo $value['prod_id'].'/'; ?><?php echo $value['seller_id']; ?>" >View</a></td>
                  </tr>    
                <?php } } ?>              
             
              </tbody>
      
    </table>
  </div>
   <?php echo $this->ajax_pagination->create_links(); ?>
  </div>

   <input type="hidden" name="date1" id="date1" value="<?php if(isset($date)){ echo $date;} ?>">
<input type="hidden" name="product_status1" id="product_status1" value="<?php if(isset($product_status)){ echo $product_status;} ?>">
<input type="hidden" name="search1" id="search1" value="<?php if(isset($search)){ echo $search;} ?>">

  <script type="text/javascript">
    function searchFilter1(page_num) {
 //alert(page_num);
     page_num = page_num?page_num:0;
     var p = page_num;
        var date = $('#date1').val();
        var product_status = $('#product_status1').val();
        var search = $('#search1').val();
       
        $.ajax({
            type: 'POST',
            url: '<?=ADMIN_PATH.'product_catalog/ajaxPaginationData_filter/'?>'+page_num,
            data:{page:p,date:date,product_status:product_status,search:search},
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