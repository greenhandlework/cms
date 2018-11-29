<div class="row" id="replace_with_response">
                      <div class="card-datatable table-responsive">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                              <th>Product&nbsp;Name</th>
                              <th>Product&nbsp;ID</th>
                              <th>Image</th>
                              <th>Status</th>
                        </tr>
                    </thead>
                     <tbody id="tc">
                          <?php $i=1;
                              foreach ($product_detail as $key => $value) { ?>
                                <tr>
                                  <td><?php echo $i++ ?></td>
                                  <td><?php echo $value['prod_name'] ?></td>
                                  <td><?php echo $value['prod_id'] ?></td>
                                 <td> <img src="http://52.66.99.138/upload/seller_documents/<?php if(isset($value['prod_image1'])){ echo $value['prod_image1']; } ?>" style="height: 100px;padding-left: 25px;"> </td>
                                  <td><?php if($value['product_status']==0){ ?>
                                    <label class="btn-xs btn-warning">Pending</label>
                                  <?php }elseif($value['product_status']==1){ ?>
                                     <label class="btn-xs btn-info">Approve</label>    
                                  <?php }elseif ($value['product_status']==2){ ?>
                                    <label class="btn-xs btn-success">Live</label>               
                                  <?php }elseif ($value['product_status']==4){ ?>
                                      <label class="btn-xs btn-danger">Offline</label>
                                  <?php } ?>

                                    

                                  </td>
                                </tr>
                          <?php } ?>     
                         
                      </tbody>
                  
                </table>
              </div>
                    </div>

 <script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable();
   });
</script>