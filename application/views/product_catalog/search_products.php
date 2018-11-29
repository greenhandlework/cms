<div class="card">
              <div class="card-datatable table-responsive">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Section</th>
                <th>Category</th>
                <th>Product&nbsp;ID</th>
                <th>Email&nbsp;ID</th>
                <th>Mobile&nbsp;No.</th>
                  <th>View</th>
            </tr>
        </thead>
         <tbody id="tc">
                <?php $i=1;
                  foreach ($products as $key => $value) { 
                    // $image = ADMIN_PATH.'' 
                   ?>
                  <tr >
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value['prod_name'] ?></td>
                    <td><?php echo $value['section_name'] ?></td>
                    <td><?php echo $value['cat_name'] ?></td>
                    <td><?php echo $value['prod_id'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['mobile_number'] ?></td>                   
                    <td><a class="btn btn-xs btn-primary" href="javascript:(0)" onclick="">View</a></td>
                  </tr>    
                <?php }  ?>              
             
              </tbody>
      
    </table>
  </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>