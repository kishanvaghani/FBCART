<?= include('nheader.php'); ?>
      <div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Pages</a></li>
                     <li class="breadcrumb-item active">Page Name</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <section class="products_page">
         <div class="container">
         <div class="row">
            
            <div class="col-lg-5 col-md-5">
               <div class="shop-detail-left">
                  <?php 
             foreach ($clothes->result() as $row)
              {
               ?>

                  <div class="item-img-grid">
                     <div class="favourite-icon">
                        <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Save Ad">115 <i class="fa fa-heart"></i></a>
                     </div>
                     <div id="sync1" class="owl-carousel">
                        <div class="item"><img alt="smaple images" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class=""></div>
                        <div class="item"><img alt="smaple images" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center">
                        </div>
                        
                     </div>
                     <div id="sync2" class="owl-carousel">
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                        <div class="item"><img alt="" src="<?= base_url(); ?>clothesimage/<?= $row->img?>" class="img-responsive img-center"></div>
                     </div>
                  </div>
                  <?php
               }
               ?>
               </div>
               
            </div>
            <div class="col-lg-7 col-md-7">
               <div class="shop-detail-right">
                  <div class="widget">
                     <div class="product-name">
                        <p class="text-danger text-uppercase"><i class="icofont icofont-jersey"></i>
                           Clothing 
                        </p>
                        <h1><?= $row->cloth_name?></h1>
                        <span>Product code: <b><?= $row->id?></b> | Sold by: <strong class="text-info"><?= $row->seller_name ?></strong> ( Supplied By Partner )</span>
                     </div>
                     <div class="price-box">
                        <h5>
                           <span class="product-desc-price">$<?= $row->cloth_value ?>.00</span>
                           <span class="product-price text-danger">Special Price <i class="icofont icofont-price"></i> $<?= $row->cloth_value?>.00</span>
                           <span class="badge badge-default">50% Off</span>
                        </h5>
                     </div>
                     <div class="ratings">
                        <div class="stars-rating">
                           <i class="icofont icofont-star active"></i>
                           <i class="icofont icofont-star active"></i>
                           <i class="icofont icofont-star"></i>
                           <i class="icofont icofont-star"></i>
                           <i class="icofont icofont-star"></i> <span>(613)</span>
                           <span class="rating-links pull-right"> <a href="#">1 Review(s)</a> <span class="separator"> </span> <a href="#"><i class="icofont icofont-comment"></i>   Add Your Review</a> </span>
                        </div>
                     </div>
                     <?php $status=$row->active_cloth ?>
                  <?php if ($status==1) 
                     {   ?>

                     <div class="short-description">
                        <h4>
                           Quick Overview  
                           <p class="pull-right">Availability: <span class="badge badge-success">In Stock</span></p>
                        </h4>
                        <p><b><?= $row->cloth_desc?>
                        </p>
                     </div>
                  <?php } else { ?>
                     <div class="short-description">
                        <h4>
                           Quick Overview  
                           <p class="pull-right">Availability: <span class="badge badge-danger">Out Of Stock</span></p>
                        </h4>
                        <p><b><?= $row->cloth_desc?>
                        </p>
                     </div>
                     <?php } ?>
                     <script type="text/javascript">

                    function Calculatearea()
                    {
                     
                     var boxprize=<?php echo $row->cloth_value;?>;
                     var txt2 = document.getElementById("box").value;
                     
                     
                     finalprize.innerText = parseInt(txt2)*boxprize;

                    }
                   
                    </script>
                      
                    
                     <?php echo form_open_multipart('customer/cart/add_to_cart') ?>

                        <div class="product-color-size-area row">
                        <div class="color-area col-lg-3 col-md-3">
                           <h4>Select Size</h4>
                           <div class="input-group-btn">
                              <select class="custom-select " name="cloth_size" id="inlineFormCustomSelect">
                                 <option value="s" selected>S</option>
                                 <option value="m">M</option>
                                 <option value="l">L</option>
                                 <option value="xl">XL</option>
                                 <option value="xxl">XXL</option>
                                 <option value="xxxl">XXXL</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6">
                              <div class="form-group">
                                 <h4>Available Size</h4>
                                  <button type="button" class="btn btn-secondary"><?= $row->clothes_size ?></button>
                              </div>
                           </div>

                     </div>

                     <div class="product-variation">
                          <div class="form-row align-items-center">
                           <div class="col-auto">
                              <div class="input-group mb-2 mb-sm-0">
                                 <div class="input-group-addon"> <strong> Quantity</strong></div>
                                 <input type="number" name="quantity" id="box" value="01" class="form-control" placeholder="Box Quantity" onchange="javascript:Calculatearea()" >
                              </div>
                           </div>
                        </div>          
                    </div>
                    <?php $status=$row->active_cloth?>
                     <?php if ($status==0) {
                      ?>
                      <a type="submit" class="add_cart btn btn-theme-round btn-lg" name="submit" value="Addtocart"><i class="icofont icofont-shopping-cart"></i>Notify Me </a>
                        <?php } else
                         { 
                           ?>


                     <div class="product-variation">
                          
                        <input type="hidden" name="order_id" value="<?= $row->id?>">
                        <input type="hidden" name="cloth_name" value="<?= $row->cloth_name?>">
                        <input type="hidden" name="cloth_desc" value="<?= $row->cloth_desc?>">
                        <input type="hidden" name="img" value="<?= $row->img?>">

                        <input type="hidden" name="box_price" value="<?= $row->cloth_value?>">
                        <input type="hidden" name="status" value="<?= $row->active_cloth?>">
                        <div class="form-row align-items-center">
                          <h2>Total Prize: <strong><i class="fa fa-inr"> </i> <label id="finalprize" name="box_price"><?= $row->cloth_value ?>.00</label></strong></h2>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         
                        
                     
                   <button type="submit" class="add_cart btn btn-theme-round btn-lg" name="submit" value="buy"><i class="icofont icofont-shopping-cart"></i>Add Cart </button>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                      <button type="submit" class="add_cart btn btn-theme-round btn-lg" name="submit" value="buy"><i class="icofont icofont-shopping-cart"></i>BUY NOW</button>
                                     
                     </div>
                  <?php }?>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="reviews-section">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">
                  Ratings & Reviews  
               </h5>
            </div>
            <div class="row">
              
               <div class="col-sm-12 col-md-4">
                  <div class="widget reviews-section-add-review">
                     <h4>Your Review</h4>
                     <h2 class="bold">Have you used this product?</h2>
                     <button type="button" class="btn btn-outline-info btn-lg"><i class="icofont icofont-comment"></i>
                     Add Your Review</button>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="widget reviews-section-comment mb18">
                     <div class="row">
                        <div class="col-sm-3">
                           <img class="review-block-image" src="images/users/1.jpg" class="img-rounded">
                           <div class="review-block-name"><a href="#"><i class="icofont icofont-ui-user"></i> Gurdeep Osahan</a></div>
                           <div class="review-block-date"><i class="icofont icofont-ui-calendar"></i> January 29, 2018 | 1 Day ago</div>
                        </div>
                        <div class="col-sm-9">
                           <div class="review-block-title">
                              <span class="stars-rating">         
                               <i class="icofont icofont-star active"></i>                                     
                               <i class="icofont icofont-star"></i>                                     
                               <i class="icofont icofont-star"></i>                                     
                               <i class="icofont icofont-star"></i>                                     
                               <i class="icofont icofont-star"></i>  									 									            </span>
                              Perfect For This Summer <span class="text-success"><i class="icofont icofont-check-circled"></i> Verified Buyer</span>
                           </div>
                           <div class="review-block-description">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </div>
                        </div>
                     </div>
                     <hr/>
                     
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           Leave Review
                        </h5>
                     </div>
                      
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Your Name <span class="required">*</span></label>
                                 <input class="form-control border-form-control" name="name"  placeholder="Enter Name" type="text">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Email Address <span class="required">*</span></label>
                                 <input class="form-control border-form-control " name="email"  placeholder="ex@gmail.com" type="email">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Subject <span class="required">*</span></label>
                                 <input class="form-control border-form-control" name="subject"  placeholder="Subject" type="text">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label" >Rating <span class="required">*</span></label>
                                 <select  class="select2 form-control border-form-control" name="star">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Review <span class="required">*</span></label>
                                 <textarea class="form-control border-form-control" name="review"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 text-right">
                              <button type="submit"  value="reset" class="btn btn-outline-danger btn-lg"> Cencel </button>
                              <button type="submit" name="submit" value="review" class="btn btn-outline-success btn-lg"> Submit Review </button>
                           </div>
                        </div>
                  
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
                     <img alt="" src="images/footer-logo.png" class="img-responsive">
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
                     <p>© Copyright 2018 Osahan Fashion.&nbsp; | &nbsp;Made with <i class="fa fa-heart"></i>
                        by
                        <a target="_blank" href="https://www.facebook.com/iamgurdeeposahan">
                        <strong>Osahan Studio</strong>
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
      <section class="footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 text-left">
                  <div class="payment-menthod">
                     <img alt="" src="images/payment_methods.png">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 text-right">
                  <strong>Download App &nbsp; </strong>
                  <a href="#"><img alt="" src="images/app-store.png"></a>
                  <a href="#"><img alt="" src="images/google-play.png"></a>
               </div>
            </div>
         </div>
         <?= include("footer.php")?>

