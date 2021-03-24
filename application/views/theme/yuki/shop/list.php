<style type="text/css">
    button,a.btn,.breadcrumb,.list-group-item {
        /*border-radius: 0!important;*/
    }
	.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: auto;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
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
    /*border-radius: 4px;*/
    cursor: zoom-in;
}

.card-product {
    margin-bottom: 1rem;
    border:none;
}
.card .img-wrap {
    overflow: hidden;
}
.card-product .img-wrap {
    /*border-radius: 0.2rem 0.2rem 0 0;*/
    overflow: hidden;
    position: relative;
    height: 350px;
    text-align: center;
}
.img-wrap {
    text-align: center;
    display: block;
}
.card-product:hover{
    background-color: transparent;
    box-shadow: 2px 2px 10px 3px rgba(0, 0, 0, 0.5);
}

.card-product .img-wrap img {
    height: 100%;
    width: 100%;
    display: inline-block;
    -o-object-fit: cover;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    /*padding-bottom: 20px;*/
    border-top: 1px solid #eee;
}
.padding-y-sm {
    padding-top: 16px;
    padding-bottom: 16px;
}
.price{
    font-weight: 600;
    color: #606060;
    font-size: 20px;
}

.price.price-old{
    font-size: 16px;
}

.box-shadow {
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, .10);
}

.category-menu {
    margin-bottom: 20px;
}

@media only screen and (max-width: 600px) {

    .card-product .img-wrap {
        height: 210px!important;
    }
}

@media (min-width: 600px) {
     .card-product .img-wrap {
        height: 180px;
    }
}

@media (max-width: 768px) and (min-height: 768px) {
     .card-product .img-wrap {
        height: 180px !important;
    }
}

@media (min-width: 768px) {

    .card-product > .card-body > figcaption > .title {
        color: #4a4a4a;
        /*font-weight: 600;*/
        font-size: 15px;
    }

    .card-product .img-wrap {
        height: 200px;
    }

}

@media (min-width: 1440px) {
    .card-product .img-wrap {
        height: 320px;
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
          <li class="breadcrumb-item active" aria-current="page">Products</li>
          <?php if (isset($category_data)): ?>
              <li class="breadcrumb-item active" aria-current="page"><?=$category_data->name?></li>
          <?php endif ?>
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

                  
                  <!-- <a href="#web_dev" data-toggle="collapse" class="category-header list-group-item collapsed">
                    <span>Web Development</span>
                  </a>
                  <div class="collapse"  data-parent="#category-menu" id="web_dev">
                    <ul class="list-group-item-text">
                      <li>Javascript</li>
                      <li>PHP</li>
                      <li>Wordpress</li>
                      <li>MYSQL</li>
                    </ul>
                  </div> -->

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
                    <span><?=$rowscount?> results</span>
                <?php endif ?>	
        	</div>

        	<div class="row">
        		<?php
                if (!empty($products)) {
                    foreach ($products as $product) {
                    	/* if image file exist or not*/
                    	$u_path = 'img/shop/';
                        if ($product['image'] != null && file_exists($u_path . $product['image'])) {
                            $image = base_url($u_path . $product['image']);
                        } else {
                            $image = base_url('img/no-image-1.png');
                        }
                        ?>
                        <div class="col-6 col-md-3 ">
        					<figure class="card card-product box-shadow">
        						<div class="img-wrap"> 
        							<!-- <a href="<?= base_url() . 'product/' . $product['url'] ?>" class="title"> -->
                                    <!-- <a href="" class="product-item-modal" data-toggle="modal" data-target="#product-modal" data-id="<?=$product['id']?>"> -->
                                    <a href="<?= base_url() . 'product/' . $product['url'] ?>" >
        								<img class="lazy img-fluid" 
                                        src="<?=base_url()?>img/loading.gif" alt="<?=$filename?>" data-src="<?= $image ?>">
        							</a>
        						</div>
                                <div class="card-body">
                                    
                                
        						<!-- <figcaption class="info-wrap pt-4 mb-4 text-center"> -->
                                <figcaption class="text-center">
        							<a href="<?= base_url() . 'product/' . $product['url'] ?>" class="title"><?= $product['title'] ?> </a>
        							<!-- <div class="price-wrap pt-1">
                                        <?php if ($product['old_price']>0): ?>
                                            <del class="price price-old">Rp.<?=number_format($product['old_price'])?></del><br>
                                        <?php endif ?>
        								<span class="price price-new">Rp.<?=number_format($product['price']) ?></span>
        							</div> --> <!-- price-wrap.// -->
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