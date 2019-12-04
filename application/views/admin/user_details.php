<?php include('admin_header.php');
$i=0; ?>
<div class="container">
<br/>
	<h1>User Details</h1>
 	<table class="table">
		<thead>
			<th>S.No.</th>
			<th>Username</th>
			<th>Email</th>
		</thead>
		<tbody>
			<?php if (count($data)): ?>
				<?php foreach ($data as $data): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['user_name']; ?></td>
			<td><?php echo $data['user_email']; ?></td>
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
