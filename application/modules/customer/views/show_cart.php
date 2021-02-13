<?php $this->load->view("nheader"); ?>
<section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 mx-auto">
                  <div class="widget">
                     <div class="section-header">
                        <h3 class="heading-design-h5">
                           Cart
                        </h3>
                     </div>
                     <div class="table-responsive">
                        <table class="table cart_summary">
                           <tbody>
                              <?php
                            $total=0;
                            foreach($query->result() as $row)
                            {

                            $this->load->model('mdl_cart');
                            $itemdata=$this->mdl_cart->get_cart_item_data($row->order_id);

                            
                            foreach($itemdata->result() as $row1)
                            {
                              

                              if ($row->order_status=="pending") {
                                $subtotal=($row->quantity)*($row->box_price);
                              $total=$total+$subtotal;
                               ?>

                              <tr>
                                 <td class="cart_product"><a href="#"><img class="img-fluid" src="<?= base_url()?>clothesimage/<?= $row1->img?>" alt="Product"></a></td>
                                 <td class="cart_description">
                                    <p class="product-name"><a href="#"><?= $row->cloth_name?> </a></p>
                                    
                                    <small><a href="#">Size : <?= $row->cloth_size?></a></small>
                                 </td>
                                 <td class="availability in-stock"><span class="badge badge-success">In stock</span></td>
                                 <td class="price"><span>$<?= $row->box_price?>/Unit</span></td>
                                 <td class="qty">
                                    <form class="form-inline pull-right" method="POST" action="<?= base_url() ?>index.php/customer/cart/update_quantity/<?= $row->id ?>">
                                                                         
                                       <div class="col-auto">
                                        <div class="input-group mb-4 mb-sm-8">
                                          <div class="input-group-addon"> <strong>Box</strong></div>
                                           <input type="text" name="boxquantity" class="form-control"  value="<?= $row->quantity?>" placeholder="Total Quantity"> &nbsp; &nbsp;
                                           <button type="submit" class="btn btn-success pull-left btn-sm">Update</button>
                                        </div>

                                    </div>
                                       
                                       
                                    </form>
                                 </td>
                                 <td class="price"><span>$<?= $subtotal?></span></td>
                                 <td class="action">
                                    <a data-toggle="tooltip" data-placement="top" title="" href="<?= base_url() ?>index.php/customer/cart/removeitem/<?= $row->id ?>" data-original-title="Remove"><i class="fa fa-trash-o"></i></a>
                                 </td>
                              </tr>
                              <?php
                               }
                               }
                               }
                              ?>
                           </tbody>
                           <tfoot>
                             <?php if ($row->order_status=="pending") {
                             ?>
                              <tr>
                                 <td colspan="2"></td>
                                 <td colspan="3">Total products (tax incl.)</td>
                                 <td colspan="2">$<?= $total?> </td>
                              </tr>
                              <tr>
                                 <td colspan="5"><strong>Total</strong></td>
                                 <td colspan="2"><strong>$<?= $total ?> </strong></td>
                              </tr>
                            <?php }?>
                           </tfoot>
                        </table>
                     </div>
                    <a href="<?php echo site_url('customer/cart/shipping_address') ?>">
                              <button type="button" class="btn btn-theme-round btn-lg pull-right">Place Order</button>
                        </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script type="text/javascript">

function deleteproduct(rowid)
{
var answer = confirm ("Are you sure you want to delete?");
if (answer)
{
$.ajax({
      type: "POST",
      url: "<?php echo site_url('customer/cart/remove');?>",
      data: "rowid="+rowid,
      success: function (response) {
          $(".rowid"+rowid).remove(".rowid"+rowid); 
          $(".cartcount").text(response);  
          var total = 0;
          $('.subtotal').each(function(){
              total += parseInt($(this).text());
              $('.grandtotal').text(total);
          });              
      }
  });
}
}

var total = 0;
$('.subtotal').each(function(){
total += parseInt($(this).text());
$('.grandtotal').text(total);
});


function updateproduct(rowid)
{
var qty = $('.qty'+rowid).val();
var price = $('.price'+rowid).text();
var subtotal = $('.subtotal'+rowid).text();
$.ajax({
  type: "POST",
  url: "<?php echo site_url('customer/cart/update_cart');?>",
  data: "rowid="+rowid+"&qty="+qty+"&price="+price+"&subtotal="+subtotal,
  success: function (response) {
          $('.subtotal'+rowid).text(response);
          var total = 0;
          $('.subtotal').each(function(){
              total += parseInt($(this).text());
              $('.grandtotal').text(total);
          });     
  }
});
}


</script>

<?= $this->load->view("footer"); ?>      