<h2><?=$title?></h2>
<?php if ($posts) { ?>
<div class="row">
<?php foreach($posts as $post): ?>
	<div class="col-md-4">
		<div class="card my-3">
			<div class="card-body">
				<?php
				if (date('N') == 1) { 
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['monday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['monday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 2) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['tuesday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['tuesday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 3) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['wednesday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['wednesday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 4) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['thursday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['thursday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 5) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['friday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['friday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 6) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['saturday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['saturday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} elseif (date('N') == 7) {
					$date1 = DateTime::createFromFormat('H:i', date("H:i"));
					$date2 = DateTime::createFromFormat('H:i', $post['sunday_start']);
					$date3 = DateTime::createFromFormat('H:i', $post['sunday_end']);
					if ($date1 > $date2 && $date1 < $date3) { 
						echo '<span class="text-green open-closed float-right">Open</span>'; 
					} else {
						echo '<span class="text-red open-closed float-right">Closed</span>';
					}
				} ?>
				<h5 class="card-title"><?php echo $post['title']; ?></h5>
				<div class="d-flex justify-content-between">
					<h6 class="card-subtitle mb-2 text-muted"><?php echo $post['town']; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted"><?php echo $post['name']; ?></h6>
				</div>
				<div class="card-text"><?php echo word_limiter($post['body'], 10); ?></div>
				<a href="<?php echo site_url('/posts/' . $post['slug']); ?>" class="btn btn-primary d-block">Bekijk</a>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php } else { ?>
	<div class="alert alert-primary" role="alert">No posts to display</div>
<?php } ?>



		