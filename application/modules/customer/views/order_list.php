
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
                                  <a href="<?= base_url() ?>index.php/customer/customer_profile/profile_photo" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> CHANGE PROFILE PHOTO</a>
                                 <a href="<?= base_url() ?>index.php/customer/customer_profile/change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-password"></i> CHANGE PASSWORD</a>
                                 <a href="<?= base_url() ?>index.php/customer/customer_profile" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> MY COMPLAINT</a>
                                
                                <a href="<?= base_url() ?>index.php/customer/authenticate/logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> LOGOUT</a>
                             </div>
                          </div>
                      </div>
                </div> 
               <div class="col-lg-9 col-md-9 mx-auto">
                  <div class="widget">
                     <div class="section-header">
                        <h3 class="heading-design-h5">
                           Cart
                        </h3>
                     </div>
                     <div class="table-responsive">
                      <table class="datatabel table table-striped table-bordered order-list-tabel table-responsive" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Order #</th>
                                 <th>Cloth Name</th>
                                 <th>Date Purchased</th>
                                 <th>Qty</th>
                                 <th>Status</th>
                                 <th>Total</th>
                                 <th>View</th>
                                 <th>Cancel</th>
                                 <th>Invoice</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $k=1;
                              foreach($customer->result() as $row)
                                if ($row->order_status=="waiting" OR $row->order_status=="deliver" OR $row->order_status=="cancel") 
                                {
                                {
                                ?> 
                                <tr>
                                   <td><?= $k; ?></td>
                                   <td><?= $row->id?>-<?= $row->order_id?></td>
                                   <td><?= $row->cloth_name?></td>
                                   <td><?= $row->date?></td>
                                   <td><?= $row->quantity?></td>
                                   <td><span class="badge badge-success" style=" font-size: 11px;" > <?= $row->order_status ?></span></td>
                                   <td>$<?=$total=($row->quantity)*($row->box_price); ?></td>
                                   <td><a data-toggle="tooltip" data-placement="top" title="" href="<?= base_url() ?>index.php/customer/customer_profile/view_detail? order_id=<?= $row->order_id?> &id=<?= $row->id?>& cloth_name=<?= $row->cloth_name?>&date=<?= $row->date?>& quantity=<?=$row->quantity?>& address=<?= $row->address ?> & order_status=<?= $row->order_status?> & total=<?= ($row->quantity)*($row->box_price); ?> & box_price=<?= $row->box_price ?> & size=<?= $row->cloth_size ?> & img=<?= $row->img ?> " data-original-title="View Detail" class="btn btn-theme-round btn-sm"><i class="icofont icofont-eye-alt"></i></a></td>
                                   

                                   <?php if ($row->order_status=="cancel" ) {
                                   ?>
                                   <td></td>
                                   <td></td>

                                       <?php }elseif ($row->order_status=="deliver") 
                                       { ?>
                                      <td></td>

                                      <td><a type="button" href="<?= base_url() ?>index.php/customer/customer_profile/invoice? order_id=<?= $row->order_id?> &id=<?= $row->id?>& cloth_name=<?= $row->cloth_name?>&date=<?= $row->date?>& quantity=<?=$row->quantity?>& address=<?= $row->address ?> & order_status=<?= $row->order_status?> & total=<?= ($row->quantity)*($row->box_price); ?> & box_price=<?= $row->box_price ?> & size=<?= $row->cloth_size ?> & img=<?= $row->img ?> " class="btn btn-outline-info btn-round">Dow</a></td>
                                    </tr>
                                    <?php } else { ?>


                                      <td><a type="button" href="<?= base_url() ?>index.php/customer/customer_profile/cancel_order?id=<?= $row->id?> & order_id=<?= $row->order_id?>" class="btn btn-outline-info btn-round">Cancel</a></td>
                                      <td></td>

                                    <?php }?>
                              

                              

                             <?php 
                             $k=$k+1;
                                
                                }
                                }
                                ?>
                           </tbody>
                        </table>
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