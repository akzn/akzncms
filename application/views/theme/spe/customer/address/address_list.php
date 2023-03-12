<div class="container content-container mb-5">
    <div class="mb-5">
      <h6>Alamat Saya</h6>
      <hr>
    </div>

    <?php alert_html() ?>

    <div class="row">
        <div class="col-12">
            <div class="row address-list-radio">
        
                <div class="col-12">
                <?php foreach ($address_list as $key => $value) :?>
                <label>
                    <input type="radio" name="address" <?=($value->is_main) ? 'selected checked':''?> class="card-input-element" />

                    <div class="card card-default card-input">
                        <!-- <div class="card-header" style="font-weight: 600;">Alamat Utama</div> -->
                        <div class="card-body">
                        <h6><?=$value->full_name?> <span style="font-weight: 300;">|  <?=$value->phone?></span></h6>
                       
                        <?=$value->address?>
                        <div class="m-3">
                            <a href="<?=base_url('customer/address/update/'.$value->id)?>" class="btn btn-primary">edit</a>
                            <?php if($value->is_main):?>
                                <!-- <span class="btn btn-primary">alamat utama</span> -->
                            <?php else:?>
                                <a href="<?=base_url('customer/address/set_main/'.$value->id)?>" class="btn btn-info">set utama</a>
                            <?php endif;?>

                            <a href="<?=base_url('customer/address/delete/'.$value->id)?>" class="btn btn-primary float-right">delete</a>

                        </div>
                        </div>
                    </div>

                </label>
                <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>

    <div class="text-center">
    <a href="<?=base_url('customer/address/add')?>" class=" btn btn-primary m-5">Tambah Alamat Baru</a>
  </div> 
</div>
