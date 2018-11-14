<html>
	<head>
		<title>Sintlucas atelier</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="author" content="Stef Verstraten">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?<?php echo time(); ?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<header class="mb-4">
			<nav class="navbar navbar-expand-lg navbar-light bg-black text-white">
				<div class="container">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.46 37.75">
							<g>
								<g>
									<path d="M268.79 37.75c9.45 0 14.67-4.7 14.67-11.77 0-13.1-19.9-9.82-19.9-14.15 0-1.54 1.16-2.43 3.8-2.43a16.34 16.34 0 0 1 10.3 3.69l5-6.81a21.49 21.49 0 0 0-14.31-4.91c-9 0-14 5.28-14 11.2 0 13.56 19.91 9.71 19.91 14.36 0 1.74-1.9 2.79-5 2.79A16 16 0 0 1 258 25.08l-4.8 7.07c3.54 3.33 8.5 5.6 15.63 5.6m-30.1-13.62h-8.92l4.49-13.25 4.43 13.25zm14.52 13L240 1.9h-11.5l-13.25 35.22h10.3l1.74-5.07h13.88l1.75 5.07zm-52.9.63a16.43 16.43 0 0 0 15.36-9.45l-7.81-3.7a8.45 8.45 0 0 1-7.55 5.12c-5.75 0-9.82-4.43-9.82-10.19s4.07-10.18 9.82-10.18a8.45 8.45 0 0 1 7.55 5.12l7.81-3.75c-2.27-4.6-6.86-9.4-15.36-9.4-10.82 0-19.06 7.34-19.06 18.21s8.24 18.22 19.06 18.22m-39.39 0c11.3 0 16.58-6.18 16.58-14.94V1.9h-9.18v20.64c0 4.18-2.54 7.18-7.4 7.18s-7.44-3-7.44-7.18V1.9h-9.24v21c0 8.66 5.38 14.89 16.68 14.89m-19.21-.63V29.2h-14.19V1.9h-9.09v35.22z" fill="#fff"></path>
									<path d="M104.54 37.12V9.82h9.82V1.9H85.58v7.92h9.88v27.3zm-23.23 0V1.9h-9.14v19.38L57.92 1.9h-9.35v35.22h9.08V16.74l14.89 20.38zM42.66 11.61h-8.13v25.51h8.13V11.61zm-4.07-2.26a4.71 4.71 0 0 0 4.7-4.7 4.67 4.67 0 1 0-4.7 4.7m-23 28.4c9.45 0 14.68-4.7 14.68-11.77 0-13.1-19.91-9.82-19.91-14.15 0-1.53 1.16-2.43 3.8-2.43a16.34 16.34 0 0 1 10.3 3.69l5-6.81a21.49 21.49 0 0 0-14.31-4.91c-9 0-14 5.28-14 11.19 0 13.57 19.91 9.72 19.91 14.37 0 1.74-1.91 2.79-5 2.79A16 16 0 0 1 4.8 25.08L0 32.15c3.54 3.33 8.5 5.6 15.63 5.6" fill="#ff7e00"></path>
							</g>
	 					</g>
					</svg>
				</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>producten">Producten</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>lenen">Lenen</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>categorieen">Categorieën</a>
							</li>
							<?php if (!$this->session->userdata('logged_in')) { ?>
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>aanvragen">Aanvragen</a>
							</li>
							<?php } ?>
						</ul>
						<ul class="navbar-nav">
							<?php if (!$this->session->userdata('logged_in')) { ?>
							<li class="nav-item">
                          <a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>users/register">Registreren</a>
                      </li>
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>users/login">Log in</a>
							</li>
							<?php } else { ?>
							<li class="nav-item">
								<a class="nav-link text-white text-uppercase" href="<?php echo base_url(); ?>users/logout">Log uit</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		
		<main>
			<div class="container" style="margin-bottom: 20px">




				<?php if ($this->session->flashdata('user_loggedin')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('user_loggedin'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('login_failed')) { ?>
					<div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('login_failed'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('user_loggedout')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('user_loggedout'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('user_delete_error')) { ?>
					<div class="alert alert-danger" role="alert">
						<strong>Danger!</strong> <?php echo $this->session->flashdata('user_delete_error'); ?>
					</div>
				<?php } ?>

				<?php if ($this->session->flashdata('user_deleted')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('user_deleted'); ?>
					</div>
				<?php } ?>
				
				
				
				<?php /* deze worden nu gebruikt */ ?>

				<?php if ($this->session->flashdata('user_registered')) { ?>
				  <div class="alert alert-success" role="alert">
				      <strong>Succes!</strong> <?php echo $this->session->flashdata('user_registered'); ?>
				  </div>
				<?php } ?>
				
				<?php if ($this->session->flashdata('product_updated')) { ?>
				  <div class="alert alert-success" role="alert">
				      <strong>Succes!</strong> <?php echo $this->session->flashdata('product_updated'); ?>
				  </div>
				<?php } ?>
				
				<?php if ($this->session->flashdata('product_deleted')) { ?>
				  <div class="alert alert-success" role="alert">
				      <strong>Succes!</strong> <?php echo $this->session->flashdata('product_deleted'); ?>
				  </div>
				<?php } ?>
				<?php if ($this->session->flashdata('product_created')) { ?>
				  <div class="alert alert-success" role="alert">
				      <strong>Succes!</strong> <?php echo $this->session->flashdata('product_created'); ?>
				  </div>
				<?php } ?>
				
				
				<?php if ($this->session->flashdata('email_sent')) { ?>
				  <div class="alert alert-success" role="alert">
				      <strong>Succes!</strong> <?php echo $this->session->flashdata('email_sent'); ?>
				  </div>
				<?php } ?>
				<?php if ($this->session->flashdata('email_error')) { ?>
					<div class="alert alert-danger" role="alert">
						<strong>Danger!</strong> <?php echo $this->session->flashdata('email_error'); ?>
					</div>
				<?php } ?>

				
				
				<?php if ($this->session->flashdata('category_created')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('category_created'); ?>
					</div>
				<?php } ?>
				
				<?php if ($this->session->flashdata('category_deleted')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('category_deleted'); ?>
					</div>
				<?php } ?>
				
				
				<?php if ($this->session->flashdata('redeem_product')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('redeem_product'); ?>
					</div>
				<?php } ?>
