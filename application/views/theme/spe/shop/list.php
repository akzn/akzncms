<link href="<?=base_url()?>assets/theme/spe/product-list.css?v=0.1" rel="stylesheet">
<div class="container container-sm">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item bg-cover active" style="background-image: url('<?=base_url('img/slider/')?><?=$slider[0]->slider_image?>');">
        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="<?=base_url('img/slider/')?><?=$slider[0]->slider_image?>" data-holder-rendered="true">
        </div>
        <div class="carousel-item bg-cover" style="background-image: url('<?=base_url('img/slider/')?><?=$slider[1]->slider_image?>');">
        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="<?=base_url('img/slider/')?><?=$slider[1]->slider_image?>" data-holder-rendered="true">
        </div>
        <div class="carousel-item bg-cover" style="background-image: url('<?=base_url('img/slider/')?><?=$slider[2]->slider_image?>');">
        <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="<?=base_url('img/slider/')?><?=$slider[2]->slider_image?>" data-holder-rendered="true">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>

<div class="container mb-5">

	<!-- breadcrumb -->
	<!-- <div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Products</li>
          <?php if (isset($category_data)): ?>
              <li class="breadcrumb-item active" aria-current="page"><?=$category_data->name?></li>
          <?php endif ?>
        </ol>
      </nav> 

      </div>

    </div> -->


    <div class="row mt-4">
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
                                            <!-- <a href="javascript:void(0);" data-categorie-id="<?= $key['id'] ?>"  class="category-children go-category list-group-item <?=($_GET['category']==$key['id'])?'active':'';?>">
                                                <span><?=$key['name']?></span>
                                            </a> -->
                                            <a href="<?=base_url('products/'.$key['slug'])?>"  class="category-children go-category list-group-item <?=($_GET['category']==$key['id'])?'active':'';?>">
                                                <span><?=$key['name']?></span>
                                            </a>
                                        <!-- </li> -->
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php
                            
                        } else {
                            ?>
                            <a href="<?=base_url('products/'.$nav_category['slug'])?>"  class="list-group-item go-category <?=($_GET['category']==$nav_category['id'])?'active':'';?>">
                                <span><?=$nav_category['name']?></span>
                            </a>
                            <?php
                        }

                    }
                  ?>



                </div>
            </div>

        </div>

        <div class="col-md-9"> <!--  ./content-product -->
            
       
            <!-- sort -->
            <div class="product-sort gradient-color d-none">
        		<h5>Sort</h5>
                <div class="row">
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-style="btn-primary btn-xl" data-order-to="order_new">
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc">Newer </option>
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc">Older </option>
                            </select>
                        </div>
                    </div>
                    <div class="ord col-sm-4 d-none">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-style="btn-primary btn-xl" data-order-to="order_price" title="Sort by price..">
                                <option label="Sort by price.."></option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc">Lower Price </option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc">Higher Price</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Items -->

            <?php if ($_GET['search_in_title']): ?>
                <div class="padding-y-sm">
                    Search Result for <?=$_GET['search_in_title'];?> <a href="javascript:void(0)" onclick="clear_search()"><i class="fa fa-times-circle text-muted fa-xs"></i></a>
                </div>
            <?php endif ?>

            <div class="">
                <?php if ($category_data): ?>
                    <h4><?=($category_data->name)?$category_data->name:''?>  <a href="javascript:void(0)" onclick="clear_category()"><i class="fa fa-times-circle text-muted fa-xs"></i></a>  <small> ( <?=$rowscount?> results )<!-- for "Item" --></small></h4>

                    <?php if ($category_data->category_description): ?>

                        <?php if ($_COOKIE['lang'] == 'english') {
                            $description = get_string_between($category_data->category_description,'[en]','[/en]');
                        } else {
                            $description = get_string_between($category_data->category_description,'[id]','[/id]');
                        }?>

                        <?php $description = (!$description) ? str_replace(array('[en]', '[/en]','[id]', '[/id]'), array('', '','',''), $category_data->category_description) : $description ?>


                        <p class="p-3"><?=$description?></p>

                    <?php endif ?>

                <?php else: ?>
                    <!-- <span><?=$rowscount?> results</span> -->
                <?php endif ?>	
        	</div>
            
            <div>
            <h5 class="mb-3"> Pilihan Tepat Untuk Properti Anda</h5>
            </div>
        	<div class="row product-list">
        		<?php
                if (!empty($products)) {
                    foreach ($products as $product) {
                    	/* if image file exist or not*/
                    	$u_path = 'img/product/';
                        if ($product['image'] != null && $product['image'] !='no-image' && file_exists($u_path . $product['image'])) {
                            $image = base_url($u_path . $product['image']);
                        } else {
                            $image = base_url('img/no-image.jpg');
                        }

                        ?>
                        <div class="col-6 col-md-3 items">
        					<figure class="card card-product box-shadow">
        						<div class="img-wrap"> 
        							<!-- <a href="<?= base_url() . 'product/' . $product['url'] ?>" class="title"> -->
                                    <!-- <a href="" class="product-item-modal" data-toggle="modal" data-target="#product-modal" data-id="<?=$product['id']?>"> -->
                                    <a href="<?= base_url() . 'product/' . $product['url'] ?>" style="background-image: url('<?=$image;?>')">
        								<img class="lazy img-fluid" 
                                        src="<?=base_url()?>img/loading.gif" alt="<?=$filename?>" data-src="<?= $image ?>">
        							</a>
        						</div>
                                <div class="card-body">
                                    
                                
        						<!-- <figcaption class="info-wrap pt-4 mb-4 text-center"> -->
                                <figcaption class="text-center">
        							<a href="<?= base_url() . 'product/' . $product['url'] ?>" class="title"><?= $product['title'] ?> </a>
        							<div class="price-wrap pt-1">
                                        <?php if ($product['old_price']>0): ?>
                                            <del class="price price-old">Rp.<?=number_format($product['old_price'])?></del><br>
                                        <?php endif ?>
        								<span class="price price-new">Rp.<?=number_format($product['price']) ?></span>
        							</div> <!-- price-wrap.// -->
        						</figcaption>

                                <div class="d-none justify-content-between align-items-center p10">
                                    <div class="btn-group">
                                      <button type="button"  class="btn btn-sm btn-outline-secondary product-item-modal" data-toggle="modal" data-target="#product-modal" data-id="<?=$product['id']?>">View</button>
                                      <a href="<?= base_url() . 'product/' . $product['url'] ?>" type="button" class="btn btn-sm btn-outline-secondary">Detail</a>
                                    </div>
                                    <!-- <small class="text-muted">9 mins</small> -->
                                  </div>
                                  </div>
        					</figure> <!-- card // -->
        				</div> <!-- col // -->
                        <!-- 
                        <div class="col-sm-6 col-md-4 product-inner">
                            <a href="<?= base_url() . '/' . $product['url'] ?>">
                                <img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>" alt="" class="img-responsive">
                            </a>
                            <h3><?= $product['title'] ?></h3>
                            <span class="price"><?= $product['price'] ?></span>
                            <a class="add-to-cart" data-goto="<?= base_url() . '/checkout' ?>" href="javascript:void(0);" data-id="<?= $product['id'] ?>">
                                
                            </a>
                        </div> -->
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        $(document).ready(function () {
                            ShowNotificator('alert-info', '<?php echo('no_results') ?>');
                        });
                    </script>
                    <?php
                }
                ?>	

        		
        		</div><!-- row -->

                <?php if ($links_pagination != '') { ?>
                
                    <?= $links_pagination ?>
                
                 <?php } ?>

	</div> <!--  ./content-product -->


 </div>
    </div>

<?php //$this->load->view('front2/shop/product-modal')?>





<script type="text/javascript">

    $(document).ready(function () {
        $("body").lazyload({
            placeAttr:"data-src",
        });
    });

</script>