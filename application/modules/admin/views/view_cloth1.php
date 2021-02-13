<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Gallery -->
<?php foreach($clothdata->result() as $column)
                      {
                     ?>
<div class="container">
  <div class="row ">
    <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="<?= $column->id?>"><img src="<?= base_url(); ?>clothesimage/<?= $column->img ?>" class="img-thumbnail my-3"></a>
    </div>
        
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
					<ol class="carousel-indicators">
						<li data-target="#lightbox" data-slide-to=<?= $column->id?> ></li>
						
						
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active"><img src="<?= base_url(); ?>clothesimage/<?= $column->img ?>" class="w-100"
							 alt=""></div>
						
						
					</div>
					<a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
					<a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php }?>