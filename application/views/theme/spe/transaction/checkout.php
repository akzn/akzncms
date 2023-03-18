<div class="container content-container mb-5">
    <div class="mb-5">
      <h4>Checkout</h4>
      <hr>
    </div>
  <?php alert_html() ?>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Properti</span>
            <!-- <span class="badge badge-secondary badge-pill">3</span> -->
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <div class="product-image mb-3">
                  <img class="img img-fluid" src="<?=base_url($this->config->item('image_path') . $product['image']);?>" alt="">
                </div>
                <h6 class="my-0"><?=$product['title']?></h6>
                <small class="text-muted"><?=$product['brief_description']?></small>
              </div>
              <!-- <span class="text-muted">$12</span> -->
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (IDR)</span>
              <strong>Rp.<?=number_format($product['price'])?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing Address</h4>

            <form action="<?=base_url('create_order_action')?>" method="post">

            <input type="hidden" name="product_id" value="<?=$product['id']?>">

            <div class="row address-list-radio">
              
                <div class="col-12">
                  
                  <label>
                    <input type="radio" name="address_id" selected checked class="card-input-element" value="<?=$main_address->id?>"/>

                      <div class="card card-default card-input">
                        <div class="card-body">
                          <h6><?=$main_address->full_name?> <span style="font-weight: 300;">|  <?=$main_address->phone?></span></h6>
                                
                          <?=$main_address->address?>
                        </div>
                      </div>

                  </label>
                  
                </div>

            </div>
            <div class="text-center">
              <a href="<?=base_url('customer/address')?>" class="m-5">Ganti Alamat</a>
            </div>   
          
            <hr class="mb-4">

            <h4 class="mb-3">Pembayaran</h4>

            <div class="d-block my-3">
              <div class="">
                <label class="" for="cash_payment"><input id="cash_payment" name="paymentType" type="radio" class="radioPaymentType" checked="" required="" value="1">
                Kontan</label>
              </div>
              <div class="">
                <label class="" for="installment_payment">
                  <input id="installment_payment" name="paymentType" type="radio" class="radioPaymentType" required="" value="2">
                Kredit</label>
                <div class="row mb-3">
                  <div class="col-12">
                    <div class="badge badge-warning">
                      <div class="" style="font-size: 1.2em;padding:5px">
                        DP <?=number_format($product['down_payment'])?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tenor-div d-none">
                  <h5>Pilih tenor yang diinginkan</h5>
                  <div class="row address-list-radio">
                      <?php foreach($tenors as $key):?>
                      <div class="col-6">
                        
                        <label>
                          <input type="radio" name="tenor" class="card-input-element" value="<?=$key['tenor_month']?>"/>

                            <div class="card card-default card-input">
                              <div class="card-body">
                                <h6><?=$key['tenor_year']?> Tahun</h6>
                                Rp.<?=number_format($key['monthly'])?> / bln
                              </div>
                            </div>

                        </label>
                        
                      </div>
                      <?php endforeach;?>

                  </div> <!-- END radio div installment_tenor-->
                  <div class="card bg-info text-white">
                    <div class="card-body">
                      Step selanjutkan akan mengarahkan anda pada pembayaran Uang Muka.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Buat Pesanan</button>
          </form>
        </div>
      </div>
</div>

<script>
  $(function(){

    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
      window.location = "<?=base_url('customer/purchase')?>";
    }

    $('.radioPaymentType').on('change', function() {
        if ($(this).val() == '1') {
          $('.tenor-div').addClass('d-none');
        } else if($(this).val() == '2') {
          $('.tenor-div').removeClass('d-none');
        }
    })
    
  })
</script>