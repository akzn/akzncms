<div class="row">
    <div class="col-sm-12">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Payment Type</th>
                    <th>Tgl</th>
                    <th>ID Transaksi</th>
                    <!-- <th>Pelanggan</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $key) :?>
                    <tr>
                        <td><?=ucwords($key->payment_detail_type_string)?></td>
                        <td><?=date('d M Y H:i',strtotime($key->payment_detail_create_date))?></td>
                        <td><a href="<?=base_url('transactions/detail')?>">
                            <p style="white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                max-width: 20ch;">
                                <?=$key->transaction_id?>
                            </p>
                            </a>
                        </td>
                        <!-- <td><?=$key->email?></td> -->
                        <td><span class="badge badge-<?=($key->payment_gateway_transaction_status == 'success') ? 'success' : 'inverse'?> "><?=($key->payment_gateway_transaction_status =='') ? '[ pending ]' : $key->payment_gateway_transaction_status?></span></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div style="padding:10px">
    <?php if ($links_pagination != '') { ?>
                
                <?= $links_pagination ?>
            
             <?php } ?>
             </div>
</div>