<div class="container container-content">

<div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
      </nav> 

      </div>
  </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="page-title mb-4">Lowongan Pekerjaan</h2>
            <p>Mulailah Perjalanan Anda bersama <b>PT Yaksa Alam Sejahtera</b>.
Bergabunglah dengan tim super kami untuk membangun kesuksesan bersama</p>
            <p>Posisi yang Tersedia : </p>
            <?php if (empty($blogs)) : ?>
                <p>There are currently no job listings available.</p>
            <?php else : ?>
            <?php foreach ($blogs as $key => $value) : ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?=$value['title']?></h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Company ABC</h6> -->
                        <!-- <div class="card-text mb-3"><?=truncate_text($value['content'],40)?></div> -->
                        <p class="card-text">
                            Klik detail untuk informasi lebih lanjut
                        </p>
                        <a class="btn btn-primary" href="<?=base_url('career/').$value['slug_blog']?>" class="card-link">Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
