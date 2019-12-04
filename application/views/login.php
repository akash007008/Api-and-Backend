<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <?php echo link_tag('assets/css/bootstrap.min.css'); ?>        
    </head>
    <body>
    	<div class='container'>
    	<?php echo form_open('admin_panel/adminLogin'); ?>
    	<?php echo form_fieldset('Admin Login'); ?>
    	
    	  <div class='row'>
    	   <div class="col-lg-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <?php echo form_input(['name'=>'email', 'class'=>'form-control', 'placeholder'=>'Enter Email', 'value'=>set_value('email')]); ?>
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
		   </div>
		   <div class="col-lg-6">
    		<?php echo br(2).form_error('email'); ?>
    		</div>
		  </div>
    	  <div class='row'>
    	  	<div class="col-lg-6">
			<div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			   <?php echo form_password(['name'=>'pass', 'class'=>'form-control', 'placeholder'=>'Password']); ?>
			</div>
		</div>
		<div class="col-lg-6">
   			<?php echo br(2).form_error('pass'); ?>
   		</div>
	</div>
	<?php echo form_submit(['name'=>'login', 'value'=> 'Login', 'class'=>'btn btn-primary btn-large']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
</div>
	</body>
</html>