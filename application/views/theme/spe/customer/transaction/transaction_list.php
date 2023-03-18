<div class="container content-container">
    <div class="mb-5">
      <h6>Transaksi</h6>
      <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <?php foreach($transaction_list as $key):?>
                <a href="<?=base_url('customer/transaction/detail/').$key->payment_detail_id?>" style="text-decoration: none;">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="badge badge-secondary"><?=ucwords($key->payment_detail_type_string)?></div>
                                <div class="product-title"><?=$key->product_name?></div>
                                <?php if($key->payment_detail_type == '3'):?>
                                    <small>Jatuh tempo <?=date('d M Y',strtotime($key->due_date))?></small><br>
                                <?php endif;?>
                                <div class="mt-2">
                                    <?php if($key->payment_gateway_transaction_status == 'success'):?>
                                        <?=status_text_color('success',$key->payment_gateway_transaction_status)?>
                                    <?php else:?>
                                        <?=status_text_color('danger',$key->payment_gateway_transaction_status)?>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-4" style="display: flex;
                                                flex-direction: row-reverse;
                                                align-items: center;">
                                <div class=" float-right">
                                    <div class="text-right">Rp.<?=number_format($key->amount)?></div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
    <?php if ($links_pagination != '') { ?>
                
                <?= $links_pagination ?>
            
             <?php } ?>
</div>

<style>
    @media (max-width: 600px) {
        .product-title{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    }
</style>