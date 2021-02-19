<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              We guide you to new and better digital products.
            </h1>
        </div>
      </div>
    </div>
  </div>

<div class="row service-tab" style="box-shadow: 0 25px 50px 0 rgb(0 0 0 / 20%);}">
  <div class="col-md-3 col-6 text-center">
    <a class="decoration-n" href="<?=base_url()?>services/2d-3d-animation">
      <div class="py-3 m-2 category-tab <?=($category=='2d-3d-animation')?'active':'';?>">
        <i class="fa fa-cube fa-2x mb-2"></i>
        <p > 2d & 3d Animation</p>
      </div>
    </a>
  </div>
  <div class="col-md-3 col-6 text-center">
    <a class="decoration-n" href="<?=base_url()?>services/audio-visual">
      <div class="py-3 m-2 category-tab <?=($category=='audio-visual')?'active':'';?>">
        <i class="fa fa-video fa-2x mb-2"></i>
        <p > Audio Visual</p>
      </div>
    </a>
  </div>
  <div class="col-md-3 col-6 text-center">
    <a class="decoration-n" href="<?=base_url()?>services/design-graphic">
      <div class="py-3 m-2 category-tab <?=($category=='design-graphic')?'active':'';?>">
        <i class="fa fa-highlighter fa-2x mb-2"></i>
        <p > Design Graphic</p>
      </div>
    </a>
  </div>
  <div class="col-md-3 col-6 text-center">
    <a class="decoration-n" href="<?=base_url()?>services/course-education">
      <div class="py-3 m-2 category-tab <?=($category=='course-education')?'active':'';?>">
        <i class="fa fa-shapes fa-2x mb-2"></i>
        <p > Course & Education</p>
      </div>
    </a>
  </div>
</div>

<section class="header-text">
  <div class="container" data-aos="zoom-in">
    <div class="text-center text-center-text" style="font-family: Muli">

      <?php if ($category=='2d-3d-animation'): ?>
        <h2 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">2d & 3d Animation</h2>
        We create 2D and 3D animated films, starting from making assets to rendering, which can be used for various purposes.
      <?php endif ?>
      
      <?php if ($category=='audio-visual'): ?>
        <h2 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Audio Visual</h2>
        Content creation that consists of audio and visual aspects, including video and audio editing for vlogs, advertisements, presentations and others.
      <?php endif ?>
      <?php if ($category=='design-graphic'): ?>
        <h2 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Design Graphic</h2>
        Creating designs for posters, banners, packaging designs and others.
      <?php endif ?>
      <?php if ($category=='course-education'): ?>
        <h2 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Course & Education</h2>
        We also offer training services and courses on digital art, including 2d & 3d animation, audio visual, graphic design, and collaboration with educational institutions.
      <?php endif ?>

      <h2 class="text center h2" style="margin: 13vh 0">Take a look on what we offer</h2>
    </div>

  </div>

  <div class="container">
    <!-- <div class="row my-10"> -->


      <?php if ($category=='2d-3d-animation'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">2D Animation</h1>
            <p>Ziemotion has worked on 2D animation for public service advertisements, commercial advertisements and learning content.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/1/1.jpg" class="img-fluid">
          </div>
        </div>

        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/2.png" class="img-fluid">
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">3D Animation</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
        </div>


        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Motion Graphic</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/3.png" class="img-fluid">
          </div>
        </div>

      <?php elseif($category=='audio-visual'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Film</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/1.png" class="img-fluid">
          </div>
        </div>

        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/2/1.jpg" class="img-fluid">
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Photo Product</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
        </div>


        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Video</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/2/3.jpg" class="img-fluid">
          </div>
        </div>

      <?php elseif($category=='design-graphic'): ?>
        <div class="row my-10">
          <div class="col-md-6 my-auto" data-aos="zoom-in">
            <h1 class="h1">Packaging</h1>
            <p>Ziemotion also works on packaging design for various products.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/3/3-1.jpg" class="img-fluid">
          </div>
        </div>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/3/3.jpg" class="img-fluid">
          </div>
          <div class="col-md-6 my-auto" data-aos="zoom-in">
            <h1 class="h1">Interior</h1>
            <p>Ziemotion provides a design & planning that help clients make the right choice in designing a room.</p>
          </div>
        </div>


      <?php elseif($category=='course-education'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Course</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/4/4-1.jpg" class="img-fluid">
          </div>
        </div>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/4/4-2.jpg" class="img-fluid">
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Education</h1>
            <p>Need a facilitator or a full design team for your Design Sprint? This 5-day process allows you to look into the future and learn how your customers respond to new ideas before investing large amounts of time and money. After having executed over 50 Design Sprints we started offering Design Sprint masterclasses in our Academy.</p>
          </div>
        </div>
      <?php endif ?>

    <!-- </div> -->

  </div>
</section>