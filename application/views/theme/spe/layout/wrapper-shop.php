<!DOCTYPE html>
<html lang="<?=html_lang()?>">

<head>

  <title><?=(isset($title) && $title!='') ? $title : $site['metatitle']?></title>
  <meta name="description" content="<?=(isset($meta_desc) && $meta_desc!='') ? $meta_desc : $site['metatext']?>">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="index, follow">


  <!-- Bootstrap core CSS -->
  <!-- <link href="<?=base_url()?>assets/default/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="<?=base_url()?>assets/default/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/default/css/agency.min.css" rel="stylesheet">


  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="shortcut icon">

  <link href="<?=base_url()?>assets/front/style.css?v=2.15" rel="stylesheet">
  <link href="<?=base_url()?>assets/theme/spe/style.css?v=0.1" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/shop/category.css?v=1.1')?>">




  <?php if ($page == 'Home'): ?>
     <style type="text/css">
       header.masthead{
          height: 100vh;
          min-height: 40rem;
        }
      #category-menu .list-group-item{   
        background-color: #e9ecef;
        border: 1px solid #fff;
      }
     </style>
  <?php endif ?>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="<?=base_url()?>assets/default/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>

<body id="page-top" class="">

<?php $this->load->view('theme/'. $this->config->item('theme') .'/layout/header');?>

  <content>

    <!-- <div class="container-fluid pt-3 bg-primary-color content-div"> -->
    <div class="container-fluid pt-3 content-div">
        <!-- shop Head -->
        <div class="header-shop">
        <div class="row align-items-center">
          <div class="col-sm-6">
          <div class="category-wrap dropdown py-1 d-none">
            <button type="button" class="btn btn-primary btn-xl  dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bars"></i> Categories</button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
              <!-- <a class="dropdown-item" href="#">Machinery / Mechanical Parts / Tools </a>
              <a class="dropdown-item" href="#">Consumer Electronics / Home Appliances </a>
              <a class="dropdown-item" href="#">Auto / Transportation</a>
              <a class="dropdown-item" href="#">Apparel / Textiles / Timepieces </a>
              <a class="dropdown-item" href="#">Home &amp; Garden / Construction / Lights </a>
              <a class="dropdown-item" href="#">Beauty &amp; Personal Care / Health </a>  -->
               <div class="megamenu">
                  <?php

                  function loop_tree_nav($nav_categories, $is_recursion = false)
                  {
                      if ($is_recursion == false) {
                          ?>
                          <span>
                              <?php
                          }
                          foreach ($nav_categories as $nav_category) {
                              $children = false;
                              if (isset($nav_category['children']) && !empty($nav_category['children'])) {
                                  $children = true;
                              }

                              // if ($nav_category['sub_for']=='0') {
                              //     $maincat = true;
                              // }
                              ?> 
                              <a href="javascript:void(0);" data-categorie-id="<?= $nav_category['id'] ?>" class="go-category <?= $children == true ? 'mega-title' : '' ?>"><?= $nav_category['name'] ?></a>
                              <?php
                              if ($children === true) {
                                  loop_tree_nav($nav_category['children'], true);
                              }
                          }
                          if ($is_recursion == false) {
                              ?>
                          </span>
                          <?php
                      }
                  }

                  loop_tree_nav($nav_categories);
                  ?>
              </div>
            </div>
          </div> 
          </div>
          <div class="col-sm-6 d-md-none">
              <!-- Search wrapepr -->
              <form method="GET" class="search" id="bigger-search" action="<?= base_url() . 'products' ?>">
                <div class="input-group w-100">
                            <input type="hidden" name="category" value="<?= isset($_GET['category']) ? $_GET['category'] : '' ?>">
                            <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? $_GET['in_stock'] : '' ?>">
                            <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>">
                            <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? $_GET['order_new'] : '' ?>">
                            <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? $_GET['order_price'] : '' ?>">
                            <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? $_GET['order_procurement'] : '' ?>">
                            <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? $_GET['brand_id'] : '' ?>">
                            <div class="d-none">
                                <div class="form-group">
                                    <label for="quantity_more">quantity_more_than</label>
                                    <input type="text" value="<?= isset($_GET['quantity_more']) ? $_GET['quantity_more'] : '' ?>" name="quantity_more" id="quantity_more" placeholder="type_a_number" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="added_after">added_after</label>
                                            <div class="input-group date">
                                                <input type="text" value="<?= isset($_GET['added_after']) ? $_GET['added_after'] : '' ?>" name="added_after" id="added_after" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="added_before">added_before</label>
                                            <div class="input-group date">
                                                <input type="text" value="<?= isset($_GET['added_before']) ? $_GET['added_before'] : '' ?>" name="added_before" id="added_before" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="search_in_body">search_by_keyword_body</label>
                                    <input class="form-control" value="<?= isset($_GET['search_in_body']) ? $_GET['search_in_body'] : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_from">price_from</label>
                                            <input type="text" value="<?= isset($_GET['price_from']) ? $_GET['price_from'] : '' ?>" name="price_from" id="price_from" class="form-control" placeholder="type_a_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_to">price_to</label>
                                            <input type="text" name="price_to" value="<?= isset($_GET['price_to']) ? $_GET['price_to'] : '' ?>" id="price_to" class="form-control" placeholder="type_a_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control field" style="border-radius: 5px;" id="search_in_title" value="<?= @$_GET['search_in_title'] ?>" placeholder="<?=$this->lang->line('search')?>">
                            <div class="input-group-append">
                              <!-- <button class="btn btn-primary btn-xl" type="submit">
                                <i class="fa fa-search"></i> Search 
                              </button> -->
                              <a class="btn btn-primary btn-xl" href="javascript:void(0);" onclick="submitForm()"><i class="fa fa-search"></i> <?=$this->lang->line('search')?></a>
                            </div>
                            <!-- <a href="javascript:void(0);" onclick="submitForm()"><i class="fa fa-search"></i></a> -->
                         </div>
              </form> <!-- search-wrap .end// -->
          </div> <!-- col.// -->

        </div> <!-- row.// -->
        </div> <!-- container.// -->
    </div>

  <?php
  if($isi) {
    $this->load->view($isi);
  }
  ?>
  </content>

  <!-- Footer -->
  <!-- <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer> -->
  
  <footer class="footer">
  <?php require_once('footer.php');?>
  </footer>
  <!-- Portfolio Modals -->


  <!-- Plugin JavaScript -->
  <script src="<?=base_url()?>assets/default/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="<?=base_url()?>assets/default/js/jqBootstrapValidation.js"></script>
  <script src="<?=base_url()?>assets/default/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?=base_url()?>assets/default/js/agency.min.js"></script>

   <!-- Custom scripts for shop -->
  <script src="<?=base_url()?>assets/shop/js/system.js"></script>
  <script src="<?=base_url()?>assets/shop/js/jquery.simpleGal.min.js"></script>
  <script src="<?=base_url()?>assets/shop/js/jquery.elevateZoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/css/bootstrap-select.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.js" ></script>

  <!-- Lazy -->
  <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script> -->
  <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script> -->
  <script src="<?=base_url()?>assets/lazyload/lazyload.js"></script>

  <script src="<?=base_url('assets/shop/category.js')?>"></script>
  
  
  <script type="text/javascript">
    $(document).ready(function () {
        $("body").lazyload({
            placeAttr:"data-src",
        });
    });
  </script>
</body>

</html>
