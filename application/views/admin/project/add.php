<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
	height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

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

<form action="<?=base_url()?>admin/project/add_action" method="post" enctype="multipart/form-data">

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Proyek</label>
		<input type="text" class="form-control" name="project-name" required>
	</div>
	<div class="form-group">
		<label>Bidang</label>
		<input type="text" class="form-control" name="field">
	</div>
	<div class="form-group">
		<label>Lokasi</label>
		<input type="text" class="form-control" name="location">
	</div>
	<div class="form-group">
		<label>Pemberi Tugas</label>
		<input type="text" class="form-control" name="owner">
	</div>
	<div class="form-group">
		<label>Tanggal Mulai</label>
		<input type="date" pattern="\d{4}" maxlength="4" class="form-control" name="start_date">
	</div>
	<div class="form-group">
		<label>Tanggal Selesai</label>
		<input type="date" pattern="\d{4}" maxlength="4" class="form-control" name="end_date">
	</div>
	<div class="form-group">
		<label>Value (Rp)</label>
		<input type="number" class="form-control" name="value">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="ongoing">Ongoing</option>
			<option value="finished">Finished</option>
			<option value="canceled">Canceled</option>
		</select>
	</div>
	
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" name="image" class="form-control" id="file">
	</div>
	<div><label>Preview</label></div>
    <div id="imagePreview"></div>

   
</div>

<div class="col-md-12">
	<div>
   	 <input type="submit" name="submit" class="btn btn-lg btn-primary pull-right" value="Save">
   </div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="desc" id="isi"></textarea>
	</div>
</div>

</form>