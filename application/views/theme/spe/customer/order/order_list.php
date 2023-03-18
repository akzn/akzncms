<div class="container content-container">
    <div class="mb-5">
      <h6>Pesanan saya</h6>
      <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <?php foreach($order_list as $key):?>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <span class="" style="font-size: 14px;">Kode Pesanan : <a href="<?=base_url('order/'.$key->id)?>"><?=$key->order_code?></a></span><br>
                                <small><?=date('d-m-Y H:i',strtotime($key->create_date))?></small>   
                            </div>
                            <div class="col-4"><p class="text-right"><?=status_text_color(($key->order_status_id == '3') ? 'success' : 'danger',$key->order_status)?></p></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="<?=base_url('order/'.$key->order_id)?>">
                        <div>
                            <div class="row">
                                <div class="col-3 col-md-2">
                                    <img class="img img-fluid" src="<?=base_url($this->config->item('image_path').'/'.$key->product_image)?>" alt="">
                                </div>
                                <div class="col-9 col-md-10">
                                    <p><?=$key->product_name?></p>
                                </div>
                            </div>
                            <p class="text-right">Rp. <?=number_format($key->product_price)?></p>
                        </div>
                        </a>
                    </div>
                    <div class="card-footer d-none">
                        <button class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php if ($links_pagination != '') { ?>
                
                <?= $links_pagination ?>
            
             <?php } ?>
</div>