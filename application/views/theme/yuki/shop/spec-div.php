<?php
	/*
	THis file is for modal product on product list page
	*/
	/* if image file exist or not*/
	$u_path = 'img/shop/';
	if ($product['image'] != null && file_exists($u_path . $product['image'])) {
                            $image = base_url($u_path . $product['image']);
                        } else {
                            $image = base_url('img/no-image-1.png');
                        }
?>
<style type="text/css">
	.modal-body{
		padding: 0;
	}
	.row{
		margin-right: unset; 
	    margin-left: unset;
    }
</style>
<!-- Page Content -->
              <div class="">

                <!-- product Item Heading -->


                <!-- product Item Row -->
                <div class="row">

                  <div class="col-md-6 d-flex align-items-center justify-content-center" style="background: url('<?=$image?>');    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
                    <?php /*<!-- <img class="lazy img-fluid" src="http://placehold.it/750x500" alt="" id="modal-product-img" style=""> --> */?>
                    <!-- <img class="lazy img-fluid img-thumbnails" src="<?=$image?>" alt="" id="modal-product-img" style="max-height:600px;"> -->
                  </div>

                  <div class="col-md-6 mt-2">
                  	<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: fixed;
					    right: 23px;
					    top: 19px;
					    z-index: 1;">
					      <svg aria-label="Close" class="_8-yf5 " fill="#000" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M41.8 9.8L27.5 24l14.2 14.2c.6.6.6 1.5 0 2.1l-1.4 1.4c-.6.6-1.5.6-2.1 0L24 27.5 9.8 41.8c-.6.6-1.5.6-2.1 0l-1.4-1.4c-.6-.6-.6-1.5 0-2.1L20.5 24 6.2 9.8c-.6-.6-.6-1.5 0-2.1l1.4-1.4c.6-.6 1.5-.6 2.1 0L24 20.5 38.3 6.2c.6-.6 1.5-.6 2.1 0l1.4 1.4c.6.6.6 1.6 0 2.2z" fill-rule="evenodd"></path></svg>
					  </button>
                  	<span style="color:#8a8a8a"><?=$product['categorie_name']?></span>
                  	<h5><?=$product['title']?></h5>
                  	<hr>
                    <?php if ($specification): ?>
                    	<div style="overflow-y: scroll; max-height:500px;margin-bottom: 23px;">
                    	<!-- Section Spesification -->
                    		<h6>Specification :</h6>
						  	<table style="width: 100%;" class="table table-bordered table-striped">
						  		<?php foreach ($specification as $key): ?>
						  			<?php $tr_flag = 0?>

						  			<?php foreach ($key->sub as $key2): ?>
						  				<tr>
						  					<?php if ($tr_flag==0): ?>
						  						<?php $span = count((array)$key->sub) ?>
						  						<th class="block" width="10" <?=($span > 0)?'rowspan="'.$span.'"':''?> ><?=$key->spec_name?></th>
						  					<?php endif ?>

						  					<?php if ($key->sub): ?>
						  						<td width="10" class="block"><?=$key->sub[$tr_flag]->unit?></td>
						  						<td class="block"><?=$key->sub[$tr_flag]->value?></td>
									  		<?php else: ?>
									  			<td>-</td>
								  			<?php endif ?>

						  				</tr>
						  				<?php $tr_flag++?>
						  			<?php endforeach ?>
						  			
						  	<?php endforeach ?>
						  	</table>
						 </div>
						  	<?php else: ?>
						  		<!-- Section Description -->

						  		<!-- <h5>Description</h5>
						  		<p><?=$product['description']?></p> -->
						  		<br>
						  		<h6>Contact Us to Order</h6>
								
								<p class="btn btn-outline-primary text-uppercase"><i class="fas fa-phone"></i> <?php echo $site['phone_number'];?></span></p>
								

						  	<?php endif ?>
                  </div>

                </div>
                <!-- /.row -->

              </div>
              <!-- /.container -->



