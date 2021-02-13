<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>

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
    echo '<div class="alert alert-danger">';
    echo $error;
    echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-danger">','</div>'); 
?>

<form id="testimonial-form" action="<?php echo base_url('admin/testimonials/edit/'.$testimonial['testimonial_id']) ?>" method="post" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Choose Image</label>
      <input type="file" name="image" class="form-control" id="file">
        <div id="imagePreview" style="background-image: url(<?=base_url('assets/upload/image/thumbs/'.$testimonial['image'])?>);"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group input-group-lg">
        <label>Client Name</label>
        <input type="text" name="client_name" class="form-control" value="<?php echo $testimonial['client_name'] ?>" required placeholder="Person Or company Name">
    </div>
    <div class="form-group input-group-lg">
        <label>Occupation</label><small> (optional)</small>
        <input type="text" name="occupation" class="form-control" value="<?php echo $testimonial['occupation'] ?>" placeholder="Person Occupation">
    </div>
    <div class="form-group input-group-lg">
        <label>Company</label><small> (optional)</small>
        <input type="text" name="company" class="form-control" value="<?php echo $testimonial['company'] ?>" placeholder="Company Name">
    </div>
    <!-- <div class="form-group input-group-lg">
        <label>Link Website</label>
        <input type="text" name="website" class="form-control" value="<?php echo $testimonial['website'] ?>" required placeholder="Link Website">
    </div>  -->   
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="publish">Publish</option>                
            <option value="draft">Draft</option>                           
        </select>
    </div>                               
</div>
<div class="col-md-12">
    <div class="form-group input-group-lg">
        <label>Testimonial Text</label>
        <textarea name="testimony" id="testimony" class="form-control" rows="10" style="resize: none; height:200px" required><?php echo $testimonial['testimony'] ?></textarea>
        <!-- <script>
                    CKEDITOR.replace('testimony');
                    CKEDITOR.config.entities = false;
                </script> -->
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input type="submit" name="submit" value="Update" class="btn btn-primary">
        <!-- <input type="reset" name="reset" value="Reset" id="btn-reset" class="btn btn-default"> -->
    </div>
</div>

</form>
