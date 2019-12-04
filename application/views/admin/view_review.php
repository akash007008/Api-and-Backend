<?php include('admin_header.php');
$i=0; ?>
<div class="container">
<br/>
<h1>All Reviews</h1>
 	<table class="table">
		<thead>
			<th>S.No.</th>
			<th>Title</th>
			<th>Rating</th>
			<th>Link</th>
			<th>Category</th>
			<th>Discount</th>
			<th>Price</th>
			<th>Bonus</th>
			<th>Button</th>
			<th>Review</th>
			<th>Image</th>
			<th colspan='2'>Action</th>
		</thead>
		<tbody>
			<?php if (count($data)): ?>
				<?php foreach ($data as $data): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['review_title']; ?></td>
			<td><?php echo $data['review_rating']; ?></td>
			<td><?php echo $data['link']; ?></td>
			<td><?php echo $data['category']; ?></td>
			<td><?php echo $data['discount']; ?></td>
			<td><?php echo $data['price']; ?></td>
			<td><?php echo $data['bonus']; ?></td>
			<td><?php echo $data['button']; ?></td>
			<td><?php echo $data['review_body']; ?></td>
			<td><img src="<?php echo base_url('uploads/'.$data['review_image']); ?>" style='height:80px; width:80px;' ></td>
			<td><?php echo  anchor("admin_panel/edit_review/{$data['review_id']}",'Edit',['class'=>'btn btn-primary']); ?></td>
			<td><?php echo  anchor("admin_panel/delete_review/{$data['review_id']}",'Delete',['class'=>'btn btn-danger']); ?></td>
		</tr>
				<?php $i++; endforeach ?>
				<?php else: ?>
					<tr>
						<td colspan="3">No Records Found.</td>
					</tr>
				<?php  endif ?>
		</tbody>
	</table>
</div>
<?php include('admin_footer.php'); ?>
