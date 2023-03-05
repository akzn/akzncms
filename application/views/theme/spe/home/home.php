<!-- Carousel -->
<div class="container container-sm home-carousel" style="padding-left: unset;padding-right:unset">
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




  <style type="text/css">
    .home-carousel{
      margin-top: 2vh;
    }
    .product-section-card {
      min-height:250px;
      color:#fff;
      background-position: center; 
      background-size: cover !important;
    }
  .product-box {
    margin: 5px;
    border: 1px solid #e7eaec;
  }
  .product-box:hover {
    border: unset;
    box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.5);
  }
  .product-imitation {
    text-align: center;
    /* padding: 160px 0; */
    padding: 118px 0;
    background-color: #f8f8f9;
    color: #bebec3;
    font-weight: 600;

    background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
  }

.ibox-content.product-box{
  border-radius: 25px;
}
.product-desc {
  padding: 10px;
  position: relative;
  background-color: #f9f9f9;
}

.product-category{
  border-left: 3px solid #ff5400;
  padding-left: 5px;
}
.product-name {
  font-size: 16px;
  /*font-weight: 600;*/
  color: #252525 !important;
  display: block;
  margin: 2px 0 5px 0;
      
}
/*.product-price {
  font-size: 14px;
  font-weight: 600;
  color: #ffffff;
  background-color: #1ab394;
  padding: 6px 12px;
  position: absolute;
  top: -32px;
  right: 0;
}*/

    #services{
      /*background-color: #212529;*/
      /*color:#fff;*/
    }
    #services .services-item {
      padding-top: 60px;
      padding-bottom: 60px;
    }
    #services .services-left {
      /*background-color: #545454;*/
      /*padding-top: 80px;*/
      /*padding-bottom: 80px;*/
      padding-right:40px;
      /*color:#fff;*/
    }
    #services .services-right {
      /*background-color: #fed136;*/
      /*padding-top: 80px;*/
      /*padding-bottom: 80px;*/
      padding-left:40px;
      /*border-left:1px solid #fff;*/
    }
    #services .services-box{
      width: 393px
    }

    
    .owl-prev { left: -20px; }
    .owl-next { 
      right: -20px; 
    }
    .owl-item {
   opacity: 0.3;
   transition: opacity 500ms;
}
.owl-item.active {
  opacity: 1;
}
    /*.owl-prev i, .owl-next i {transform : scale(2,5); color: #ccc;}*/

    section#favourite {
      background-size: cover;
      position: relative;
      background-color: #212529;
      background-image: linear-gradient(
        rgba(0, 0, 0, 0.0), 
        rgba(0, 0, 0, 0.33)
      ),url(<?=base_url()?>img/oiaunsdaus.jpg);
      background-repeat: no-repeat;
      background-position: center;
    }

@media (max-width: 600px) {
    .home-carousel{
      margin-top: 10vh;
    }
      #services .services-box{
        width: auto
      }
      .parent-title{
        text-align: center;
        font-size: 20px;
        /*background-color: #d6d6d6;*/
      }

      #services .services-item {
          padding-top: unset;
          padding-bottom: 60px;
      }

     /* .product-imitation {
        padding: 120px 0;
      }*/
    }
@media (max-width: 1366px) {
  .product-imitation {
    padding: 130px 0;
  }
}
  </style>


  <!-- Product Products Section -->
  <section class="page-section" id="products" data-aos="">
    <div class="container">
      <!-- <h5 class="text-center mt-0" data-aos="">Aset Properti Impian</h5> -->
      <h5 class="parent-title mt-5 text-center mt-5 pt-5" data-aos="">Temukan Properti Impian Anda</h5>
      <!-- <hr class="divider my-4"> -->

      <!-- Page Content -->
      <div>
        <!-- <h5 class="parent-title" data-aos="">Attachment</h5> -->
        <hr>
        <!-- owl -->
        <div class="owl-carousel owl-theme" data-aos="" style="margin-bottom: 30px;">
          <?php foreach ($randomProductItems as $key): ?>
            <?php
              $u_path = 'img/product/';
                        if ($key->image != null && file_exists($u_path . $key->image)) {
                            $image = base_url($u_path . $key->image);
                        } else {
                            $image = base_url('img/no-imag.jpg');
                        }
            ?>
          <div class="ibox">
            <div class="ibox-content product-box">
                <a href="<?=base_url()?>product/<?=$key->url?>">
                <!-- <div class="product-imitation" style="background-image: url('<?=$image?>');"> -->
                <div class="product-imitation lazy" style="background-position: center;background-size: cover;border-radius: 0px;" data-src="<?=base_url($u_path)?><?=$key->image?>" >
                    <!-- <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>"> -->
                </div>
                </a>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="<?=base_url()?>product/<?=$key->url?>" class="product-name"> <?=$key->title?></a>

                    <div class="small m-t-xs">
                        <?=$key->description?>
                    </div>
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>

        <!-- <a href="<?=base_url()?>products" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-3"><?=$this->lang->line('btn_see_more')?></a> -->
      </div>

      <div class="mt-5 " data-aos="">
        <h5 class="parent-title mt-5 text-center" data-aos="">Solusi Hunian Impian Keluarga</h5>
        <hr>
      <!-- owl -->
        <div class="owl-carousel owl-theme" data-aos="" style="margin-bottom: 30px;">
          <?php
            //suffle array temporary for demo
            shuffle($randomProductItems);
          ?>
          <?php foreach ($randomProductItems as $key): ?>
            <?php
              // $u_path = 'img/product/';
                        if ($key->image != null && file_exists($u_path . $key->image)) {
                            $image = base_url($u_path . $key->image);
                        } else {
                            $image = base_url('img/no-image.jpg');
                        }
            ?>
          <div class="ibox" style="    border-radius: 10px;">
            <div class="ibox-content product-box">
                <a href="<?=base_url()?>product/<?=$key->url?>">
                <div class="product-imitation lazy spinner" style="background-position: center;background-size: cover;border-radius: 0px;" data-src="<?=base_url($u_path)?><?=$key->image?>" >
                <!-- <div class="product-imitation lazy spinner" style="background-image: url('<?=$image?>');"> -->
                    <!-- <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>"> -->
                </div>
                </a>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="<?=base_url()?>product/<?=$key->url?>" class="product-name"> <?=$key->title?></a>

                    <div class="small m-t-xs">
                        <?=$key->description?>
                    </div>
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>
      <!-- <a href="<?=base_url()?>products" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-2"><?=$this->lang->line('btn_see_more')?></a> -->
      </div>
    </div>
  </section>

  <style type="text/css">

  </style>






  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bricklayer/0.4.2/bricklayer.min.css">
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bricklayer/0.4.2/bricklayer.min.js"></script> -->
  
  <style type="text/css">


    img.lazy {
        /* optional way, set loading as background */
        background-image: url('<img src="<?=base_url()?>img/loading.gif">');
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
  </style>
  <script>
  $(document).ready(function () {
    // var bricklayer = new Bricklayer(document.querySelector('.bricklayer'));
    $('.lazy').Lazy({
      // your configuration goes here
      scrollDirection: 'vertical',
      effect: 'fadeIn',
      visibleOnly: true,
      // placeholder: '<?=base_url()?>img/loading.gif',
      beforeLoad: function(element) {
        // called before an elements gets handled
        ($(element).is('img')) ? $(element).parent().addClass('spinner') : $(element).addClass('spinner');
      },
      afterLoad: function(element) {
            // called after an element was successfully handled
        ($(element).is('img')) ? $(element).parent().removeClass('spinner') : $(element).removeClass('spinner');
        AOS.refresh();
      },
      onError: function(element) {
        ($(element).is('img')) ? $(element).parent().removeClass('spinner') : $(element).removeClass('spinner');
          console.log('error loading ' + element.data('src'));
      },
      enableThrottle:true,
      throttle:2000,
      removeAttribute:false,
    })
    // $(".gallery-container").lazyload({
    //   placeAttr:"data-src",
    // });

  });
  </script>
  <style type="text/css">
    .page-section{
      padding:20px 0
    }
    section#contact,#about,#clients{
      background: url(<?=base_url()?>/img/footer_bg.png);
      background-repeat: repeat ;
      /*background-attachment: fixed;*/
      background-size: cover;
      position: relative;
      z-index: 9;
    }
    section#contact:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #383d41;
        opacity: .94;
    }
    #about:after,#clients:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #ffffff;
        opacity: .94;
    }
    #services .services-box{
      background: url(<?=base_url()?>/img/plugset-1.png);
      background-repeat: no-repeat ;
      /*background-attachment: fixed;*/
      /*background-size: cover;*/
      background-position: top;
      position: relative;
      z-index: 9;
    }
    #services .services-left.services-box{
      background: url(<?=base_url()?>/img/yb.png);
      background-repeat: no-repeat ;
      /*background-size: cover;*/
      background-position: top;
      position: relative;
      z-index: 9;
    }
    #services .services-box:after{
      position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: #ffffff;
        opacity: .9;
    }
  </style>


  
  <!-- Favourite -->
  <section class="page-section p-5 d-none d-sm-block" id="favourite" style="padding:7rem!important">
      <div class="container" style="    color: white;">
          <div class="text-center mb-5">
              <h3 class="section-heading text-uppercase" style="    background-color: #0000004a;padding:1rem">Properti Unggulan Kami</h3>
          </div>
          <div class="row" style="    background-color: #0000004a;padding:2rem">
            <div class="col-md-6">
                <h4>What is Lorem Ipsum?</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                <ul>
                  <li>It has survived not only five centuries, </li>
                  <li>also the leap into electronic typesetting, </li>
                  <li>essentially unchanged. </li>
                  <li>was popularised in the 1960s with the release of Letraset </li>
                </ul>
            </div>
            <div class="col-md-6">
              <div class="text-center" data-aos="">
                <!-- <img class="img img-fluid" width="300" src="<?=base_url()?>img/repairs-vec.png"> -->
                <img class="img img-fluid spinner lazy" width="400" data-src="<?=base_url()?>img/b4a9db541f8d5c.jpg" style="    border-radius: 20px;">
                <!-- <img class="lazy img-fluid" width="400" src="<?=base_url()?>img/loading.gif" data-src="<?=base_url()?>img/repair-1.jpg?>"> -->
              </div>
            </div>
          </div>
      </div>
  </section>

    <!-- About -->
    <section class="page-section" id="services">
    <div class="container">
      <div class="row services-item">
        <div class="col-md-6 d-none d-sm-block services-left" style="background-position: center;background-size: cover;">
          <div class="text-center" data-aos="">
            <!-- <img class="img img-fluid" width="300" src="<?=base_url()?>img/repairs-vec.png"> -->
            <img class="img img-fluid spinner lazy" width="400" data-src="<?=base_url()?>img/b4a9db541f8d5c.jpg" style="    border-radius: 20px;">
            <!-- <img class="lazy img-fluid" width="400" src="<?=base_url()?>img/loading.gif" data-src="<?=base_url()?>img/repair-1.jpg?>"> -->
          </div>
        </div>
        <div class="col-md-6 col-12 services-right services-box" style="padding-top: 20px;">
          <div class="" data-aos="">
            <h4 class="pb-3"><?=$site['nameweb']?></h4>
            <p class="mb-5" ><?=$site['metatext']?></p>
            <a href="<?=base_url()?>about"  class="btn btn-primary btn-xl float-left"><?=$this->lang->line('btn_read_more')?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- services -->
  <style>
    .page-section#services .card{
      border-radius: 20px;
      border:1px solid var(--primary-color)
    }
  </style>
  <section class="page-section" id="services">
    <div class="container">
      <h4 class="text-center mb-4">Mengapa Memilih Kami ?</h4>
      <div class="row services-item text-center">
        <div class="col-md-3 services-left" style="background-position: center;background-size: cover;    margin-bottom: 10px;">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <div class="text-center mt-4 mb-4" style="font-size: 2em;"><i class="fas fa-check-circle"></i></div>
              <h5 class="card-title">Lebih dari sekadar Developer</h5>
              <p class="card-text">Kami menghadirkan ribuan unit properti dengan konsep nilai tambah yang mengerti kebutuhan anda.</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 services-left" style="background-position: center;background-size: cover;    margin-bottom: 10px;">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <div class="text-center mt-4 mb-4" style="font-size: 2em;"><i class="fas fa-check-circle"></i></div>
              <h5 class="card-title">Properti Yang Beragam</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 services-left" style="background-position: center;background-size: cover;    margin-bottom: 10px;">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <div class="text-center mt-4 mb-4" style="font-size: 2em;"><i class="fas fa-check-circle"></i></div>
              <h5 class="card-title">Legalitas Aman</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 services-left" style="background-position: center;background-size: cover;    margin-bottom: 10px;">
          <div class="card" style="width: auto;">
            <div class="card-body">
              <div class="text-center mt-4 mb-4" style="font-size: 2em;"><i class="fas fa-check-circle"></i></div>
              <h5 class="card-title">Lebih Menguntungkan</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <style type="text/css">
    .owl-carousel .owl-item .owl-lazy.loaded{
      opacity: 1;
    }
  </style>
  <link rel="stylesheet" href="<?=base_url()?>assets/owl-carousel-2.3.4/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/owl-carousel-2.3.4/owl.theme.default.min.css">
  <script src="<?=base_url()?>assets/owl-carousel-2.3.4/owl.carousel.min.js"></script>
  <script type="text/javascript">
    $(function(){
      // $("body").lazyload({
      //       placeAttr:"data-src",
      //   });
      $('#clients .owl-carousel').owlCarousel({
            loop:true,
            margin:20,
            stagePadding:50,
            nav:true,
            lazyLoad:true,
            autoplay:true,
            dots: false,
            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })

      $('#products .owl-carousel').owlCarousel({
            loop:true,
            margin:20,
            stagePadding:50,
            nav:true,
            lazyLoad:true,
            autoplay:false,
            dots: false,
            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    })
  </script>