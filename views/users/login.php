<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<h2 class="text-center"><?php echo $title; ?></h2>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" required autofocus>
			</div>
			<div class="form-group">
				<label for="username">Password</label>
				<input type="password" name="password" class="form-control" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>