<h2><?=$title?></h2>

<div class="card mb-4" id="products">
	<div class="card-header d-flex justify-content-between align-items-center">
		<form class="form-inline mb-0">
			<input type="text" id="productSearch" class="form-control search" placeholder="Zoeken...">
		</form>
		<div>
			<a href="<?php echo base_url(); ?>lenen/ingeleverd" class="btn btn-secondary">Afgeronde leningen</a>
			<a href="<?php echo base_url(); ?>producten/nieuw" class="btn btn-primary">Nieuwe Lening</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table card-table mb-0 table-striped">
			<thead>
				<tr>
					<th>Product</th>
					<th>Naam</th>
					<th>E-mailadres</th>
					<th>Inleverdatum</th>
               <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($loans as $loan): ?>
					<tr <?php if ($loan['returned'] === 'yes'): ?>class="d-none"<?php endif; ?>>
						<td class="product"><a href="<?=site_url('/producten/' . $loan['slug'])?>"><?=$loan['name']?></a></td>
						<td class="name"><?=$loan['customer_name']?></td>
						<td class="email"><a href="mailto:<?=$loan['customer_email']?>"><?=$loan['customer_email']?></a></td>
						<td class="date text-lowercase"><?php
								$timestamp = strtotime($loan['borrowed_till']);
								echo date('j F Y', $timestamp);
							?>
						</td>
                  <td class="d-flex justify-content-end align-items-center">
	                  <?php echo form_open('/borrowed/redeem/'.$loan['id']); ?>
	                  	<input type="hidden" value="yes" name="returned">
                    		<button type="submit" class="btn btn-success" style="font-size: 16px !important;"><i class="fas fa-check"></i></button>
                     </form>
                  </td>
               </tr>
				<?php endforeach; ?>
			</tbody>
	</div>
</div>