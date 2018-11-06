<h2><?php echo $user['username']; ?></h2>
<div class="row">
	<div class="col-md-8 pt-2">
		<?php if ($this->session->userdata('user_id') == $user['id'] || $this->session->userdata('user_role') == 'Superadmin') { ?>
		<a href="<?php echo base_url(); ?>users/edit/<?php echo $user['slug']; ?>" class="btn btn-secondary float-left mr-2">Edit</a>
		<?php } ?>
		<?php if ($this->session->userdata('user_id') != $user['id']) { ?>
			<?php if ($this->session->userdata('user_role') == 'Superadmin') { ?>
			<form action="users/delete/<?php echo $user['id']; ?>" method="POST" class="d-inline-block mb-0">
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			<?php } ?>
		<?php } ?>
	</div>
	<div class="col-md-4">
		<h6 class="my-2"><?php echo date('j F Y, H:i', $user['register_date']); ?></h6>
		<h6 class="text-muted font-weight-bold"><?php echo $user['user_role']; ?></h6>
	</div>
</div>