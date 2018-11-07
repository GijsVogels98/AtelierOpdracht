<h2><?=$title?></h2>

<?php if($products) { ?>
<div class="card mb-4" id="products">
	<div class="card-header">
		<form class="form-inline mb-0">
			<input type="text" id="productSearch" class="form-control search" placeholder="Zoeken...">
		</form>
	</div>
	<div class="table-responsive">
		<table class="table card-table mb-0">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Beschikbaar</th>
                    <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($products as $product): ?>
					<tr>
						<td class="name"><a href="<?=site_url('/producten/' . $product['slug'])?>"><?=$product['name']?></a></td>
						<?php if ($product['available'] > 2 || $product['available'] == $product['count']) { ?>
							<td class="text-green"><?=$product['available']?></td>
						<?php } elseif ($product['available'] == 0) { ?>
							<td class="text-red">Niet beschikbaar</td>
						<?php } elseif ($product['available'] <= 2) { ?>
							<td class="text-orange"><?=$product['available']?></td>
						<?php } ?>
                        <td>
                            <?php echo form_open('/products/delete/'.$product['product_id']); ?>
                            <button type="submit" class="btn btn-danger float-right" style="font-size: 10px !important; font-weight: 600;">x</button>
                            </form>
<!--                            <a class="btn btn-light button float-right" style="font-size: 10px !important; font-weight: 600;">Edit</a>-->
                        </td>


					</tr>
				<?php endforeach; ?>
			</tbody>
	</div>
</div>
<?php } ?>