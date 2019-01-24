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
                  foreach ($products as $key => $value) { 
                     $prod_id = str_replace('GHPRODID_', "", $value['prod_id']); 
                   ?>
                  <tr >                   
                    <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?></span></div>

                    <div class="media align-items-center"><div class="ui-w-40 d-block"></div>
                      <span class="media-body d-block text-dark ml-3"><?php echo $value['section_name']; ?>&nbsp;,&nbsp;<?php echo $value['cat_name']; ?></span></div>


                     
                     <!-- <span class="media-body  text-dark ml-3" style="padding-left:39px"><label style="font-weight:bold;">Section&nbsp;:&nbsp;</label><?php echo $value['section_name']; ?></span><br>
                     <span class="media-body  text-dark ml-3" style="padding-left:39px;"><label style="font-weight:bold;">Category&nbsp;:&nbsp;</label><?php echo $value['cat_name']; ?></span><br>
                      <span class="media-body  text-dark ml-3" style="padding-left:39px;"><label style="font-weight:bold;">Product&nbsp;Id&nbsp;:&nbsp;</label><?php echo $value['prod_id']; ?></span> -->
                    
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
                <?php }  ?>              
             
              </tbody>
      
    </table>
  </div>
   <?php echo $this->ajax_pagination->create_links(); ?>
  </div>

  