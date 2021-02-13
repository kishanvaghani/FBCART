<?php $this->load->view('header.php'); ?>
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
      <section class="login_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 mx-auto">
                  <div class="widget">
                     <div class="login-modal-right">
                       
                        <!-- Tab panes -->
                        <?php echo form_open('customer/authenticate/register'); ?>
                         <?= validation_errors("<div class='alert alert-success alert-dismissible fade show'>","</div>") ?>
                      <?php if($this->session->flashdata('flashSuccess'))
                      {
                      ?>
                      <div class='alert alert-info alert-dismissible fade in'> <?=$this->session->flashdata('flashSuccess')?> </div>
                      <?php } ?>
                           <div class="tab-content">
                              <div class="tab-pane active" id="register" role="tabpanel">
                                 <h5 class="heading-design-h5">Register Now!</h5>
                                 <fieldset class="form-group">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Enter Your Name">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label for="formGroupExampleInput">Enter Email</label>
                                    <input type="text" class="form-control" name="email" id="formGroupExampleInput" placeholder="...A@gmail.com...">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label for="formGroupExampleInput">Mobile number</label>
                                    <input type="text" class="form-control" name="mobile" id="formGroupExampleInput" placeholder="+91 123 456 7890../">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label for="formGroupExampleInput2">Enter Password</label>
                                    <input type="password" class="form-control" name="password" id="formGroupExampleInput2" placeholder="********">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <label for="formGroupExampleInput3">Enter Confirm Password </label>
                                    <input type="password" class="form-control" name="rpassword" id="formGroupExampleInput3" placeholder="********">
                                 </fieldset>
                                 <fieldset class="form-group">
                                    <button type="submit" name="submit" value="done" class="btn btn-lg btn-theme-round btn-block">Create Your Account</button>
                                 </fieldset>
                                 <div class="separator">
                                  <p class="change_link">Already You Have An Account ?
                                    <a href="<?= base_url() ?>index.php/customer/authenticate/login" class="to_register"> Click Account </a>
                                  </p>

                                  <div class="clearfix"></div>
                                  <div>
                                 </p>
                              </div>
                           </div>
                        <?php echo form_close(); ?>                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?= $this->load->view('footer.php'); ?>