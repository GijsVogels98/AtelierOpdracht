<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/update'); ?>

	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
	<input type="hidden" name="created_at" value="<?php echo time(); ?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" placeholder="Add title" name="title" value="<?php echo $post['title']; ?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea class="form-control" name="body" id="editor" placeholder="Add body"><?php echo $post['body']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Contact information</label>
		<input type="text" class="form-control my-2" placeholder="Add phonenumber" name="phone_number" value="<?php echo $post['phone_number']; ?>">
		<input type="text" class="form-control my-2" placeholder="Add email" name="email" value="<?php echo $post['email']; ?>">
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" class="form-control my-2" placeholder="Add streetname" name="streetname" value="<?php echo $post['streetname']; ?>">
		<input type="text" class="form-control my-2" placeholder="Add housenumber" name="house_number" value="<?php echo $post['house_number']; ?>">
		<input type="text" class="form-control my-2" placeholder="Add zipcode" name="zipcode" value="<?php echo $post['zipcode']; ?>">
		<input type="text" class="form-control my-2" placeholder="Add city" name="town" value="<?php echo $post['town']; ?>">
	</div>
	<div class="form-group businesshours">
		<label class="d-block">Business hours</label>
		<div class="my-2">
			<span class="d-block">Monday:</span><input type="time" class="form-control d-inline w-auto" name="monday_start" value="<?php echo $post['monday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="monday_end" value="<?php echo $post['monday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Tuesday:</span><input type="time" class="form-control d-inline w-auto" name="tuesday_start" value="<?php echo $post['tuesday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="tuesday_end" value="<?php echo $post['tuesday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Wednesday:</span><input type="time" class="form-control d-inline w-auto" name="wednesday_start" value="<?php echo $post['wednesday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="wednesday_end" value="<?php echo $post['wednesday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Thursday:</span><input type="time" class="form-control d-inline w-auto" name="thursday_start" value="<?php echo $post['thursday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="thursday_end" value="<?php echo $post['thursday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Friday:</span><input type="time" class="form-control d-inline w-auto" name="friday_start" value="<?php echo $post['friday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="friday_end" value="<?php echo $post['friday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Saturday:</span><input type="time" class="form-control d-inline w-auto" name="saturday_start" value="<?php echo $post['saturday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="saturday_end" value="<?php echo $post['saturday_end']; ?>">
		</div>
		<div class="my-2">
			<span class="d-block">Sunday:</span><input type="time" class="form-control d-inline w-auto" name="sunday_start" value="<?php echo $post['sunday_start']; ?>"> - <input type="time" class="form-control d-inline w-auto" name="sunday_end" value="<?php echo $post['sunday_end']; ?>">
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
		<label for="userfile" class="d-block">Add image(s)</label>
		<input type="file" name="userfile[]" id="userfile" multiple="multiple">
	</div>
	
	<?php /*

 if ($images) { 
		$i = 0;
	?>
	<label class="d-block">Remove images</label>
	<div class="form-group remove-image">
		<?php foreach($images as $image) : 
			$i++;
		?>
		<input type="checkbox" class="form-check-input" id="image<?php echo $i; ?>">
		<label class="form-check-label" for="image<?php echo $i; ?>">
			<img src="/assets/images/uploads/<?php echo $image['path']; ?>">
		</label>
			
		<?php endforeach; ?>
	</div>
	<?php } else { ?>
			<div class="alert alert-primary" role="alert">No images to display</div>
	
	<?php 
} 
*/?>
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    CKEDITOR.replace( 'editor' );
</script>