


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

<h3>Add New</h3>

<form action="<?php echo base_url('admin/konstruksi/add_item_action/') ?>" method="post" enctype="multipart/form-data">


<div class="col-md-6">
    <div class="form-group">
        <label>Bidang</label>
        <input class="form-control" type="text" name="bidang" value="<?=set_value('bidang')?>">
    </div>
     <div class="form-group">
        <label>Kode</label>
        <input class="form-control" type="text" name="kode" value="<?=set_value('kode')?>">
    </div>
     <div class="form-group">
        <label>Kualifikasi</label>
        <input class="form-control" type="text" name="kualifikasi" value="<?=set_value('kualifikasi')?>">
    </div>

    <div>
    	<input type="submit" name="submit" value="Save" class="btn btn-primary">
    </div>
</div>

</form>


<div class="col-md-12">
	<h3>List</h3>
	<table class="table table-striped table-bordered">
          <tr>
            <th style="text-align: center">no</th>
            <th style="text-align: left">Bidang</th>
            <th style="text-align: center">Kode</th>
            <th style="text-align: center">Kualifikasi</th>
            <th style="text-align: center">Action</th>
          </tr>
           <?php if ($table): ?>
          <?php foreach ($table as $key): ?>
          	<tr>
	            <td style="text-align: center"><?=++$start?></td>
	            <td style="text-align: left"><?=$key->bidang?></td>
	            <td style="text-align: center"><?=$key->kode?></td>
	            <td style="text-align: center"><?=$key->kualifikasi?></td>
	            <td>
	            	<a href="<?=base_url()?>admin/konstruksi/update_item/<?=$key->id?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
	            	<a href="<?=base_url()?>admin/konstruksi/delete_item/<?=$key->id?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
	            </td>
	          </tr>
          <?php endforeach ?>
          <?php else : ?> 
            <tr><td>No data</td></tr>
          <?php endif ?>
        </table>
</div>

