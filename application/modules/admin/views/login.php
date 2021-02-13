<?php $this->load->view('sheader.php'); ?>
<div class="osahan-breadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/admin/login"><i class="icofont icofont-ui-home"></i> Home</a></li>
                     <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/admin/login"> Seller Login</a></li>
                    
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
                <div class="tab-content">
                   <div class="tab-pane active" id="login" role="tabpanel">
                      <h5 class="heading-design-h5">Login to your Seller account</h5>
                      
                 <?php echo form_open('admin/login'); ?>
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
                      <fieldset class="form-group">
                         <label for="formGroupExampleInput">Enter mobile Number / Email ID</label><span class="required">*</span>
                         <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="s_mob">
                      </fieldset>
                      <fieldset class="form-group">
                         <label for="formGroupExampleInput2">Enter Password</label><span class="required">*</span>
                         <input type="password" name="s_password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                      </fieldset>
                      
                      <fieldset class="form-group">
                         <button type="submit" class="btn btn-lg btn-theme-round btn-block" value="login" name="submit">Enter to your account</button>
                      </fieldset>
                      <?php echo form_close(); ?>

                        <strong><a href="<?= base_url() ?>index.php/admin/register/forget_password">FORGET PASSWORD?</a></strong><br/><br/> 
                   </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center login-footer-tab">
                   <ul class="nav nav-tabs" role="tablist">
                      
                      <li class="nav-item">
                         <a class="nav-link active" href="<?= base_url()?>index.php/admin/register"><i class="icofont icofont-pencil-alt-5"></i> NEW TO PORTAL ? REGISTER HERE</a>
                      </li>
                   </ul>
                </div>
                <div class="clearfix"></div>
             </div>
          </div>
          <br><br>
          
       </div>
    </div>
 </div>
</section>
<?php $this->load->view('sfooter.php'); ?>