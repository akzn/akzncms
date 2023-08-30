  <!-- About -->
<!--   <section class="page-section bg-primary" id="about"> -->
  <!-- <section class="page-section" id="about" style="background-color: #f3f3f3;"> -->
    <section class="page-section" id="about" data-aos="zoom-in">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h5 class=" mt-0" data-aos="zoom-in"><?=$this->lang->line('h_about_us')?></h5>
          <hr class="divider  my-4">
          <p class=" mb-4 text-justify" data-aos="zoom-in">
          <?=$this->lang->line('landing_about')?>
          </p>
          <!-- <a class="btn btn-light btn-xl js-scroll-trigger" href="<?=base_url('shop')?>">See Our Products</a> -->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?=base_url()?>about"><?=$this->lang->line('btn_read_more')?></a>
        </div>
      </div>
    </div>
  </section>

  <style type="text/css">

    #mainNav .navbar-toggler {
        color: #fff;
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
    padding: 160px 0;
    background-color: #f8f8f9;
    color: #bebec3;
    font-weight: 600;

    background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
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

    .container-promo{
          margin-top:4vh;
          margin-bottom:4vh;
      }

@media (max-width: 600px) {
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

      .container-promo{
          margin-top:2vh
      }
    }
@media (max-width: 1366px) {
  .product-imitation {
    padding: 130px 0;
  }
}
  </style>


  <!-- Product Products Section -->
  <section class="page-section" id="products" data-aos="zoom-in">
    <div class="container">
      <h5 class="text-center mt-0" data-aos="zoom-in"><?=$this->lang->line('h_our_products')?></h5>
      <hr class="divider my-4">

      <!-- Page Content -->
      <div>
        <h5 class="parent-title" data-aos="zoom-in">Attachment</h5>
        <hr>
        <!-- owl -->
        <div class="owl-carousel owl-theme" data-aos="zoom-in" style="margin-bottom: 30px;">
        <?php
          /**
           * hack for attachment 
           * 
           */
          # attachment
          $this->db->select('a.title,a.image,b.name as categori_name, a.url');
          $this->db->join('product_categories b', "a.shop_categorie = b.id");
          $this->db->where('b.sub_for',11);
          $this->db->or_where('b.id',11);
          $this->db->limit(10);
          $product_attachments = $this->db->get('products a')->result();
        ?>
          <?php foreach ($product_attachments as $key): ?>
            <?php
              $u_path = 'img/shop/';
                        if ($key->image != null && file_exists($u_path . $key->image)) {
                            $image = base_url($u_path . $key->image);
                        } else {
                            $image = base_url('img/no-image-1.png');
                        }
            ?>
          <div class="ibox">
            <div class="ibox-content product-box">
                <a href="<?=base_url()?>product/<?=$key->url?>">
                <!-- <div class="product-imitation" style="background-image: url('<?=$image?>');"> -->
                <div class="product-imitation lazy" style="background-position: center;background-size: cover;border-radius: unset;" data-src="<?=base_url()?>img/shop/<?=$key->image?>" >
                    <!-- <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>"> -->
                </div>
                </a>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="<?=base_url()?>product/<?=$key->url?>" class="product-name"> <?=$key->title?></a>

                    <!-- <div class="small m-t-xs">
                        dummy
                    </div> -->
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>

      <a href="<?=base_url()?>products/?category=11" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-3"><?=$this->lang->line('btn_see_more')?></a>
      </div>

      <div class="mt-5 pt-5" data-aos="zoom-in">
        <h5 class="parent-title mt-5" data-aos="zoom-in">Spareparts</h5>
        <hr>
      <!-- owl -->
        <div class="owl-carousel owl-theme" data-aos="zoom-in" style="margin-bottom: 30px;">
          <?php foreach ($spareparts as $key): ?>
            <?php
              $u_path = 'img/shop/';
                        if ($key->image != null && file_exists($u_path . $key->image)) {
                            $image = base_url($u_path . $key->image);
                        } else {
                            $image = base_url('img/no-image-1.png');
                        }
            ?>
          <div class="ibox">
            <div class="ibox-content product-box">
                <a href="<?=base_url()?>product/<?=$key->url?>">
                <div class="product-imitation lazy spinner" style="background-position: center;background-size: cover;border-radius: unset;" data-src="<?=base_url()?>img/shop/<?=$key->image?>" >
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

                    <!-- <div class="small m-t-xs">
                        dummy
                    </div> -->
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>
      <a href="<?=base_url()?>products/?category=15" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-2"><?=$this->lang->line('btn_see_more')?></a>
      </div>
    </div>
  </section>

  <style type="text/css">

  </style>

  <!-- Product Services Section -->
  <section class="page-section mt-4" id="services" style="">
    <div class="container">
      <h5 class="text-center mt-0" data-aos="zoom-in"><?=$this->lang->line('h_other_services')?></h5>
      <hr class="divider my-4">
      <div class="row services-item">
        <div class="col-md-6 d-none d-sm-block services-left" style="background-position: center;background-size: cover;">
          <div class="text-center" data-aos="zoom-in">
            <!-- <img class="img img-fluid" width="300" src="<?=base_url()?>img/repairs-vec.png"> -->
            <img class="img img-fluid spinner lazy" width="400" data-src="<?=base_url()?>img/repair-1.jpg">
            <!-- <img class="lazy img-fluid" width="400" src="<?=base_url()?>img/loading.gif" data-src="<?=base_url()?>img/repair-1.jpg?>"> -->
          </div>
        </div>
        <div class="col-md-6 col-12 services-right services-box" style="padding-top: 50px;">
          <div class="" data-aos="zoom-in">
            <h5 class="pb-3"><?=$this->lang->line('landing_service_repair_heading')?></h5>
            <p class="mb-5 pb-3" ><?=$this->lang->line('landing_service_repair_content')?></p>
            <a href="<?=base_url()?>products/?category=16"  class="btn btn-primary btn-xl float-left"><?=$this->lang->line('btn_read_more')?></a>
          </div>
        </div>
      </div>
      <div class="row services-item">
        <div class="col-md-6 services-left services-box" style="padding-top: 50px;">
          <div class="float-right " data-aos="zoom-in">
            <h5 class="text-right pb-3" ><?=$this->lang->line('landing_service_rental_heading')?></h5>
            <p class="text-right mb-5 pb-3"> <?=$this->lang->line('landing_service_rental_content')?></p>
            <a href="<?=base_url()?>products/?category=17" class="bnt btn-primary  float-right btn-xl"><?=$this->lang->line('btn_read_more')?></a>
          </div>
        </div>
        <div class="col-md-5 d-none d-sm-block services-right" style="background-position: center;background-size: cover;">
          <div class="text-center" data-aos="zoom-in">
            <!-- <img class="img img-fluid" width="300" src="<?=base_url()?>img/rentals-vec.png"> -->
            <img class="lazy img-fluid" width="400" data-src="<?=base_url()?>img/rent-1.jpg?>">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Clients -->
  <section class=" page-section" id="clients">
    <div class="container">
      <h5 class="text-center mt-0" data-aos="zoom-in"><?=$this->lang->line('h_our_partners')?></h5>
      <hr class="divider my-4 mb-5">
      <div class="justify-content-center owl-carousel owl-theme mt-5 pt-5" data-aos="zoom-in">
        <?php foreach ($clients as $key): ?>
          <div class="item"><img class="img-fluid d-block mx-auto owl-lazy lazy" data-src="<?=base_url()?>img/clients/<?=$key->image?>" alt="" style="height: 80px;width:auto"></div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
<style type="text/css">
  section#section-video .item {
    margin-bottom: 10px;
    cursor: pointer;
  }
  section#section-video .bg-img {
    position: relative;
    min-height :220px;
    background-position: center center;
    background-repeat: no-repeat;
    /*background-attachment: scroll;*/
    background-size: cover;
    box-shadow:inset 0px 0px 69px rgb(0 0 0 / 76%);
    -webkit-transition: opacity 0.5s ease-in-out;
    -moz-transition: opacity 0.5s ease-in-out;
    transition: opacity 0.5s ease-in-out;

  }
  section#section-video .bg-img:hover {
    opacity: 0.75;
  }
  section#section-video .play-btn {
        background: #000000b5;
    padding: 12px 20px 10px 23px;
    border-radius: 10px;
    position: absolute;
    top: 36%;
    left: 40%;
    z-index: 10;
  }
  section#section-video .play-btn i {
    font-size: 35px;
    color:#fff;
  }
</style>
<!-- Section Video -->
<section class="page-section" id="section-video">
    <div class="container">
      <h5 class="parent-title" data-aos="zoom-in">Video Produk Kami</h5>
      <hr>
      <div class="row mb-4">
        <?php foreach ($videos as $key => $value): ?>
            <div class="col-md-3 item bootstrap-fancy-video" data-aos="zoom-in" data-fancy-src="<?=$value->video_url?>">
              <div class="bg-img" style="background-image: url('<?=base_url()?>img/gallery/<?=$value->image?>')"></div>
              <div class="play-btn"><i class="fas fa-play"></i></div>
            </div>
        <?php endforeach ?>
        <!-- <div class="col-md-3 item bootstrap-fancy-video" data-aos="zoom-in" data-fancy-src="<?=base_url()?>video/sample-1.mp4">
          <div class="bg-img" style="background-image: url('<?=base_url()?>img/video/1.jpg')"></div>
          <div class="play-btn"><i class="fas fa-play"></i></div>
        </div>
        <div class="col-md-3 item bootstrap-fancy-video" data-aos="zoom-in" data-fancy-src="<?=base_url()?>video/sample-2.mp4">
          <div class="bg-img" style="background-image: url('<?=base_url()?>img/video/2.jpg')"></div>
          <div class="play-btn"><i class="fas fa-play"></i></div>
        </div>
         <div class="col-md-3 item bootstrap-fancy-video" data-aos="zoom-in" data-fancy-src="<?=base_url()?>video/sample-2.mp4">
          <div class="bg-img" style="background-image: url('<?=base_url()?>img/video/3.jpg')"></div>
          <div class="play-btn"><i class="fas fa-play"></i></div>
        </div>
         <div class="col-md-3 item bootstrap-fancy-video" data-aos="zoom-in" data-fancy-src="<?=base_url()?>video/sample-2.mp4">
          <div class="bg-img" style="background-image: url('<?=base_url()?>img/video/4.jpg')"></div>
          <div class="play-btn"><i class="fas fa-play"></i></div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-md-12" data-aos="zoom-in">
          <a href="" class="btn btn-primary btn-xl float-right">Lihat lainnya</a>
        </div>
      </div>
    </div>
</section>

<!-- Gallery -->
  <section class=" page-section" id="gallery" style="    ">
    <div class="container-fluid">
      <!-- <h5 class="text-center mt-0">Gallery</h5> -->
      <h5 class="text-center" data-aos="zoom-in"><?=$this->lang->line('h_contact_us_now')?></h5>
      <hr class="divider my-4 mb-5">
      <div class="justify-content-center">
              
        <div class="text-center mt-5 gallery-container mx-auto" data-aos="zoom-in">
          <div class="bricklayer mb-5 ftco-animate">
            <?php 
              $dirthumbs = "img/gallery/thumbs/";
              $dir = "img/gallery/";
              $i = 0;
              if (is_dir($dirthumbs)) {
                      chdir($dirthumbs);
                      array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
                      foreach($files as $filename)
                      {
                        ?>

                        <div class="gallery-item bootstrap-fancy-img lazy" id="bootstrap-fancy-img" style="background-position: center;background-size: cover;border-radius: unset;" data-fancy-src="<?= base_url($dir . $filename) ?>" data-src="<?= base_url($dir . $filename) ?>" data-alt="<?=$filename?>" >
                    
                        </div>

                        <?php
                        if (++$i == 12) break;
                      }
                  }?>
          </div>
          <a href="<?=base_url()?>gallery" class="btn btn-primary btn-xl"><?=$this->lang->line('btn_more')?></a>
     </div>

      </div>
    </div>
  </section>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bricklayer/0.4.2/bricklayer.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bricklayer/0.4.2/bricklayer.min.js"></script>
  
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
    var bricklayer = new Bricklayer(document.querySelector('.bricklayer'));
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
  <!-- Contact -->
  <section class="page-section text-white d-none" id="contact" style="">
    <div class="container">
        <h5 class="text-center mt-0 text-white">Tinggalkan Pesan</h5>
        <hr class="divider light my-4">
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm-ha" name="sentMessage" novalidate="novalidate" action="<?=base_url()?>kontak" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <!-- <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div> -->
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Subject *" required="required" data-validation-required-message="Please enter the subject." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name="messages" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit"><?=$this->lang->line('btn_send_message')?></button>
              </div>
            </div>
          </form>
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
                    items:2
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
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
                    items:4
                }
            }
        })
    })
  </script>