
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>CMS - Product product</title>
  <?php $this->load->view('hfs/html_header') ?>

<script type="text/javascript">
  function material_cng(id) {
    var id = $(id).val();
    alert(id)
  }
</script>
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
        <?php $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">
             <div class="media align-items-center py-3 mb-4" style="margin-top: -20px !important;margin-bottom:-20px !important;">
              <img src="<?php //echo base_url() ?>upload/products/<?php //echo $product[0]['prod_image1'] ?>" alt="" class="d-block ui-w-80 ui-bordered">
              <div class="media-body ml-4">
                <h4 class="font-weight-bold mb-2"><?= 'Product Name Here' ?>
               
                </h4>
               
              </div>
            </div>
            <hr>

          <div class="row  no-gutters row-bordered">
            <!-- <div class="row no-gutters row-bordered"> -->
                    <div class="d-flex col-md-3  ">

                      <div class="card-body d-flex align-items-center">
                        <div>
                          <div class="ui-stars text-large text-nowrap">
                            <div class="ui-star filled">
                              <i class="ion ion-md-star"></i>
                              <i class="ion ion-md-star"></i>
                            </div>
                            <div class="ui-star filled">
                              <i class="ion ion-md-star"></i>
                              <i class="ion ion-md-star"></i>
                            </div>
                            <div class="ui-star filled">
                              <i class="ion ion-md-star"></i>
                              <i class="ion ion-md-star"></i>
                            </div>
                            <div class="ui-star filled">
                              <i class="ion ion-md-star"></i>
                              <i class="ion ion-md-star"></i>
                            </div>
                            <div class="ui-star half-filled">
                              <i class="ion ion-md-star"></i>
                              <i class="ion ion-md-star"></i>
                            </div>
                          </div>
                          <a href="javascript:void(0)" class="d-block text-muted small">123 reviews</a>
                        </div>
                      </div>

                    </div>
                    <div class="d-flex col-md-3  align-items-center">

                      <div class="card-body d-flex align-items-center">
                        <div class="lnr lnr-cart display-4 text-secondary"></div>
                        <div class="ml-3">
                          <div class="text-muted small line-height-1">Sales</div>
                          <div class="text-xlarge">1,045</div>
                        </div>
                      </div>

                    </div>
                    <div class="d-flex col-md-3  align-items-center">

                      <div class="card-body d-flex align-items-center">
                        <div class="lnr lnr-earth display-4 text-secondary"></div>
                        <div class="ml-3">
                          <div class="text-muted small line-height-1">Views</div>
                          <div class="text-xlarge">65,326</div>
                        </div>
                      </div>

                    </div>
                    <div class="d-flex col-md-3  align-items-center">

                      <div class="card-body d-flex align-items-center">
                        <div class="lnr lnr-gift display-4 text-secondary"></div>
                        <div class="ml-3">
                          <div class="text-muted small line-height-1">Wished</div>
                          <div class="text-xlarge">3,671</div>
                        </div>
                      </div>

                    </div>
                  </div>
          <!-- </div>     -->
          

            
            
                  <hr>
                  <div class="row">
        <div class="col-md-6">

          <div class="card bg-transparent border-success box-shadow-none">
            <div class="card-body">
              <center><h4 class="card-title" style="color: #02BC77 ">Product Detail</h4><hr></center>

                 
                 <!--    <div class="row">
                        <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Product Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="product_name" class="form-control form-control-sm " value=" <?=  $product[0]['prod_name'] ?>">
                        
                        </div>
                     </div>


              <br> -->
               <div class="row">
                    <label class="col-form-label  col-sm-4  text-sm-right">Product Name:</label>
                   <div class="col-sm-8 ">
                      <label class="col-form-label "><?=  $product[0]['prod_name'] ?></label>
                     </div>
              </div> 
              

               <div class="row">
                    <label class="col-form-label  col-sm-4  text-sm-right">Section:</label>
                   <div class="col-sm-8 ">
                      <label class="col-form-label "><?=  $product[0]['section_name'] ?></label>
                     </div>
              </div> 
             

               <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Category:</label>
                   <div class="col-sm-8">
                      <label class="col-form-label"><?=  $product[0]['cat_name'] ?></label>
                     </div>
              </div> 

              <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Subcategory:</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['sub_cat_name'] ?></label>
                     </div>
              </div> 
            

            <?php if(isset($product[0]['material_name'])){ ?> 
               <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Material&nbsp;Name :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['material_name'] ?></label>
                     </div>
              </div> 
            <?php } ?>  
               <!-- <br> -->
         <!--       <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Material&nbsp;Name :</label>
                   <div class="col-sm-8">
                     <select class="form-control form-control-sm " id="mat" onchange="material_cng(this)">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                     </div>
              </div> -->
            <?php if(isset($product[0]['GSM_name'])){ ?>   
              <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">GSM&nbsp;Name :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['GSM_name'] ?></label>
                     </div>
              </div> 
            <?php } ?>  

            <?php if(isset($product[0]['size'])){ ?>   
               <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Size :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['size'] ?></label>
                     </div>
              </div> 
            <?php } ?>
            
              <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Style :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['style'] ?></label>
                     </div>
              </div> 
               
              <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Handle&nbsp;Type :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['handle'] ?></label>
                     </div>
              </div> 

          <?php if(isset($product[0]['handle_size'])){ ?>       
            <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Handle&nbsp;Size :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['handle_size'] ?></label>
                     </div>
              </div> 
          <?php }?>    
             <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Handle&nbsp;Color :</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['handle_color'] ?></label>
                     </div>
              </div> 

               <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Gusset:</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['gusset_name'] ?></label>
                     </div>
              </div> 

            <!--   <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Number&nbsp;of&nbsp;Color :</label>
                   <div class="col-sm-8">
                     <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                     </div>
              </div>     -->

           <div class="row">
                    <label class="col-form-label  col-sm-4 text-sm-right">Lamination:</label>
                   <div class="col-sm-8">
                      <label class="col-form-label "><?=  $product[0]['lamination'] ?></label>
                     </div>
              </div>      

            </div>
          </div>

        </div>
       
        <div class="col-md-6">
          
          <div class="row">
            <div class="col-md-12">
                 <div class="card bg-transparent border-success box-shadow-none ">
            <div class="card-body ">
             <center><h4 class="card-title" style="color: #02BC77 ">Product&nbsp;Description</h4><hr></center>
                  <div>                       
                    <div class="row">                         
                          <div class="col-sm-12 col-xs-12">
                            <textarea cols="55" rows="5"  class="form-control form-control-sm"><?=  $product[0]['prod_description'] ?></textarea>
                          </div>
                       </div>   
              </div>

                      
            </div>
          </div>

            </div>
          </div><hr>
          <div class="row">

            <div class="col-md-12">
               <div class="card bg-transparent border-success box-shadow-none ">
            <div class="card-body ">
             <center><h4 class="card-title" style="color: #02BC77 ">SEO Detail</h4><hr></center>
            
              <div class="list-group-item list-group-item-action">
                    <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Meta&nbsp;Title</label>
                          <div class="col-sm-8">
                            <input type="text"  class="form-control form-control-sm" value="<?=  $product[0]['cat_meta_title'] ?>" placeholder="Meta Title">
                          </div>
                       </div>
              </div>
              <div class="list-group-item list-group-item-action">
                    <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Meta&nbsp;Key&nbsp;Word</label>
                          <div class="col-sm-8">
                            <input type="text"  class="form-control form-control-sm" value="<?=  $product[0]['cat_meta_keywords'] ?>" placeholder="Meta Key Word">
                          </div>
                       </div>
              </div>
              <div class="list-group-item list-group-item-action">                       
                    <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right">Meta&nbsp;Description</label>
                          <div class="col-sm-8">
                            <textarea   class="form-control form-control-sm" cols="35" rows="5"><?=  $product[0]['cat_meta_description'] ?></textarea>
                          </div>
                       </div>   
              </div>  

               <!-- <div class="list-group-item list-group-item-action"> -->
                    <div class="row">
                          <label class="col-form-label col-form-label-sm col-sm-4 text-sm-right"></label>
                          <div class="col-sm-8">
                            <input type="submit" value="Save"  class="btn btn-success" >
                            <!-- <input type="text"  class="form-control form-control-sm" placeholder="Meta Key Word"> -->
                          </div>
                       </div>
              <!-- </div>  -->
            </div>
          </div>
            </div>
          </div>

        </div>
        <div class="w-100"></div>
    
        
      </div>
         
                  <hr>
                  <div class="card-body" style="margin-top: -30px !important;margin-bottom: -36px !important;">

                    <div class="table-responsive    bg-lighter border-warning ">
                      <table class="table product-item-discounts-table">
                        <thead>
                          <tr class="table-success">
                            <th>Quantity</th>
                            <th>Seller&nbsp;Price/&nbsp;Piece</th>
                            <th>GH&nbsp;Margin</th>
                            <th>GST</th>
                            <th>Selling&nbsp;Price</th>
                            <th>Discount</th>
                            <th>Approx.&nbsp;Wt/kg</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            foreach ($qvp as $key => $value) { ?>
                          
<tr>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['quantity'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['seller_price'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['ghmargin'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['gst'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['sell_price'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['discount'] ?>">
                                  </td>
                           <td><input type="text" class="form-control form-control-sm" value="<?php   echo $value['wcc'] ?>">
                                  </td>
                            
                          </tr>
                              
                              
                          <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <hr>
                  <div class="card-body" style="margin-top: -36px !important;">

                    <div class="mb-4">
                      <!-- <span class="badge badge-dot badge-primary"></span> Primary image -->
                    </div>

                    <!-- Lightbox template -->
                    <div id="product-item-lightbox" class="blueimp-gallery blueimp-gallery-controls">
                      <div class="slides"></div>
                      <h3 class="title"></h3>
                      <a class="prev">‹</a>
                      <a class="next">›</a>
                      <a class="close">×</a>
                      <ol class="indicator"></ol>
                    </div>

                    <div id="product-item-images" class="row">

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="http://100.26.193.99/upload/products/demo_image.jpg" class="d-block border-primary ui-bordered">
                          <img src="http://100.26.193.99/upload/products/demo_image.jpg" class="img-fluid" alt="">
                        </a>
                      </div>
                      <!-- http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image1'] ?> -->

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image2'] ?>" class="d-block ui-bordered">
                          <img src="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image2'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image3'] ?>" class="d-block ui-bordered">
                          <img src="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image3'] ?>" class="img-fluid" alt="">
                        </a>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
                        <a href="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image4'] ?>" class="d-block ui-bordered">
                          <img src="http://100.26.193.99/upload/products/<?php //echo $product[0]['prod_image4'] ?>" class="img-fluid" alt="">
                        </a>
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


</body>

</html>sss