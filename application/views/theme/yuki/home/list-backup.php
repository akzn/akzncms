  <!-- About -->
<!--   <section class="page-section bg-primary" id="about"> -->
  <section class="page-section" id="about" style="background-color: #f7f9fb;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class=" mt-0">Tentang Kami</h2>
          <hr class="divider  my-4">
          <p class=" mb-4">
          <?=$site['metatext']?>
          </p>
          
          <!-- <a class="btn btn-light btn-xl js-scroll-trigger" href="<?=base_url('shop')?>">See Our Products</a> -->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?=base_url()?>about">Selengkapnya</a>
        </div>
      </div>
    </div>
  </section>

  <style type="text/css">
    .product-section-card {
      min-height:250px;
      color:#fff;
      background-position: center; 
      background-size: cover !important;
    }
.product-box {
  padding: 0;
  border: 1px solid #e7eaec;
}
    .product-imitation {
  text-align: center;
  padding: 165px 0;
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
  font-weight: 600;
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

    .owl-prev, .owl-next {
        width: 15px;
        height: 100px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        display: block !important;
        border:0px solid black;
        width: 40px;
      height: 40px;
      background: #222222!important;
      color: #ccc!important;
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

    @media (max-width: 600px) {
      #services .services-box{
        width: auto
      }
      .parent-title{
        text-align: center;
        font-size: 20px;
        background-color: #d6d6d6;
      }
    }
  </style>


  <!-- Product Products Section -->
  <section class="page-section" id="products">
    <div class="container">
      <h2 class="text-center mt-0">Produk Kami</h2>
      <hr class="divider my-4">

      <!-- Page Content -->
      <div>
        <h3 class="parent-title">Attachment</h3>
        <hr>
        <!-- owl -->
        <div class="owl-carousel owl-theme">
          <?php foreach ($attachments as $key): ?>
          <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation" style="background-image: url('<?=base_url()?>img/shop/<?=$key->image?>');">
                    <!-- <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>"> -->
                </div>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="#" class="product-name"> <?=$key->title?></a>

                    <!-- <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                    </div> -->
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>
     <div class="row d-none">
        <?php foreach ($attachments as $key): ?>
        <div class="col-lg-3 col-sm-6 mb-4 col-6">
          <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">
                    <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>">
                </div>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="#" class="product-name"> <?=$key->title?></a>

                    <!-- <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                    </div> -->
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach ?>

      </div> 
      <a href="" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-3">Lihat Lainnya</a>
      </div>

      <div class="mt-5 pt-5">
        <h3 class="parent-title mt-5">Spareparts</h3>
        <hr>
      <!-- owl -->
        <div class="owl-carousel owl-theme">
          <?php foreach ($attachments as $key): ?>
          <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation" style="background-image: url('<?=base_url()?>img/shop/<?=$key->image?>');">
                    <!-- <img class="img-fluid" src="<?=base_url()?>img/shop/<?=$key->image?>"> -->
                </div>
                <div class="product-desc">
                    <!-- <span class="product-price">
                        $10
                    </span> -->
                    <small class="text-muted product-category"><?=$key->categori_name?></small>
                    <a href="#" class="product-name"> <?=$key->title?></a>

                    <!-- <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                    </div> -->
                    <div class="m-t text-righ">

                        <!-- <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a> -->
                    </div>
                </div>
            </div>
        </div>
          <?php endforeach ?>
        </div>
      <a href="" class="btn btn-primary btn-xl js-scroll-trigger float-right mt-2">Lihat Lainnya</a>
      </div>
    </div>
  </section>

  <style type="text/css">

  </style>

  <!-- Product Services Section -->
  <section class="page-section mt-4" id="services" style="background-color: #f9f9f9;">
    <div class="container">
      <h2 class="text-center mt-0">Services</h2>
      <hr class="divider my-4">
      <div class="row services-item">
        <div class="col-md-6 d-none d-sm-block services-left">
          <div class="text-center">
            <img class="img img-fluid" width="300" src="<?=base_url()?>img/repairs-vec.png">
          </div>
        </div>
        <div class="col-md-6 col-12 services-right">
          <div class="services-box">
            <h4 class="pb-3">Jasa Repair</h4>
            <p class="mb-5 pb-3">kami menawarkan jasa reparasi unit anda dengan kualitas sesuai yang anda inginkan. Hubungi kontak kami yang tertera di website ini.</p>
            <a href="" class="bnt btn-primary btn-xl float-right">Lebih Lanjut</a>
          </div>
        </div>
      </div>
      <div class="row services-item">
        <div class="col-md-6 services-left">
          <div class="float-right services-box">
            <h4 class="text-right pb-3">Jasa Rental</h4>
            <p class="text-right mb-5 pb-3"> Kami juga menyediakan berbagai alat berat yang bisa anda gunakan untuk berbagai keperluan konstruksi anda. Hubungi kontak kami yang tertera di website ini.</p>
            <a href="" class="bnt btn-primary btn-xl">Lebih Lanjut</a>
          </div>
        </div>
        <div class="col-md-6 d-none d-sm-block services-right">
          <div class="text-center">
            <img class="img img-fluid" width="300" src="<?=base_url()?>img/rentals-vec.png">
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Product Gallery Section -->
  <section class="page-section d-none" id="products">
    <div class="container">
      <h2 class="text-center mt-0">Produk Kami</h2>
      <hr class="divider my-4">
       <!-- Page Content -->

      <div class="container text-center mt-5">
    <div class="row">
        <div class="col-lg-3 col-sm-6 mb-4">
          <a href="<?=base_url('products')?>?category=11" style="text-decoration: none;">
            <div class="product-section-card card border-0 shadow rounded-xs" style="background: linear-gradient(to bottom, #49505770 0%, #383d41 100%), url('<?= base_url()?>img/home/1.png');">
                <div class="card-body" style="display: flex;
  align-items: center;
  justify-content: center;"> <!-- <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i> -->
                    <h4 class="mt-4 mb-3" style="min-height: 55px;">Attachments</h4>
                    <p class="card-desc d-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
          <a href="<?=base_url('products')?>?category=15" style="text-decoration: none;">
            <div class="product-section-card card border-0 shadow rounded-xs" style="background: linear-gradient(to bottom, #49505770 0%, #383d41 100%), url('<?= base_url()?>img/home/2.png');">
                <div class="card-body" style="display: flex;
  align-items: center;
  justify-content: center;"> <!-- <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i> -->
                    <h4 class="mt-4 mb-3" style="min-height: 55px;">Spareparts</h4>
                    <p class="card-desc d-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
          <a href="<?=base_url('products')?>?category=16" style="text-decoration: none;">
            <div class="product-section-card card border-0 shadow rounded-xs" style="background: linear-gradient(to bottom, #49505770 0%, #383d41 100%), url('<?= base_url()?>img/home/3.png');">
                <div class="card-body" style="display: flex;
  align-items: center;
  justify-content: center;"> <!-- <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i> -->
                    <h4 class="mt-4 mb-3" style="min-height: 55px;">Repairs</h4>
                    <p class="card-desc d-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
          <a href="<?=base_url('products')?>?category=17" style="text-decoration: none;">
            <div class="product-section-card card border-0 shadow rounded-xs" style="background: linear-gradient(to bottom, #49505770 0%, #383d41 100%), url('<?= base_url()?>img/home/4.png');">
                <div class="card-body" style="display: flex;
  align-items: center;
  justify-content: center;"> <!-- <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i> -->
                    <h4 class="mt-4 mb-3" style="min-height: 55px;">Rental</h4>
                    <p class="card-desc d-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            </a>
        </div>
    </div>

       <!--  <div class="card-deck">
          <div class="card">
            <div class="card-body text-center">
              <img class="card-img-top img-fluid p-0" src="<?=base_url()?>img/home/alat-berat.png" alt="">
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <img class="card-img-top img-fluid p-0" src="<?=base_url()?>img/home/sparepart.png" alt="">
            </div>
          </div>

        </div> -->

          <!-- <div class="card-columns">
            <?php if ($products): ?>
            <?php foreach ($products as $key): ?>
                <?php
                  /* if image file exist or not*/
                  $u_path = 'img/shop/';
                    if ($key->image != null && file_exists($u_path . $key->image)) {
                        $image = base_url($u_path . $key->image);
                    } else {
                        $image = base_url('img/no-image.png');
                    }
                ?>
                <div class="card">
                <div class="hovereffect">
                  <img class="card-img-top img-fluid p-0" src="<?=$image?>" alt="">
                  <div class="overlay">
                    <div class="box">
                        <h2><?=$key->title?></h2>
                        <a class="info" href="<?=base_url('product/'.$key->url)?>">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
              

          </div> -->
     </div>

    </div></div>
    <div class="text-center mt-5">
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="<?=base_url('products')?>">Find Out More</a>
    </div>
  </section>

  <!-- Clients -->
  <section class=" page-section" id="clients">
    <div class="container">
      <h2 class="text-center mt-0">Mitra Kami</h2>
      <hr class="divider my-4 mb-5">
      <div class="justify-content-center owl-carousel owl-theme mt-5 pt-5">
        <?php foreach ($clients as $key): ?>
          <div class="item"><img class="img-fluid d-block mx-auto owl-lazy" data-src="<?=base_url()?>assets/upload/image/<?=$key->image?>" alt="" style="height: 120px"></div>
        <?php endforeach ?>
      </div>
    </div>
  </section>



  <!-- Contact -->
  <section class="page-section text-white" id="contact">
    <div class="container">
        <h2 class="text-center mt-0 text-white">Tinggalkan Pesan</h2>
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
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
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