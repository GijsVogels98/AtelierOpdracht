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
		<script src="//cdn.ckeditor.com/4.10.0/basic/ckeditor.js"></script>
	</head>
	<body>
		<header class="mb-5">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Logo</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>categorieen">Categorieën</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>producten">Producten</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>producten/nieuw">Nieuw product</a>
							</li>
						</ul>
						<ul class="navbar-nav">
							<?php if (!$this->session->userdata('logged_in')) { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>users/login">Log in</a>
							</li>
							<?php } ?>
							<?php if ($this->session->userdata('logged_in')) { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Log uit</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		
		<main>
			<div class="container">
				<?php if ($this->session->flashdata('user_registered')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('user_registered'); ?>
					</div>
				<?php } ?>
								
				<?php if ($this->session->flashdata('category_created_error')) { ?>
					<div class="alert alert-danger" role="alert">
						<strong>Danger!</strong> <?php echo $this->session->flashdata('category_created_error'); ?>
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
				
				<?php if ($this->session->flashdata('user_loggedin')) { ?>
					<div class="alert alert-success" role="alert">
						<strong>Succes!</strong> <?php echo $this->session->flashdata('user_loggedin'); ?>
					</div>
				<?php } ?>
				
				<?php if ($this->session->flashdata('login_failed')) { ?>
					<div class="alert alert-danger" role="alert">
						<strong>Danger!</strong> <?php echo $this->session->flashdata('login_failed'); ?>
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
                <?php if ($this->session->flashdata('product_deleted')) { ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Succes!</strong> <?php echo $this->session->flashdata('product_deleted'); ?>
                    </div>
                <?php } ?>
