     <div class="card-datatable table-responsive" id="cng_ajax">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product&nbsp;Name</th>
                  <th>Product&nbsp;Id</th>
                  <!-- <th>Image</th> -->
                  <th>Status</th>
                  <th>View</th>
            </tr>
        </thead>
         <tbody id="tc">
              <?php  foreach ($prod as $key => $value) { ?>
                 <tr>
                  <td class="py-2 align-middle" style="min-width: 300px;"><div class="media align-items-center"><img class="ui-w-40 d-block" src="<?= ADMIN_IMAGE_PATH.'uikit/ps4.jpg'?>" alt=""><span class="media-body d-block text-dark ml-3"><?php echo $value['prod_name'] ?></span></div></td>
                  <td><?php echo $value['prod_id'] ?></td>
                  <td><?php if($value['product_status']==0){ ?>
                      <label class="btn btn-xs btn-warning">Pending</label>
                     <?php }elseif($value['product_status']==1){ ?>
                      <label class="btn btn-xs btn-primary">Approve</label>
                     <?php }elseif ($value['product_status']==2) { ?>
                       <label class="btn btn-xs btn-success">Live</label>
                     <?php }elseif ($value['product_status']==4) { ?>
                       <label class="btn btn-xs btn-danger">Offline</label>
                     <?php } ?>


                  </td>
                  
                  <td></td>

              </tr>     
            <?php } ?>    
          </tbody>
      
    </table></div>

    <script type="text/javascript">
      
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>