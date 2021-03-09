<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              <?=langify("[en]We guide you to new and better digital products.[/en]
              [id]Kami Membantu Anda Untuk Mendapatkan Produk Digital Yang Lebih Berkualitas[/id]") ?>
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
        <h1 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">2d & 3d Animation</h1>
        <?=langify("[en]We create 2D and 3D animated films, starting from making assets to rendering, which can be used for various purposes.[\en][id]Kami membuat film animasi 2D dan 3D, mulai dari pembuatan aset hingga rendering, yang dapat digunakan untuk berbagai keperluan.[/id]") ?>
      <?php endif ?>
      
      <?php if ($category=='audio-visual'): ?>
        <h1 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Audio Visual</h1>
        <?=langify("[en]Content creation that consists of audio and visual aspects, including video and audio editing for vlogs, advertisements, presentations and others.[/en][id]Pembuatan konten yang terdiri dari aspek audio dan visual, termasuk video dan audio editing untuk vlog, iklan, presentasi dan lain-lain.[/id]") ?>
      <?php endif ?>
      <?php if ($category=='design-graphic'): ?>
        <h1 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Design Graphic</h1>
      <?=langify("[en]Creating designs for posters, banners, packaging designs and others.[/en][id]Pembuatan desain poster, spanduk, desain packaging dan lain-lain.[/id]") ?>
      <?php endif ?>
      <?php if ($category=='course-education'): ?>
        <h1 class="text center h2 py-5" style="    font-weight: 600;
    font-size: 2.5rem;">Course & Education</h1>
        <?=langify("[en]We also offer training services and courses on digital art, including 2d & 3d animation, audio visual, graphic design, and collaboration with educational institutions.[/en][id]Kami juga menawarkan layanan pelatihan dan kursus seni digital, termasuk animasi 2d & 3d, audio visual, desain grafis, dan kolaborasi dengan lembaga pendidikan.[/id]") ?>
      <?php endif ?>

      <h1 class="text center h2" style="margin: 13vh 0"><?=langify("[en]Take a look on what we offer[en][id]Jasa Yang Kami Tawarkan[/id]") ?></h2>
    </div>

  </div>

  <div class="container">
    <!-- <div class="row my-10"> -->


      <?php if ($category=='2d-3d-animation'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">2D Animation</h1>
            <p><?= langify("[en]Ziemotion has worked on 2D animation for public service advertisements, commercial advertisements and learning content.[/en][id]Ziemotion telah membuat berbagai animasi 2D untuk iklan layanan masyarakat, iklan komersial, dan konten pembelajaran[/id]") ?></p>
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
            <p><?= langify("[en]Ziemotion have many experience on creating 3D animations for various clients that have been used for an amazing advertisements, impressive shows, and many more[/en][id]Ziemotion memiliki banyak pengalaman dalam membuat animasi 3D untuk berbagai klien yang telah digunakan untuk iklan yang luar biasa, pertunjukan yang mengesankan, dan banyak lagi.[/id]") ?></p>
          </div>
        </div>


        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Motion Graphic</h1>
            <p><?= langify("[en]Ziemotion is able to make an awesome motion graphic from client's brief. It could be used for campaign, socialization, and many other purposes.[/en][id]Ziemotion mampu membuat grafik gerak yang mengagumkan dari penjelasan klien. Ini bisa digunakan untuk kampanye, sosialisasi, dan banyak tujuan lainnya.[/id]") ?></p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/3.png" class="img-fluid">
          </div>
        </div>

      <?php elseif($category=='audio-visual'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Film</h1>
            <p><?= langify("[en]Ziemotion created and produced several films. We dedicate ourselves to make an interesting and high quality films.[/en][id]Ziemotion membuat dan memproduksi beberapa film. Kami mendedikasikan diri kami untuk membuat film yang menarik dan berkualitas tinggi.[/id]") ?></p>
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
            <p><?= langify("[en]Our Clients can rely on us to make their products more attractive once their products are combined with our creativity.[/en][id]Kami dapat diandalkan untuk membuat produk client lebih menarik setelah produk mereka dipadukan dengan kreativitas kami.[/id]") ?></p>
          </div>
        </div>


        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Video</h1>
            <p><?= langify("[en]Video editing is one of the most important part to make a high quality video. Ziemotion have a lot of creative stuff to make our client's videos really extraordinary.[/en][id]Pengeditan video adalah salah satu bagian terpenting untuk membuat video berkualitas tinggi. Ziemotion memiliki banyak kreativitas untuk membuat video klien kami benar-benar luar biasa.[/id]") ?></p>
          </div>
          <div class="col-md-6" data-aos="zoom-in">
            <img src="<?=base_url()?>img/services/2/3.jpg" class="img-fluid">
          </div>
        </div>

      <?php elseif($category=='design-graphic'): ?>
        <div class="row my-10">
          <div class="col-md-6 my-auto" data-aos="zoom-in">
            <h1 class="h1">Packaging</h1>
            <p><?= langify("[en]Ziemotion has been working on many packaging design for various products.[/en][id]Ziemotion telah mengerjakan banyak desain kemasan untuk berbagai produk.[/id]") ?></p>
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
            <p><?= langify("[en]Ziemotion provides a design & planning that help clients make the right choice in designing a room.[/en][id]Ziemotion menyediakan desain & perencanaan yang membantu klien membuat pilihan yang tepat dalam mendesain sebuah ruangan.[/id]") ?></p>
          </div>
        </div>


      <?php elseif($category=='course-education'): ?>
        <div class="row my-10">
          <div class="col-md-6" data-aos="zoom-in">
            <h1 class="h1">Course</h1>
            <p><?= langify("[en]Ziemotion opens our doors wide for everyone who wants to learn everything about our field. We can make great things together. Sharing is caring[/en][id]Ziemotion membuka pintu kami lebar-lebar untuk semua orang yang ingin mempelajari segala sesuatu tentang bidang kami. Kita bisa membuat hal-hal hebat bersama. Berbagi adalah peduli[/id]") ?></p>
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
            <p><?= langify("[en]The world's greatest heritage is education. Ziemotion collaborates with many schools and educational institutions to find and create many new talent in the creative industry.[/en][id]Warisan terbesar dunia adalah pendidikan. Ziemotion bekerja sama dengan banyak sekolah dan institusi pendidikan untuk menemukan dan menciptakan banyak bakat baru di industri kreatif.[/id]") ?></p>
          </div>
        </div>
      <?php endif ?>

    <!-- </div> -->

  </div>
</section>