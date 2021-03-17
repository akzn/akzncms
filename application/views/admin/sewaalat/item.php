


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-warning">','</div>'); 
?>

<h3>Add New</h3>

<form action="<?php echo base_url('admin/sewaalat/add_item_action/') ?>" method="post" enctype="multipart/form-data">


<div class="col-md-6">
    <div class="form-group">
        <label>Nama Alat</label>
        <input class="form-control" type="text" name="nama" value="<?=set_value('nama')?>">
    </div>
     <div class="form-group">
        <label>merk / Type</label>
        <input class="form-control" type="text" name="merk" value="<?=set_value('merk')?>">
    </div>
     <div class="form-group">
        <label>Tahun</label>
        <input class="form-control" type="text" name="tahun" value="<?=set_value('tahun')?>">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input class="form-control" type="text" name="jml" value="<?=set_value('jml')?>">
    </div>
    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control" id="file">
       
    </div>

    <div>
    	<input type="submit" name="submit" value="Save" class="btn btn-primary">
    </div>
</div>

</form>

<div class="col-md-6">
  <div><label>Preview</label></div>
     <div id="imagePreview"></div>
</div>


<div class="col-md-12">
	<h3>List</h3>
	<table class="table table-striped table-bordered">
          <tr>
            <th style="text-align: center">no</th>
            <th style="text-align: center">Image</th>
            <th style="text-align: left">Nama Alat</th>
            <th style="text-align: center">Merk/Type</th>
            <th style="text-align: center">Tahun</th>
            <th style="text-align: center">Jml Unit</th>
            <th style="text-align: center">Action</th>
          </tr>
          <?php if ($table): ?>
          <?php foreach ($table as $key): ?>
          	<tr>
	            <td style="text-align: center"><?=++$start?></td>
              <td style="text-align: center">
                <img src="<?=base_url()?>assets/upload/image/thumbs/<?=$key->image?>" style="max-height: 50px;max-width: 50px;" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'">
              </td>
	            <td style="text-align: left"><?=$key->nama?></td>
	            <td style="text-align: center"><?=$key->merk?></td>
              <td style="text-align: center"><?=$key->tahun?></td>
	            <td style="text-align: center"><?=$key->jml?></td>
	            <td>
	            	<a href="<?=base_url()?>admin/sewaalat/update_item/<?=$key->id?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
	            	<a href="<?=base_url()?>admin/sewaalat/delete_item/<?=$key->id?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
	            </td>
	          </tr>
          <?php endforeach ?>
          <?php else : ?>   
                <tr><td>No data</td></tr>
            <?php endif ?>
        </table>
</div>



<style>
#imagePreview {
    margin-top: 7px;
    width: 458px;
    height: 355px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

