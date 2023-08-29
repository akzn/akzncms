<style type="text/css">
	.gallery-wrap .img-big-wrap img {
    /*height: 450px;*/
    max-height: 430px;
    width: auto;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    /*width: 60px;*/
    height: 60px;
    /*border: 1px solid #ddd;*/
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;

}

.gallery-wrap .img-small-wrap .item-gallery:hover {
	box-shadow: 1px 2px 10px 1px rgba(0,0,0,.5);
}

.item-gallery-video {
    width: 60px;
    height: 60px;
    /*border: 1px solid #ddd;*/
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    /*cursor: zoom-in;*/
}

.main-image {
  /*width: 380px;*/
  height: 450px;
  /*padding:15px;*/
  margin: 10px;
  margin-bottom: 0.75em;

    padding: 5px;
    /*border: 1px solid #e0e0e0;*/
    border-radius: 3px;
}
.thumbnails li {
  display: inline;
  margin: 0 10px 0 0;
}

@media only screen and (max-width: 600px) {

    article > h2.title {
    	font-size: 20px;
    }

    article > p{
    	font-size: 14px;
    }

    .breadcrumb {
    	font-size: 12px;
    }

    article.p-5{
    	padding: 10px !important;
    }

    .main-image {
    	height: auto;
    }
}

@media (min-width: 768px) {

    tr th{
	    white-space:nowrap;
	}
}
</style>


<div class="container mb-5">

	<!-- breadcrumb -->
	<div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?=base_url()?>products">Products</a></li>
          <li class="breadcrumb-item"><a href="<?=base_url()?>products/<?=$product['categorie_slug']?>"><?=$product['categorie_name']?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?=$product['title']?></li>
        </ol>
      </nav> 

      </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <!-- Category -->
            <div id="category-menu" class="category-menu">
                <a class="category-title list-group-item list-title collapsed" data-toggle="collapse" href="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse"><?=$this->lang->line('category')?></a>          

                <!-- <div class="panel list-group"> -->
                <div class="category-body collapse" id="categoryCollapse">
                        <!-- <a href="javascript:void(0);" data-categorie-id=""  class="list-group-item go-category <?=($_GET['category']=='')?'active':'';?>">
                                <span><?=$this->lang->line('all')?></span>
                            </a> -->
                  <?php

                    foreach ($nav_categories as $nav_category) {
                        $children = false;
                        if (isset($nav_category['children']) && !empty($nav_category['children'])) {
                            $children = true;
                        }
                        if ($children === true) {
                            $href_Id = preg_replace('/\s+/', '-', $nav_category['name']);
                        ?>
                        
                            <a href="#<?=$href_Id?>" data-toggle="collapse" class="category-parent list-group-item 

                                <?=($_GET['category']==$nav_category['id'])?'':'collapsed';?>

                                <?=($_GET['category']==$nav_category['id'])?'active':'';?>

                                " 

                                <?=($_GET['category']==$nav_category['id'])?'aria-expanded="true"':'';?>
                            >
                                <span><?=$nav_category['name']?></span>
                            </a>

                            <div class="collapse 
                                <?=($_GET['category']==$nav_category['id'])?'show':'';?>
                            "  
                            data-parent="#category-menu" id="<?=$href_Id?>">
                                <ul class="list-group-item-text">
                                        <!-- <a href="javascript:void(0);" data-categorie-id="<?= $nav_category['id'] ?>"  class="go-category list-group-item
                                            <?=($_GET['category']==$nav_category['id'])?'active':'';?>
                                        ">
                                                <span><?=$this->lang->line('show_all')?></span>
                                            </a> -->
                                    <?php foreach ($nav_category['children'] as $key ): ?>
                                        <!-- <li class="list-group-item"> -->
                                            <a href="<?=base_url('products/'.$key['slug'])?>" data-categorie-id="<?= $key['id'] ?>"  class="category-children go-category list-group-item <?=($_GET['category']==$key['id'])?'active':'';?>">
                                                <span><?=$key['name']?></span>
                                            </a>
                                        <!-- </li> -->
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php
                            
                        } else {
                            ?>
                            <a href="<?=base_url('products/'.$nav_category['slug'])?>" data-categorie-id="<?= $nav_category['id'] ?>"  class="list-group-item go-category <?=(@$_GET['category']==$nav_category['id'])?'active':'';?>">
                                <span><?=$nav_category['name']?></span>
                            </a>
                            <?php
                        }

                    }
                  ?>

                </div>
            </div>
        </div>

        <div class="col-md-9">
			<!-- product detail -->
			<div class="d-md-none d-block">
				<hr>
				<span style="color:#8a8a8a"><?=$product['categorie_name']?></span>
				<h4 class="title mb-3"><?=$product['title']?></h4>
			</div>
			<div class="card">
				<div class="row">
					<aside class="col-sm-6 ">
						<article class="gallery-wrap"> 
							<div class="img-big-wrap">
								<?php 
									$u_path = 'img/shop/';
					                if ($product['image'] != null && file_exists($u_path . $product['image'])) {
					                    $image = base_url($u_path . $product['image']);
					                } else {
					                    $image = base_url('img/no-image-1.png');
					                }
								?>
							  <div class="row main-image"> 
							  	<a class="col-sm-12 align-self-center fancybox  fancybox.iframe" href="<?= $image ?>">
							  		<img class="img-fluid  rounded mx-auto d-block align-item-center" src="<?=$image?>">
							  	</a>
							  </div>

							</div> <!-- slider-product.// -->
							 <div class="img-small-wrap">

							 	<div class="item-gallery"> 
							  		<a class="fancybox  fancybox.iframe" href="<?= $image?>"><img src="<?=$image?>"></a>
							  	</div>

							 	<?php
					                	$u_path = 'video/shop/';
						                if ($product['video'] != null && file_exists($u_path . $product['video'])) {
						                    $video = base_url($u_path . $product['video']);

						                    ?>
						                    <div class="item-gallery play-button-div"> 
						                    	
										  		<a class="fancybox  fancybox.iframe" href="<?= $video ?>">
										  			<img class="video" src="<?=$image?>">
										  			<span class="play-button-icon"><i class="far fa-play-circle" aria-hidden="true" style="color:#e84756; font-size: 35px;"></i></span>
										  		</a>
										  	</div>
						                    <?php
						                } 

					                ?>

							  	<!-- <div class="item-gallery"> 
							  		<img src="<?=$image?>"> 
							  	</div> -->

							  	<?php if ($product['folder'] != null) {
					                	$dir = "img/shop/" . $product['folder'] . '/';
					                	}
					                ?>

								  	<?php
					                    if (is_dir($dir)) {
					                        if ($dh = opendir($dir)) {
					                            $i = 1;
					                            while (($file = readdir($dh)) !== false) {
					                                if (is_file($dir . $file)) {
					                                    ?>
					                                    <div class="item-gallery"> 
													  		<a class="fancybox  fancybox.iframe" href="<?= base_url($dir . $file) ?>"><img src="<?= base_url($dir . $file) ?>"></a>
													  	</div>
					                                    <?php
					                                    $i++;
					                                }
					                            }
					                            closedir($dh);
					                        }
					                    }
					                    ?>
							</div>  <!-- slider-nav.// -->
							<div class="d-none">
								<div class="main-image">
								    <img id="img-main" src="<?=$image?>" alt="Placeholder" class="img-main img-fluid  rounded mx-auto d-block">
								</div>

								<ul class=" img-small-wrap thumbnails">
								    <!-- <li><a href="<?=$image?>"><img src="<?=$image?>" alt="Thumbnails"></a></li>
								    <li><a href="assets/img/img-03.jpg"><img src="assets/img/img-03-tn.jpg" alt="Thumbnails"></a></li> -->
								    <?php if ($product['folder'] != null) {
					                	$dir = "img/shop/" . $product['folder'] . '/';
					                	}
					                ?>

								  	<?php
					                    if (is_dir($dir)) {
					                        if ($dh = opendir($dir)) {
					                            $i = 1;
					                            while (($file = readdir($dh)) !== false) {
					                                if (is_file($dir . $file)) {
					                                    ?>
					                                    <div class="item-gallery"> 
					                                    	<li><a href="<?= base_url($dir . $file) ?>"><img class="" src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" alt="Thumbnails"></a></li>
					                                    </div>
					                                    <?php
					                                    $i++;
					                                }
					                            }
					                            closedir($dh);
					                        }
					                    }
					                    ?>
								  </ul>
							</div>
						</article> <!-- gallery-wrap .end// -->
					</aside>
					<aside class="col-sm-6">
						<article class="card-body p-5">
							<div class="d-none d-sm-block">
								<span style="color:#8a8a8a"><?=$product['categorie_name']?></span>
								<h4 class="title mb-3"><?=$product['title']?></h4>
							</div>
							<p class="price-detail-wrap d-none"> 
								<span class="price h3 text-warning"> 
									<span class="currency">IDR Rp.</span><span class="num"><?=$product['price']?></span>
								</span> 
								<!-- <span>/per kg</span>  -->
							</p> <!-- price-detail-wrap .// -->
							<!-- <hr> -->
							<div class="row d-none">
								<div class="col-sm-5 ">
									<dl class="param param-inline">
									  <dt>Quantity: </dt>
									  <dd>
									  	<select class="form-control form-control-sm" style="width:70px;">
									  		<option> 1 </option>
									  		<option> 2 </option>
									  		<option> 3 </option>
									  	</select>
									  </dd>
									</dl>  <!-- item-property .// -->
								</div> <!-- col.// -->
								<div class="col-sm-7">
									<dl class="param param-inline">
										  <dt>Size: </dt>
										  <dd>
										  	<label class="form-check form-check-inline">
											  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
											  <span class="form-check-label">SM</span>
											</label>
											<label class="form-check form-check-inline">
											  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
											  <span class="form-check-label">MD</span>
											</label>
											<label class="form-check form-check-inline">
											  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
											  <span class="form-check-label">XXL</span>
											</label>
										  </dd>
									</dl>  <!-- item-property .// -->
								</div> <!-- col.// -->
							</div> <!-- row.// -->
							<hr>
							<!-- <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a> -->
							<!-- <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Contact Us to Order </a> -->
				
							<?php /* section description, hide for now
							<p><?=$product['description']?></p>
							
							*/
							?>


							<?php if ($specification&&(!$product['description'])): ?>
								<a href="#nav-Specification-tab" class="d-none d-sm-block">Show Specification >></a>	
							<?php endif ?> 
				

							<?php if ($specification_product_type): ?>
								<h6 class="pt-3"><?=$this->lang->line('h_product_variant')?></h6>
								<?php  
									$product_type = (explode(",",$specification_product_type->value));
								?>
								<ul>
								<?php foreach ($product_type as $key): ?>
									<li><?=$key?></li>
								<?php endforeach ?>
								</ul>
								<!-- <br> -->
							<?php endif ?>

							
							<?php if ($product['description']): ?>
							<h6 class="pt-3"><?=$this->lang->line('h_description')?></h6>
							

								<?php if ($_COOKIE['lang'] == 'english') {
		                            $description = get_string_between($product['description'],'[en]','[/en]');
		                        } else {
		                            $description = get_string_between($product['description'],'[id]','[/id]');
		                        }?>

		                        <?php $description = (!$description) ? str_replace(array('[en]', '[/en]','[id]', '[/id]'), array('', '','',''), $product['description']) : $description ?>

		                        <p style="font-size: 16px"><?=$description?></p>
							<?php else: ?>
								<!-- <p style="font-size: 16px">TBA</p> -->
							<?php endif ?>


							<!-- <h5>Contact Us to Order</h5>
				
							<p class="btn btn-outline-primary text-uppercase"><i class="fas fa-phone"></i> <?php echo $site['phone_number'];?></p>
							<hr> -->
						</article> <!-- card-body.// -->
					</aside> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- card.// -->

			<?php if ($specification): ?>
			<article class="card mt-3">
				<div class="card-body">
					 
					<nav style="margin-bottom: 1rem;">
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					  	<!-- description tab, hide for now 
					    <a class="nav-item nav-link" id="nav-Description-tab" data-toggle="tab" href="#nav-Description" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
					    -->
					    	<a class="nav-item nav-link active" id="nav-Specification-tab" data-toggle="tab" href="#nav-Specification" role="tab" aria-controls="nav-profile" aria-selected="false"><?=$this->lang->line('h_specification')?></a>
					    
					    <?php if ($specification_2): ?>
					    	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?=$this->lang->line('h_suitable_excavator')?></a> 
					    <?php endif ?>
					  </div>
					</nav>
					
					<div class="tab-content" id="nav-tabContent">
					  <div class="tab-pane fade" id="nav-Description" role="tabpanel" aria-labelledby="nav-home-tab">
					  	<h3>Description</h3>
					  	<div class="">
					  		<p>
							<?=$product['description']?>
							</p>
						</div>
					  </div>
					  <div class="tab-pane fade show active" id="nav-Specification" role="tabpanel" aria-labelledby="nav-Specification-tab">
					  	<?php if ($specification): ?>
					  	<h3><?=$this->lang->line('h_specification')?></h3>
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
					  	<?php endif ?>
					  </div>

					  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					  	<?php if ($specification_2): ?>
					  		<h3><?=$this->lang->line('h_suitable_excavator')?></h3>
					  		<table class="table table-striped table-bordered">
					  			<?php foreach ($specification_2 as $key): ?>
					  				<tr>
					  					<th><?=$key->spec_name?></th>
					  					<td><?=$key->value?></td>
					  				</tr>
					  			<?php endforeach ?>
					  		</table>
					  	<?php endif ?>
					  </div>
					</div>

					<!-- <h4>Description</h4>
					<div>
						<?=$product['description']?>
					</div> -->
				</div> <!-- card-body.// -->
			</article>
			<?php endif ?>

		</div> <!-- end column -->
    </div>
	</div>

<link rel="stylesheet" href="<?=base_url()?>assets/shop/fancybox/jquery.fancybox.min.css" />
<script src="<?=base_url()?>assets/shop/fancybox/jquery.fancybox.min.js"></script>
<script>
  $(document).ready(function () {

    $().fancybox({
	    selector : '.fancybox',
	    iframe : {
			preload : false
		},
		video: {
		    autoStart: false,
		    muted:true,
		  },
		 afterLoad: function( instance, current ) {
		      console.info( 'Clicked element:' );
		      $( ".fancybox-stage" ).find( "video" ).attr('oncanplay',"this.muted=true");
		      console.log($( ".fancybox-stage" ).find( "video" ));
		    }
			
	});
  });
  </script>

