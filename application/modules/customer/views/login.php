<?= include('header.php');?>
<section class="login_page">
         <div class="container">
            <div class="row">


               <div class="col-lg-6 col-md-6 mx-auto">
                  <div class="widget">
                     <div class="login-modal-right">.
                         <?= validation_errors("<span style='color:red;'>","</span>") ?>
                      
                <?php if($this->session->flashdata('flashSuccess'))
                    {
                    ?>
                    <div class="alert alert-danger" role="alert"> <b><?=$this->session->flashdata('flashSuccess')?></b> </div>
                    <?php } ?>
                     <?php if($this->session->flashdata('Success'))
                    {
                    ?>
                    <div class="alert alert-success" role="alert"> <b><?=$this->session->flashdata('Success')?></b> </div>
                    <?php } ?>
                        <!-- Tab panes -->
                        <?php echo form_open('customer/authenticate/login'); ?>

                     
                        <div class="tab-content">
                           <div class="tab-pane active" id="login" >
                              <h5 class="heading-design-h5">Login to your account</h5>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput">Enter Email/Mobile number</label>
                                 <input type="text" class="form-control" name ="email" placeholder="+91 123 456 7890//..A@gmail.com../">
                              </fieldset>
                              <fieldset class="form-group">
                                 <label for="formGroupExampleInput2">Enter Password</label>
                                 <input type="password" class="form-control" name="password" placeholder="********">
                              </fieldset>
                              <fieldset class="form-group">
                                 <button type="submit" name="submit" value="login" class="btn btn-lg btn-theme-round btn-block">Enter to your account</button>
                              </fieldset>
                           </div>
                        </div>
                        <?php echo form_close(); ?>  
                        <strong><a href="<?= base_url() ?>index.php/customer/authenticate/forget_password">FORGET PASSWORD?</a></strong><br/>                      
                     </div>
                  
                  <div class="text-center">		
                     <a class="btn btn-theme-round" data-target="#bd-example-modal" href="<?= base_url() ?>index.php/customer/authenticate/Register"><i class="icofont icofont-shopping-cart"></i> New TO FB-Mart.com? (CLICK HERE TO REGISTER)</a>
                  </div>
                </div>
               </div>
            </div>
         </div>
      </section>
      <?= include('footer.php'); ?>
