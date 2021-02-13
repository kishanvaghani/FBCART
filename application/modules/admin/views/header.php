<!DOCTYPE html>
<html>
<head>
   <?php

  if(isset($this->session->userdata['seller_logged_in']))
  {
    
  }else
  {
    redirect('admin/login');
  }
  ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FBCART | Seller</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/dist/css/skins/_all-skins.min.css">


   <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/bower_components/select2/dist/css/select2.min.css">
   <link rel="icon" type="image/gif/png" href="<?= base_url()?>images/l.ico">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admindata1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>FB</b>CART</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>FB</b>CART</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            
          <li class="dropdown user user-menu">
    
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
          <a href="<?= base_url() ?>index.php/admin/profile/seller_profile"> 
          <img  src="<?= base_url() ?>admindata1/dist/img/avatar.png" class="img-circle" style="width: 40px; height: 40px;" alt="User Image">
          </a>
        </div>
      </div>
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" >
        <li class="header">MAIN NAVIGATION</li>

        <li >
          <a href="<?= base_url()?>index.php/admin/home">
            <i class="fa fa-home"></i> <span>Home</span>
         </a>
         </li>
         <li >
          <a href="<?= base_url()?>index.php/admin/add_clothes">
            <i class="fa fa-child "></i> <span>Add Clothes</span>
         </a>
         </li>
          <li>
          <a href="<?= base_url()?>index.php/admin/add_clothes/view_clothes">
            <i class="fa fa-child "></i> <span>View Clothes</span>
         </a>
         </li>
         <li>
          <a href="<?= base_url()?>index.php/admin/order_detail">
            <i class="fa fa-child "></i> <span>Pending Order</span>
         </a>
         </li>
         <li>
          <a href="<?= base_url()?>index.php/admin/order_detail/deliver_order">
            <i class="fa fa-child "></i> <span>Deliver Order</span>
         </a>
         </li>
         <li>
          <a href="<?= base_url()?>index.php/admin/order_detail/cancel_order">
            <i class="fa fa-child "></i> <span>Cancel Order</span>
         </a>
         </li>
         <li>
          <a href="<?= base_url()?>index.php/admin/login/logout">
           <i class="fa fa-power-off"></i> <span>Logout</span>
           </a>
         </li>
      </ul>
    </section>
    
    <!-- /.sidebar -->
  </aside>
   