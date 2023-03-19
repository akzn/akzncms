<div class="row">
    <div class="col-sm-12">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Payment Type</th>
                    <th>Tgl</th>
                    <th>ID Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $key) :?>
                    <tr>
                        <td><?=ucwords($key->payment_type_string)?></td>
                        <td><?=date('d M Y H:i',strtotime($key->create_date))?></td>
                        <td><a href="<?=base_url('orders/detail')?>"><?=$key->order_code?></a></td>
                        <td><?=$key->email?></td>
                        <td><span class="badge badge-<?=($key->order_status_string == 'success') ? 'success' : 'inverse'?> "><?=($key->order_status_string)?></span></td>
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