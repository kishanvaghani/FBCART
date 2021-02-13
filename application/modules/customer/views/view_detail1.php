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
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/profile_photo" class="list-group-item list-group-item-action "><i class="icofont icofont-all-caps"></i> CHANGE PROFILE PHOTO</a>
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/change_password" class="list-group-item list-group-item-action"><i class="icofont icofont-ui-password"></i> CHANGE PASSWORD</a>
                                 <a href="<?= base_url() ?>index.php/customer/customer_profile/complaint" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> MY COMPLAINT</a>
                                <a href="<?= base_url() ?>index.php/customer/customer_profile/invoice" class="list-group-item list-group-item-action"><i class="icofont icofont-all-caps"></i> INVOICE </a>
                                <a href="<?= base_url() ?>index.php/customer/authenticate/logout" class="list-group-item list-group-item-action"><i class="icofont icofont-logout"></i> LOGOUT</a>
                             </div>
                          </div>
                      </div>
                </div> 

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
                                 <p><strong>Status:</strong> <span class="badge badge-success" style=" font-size: 13px;" ><?= $order_status?></span></p>
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
                                 <?php 
                                 $this->db->where("id",$address);
                                 $mya=$this->db->get("customer_address"); 
                                 $add=$mya->row();

                                 ?>

                                 <div class="card-body">
                                    <p class="card-text"><strong><?= $add->customer_name?></strong></p>
                                    <p class="card-text"><strong><?= $add->customer_mobile?></strong></p>
                                     <p class="card-text"><strong><?= $add->customer_alt_mobile?></strong></p>
                                    <p class="card-text"> <?= $add->customer_address?><br>
                                      <p class="card-text"> <?= $add->customer_city ?>
                                      <p class="card-text"> <?= $add->customer_state ?>
                                      <?= $add->customer_zip_code?>

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
                                    <p class="card-text"><strong><?= $add->customer_name?></strong></p>
                                     <p class="card-text"><strong><?= $add->customer_mobile?></strong></p>
                                    <p class="card-text"><strong><?= $add->customer_alt_mobile?></strong></p>
                                    <p class="card-text"> <?= $add->customer_full_address?>
                                      <p class="card-text"> <?= $add->customer_city ?>
                                      <p class="card-text"> <?= $add->customer_state ?>
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
                                    <p class="card-text"><strong>Name Of Paymenter </strong>: <?= $add->customer_name?></p>
                                    <p class="card-text"><strong>Mobile Number </strong>: <?= $add->customer_mobile?>,  <?= $add->customer_alt_mobile?></p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="card">
                                 <div class="card-header">
                                    Seller Detail   
                                 </div>
                                <div class="card-body">
                                   
                                    
                                    <p class="card-text"><strong>Seller Name </strong>: After Deliver</p>
                                    <p class="card-text"><strong>Mail id. </strong>:thetopper40@gmail.com </p>
                                 </div>
                                   
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
                                         <td class="cart_product"><a href="#"><img class="img-fluid" src="<?= base_url() ?>clothesimage/<?= $img?>" alt="Product"></a></td>
                                             <td class="cart_description">
                                              <p class="product-name"><a href="#"></a></p>
                                              <small><a href="#">Qty : <?= $quantity ?></a></small>
                                              <small><a href="#">Size :<?= $size?> </small>
                                             </td>
                                             
                                             
                                             <td class="availability in-stock"><span class="badge badge-success">In Stock</span></td>
                                             <td class="price"><span>$<?= $box_price ?></span></td>
                                             <td class="price"><span>$<?= $total ?></span></td>
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

  
      
<?php include('footer.php') ?>