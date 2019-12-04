<?php
	include('admin_header.php');?>
    	<div class='container'>
    	<?php echo form_open_multipart('admin_panel/addsliderImage'); ?>
    	<?php echo form_fieldset('Add Slider Image'); ?>
    	
    	  <div class='row'>
    		<div class="col-lg-4">
    			<div class="form-group">
    		<label>Slider Image</label>
			    <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control', 'type'=>'file']); ?>
    		</div>
    	</div>
		</div>
	<?php echo form_submit(['name'=>'submit', 'value'=> 'Submit', 'class'=>'btn btn-primary btn-large']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
</div>
<?php include('admin_footer.php');?>