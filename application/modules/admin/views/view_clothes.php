  <?php $this->load->view('header.php')?>
       
   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php if($this->session->flashdata('message')){ ?>

            <div class="callout callout-success">
                <h4> <?php echo $this->session->flashdata('message'); ?></h4>               
              </div>
         <?php } ?>
         <?php echo validation_errors(); ?>

         <div class="box-body clearfix">
           
             <a href="<?= base_url()?>index.php/admin/add_clothes" type="button" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Add New Clothes</a>
          
              
         </div>
          
         
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>View Clothes</strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Name</th>
                  <th>Value</th>
                  <th>size</th>
                  <th>Image</th>
                  <th>Stock/Out Of Stock</th>
                  <th>Action</th>
                  <th>QR CODE</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($clothdata->result() as $row)
                {
               ?>

                <tr>
                <td><?=$k; ?></td>
                   <td><?= $row->cloth_name?></td>
                   <td><?= $row->cloth_value?></td>
                   <td><?= $row->clothes_size?></td>
                   <td> <img class="card-img-top img-fluid"  style="width: 120px; height: 60px; "  src="<?= base_url(); ?>clothesimage/<?= $row->img?>"> </td>
                   <td>
                      <div class="">
                        <?php if ($row->active_cloth=='1') {
                         
                         ?>
                        <a class="btn btn-success btn-xs" href="<?= base_url()?>index.php/admin/add_clothes/activate_cloth?id=<?= $row->id ?>">In Stock</a>
                      <?php }else{?>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/add_clothes/deactivate_cloth?id=<?= $row->id ?>">Out Of Stock</a>
                      <?php }?>
                      </div>
                   </td>

                   <td>
                        <a class="btn btn-danger btn-xs"  href="<?= base_url()?>index.php/admin/add_clothes/change?uid=<?= $row->id ?>" >Update Price</a>
                        <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/add_clothes/delete_clothes?id=<?= $row->id ?>">Delete</a>

                   </td>
                   <td>
                    <?php require_once('phpqrcode/qrlib.php'); 
                    $path='images/';
                    $file = $path.uniqid().".png";
                    $text= "<?base_url?>index.php/admin/add_clothes/add_clothes/view_clothes";
                    QRcode::png($text, $file,'s',10);

                    ?>
                    <img class="card-img-top img-fluid"  style="width: 120px; height: 60px; "  src="<?= base_url(); ?><?= $file?>"> </td>
                    </td>
                  </tr>
                <?php $k=$k+1; } ?>
               </tbody>
               
              </table>
                
                 
              </div>
              <!-- /.box-body -->             
          </div>
          
 
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <!-- Switchery -->

   
<?php $this->load->view('footer.php')?>
   