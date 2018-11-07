<h2><?php echo $title; ?></h2>
<ul class="list-group">
	<?php foreach ($categories as $category): ?>
		<li class="list-group-item d-flex justify-content-between align-items-center">
			<a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>" class="d-inline-block"><?php echo $category['category_name']; ?></a>
			<form action="categories/delete/<?php echo $category['id']; ?>" method="POST" class="d-inline-block mb-0">
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</li>
	<?php endforeach; ?>
</ul>