  <footer>
    <div class="container">
      
      <div class="row">
        <div class="col-md-6 mb-5">
          <div class="logo-container pb-md-5">
            <img src="<?=base_url()?>img/logo-v2-white.png" alt="Site Logo" class="img-responsive front-logo"  />
          </div>
          <div class="row d-none d-md-flex">
            <div class="col-md-3 col-3">
                <ul class="">
                  <li><a href="<?=base_url()?>">Home</a></li>
                  <li><a href="<?=base_url()?>services">Services</a></li>
                  <li><a href="<?=base_url()?>projects">Projects</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-3">
              <ul class="">
                  <li><a href="<?=base_url()?>about">About</a></li>
                  <li><a href="<?=base_url()?>contact">Contact</a></li>
                </ul>
            </div>
          </div>
          <hr>
          <p class="big">Stay up-to-date on our latest projects</p>
          <p class="big">Subscribe to our Youtube Channel</p>
          <a class="btn btn-danger mt-4" href="https://www.youtube.com/channel/UCxTRPlaitifbKKmKKLrK8MQ?sub_confirmation=1" target="_blank"><i class="fab fa-youtube"></i> Subscribe Now</a>
          <div class="copyright-left d-none d-md-block">
            <hr>
            <span class="copyright">&copy; ziemotion <?=date("Y");?>. All Rights Reserved.</span><br>
            <span class="copyright">Supported by javalatte.xyz</span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ml-md-5">
            <p class="mb-5" style="font-size: 30px;font-weight: 600">Get in Touch</p>
             
            <p class="big"><?=$site['email']?></p>
            
            <p class="big"><?=$site['phone_number']?></p>
             
             <ul class="list-inline list-social social my-4">
                <li class="list-inline-item social-instagram">
                  <a href="<?=$site['instagram']?>">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li class="list-inline-item social-twitter">
                  <a href="<?=$site['twitter']?>">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item social-facebook">
                  <a href="<?=$site['facebook']?>">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item social-google-plus">
                  <a href="<?=$site['youtube']?>">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li class="list-inline-item social-google-plus">
                  <a href="<?=$site['google_plus']?>">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </li>
              </ul>

            <h3>Visit Us At</h3><br>
            <p class="mb-3"><?=$site['address']?></p>
            <h3 class="mt-5 mb-3">Office Hours</h3>
            <p>Mon – Sat : 9am – 5pm</p>
            <p>Sun : Closed</p>

            <div class="copyright-right d-md-none">
              <hr>
              <span class="copyright">&copy; ziemotion 2020. All Rights Reserved.</span><br>
              <span class="copyright">Supported by javalatte.xyz</span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </footer>




  <ul id="social-sidebar">
  <li>
    <a class="entypo-instagram fab fa-instagram" href="<?=$site['instagram']?>"><span>Instagram</span></a>
  </li>
  <li>
    <a class="entypo-twitter fab fa-twitter" href="<?=$site['twitter']?>"><span>Twitter</span></a>
  </li>
  <li>
    <a class="entypo-facebook fab fa-facebook" href="<?=$site['facebook']?>"><span>Facebook</span></a>
  </li>
  <li>
    <a class="entypo-gplus fab fa-youtube" href="<?=$site['youtube']?>"><span>Youtube</span></a>
  </li>
  <li>
    <a class="entypo-linkedin fab fa-linkedin" href="<?=$site['linkedin']?>"><span>LinkedIn</span></a>
  </li>
</ul>
<a href="https://api.whatsapp.com/send?phone=6289520208808" class="whatsapp-float" target="_blank">
<i class="fab fa-whatsapp"></i>
</a>