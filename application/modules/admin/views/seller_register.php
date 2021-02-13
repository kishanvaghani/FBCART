<?php include('sheader.php'); ?>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>


<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home </a></li>
                     <li class="breadcrumb-item"><a href="#">Seller Registration</a></li>
                    
                  </ol>
               </div>
            </div>
         </div>
 </div> 
<section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               
               <div class="col-lg-8 col-md-8 mx-auto">
               <?php if($this->session->flashdata('flashSuccess'))
                {
                ?>
                <div class="alert alert-success" role="alert"> <?=$this->session->flashdata('flashSuccess')?> </div>
                <?php } ?>
                   
                  <div class="widget">
                      
                       <?php echo form_open('admin/register'); ?>
                        <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>SELLER PERSONAL DETAILS</strong> 
                        </h5>
                     </div>
                      <?= validation_errors("<p style='color:red;'>","</p>") ?>
                        <div class="row">

                           <div class="col-md-12 mb-3">
                              <label for="validationCustom01" class="control-label">Seller First Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Seller Name" name="first_name" required>
                               
                           </div>
                           
                         </div>
                        <div class="row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom03" class="control-label">Seller Last Name<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Seller Surname" name="last_name"  required>  </div>
                           
                             <div class="col-md-12 mb-3">
                              <label for="validationCustom05" class="control-label">Mobile Number<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control" value="<?php $mobile ?>"  placeholder="Mobile Number" name="mobile" required>
                              
                           </div>  
                        </div>
                         <div class="row">
                         
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom06" class="control-label">Email ID<span class="required">*</span></label>
                              <input type="email" class="form-control border-form-control"  placeholder="Email ID" value="<?php $email ?>" name="email" required>   
                           </div>

                           

                                
                          </div>
                           <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Date of Birth<span class="required">*</span></label>
                              <input type="date" class="form-control border-form-control"  placeholder="Selelct D.O.B." name="dob" required>
                              
                           </div>
                                   
                           
                           <div class="col-md-6 mb-3">
                            <fieldset class="form-group">
                              <label class="control-label" for="inlineFormCustomSelectPref">Gender</label><span class="required">*</span>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="gender">
                                <option value disabled selected>--Select Gender--</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                              </select>  
                           </fieldset>                          
                           </div>
                        </div>
                          
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom01" class="control-label">District<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="District" name="district"  required>
                           </div>  
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom03" class="control-label">Village/City<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="City" name="city"  required>  </div>   
                        </div>
                         <div class="row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom03" class="control-label">Pin-Code<span class="required">*</span></label>
                              <input type="text" class="form-control border-form-control"  placeholder="Pin-Code" name="pin_code"  required>  </div>
                             
                        </div>
                         
                     <div class="section-header">
                        <h5 class="heading-design-h5">
                            <strong>SET PASSWORD</strong> 
                        </h5>
                     </div> 
                         <div class="row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom05" class="control-label">Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control"  placeholder="Password" name="password"  required>
                              
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom06" class="control-label">Confirm Password<span class="required">*</span></label>
                              <input type="password" class="form-control border-form-control"  placeholder="Confrim Password" name="rpassword"  required>
                              
                           </div>
                           
                        </div>
                        
                         <br/>
                        
                         <div class="row">
                           <div class="col-sm-12 text-right">
                         
                              <button type="submit" class="btn btn-outline-success btn-lg" value="Register" name="submit">Register</button>
                              
                           </div>
                        </div>
                         <div class="row">
                           <div class="col-sm-12 text-right">
                            <p class="mb-0">Already have an account? <a class="text-danger" href="<?= base_url() ?>index.php/admin/login">Log in</a></p>
                           </div>
                        </div>                        
                        </div>
                     
                     <?php echo form_close(); ?>
                    
                  </div>
               </div>


              
            </div>
         </div>
      </section>

      

 <?php include('sfooter.php')?>