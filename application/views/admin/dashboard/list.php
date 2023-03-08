<div class="col-md-4 col-sm-12 col-xs-12">                       
<div class="panel panel-primary text-center no-boder bg-color-gray">
    <div class="panel-body">
        <i class="fa fa-list fa-5x"></i>
        <h3><?php echo $products ?> Products </h3>
    </div>
    <div class="panel-footer back-footer-white putih">
    <a href="<?php echo base_url()?>admin/products">Manage Products</a>
    </div></div></div> 
       
<?php if ($this->session->userdata('userlevel')=='administrator'): ?>

<div class="col-md-3 col-sm-12 col-xs-12">                       
<div class="panel panel-primary text-center no-boder bg-color-gray">
    <div class="panel-body">
        <i class="fa fa-user fa-5x"></i>
        <h3><?php echo $admins ?> Admins </h3>
    </div>
    <div class="panel-footer back-footer-white putih">
    <a href="<?php echo base_url()?>admin/users/admin">Management Admin</a>
    </div></div></div>      

<?php endif ?>