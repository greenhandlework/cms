<div class="card-datatable table-responsive" id="cng_tbl">
                     <table id="example" class="table table-striped table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th >Business Name</th>
                                <th>Classification</th>
                                <th>Primary product</th>
                                <th>Making  process</th>  
                                <th>Location</th>
                                <th>Email Id</th>
                                <th>Mobile number</th>
                                <th>Type of seller</th>
                                <th>Action</th>
                               
                             </tr>
                        </thead>
                         <tbody id="tc">
                             <?php $i=1; foreach ($seller as $key => $value) { 
                                         // echo '<pre>'; print_r($bulk_id);
                                          $id = $value['id'];
                                          ?>
                                          <tr id="<?php echo $id; ?>">
                                            <td><?php echo $i++; ?></td> 
                                            <td> <?php echo $value['business_name'] ?></td>
                                             <td><?php echo $value['Classification']; ?></td>
                                              <td><?php echo $value['Primary_Product']; ?></td>
                                                <td><?php echo $value['Making_Process']; ?></td>
                                            <td><?php echo $value['city']; ?></td>
                                            <td><?php echo $value['email_id']; ?></td>
                                            <td><?php echo $value['mobile_number']; ?></td>
                                             <td><?php   
                                                  $seller_id  = $value['user_id'];
                                                  $data = $this->db->query("SELECT id from products where seller_id=".$seller_id." and product_status=2 ");
                                                  $cnt = $data->num_rows();
                                                 // echo $cnt;
                                              if($value['role_id']=5 && $value['account_status']=='Yes' && $cnt>0){
                                                echo "Vender";
                                              } elseif($value['role_id']=5 && $value['account_status']=='No'){
                                                echo 'Seller';
                                              }elseif($value['role_id']=5 && $value['account_status']=='Yes'){
                                                echo "Registered seller";  
                                              }elseif($value['role_id']=5 && $value['account_status']=='Offline'){
                                                echo "Offline";
                                              }  


                                              ?></td>
                                            <td>
                                               <!-- <button class="btn-sm btn-primary add_more_button" style="background-color: #5DADE2"> <i class="fas fa-plus d-block"></i></button>  -->
                                              <a href="javascript:(0)" class="btn-sm btn-primary" style="background-color: #5DADE2" onclick="todo(<?php echo $id; ?>)"><b>+</b></a>
                                            </td>
                                          </tr>
                                        <?php } ?>
                             
                          </tbody>
                      
                    </table>
                   </div>

<script type="text/javascript">
   $(document).ready(function() {
        $('#example').DataTable();
      });
</script>