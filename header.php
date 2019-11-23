<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ArtStation_Wordpress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/artstation-wordpress.css">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<nav class="navbar navbar-expand-lg navbar-dark py-4 px-5">
			<div class="container">
				<a class="navbar-brand" href="index.html">soulant</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<?php
						wp_nav_menu(array(
							'container' => null,
							'items_wrap' => '%3$s',
						));
						?>
					</ul>
				</div>
			</div>
		</nav>
	</header>