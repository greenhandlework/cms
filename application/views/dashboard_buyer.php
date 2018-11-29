
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>Dashboard 1 - Dashboards - Appwork</title>
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
        <?php $this->load->view('hfs/header') ?>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
         <div class="container-fluid flex-grow-1 container-p-y">

            <!-- Head stats -->
            <div class="row no-gutters bg-lighter bg-white container-p-x pb-3 container-m--x container-m--y mb-4">
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                  <div class="ion ion-ios-bookmark text-twitter text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo($Order->count);  ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Order</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                  <div class="ion ion-md-chatbubbles text-google text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"> <?php print_r($Fail_order->count) ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Fail&nbsp;Order</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                 <div class="ion ion-ios-cube text-facebook text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"> <?php print_r($Inprocess->count) ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Inprocess</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                 <div class="ion ion-ios-folder-open text-pinterest text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"> <?php print_r($Ondelivery->count) ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Ondelivery</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                  <!--<div class="ion ion-logo-instagram text-instagram text-large"></div>-->
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php print_r($Canceled->count) ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Canceled</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="margin-bottom:2px;"></div>
            <div class="row no-gutters bg-lighter bg-white container-p-x pb-3 container-m--x container-m--y mb-4">
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
              <div class="ion ion-ios-photos text-twitter text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo(($Return->count)); ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Return</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                 <div class="ion ion-ios-photos text-google text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo(($Refund->count)); ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Refund</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                <div class="ion ion-ios-photos text-facebook text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo($Complain->count); ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Complain</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                  <div class="ion ion-ios-photos text-pinterest text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo(($Bids->count)); ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Bids</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-3 col-md pt-3 pr-4">
                <div class="media align-items-center">
                 <div class="ion ion-ios-photos text-instagram text-large"></div>
                  <div class="media-body ml-3">
                    <div class="text-big font-weight-bold line-height-1"><?php echo(($Enquiry->count)); ?></div>
                    <div class="text-light text-tiny font-weight-semibold line-height-1 mt-1">Enquiry</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Head stats -->

            <!-- Traffic chart + sources -->
            <div class="card mb-4">
              <h5 class="card-header with-elements border-0 pt-3 pb-0">
                <span class="card-header-title">
                  <i class="ion ion-md-stats text-primary"></i>&nbsp; Traffic</span>

                <div class="card-header-elements ml-auto">
                  <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default md-btn-flat">
                      <input type="radio" name="btn-radio"> Month
                    </label>
                    <label class="btn btn-default md-btn-flat">
                      <input type="radio" name="btn-radio"> 6 Months
                    </label>
                    <label class="btn btn-default md-btn-flat active">
                      <input type="radio" name="btn-radio" checked=""> Year
                    </label>
                    <label class="btn btn-default md-btn-flat">
                      <input type="radio" name="btn-radio"> 3 Years
                    </label>
                  </div>
                </div>
              </h5>
              <hr class="border-light mb-0">
              <div class="row no-gutters row-bordered row-border-light">
                <div class="d-flex col-md-8 col-lg-12 col-xl-8 align-items-center p-4">
                  <div class="w-100" style="height: 230px;">
                    <canvas id="statistics-chart-1" width="583" height="230" style="display: block; width: 583px; height: 230px;"></canvas>
                  </div>
                </div>

                <!-- Sources -->
                <div class="col-md-4 col-lg-12 col-xl-4 px-4 pt-4">
                  <div class="pb-4">
                    Order
                    <div class="float-right small mt-1">
                      11,963 &nbsp;&nbsp;
                      <span class="text-muted">29.77%</span>
                    </div>
                    <div class="progress mt-1" style="height:3px;">
                      <div class="progress-bar bg-twitter" style="width: 29.77%;"></div>
                    </div>
                  </div>
                  <div class="pb-4">
                  Faild
                    <div class="float-right small mt-1">
                      11,963 &nbsp;&nbsp;
                      <span class="text-muted">28.39%</span>
                    </div>
                    <div class="progress mt-1" style="height:3px;">
                      <div class="progress-bar bg-google" style="width: 28.39%;"></div>
                    </div>
                  </div>
                  <div class="pb-4">
                   Enquiry
                    <div class="float-right small mt-1">
                      9,965 &nbsp;&nbsp;
                      <span class="text-muted">23.65%</span>
                    </div>
                    <div class="progress mt-1" style="height:3px;">
                      <div class="progress-bar bg-facebook" style="width: 23.65%;"></div>
                    </div>
                  </div>
                  <div class="pb-4">
                    Complains
                    <div class="float-right small mt-1">
                      4,223 &nbsp;&nbsp;
                      <span class="text-muted">10.02%</span>
                    </div>
                    <div class="progress mt-1" style="height:3px;">
                      <div class="progress-bar bg-pinterest" style="width: 10.02%;"></div>
                    </div>
                  </div>
                  <div class="pb-4">
                    Refund
                    <div class="float-right small mt-1">
                      3,437 &nbsp;&nbsp;
                      <span class="text-muted">8.15%</span>
                    </div>
                    <div class="progress mt-1" style="height:3px;">
                      <div class="progress-bar bg-instagram" style="width: 8.15%;"></div>
                    </div>
                  </div>
                </div>
                <!-- / Sources -->

              </div>
            </div>
            <!-- / Traffic chart + sources -->

            <div class="row">

              <!-- Charts -->
              <!--<div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body pb-3">
                    <strong class="text-big">2366</strong>
                    <small class="text-muted">VIEWS</small>
                  </div>
                  <div class="px-2">
                    <div class="w-100" style="height: 35px;">
                      <canvas id="statistics-chart-2" width="201" height="35" style="display: block; width: 201px; height: 35px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>-->
              <!--<div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body d-flex justify-content-between align-items-center" style="height: 98px">
                    <div>
                      <div class="text-large">+39%</div>
                      <div class="text-muted text-tiny">VIEWS</div>
                    </div>
                    <div class="w-50" style="height: 35px;">
                      <canvas id="statistics-chart-3" width="84" height="35" style="display: block; width: 84px; height: 35px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>-->
              <!--<div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body d-flex justify-content-between align-items-center" style="height: 98px">
                    <div>
                      <div class="text-muted small">View depth</div>
                      <strong class="text-large font-weight-normal">4.23</strong>
                      <sup class="text-success small">+ 12%</sup>
                    </div>
                    <div class="w-50">
                      <div style="height: 35px;">
                        <canvas id="statistics-chart-4" width="85" height="35" style="display: block; width: 85px; height: 35px;"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

              </div>-->
              <!--<div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body d-flex justify-content-between align-items-center" style="height: 98px">
                    <div>
                      <div class="text-muted small">Time on site</div>
                      <strong class="text-large font-weight-normal">3:44</strong>
                      <sup class="text-success small">+ 2%</sup>
                    </div>
                    <div class="w-50">
                      <div style="height: 35px;">
                        <canvas id="statistics-chart-5" width="85" height="35" style="display: block; width: 85px; height: 35px;"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

              </div>-->
              <div class="col-md-4">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">City Wise Order</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="type-gadgets-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-6" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">State wise Order</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-8" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="card mb-4">
                  <!--<h6 class="card-header with-elements border-0 pr-0 pb-0">
                 <div class="card-header-title">Enquiry/Bids</div>
                   
                   
                   
                   
                   
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="new-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>-->
                  
                  <div class="nav-tabs-top mb-4">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#Enquiry">Enquiry</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#Bids">Bids</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="Enquiry">
                      <div class="pt-4">
                    <div style="height:144px;">
                      <canvas id="statistics-chart-7" width="298" height="144" style="display: block; width: 298px; height: 144px;"></canvas>
                    </div>
                  </div>
                      
                    </div>
                    <div class="tab-pane fade show " id="Bids">
                      <div class="pt-4">
                    <div style="height:144px;">
                      <canvas id="statistics-chart_7" width="298" height="144" style="display: block; width: 298px; height: 144px;"></canvas>
                    </div>
                  </div>

                      
                    </div>
                    
                
                  </div>
                </div>
                  
                  
                  
                </div>

              </div>
              
              
              <div class="col-md-3">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Category Wise Order</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-9" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-3">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Subcategory Wise Order</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-10" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              
              <div class="col-md-3">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Complain</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-11" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-3">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Refund</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:120px;">
                      <canvas id="statistics-chart-12" width="266" height="120" style="display: block; width: 266px; height: 120px;"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Charts -->

              <div class="col-md-8 col-lg-12 col-xl-9">

                <!-- Popular queries -->
                <div class="nav-tabs-top mb-4">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#Current">Current</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#Failed">Failed</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#Ondeliver">Ondeliver</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#Delivered">Delivered</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="Current">
                      <table class="table card-table" id="ex-stats">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>payment&nbsp;Date</th>
                            <th>Prod&nbsp;Id</th>
                            <th>Seller&nbsp;Name</th>
                            <th>OrderID</th>
                            <th>Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       <?php $i=1; foreach ($paymentSuccess as  $value) { if(($value['payment_done']==1)&&($value['status']=="success")&&($value['order_status']!=="Cancle")){ ?>
                          <tr>
                            <td><?php echo  $i;  ?></td>
                            <td><?php $str=$value['payment_date']; echo  $str=substr($str, 0, strrpos($str, ' '));  ?></td>
                            <td><?php echo  $value['product_id'];  ?></td>
                            <td><?php echo  $value['business_name'];  ?></td>
                            
                            <td><?php echo  $value['txnid'];  ?></td>
                            <td><?php echo  $value['payment_Amount'];  ?></td>
                          </tr>
                          <?php $i++; } } ?>
                          </tbody>
                      </table>
                      <a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                    </div>
                    <div class="tab-pane fade" id="Failed">
                      <table class="table card-table" id="ex-stats">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>payment&nbsp;Date</th>
                            <th>Prod&nbsp;Id</th>
                            <th>Seller&nbsp;Name</th>
                            <th>OrderID</th>
                            <th>Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       <?php $i=1; foreach ($paymentSuccess as  $value) { if(($value['payment_done']==1)&&($value['status']=="failure")){ ?>
                          <tr>
                            <td><?php echo  $i;  ?></td>
                            <td><?php $str=$value['payment_date']; echo  $str=substr($str, 0, strrpos($str, ' '));  ?></td>
                            <td><?php echo  $value['product_id'];  ?></td>
                            <td><?php echo  $value['business_name'];  ?></td>
                            
                            <td><?php echo  $value['txnid'];  ?></td>
                            <td><?php echo  $value['payment_Amount'];  ?></td>
                          </tr>
                          <?php $i++; } } ?>
                          </tbody>
                      </table>
                      <a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                    </div>
                    
                    <div class="tab-pane fade" id="Ondeliver">
                      <table class="table card-table" id="ex-stats">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>payment&nbsp;Date</th>
                            <th>Prod&nbsp;Id</th>
                            <th>Seller&nbsp;Name</th>
                            <th>OrderID</th>
                            <th>Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       <?php $i=1; foreach ($paymentSuccess as  $value) { if(($value['payment_done']==1)&&($value['status']=="success")&&($value['order_status']=="Dispatched")){ ?>
                          <tr>
                            <td><?php echo  $i;  ?></td>
                            <td><?php $str=$value['payment_date']; echo  $str=substr($str, 0, strrpos($str, ' '));  ?></td>
                            <td><?php echo  $value['product_id'];  ?></td>
                            <td><?php echo  $value['business_name'];  ?></td>
                            
                            <td><?php echo  $value['txnid'];  ?></td>
                            <td><?php echo  $value['payment_Amount'];  ?></td>
                          </tr>
                          <?php $i++; } } ?>
                          </tbody>
                      </table>
                      <a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                    </div>
                    
                    
                    <div class="tab-pane fade" id="Delivered">
                      <table class="table card-table" id="ex-stats">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>payment&nbsp;Date</th>
                            <th>Prod&nbsp;Id</th>
                            <th>Seller&nbsp;Name</th>
                            <th>OrderID</th>
                            <th>Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                       <?php $i=1; foreach ($paymentSuccess as  $value) { if(($value['payment_done']==1)&&($value['status']=="success")&&($value['order_status']=="Delivered")){ ?>
                          <tr>
                            <td><?php echo  $i;  ?></td>
                            <td><?php $str=$value['payment_date']; echo  $str=substr($str, 0, strrpos($str, ' '));  ?></td>
                            <td><?php echo  $value['product_id'];  ?></td>
                            <td><?php echo  $value['business_name'];  ?></td>
                            
                            <td><?php echo  $value['txnid'];  ?></td>
                            <td><?php echo  $value['payment_Amount'];  ?></td>
                          </tr>
                          <?php $i++; } } ?>
                          </tbody>
                      </table>
                      <a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>
                    </div>
                  </div>
                </div>
                <!-- / Popular queries -->

              </div>
              <div class="col-md-4 col-lg-12 col-xl-3">

                <!-- Stats -->
                <div class="row">
                  <div class="col-sm-4 col-md-12 col-lg-4 col-xl-12">

                    <div class="card mb-4">
                      <div class="card-header border-0 pb-0">Monthly clicks</div>
                      <div class="card-body text-center text-success text-xlarge py-3">3,235</div>
                      <div class="card-footer border-0 small pt-0">
                        <div class="float-right text-success">
                          <small class="ion ion-md-arrow-round-up"></small> 11.25%
                        </div>
                        <span class="text-muted">Total: 46,536</span>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-4 col-md-12 col-lg-4 col-xl-12">

                    <div class="card mb-4">
                      <div class="card-header border-0 pb-0">Monthly impressions</div>
                      <div class="card-body text-center text-danger text-xlarge py-3">8,267</div>
                      <div class="card-footer border-0 small pt-0">
                        <div class="float-right text-danger">
                          <small class="ion ion-md-arrow-round-down"></small> 5.38%
                        </div>
                        <span class="text-muted">Total: 20,369</span>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-4 col-md-12 col-lg-4 col-xl-12">

                    <div class="card mb-4">
                      <div class="card-header border-0 pb-0">Monthly avg. CTR</div>
                      <div class="card-body text-center text-success text-xlarge py-3">21.73%</div>
                      <div class="card-footer border-0 small pt-0">
                        <div class="float-right text-success">
                          <small class="ion ion-md-arrow-round-up"></small> 2.54%
                        </div>
                        <span class="text-muted">Total: 18.3%</span>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- / Stats -->

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
  
  <?php //print_r($section_wise); 
  
  foreach($city_wise_order as $citysection){
	  $cit_name=$citysection['Shipping_city'];
	  $Total=$citysection['Total'];
	  $sectionlabel[]="'$cit_name'";
	  $sectionTotal[]="'$Total'";
  }
 $section_label = implode(',',$sectionlabel);
 $section_Total = implode(',',$sectionTotal);
  //print_r($section_label); 
  ?>
  
   <?php //print_r($section_wise);
   
    function dechexpad($i){
$s="";
if($i<16) $s="0";
$s.=dechex($i);
return $s;
}
function hexcolor($r,$g,$b){
return "#".dechexpad($r%255).dechexpad($g%255).dechexpad($b%255);
}
  $i="6";
  $j="12";
 // $g="170";
 // $b="320";
  foreach($state_wise_order as $state_wise){
	  $category_name=$state_wise['Shipping_state'];
	  $Total=$state_wise['Total'];
	  $categorylabel[]="'$category_name'";
	  $categoryTotal[]="'$Total'";
	 // $rr=99+$r;
	 // $gg=125+$g;
	  //$bb=138+$b;
	  $categorycolor[]="'".hexcolor($i+$j*2,$i*6,$i*4)."'"; //"'rgba($rr,$gg,$bb,0.5)'";
	  $i++;
	 // $g++;
	 // $b++;
  }
 $category_label = implode(',',$categorylabel);
 $category_Total = implode(',',$categoryTotal);
 $category_color = implode(',',$categorycolor);
  //print_r($category_color); 
  ?>
  
 <?php //print_r($section_wise); 
  
  /*foreach($subcategory_wise as $subcategory){
	  $subcategory_name=$subcategory['sub_cat_name'];
	  $Total=$subcategory['Total'];
	  $subcategorylabel[]="'$subcategory_name'";
	  $subcategoryTotal[]="'$Total'";
  }
 $subcategory_label = implode(',',$subcategorylabel);
 $subcategory_Total = implode(',',$subcategoryTotal);*/
  //print_r($section_label); 
  ?>  
  
   <?php //print_r($section_wise); 
  
  foreach($category_wise_order as $category_wiseo){
	  $newcategory_wise_name=$category_wiseo['cat_name'];
	  $newcategory_wise_Total=$category_wiseo['Total'];
	  $newcategory_wiselabel[]="'$newcategory_wise_name'";
	  $newcategory_wiseTotal[]="'$newcategory_wise_Total'";
  }
 $newcategory_wise_labelo = implode(',',$newcategory_wiselabel);
 $newcategory_wise_Totalo = implode(',',$newcategory_wiseTotal);
  //print_r($section_label); 
  ?>  
  
  <?php //print_r($section_wise); 
  
  foreach($subcategory_wise_order as $subcategory_wise){
	  $newsubcategory_wise_name=$subcategory_wise['sub_cat_name'];
	  $newsubcategory_wise_Total=$subcategory_wise['Total'];
	  $newsubcategory_wiselabel[]="'$newsubcategory_wise_name'";
	  $newsubcategory_wiseTotal[]="'$newsubcategory_wise_Total'";
  }
 $newsubcategory_order_label = implode(',',$newsubcategory_wiselabel);
 $newsubcategory_order_Total = implode(',',$newsubcategory_wiseTotal);
  //print_r($section_label); 
  ?>  
  
   <?php //print_r($section_wise); 
  
  foreach($get_category_seller_wise as $category_seller){
	  $scat_name=$category_seller['cat_name'];
	  $Totalc=$category_seller['Total'];
	  $category_sellerlabel[]="'$scat_name'";
	  $category_sellerTotal[]="'$Totalc'";
  }
 $category_s_label = implode(',',$category_sellerlabel);
 $category_s_Total = implode(',',$category_sellerTotal);
  //print_r($section_label); 
  ?>  
  
  <?php //print_r($section_wise); 
  
  foreach($subcategoryseller_wise as $subcategoryseller_seller){
	  $subcategorys_name=$subcategoryseller_seller['sub_cat_name'];
	  $subcategorys_Total=$subcategoryseller_seller['Total'];
	  $subcategorys_sellerlabel[]="'$subcategorys_name'";
	  $subcategorys_sellerTotal[]="'$subcategorys_Total'";
  }
 $subcategorys_s_label = implode(',',$subcategorys_sellerlabel);
 $subcategorys_s_Total = implode(',',$subcategorys_sellerTotal);
  //print_r($section_label); 
  ?>  
  <!-- / Layout wrapper -->
  <?php $this->load->view('hfs/footer') ?>
  <script src="<?= ADMIN_VENDOR_PATH.'libs/chartjs/chartjs.js'?>"></script>
  <script src="<?= ADMIN_JS_PATH.'dashboards_dashboard-5.js'?>"></script>
  <script type="text/javascript">
  $(function() {
	//  var d = new Date(),

  //  n = d.getMonth(),

  //  y = d.getFullYear();
  
  
  var monthNames = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

var today = new Date();
var d;
var month;

for(var i = 6; i > 0; i -= 1) {
	 
  d = new Date(today.getFullYear(), today.getMonth() - i, 1);
  month = monthNames[d.getMonth()];
  console.log(month);
}
  /*var date ='2015-01-01'
for (int i=0;i<6; i++){
   var datemonthBefore = date('Y-m-d',strtotime('-i months', strtotime($date)));
    var monthe = datemonthBefore.getMonth();
	 console.log(monthe);
}*/
  
  var chart1 = new Chart(document.getElementById('statistics-chart-1').getContext("2d"), {
    type: 'line',
    data: {
      labels: ['2017-03', '2017-04', '2017-05', '2017-06', '2017-07', '2017-08', '2017-09', '2017-10', '2017-11', '2017-12', '2018-01', '2018-02'],
      datasets: [{
        label: 'Order',
        data: [14, 37, 30, 46, 80, 42, 33, 13, 25, 6, 88, 96],
        borderWidth: 1,
        backgroundColor: 'rgba(38, 180, 255, 0.1)',
        borderColor: '#26B4FF',
        fill: false
      }, {
        label: 'Enquiry',
        data: [56, 17, 19, 96, 73, 46, 67, 40, 77, 43, 64, 54],
        borderWidth: 1,
        borderDash: [5, 5],
        backgroundColor: 'rgba(136, 151, 170, 0.1)',
        borderColor: '#8897aa'
      }],
    },
    options: {
      scales: {
        xAxes: [{
          gridLines: {
            display: false
          },
          ticks: {
            fontColor: '#aaa',
            autoSkipPadding: 50
          }
        }],
        yAxes: [{
          gridLines: {
            display: false
          },
          ticks: {
            fontColor: '#aaa',
            maxTicksLimit: 5
          }
        }]
      },

      responsive: false,
      maintainAspectRatio: false
    }
  });
  
  
  var chart6 = new Chart(document.getElementById('statistics-chart-6').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($section_label); ?>],
      datasets: [{
        data: [<?php print_r($section_Total); ?>],
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'right',
        labels: {
          boxWidth: 12
        }
      },
      responsive: false,
      maintainAspectRatio: false
    }
  });

  
  var chart8 = new Chart(document.getElementById('statistics-chart-8').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($category_label); ?>],
      datasets: [{
        data: [<?php print_r($category_Total); ?>],
       backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#edfd5e'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'left',
        labels: {
          boxWidth: 12
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });
  
   var chart7 = new Chart(document.getElementById('statistics-chart-7').getContext("2d"), {
    type: 'bar',
	
    data: {
		labels: [<?php //print_r($subcategory_label);  ?>],
        datasets: [{
        data: [<?php //print_r($subcategory_Total);  ?> ],
        borderWidth: 0,
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
      }],
      
    },

    options: {
      scales: {
        xAxes: [{
          display: true,
        }],
        yAxes: [{
          display: true
        }]
      },
      legend: {
        display: true
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });

 var chart_7 = new Chart(document.getElementById('statistics-chart_7').getContext("2d"), {
    type: 'bar',
	
    data: {
		labels: [<?php //print_r($subcategory_label);  ?>],
        datasets: [{
        data: [<?php //print_r($subcategory_Total);  ?> ],
        borderWidth: 0,
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
      }],
      
    },

    options: {
      scales: {
        xAxes: [{
          display: true,
        }],
        yAxes: [{
          display: true
        }]
      },
      legend: {
        display: true
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });


 var chart9 = new Chart(document.getElementById('statistics-chart-9').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($newcategory_wise_labelo); ?>],
      datasets: [{
        data: [<?php print_r($newcategory_wise_Totalo); ?>],
       backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'left',
        labels: {
          boxWidth: 12
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });

  var chart10 = new Chart(document.getElementById('statistics-chart-10').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($newsubcategory_order_label); ?>],
      datasets: [{
        data: [<?php print_r($newsubcategory_order_Total); ?>],
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'left',
        labels: {
          boxWidth: 12
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });

  
   var chart11 = new Chart(document.getElementById('statistics-chart-11').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($category_s_label); ?>],
      datasets: [{
        data: [<?php print_r($category_s_Total); ?>],
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'left',
        labels: {
          boxWidth: 12
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });

  var chart12 = new Chart(document.getElementById('statistics-chart-12').getContext("2d"), {
    type: 'pie',
    data: {
      labels: [<?php print_r($subcategorys_s_label); ?>],
      datasets: [{
        data: [<?php print_r($subcategorys_s_Total); ?>],
        backgroundColor: ['rgba(99,125,138,0.5)', 'rgba(28,151,244,0.5)', 'rgba(2,188,119,0.5)','rgba(99,425,338,0.5)','#ffd900'],
        borderColor: ['#647c8a', '#2196f3', '#02bc77', '#23bc77','#ffd900'],
        borderWidth: 1
      }]
    },

    options: {
      scales: {
        xAxes: [{
          display: false,
        }],
        yAxes: [{
          display: false
        }]
      },
      legend: {
        position: 'left',
        labels: {
          boxWidth: 12
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  });

  $('#ex-stats').DataTable();
  
  });
  </script>
</body>

</html>