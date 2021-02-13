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
          <!-- general form elements -->
          <div class="box box-primary">
           
            <div class="box-header with-border">
              <h3 class="box-title"><a><strong>Pending Order Detail </strong></a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->         
              <div class="box-body table-responsive">
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Order No.</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Qty</th>
                  <th>Total Amount</th>
                  <th>size</th>
                  <th>Image</th>
                  <th>Order Status</th>
                  <th>Order Date(y/m/d)</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Customer Contact</th>
                  <th>Shipping Address</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                <?php
                $k=1;
                foreach($cloth->result() as $row)
                {
                  $this->db->where("id",$row->customer_id);
                 $c_data= $this->db->get("customer_data");
                  $c=$c_data->row();
               ?>
               <?php
               $this->db->where("id",$row->address);
               $cc=$this->db->get("customer_address");
               $ca=$cc->row();

               ?>
                <tr>
                <td><?=$k; ?></td>
                   <td><?= $row->id?>-<?=$row->order_id?></td>
                   <td><?= $row->cloth_name?></td>
                   <td>$<?= $row->cloth_value?>.00</td>
                   <td><?= $row->quantity ?></td>
                   <td>$<?= ($row->box_price)*($row->quantity) ?>.00</td>
                   <td><?= $row->cloth_size?></td>
                   <td> <img class="card-img-top img-fluid"  style="width: 120px; height: 60px;" src="<?= base_url(); ?>clothesimage/<?= $row->img?>"> </td>
                   <td class="badge bg-yellow" style=" font-size: 11px;" ><?= $row->order_status?> </td>
                   <td><?= $row->date?></td>
                   <td><span class="badge bg-red">#C000-<?= $c->id?>-000</span>  <br><?= $c->name?></td>
                   <td><?= $c->email?></td>
                   <td><?= $c->mobile?></td>
                   <td><?= $ca->customer_full_address?></td>

                   <td> <a class="btn btn-success btn-xs" href="<?= base_url()?>index.php/admin/order_detail/deliver_update?id=<?= $row->id ?>& order_id=<?= $row->order_id?> & c_name=<?= $row->cloth_name?> & c_value=<?= ($row->box_price)*($row->quantity) ?> & qty=<?= $row->quantity ?> & email=<?= $c->email?> & c_mobile=<?= $c->mobile?>">Deliver</a><p></p>
                    <a class="btn btn-danger btn-xs" href="<?= base_url()?>index.php/admin/order_detail/cancel_update?id=<?= $row->id ?> & order_id=<?= $row->order_id?> & c_name=<?= $row->cloth_name?> & total=<?= ($row->box_price)*($row->quantity) ?> & qty=<?= $row->quantity ?> & email=<?= $c->email?> & c_mobile=<?= $c->mobile?>">Cancel</a></td>
                  </tr>
                <?php $k=$k+1; }  ?>
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
   