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

<form action="<?php echo base_url('admin/clients/edit/'.$client['client_id']) ?>" method="post" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Upload Cover</label>
      <input type="file" name="image" class="form-control" id="file">
        <div class="imagePreview"><img src="<?php echo base_url('/img/clients/thumbs/'.$client['image']) ?>" class="img img-fluid" width="300"></div>
    </div>
</div>
<div class="col-md-6">
	<div class="form-group input-group-lg">
    	<label>Client Name</label>
        <input type="text" name="client_name" class="form-control" value="<?php echo $client['client_name'] ?>" required placeholder="Title">
    </div>
    <!-- <div class="form-group input-group-lg">
        <label>Link Website</label>
        <input type="text" name="website" class="form-control" value="<?php echo $client['website'] ?>" required placeholder="Link Website">
    </div>   -->  
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">

              <option value="publish" 
              <?php if($client['status']=="publish") { echo "selected"; } ?>
              >Publish</option>}

              <option value="draft" 
              <?php if($client['status']=="draft") { echo "selected"; } ?>
              >Draft</option>}                

            </select>
        </div>                               
</div>
<div class="col-md-12">
<div class="form-group">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
    <a class="btn btn-danger" href="<?php echo base_url('admin/clients/');?>">Cancel</a>
    </div>
</div>

</form>