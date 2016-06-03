<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<!-- header -->
		<header id="header">
			<div class="header-content">
				<div class="left-pane">
					<div class="logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Les Plus Beaux Châteaux">
					</div>
				</div>
				<div class="right-pane">
					<div class="settings-bar">
			    		<div class="right-align">
			    			<div class="settings-button dropdown-wrapper">
								<div class="dropdown-button" tabindex="1">
									<span>Langue</span>
									<ul class="dropdown">
										<li><a href="#">FR</a></li>
										<li><a href="#">EN</a></li>
									</ul>
								</div>
							</div>
							<div class="settings-button connection-wrapper">
								<a class="connection" href="">Connexion</a>
							</div>
			    		</div>
					</div>
					<div class="nav-bar">
						<ul class="nav">
							<li class="nav-item active"><a href="">Accueil</a></li>
							<li class="nav-item"><a href="">Châteaux</a></li>
							<li class="nav-item"><a href="">Régions</a></li>
							<li class="nav-item"><a href="">Événements</a></li>
							<li class="nav-item"><a href="">Musées & Monuments</a></li>
							<li class="nav-item"><a href="">Blog</a></li>
							<li class="nav-item search-input"><input type="text" name="search" placeholder="RECHERCHE"></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<!-- /header -->