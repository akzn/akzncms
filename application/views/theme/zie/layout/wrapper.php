<!DOCTYPE html>

<html lang="<?=html_lang()?>">

<head>

  <title><?=(isset($title) && $title!='') ? $title : $site['metatitle']?></title>
  <meta name="description" content="<?=(isset($meta_desc) && $meta_desc!='') ? $meta_desc : $site['metatext']?>">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="<?=base_url()?>img/favicon.ico" rel="shortcut icon">

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url()?>assets/default/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url()?>assets/default/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>assets/theme/zie1/vendor/simple-line-icons/css/simple-line-icons.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <!-- <link rel="stylesheet" href="device-mockups/device-mockups.min.css"> -->
  <link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
  <link rel="stylesheet" href="<?=base_url()?>assets/front/aos/aos.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap-fancy-img/bootstrap-fancy-img.css?v=0.8" />

  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/theme/zie1/css/new-age.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/theme/zie1/custom.css?v=1.2" rel="stylesheet">


  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/default/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <link href="http://fonts.cdnfonts.com/css/gilroy-bold?styles=20880" rel="stylesheet">
                
                
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Space Grotesk");
    @import url('http://fonts.cdnfonts.com/css/gilroy-bold?styles=20880');

    @media (max-width: 768px){
      header.masthead .header-content {
        margin-top: 10rem;
        margin-bottom: unset;
      }
    }

  </style>


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

<body id="page-top" style="">


  <div id="page-loader" class="loader-center"></div> 

  <div id="page-content" style="display: none">
  <?php $this->load->view('theme/zie/layout/header');?>
  
  <content>
  <?php
  if($isi) {
    $this->load->view($isi);
  }
  ?>
  </content>

  <!-- Footer -->
  

  <?php require_once('footer.php');?>


  </div>
  

  <!-- Bootstrap core JavaScript -->
<!--   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Plugin JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery-easing/jquery.easing.min.js">"></script>
  <script src="<?=base_url()?>assets/bootstrap-fancy-img/bootstrap-fancy-img.js?v=0.7"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
  <script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/front/aos/aos.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="<?=base_url()?>assets/theme/zie1/js/new-age.min.js"></script>
  <!-- <script src="js/animate_on_scroll_akzn.js"></script> -->
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
  

  <script type="text/javascript">
    $(document).ready(function(){
      AOS.init({
        duration: 1000,
      });

      $(".owl-carousel").owlCarousel({
        items:1,
        loop:true,
        dots:true,
        autoplay:true
      });
    });
  </script>

</body>

</html>
