<?php $this->load->view("header.php") ?> 
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Clothes</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form role="form" action="<?= base_url()?>index.php/admin/add_clothes/change?uid=<?= $uid?>" method="post">
            <?=  validation_errors("<div class='callout callout-danger'>","</div>"); ?>
            
            <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         
              <h5><strong>Cloth name</strong></h5>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-user-secret"></i></span>
                <input type="text" class="form-control" name="cloth_name" value="<?= $cloth_name?>" placeholder="Enter Cloth Name" required>
                <span class="input-group-addon"><i class="fa  fa-user-secret"></i></span>
               </div>
                <h5><strong>Cloth Value</strong></h5>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="text" class="form-control" name="cloth_value" value="<?= $cloth_value?>"  placeholder="Enter Cloth Value.. $541" required>
                <span class="input-group-addon">.00</i></span>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" value="change" name="submit" class="btn btn-primary"><?= $operation?></button>
              </div>
            </form>

          </div>
          <!-- /.box -->

        </div>
         
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

<?php $this->load->view("footer.php") ?>