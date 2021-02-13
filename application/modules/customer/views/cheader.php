<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Osahan Fashion - Bootstrap 4 E-Commerce Theme">
      <meta name="keywords" content="Osahan, fashion, Bootstrap4, shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
      <meta name="author" content="Askbootstrap">
      <title>FB Cart- Online Shopping Ecommerce Website </title>
      <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
      <link rel="icon" type="image/png" href="images/favicon.png">
      <!-- Bootstrap core CSS -->
      <link href="<?= base_url(); ?>admindata2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?= base_url(); ?>admindata2/css/style.css" rel="stylesheet">
      <link href="<?= base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?= base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?= base_url(); ?>admindata2/css/mobile.css" rel="stylesheet">
      <!-- Font Icons -->
      <link href="<?= base_url(); ?>admindata2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url(); ?>admindata2/css/icofont.css" rel="stylesheet" type="text/css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?= base_url(); ?>admindata2/plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?= base_url(); ?>admindata2/plugins/owl-carousel/owl.theme.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
   </head>
   <body>
        

      <nav class="navbar navbar-light navbar-expand-lg bg-faded osahan-menu osahan-menu-top-4">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>index.php/customer/home"> <img src="<?= base_url(); ?>admindata2/images/logo.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarNavDropdown">
               <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
                  <div class="top-categories-search">
                     <div class="input-group">
                        <span class="input-group-btn categories-dropdown">
                           <select class="form-control">
                              <option selected="selected">All Categories</option>
                              <optgroup label="Men's">
                                 <option value="0">Footwear</option>
                                 
                              </optgroup>
                              <optgroup label="Women's">
                                 <option value="5">Fashion Jewellery </option>
                              </optgroup>
                           </select>
                        </span>
                        <input class="form-control" placeholder="Search products & brands" aria-label="Search products & brands" type="text">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="icofont icofont-search-alt-2"></i> Search</button>
                        </span>
                     </div>
                  </div>
               </div>

                <?php 
               if(isset($this->session->userdata['customer_logged_in']))
               {

               
               ?>
               <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                     <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icofont icofont-shopping-cart"></i>My Cart <small class="cart-value"><span class="cartcount"><?php echo count($this->cart->contents());  ?></span> </small>
                        </a>
                        
                     </li>
                     <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="" alt=""> Account
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-list-design">
                           <a class="dropdown-item" href="my-profile.html"><i class="icofont icofont-ui-user"></i> My Profile</a>
                           <a class="dropdown-item" href="my-address.html"><i class="icofont icofont-location-pin"></i> My Address</a>
                           <a class="dropdown-item" href="wishlist-user.html"><i class="icofont icofont-heart-alt"></i> Wish List <span class="badge badge-success">6</span></a>
                           <a class="dropdown-item" href="order-list.html"><i class="icofont icofont-list"></i> Order List</a>
                           <a class="dropdown-item" href="order-status.html"><i class="icofont icofont-truck-loaded"></i> Order Status</a>
                           <a class="dropdown-item" href="invoice.html"><i class="icofont icofont-paper"></i> Invoice A4</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="<?= base_url() ?>index.php/customer/authenticate/logout"><i class="icofont icofont-logout"></i> Logout</a>
                        </div>
                     </li>
                  </ul>
               </div>

               
               <?php }else
               {

               ?>
               <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                     <li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="<?= base_url() ?>index.php/customer/authenticate/login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icofont icofont-shopping-cart"></i>My Cart <small class="cart-value"><span class="cartcount"> ##</span> </small>
                        </a>
                        
                     </li>
                     <li class="list-inline-item">
                        <a  class="btn btn-outline-primary"  href="<?= base_url()?>index.php/customer/authenticate/login"><i class="icofont icofont-ui-user"></i> Sign In</a>
                     </li>
                  </ul>
               </div>

               <?php } ?>

               
              

               
            </div>
         </div>
      </nav>

      