<?php
	include('admin_header.php');?>
    	<div class='container'>
    	<?php echo form_open_multipart('admin_panel/editReview'); ?>
    	<?php echo form_fieldset('Edit Review'); ?>
    	
    	  <div class='row'>
    	   <div class="col-lg-4">
			<div class="form-group">
				 <?php echo form_hidden('review_id', $data->review_id); ?>
			    <label>Title</label>
			    <?php echo form_input(['name'=>'review_title', 'class'=>'form-control', 'placeholder'=>'Enter Title', 'value'=>$data->review_title]); ?>
			    <?php echo br().form_error('title'); ?>
			</div>
		   </div>
		   <div class="col-lg-4">
		   	<div class="form-group">
    		<label>Ratings(out of 5)</label>
			    <?php echo form_input(['name'=>'review_rating', 'class'=>'form-control', 'placeholder'=>'Enter Ratings(out of 5)', 'value'=>$data->review_rating]); ?>
			    <?php echo br().form_error('rating'); ?>
    		</div>
    	</div>
    		<div class="col-lg-3">
    			<div class="form-group">
    		<label>Image</label>
			    <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control', 'type'=>'file']); ?>
    		</div>
    	</div>
    	<div class="col-lg-1">
    			<div class="form-group">
    		<label></label>
			    <img src="<?php echo base_url('uploads/'.$data->review_image); ?>" style='height:80px; width:80px;' >
    		</div>
    	</div>
		  </div>
    	  <div class='row'>
    	  	<div class="col-lg-4">
			<div class="form-group">
			    <label>Links</label>
			   <?php echo form_input(['name'=>'link', 'class'=>'form-control', 'placeholder'=>'link', 'value'=>$data->link] ); ?>
			   <?php echo br().form_error('link'); ?>
			</div>
		</div>
		<div class="col-lg-4">
   			<div class="form-group">
			    <label>Choose Category</label>			   
			    <?php $category= $data->category;?>
                <select type="text" name="category" class="form-control"  aria-describedby="emailHelp" placeholder="Category" value="<?php echo $category; ?>">
                	<?php if(isset($category)) echo "<option value='".$category."'>".$category."</option>"; ?>
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
			   <?php echo form_input(['name'=>'discount', 'class'=>'form-control', 'placeholder'=>'eg 30%', 'value'=>$data->discount]); ?>
			   <?php echo br().form_error('discount'); ?>
			</div>
   		</div>

	</div>
	<div class='row'>
    	  	<div class="col-lg-4">
			<div class="form-group">
			    <label>Price</label>
			   <?php echo form_input(['name'=>'price', 'class'=>'form-control', 'placeholder'=>'Enter Price', 'value'=>$data->price]); ?>
			   <?php echo br().form_error('price'); ?>
			</div>
		</div>
		<div class="col-lg-4">
   			<div class="form-group">
			    <label>Bonuses</label>
			   <?php echo form_input(['name'=>'bonus', 'class'=>'form-control', 'placeholder'=>'eg. PLUS 30 BONUS SPINS', 'value'=>$data->bonus]); ?>
			   <?php echo br().form_error('bonus'); ?>
			</div>
   		</div>
   			<div class="col-lg-4">
   			<div class="form-group">
			    <label>Button Name</label>
			   <?php echo form_input(['name'=>'button', 'class'=>'form-control', 'placeholder'=>'Button Name', 'value'=>$data->button]); ?>
			   <?php echo br().form_error('button'); ?>
			</div>
   		</div>

	</div>
	<div class='row'>
    	  	<div class="col-lg-12">
			<div class="form-group">
			    <label>Comments/Review</label>
			   <?php echo form_textarea(['name'=>'review_body', 'class'=>'form-control', 'placeholder'=>'Enter Review', 'value'=>$data->review_body]); ?>
			   <?php echo br().form_error('review'); ?>
			</div>
		</div>
	</div>
	<?php echo form_submit(['name'=>'submit', 'value'=> 'Submit', 'class'=>'btn btn-primary btn-large']); ?>
	<?php echo form_fieldset_close(); ?>
	<?php form_close('</div>'); ?>
</div>
<?php include('admin_footer.php');?>