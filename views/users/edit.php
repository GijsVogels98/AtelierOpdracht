<h2><?php echo $title ?></h2>

<?php echo validation_errors('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>'); ?>

<?php echo form_open('users/update'); ?>
	<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
	<input type="hidden" name="register_date" value="<?php echo time(); ?>">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $user['name']; ?>">
	</div>
	<div class="form-group">
		<label>Zipcode</label>
		<input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="<?php echo $user['zipcode']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user['email']; ?>">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user['username']; ?>">
	</div>
	<?php if ($this->session->userdata('user_id') != $user['id']) { ?>
		<?php if ($this->session->userdata('user_role') == 'Superadmin') { ?>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Gebruikers rol</label>
			<select class="form-control" name="user_role">
				<?php if ($user['user_role'] == 'Superadmin') { ?>
					<option>Superadmin</option>
					<option>Horecaonderneming</option>
					<option>Gebruiker</option>
				<?php } elseif ($user['user_role'] == 'Horecaonderneming') { ?>
					<option>Horecaonderneming</option>
					<option>Superadmin</option>
					<option>Gebruiker</option>
				<?php } else { ?>
					<option>Gebruiker</option>
					<option>Superadmin</option>
					<option>Horecaonderneming</option>
				<?php } ?>
			</select>
		</div>
		<?php } ?>
	<?php } else { ?>
		<input type="hidden" name="user_role" value="<?php echo $user['user_role']; ?>">
	<?php } ?>
	
	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>