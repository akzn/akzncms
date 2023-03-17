<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse ">
    <div class="text-center " style="margin-bottom: 40px;margin-top:20px">
        <h4><a class="" href="<?php echo base_url('admin/dashboard') ?>" style="font-size: 18px"><?php echo $site['nameweb'] ?></a></h4>
    	<a href="<?=base_url()?>" target="_blank" title="go to site"><i class="fa fa-home fa-2x"></i> Go to site</a> 
    </div>
    <hr>
<ul class="nav" id="main-menu">
	<li><a  href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a href="#"><i class="fa fa-flag-o"></i> Produk<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/add-product') ?>">Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/products') ?>">Daftar Produk</a></li>
            <li><a href="<?php echo base_url('admin/product-categories') ?>">Kategori Produk</a></li>
            <li><a href="<?php echo base_url('admin/category-spesification') ?>">Spesifikasi</a></li>
            <?php if ($this->session->userdata('userlevel')=='administrator'): ?>
                <li><a href="<?php echo base_url('admin/excel') ?>">Excel</a></li>
            <?php endif ?>
        </ul>
    </li>     
   

    <li><a href="#"><i class="fa fa-wrench"></i> Settings<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/settings/config') ?>">General Settings</a></li>
            <li>
            <a class="collapse-item" href="<?php echo base_url('admin/settings/interest_rate') ?>">Suku Bunga</a>
            </li>
            <li><a href="<?php echo base_url('admin/settings/logo') ?>">Logo</a></li>
            <li><a href="<?php echo base_url('admin/settings/icon') ?>">Icon</a></li>
            <li><a href="<?php echo base_url('admin/settings/slider') ?>">Slider</a></li>
            <li><a href="<?php echo base_url('admin/settings/locations') ?>">Locations</a></li>
            <li><a href="<?php echo base_url('admin/settings/social') ?>">Social Media</a></li>
            <li><a href="<?php echo base_url('admin/settings/site') ?>">Site Settings</a></li>
            <li><a href="<?php echo base_url('admin/pages') ?>">Pages SEO</a></li>
        </ul>
    </li>  
    <?php if ($this->session->userdata('userlevel')=='administrator'): ?>
    <li><a href="#"><i class="fa fa-users"></i> Administrator<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/users/admin') ?>">List Admin</a></li>
        </ul>
    </li>
    <?php endif ?>


                                 
</ul>
</div>

<div class="text-center" style="padding: 10px"><?=$this->config->item('core-version')?></div>

</nav>  

<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">


<div class="row">
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2><?php echo $title ?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive">