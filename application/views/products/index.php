<h2><?=$title?></h2>

<div class="card mb-4" id="products">
	<div class="card-header d-flex justify-content-between align-items-center">
		<form class="form-inline mb-0">
			<input type="text" id="productSearch" class="form-control search" placeholder="Zoeken...">
		</form>
		<a href="<?php echo base_url(); ?>producten/nieuw" class="btn btn-primary">Nieuw product</a>
	</div>
	<div class="table-responsive">
		<table class="table card-table mb-0 table-striped">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Categorie</th>
					<th>Beschikbaar</th>
               <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($products as $product): ?>
					<tr>
						<td class="name"><a href="<?=site_url('/producten/' . $product['slug'])?>"><?=$product['name']?></a></td>
						<td><?=$product['category_name']?></td>
						<?php if ($product['available'] > 2 || $product['available'] == $product['count']) { ?>
							<td class="text-green"><?=$product['available']?></td>
						<?php } elseif ($product['available'] == 0) { ?>
							<td class="text-red">Niet beschikbaar</td>
						<?php } elseif ($product['available'] <= 2) { ?>
							<td class="text-orange"><?=$product['available']?></td>
						<?php } ?>
                        <td class="d-flex justify-content-end align-items-center">
	                        <?php if ($title == 'Producten') { ?>
	                        <a class="btn btn-light mr-1" href="<?php echo base_url(); ?>producten/bewerken/<?php echo $product['slug']; ?>"><i class="fas fa-pencil-alt"></i></a>
	                        <?php } ?>
                           <?php echo form_open('/products/delete/'.$product['product_id']); ?>
                           	<button type="submit" class="btn btn-danger" style="font-size: 16px !important;"><i class="fas fa-times"></i></button>
                           </form>
                        </td>
                    </tr>
				<?php endforeach; ?>
			</tbody>
	</div>
</div>