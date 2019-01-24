
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS -Seller List For Bid</title>
  <?php $this->load->view('hfs/html_header') ?>
</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <!-- Layout sidenav -->
      <?php $this->load->view('hfs/sidebar') ?>
      <!-- / Layout sidenav -->

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
       <?php $data['page']=$page; $this->load->view('hfs/header',$data) ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
            <?php
                if($seller_status[0]['status']==4){
                   // echo 'blank';
                }else{ ?>
                   <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-2">      
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Location</label>
                  <select class="custom-select" name="location">
                   <?php 
                    foreach ($city as $key => $value) { ?>
                    <option value="<?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>

                   <?php  }   ?>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
                </div> 
                  <div class="col-md col-xl-2 mb-4">
                  <label class="form-label d-none d-md-block">&nbsp;</label>
                  <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                </div>
                 <div class="col-md mb-2">      
                </div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->
             <button type="button" data-toggle="collapse" data-target="#seller_frm"  class="btn btn-round btn-outline-primary">List&nbsp;of&nbsp;Seller</button>
                    <div id="seller_frm"  class="collapse" >

                      <br>
              <div class="row">
                  
                <div class="card">
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
                                          $id = $value['seller_id'];
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
                                               <button class="btn-sm btn-primary " onclick="todo(<?php echo $value['seller_id']; ?>,'<?php echo $bid_id ?>')" > <i class="ion ion-md-add d-block"></i></button> 
                                        <!--       <a href="javascript:(0)" class="btn-sm btn-primary" style="background-color: #5DADE2" onclick="alert(<?php echo $id; ?>,<?php echo $bulk_id ?>)"><b>+</b></a> -->
                                            </td>
                                          </tr>
                                        <?php } ?>
                             
                          </tbody>
                      
                    </table>
                   </div>
                </div>
              </div>
              </div> <!--Row -->
              <hr>

               <?php  }     ?>
            

             <div class="row">
               <div class="col-md-4">
                 

               </div>
             </div>
             <label class="btn-sm btn-primary">Responded&nbsp;Seller</label><br>
             <!-- <center><hr></center> -->
<form action="<?php echo base_url()?>bids/ins_mail" class="" method="post" enctype="multipart/form-data" />
  <input type="hidden" name="bid_id1" value="<?php echo $bid_id ?>">
      <div class="row">
          
          <div class="card">
              <div class="card-datatable table-responsive">
                 <table id="responded_seller" class="table table-striped table-bordered" style="width:100%;">
                   <thead>
                        <tr>
                          <!-- <th>#</th> -->
                          <th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                          <th>Seller&nbsp;Detail</th>
                          
                          <th>Price</th>
                          <th>GST(%)</th>
                          <th>Delivery&nbsp;Days</th>
                          <th>Total&nbsp;weight&nbsp;in&nbsp;kg</th>
                          <th>Message</th>
                          <th>Action</th>      
                        </tr>
                    </thead>
                     <tbody id="list_seller" style="font">
                          <?php 
                            foreach ($responded_sel as $key => $value) {
                                 $datetime = new DateTime($value['date']);
                                 $date = $datetime->format('d-m-Y');
                             ?>
                             <tr>
                               <td><?php echo $date; ?></td>
                               <td> <?php echo $value['business_name']; ?>&nbsp;,&nbsp;<?php echo $value['seller_email']; ?>&nbsp;,&nbsp;<?php echo $value['city']; ?>
                                <input type="hidden" name="seller_id1[]" value="<?php echo $value['seller_id']; ?>">

                                <!-- <span class="media-body  text-dark " style="padding-left:39px"><label style="font-weight:bold;">Business&nbsp;Name&nbsp;:&nbsp;</label><?php echo $value['business_name']; ?></span><br>
                                <span class="media-body  text-dark " style="padding-left:39px"><label style="font-weight:bold;">Seller&nbsp;Email&nbsp;:&nbsp;</label><?php echo $value['seller_email']; ?></span><br>
                                <span class="media-body  text-dark" style="padding-left:39px"><label style="font-weight:bold;">City&nbsp;:&nbsp;</label><?php echo $value['city']; ?></span> -->

                                
                                   
                               </td>
                              
                               <td><?php if($value['price']==0){}else{echo $value['price'];} ; ?></td>  
                               <td><?php echo $value['gst']; ?></td>
                               <td><?php if($value['delivery_days']==0){}else{echo $value['delivery_days'];} ; ?>  </td>
                               <td><?php if($value['total_weight']==0){}else{echo $value['total_weight'];} ; ?>
                              </td>
                               <td><?php echo $value['other_details']; ?></td>
                               <td> <?php if($value['status']==2){ ?>
                                <label class="btn-xs btn-success">Confirmed</label>
                                <!-- oreder confirm to this seller -->
                               <?php }elseif($value['status']==1){ ?>
                                 <a href="<?= ADMIN_PATH.'bids/place_order' ?>/<?php echo $value['seller_id']; ?>/<?php echo $value['bid_id']; ?>" class="btn btn-xs btn-outline-success" onclick="art('<?php echo $value['id'] ?>')">Place Order</a>
                              <?php }else{ ?>
                                  <label class="btn-xs btn-danger">Bid Close.</label>
                              <?php } ?>


                               </td>
                             </tr> 
                          <?php  }  ?>
                      </tbody>
                  
                </table>
          </div>
          <!-- / Content -->          

        </div>
      </div>
      <hr>
      <div class="row">
          <input class="btn btn-primary" type="submit" value="Send" >
      </div>
    
</form>

          </div>
          <!-- / Content -->          

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  <?php $this->load->view('hfs/footer') ?>
  <script type="text/javascript">
     $(document).ready(function() {
        $('#example').DataTable();
        $('#responded_seller').DataTable();

      $('#search_btn').click(function(){
          var form_data = $('#search_form').serialize();

          //alert(form_data);

          $.ajax({
            url : "<?php echo base_url('bids/seller_list_search') ?>",
            data : form_data,
            type : "POST",

            success:function(resp){
              console.log(resp);
              $('#cng_tbl').html(resp);
            }
          })

        });

    //   $("#test").click(function(e){
    //     if(!confirm('Are you sure?')){
    //         e.preventDefault();
    //         return false;
    //     }
    //     return true;
    // });
      });

    //  var idd =[];
  function todo(id,bid_id) {
     
      
     // idd.push(id);
      // var hh = $('#2').val();
      // alert(hh)
       //document.getElementById("demo").innerHTML = idd;
      $.ajax({
        url : '<?php echo base_url('bids/to_do_list') ?>',
        type : "POST",
        data : {id,bid_id},

        success:function(resp){
          //alert(resp);
          console.log(resp);//return;
         // $html = "<tr><td>"+resp+"</td></tr>";
          $('#list_seller').append(resp);
          $('#'+id).hide();

        }
      })

     }

function rem(id){
  // /alert(id);
  $('#a'+id).remove();
  $('#'+id).show();
}


function art(id){
if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;

}
  </script>

</body>

</html>