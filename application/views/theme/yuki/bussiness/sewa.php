<div class="container container-content">
   <div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Bussiness</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sewa Alat Berat</li>
        </ol>
      </nav> 

      </div>
  </div>

   <div class="row">
     <div class="col-md-12">

    <div class="">
      <h2><?=$sewaalat->title?></h2>
      <?=$sewaalat->content?>
    </div>

     <!-- Portfolio Grid -->
  <div class="container bg-light" id="portfolio">
    <div class="container product">
      <div class="row">
        <div class="col-md-12">
          <h4 class="mb-5 mt-5">Item</h4>
          <div class="row">

            <?php foreach ($item as $key): ?>
              <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#sewamodal<?=$key->id?>">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fas fa-info fa-3x"></i>

                    </div>
                  </div>

                  <!-- <img class="img-fluid" src="<?=base_url()?>assets/upload/image/<?=$key->image?>" alt="" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'"> -->
                  <?php

                  if (!$key->image) {
                      $key->image = 'no-image300x400.png';
                    }

                  ?>
                  <div  style="background-image: url('<?=base_url()?>assets/upload/image/<?=$key->image?>');background-repeat: no-repeat;
  background-size: cover;">
                  <img class="img-fluid" src="<?=base_url()?>img/transparent.png?>" alt="" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'">
                  </div>
                </a>
                <div class="portfolio-caption">
                  <h4><?=$key->nama?></h4>
                  <p class="text-muted"><?=$key->merk?> (<?=$key->tahun?>)</p>
                </div>
              </div>
            <?php endforeach ?>

            
          </div>
        </div>
      </div>
    </div>
  </div>

     </div>
   </div>
</div>


<?php foreach ($item as $key): ?>


  <!-- Modal <?=$key->id?> -->
  <div class="portfolio-modal modal fade" id="sewamodal<?=$key->id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h3 class="text-uppercase"><?=$key->merk?></h3>
                <h4 class="item-intro text-muted"><?=$key->nama?></h4>
                <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid d-block mx-auto" src="<?=base_url()?>assets/upload/image/<?=$key->image?>" alt="" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'">
                </div>

                 <div class="col-md-4">
                    <!-- <ul class="list-inline">
                      <li>Tahun: <?=$key->tahun?></li>
                      <li>Jumlah Alat: <?=$key->jml?></li>
                    </ul> -->
                    <table class="table">
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$key->nama?></td>
                      </tr>
                      <tr>
                        <td>Merk / Tipe</td>
                        <td>:</td>
                        <td><?=$key->merk?></td>
                      </tr>
                      <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><?=$key->tahun?></td>
                      </tr>
                      <tr>
                        <td>Jumlah Alat</td>
                        <td>:</td>
                        <td><?=$key->jml?></td>
                      </tr>
                    </table>
                    <button class="btn btn-primary" data-dismiss="modal" type="button"><i class="fas fa-times"></i> Close</button>
                </div>
              </div>
                <!-- <p class="item-intro text-muted"><?=$key->nama?></p> -->
               <!--  <img class="img-fluid d-block mx-auto" src="<?=base_url()?>assets/upload/image/<?=$key->image?>" alt="" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'"> -->
                <!-- <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p> -->
                <!-- <ul class="list-inline">
                  <li>Tahun: <?=$key->tahun?></li>
                  <li>Jumlah Alat: <?=$key->jml?></li>
                </ul> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php endforeach ?>

