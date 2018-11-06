<?php if ($this->session->userdata('user_id') == $post['user_id'] || $this->session->userdata('user_role') == 'Superadmin') { ?>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-secondary float-left mr-2">Edit</a>
<?php echo form_open('/posts/delete/' . $post['id']); ?>
	<input type="submit" class="btn btn-danger" value="Delete">
</form>
<hr>
<?php } ?>

<div class="row">
	<div class="col-md-9">
		<?php
		if (date('N') == 1) { 
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['monday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['monday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 2) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['tuesday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['tuesday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 3) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['wednesday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['wednesday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 4) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['thursday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['thursday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 5) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['friday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['friday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 6) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['saturday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['saturday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} elseif (date('N') == 7) {
				$date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['sunday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['sunday_end']);
				if ($date1 > $date2 && $date1 < $date3) { 
					echo '<span class="text-green open-closed">Open</span>'; 
				} else {
					echo '<span class="text-red open-closed">Closed</span>';
				}
			} ?>
		<h2><?php echo $post['title']; ?></h2>
		<address itemscope itemtype="http://schema.org/localbusiness">
			<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<? if ($post['streetname'] && $post['house_number']) { ?><span itemprop="streetAddress"><?php echo $post['streetname'] . ' ' . $post['house_number']; ?></span><br><? } ?>
				<? if ($post['zipcode']) { ?><span itemprop="postalCode"><? echo $post['zipcode']; ?> </span> <? } if ($post['town']) { ?><span itemprop="addressLocality"><? echo $post['town']; ?></span><? } ?>
			</div>
		</address>

		<? if ($post['phone_number']) { ?><span itemprop="telephone"><strong>Tel: </strong><a href="tel:<? echo $post['phone_number']; ?>"><? echo $post['phone_number']; ?></a></span><br><? } ?>												
		<?php if($post['email']) { ?><span><strong>Email: </strong><a href="mailto:<?php echo $post['email']; ?>"><?php echo $post['email']; ?></a></span><br><?php } ?>
	</div>
	
	<div class="col-md-3 business-hours"> 
		<h6>Business hours</h6>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 1) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['monday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['monday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Monday</span><span><?php echo $post['monday_start']; ?> <span>-</span> <?php echo $post['monday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 2) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['tuesday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['tuesday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Tuesday</span><span><?php echo $post['tuesday_start']; ?> <span>-</span> <?php echo $post['tuesday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 3) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['wednesday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['wednesday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Wednesday</span><span><?php echo $post['wednesday_start']; ?> <span>-</span> <?php echo $post['wednesday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 4) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['thursday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['thursday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Thursday</span><span><?php echo $post['thursday_start']; ?> <span>-</span> <?php echo $post['thursday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 5) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['friday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['friday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Friday</span><span><?php echo $post['friday_start']; ?> <span>-</span> <?php echo $post['friday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator <? if (date('N') == 6) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['saturday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['saturday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Saturday</span><span><?php echo $post['saturday_start']; ?> <span>-</span> <?php echo $post['saturday_end']; ?></span>
			</div>
		</div>
		<div class="position-relative">
			<span class="indicator<? if (date('N') == 7) { $date1 = DateTime::createFromFormat('H:i', date("H:i"));
				$date2 = DateTime::createFromFormat('H:i', $post['sunday_start']);
				$date3 = DateTime::createFromFormat('H:i', $post['sunday_end']);
				if ($date1 > $date2 && $date1 < $date3) { echo ' open'; } }?>"></span>
			<div class="d-flex justify-content-between">
				<span>Sunday</span><span><?php echo $post['sunday_start']; ?> <span>-</span> <?php echo $post['sunday_end']; ?></span>
			</div>
		</div>
	</div>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="true">Information</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Images</a>
	</li>
</ul>
<div class="tab-content p-4 mb-4" id="myTabContent">
	<div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
		<?php echo $post['body']; ?>
	</div>
	<div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
		<?php if ($images) { ?>
		<ul class="post-images">
		<?php foreach($images as $image) : ?>
			<li><a href="/assets/images/uploads/<?php echo $image['path']; ?>" data-fancybox="gallery"><img src="/assets/images/uploads/<?php echo $image['path']; ?>"></a></li>
		<?php endforeach; ?>
		</ul>
		<?php } else { ?>
			<div class="alert alert-primary" role="alert">No images to display</div>
		<?php } ?>
	</div>
</div>

<h3>Add comment</h3>
<?php if ($this->session->userdata('logged_in')) { ?>
	<?php echo validation_errors('<div class="alert alert-danger"><strong>Danger!</strong> ', '</div>'); ?>
	<?php echo form_open('comments/create/' . $post['id']); ?>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Rating:</label>
					<input type="text" class="rating d-none" name="rating" data-size="xs">
				</div>
			</div>
			<div class="col-sm-6">
				<label>Name:</label> <?php echo $this->session->userdata('username'); ?>
			</div>
		</div>
		<div class="form-group">
			<label>Bericht:</label>
			<textarea name="body" class="form-control"></textarea>
		</div>
		<input type="hidden" name="name" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
		<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
		<input type="hidden" name="created_at" value="<?php echo time(); ?>">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<hr>
<?php } else { ?>
	<div class="alert alert-primary" role="alert">U must be logged in to leave a comment. Log in <a href="<?php echo base_url(); ?>users/login">here!</a></div>
<?php } ?>

<h3>Comments</h3>
<?php if ($comments) { ?>
	<?php foreach($comments as $comment) : ?>
	<div class="bg-light p-4 my-3">
		<div class="row">
			<div class="col-md-6">
				<h5><?php echo $comment['name'];?></h5>
				<h6 class="mb-2 text-muted"><?php echo date('j F Y, H:i', $comment['created_at']); ?></h6>
			</div>
			<div class="col-md-6">
					<span><strong>Beoordeling:</strong><input id="input-3" name="rating" value="<?php echo $comment['rating']; ?>" class="rating-loading d-none" data-size="xs"></span>
			</div>
		</div>
		<p><?php echo $comment['body'];?></p>
	</div>
	<?php endforeach; ?>
<?php } else { ?>
	<div class="alert alert-primary" role="alert">No comments to display</div>
<?php } ?>