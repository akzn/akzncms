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

<form action="<?php echo base_url('admin/settings/site') ?>" method="post">
  <input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="admin_show_link" id="admin_show_link1" value="0" <?=($site['admin_show_link']==0)?'checked':'';?> >
  <label class="form-check-label" for="admin_show_link1">
    Hide Admin Link
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="admin_show_link" id="admin_show_link2" value="1" <?=($site['admin_show_link']==1)?'checked':'';?>>
  <label class="form-check-label" for="admin_show_link2">
    Show Admin Link
  </label>
</div>
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Save" class="btn btn-primary btn-md">
  </div>
</form>