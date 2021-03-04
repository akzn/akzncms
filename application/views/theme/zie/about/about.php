<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              Check out Who We Are
            </h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="about">
  <div class="container container-content">
   <div class="row">
     <div class="col-md-12" data-aos="zoom-in">
      
      <?php if ($site['about']): ?>

      <?php if ($_COOKIE['lang'] == 'english') {
                      $description = get_string_between($site['about'],'[en]','[/en]');
                  } else {
                      $description = get_string_between($site['about'],'[id]','[/id]');
                  }?>

                  <?php $description = (!$description) ? str_replace(array('[en]', '[/en]','[id]', '[/id]'), array('', '','',''), $site['about']) : $description ?>

                  <p style="font-size: 16px"><?=$description?></p>
    <?php else: ?>
      <p style="font-size: 16px">TBA</p>
    <?php endif ?>

     </div>
   </div>
</div>
</section>


<section class="guarantee text-center">
  <div class="container container-content">
    <div class="row">
      <div class="col-md-12 mx-auto mb-5" data-aos="zoom-in">
        <h3>Why Ziemotion Studio ?</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" data-aos="zoom-in">
        <div class="card mx-auto">
          <i class="card-icon-top fa fa-clock" src="..." alt="Card image cap"></i>
          <div class="card-body">
            <h3 class="card-title">Works On Time</h3>
            <p class="card-text">We Appreciate Every Time The Work Is Given Because Time Is So Precious And We Don't Want To Disappoint You.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <div class="card mx-auto">
          <i class="card-icon-top fa fa-users" src="..." alt="Card image cap"></i>
          <div class="card-body">
            <h3 class="card-title">Professional Team</h3>
            <p class="card-text">Our Team Is Experienced In Every Field. Committed To Providing The Best Service For You.</p>
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6" data-aos="zoom-in">
        <div class="card mx-auto">
          <i class="card-icon-top fa fa-money-bill-wave" src="..." alt="Card image cap"></i>
          <div class="card-body">
            <h3 class="card-title">Affordable Prices</h3>
            <p class="card-text">Provide The Best Results On Time With a Competitive Prices.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <div class="card mx-auto">
          <i class="card-icon-top fa fa-thumbs-up" src="..." alt="Card image cap"></i>
          <div class="card-body">
            <h3 class="card-title">Satisfactory Result</h3>
            <p class="card-text">Speed ?? And Amazing Results Is A Challenge For Us. Creativity and effectiveness, it all flows in our blood.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="services" id="services">
  <div class="container">
    <h2 class="my-10 text-center" data-aos="zoom-in">
    Works we like to share
  </h2>
    <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Khendak Semesta (sebuah kisah Ayu dan Abimanyu)</h1>
        <p>A story about love, friends, and things in between. How to love someone sincerely. Everyone must have been Ayu, once in their life. Or if it wasn’t, must have been Abimanyu, for part of loving someone unconditionally. Because, sometimes our wishes are not the wishes of universe.</p>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/1.png" class="img-fluid bootstrap-fancy-youtube" data-fancy-src="https://www.youtube.com/embed/B_JrO48-gts">
      </div>
    </div>

    <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/2.png" class="img-fluid bootstrap-fancy-youtube" data-fancy-src="https://www.youtube.com/embed/iAlMVsvGQNA">
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Covid-19 socialization</h1>
        <p>Pandemic Covid-19 have attacked us. Everyone keep trying to fights, keep trying to survives againsts it. It should be in the right way. How to fights and survive will be delivered with Covid-19 socialization.</p>
      </div>
    </div>


    <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Explanation for traffic signs</h1>
        <p>Many people can drive. Some of them are so amazing on the road. But not all of them really knows what the meaning of traffic signs. We all know red light means stop but, do we know what the meaning of triangle shapes with diagonal line sign?</p>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/3.png" class="img-fluid bootstrap-fancy-youtube" data-fancy-src="https://www.youtube.com/embed/MOJd1uKUkOY">
      </div>
    </div>

      <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/4.png" class="img-fluid bootstrap-fancy-youtube" data-fancy-src="https://www.youtube.com/embed/mjp5gHIi55s">
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Good Morning Jogja</h1>
        <p>Good Morning Jogja is a comedy show of Ziemotion Production, which tells the life of several professions in Yogyakarta in a funny way.</p>
      </div>
    </div>

  </div>
</section>