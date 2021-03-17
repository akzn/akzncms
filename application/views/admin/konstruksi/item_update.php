


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 


?>

<h3>Update Item</h3>

<form action="<?php echo base_url('admin/konstruksi/update_item_action/'.$item->id) ?>" method="post" enctype="multipart/form-data">


<div class="col-md-6">
    <div class="form-group">
        <label>Bidang</label>
        <input class="form-control" type="text" name="bidang" value="<?=set_value('bidang', isset($item->bidang) ? $item->bidang : '');?>">
    </div>
     <div class="form-group">
        <label>Kode</label>
        <input class="form-control" type="text" name="kode" value="<?=set_value('kode', isset($item->kode) ? $item->kode : '');?>">
    </div>
     <div class="form-group">
        <label>Kualifikasi</label>
        <input class="form-control" type="text" name="kualifikasi" value="<?=set_value('kualifikasi', isset($item->kualifikasi) ? $item->kualifikasi : '');?>">
    </div>

    <div>
    	<input type="submit" name="submit" value="Update" class="btn btn-primary">
    </div>
</div>

</form>


