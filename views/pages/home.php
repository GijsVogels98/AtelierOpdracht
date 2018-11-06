<h2><?=$title?></h2>
<p>Welcome to my practise website</p>

<ul class="list-group">
	<?php foreach ($categories as $category): ?>
		<li class="list-group-item d-flex justify-content-between align-items-center">
			<a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>" class="d-inline-block"><?php echo $category['name']; ?></a>
		</li>
	<?php endforeach; ?>
</ul>