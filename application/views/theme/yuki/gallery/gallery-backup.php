<div class="container container-content gallery">

	 <div class="row"><!-- row -->                            
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                <nav aria-label="breadcrumb">
                	<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->

      <h2 class="text-center mt-0">Gallery</h2>
      <hr class="divider my-4">
       <!-- Page Content -->

<style type="text/css">
    section#gallery .card-columns.itwm2 {
        column-count: 2;
    }
    section#gallery .card-columns.itwm2 .card.width2 {
        width:135%;
        margin-bottom: 1.75rem;
        float:left;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 629px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 300px;
    }

    section#gallery .card-columns.itwm2 .card.width1 {
        width:65%;
        float:right;
    margin-bottom: 1.75rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 300px;
    min-height: 300px;
    }

    section#gallery .card-columns .card {
      border:unset;
      border-radius: unset;
        cursor: pointer;
    }

    section#gallery .card-columns .card .item-body {
        border:unset;
        border-radius: unset;
        cursor: pointer;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        box-shadow: inset 0px 13px 87px 20px #00000085;
        filter:contrast(150%) sepia(24%);
      background-position: center;background-size: cover;
        
        box-shadow:inset 0px 0px 70px rgb(0 0 0 / 76%);
        -webkit-transition: opacity 0.5s ease-in-out;
        -moz-transition: opacity 0.5s ease-in-out;
        transition: opacity 0.5s ease-in-out;
    }
    section#gallery .card-columns .kpy-gallery-grid .item-body:hover {
         opacity: 0.75;
    }
    section#gallery .play-btn {
        /*background: #000000b5;*/
    padding: 12px 20px 10px 23px;
    border-radius: 10px;
    position: absolute;
    top: 45%;
    left: 45%;
    z-index: 10;
  }
  section#gallery .play-btn i {
    font-size: 3.50vw;
    color:#fff;
     text-shadow: 0 0 13px #ffffff, 0 0 16px #000000
    /*-webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;*/
  }
  @-webkit-keyframes glow {
  from {
    /*text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #ffd400, 0 0 40px #ffd400, 0 0 50px #ffd400, 0 0 60px #ffd400, 0 0 70px #ffd400;*/
    text-shadow: 0 0 10px #ffd400, 0 0 20px #ffd400, 0 0 30px #ffd400, 0 0 40px #ffd400;
  }
  to {
    text-shadow: 0 0 20px #ffd400, 0 0 30px #ffd400, 0 0 40px #ffd400;
  }
}

@media (min-width: 16em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 0.3rem!important;
    }
    .card-columns .card{
        margin-bottom: 0.3rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 0.3rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 80px;
        min-height: 80px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 166px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 80px;
    }

    section#gallery .play-btn {
        top: 40%;
        left: 40%;
    }
}

@media (min-width: 20em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 0.5rem!important;
    }
    .card-columns .card{
        margin-bottom: 0.4rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 0.4rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 90px;
        min-height: 90px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        /*width: 213px;;*/
        height: 186px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 90px;
    }

    section#gallery .play-btn {
        top: 40%;
        left: 40%;
    }
}

@media (min-width: 34em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }


}

@media (min-width: 48em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 1.1rem!important;
    }

     .card-columns .card{
        margin-bottom: 1.1rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1.1rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 200px;
        min-height: 200px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 416px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 200px;
    }

    section#gallery .play-btn {
        top: 45%;
        left: 45%;
    }

}

@media (min-width: 62em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 1rem!important;
   }

   .card-columns .card{
        margin-bottom: 0.5rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 300px;
        min-height: 300px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 617px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 300px;
    }

}

@media (min-width: 75em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 2rem!important;
    }

    .card-columns .card{
        margin-bottom: 1rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1.2rem;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 620px;
    }
}

@media(max-width: 1024px) {
  section#gallery .container {
    width: 100%;
    padding-right: 2px;
    padding-left: 3px;
    margin-right: auto;
    margin-left: auto;
        }
   }

</style>

<section class="pb-5 pt-5" id="gallery">
    <div class="container">

            <?php $img_chunk = array_chunk($gallery,3); ?>
            <?php foreach ($img_chunk as $key => $chunk): ?>
                <?php $have_video = array_search('video', array_column($chunk, 'type')); ?>
                <?php if ($have_video === false): ?>
                    <div class="card-columns">
                        <!-- normal img list-->

                            <?php foreach ($chunk as $key => $data): ?>
                                    <div class="card  kpy-gallery-grid ">
                                        <div class="item-body bootstrap-fancy-img"  
                                            data-fancy-src="<?= base_url('img/gallery/' . $data->image) ?>" 
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                      </div>
                                    </div>            
                               
                            <?php endforeach ?>
                        </div>
                <?php else: ?>
                     <div class="card-columns itwm2">
                        <!-- video img list-->

                            <?php foreach ($chunk as $key => $data): ?>
                                <?php if ($data->type == 'image'): ?>
                                    <div class="card width1  kpy-gallery-grid">
                                        <div class="item-body bootstrap-fancy-img" 
                                            data-fancy-src="<?= base_url($dir . $filename) ?>" 
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                                  
                                        </div>
                                    </div>
                                <?php elseif ($key==0): ?>
                                    <div class="card width2  kpy-gallery-grid <?=$flag_item_height?>">
                                        <div 
                                            class="item-body  bootstrap-fancy-video" 
                                            data-fancy-src="<?=base_url()?>video/sample-1.mp4"
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                        </div>
                                        <div class="play-btn"><i class="fa fa-play"></i></div>
                                    </div>
                                <?php else: ?>
                                    <div class="card width1  kpy-gallery-grid">
                                        <div 
                                            class="item-body  bootstrap-fancy-video" 
                                            data-fancy-src="<?=base_url()?>video/sample-1.mp4"
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                        </div>
                                        <div class="play-btn"><i class="fa fa-play"></i></div>
                                    </div>
                                <?php endif ?>
                                    
                               
                            <?php endforeach ?>
                        </div>
                <?php endif ?>
            
            <?php endforeach ?>
    </div>
</section>
 <section class="pb-5 pt-5" id="gallery">
  <div class="container">
      <?php 
              $dirthumbs = "img/gallery/thumbs/";
              $dir = "img/gallery/";
              if (is_dir($dirthumbs)) {
                    chdir($dirthumbs);
                    array_multisort(array_map('filemtime', ($files = glob("*.*"))), SORT_DESC, $files);
                    $img_chunk = array_chunk($files,3);

                    foreach($img_chunk as $key => $val)
                    {
                      if ($key % 2 == 0) {
                        
                        ?>
                        <div class="card-columns">
                        
                        <?php
                        
                        foreach ($val as $filename) {
                          ?>
                           <!-- Grid item -->
                     <div class="card  kpy-gallery-grid ">
                      <div class="item-body bootstrap-fancy-img"  data-fancy-src="<?= base_url($dir . $filename) ?>" style="background-image: url('<?= base_url($dir . $filename) ?>');">
                                    
                                </div>
                </div>
                          <?php
                        }

                        ?>
                        </div>
                        
                        <?php

                        } else {

                          ?>

                          <div class="card-columns itwm2">

                          <?php

                          $flag_item_height = (count($val)<3) ? 'u3': '' ;
                          if (count($val)>2) {
                           
                         
                          foreach ($val as $key => $filename) {
                            if ($key == 0) {
                            ?>

                             <!-- Grid item -->
                       <div class="card width2  kpy-gallery-grid <?=$flag_item_height?>">
                        <div class="item-body  bootstrap-fancy-youtube" style="background-image: url('<?= base_url($dir . $filename) ?>');">
                                    
                                    </div>
                    <div class="play-btn"><i class="fa fa-play"></i></div>
                </div>

                            <?php
                          } else {
                            ?>

                            <div class="card width1  kpy-gallery-grid">
                          <div class="item-body bootstrap-fancy-img" data-fancy-src="<?= base_url($dir . $filename) ?>" style="background-image: url('<?= base_url($dir . $filename) ?>');">
                                    
                                        </div>
                  </div>

                            <?php
                          }
                        }
                         }

                        ?>
                        </div>
                        
                        <?php

                        }

                        if (++$i == 12) break;
                    }
            }?>


     
    </div>
  </div>
 </section>


    </div>


