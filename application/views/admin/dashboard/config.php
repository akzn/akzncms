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
    selector: ".tinymce",
    height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/settings/config') ?>" method="post">

<input type="hidden" name="config_id" value="<?php echo $site['config_id'] ?>">

<div class="col-md-6">
	<h3>General Settings</h3><hr>
    <div class="form-group">
        <label>Company</label>
        <input type="text" name="nameweb" placeholder="Nama Website" value="<?php echo $site['nameweb'] ?>" required class="form-control"
        <?=($this->session->userdata('userlevel')=='administrator') ? '':' readonly';?>
        >
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea rows="4" name="address" placeholder="Email" required class="form-control"><?php echo $site['address'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" value="<?php echo $site['email'] ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="phone_number" placeholder="Phone Number" value="<?php echo $site['phone_number'] ?>" required class="form-control">
    </div> 
    <div class="form-group">
        <label>Fax</label>
        <input type="text" name="fax" placeholder="Fax" value="<?php echo $site['fax'] ?>" required class="form-control">
    </div>           
</div>

<div class="col-md-6">
	<h3>Meta Header (for seo)</h3><hr>
	<!-- <div class="form-group">
        <label>Keywords (Google search keywords)</label>
        <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $site['keywords'] ?></textarea>
    </div> -->
    <div class="form-group">
        <label>Home Title </label>
        <input type="text" name="metatitle" placeholder="Home Title" value="<?php echo $site['metatitle'] ?>" required class="form-control">
    </div>
    <div class="form-group">
    <label>Default Description</label>
    <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $site['metatext'] ?></textarea>
    </div>

</div>
<div class="col-md-12">
    <div class="form-group">
    <label>About (indonesian)</label>
        <textarea name="about" placeholder="Tentang Website" class="form-control tinymce" value="about" id="about"><?php echo $site['about']; ?></textarea>
    </div>
</div>

<div class="col-md-12" style="margin-top: 25px">
<span class="" style="margin-top: 150px"></span>
</div>

<!-- <div class="col-md-12">
    <div class="form-group">
    <label>About (english)</label>
        <textarea name="about" placeholder="Tentang Website" class="form-control tinymce" value="about" id="about"><?php echo $site['about']; ?></textarea>
    </div>
</div> -->

<div class="col-md-12">
	<input type="submit" name="submit" value="Save" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">
</div>

</form>