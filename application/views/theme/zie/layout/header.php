<?php if ($page=='Home'): ?>
  <style type="text/css">
    #mainNav .navbar-nav>li>a{
      color:unset;
    }
  </style>
<?php endif ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="<?=base_url()?>">
        <!-- <img src="<?=base_url()?>img/logo-ziemotion-v2.png" alt="Site Logo" class="img-responsive front-logo"  /> -->
        <div style="display: flex;align-items: center;vertical-align: middle;">
          <div class="floating" style= ""> 
            <img src="<?=base_url()?>img/Logo-v2.png"  class="img-responsive front-logo"> 
          </div> 

          <span style="padding: 10px;color: #22262a;font-weight: 800;letter-spacing: 0.1rem;font-size: 2rem;    text-shadow: 2px 1px #f1f1f1;">
            Ziemotion
          </span>
        </div>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger active" href="<?=base_url()?>"><?=$this->lang->line('home')?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>about"><?=$this->lang->line('about')?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>services"><?=$this->lang->line('services')?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>projects"><?=$this->lang->line('projects')?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>contact"><?=$this->lang->line('contact')?></a>
          </li>
          <li>
            <i class="fa fa-globe-asia"></i>
            <select onchange="javascript:window.location.href='<?php echo base_url(); ?>ch_lang/'+this.value;">
              <option value="english" <?php if($_COOKIE['lang'] == 'english') echo 'selected="selected"'; ?>>English</option>
              <option value="indonesian" <?php if($_COOKIE['lang'] == 'indonesian') echo 'selected="selected"'; ?>>Bahasa Indonesia</option>
            </select>
          </li>
        </ul>
      </div>
    </div>
  </nav>