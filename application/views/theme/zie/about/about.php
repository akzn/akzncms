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
        <h1 class="h1">Heard about Design Sprints?</h1>
        <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/1.png" class="img-fluid">
      </div>
    </div>

    <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/2.png" class="img-fluid">
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Heard about Design Sprints?</h1>
        <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
      </div>
    </div>


    <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Heard about Design Sprints?</h1>
        <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/3.png" class="img-fluid">
      </div>
    </div>

      <div class="row my-10">
      <div class="col-md-6" data-aos="zoom-in">
        <img src="<?=base_url()?>img/services/4.png" class="img-fluid">
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <h1 class="h1">Heard about Design Sprints?</h1>
        <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
      </div>
    </div>

  </div>
</section>