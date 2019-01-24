<?php $logsession=$this->session->userdata('logsession'); ?><div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

        <!-- Brand demo (see assets/css/demo/demo.css) -->
        <div class="app-brand demo">
          <span class="app-brand-logo demo bg-primary">
            <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
          </span>
          <a href="#" class="app-brand-text demo sidenav-text font-weight-normal ml-2">greenhandle</a>
          <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
          </a>
        </div>
<?php  print_r($logsession); ?>
        <div class="sidenav-divider mt-0"></div>

        <!-- Links -->
        <ul class="sidenav-inner py-1">
          <li class="sidenav-item open active">
            <a href="<?= ADMIN_PATH.'dashboard'?>" class="sidenav-link ">
              <i class="fas fa-tachometer-alt d-block"></i>&nbsp;&nbsp;
              <div>Dashboards</div>
            </a>
          </li>

          <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'order_details/order'?>" class="sidenav-link">
              <i class="fas fa-shopping-cart d-block"></i>&nbsp;&nbsp;
              <div>Order&nbsp;(R)</div>
            </a>
          </li>

          <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'seller_accounts'?>" class="sidenav-link">
              <i class="fas fa-people-carry d-block"></i>&nbsp;&nbsp;
              <div>Seller Accounts&nbsp;(R)</div>
            </a>
          </li>

           <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'buyer_accounts'?>" class="sidenav-link">
              <i class="fas fa-user d-block"></i>&nbsp;&nbsp;
              <div>Buyer Accounts&nbsp;(R)</div>
            </a>
          </li>
          

          <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'product_catalog'?>" class="sidenav-link">
              <i class="fas fa-shopping-bag d-block"></i>&nbsp;&nbsp;
              <div>Product Catalog&nbsp;(R)</div>
            </a>
          </li>

            <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'enquiry'?>" class="sidenav-link">
              <i class="fas fa-envelope d-block"></i>&nbsp;&nbsp;
              <div>Enquiry&nbsp;(R)</div>
            </a>
          </li>

            <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'bids/create_bid'?>" class="sidenav-link">
              <i class="sidenav-icon ion ion-md-cube"></i>
              <div>Post Bid</div>
            </a>
          </li>

          <!--  <li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'bids'?>" class="sidenav-link">
              <i class="sidenav-icon ion ion-md-cube"></i>
              <div>Bids</div>
            </a>
          </li> -->
<li class="sidenav-item">
            <a href="<?= ADMIN_PATH.'Coupon'?>" class="sidenav-link">
              <i class="sidenav-icon ion ion-md-cube"></i>
              <div>Discount & Offers</div>
            </a>
          </li>


        </ul>
      </div>