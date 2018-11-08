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
					<th>Inleverdatum</th>
               <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($loans as $loan): ?>
					<tr>
						<td class="name"><a href="<?=site_url('/lenen/' . $loan['slug'])?>"><?=$loan['name']?></a></td>
						<td><?=$loan['category_name']?></td>
                  <td class="d-flex justify-content-end align-items-center">
                     <?php echo form_open('/products/delete/'.$product['product_id']); ?>
                     	<button type="submit" class="btn btn-danger" style="font-size: 16px !important;"><i class="fas fa-times"></i></button>
                     </form>
                  </td>
               </tr>
				<?php endforeach; ?>
			</tbody>
	</div>
</div>