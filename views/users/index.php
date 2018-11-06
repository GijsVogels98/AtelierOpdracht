<h2><?php echo $title; ?></h2>

<ul class="list-group">
	<?php foreach ($users as $user): ?>
		<li class="list-group-item d-flex justify-content-between align-items-center">
			<div>
				<a href="<?php echo site_url('/users/' . $user['slug']); ?>" class="d-inline-block"><?php echo $user['username']; ?></a>
				<span class="text-muted">(<?php echo $user['user_role']; ?>)</span>
			</div>
			<div>
				<?php if ($this->session->userdata('user_id') == $user['id'] || $this->session->userdata('user_role') == 'Superadmin') { ?>
					<a href="<?php echo base_url(); ?>users/edit/<?php echo $user['slug']; ?>" class="btn btn-secondary float-left">Edit</a>
				<?php } ?>
				<?php if ($this->session->userdata('user_id') != $user['id']) { ?>
					<?php if ($this->session->userdata('user_role') == 'Superadmin') { ?>
					<form action="users/delete/<?php echo $user['id']; ?>" method="POST" class="d-inline-block mb-0 ml-2">
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
					<?php } ?>
				<?php } ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>