<?php include('nheader.php') ?>
    <div class="osahan-breadcrumb">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                       
                     </ol>
                  </div>
               </div>
            </div>
    </div>
 <!-- start order list view -->
        
      <section class="shopping_cart_page">
       
           <?php
           $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
           $this->db->where("id",$customer_id);
           $my=$this->db->get("customer_data");
           $myh=$my->row();

           ?> 
 
         <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-3">
                     <div class="element_page_sidebar">
                            <center> 
                            <a href="#">
                            <img class="rounded-circle" src="<?= base_url() ?>clothesimage/<?= $myh->img?>" width="70%" alt="Bannar 1">
                            </a>
                          </center>
                            <hr>
                          <div class="element_page_sidebar">
                             <div class="list-group">
                                <a href="<?= base_url() ?>index.php/customer/customer_profile" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-user"></i> MY PROFILE</a>
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/order_list" class="list-group-item list-group-item-action active"><i class="icofont icofont-ui-social-link"></i> Order List</a>
                                  <a href="profilephoto" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHANGE PROFILE PHOTO</a>
                                 <a href="change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-password"></i> ORDER STATUS</a>
                                 <a href="mycomplaint" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> MY COMPLAINT</a>
                                <a href="my_fees" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> INVOICE </a>
                                <a href="student_logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> LOGOUT</a>
                             </div>
                          </div>
                      </div>
                </div> 
                 <?php
                $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
               $this->db->select("customer_cart.*,customer_address.*");
               $this->db->from("customer_cart");
               $this->db->join("customer_address","customer_address.id=customer_cart.address");
              
               $my=$this->db->get();
               $my=$my->row();
               
              
                 ?>

               <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                           Order Status
                        </h5>
                     </div>
                     <div class="status-main">
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <h4 class="block-title-border"> Your Order Status </h4>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="statustop">
                                 <p><strong>Status:</strong> <?= $order_status?></p>
                                 <p><strong>Order Date:</strong> <?= $date?></p>
                                 <p><strong>Order Number:</strong>  <?= $order_id?> </p>
                                 <br> 
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Billing Address 
                                 </div>
                                 <div class="card-body">
                                    <p class="card-text"><strong><?= $my->customer_name?></strong></p>
                                    <p class="card-text"><strong><?= $my->customer_mobile?></strong></p>
                                     <p class="card-text"><strong><?= $my->customer_alt_mobile?></strong></p>
                                    <p class="card-text"> <?= $my->customer_address?><br>
                                      <p class="card-text"> <?= $my->customer_city ?>
                                      <p class="card-text"> <?= $my->customer_state ?>
                                      <?= $my->customer_zip_code?>

                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Shipping Address  
                                 </div>
                                 <div class="card-body">
                                    <p class="card-text"><strong><?= $my->customer_name?></strong></p>
                                     <p class="card-text"><strong><?= $my->customer_mobile?></strong></p>
                                    <p class="card-text"><strong><?= $my->customer_alt_mobile?></strong></p>
                                    <p class="card-text"> <?= $my->customer_full_address?>
                                      <p class="card-text"> <?= $my->customer_city ?>
                                      <p class="card-text"> <?= $my->customer_state ?>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Payment & Shipping Method  
                                 </div>
                                 <div class="card-body">
                                    <p class="card-text">Payment via Paytm Or UPI <strong><span class="badge badge-success">Paid/Comfirm By Seller</span></strong></p>
                                    <p class="card-text"><strong>Name Of Paymenter </strong>: <?= $my->customer_name?></p>
                                    <p class="card-text"><strong>Mobile Number </strong>: <?= $my->customer_mobile?>,  <?= $my->customer_alt_mobile?></p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Seller Detail   
                                 </div>
                                 <div class="card-body">
                                 <?php $this->db->select("customer_cart.*,add_clothes.*");
                                   $this->db->from("add_clothes");
                                   $this->db->join("customer_cart","customer_cart.order_id=add_clothes.id");
                                   
                                   $my=$this->db->get();
                                   $mys=$my->row();
                                   
                                     ?>
                                     
                                     <p class="card-text"><strong>Seller id </strong>: <?= $mys->seller_id?></p>
                                     <p class="card-text"><strong>Name </strong>: <?= $mys->seller_name?></p>
                                     <p class="card-text"><strong>Email </strong>: <?= $m->email ?></p>
                                      
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <div class="card">
                                 <div class="card-header">
                                    Order Items  
                                 </div>
                                 <div class="card-block padding-none">
                                    <table class="table cart_summary table-responsive">
                                       <thead>
                                          <tr>
                                             <th class="cart_product">Product</th>
                                             <th>Description</th>
                                             <th>Avail.</th>
                                             <th>Unit price</th>
                                             <th>Total</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                    <td class="cart_product"><a href="#"><img class="img-fluid" src="<?= base_url() ?>clothesimage/<?=$mys->img?>" alt="Product"></a></td>
                                             <td class="cart_description">
                                              <p class="product-name"><a href="#"><?= $mys->cloth_name?> </a></p>
                                              <small><a href="#">Qty :<?= $quantity ?> </a></small>
                                              <small><a href="#">Size : <?= $mys->cloth_size?></a></small>
                                             </td>
                                              
                                             <?php if($mys->active_cloth=='1') 
                                             {
                                              
                                             ?>
                                             <td class="availability in-stock"><span class="badge badge-success">In Stock</span></td>
                                             <?php }else { ?>
                                              <td class="availability in-stock"><span class="badge badge-danger">Out Of Stock</span></td>
                                              <?php } ?>
                                             <td class="price"><span>$<?= $mys->box_price?></span></td>
                                             <td class="price"><span>$<?= $total?></span></td>
                                          </tr>
                                          
                                       </tbody>
                                       <tfoot>
                                          <tr>
                                             <td colspan="4">Total products (tax incl.)</td>
                                             <td colspan="1">$<?= $total?>.00 </td>
                                          </tr>
                                          <tr>
                                             <td colspan="4"><strong>Total</strong></td>
                                             <td colspan="1"><strong>$<?= $total?>.00 </strong></td>
                                          </tr>
                                       </tfoot>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

 <!-- start order list view -->

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
<?php include('footer.php') ?>