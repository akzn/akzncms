<!--Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto" data-aos="zoom-in">

        <!-- Links -->
        <h5 class="font-weight-bold  mt-3 mb-4"><?php echo $site['nameweb'];?>
        <small class=""> <br>  <?=$site['metatitle']?></small></h5>

        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                                
                                <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
                                
                                    <!-- <h6 class="" itemprop="name"><?php echo $site['nameweb'];?></h6> -->
                                
                                    <div class="m-contact-address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span class="m-contact-street" itemprop="street-address"><?php echo $site['address'];?></span>
                                        <!-- <span class="m-contact-city-region"><span class="m-contact-city" itemprop="locality"><?php echo $site['city'];?></span></span> -->
                                        <!-- <span class="m-contact-zip-country"><span class="m-contact-zip" itemprop="postal-code"><?php echo $site['zip_code'];?></span></span> -->
                                    </div>
                                     
                                    <div class="m-contact-tel-fax">
                                        <?php if ($site['phone_number'] && $site['phone_number']!='-'): ?>
                                            <span class="m-contact-tel"><?=$this->lang->line('contact')?> : <span itemprop="tel"><?php echo $site['phone_number'];?></span></span>
                                        <?php endif ?>

                                        <?php if ($site['fax'] && $site['fax']!='-'): ?>
                                            <br>
                                            <span class="m-contact-fax">Fax : <span itemprop="fax"><?php echo $site['fax'];?></span></span>
                                        <?php endif ?>
                                        
                                        
                                    </div>

                                    <div>
                                      <span class="m-contact-tel">Email : <span itemprop="tel"><?php echo $site['email'];?></span></span>
                                    </div>
                                    
                                </div>
                    
                            </li>
                            
                        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      

      <!-- Grid column -->
      <div class="col-md-2 mx-auto" data-aos="zoom-in">

        <!-- Links -->
        <!-- <h5 class="font-weight-bold text-uppercase mt-3 mb-4"><?=$this->lang->line('products')?></h5>

        <ul class="list-unstyled">
          <li>
            <a href="<?=base_url()?>products/attachments">Attachments</a>
          </li>
          <li>
            <a href="<?=base_url()?>products/sparepart-breaker">Spareparts</a>
          </li>
          <li>
            <a href="<?=base_url()?>products/fix-repair"><?=$this->lang->line('landing_service_repair_heading')?></a>
          </li>
          <li>
            <a href="<?=base_url()?>products/rental"><?=$this->lang->line('landing_service_rental_heading')?></a>
          </li>
        </ul> -->

      </div>

      <!-- Grid column -->
      <div class="col-md-2 mx-auto" data-aos="zoom-in">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="<?=base_url()?>"><?=$this->lang->line('home')?></a>
          </li>
          <li>
            <a href="<?=base_url()?>products"><?=$this->lang->line('products')?></a>
          </li>
          <!-- <li>
            <a href="<?=base_url()?>gallery">Gallery</a>
          </li> -->
          <?php if ($site['admin_show_link']=='1'): ?>
          <li>
            <a href="<?=base_url()?>admin">Login</a>
          </li>
          <?php endif ?>
        </ul>

      </div>

      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto" data-aos="zoom-in">

        <!-- About -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4"><?=$this->lang->line('about')?></h5>

        <ul class="list-unstyled">
          <li>
            <a href="<?=base_url()?>about"><?=$this->lang->line('about')?></a>
          </li>
          <li>
            <a href="<?=base_url()?>about/contact"><?=$this->lang->line('contact')?></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <hr>

  <!-- Social buttons -->
  <div class="container" >
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; <?=$site['nameweb']?> <?=date('Y')?></span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons" style ="    text-align: center;">
                                                <?php if ($site['twitter']!=''): ?>
                                                  <li class="list-inline-item twitter" >
                                                      <a href="<?=$site['twitter']?>" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>
                                                
                                                <?php if ($site['facebook']!=''): ?>
                                                   <li class="list-inline-item">
                                                      <a href="<?=$site['facebook']?>" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                                 <?php if ($site['instagram']!=''): ?>
                                                   <li class="list-inline-item">
                                                      <a href="<?=$site['instagram']?>" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                              </ul>
        </div>
        <div class="col-md-4">
          <span class="copyright">Supported by <a href="https://javalatte.xyz" target="_blank">JavaLatte.my.id</a></span>
          <!-- <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul> -->
        </div>
      </div>
    </div>
  <!-- Social buttons -->


</footer>
<!-- Footer -->