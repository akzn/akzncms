<style>
.slider-preview {
    width: 250px;
    height: 140px;
    /*background-position: center center;*/
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $(".slider-preview-input").on("change", function()
    {
        ele = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){ // set image data as background of div
                ele.parent().find('.slider-preview').css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
    echo "<h5>Message : </h5>";
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// Session 
if($this->session->flashdata('error')) { 
  echo '<div class="alert alert-danger">';
  echo $this->session->flashdata('error');
  echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-danger">','</div>'); 

?>
  <div class="alert alert-warning">
    <h5>Recomended ratio : widescreen 16x9</h5>
  </div>

<form action="<?php echo base_url('admin/settings/slider') ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">
    <input type="submit" name="submit" value="Save All" class="btn btn-primary">
    <h3>Main Slider</h3>
  <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <label>Upload New Main Slider</label>
        <input type="file" name="slider[]" class="form-control slider-preview-input" id="file">
        <br>
        <span>Preview</span><br>
        <div id="slider-preview-1" class="slider-preview"></div>
        <br>
        <label>Heading</label>
        <input type="text" name="heading[]" class="form-control" value="<?=$slider[0]->slider_title?>">
        <label>Description</label>
        <textarea name="description[]" class="form-control"><?=$slider[0]->slider_description?></textarea>
    </div>
    </div>

    <div class="col-md-4">
      <label>Current Main Slider:</label><br>
        <div style="width: 250px;height:140px;background-size: cover;background-image:url(<?=base_url('img/slider/'.$slider[0]->slider_image)?>);">
          <!-- <img class="img img-thumbnail img-responsive" src="<?php echo base_url('img/slider/slider-1.jpg');?>"> -->
        </div>
    </div>
    </div>

    <hr>

    <h3>Slider 2</h3>
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <label>Upload New Slider 2</label>
        <input type="file" name="slider[]" class="form-control slider-preview-input" id="file">
        <br>
        <span>Preview</span><br>
        <div id="slider-preview-2" class="slider-preview"></div>

        <br>
        <label>Heading</label>
        <input type="text" name="heading[]" class="form-control" value="<?=$slider[1]->slider_title?>">
        <label>Description</label>
        <textarea name="description[]" class="form-control"><?=$slider[1]->slider_description?></textarea>
    </div>
    </div>

    <div class="col-md-4">
      <label>Current Slider 2:</label><br>
        <div style="width: 250px;height:140px;background-size: cover;background-image:url(<?=base_url('img/slider/'.$slider[1]->slider_image)?>);">
        </div>
    </div>
    </div>

    <hr>

    <h3>Slider 3</h3>
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <label>Upload New Slider 3</label>
        <input type="file" name="slider[]" class="form-control slider-preview-input" id="file">
        <br>
        <span>Preview</span><br>
        <div id="slider-preview-3" class="slider-preview"></div>

        <br>
        <label>Heading</label>
        <input type="text" name="heading[]" class="form-control" value="<?=$slider[2]->slider_title?>">
        <label>Description</label>
        <textarea name="description[]" class="form-control"><?=$slider[2]->slider_description?></textarea>
    </div>
    </div>

    <div class="col-md-4">
      <label>Current Slider 3 :</label><br>
        <div style="width: 250px;height:140px;background-size: cover;background-image:url(<?=base_url('img/slider/'.$slider[2]->slider_image)?>);">
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <input type="submit" name="submit" value="Save All" class="btn btn-primary">
      </div>
    </div>
</form>