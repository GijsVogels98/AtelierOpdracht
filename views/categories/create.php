<h2><?php echo $title; ?></h2>

<?php echo validation_errors('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>'); ?>

<?php echo form_open_multipart('categories/create'); ?>

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" placeholder="Enter category name" name="name">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	
</form>