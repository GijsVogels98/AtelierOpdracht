<h2><?=$title?></h2>

<div class="card mb-4" id="products">
	<div class="card-header d-flex justify-content-between align-items-center">
		<form class="form-inline mb-0">
			<input type="text" id="productSearch" class="form-control search" placeholder="Zoeken...">
		</form>
        <div>
            <a href="<?php echo base_url(); ?>aanvragen/geaccepteerd" class="btn btn-secondary">Geaccepteerde aanvragen</a>
            <a href="<?php echo base_url(); ?>aanvragen/geweigerd" class="btn btn-primary">Afgewezen aanvragen</a>
        </div>
	</div>
	<div class="table-responsive">
		<table class="table card-table mb-0 table-striped">
			<thead>
				<tr>
					<th>Product</th>
					<th>Naam</th>
					<th>Inleverdatum</th>
               <th></th>
				</tr>
			</thead>
			<tbody class="list">
				<?php 
					$i = 0;
					foreach($loans as $loan): 
					if ($loan['request'] === 'denied'):
					$i++;
				?>
					<tr>
						<td class="product"><a href="<?=site_url('/producten/' . $loan['slug'])?>"><?=$loan['name']?></a></td>
						<td class="name"><?=$loan['customer_name']?></td>
						<td class="date text-lowercase">
							<?php
								$timestamp_borrowed_till = strtotime($loan['borrowed_till']);
								echo date('j F Y', $timestamp_borrowed_till);
							?>
						</td>
                  <td class="d-flex justify-content-end align-items-center">
	                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#moreinfo<?=$i?>">Meer info</button>
                  </td>
                  <div class="modal fade" id="moreinfo<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="moreinfo" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title"><?=$loan['customer_name']?></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="d-flex justify-content-between">
											<div>
												<small>van:</small>
												<?php
													$timestamp_borrowed_at = strtotime($loan['borrowed_at']);
													echo date('j F Y', $timestamp_borrowed_at);
												?>
											</div>
											<div>
												<small>tot:</small>
												<?php
													$timestamp_borrowed_till = strtotime($loan['borrowed_till']);
													echo date('j F Y', $timestamp_borrowed_till);
												?>
											</div>
										</div>
										<div class="student_number mt-4">
											<small>Leerlingnummer:</small> <?=$loan['student_number']?>
										</div>
										<div class="student_email">
											<small>E-mailadres:</small> <a href="mailto:<?=$loan['customer_email']?>"><?=$loan['customer_email']?></a>
										</div>
										<?php if (!empty($loan['customer_phone'])) { ?>
										<div class="student_phone">
											<small>Telefoonnummer:</small> <a href="tel:<?=$loan['customer_phone']?>"><?=$loan['customer_phone']?></a>
										</div>
										<?php } ?>
										
										<div class="lent_by">
											<small>Geweigerd door:</small> <?=$loan['user_id']?>
										</div>

										
										<div class="product mt-3">
											<small>Aangevraagd product:</small> <a href="<?=site_url('/producten/' . $loan['slug'])?>"><?=$loan['name']?></a>
										</div>
										<?php if (!empty($loan['for_what'])) { ?>
										<div class="note_before mt-4">
											<small>Waarvoor:</small>
											<p><?=$loan['for_what']?></p>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
               </tr>
               
               <?php else: continue; endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>