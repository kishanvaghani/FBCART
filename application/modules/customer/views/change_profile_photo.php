
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
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/order_list" class="list-group-item list-group-item-action "><i class="icofont icofont-ui-social-link"></i> Order List</a>
                                  <a href="<?= base_url() ?>index.php/customer/customer_profile/profile_photo" class="list-group-item list-group-item-action active"><i class="icofont icofont-all-caps"></i> CHANGE PROFILE PHOTO</a>
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-password"></i> CHANGE PASSWORD</a>
                                 <a href="<?= base_url() ?>index.php/customer/customer_profile" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> MY COMPLAINT</a>
                               
                                <a href="<?= base_url() ?>index.php/customer/authenticate/logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> LOGOUT</a>
                             </div>
                          </div>
                      </div>
                </div> 
                <div class="col-lg-8 col-md-8 col-sm-7">
                  <div class="widget">
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                          Upload
                        </h5>
                     </div>
                     <div class="status-main">
                      <div class="alert alert-info" role="alert">
                       File Format : JPG | PNG | GIF <br/>
                       Maximum Image and Size Size : 100KB <br/>
                       Maximum Image and Sign Width : 250px <br/>
                       Maximum Image and Sign Height : 250px
                     </div>
                        
                        <?php 
                         if(isset($error))
                           {                           
                            ?>
                            <div class="alert alert-danger" role="alert">
                                 <?php  echo $error; ?>
                            </div>
                           <?php 
                            }
                           ?>
                     <?php if($this->session->flashdata('flashSuccess'))
                      {
                      ?>
                      <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                      <?php } ?>
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Upload Photo
                                 </div>
                                 <?php 
                                

                                 ?>  
                                 
                                 <div class="card-body">
                                    <label class="custom-file">
                                    <?php echo form_open_multipart('customer/Customer_profile/profile_photo');?>
                                    <input type="file" id="file" class="custom-file-input" name="cphoto" required>
                                    <span class="custom-file-control"></span>
                                  
                                    </label>
                                    <br/>  <br/> 
                                    <input type="submit" class="btn btn-outline-primary" name="submit" value="Upload Photo"/>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                 Photo 
                                 </div>
                                 <div class="card-body">
                                  <center>
                                     <img src="<?php echo base_url(); ?>clothesimage/<?= $myh->img ?>" class="rounded" alt="Sample image">
                                     </center>
                                    </p>
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