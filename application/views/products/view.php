<?php $available = ($product['count']-$product['product_lent']);?>
<h2><?=$title?></h2>
<div class="row">
	<div class="col-md-9">
		<div class="bg-light p-4">
			<h5>Omschrijving</h5>
			<p><?=$product['body']?></p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="bg-light p-4">
			<h5>Beschikbaarheid</h5>
			<p>
			<strong>Aantal:</strong> <?=$product['count']?><br>
			<strong>Beschikbaar:</strong> 
			<?php if ($available > 2 || $available == $product['count']) { ?>
				<span class="text-green"><?=$available?></span>
			<?php } elseif ($available == 0) { ?>
				<span class="text-red">Geen</span>
			<?php } elseif ($available <= 2) { ?>
				<span class="text-orange"><?=$available?></span>
			<?php } ?>
			</p>
		</div>
	</div>
</div>