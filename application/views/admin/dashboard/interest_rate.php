


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

<form action="<?php echo base_url('admin/settings/interest_rate') ?>" method="post">
	<input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">
	
    <div class="col-md-3 col-11">
        <label>Interest Rate (in percent)</label>
        <div class="input-group">
            <input type="number" name="rate" class="form-control" style="text-align: right;" value="<?=$site['interest_rate']?>">
            <span class="input-group-addon">%</span>
        </div>

    </div>
    
    
    <div class="col-md-12" style="margin-top:5px">
	<input type="submit" name="submit" value="Save" class="btn btn-primary">
</div>
</form>