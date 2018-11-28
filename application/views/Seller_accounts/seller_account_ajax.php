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
                                  <td><a href="<?php echo $bulk_id_pro; ?>" class="badge badge-success" title="" data-original-title="View"><i class="fab fa-readme d-block"></i></a>&nbsp;|&nbsp;<a href="#" onclick="delete_seller1('<?= ADMIN_PATH.'seller_accounts/delete_seller/' ?><?php echo $value['user_id'] ?>')" class="badge badge-danger" ><i class="fas fa-minus-circle d-block"></i></a>

                              </td>
                                </tr>
                          <?php   } ?>
                             
                          </tbody>
                      
                    </table>
  </div>
  <script type="text/javascript">
     $(document).ready(function() {
    $('#seller_1').DataTable();
} );
  </script>