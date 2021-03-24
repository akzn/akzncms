<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">
	<li><a  href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    
    <!-- <li><a href="#"><i class="fa fa-pencil"></i> Blogs<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/blogs') ?>">List Blogs</a></li>
            <li><a href="<?php echo base_url('admin/blogs/create') ?>">Create Blogs</a></li>
            <li><a href="<?php echo base_url('admin/blogs/categories') ?>">Categories</a></li>
        </ul>
    </li>     -->
    <!-- <li><a href="#"><i class="fa fa-list"></i> Products<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/products') ?>">List Products</a></li>
            <li><a href="<?php echo base_url('admin/products/create') ?>">Create Product</a></li>
        </ul>
    </li> 
    <li><a href="#"><i class="fa fa-dollar"></i> Price<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/price') ?>">List Price</a></li>
        </ul>
    </li>      -->
 
    <!-- <li><a href="#"><i class="fa fa-flag-o"></i> Project<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/project') ?>">List</a></li>
            <li><a href="<?php echo base_url('admin/project/add') ?>">Add New</a></li>
        </ul>
    </li>  -->  

    <li><a href="#"><i class="fa fa-flag-o"></i> Produk<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/add-product') ?>">Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/products') ?>">Daftar Produk</a></li>
            <li><a href="<?php echo base_url('admin/product-categories') ?>">Kategori Produk</a></li>
            <li><a href="<?php echo base_url('admin/category-spesification') ?>">Spesifikasi</a></li>
            <?php if ($this->session->userdata('userlevel')=='administrator'): ?>
                <li><a href="<?php echo base_url('admin/product-categories') ?>">Kategori Produk</a></li>
                <li><a href="<?php echo base_url('admin/excel') ?>">Excel</a></li>
            <?php endif ?>
        </ul>
    </li>     
    
    <li><a href="#"><i class="fa fa-user-md"></i> Klien<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/clients') ?>">Daftar Klien</a></li>
            <li><a href="<?php echo base_url('admin/clients/create') ?>">Tambah Klien</a></li>
        </ul>
    </li>  

    <li><a href="#"><i class="fa fa-user-md"></i> Testimonial<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/testimonials') ?>">Daftar Testimonial</a></li>
            <li><a href="<?php echo base_url('admin/testimonials/create') ?>">Tambah Testimonial</a></li>
        </ul>
    </li>  
    <li><a href="#"><i class="fa fa-image"></i> Post Types<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/galleries') ?>">List Post</a></li>
            <li><a href="<?php echo base_url('admin/galleries/create') ?>">Create New Post</a></li>
        </ul>
    </li>               
    <!--<li><a href="#"><i class="fa fa-file"></i> Downloads<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/downloads') ?>">List Downloads</a></li>
            <li><a href="<?php echo base_url('admin/downloads/upload') ?>">Upload File</a></li>
        </ul>
    </li>          -->     

    <li><a href="#"><i class="fa fa-envelope-o"></i> Inbox<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/contacts/inbox') ?>">Daftar Inbox</a></li>
        </ul>
    </li>   

    <li><a href="#"><i class="fa fa-wrench"></i> Settings<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/settings/config') ?>">General Settings</a></li>
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