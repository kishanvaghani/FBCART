<?php include('nheader.php') ?>

<section class="shopping_cart_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="checkout-step mb-40">
                     <ul>
                        <li>
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">1</div>
                              </div>
                              <span>Shipping</span>
                           </a>
                        </li>
                        <li class="active">
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">2</div>
                              </div>
                              <span>Order Overview</span>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">3</div>
                              </div>
                              <span>Payment</span>
                           </a>
                        </li>
                        <li>
                           <a href="cart_done.html">
                              <div class="step">
                                 <div class="line"></div>
                                 <div class="circle">4</div>
                              </div>
                              <span>Order Complete</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-8 col-md-8">
                  <div class="widget">
                     <div class="section-header">
                        <h3 class="heading-design-h5">
                           Order Overview
                        </h3>
                     </div>
                    <div class="table-responsive">
                        <table class="table cart_summary">
                           
                           <tbody>
                              <!--Item-->
                            <?php
                            $total=0;
                            $delivery_address="";
                            foreach($query->result() as $row)
                            {
                            $delivery_address=$row->address;
                            
                            $this->load->model('mdl_cart');
                            $itemdata=$this->mdl_cart->get_cart_item_data($row->order_id);

                            
                            foreach($itemdata->result() as $row1)
                            {
                              
                              if ($row->order_status=="pending") {
                                $subtotal=($row->quantity)*($row->box_price);
                               $total=$total+$subtotal;
                              ?>
                              <tr>
                                 <td><a href="#"><img width="100%" height="100%" src="<?= base_url()?>clothesimage/<?= $row1->img ?>" alt="Product"></a>


                                 </td>
                                 <td class="cart_description">
                                    <p class="product-name"><a href="#"><?= $row1->cloth_name ?> <br/> </a>
                                    <a href="#">Size: <?= $row->cloth_size ?> </a><br/>
                                    
                                   <input type="hidden" name="id" value="<?= $row->id?>">
                                 </td>
                                 
                                 <td class="price"><span><i class="fa fa-inr"> <?= $row->box_price ?> / Box</span></td>
                                 <td class="qty">
                                    
                                 <strong> Box Quantity</strong><br/>
                                  <?= $row->quantity ?>
                                 </td>
                                 <td class="price"><span><i class="fa fa-inr"><?= $subtotal ?></span></td>
                                
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
                                 <td colspan="1"></td>
                                 <td colspan="3">Total products (tax incl.)</td>
                                 <td colspan="2"><i class="fa fa-inr"> <?= $total ?></td>
                              </tr>
                              <tr>
                                 <td colspan="4"><strong>Total</strong></td>
                                 <td colspan="1"><strong><i class="fa fa-inr"> <span class="grandtotal"><?= $total ?></span></strong></td>
                              </tr>
                              <?php }?>
                           </tfoot>
                        </table>
                     </div>
                     <a href="<?= base_url() ?>index.php/customer/cart/payment?>" class="btn btn-theme-round btn-lg pull-right">NEXT</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="widget mb18">
                     <div class="card">
                        <div class="card-header">
                          Shipping Address 
                        </div>
                        <?php
                        $this->db->where('id',$delivery_address);
                        $addressdata=$this->db->get('customer_address'); 
                        foreach($addressdata->result() as $add)
                        {
                        ?>
                        <div class="card-body">
                           <div class="card-text"><strong><?= $add->customer_name ?></strong></div>
                           <div class="card-text"> <?= $add->customer_address ?><br>
                           <div class="card-text"><strong>City: </strong><?= $add->customer_city ?></div>
                           <div class="card-text"><strong>State: </strong><?= $add->customer_state ?></div>
                           </div>
                           <div class="card-text"><strong>Mobile: </strong><?= $add->customer_mobile ?></div>
                           <div class="card-text"> <strong>Alt. Mobile: </strong><?= $add->customer_alt_mobile ?></div>
                        </div>
                    <?php } ?>
                     </div>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
<?php include('footer.php') ?>

