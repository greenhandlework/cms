<div class="card-datatable table-responsive" id="cng_tbl">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile&nbsp;No.</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Response</th>
                              <th>Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                     <tbody id="tc">
                       <?php $i=1;
                            foreach ($enq as $key => $value) { 
                              $data = $this->db->query("SELECT count(bulk_id) as cnt from bulk_order_seller where price!='' and bulk_id=".$value['bulk_id']." ")->result_array();

                                $bulk_id_pro = base_url().'enquiry/bulk_order_detail/'.$value['bulk_id'];
                               $datetime = new DateTime($value['date']);
                               $date = $datetime->format('Y-m-d');
                             ?>
                         <tr>
                           <td><?php echo $i++; ?></td>
                           <td><?php echo $value['name'] ?></td>
                           <td><?php echo $value['email'] ?></td>
                           <td><?php echo $value['mobile'] ?></td>
                           <td><?php echo $value['product'] ?></td>
                           <td><?php echo $value['quantity'] ?></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="<?php echo $bulk_id_pro; ?> "> <?php if(!empty($data[0]['cnt']) && $data[0]['cnt']!=0) { ?> <span class="badge badge-outline-success"><?php echo $data[0]['cnt'];?></span> <?php }else{} ?> </a></td> 
                            <td><a href="<?php echo $bulk_id_pro; ?>" class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="ion ion-md-eye"></i></a>&nbsp;|&nbsp;<a href="#  " class="btn btn-default btn-xs icon-btn md-btn-flat product-tooltip"  title="" data-original-title="Show"><i class="fas fa-ban d-block" style="color: red;"></i></a>

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