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
<script type="text/javascript">
  $(function{
    AOS.refresh();
  })
</script>