<!DOCTYPE html>
<html lang="en-US">
	<head>
			<meta charset="utf-8">
			<meta http-equiv="Content-type" content="text/html; charset=utf-8">
			<title>Admin</title>
			<link rel="icon" href="<?=PROJECT?>assets/images/favicon.ico" type="image/x-icon">
			<meta name="description">
			<!-- mobile settings -->
			<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
			<!-- WEB FONTS -->
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css">
			<!-- CORE CSS -->
			<link href="<?=PROJECT?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
			<!-- THEME CSS -->
			<link href="<?=PROJECT?>assets/css/essentials.css" rel="stylesheet" type="text/css">
			<link href="<?=PROJECT?>assets/css/layout.css" rel="stylesheet" type="text/css">
			<link href="<?=PROJECT?>assets/css/color_scheme/blue.css" rel="stylesheet" type="text/css" id="color_scheme">
			<link href="<?=PROJECT?>assets/css/slim.min.css" rel="stylesheet" type="text/css">
			<link href="<?=PROJECT?>assets/css/alert.css" rel="stylesheet" type="text/css">
			<link href="<?=PROJECT?>assets/css/layout-datatables.css" rel="stylesheet" type="text/css">
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
			
	</head>
	<body>
		<div id="wrapper" class="clearfix">
			<aside id="aside">
				<nav id="sideNav">
					<ul class="nav nav-list">
						<li <?php if(isset($this->place) && $this->place=="home"){?> class="active" <?php }?> >
							<a class="dashboard" href="<?=PROJECT?>">
								<i class="main-icon fa fa fa-home"></i><span>Inicio</span>
							</a>
						</li>
						<li <?php if(isset($this->place) && $this->place=="user"){?> class="active" <?php }?>>
							<a class="dashboard" href="<?=PROJECT?>user">
								<i class="main-icon fa fa fa-user"></i><span>Usuarios</span>
							</a>
						</li>
						<li <?php if(isset($this->place) && $this->place=="categories"){?> class="active" <?php }?>>
							<a class="dashboard" href="<?=PROJECT?>category">
								<i class="main-icon fa fa fa-list"></i><span>Categorias</span>
							</a>
						</li>
						<li <?php if(isset($this->place) && $this->place=="product"){?> class="active" <?php }?>>
							<a class="dashboard" href="<?=PROJECT?>product">
								<i class="main-icon fa fa fa-list-alt"></i><span>Productos</span>
							</a>
						</li>
						<li <?php if(isset($this->place) && $this->place=="order"){?> class="active" <?php }?>>
							<a class="dashboard" href="<?=PROJECT?>order">
								<i class="main-icon fa fa fa-shopping-cart"></i><span>Compras</span>
							</a>
						</li>
					</ul>
				</nav>
				<span id="asidebg"></span>
			</aside>
			<header id="header">
				<button id="mobileMenuBtn"></button>
				
				<nav>
					<ul class="nav pull-right">
						<li class="dropdown pull-left">
							<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="<?=PROJECT?>assets/images/noavatar.png" height="34">
								<span class="user-name">
									<span class="hidden-xs">
											 Admin</i>
									</span>
								</span>
							</a>
						</li>
					</ul>
				</nav>
			</header>
		