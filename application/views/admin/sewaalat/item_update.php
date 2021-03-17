


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-danger">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-danger">','</div>'); 


?>

<h3>Update Item</h3>

<form action="<?php echo base_url('admin/sewaalat/update_item_action/'.$item->id) ?>" method="post" enctype="multipart/form-data">


<div class="col-md-6">
    <div class="form-group">
        <label>Nama Alat</label>
        <input class="form-control" type="text" name="nama" value="<?=set_value('nama', isset($item->nama) ? $item->nama : '');?>">
    </div>
     <div class="form-group">
        <label>Merk</label>
        <input class="form-control" type="text" name="merk" value="<?=set_value('merk', isset($item->merk) ? $item->merk : '');?>">
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input class="form-control" type="text" name="tahun" value="<?=set_value('tahun', isset($item->tahun) ? $item->tahun : '');?>">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input class="form-control" type="text" name="jml" value="<?=set_value('jml', isset($item->jml) ? $item->jml : '');?>">
    </div>

    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control" id="file">
       
    </div>

    <div>
    	<input type="submit" name="submit" value="Update" class="btn btn-primary">
    </div>
</div>

</form>

<div class="col-md-6">
    <div><label>Preview</label></div>
     <div id="imagePreview"></div>
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

    let oldImg = "<?=base_url()?>assets/upload/image/<?=$item->image?>";
    $("#imagePreview").css("background-image", "url("+oldImg+")");

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

