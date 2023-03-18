<div class="container content-container">
    <div class="mb-5">
      <h6>Detail Transaksi</h6>
      <hr>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Rp.<?=number_format($transaction->amount)?></h5 >
                            <?php if($transaction->payment_gateway_transaction_status == 'success'):?>
                                <?=status_text_color('success','PAID')?>
                            <?php else:?>
                                <?php if($transaction->payment_detail_type == '3'):?>
                                    <small>Jatuh tempo <?=date('d M Y',strtotime($transaction->due_date))?></small><br>
                                <?php endif;?>
                                <?php if($transaction->expiry_time != '' && $transaction->expiry_time != '0000-00-00 00:00:00'):?>
                                    <small>Bayar Sebelum <?=date('d M Y h:i',strtotime($transaction->expiry_time))?></small>
                                <?php endif;?>
                            <?php endif;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div>Trx Code : <?=$transaction->transaction_id?></div>
                            <div>
                                <?php if($transaction->payment_gateway_transaction_status == 'success'):?>
                                    <?=status_text_color('success',$transaction->payment_gateway_transaction_status)?>
                                <?php else:?>
                                    <?=status_text_color('danger',$transaction->payment_gateway_transaction_status)?>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="badge badge-secondary mb-3"><?=$transaction->payment_detail_type_string?></div>
                            <?php if($transaction->payment_detail_type == '3'):?>
                                <small>[<?=$transaction->position?>/<?=$transaction->tenor?>]</small>
                            <?php endif;?>
                            <div>Order.ID <?=$transaction->order_code?></div>
                            <p><?=$transaction->product_name?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <!-- <button class="btn btn-primary btn-block">Bayar Sekarang</button> -->
                            <?=$transaction->btn_pay?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>