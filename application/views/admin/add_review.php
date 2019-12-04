<?php
	include('admin_header.php');?>
    	<div class='container'>
    	<?php echo form_open_multipart('admin_panel/addReview'); ?>
    	<?php echo form_fieldset('Add Review'); ?>
    	
    	  <div class='row'>
    	   <div class="col-lg-4">
			<div class="form-group">
			    <label>Title</label>
			    <?php echo form_input(['name'=>'review_title', 'class'=>'form-control', 'placeholder'=>'Enter Title', 'value'=>set_value('title')]); ?>
			    <?php echo br().form_error('title'); ?>
			</div>
		   </div>
		   <div class="col-lg-4">
		   	<div class="form-group">
    		<label>Ratings(out of 5)</label>
			    <?php echo form_input(['name'=>'review_rating', 'class'=>'form-control', 'placeholder'=>'Enter Ratings(out of 5)', 'value'=>set_value('rating')]); ?>
			    <?php echo br().form_error('rating'); ?>
    		</div>
    	</div>
    		<div class="col-lg-4">
    			<div class="form-group">
    		<label>Image</label>
			    <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control', 'type'=>'file']); ?>
    		</div>
    	</div>
		  </div>
    	  <div class='row'>
    	  	<div class="col-lg-4">
			<div class="form-group">
			    <label>Links</label>
			   <?php echo form_input(['name'=>'link', 'class'=>'form-control', 'placeholder'=>'link', 'value'=>set_value('link')] ); ?>
			   <?php echo br().form_error('link'); ?>
			</div>
		</div>
		<div class="col-lg-4">
   			<div class="form-group">
			    <label>Choose Category</label>			   
                <select type="text" name="category" class="form-control"  aria-describedby="emailHelp" placeholder="Category" value="<?php echo set_value('category'); ?>">
      				<option value="CASINO MOBILE BONUS">CASINO MOBILE  BONUS</option>
    				<option value="ANDROID CASINO APPS">ANDROID CASINO APPS</option>
    				<option value="IOS CASINO APPS">IOS CASINO APPS</option>
        			<option value="BEST BETTING APPS">BEST BETTING APPS</option>
                </select>
            </div>  
			<?php echo br().form_error('category'); ?> 
		</div>
   			<div class="col-lg-4">
   			<div class="form-group">
			    <label>Discount</label>
			   <?php echo form_input(['name'=>'discount', 'class'=>'form-control', 'placeholder'=>'eg 30%', 'value'=>set_value('discount')]); ?>
			   <?php echo br().form_error('discount'); ?>
			</div>
   		</div>

	</div>
	<div class='row'>
    	  	<div class="col-lg-4">
			<div class="form-group">
			    <label>Price</label>
			   <?php echo form_input(['name'=>'price', 'class'=>'form-control', 'placeholder'=>'Enter Price', 'value'=>set_value('price')]); ?>
			   <?php echo br().form_error('price'); ?>
			</div>
		</div>
		<div class="col-lg-4">
   			<div class="form-group">
			    <label>Bonuses</label>
			   <?php echo form_input(['name'=>'bonus', 'class'=>'form-control', 'placeholder'=>'eg. PLUS 30 BONUS SPINS', 'value'=>set_value('bonus')]); ?>
			   <?php echo br().form_error('bonus'); ?>
			</div>
   		</div>
   			<div class="col-lg-4">
   			<div class="form-group">
			    <label>Button Name</label>
			   <?php echo form_input(['name'=>'button', 'class'=>'form-control', 'placeholder'=>'Button Name', 'value'=>set_value('button')]); ?>
			   <?php echo br().form_error('button'); ?>
			</div>
   		</div>

	</div>
	<div class='row'>
    	  	<div class="col-lg-12">
			<div class="form-group">
			    <label>Comments/Review</label>
			   <?php echo form_textarea(['name'=>'review_body', 'class'=>'form-control', 'placeholder'=>'Enter Review', 'value'=>set_value('review')]); ?>
			   <?php echo br().form_error('review'); ?>
			</div>
		</div>
	</div>
	<?php echo form_submit(['name'=>'submit', 'value'=> 'Submit', 'class'=>'btn btn-primary btn-large']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
</div>
<?php include('admin_footer.php');?>