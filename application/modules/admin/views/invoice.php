<?php $this->load->view("header.php");?>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Invoice
        <small>#<?= $id?>-<?= $order_id?></small>
      </h1>
      
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
         Click the Download button at the bottom of the invoice to print Invoice.
      </div>
    </div>
   
    <!-- Main content -->
    <section class="invoice" name="pdf" id="pdf">
      <!-- title row -->
       <?php 
        $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);
        $this->db->where("id",$seller_id);
        $seller=$this->db->get("seller_data");
        $s=$seller->row();
        ?>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> FBCART, Inc.
            <small class="pull-right">Date: <?= $d_date ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-3 invoice-col">
          From
          <address>
            <strong><?= $s->first_name?> <?= $s->last_name?></strong><br>
            <?= $s->city?><br>
            <?= $s->district?><br>
            <?= $s->pin_code?><br>
            Phone: <?= $s->mobile?><br>
            Email: <?= $s->email?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          To
          <address>
            <strong><?= $id?> <?= $c_name ?></strong><br>
            <?= $c_address ?><br>
            Phone: <?= $c_mobile?><br>
            Email: <?= $c_email?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          <b>Invoice #<?= $id?>-<?= $order_id?></b><br>
          <b>Order ID:</b> #<?= $id?>-<?= $order_id?><br>
          <b>Payment:</b> checked<br>
          <b>Account:</b> UPI/PAYTM
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          <b>Image #<?= $id?>-<?= $order_id?></b><br>
          
          <b></b> <img  class="card-img-top img-fluid" style="width: 140px; height: 100px;" src="<?= base_url() ?>clothesimage/<?= $img?>"> <br>
          
        </div>
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?= $qty?></td>
              <td><?= $cloth_name?></td>
              <td><?= $order_id ?></td>
              <td><?= $des?></td>
              <td>$<?= $cloth_value?>.00</td>
            </tr>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="<?= base_url() ?>admindata1/dist/img/credit/visa.png" alt="Visa">
          <img src="<?= base_url() ?>admindata1/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?= base_url() ?>admindata1/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?= base_url() ?>admindata1/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            PAYMENT GATEWAY AVAILABLE SOON.. 
            </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount : CHECKED</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$<?= $cloth_value ?>.00</td>
              </tr>
              <tr>
                <th>Tax</th>
                <td>Included</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>Included</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$<?= $total?>.00</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          
         
          <button type="button" name="pdf" id="pdf" onclick="window.print();" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
</body>
<script type="text/javascript">
function printDiv(pdf) {
    var printContents = document.getElementById(pdf).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<?php $this->load->view("footer.php"); ?>