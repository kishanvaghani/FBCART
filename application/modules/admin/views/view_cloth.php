<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Osahan Fashion - Bootstrap 4 E-Commerce Theme">
      <meta name="keywords" content="Osahan, fashion, Bootstrap4, shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
      <meta name="author" content="Askbootstrap">
      <title>FBCART | Admin</title>
      <!-- Favicon Icon -->
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>admindata2/images/apple-icon.png">
      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>admindata2/images/favicon.png">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url(); ?>admindata2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo base_url(); ?>admindata2/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/animate.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>admindata2/css/mobile.css" rel="stylesheet">
      <!-- Font Icons -->
      <link href="<?php echo base_url(); ?>admindata2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>admindata2/css/icofont.css" rel="stylesheet" type="text/css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>admindata2/plugins/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>admindata2/plugins/owl-carousel/owl.theme.css">
   </head>
   <body>
      
       <section class="element_page">
               <div class="row-lg-4 row-md-4">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           Cards 
                        </h5>
                     </div>
                     <?php foreach($clothdata->result() as $row)
                      {
                     ?>
                     <div class="col-lg-4">
                        <div class="row-lg-4 row-md-4">
                           <div class="img-fluid">
                             
                              <img class="card-img-top img-fluid"  style="width: 300px; height: 150px; " alt="Image cap [100%x180]" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" >
                              <hr>
                              <div class="card-body">
                                 <h3 class="card-title">Name:- <?= $row->cloth_name ?></h4>
                                  
                                 <p class="card-title">Price:- $<?= $row->cloth_value?>.00</p>

                                 <button type="button" style="grid-column-end: " class="btn btn-primary btn-round" href="<?= base_url()?>index.php/warden/view_student/; ?>">Change</button>
                                 <a type="button" style="grid-column-end:" class="btn btn-primary btn-round" href="<?= base_url()?>index.php/admin/add_clothes/delete_img?id=<?= $row->id ?>">Delete</a>

                              </div>
                              <hr>
                              <hr>
                           </div>
                        </div>
                        
                     </div>
                     <?php }?>
                  </div>
               </div>       
      </section>     
      <!-- Bootstrap Core JavaScript -->
      <script src="<?php echo base_url(); ?>admindata2/js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>admindata2/js/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>admindata2/plugins/tether/tether.min.js"></script>
      <script src="<?php echo base_url(); ?>admindata2/js/bootstrap.min.js"></script>
      <!-- Custom js -->
      <script src="<?php echo base_url(); ?>admindata2/js/custom.js"></script>
      <!-- Select2 -->
      <link href="<?php echo base_url(); ?>admindata2/plugins/select2/css/select2.min.css" rel="stylesheet" />
      <script src="<?php echo base_url(); ?>admindata2/plugins/select2/js/select2.min.js"></script>
      <!-- Owl Carousel -->
      <script src="<?php echo base_url(); ?>admindata2/plugins/owl-carousel/owl.carousel.js"></script>
   </body>
</html>