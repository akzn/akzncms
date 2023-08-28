
<style type="text/css">



body {
    /*padding-top: 50px; */
     /* allow for space above page content */
}

.navbar.fixed-top {
    margin-top: 40px;
     /* hieght of the first fixed element */ 
}

.navbar.fixed-top.navbar-shrink {
    margin-top: 0; /* hieght of the first fixed element */ 
    border-bottom: 0;
    /*background-color: #131313!important;*/
}
#mainNav.fixed-top .social-nav {
    display: none;
}
#mainNav.fixed-top.navbar-shrink .social-nav {
    display: contents;
}

.nav-top {
  background-color: #0000004a;
  color: #fff;
  font-weight: 400;
  padding: 15px;
  font-size: 14px;
}

.nav-top .left{
  text-align: left!important;
}

.nav-top .right{
  text-align: right!important;
}

.nav-item-top {
  color: #fff;
}


.carousel-fade .carousel-inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-control {
  z-index: 2;
}



@media (max-width: 600px) {
  .nav-top {
    bottom: 0;
    top: auto;
  }

  #mainNav.fixed-top .social-nav {
      display: contents;
  }

  .navbar.fixed-top {
      margin-top:0;
  }

  .nav-top .left{
    text-align: center!important;
  }

  .nav-top .right{
    text-align: center!important;
  }
  #mainNav .navbar-collapse{
    background-color: #0000005e;
    margin-left: -15px;
    margin-right: -15px;
    padding-left: 15px;
    padding-right: 15px;
  }

  #mainNav.navbar-shrink .navbar-collapse{
    background-color: unset;
  }

  <?php if ($page != 'Home'): ?>
      #mainNav {
    background-color: #fff!important;
  }

  #mainNav .navbar-nav .nav-item .nav-link {
      /* color: black; */
      color: #000;
  }

  .style-green #mainNav .navbar-toggler {
    /* background-color: #007d1d; */
        background-color: unset;
        color: #000;
    }

  #mainNav .navbar-collapse{
    background-color: unset;
  }
  <?php endif ?>

}
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
        <div class="col-md-6 col-12 right">
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>"><?=$this->lang->line('home')?></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=$this->lang->line('products')?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/attachments">Attachments</a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/sparepart-breaker">Spareparts</a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/fix-repair"><?=$this->lang->line('landing_service_repair_heading')?></a>
              <a style="color: black" class="dropdown-item" href="<?=base_url()?>products/rental"><?=$this->lang->line('landing_service_rental_heading')?></a>
            </div>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url('shop')?>">Shop</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url('gallery')?>">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>about"><?=$this->lang->line('about')?></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">Team</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>contact"><?=$this->lang->line('contact')?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url('career')?>"><?=$this->lang->line('career')?></a>
          </li>
        </ul>
        <ul class="navbar-nav flex-row social-nav">
            <li class="nav-item">
              <?php if ($site['twitter']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['twitter']?>"><span class="fab fa-twitter" style="padding: .5rem;"></span></a>
              <?php endif ?>
              <?php if ($site['facebook']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['facebook']?>"><span class="fab fa-facebook" style="padding: .5rem;"></span></a>
              <?php endif ?>
              <?php if ($site['instagram']!=''): ?>
              <a class="nav-link px-2" style="display: contents;" href="<?=$site['instagram']?>"><span class="fab fa-instagram" style="padding: .5rem;"></span></a>
              <?php endif ?>
            </li>
        </ul>

        <?php $lang_abr = ($_COOKIE['lang'] == 'english') ? 'EN' : 'ID'?>
        <ul class="navbar-nav">
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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  
    
     <!-- CAROUSEL -->
     <?php if ($page == 'Home'): ?>
      <header class="masthead">
    <div class="wrapper">
     <div id="header-carousel" class="carousel slide carousel-fade lazy" data-ride="carousel" data-pause="false" data-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item active lazy spinner" style="" data-src="<?=base_url('img/slider/'.$slider[0]->slider_image)?>">
          <!-- <img class="d-block w-100" src="<?=base_url()?>img/slider/slider-1.jpg" alt="First slide"> -->
          <div class="carousel-overlay"></div>
          <div class="carousel-caption">
              <h4 class="text-uppercase text-white font-weight-bold" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[0]->slider_title : $this->lang->line('slider_heading_1')?>
              </h4>
              <hr class="divider my-4">
              <p class="lead text-white font-weight-light mb-5" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[0]->slider_description : $this->lang->line('slider_content_1')?>
              </p>
              <a href="#about" class="btn btn-lg btn-primary" data-animation="animated fadeInDown"><?=$this->lang->line('btn_read_more')?></a>
          </div><!-- end carousel-caption -->
        </div>
        <div class="carousel-item" style="" data-src="<?=base_url('img/slider/'.$slider[1]->slider_image)?>" >
          <!-- <img class="d-block w-100" src="<?=base_url()?>img/slider/slider-2.jpg" alt="Second slide"> -->
          <div class="carousel-overlay"></div>
          <div class="carousel-caption">
              <h4 class="text-uppercase text-white font-weight-bold" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[1]->slider_title : $this->lang->line('slider_heading_2')?>
              </h4>
              <hr class="divider my-4">
              <p class="lead text-white font-weight-light mb-5" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[1]->slider_description : $this->lang->line('slider_content_2')?>
              </p>
              <a href="#about" class="btn btn-lg btn-primary" data-animation="animated fadeInDown"><?=$this->lang->line('btn_read_more')?></a>
          </div><!-- end carousel-caption -->
        </div>
        <div class="carousel-item" data-src="<?=base_url('img/slider/'.$slider[2]->slider_image)?>">
          <!-- <img class="d-block w-100" src="<?=base_url()?>img/slider/slider-3.jpg" alt="Third slide"> -->
          <div class="carousel-overlay"></div>
          <div class="carousel-caption">
              <h4 class="text-uppercase text-white font-weight-bold" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[2]->slider_title : $this->lang->line('slider_heading_3')?>
              </h4>
              <hr class="divider my-4">
              <p class="lead text-white font-weight-light mb-5" data-animation="animated fadeInDown">
                <?= ($this->session->userdata('site_lang')=='indonesian') ? $slider[2]->slider_description : $this->lang->line('slider_content_3')?>
              </p>
              <a href="#about" class="btn btn-lg btn-primary" data-animation="animated fadeInDown"><?=$this->lang->line('btn_read_more')?></a>
          </div><!-- end carousel-caption -->
        </div>
      </div>
    </div>
    </div>
  </header>
    <?php else: ?>
      <style type="text/css">
        header.masthead{
          background:unset;
        }
    </style>
     <header class="masthead d-none d-md-block">
    <div class="wrapper">
    <!-- <div class="container-fluid h-100 d-none d-md-block" style="height: 100vh;
        min-height: 300px;
        background-image: url('<?=base_url('img/bg-masthead.jpg')?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">
      <div class="" style="position: absolute;
        top: 0;
        left: 0;
        right: 0;
        /*bottom: 0;*/
        background: rgb(0 0 0 / 52%);
            min-height: 300px;
        "></div>
    
  </div>
  <div class="" style="border-top: 300px solid #ff000000;
      border-left: 50px solid transparent;
      border-right: 710vh solid #f8f9fa;
      height: 0;
      width: 100px;
      top: -72vh;
      position: relative;">
    </div> -->

    <div class="container-fluid h-100 d-none d-md-block" style="height: 100vh;
        min-height: 215px;
        background-image: url('<?=base_url('img/bg-masthead.jpg')?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
            clip-path: ellipse(64% 77% at 51% 7%);">

        <div class="" style="position: absolute;
        top: 0;
        left: 0;
        right: 0;
        /*bottom: 0;*/
        background: rgb(0 0 0 / 52%);
            min-height: 215px;
                /*clip-path: ellipse(64% 77% at 51% 7%);*/
        "></div>

    </div>

</div>
  </header>

    <?php endif ?>
  

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