<?php include('nheader.php') ?>

<section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="checkout-step mb-40">
                     <ul>
                        <li class="active">
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">1</div>
                              </div>
                              <span>Shipping</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">2</div>
                              </div>
                              <span>Order Overview</span>
                           </a>
                        </li>
                        <li>
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
                     <div class="list-group">
                      
                        <?php
                        if($addresss!='')
                        {
                        if($addresss->num_rows()>0)
                        {
                           ?>
                           <div class="section-header section-header-center text-center">
                        <h3 class="heading-design-center-h3">
                           Select Shipping Address
                        </h3>
                     </div>

						<?php foreach($addresss->result() as $row)
						{

						?>
              

						 <div class="col-lg-12 col-md-12 mx-auto">
                           <div class="card border-success">
                              <div class="card-body text-success">
                                 <h4 class="card-title"> <strong><?= $row->customer_name?></strong>&nbsp;&nbsp;<strong>Mobile: </strong> <?= $row->customer_mobile?> </h4>
                                 <p class="card-text">
                                 	 <?= $row->customer_address ?></br>
				                        <strong>City:</strong> <?= $row->customer_city?>&nbsp;&nbsp;
				                        <strong>State</strong> <?= $row->customer_state?>&nbsp;&nbsp;
				                        <strong>Pin Code:</strong> <?= $row->customer_zip_code ?><br/>
				                        <strong>Alternate Mobile Number:</strong> <?= $row->customer_alt_mobile ?><br/><br/>
				                       <a href="<?= base_url()?>index.php/customer/cart/shipping_address?edit=yes&address_id=<?= $row->id ?>" class="btn btn-info">EDIT ADDRESS</a>
				                        <a href="<?= base_url()?>index.php/customer/cart/delete_address/<?= $row->id?>" class="btn btn-danger">DELETE ADDRESS</a>
				                        
                                 </p>
                              </div>
                           <a href="<?= base_url()?>index.php/customer/cart/delivery_address/<?= $row->id?>" class="btn btn-success">DELIVERE HERE</a>
                               
                           </div>
                        </div>
                        <br/>
                        
                       
                       
                       

                        <?php }}else{ ?>
                       
                         <blockquote class="blockquote">
                        <p class="mb-0">Sorry ! No Address found for your account. Kindly Enter new address Here.</p>
                </blockquote>
                        <?php }} ?> 

                   <div class="section-header section-header-center text-center">
                        <h3 class="heading-design-center-h3">
                           Enter New Address
                        </h3>
                     </div>
                       
                     </div>
                     <?php
                     if($address_function=='SAVE_EDIT_ADDRESS')
                     {
                     ?>
                     <form action="<?= base_url()?>index.php/customer/cart/save_address/<?= $row->id ?>" method="post">
                     <?php }else{?>
                     <form action="<?= base_url()?>index.php/customer/cart/save_address" method="post">
                     <?php } ?>
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Full Name <span class="required">*</span></label>
                                 <input type="text" class="form-control border-form-control" value="<?= $fullname?>" name="fullname" placeholder="Enter your Name" >
                              </div>
                           </div>
                          
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Mobile <span class="required">*</span></label>
                                 <input type="number" class="form-control border-form-control" name="mobile" placeholder="Enter Mobile Number" value="<?= $mobile?>">
                              </div>
                           </div>
                           <div class="col-sm-6">
                             <div class="form-group">
                                 <label class="control-label">Alternate Mobile <span class="required">*</span></label>
                                 <input class="form-control border-form-control" name="altmobile" placeholder="Enter Mobile Number" type="number" value="<?= $altmobile?>">
                              </div>
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label">City <span class="required">*</span></label>
                                 <input type="text" class="form-control border-form-control"  name="city" placeholder="Enter your city" >
                              </div>
                           </div>
                           <div class="col-sm-6">
                                <div class="form-group">
                                 <label class="control-label">State <span class="required">*</span></label>
                                 <input type="text" class="form-control border-form-control"  name="state" placeholder="Enter your state" >
                              </div>
                              
                           </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label">Shipping Address <span class="required">*</span></label>
                                 <textarea class="form-control border-form-control" name="address"><?= $address?></textarea>
                                 <small class="text-danger">Please provide the number and street.</small>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label">Zip Code <span class="required">*</span></label>
                                 <input class="form-control border-form-control"  placeholder="123456" type="number" name="zipcode" value="<?= $zipcode?>">
                              </div>
                           </div>                          
                        </div>
                       
                     <button type="submit" class="btn btn-theme-round btn-lg pull-right" name="submit" value="<?= $address_function?>">SAVE ADDRESS</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>


<?php include('footer.php') ?>