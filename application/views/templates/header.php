<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico?v=1.1">
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-lumen.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span></button>
			<div class="collapse navbar-collapse" id="mainNav">
				<div class="navbar-nav">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?><?php if(isset($_SESSION['logged-in'])): echo 'welcome/landing'; endif; ?>">Home</a>
						</li>
						<?php if(isset($_SESSION['logged-in']) && $_SESSION['is_admin']):?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>admin">Admin</a>
							</li>
						<?php endif; ?>
						<?php if(isset($_SESSION['logged-in'])):?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url(); ?>profile/management">Profile</a>
							</li>
						<?php endif; ?>
						<?php if(isset($_SESSION['logged-in'])):?>
							<li class="nav-item">
								<a class="btn btn-danger" href="<?php echo base_url(); ?>profile/logout">Logout</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
  <div class="container main-content">
