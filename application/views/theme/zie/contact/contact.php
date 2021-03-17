<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              <?=$this->lang->line('h-contact-us')['header-caption']?>
            </h1>
        </div>
      </div>
    </div>
  </div>


<section class="contact">
    <div class="container container-content">
     <div class="row">
       <div class="col-md-12" data-aos="zoom-in">
        <div class=" text-center mb-5">
          <p class="h1 mb-5"><?=$this->lang->line('h-contact-us')['contact-us']?></p>
          <p class="h1"><?=$site['phone_number']?></p>
          <p class="h1"><?=$site['email']?></p>
        </div>
       </div>
       <div class="col-md-12" data-aos="zoom-in">
        <div class=" text-center">
          <div class="col-md-12 text-center">
            <p class="h3 mb-3"><?=$this->lang->line('h-contact-us')['find-us']?></p>
            <div id="k-contact-map" class="clearfix"><!-- map -->
                <iframe class="map img-fluid" width="700" height="450" frameborder="0" style="border:0"
                src="<?php echo $site['google_maps'];?>" allowfullscreen></iframe>                
            </div>
          </div>
        </div>
       </div>
     </div>
  </div>
</section>