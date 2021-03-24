<div class="container container-content">
   <div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Bussiness</a></li>
          <li class="breadcrumb-item active" aria-current="page">Konstruksi</li>
        </ol>
      </nav> 

      </div>
  </div>

   <div class="row">
     <div class="col-md-12">

    <div class="">
      <h2><?=$konstruksi->title?></h2>
      <p><?=$konstruksi->content?></p>
    </div>
    <br>
    <div class="container">
      <div class="col-md-12">
        <table class="table table-striped table-bordered">
          <tr>
            <th style="text-align: center">no</th>
            <th style="text-align: left">Bidang</th>
            <th style="text-align: center">Kode</th>
            <th style="text-align: center">Kualifikasi</th>
          </tr>
          <?php foreach ($item as $key): ?>
            <tr>
              <td style="text-align: center"><?=++$start?></td>
              <td style="text-align: left"><?=$key->bidang?></td>
              <td style="text-align: center"><?=$key->kode?></td>
              <td style="text-align: center"><?=$key->kualifikasi?></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
    </div>

     </div>
   </div>
</div>
