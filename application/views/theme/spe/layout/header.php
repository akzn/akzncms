
<style type="text/css">

</style>

<!-- Topbar-->
<div class="fixed-top nav-top d-none d-md-block" style="padding: 10px 0;">
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-12 left">
          <!-- <a class="d-none d-sm-inline" href="<?=base_url()?>ch_lang/indonesian"><img src="<?=base_url()?>img/indonesia-flag-square-icon-16.png"></a> <span class="d-none d-sm-inline"> | </span>
          <a class="d-none d-sm-inline" href="<?=base_url()?>ch_lang/english"><img src="<?=base_url()?>img/united-states-of-america-flag-square-icon-16.png"></a>
          <span class="mr-2"></span> -->
          <i class="fas fa-envelope"></i> Email : <span class="nav-item-top"><?=$site['email']?></span>

        </div>
        <div class="col-md-6 col-12 right social-nav">
            <i class="fas fa-phone-alt"></i>  <?=$this->lang->line('contact')?> : <span class="nav-item-top"><?=$site['phone_number']?></span>

            <?php if ($site['twitter']!=''): ?>
            <a class="" href="<?=$site['twitter']?>"><span class="fab fa-twitter pl-2"></span></a>
            <?php endif ?>

            <?php if ($site['facebook']!=''): ?>
              <a class="" href="<?=$site['facebook']?>"><span class="fab fa-facebook pl-2"></span></a>
            <?php endif ?>
             <?php if ($site['instagram']!=''): ?>
              <a class="" href="<?=$site['instagram']?>"><span class="fab fa-instagram pl-2"></span></a>
            <?php endif ?>
            <!-- <div class="mb-1 d-block d-sm-none">
                <a href="<?=base_url()?>ch_lang/indonesian"><img src="<?=base_url()?>img/indonesia-flag-square-icon-16.png"></a> 
                <span> | </span>
                <a href="<?=base_url()?>ch_lang/english"><img src="<?=base_url()?>img/united-states-of-america-flag-square-icon-16.png"></a>
            </div> -->
        </div>
    </div>
  </div>
</div>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
      <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button> -->
      <a href="<?php echo base_url();?>" title="Home Page">
          <img src="<?php echo base_url('assets/upload/image/'.$site['logo']);?>" alt="Site Logo" class="img-responsive front-logo"  />
      </a>

      <div class="d-none d-md-block nav-search">
        <!-- Search wrapepr -->
        <form method="GET" class="search" id="bigger-search" action="<?= base_url() . 'products' ?>">
                <div class="input-group w-100">
                            <input type="hidden" name="category" value="<?= isset($_GET['category']) ? $_GET['category'] : '' ?>">
                            <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? $_GET['in_stock'] : '' ?>">
                            <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>">
                            <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? $_GET['order_new'] : '' ?>">
                            <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? $_GET['order_price'] : '' ?>">
                            <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? $_GET['order_procurement'] : '' ?>">
                            <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? $_GET['brand_id'] : '' ?>">
                            <div class="d-none">
                                <div class="form-group">
                                    <label for="quantity_more">quantity_more_than</label>
                                    <input type="text" value="<?= isset($_GET['quantity_more']) ? $_GET['quantity_more'] : '' ?>" name="quantity_more" id="quantity_more" placeholder="type_a_number" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="added_after">added_after</label>
                                            <div class="input-group date">
                                                <input type="text" value="<?= isset($_GET['added_after']) ? $_GET['added_after'] : '' ?>" name="added_after" id="added_after" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="added_before">added_before</label>
                                            <div class="input-group date">
                                                <input type="text" value="<?= isset($_GET['added_before']) ? $_GET['added_before'] : '' ?>" name="added_before" id="added_before" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="search_in_body">search_by_keyword_body</label>
                                    <input class="form-control" value="<?= isset($_GET['search_in_body']) ? $_GET['search_in_body'] : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_from">price_from</label>
                                            <input type="text" value="<?= isset($_GET['price_from']) ? $_GET['price_from'] : '' ?>" name="price_from" id="price_from" class="form-control" placeholder="type_a_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_to">price_to</label>
                                            <input type="text" name="price_to" value="<?= isset($_GET['price_to']) ? $_GET['price_to'] : '' ?>" id="price_to" class="form-control" placeholder="type_a_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control field" style="border-radius: 5px;" id="search_in_title" value="<?= @$_GET['search_in_title'] ?>" placeholder="<?=$this->lang->line('search')?>">
                            <div class="input-group-append">
                              <!-- <button class="btn btn-primary btn-xl" type="submit">
                                <i class="fa fa-search"></i> Search 
                              </button> -->
                              <a class="btn btn-primary btn-xl" href="javascript:void(0);" onclick="submitForm()"><i class="fa fa-search"></i> <?=$this->lang->line('search')?></a>
                            </div>
                            <!-- <a href="javascript:void(0);" onclick="submitForm()"><i class="fa fa-search"></i></a> -->
                         </div>
              </form> <!-- search-wrap .end// -->
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>"><?=$this->lang->line('home')?></a>
          </li>

          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=$this->lang->line('products')?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/attachments">Attachments</a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/sparepart-breaker">Spareparts</a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/fix-repair"><?=$this->lang->line('landing_service_repair_heading')?></a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/rental"><?=$this->lang->line('landing_service_rental_heading')?></a>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url('property')?>">Property</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url('gallery')?>">Gallery</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>about"><?=$this->lang->line('about')?></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>contact"><?=$this->lang->line('contact')?></a>
          </li>
        </ul>
        <ul class="navbar-nav flex-row social-nav">
            <li class="nav-item social">
              <?php if ($site['twitter']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['twitter']?>"><span class="fab fa-twitter" style="padding: .5rem;"></span></a>
              <?php endif ?>
              <?php if ($site['facebook']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['facebook']?>"><span class="fab fa-facebook-f fa-social-square facebook-color" style="padding: .5rem;"></span></a>
              <?php endif ?>
              <?php if ($site['instagram']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['instagram']?>"><span class="fab fa-instagram fa-social-square instagram-color" style="padding: .5rem;"></span></a>
              <?php endif ?>
            </li>
        </ul>
        
        <!-- Language Switch Part -->
        <?php $lang_abr = ($_COOKIE['lang'] == 'english') ? 'EN' : 'ID'?>
        <!-- <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-globe"></i> <?=$lang_abr?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>ch_lang/indonesian">
                <img src="<?=base_url()?>img/indonesia-flag-square-icon-16.png"> <span>Bahasa Indonesia</span>
              </a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>ch_lang/english">
                <img src="<?=base_url()?>img/united-states-of-america-flag-square-icon-16.png"> <span>English</span>
              </a>
            </div>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>

  <!-- Header -->
  
  <header class="masthead d-none d-md-block">
    <div class="wrapper">

      <div class="container-fluid h-100 d-none d-md-block" style="height: 100vh;
        min-height: 215px;
        background-image: url('<?=base_url('img/bg-masthead.jpg')?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
            clip-path: ellipse(64% 77% at 51% 7%);">

      <div class="" ></div>

    </div>

    </div>
  </header>


  <style type="text/css">
    @keyframes carousel-spinner {
  to {transform: rotate(360deg);}
}
 
.carousel-spinner:before {
  content: '';
  box-sizing: border-box;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  border-radius: 50%;
  border: 2px solid #ccc;
  border-top-color: #000;
  animation: spinner .6s linear infinite;
}

  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

  <script type="text/javascript">
    $(function(){
      
      $(".carousel.lazy").on("slide.bs.carousel", function(ev) {
        var lazy;
        lazy = $(ev.relatedTarget);
        lazy.addClass("carousel-spinner");
        lazy.attr("style", "background-image: url("+lazy.data('src')+")");
        lazy.removeAttr("data-src");
        lazy.removeClass("carousel-spinner");
      });

      function doAnimations(elems) {
          //Cache the animationend event in a variable
          var animEndEv = "webkitAnimationEnd animationend";

          elems.each(function() {
            var $this = $(this),
              $animationType = $this.data("animation");
            $this.addClass($animationType).one(animEndEv, function() {
              $this.removeClass($animationType);
            });
          });
        }

      //Variables on page load
      var $myCarousel = $("#header-carousel"),
        $firstAnimatingElems = $myCarousel
          .find(".carousel-item:first")
          .find("[data-animation ^= 'animated']");

      //Initialize carousel
      // $myCarousel.carousel();

      //Animate captions in first slide on page load
      doAnimations($firstAnimatingElems);

      //Other slides to be animated on carousel slide event
      $myCarousel.on("slide.bs.carousel", function(e) {
        var $animatingElems = $(e.relatedTarget).find(
          "[data-animation ^= 'animated']"
        );
        doAnimations($animatingElems);
      });

    })

  </script>