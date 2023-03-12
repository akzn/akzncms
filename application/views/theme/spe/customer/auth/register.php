<div class="container content-container">
  <?php alert_html() ?>

    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>

            <form method="post" action="<?=base_url('register_action')?>">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputName" placeholder="Nama Lengkap" name="name" value="<?=$this->session->flashdata('post_items') ? $this->session->flashdata('post_items')['name'] : '' ;?>" required autofocus>
                <label for="floatingInputName">Nama Lengkap</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="email" value="<?=$this->session->flashdata('post_items') ? $this->session->flashdata('post_items')['email'] : '' ;?>"> 
                <label for="floatingInputEmail">Email address</label>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password" name="confirm_password" required>
                <label for="floatingPasswordConfirm">Confirm Password</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
              </div>

              
              <hr class="my-4">
              
              <!-- <div class="d-grid mb-2">
                  <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                      <i class="fab fa-google me-2"></i> Sign up with Google
                    </button>
                </div>
                
                <div class="d-grid">
                    <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                        <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                    </button>
                </div> -->
                
                <a class="d-block text-center mt-2 small" href="<?=base_url('login')?>">Sudah memiliki akun? <span style="color:var(--primary-color)">Sign In</span></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .card-img-left {
        width: 45%;
        /* Link to your background image using in the property below! */
        background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
        background-size: cover;
    }
  </style>