<!DOCTYPE html>
<html lang="<?=html_lang()?>">

<head>

  <title><?=(isset($title) && $title!='') ? $title : $site['metatitle']?></title>
  <meta name="description" content="<?=(isset($meta_desc) && $meta_desc!='') ? $meta_desc : $site['metatext']?>">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="robots" content="index, follow">

  

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/default/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url()?>assets/default/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="<?=base_url()?>assets/front/aos/aos.css">

  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/default/css/agency.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url()?>assets/owl-carousel-2.3.4/owl.carousel.min.css" rel="stylesheet"> -->

  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="shortcut icon">

  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-fancy-img/bootstrap-fancy-img.css?v=0.4a" />
  <link rel="stylesheet" href="<?=base_url()?>assets/front/style.css?v=2.17" >
  

  <?php if ($page == 'Home'): ?>
     <style type="text/css">
       header.masthead{
          height: 100vh;
          /*min-height: 40rem;*/
        }
     </style>
  <?php endif ?>

  <style type="text/css">
    #page-loader { 
                border: 5px solid #c5c5c5;
    border-radius: 50%;
    border-top: 5px solid #e84756; 
            width: 70px; 
            height: 70px; 
            animation: spin 1s linear infinite; 
            z-index: 99;
        } 
          
        @keyframes spin { 
            100% { 
                transform: rotate(360deg); 
            } 
        } 
          
        .loader-center { 
            position: absolute; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            margin: auto; 
        } 
  </style>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/default/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/lazyload/lazyload.js"></script>

  <script type="text/javascript">
    document.onreadystatechange = function() { 
        if (document.readyState !== "complete") { 
            document.querySelector("body").style.visibility = "hidden"; 
            document.querySelector("#page-loader").style.visibility = "visible"; 
        } else { 
            document.querySelector("#page-loader").style.display = "none"; 
            document.querySelector("body").style.visibility = "visible"; 
            $('#page-content').fadeIn();
        } 
    }; 
  </script>
</head>

<body id="page-top" class="style-green" style="">


  <div id="page-loader" class="loader-center"></div> 

  <div id="page-content" style="display: none">
  <?php $this->load->view('theme/yuki/layout/header');?>
  
  <content>
  <?php
  if($isi) {
    $this->load->view($isi);
  }
  ?>
  </content>

  <!-- Footer -->
  
  <footer class="footer">
  <?php require_once('footer.php');?>
  </footer>

  </div>
  

  <!-- Plugin JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?=base_url()?>assets/bootstrap-fancy-img/bootstrap-fancy-img.js?v=0.3"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="<?=base_url()?>assets/default/js/jqBootstrapValidation.js"></script>
  <script src="<?=base_url()?>assets/default/js/contact_me.js"></script>
  <!-- <script src="<?=base_url()?>assets/owl-carousel-2.3.4/owl.carousel.min.js"></script> -->

  <script src="<?=base_url()?>assets/front/aos/aos.js"></script>
  

  <!-- Custom scripts for this template -->
  <script src="<?=base_url()?>assets/default/js/agency.min.js?v=1.4"></script>

  

<script>
    AOS.init({
      duration: 1000,
      easing: 'slide'
    });


  </script>

</body>

</html>
