<?php $this->load->view('header.php'); ?>
   
      <div class="owl-carousel owl-carousel-slider">
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url(); ?>admindata2/images/slider/slider3.jpg" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url(); ?>admindata2/images/slider/slider1.jpg" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="#"><img class="d-block img-fluid" src="<?= base_url(); ?>admindata2/images/slider/slider2.jpg" alt="First slide"></a>
         </div>
      </div>
      <!-- Featured Products -->
      <section class="featured-products">
         <div class="container">
            <div class="row">
              
            </div>
         </div>
      </section>
      <!-- End Featured Products -->
      <section class="categories-list">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-4 col-sm-5">
                  <div class="widget">
                     <div class="widget-header">
                        <small>98,156 Items</small>
                        <h1><i class="icofont icofont-man-in-glasses"></i> Men's Fashion</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-boot"></i> Footwear <span class="item-numbers">155</span></a></li>
                           <li><a href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-bag"></i> Bags & Luggage <span class="item-numbers">80</span></a></li>
                           
                           <li><a href="<?= base_url() ?>index.php/customer/authenticate/login"><strong>Show More </strong><i class="icofont icofont-bubble-right"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>

               <!--  DYNAMIC IMAGE SET -->
             
             
               <div class="col-lg-9 col-md-8 col-sm-7">
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                        <?php
                         foreach($clothes->result() as $row)
                         {
                        ?> 
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>  
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="<?= base_url(); ?>index.php/customer/authenticate/login"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="<?= base_url() ?>index.php/customer/authenticate/login"><img class="card-img-top img-fluid" src="<?= base_url(); ?>clothesimage/<?= $row->img ?>" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#" ><?= $row->cloth_name?></a></h4>
                                    <h5>
                                       <span class="product-desc-price" id="change"></span>
                                       <span class="product-price" id="boxprize" >$<?= $row->cloth_value ?></span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i>
                                       <i class="icofont icofont-star"></i> <span>(415)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php  } ?>
                     </div>
                  </div>
               </div>
               
             
            </div>
         </div>
      </section>

      <section class="hot-offers">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <a href="#">
                  <img src="<?= base_url(); ?>admindata2/images/offers/home2_banner_2.jpg" alt="sample images">
                  </a>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <a href="#">
                  <img src="<?= base_url(); ?>admindata2/images/offers/home2_banner_3.jpg" alt="sample images">
                  </a>
               </div>
            </div>
         </div>
      </section>
      <section class="categories-list">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-4 col-sm-5">
                  <div class="widget">
                     <div class="widget-header">
                        <small>98,156 Items</small>
                        <h1><i class="icofont icofont-woman-in-glasses"></i> Women's Fashion</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><a href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-sandals-female"></i> Footwear <span class="item-numbers">155</span></a></li>
                           <li><a href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-jewlery"></i> Fashion Jewellery <span class="item-numbers">65</span></a></li>
                           
                           <li><a href="#"><strong>Show More </strong><i class="icofont icofont-bubble-right"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 col-md-8 col-sm-7">
                  <div class="single-categorie">
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
                        <?php 
                         foreach ($clothes->result() as $row)
                         {
                          ?>
                        <div class="item">
                           <div class="h-100">
                              <div class="product-item">
                                 <span class="badge badge-danger offer-badge">HOT</span>  
                                 <div class="product-item-image">
                                    <span class="like-icon"><a href="<?= base_url() ?>index.php/customer/authenticate/login"> <i class="icofont icofont-heart"></i></a></span>
                                    <a href="<?= base_url() ?>index.php/customer/authenticate/login"><img class="card-img-top img-fluid" src="<?= base_url(); ?>clothesimage/<?= $row->img ?>" alt=""></a>
                                 </div>
                                 <div class="product-item-body">
                                    <div class="product-item-action">
                                       <a data-toggle="tooltip" data-placement="top" title="Add To Cart" class="btn btn-theme-round btn-sm" href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-shopping-cart"></i></a>
                                       <a data-toggle="tooltip" data-placement="top" title="View Detail" class="btn btn-theme-round btn-sm" href="<?= base_url() ?>index.php/customer/authenticate/login"><i class="icofont icofont-search-alt-2"></i></a>
                                    </div>
                                    <h4 class="card-title"><a href="#"><?= $row->cloth_name?></a></h4>
                                    <h5>
                                       
                                       <span class="product-price">$<?= $row->cloth_value ?></span>
                                       <span class="product-discount">30% Off</span>
                                    </h5>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="product-item-size">
                                       <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                    </div>
                                    <div class="stars-rating">
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star active"></i>
                                       <i class="icofont icofont-star"></i> <span>(400)</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <section class="top-brands">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">Top Brands <span class="badge badge-primary">150+ Brands</span></h5>
            </div>
            <div class="row text-center">
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/1.jpg" alt=""></a>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/2.jpg" alt=""></a>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/3.jpg" alt=""></a>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/4.jpg" alt=""></a>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/5.jpg" alt=""></a>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2">
                  <a href="#"><img class="img-responsive" src="<?= base_url(); ?>admindata2/images/brands/6.jpg" alt=""></a>
               </div>
            </div>
         </div>
      </section>
      <footer>
         <section class="footer-Content">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3">
                     <div class="footer-widget">
                        <h3 class="block-title">About</h3>
                        <div class="textwidget">
                           <p>Our Purposee to connect with you and hope you like our Cloth.. Please enjoy your shopping
                           tour.. </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                     <div class="footer-widget">
                        <h3 class="block-title">Categories</h3>
                        <ul class="menu">
                           <li><a href="#"><span>562</span>  Footwear </a></li>
                           <li><a href="#"><span>451</span>  Luggage </a></li>
                           <li><a href="#"><span>352</span>  Clothing </a></li>
                           <li><a href="#"><span>312</span>  Eyewear </a></li>
                           <li><a href="#"><span>262</span>  Watches</a></li>
                          
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                     <div class="footer-widget">
                        <h3 class="block-title">Latest Post</h3>
                        <ul class="blog-footer">
                           <li>
                              <a href="#">Our Purpose to connect with you</a>
                              <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> March 12, 2020</span>
                           </li>
                           <li>
                              <a href="#">Abki Baar .....</a>
                              <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> September 25, 2020</span>
                           </li>
                           <li>
                              <a href="#">Perfect Cloth For Your Family..</a>
                              <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i> November 19, 2020</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3">
                     <div class="footer-widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">FAQ</a></li>
                           <li><a href="#">Careers</a></li>
                           <li><a href="#">Discount</a></li>
                           <li><a href="#">Categories</a></li>
                           <li><a href="#">Retunrs</a></li>
                           <li><a href="#">Team</a></li>
                           <li><a href="#">Contact</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Help</a></li>
                           <li><a href="#">Advertise With Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </footer>
      <section class="footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-8">
                  <div class="footer-logo pull-left hidden-xs">
                     <img alt="" src="<?= base_url(); ?>admindata2/images/footer-logo.png" class="img-responsive">
                  </div>
                  <div class="footer-links">
                     <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">New Collection</a></li>
                        <li><a href="#">Mens Collection</a></li>
                        <li><a href="#">Women Dresses</a></li>
                        <li><a href="#">Kids Collection</a></li>
                     </ul>
                  </div>
                  <div class="copyright">
                     <p>© Copyright 2020 DK Production.&nbsp; | &nbsp;Made with <i class="fa fa-heart"></i>
                        by
                        <a target="_blank" href="https://www.facebook.com/kishanvaghani">
                        <strong>DK Production|Studio</strong>
                        </a>
                     </p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 text-right">
                  <div class="social-icon">
                     <a href="#"><i class="fa fa-facebook"></i></a>
                     <a href="#"><i class="fa fa-twitter"></i></a>
                     <a href="#"><i class="fa fa-linkedin"></i></a>
                     <a href="#"><i class="fa fa-instagram"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      
<?php $this->load->view('footer.php'); ?>
