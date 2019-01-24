<!DOCTYPE html>
<html lang="en" class="default-style">
<head>
  <title>CMS - Buyer Account</title>
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

            <!-- <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
              <div>Order Details</div>
              <button type="button" class="btn btn-primary btn-round d-block">
                <span class="ion ion-md-add"></span>&nbsp; Add product</button>
            </h4> -->

            <!-- Filters -->
            <div class="ui-bordered px-4 pt-4 mb-4">
              <form action="" method="post" id='search_form'>
              <div class="form-row">
                 <div class="col-md mb-2"></div>
                <div class="col-md mb-4">
                  <label class="form-label ">Activation Date  </label>
                  <input type="text" id="b-m-dtp-date" class="form-control" name="activation_date" placeholder="Date" data-dtp="dtp_dXxc9">
                </div>
             
                <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search_buyer">
                </div> 
                  <div class="col-md col-xl-2 mb-4">
                 <div class="form-row">
                    <div class="col-md md-8">
                      <label class="form-label d-none d-md-block">&nbsp;</label>
                     <button type="button" id="search_btn" class="btn btn-secondary btn-block">Show</button>
                    </div>
                    <div class="col-md md-4">
                      <label class="form-label d-none d-md-block">&nbsp;</label>
                       <a href="javascript:void(0)" onclick="clr()" class="btn btn-secondary "><i class="ion ion-md-refresh d-block" style="margin: 4px"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-md mb-2"></div>
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->

            <div class="card">
          <div class="post-list" id="postList">
              <div class="card-datatable table-responsive" id="cng_ajax">
            <table id="seller_11" class="table table-hover table-bordered" style="width:100%">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th>Buyer&nbsp;ID</th>
                                <th>Buyer&nbsp;Name</th>
                                <th>Mobile&nbsp;Number</th>                                  
                                <th>Email&nbsp; Id</th>                                
                                <th>Action</th>
                               
                             </tr>
                        </thead>
                         <tbody>
                          <?php $i=1;
                            foreach ($buyer as $value) { 
                             
                                $name = $value['first_name'].' '.$value['last_name'];
                                $url = ADMIN_PATH.'buyer_accounts/get_detail/'.$value['user_id'];

                              ?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value['user_id'] ?></td>
                                  <td><?php echo $name; ?></td>
                                  <td><?php echo $value['mobile_number'] ?></td>
                                  <td><?php echo $value['email'] ?></td>
                                  <td><a href="<?php echo $url; ?>" class="btn btn-xs btn-outline-success" >View</a>&nbsp;|&nbsp;<a href="<?= ADMIN_PATH.'buyer_accounts/delete_buyer/' ?><?php echo $value['user_id'] ?>" onclick="return confirm('Are you sure ?');" class="btn btn-xs btn-outline-danger" ><i class="ion ion-ios-close d-block"></i></a>

                              </td>
                                </tr>
                          <?php   } ?>
                             
                          </tbody>
                      
                    </table>
  </div>
     <?php echo $this->ajax_pagination->create_links(); ?>
   </div>
            </div>

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

<script>
function searchFilter(page_num) {
   //  alert(page_num)
    page_num = page_num?page_num:0;
   
    $.ajax({
        type: 'POST',
        url: '<?=ADMIN_PATH.'buyer_accounts/ajaxPaginationData/'?>'+page_num,
        data:'page='+page_num,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (html) {
          console.log(html);
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}

</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#search_btn').click(function(){
        
        $.ajax({
          url  : "<?= ADMIN_PATH.'buyer_accounts/ajaxfilter' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);
            $('#postList').html(resp);
          }
        })
      });

      
    })
  

$(document).ready(function() {
    $('#seller_1').DataTable({
      "columns": [
    null,
    null,
    { "width": "25%" },
    null,
    null,
    { "width": "20%" },
  ]
    });
});

function clr(){
  document.getElementById("search_form").reset();
}
  </script>
</body>

</html>
