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
        <img src="<?=base_url()?>img/logo-ziemotion-v2.png" alt="Site Logo" class="img-responsive front-logo"  />
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger active" href="<?=base_url()?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>