<div class="container mb-5" style="margin-top: 12vh;">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white col-12 col-md-2" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light text-center">
                <div class="">    
                    <i class="fa fa-user fa-4x m-3"></i>
                </div>
                <div class="mt-2 mb-4">
                    <?=ion_userdata()->first_name?>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url('customer/purchase')?>">Pesanan Saya</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url('customer/transaction')?>">Transaksi</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url('customer/address')?>">Daftar Alamat</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="col-10 d-none d-md-block">
            <!-- Page content-->
            <div class="container-fluid">
                <h3 class="mt-4">Hello Customer!</h3>
                <?php alert_html() ?>
                
            </div>
        </div>
    </div>
</div>