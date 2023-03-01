<div class="container container-content">
   <div class="row">
     <div class="col-md-12">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
        </ol>
      </nav> 

      </div>
  </div>

   <div class="row">
     <div class="col-md-12">
       	<h3>Our Projects</h3>
    	<br>
    	<br>
    	<h6>Ongoing Projects</h6>
    	<table class="table">
    		<tr>
    			<th>No</th>
    			<th>Project</th>
    			<th>Field</th>
          <th>Location</th>
    			<th>Client</th>
    			<th>Start Date</th>
    			<th>Value</th>
    		</tr>
    		<?php foreach ($project_on_all as $key): ?>
    			<tr>
	    			<td><?=++$start?></td>
	    			<td><?=$key->project_name?></td>
	    			<td><?=$key->field?></td>
            <td><?=$key->location?></td>
	    			<td><?=$key->owner?></td>
	    			<td><?=date('d F Y',strtotime($key->start_date))?></td>
	    			<td>Rp <?=number_format($key->contract_value)?></td>
	    		</tr>
    		<?php endforeach ?>
    	</table>

    	<br>
    	<br>
    	<h6>Finished Projects</h6>
    	<table class="table">
    		<tr>
    			<th>No</th>
    			<th>Project</th>
    			<th>Field</th>
          <th>Location</th>
    			<th>Client</th>
    			<th>Start Date</th>
          <th>End Date</th>
    			<th>Value</th>
    		</tr>
    		<?php foreach ($project_fin_all as $key): ?>
    			<tr>
	    			<td><?=++$start?></td>
	    			<td><?=$key->project_name?></td>
	    			<td><?=$key->field?></td>
            <td><?=$key->location?></td>
	    			<td><?=$key->owner?></td>
	    			<td><?=date('d F Y',strtotime($key->start_date))?></td>
            <td><?=date('d F Y',strtotime($key->end_date))?></td>
	    			<td>Rp <?=number_format($key->contract_value)?></td>
	    		</tr>
    		<?php endforeach ?>
    	</table>

     </div>
   </div>
</div>

<style type="text/css">
  .table td {
    font-size: 12px;
  }
</style>