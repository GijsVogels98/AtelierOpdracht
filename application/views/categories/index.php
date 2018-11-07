<h2><?=$title?></h2>

<?php if($categories) { ?>
<div class="card mb-4" id="products">
	<div class="card-header d-flex justify-content-between align-items-center">
		<form class="form-inline mb-0">
			<input type="text" id="productSearch" class="form-control search" placeholder="Zoeken...">
		</form>
		<a href="<?php echo base_url(); ?>categorieen/nieuw" class="btn btn-primary">Nieuwe categorie</a>
	</div>
	<div class="table-responsive">
		<table class="table card-table mb-0 table-striped">
			<thead>
				<tr>
					<th>Naam</th>
               <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($categories as $category): ?>
					<tr>
						<td class="name"><a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>"><?php echo $category['category_name']; ?></a></td>
						<td class="d-flex justify-content-end align-items-center">
	                  <form action="categories/delete/<?php echo $category['id']; ?>" method="POST" class="d-inline-block mb-0">
								<button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
							</form>
                 	</td>
               </tr>
				<?php endforeach; ?>
			</tbody>
	</div>
</div>
<?php } ?>