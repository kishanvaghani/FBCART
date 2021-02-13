<?php $this->load->view('nheader.php'); ?>
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
      <section class="products_page">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                 
                  <div class="row products_page_list">
                     <div class="clearfix"></div>
                     <?php 
                      foreach ($clothes->result() as $row)
                       {
                        ?>
                           <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="item">
                                 <div class="h-100">
                                    <div class="product-item">
                                       <span class="badge badge-danger offer-badge">HOT</span>  
                                       <div class="product-item-image">
                                          <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                                          <a href="<?= base_url() ?>index.php/customer/home/cus_img_view/?id=<?= $row->id?>" ><img class="card-img-top img-fluid" src="<?= base_url() ?>clothesimage/<?= $row->img ?>" alt=""></a>
                                       </div>
                                       <div class="product-item-body">
                                          <div class="product-item-action">
                                             <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="icofont icofont-shopping-cart"></i></a>
                                             <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="icofont icofont-search-alt-2"></i></a>
                                          </div>
                                          <h4 class="card-title"><a href="#"><?= $row->cloth_name ?></a></h4>
                                          <h5>
                                             
                                             <span class="product-price">$<?= $row->cloth_value ?>.00</span>
                                             <span class="product-discount">30% Off</span>
                                          </h5>
                                       </div>
                                       <div class="product-item-footer">
                                          <div class="product-item-size">
                                             <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
                                          </div>
                                          <div class="stars-rating">
                                             <i class="icofont icofont-star active"></i>
                                             <i class="icofont icofont-star active"></i>
                                             <i class="icofont icofont-star active"></i>
                                             <i class="icofont icofont-star"></i>
                                             <i class="icofont icofont-star"></i> <span>(415)</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                    <?php
                        }
                        ?>
               </div>
            </div>
         </div>
         </div>
      </section>
     
<?php $this->load->view('footer.php');?>