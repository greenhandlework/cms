
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Product Catalog</title>
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
              <form action="#" method="post" id='search_form'>
              <div class="form-row">
                <div class="col-md mb-4">                  
               <label class="form-label">Date    </label>
               <input type="text" id="b-m-dtp-date" class="form-control" name="date1" placeholder="Date" data-dtp="dtp_u0u3J" >
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Status</label>
                  <select class="custom-select" name="product_status">
                    <option value="0">Pending</option>
                    <option value="1">Approve</option>
                    <option value="2">Live</option>
                    <option value="4">Offline</option>
                  </select>
                </div>
                <div class="col-md mb-4">
                  <label class="form-label">Search</label>
                  <input type="text" class="form-control" placeholder="Search" name="search">
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
              </div>
           
            
           </form>    
            </div>
            <!-- / Filters -->

            <div id="cng">
            <div class="card">
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
                if(isset($products) && !empty($products)){
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
                <?php } } ?>              
             
              </tbody>
      
    </table>
  </div>
    <?php echo $this->ajax_pagination->create_links(); ?>
    </div>
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
    // alert(page_num)
    page_num = page_num?page_num:0;
   
    $.ajax({
        type: 'POST',
        url: '<?=ADMIN_PATH.'product_catalog/ajaxPaginationData/'?>'+page_num,
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
          url  : "<?= ADMIN_PATH.'product_catalog/ajaxfilter' ?>",
          data : $('#search_form').serialize(),
          type : "POST",

          success:function(resp){
            console.log(resp);          
            $('#postList').html(resp);
          }
        })
      });

      
    })

    function get_product_detail(id) {
        var prod_id = $(id).attr('id');
        var seller_id = $(id).attr('lang');
       
        
        $.ajax({
          url  :"<?= ADMIN_PATH."product_catalog/product_detail"?>",
          data : {prod_id:prod_id,seller_id:seller_id},
          type :"POST",

          success:function(resp){
            console.log(resp)
          }

        })
      }

      $(document).ready(function() {
    $('#example').DataTable();
} );

      function clr(){
  document.getElementById("search_form").reset();
}
  </script>
</body>

</html>
