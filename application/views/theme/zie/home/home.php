<style type="text/css">
    header .top-content{
      position: relative;
    }
    .header-caption {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .header-caption h1{
      font-size: 4rem;
      font-weight: 600;
      font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif;
      color: white;
          background-color: #0000002b;
    }

    /*.floating {   
        animation-name: floating; 
        animation-duration: 3s; 
        animation-iteration-count: infinite; 
        animation-timing-function: ease-in-out; 
        margin-left: 30px; 
        margin-top: 5px; 
    }*/ 

      
   

    /*.bg-primary {
        background: #fdcc52;
        background: linear-gradient(#7733c7,#fff);
    }*/

    .btn-primary {
        color: #fff;
        background-color: #9e99d4;
        border-color: #9e99d4;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #766af7;
        border-color: #766af7;
    }

    .navbar{
          box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    background-color: #ffffff!important;
    }

    section{
      background-color: white;
    }

     @media (max-width: 768px){
        .top-content{
              padding-top: 100px;
        }
        .header-caption{
          top: 63%;
        } 
        .header-caption h1{
          font-size: 2rem;
        }
     }
    

  </style>


  
  <style type="text/css">
    header {
  position: relative;
  background-color: black;
  height: 100vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
  z-index: -8;
}
    header video {
  position: fixed;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  z-index: -9;
}
@media screen and (max-width: 600px) {
  header {
    height: unset;
    min-height: 18rem;
  }
  header video {
    top: 31%;
  }
}
  </style>

  <header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?=base_url()?>video/header.mp4" type="video/mp4">
  </video>
</header>
  
  <style type="text/css">
    section#about .video-link{
      background-image: url(<?=base_url()?>img/6.jpg);
            background-size: cover;
            max-width: 1067px;
            height: 600px;
            margin-bottom: 40px;
            margin-left: auto;
    }
    section#about #about-box-caption{
      position: absolute;
                top: 36%;
    left: 10%;
            width: 100%;
            max-width: 400px;
            margin: 0;
            padding: 49px 50px;
            padding-top: 60px;
            /*background-color: rgb(158 153 212);*/
            background-color: #ffc107;
            color: white;
    }
    @media screen and (max-width: 1024px) {
      section#about .video-link{
        max-width: 1000px;
        height: 600px;
      }
      section#about #about-box-caption{
        position: relative;
        margin: -90px 10px 0 10px;
            top: 36%;
          left: 0;
            width: 100%;
            max-width: unset;
            padding: 49px 50px;
            padding-top: 60px;
            /*background-color: rgb(158 153 212);*/
            background-color: #ffc107;
            color: white;
      }
    }
    @media screen and (max-width: 600px) {
      section#about .video-link{
        max-width: 600px;
        height: 300px;
      }
    }
  </style>
  <section class="about text-center" id="about" style="position: relative;">
    <div class="container">
      <div class="section-heading text-center pb-5" data-aos="zoom-in">
        <h1 class="pb-4"><?=$this->lang->line('landing')['section-1']['block-1']['title']?></h1>
        <p class="text-muted"><?=$this->lang->line('landing')['section-1']['block-1']['sub-title']?></p>
      </div>
      <div class="row">
        <div class="col-md-12 mx-auto video-link" data-aos="zoom-in" style="position: relative;">
          <div style="" 
            class="bootstrap-fancy-youtube" data-fancy-src="https://www.youtube.com/embed/iAlMVsvGQNA"></div>

          

        </div>
        <!-- <div class="col-md-12"> -->
        <div class="zoom" id="about-box-caption" style="" data-aos="zoom-in">
            <h2 class="row-title pb-3"><?=$this->lang->line('landing')['section-1']['block-1']['heading-1']?></h2>
              <p class="pb-4"><?=$this->lang->line('landing')['section-1']['block-1']['content-1']?></p>
              <div class="input-group">
                <div class="custom-file">
                 <input class="form-control" type="text" name="" placeholder="search our project">
                </div>
                <div class="input-group-append">
                  <a href="<?=base_url()?>projects" style="color:white"><i class="fa fa-arrow-right" style="font-size: xx-large;    padding-left: 10px;"></i></a>
                </div>
              <!-- </div> -->
              
          </div>
        </div>
      </div>
    </div>
  </section>

  <style type="text/css">
    .project-list{
      min-height: 200px;
      min-width: 300px;
    }
    .bg-img{
      background-size: contain;
      background-repeat: no-repeat;
    }
    #projects .owl-theme .owl-nav.disabled+.owl-dots {
        position: relative;
        /* margin-top: 10px; */
        top: -50px;
    }
  </style>

  <section class="features services" id="services">
    <div class="container">
      <div class="section-heading text-center" data-aos="zoom-in">
        <h1 class="pb-3"><?=$this->lang->line('landing')['section-2']['block-1']['title']?></h1>
        <p class="text-muted"><?=$this->lang->line('landing')['section-2']['block-1']['sub-title']?></p>
        <hr>
      </div>
      <div class="row" data-aos="zoom-in">
        <div class="col-lg-12 my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <a href="<?=base_url()?>services/2d-3d-animation">
                  <div class="feature-item">
                    <!-- <i class="icon-picture text-primary"></i> -->
                    <ul class="owl-carousel owl-theme">
                      <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/1/1.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/1/2.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/1/3.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/1/4.jpg">
                      </li>
                    </ul>
                    <div class="feature-caption">
                      <h3 class="mb-3 h2"><?=$this->lang->line('landing')['section-2']['block-1']['heading-1']?></h3>
                      <p class="text-muted"><?=$this->lang->line('landing')['section-2']['block-1']['content-1']?></p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-6">
                <a href="<?=base_url()?>services/audio-visual">
                  <div class="feature-item">
                    <!-- <i class="icon-film text-primary"></i> -->
                    <ul class="owl-carousel owl-theme">
                      <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/5.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/6.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/7.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/8.jpg">
                      </li>
                    </ul>
                    <div class="feature-caption">
                      <h3 class="mb-3 h2"><?=$this->lang->line('landing')['section-2']['block-1']['heading-2']?> </h3>
                      <p class="text-muted"><?=$this->lang->line('landing')['section-2']['block-1']['content-2']?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <a href="<?=base_url()?>services/design-graphic">
                  <div class="feature-item">
                    <!-- <i class="icon-present text-primary"></i> -->
                    <!-- <i class="icon-film text-primary"></i> -->
                    <ul class="owl-carousel owl-theme">
                      <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/3/1.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/3/2.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/3/3.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/services/3/4.jpg">
                      </li>
                    </ul>
                    <div class="feature-caption">
                      <h3 class="mb-3 h2"><?=$this->lang->line('landing')['section-2']['block-1']['heading-3']?></h3>
                      <p class="text-muted"><?=$this->lang->line('landing')['section-2']['block-1']['content-3']?></p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-6">
                <a href="<?=base_url()?>services/course-education">
                  <div class="feature-item">
                    <!-- <i class="icon-lock-open text-primary"></i> -->
                    <ul class="owl-carousel owl-theme">
                      <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/13.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/14.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/15.jpg">
                      </li>
                       <li class="project-list bg-img">
                          <img class="img-fluid" src="img/product/16.jpg">
                      </li>
                    </ul>
                    <div class="feature-caption">
                      <h3 class="mb-3 h2"><?=$this->lang->line('landing')['section-2']['block-1']['heading-4']?></h3>
                      <p class="text-muted"><?=$this->lang->line('landing')['section-2']['block-1']['content-4']?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 my-auto">
          
        </div>
      </div>
    </div>
  </section>


<script type="text/javascript">
  $(function(){
    $('#about-box-caption').on('click',function(){
      window.location.href = '<?=base_url()?>projects';
    })
  })
</script>