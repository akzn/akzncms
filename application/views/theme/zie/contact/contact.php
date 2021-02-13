<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              How can we help you?
            </h1>
        </div>
      </div>
    </div>
  </div>

  <section class="contact">
    <div class="row pb-5">
      <div class="col-md-12 text-center">
        <p class="h1 mb-5">Contact Us At</p>
        <p class="h1"><?=$site['phone_number']?></p>
        <p class="h1"><?=$site['email']?></p>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <p class="h3 mb-3">Or Find us here</p>
        <div id="k-contact-map" class="clearfi d-none d-md-block"><!-- map -->
            <iframe width="700" height="450" frameborder="0" style="border:0"
            src="<?php echo $site['google_maps'];?>" allowfullscreen></iframe>                
        </div>
      </div>
    </div>
  </section>