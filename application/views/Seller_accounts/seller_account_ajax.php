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
