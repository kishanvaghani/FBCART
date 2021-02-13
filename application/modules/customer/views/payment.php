<?php include('nheader.php') ?>

 <section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="checkout-step mb-40">
                     <ul>
                        <li>
                           <a href="<?= base_url()?>index.php/customer/cart/shipping_address">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">1</div>
                              </div>
                              <span>Shipping</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?= base_url()?>index.php/customer/cart/order_overview">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">2</div>
                              </div>
                              <span>Order Overview</span>
                           </a>
                        </li>
                        <li class="active">
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">3</div>
                              </div>
                              <span>Payment</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">4</div>
                              </div>
                              <span>Order Complete</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-8 col-md-8 mx-auto">
                  <div class="widget">
                     <div class="section-header section-header-center text-center">
                        <h3 class="heading-design-center-h3">
                          Payment Method Avaible Soon.....
                        </h3>
                     </div>

                     <form class="col-lg-8 col-md-8 mx-auto">
                        <div class="payment-menthod text-center">
                           
                        </div>
                        <div class="form-group">
                           <label class="control-label">Any Query About Clothes</label>
                           <input class="form-control" placeholder="Please Enter Your Query Type Here" type="text" disabled="disabled">
                        </div>
                        
                        <p><strong>Pick Up Your Phone When We Trying To Calling You..</strong></p>
                        <a href="<?= base_url() ?>index.php/customer/cart/cart_done" class="btn btn-theme-round btn-lg pull-right">PLACE ORDER</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php include('footer.php') ?>