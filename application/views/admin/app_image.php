<?php
	include('admin_header.php');?>
    	<div class='container'>
    	<?php echo form_open_multipart('admin_panel/addappImage'); ?>
    	<?php echo form_fieldset('Add App Image'); ?>
    	
    	  <div class='row'>
    	   <div class="col-lg-4">
			<div class="form-group">
			    <label>Link</label>
			    <?php echo form_input(['name'=>'app_link', 'class'=>'form-control', 'placeholder'=>'Enter Link']); ?>
			</div>
		   </div>  
    	  </div>
    	  <div class='row'>
    		<div class="col-lg-4">
    			<div class="form-group">
    		<label>App Image</label>
			    <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control', 'type'=>'file']); ?>
    		</div>
    	</div>
		</div>
	<?php echo form_submit(['name'=>'submit', 'value'=> 'Submit', 'class'=>'btn btn-primary btn-large']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
    <br/><br/><br/>
    <div class="row">
        
            <?php foreach ($data as $data): ?>
                <div class="col-sm-2">
                <img src="<?php echo base_url('uploads/'.$data['app_image']); ?>" style="height: 80px; width:80px;">
                <br/>
                <?php echo $data['app_link']; ?>
                </div>
            <?php endforeach ?>
    </div>
</div>
<?php include('admin_footer.php');?>