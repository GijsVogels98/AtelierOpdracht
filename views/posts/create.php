<h2><?php echo $title; ?></h2>

<?php 
    if(!empty($error_msg)){
        echo '<div class="alert alert-danger"><strong>Danger!</strong> '.$error_msg.'</div>';
    }
?>

<?php echo validation_errors('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>'); ?>

<?php echo form_open_multipart('posts/create'); ?>

	<input type="hidden" name="created_at" value="<?php echo time(); ?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" placeholder="Add title" name="title">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" name="body" id="editor" placeholder="Add body"></textarea>
	</div>
	<div class="form-group">
		<label>Contact information</label>
		<input type="text" class="form-control my-2" placeholder="Add phonenumber" name="phone_number">
		<input type="text" class="form-control my-2" placeholder="Add email" name="email">
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" class="form-control my-2" placeholder="Add streetname" name="streetname">
		<input type="text" class="form-control my-2" placeholder="Add housenumber" name="house_number">
		<input type="text" class="form-control my-2" placeholder="Add zipcode" name="zipcode">
		<input type="text" class="form-control my-2" placeholder="Add town" name="town">
	</div>
	<div class="form-group businesshours">
		<label class="d-block">Business hours</label>
		<div class="my-2">
			<span class="d-block">Monday:</span><input type="time" class="form-control d-inline w-auto" name="monday_start"> till <input type="time" class="form-control d-inline w-auto" name="monday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Tuesday:</span><input type="time" class="form-control d-inline w-auto" name="tuesday_start"> till <input type="time" class="form-control d-inline w-auto" name="tuesday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Wednesday:</span><input type="time" class="form-control d-inline w-auto" name="wednesday_start"> till <input type="time" class="form-control d-inline w-auto" name="wednesday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Thursday:</span><input type="time" class="form-control d-inline w-auto" name="thursday_start"> till <input type="time" class="form-control d-inline w-auto" name="thursday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Friday:</span><input type="time" class="form-control d-inline w-auto" name="friday_start"> till <input type="time" class="form-control d-inline w-auto" name="friday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Saturday:</span><input type="time" class="form-control d-inline w-auto" name="saturday_start"> till <input type="time" class="form-control d-inline w-auto" name="saturday_end">
		</div>
		<div class="my-2">
			<span class="d-block">Sunday:</span><input type="time" class="form-control d-inline w-auto" name="sunday_start"> till <input type="time" class="form-control d-inline w-auto" name="sunday_end">
		</div>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
			
				<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
			
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label for="userfile" class="d-block">Upload featured image</label>
		<input type="file" name="userfile[]" id="userfile" multiple="multiple">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    CKEDITOR.replace( 'editor' );
</script>