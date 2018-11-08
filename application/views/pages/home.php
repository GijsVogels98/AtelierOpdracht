<div class="row">
	<div class="col-md-9">
		<div class="card mb-4" id="products">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4>Inleveren vandaag of telaat</h4>
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
							$i++;
							?>
						<?php if ($loan['returned'] === 'yes'): continue; endif; ?>
						<?php $timestamp_borrowed_till = strtotime($loan['borrowed_till']); ?>
						<?php if (date('Y/m/d', time()) < date('Y/m/d', $timestamp_borrowed_till)): continue; endif; ?>
							<tr>
								<td class="product"><a href="<?=site_url('/producten/' . $loan['slug'])?>"><?=$loan['name']?></a></td>
								<td class="name"><?=$loan['customer_name']?></td>
								<td <?php if (date('Y/m/d', time()) > date('Y/m/d', $timestamp_borrowed_till)) { echo 'class="text-red"'; } ?>><?=date('j F Y', $timestamp_borrowed_till)?></td>
		                  <td class="d-flex justify-content-end align-items-center">
			                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#moreinfo<?=$i?>">Inleveren</button>
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
														<?php $timestamp_borrowed_till = strtotime($loan['borrowed_till']); ?>
														<span <?php if (date('Y/m/d', time()) >= date('Y/m/d', $timestamp_borrowed_till)) { echo 'class="text-red"'; } ?>>
														<?=date('j F Y', $timestamp_borrowed_till)?>
														</span>
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
													<small>Uitgeleend door:</small> uitlener (Nog vervangen door sessie)
												</div>
												
												<div class="product mt-3">
													<small>Geleend product:</small> <a href="<?=site_url('/producten/' . $loan['slug'])?>"><?=$loan['name']?></a>
												</div>
												
												<?php if (!empty($loan['note_before'])) { ?>
												<div class="note_before mt-4">
													<small>Opmerking voor:</small>
													<p><?=$loan['note_before']?></p>
												</div>
												<?php } ?>
											</div>
											<div class="modal-footer flex-wrap">
												<label for="note_after" class="d-block w-100"><small>Opmerking bij inleveren:</small></label>
												<?php echo form_open('/borrowed/redeem/'.$loan['id']); ?>
							                  	<input type="hidden" value="yes" name="returned">
							                  	<input type="hidden" value="<?=$loan['product_id']?>" name="product_id">
							                  	<textarea name="note_after" class="form-control mb-2"><?php if ($loan['note_after']) { echo $loan['note_after']; } ?></textarea>
						                    		<button type="submit" class="btn btn-success" style="font-size: 16px !important;"><i class="fas fa-check"></i> Ingeleverd</button>
					                     </form>
											</div>
										</div>
									</div>
								</div>
		               </tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card mb-4" id="products">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4>Categorieën</h4>
			</div>
			<div class="table-responsive">
				<table class="table card-table mb-0 table-striped">
					<thead>
						<tr>
							<th>Naam</th>
						</tr>
					</thead>
					<tbody class="list">
						<?php foreach($categories as $category): ?>
							<tr>
								<td class="name"><a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>"><?php echo $category['category_name']; ?></a></td>
		               </tr>
						<?php endforeach; ?>
					</tbody>
			</div>
		</div>
	</div>
</div>