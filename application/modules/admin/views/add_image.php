<?php include("header.php") ?>    
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
          
            
            
            <?php if($this->session->flashdata('message')){ ?>
             <?=  validation_errors("<div class='callout callout-danger'>","</div>"); ?>
            <div class="callout callout-danger">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         <?php if($this->session->flashdata('success')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('success'); ?></h4>               
              </div>
         <?php } ?>         
         
           <?php echo form_open_multipart('admin/add_clothes/add_image');?>      
                <div class="form-group">
                  <label for="exampleInputFile">Upload  Photo</label>
                  <input type="file" name="img" >
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" value="upload image" name="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
         
      </div>
       </section>
     </div>
   </div>
<?php include("footer.php") ?>