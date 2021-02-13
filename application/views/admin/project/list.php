
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


<div class="col-md-6">
	<a href="<?=base_url()?>admin/project/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
</div>
<br><br><br>
<div class="">
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Project Name</th>
				<th>Field</th>
				<th>Started Date</th>
				<th>Contract Value</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php if ($list): ?>
			
			<?php foreach ($list as $key): ?>
				<tr>
					<td><?=++$start?></td>
					<td><?=$key->project_name?></td>
					<td><?=$key->field?></td>
					<td><?=$key->start_date?></td>
					<td><?=number_format($key->contract_value)?></td>
					<td><?=$key->status?></td>
					<td>
						<a href="<?=base_url()?>admin/project/update/<?=$key->id_project?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
						<a data-toggle="modal" data-target="#viewModal<?=$key->id_project?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
						<a href="<?=base_url()?>admin/project/delete_item/<?=$key->id_project?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
			<?php else : ?>	
				<tr><td>No data</td></tr>
			<?php endif ?>
		</table>
	</div>
</div>

<?php if ($list): ?>
<?php foreach ($list as $key): ?>
<!-- Modal -->
<div id="viewModal<?=$key->id_project?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-fullscreen">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$key->project_name?></h4>
      </div>
      <div class="modal-body">
        	<div class="row">
        		<div class="col-md-6 text-center">
        			 <img src="<?=base_url()?>assets/upload/image/thumbs/<?=$key->image?>" style="height: 400px;" onerror="this.onerror=null; this.src='<?=base_url()?>assets/upload/image/no-image.png'">
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
        				<label>nama Project</label>
        				<p class="form-control"><?=$key->project_name?></p>
        			</div>
        			<div class="form-group">
        				<label>Bidang</label>
        				<p class="form-control"><?=$key->field?></p>
        			</div>
        			<div class="form-group">
        				<label>Lokasi</label>
        				<p class="form-control"><?=$key->location?></p>
        			</div>
        			<div class="form-group">
        				<label>Pemberi Tugas</label>
        				<p class="form-control"><?=$key->Owner?></p>
        			</div>
        			<div class="form-group">
        				<label>Mulai</label>
        				<p class="form-control"><?=$key->start_date?></p>
        			</div>
        			<div class="form-group">
        				<label>Selesai</label>
        				<p class="form-control"><?=$key->end_date?></p>
        			</div>
        			<div class="form-group">
        				<label>Nilai Kontrak</label>
        				<p class="form-control"><?=number_format($key->contract_value)?></p>
        			</div>
        			<div class="form-group">
        				<label>status</label>
        				<?php if ($key->status=="ongoing"): ?>
        					<p class="label label-primary"><?=$key->status?></p>
        				<?php endif ?>
        				<?php if ($key->status=="finished"): ?>
        					<p class="label label-success"><?=$key->status?></p>
        				<?php endif ?>
        				<?php if ($key->status=="canceled"): ?>
        					<p class="label label-default"><?=$key->status?></p>
        				<?php endif ?>
        				
        			</div>
        			
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="form-group">
        				<label>Desc</label>
        				<?=$key->desc?>
        			</div>
        		</div>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php endforeach ?>
<?php endif ?>